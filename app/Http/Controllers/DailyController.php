<?php

namespace App\Http\Controllers;

use App\Models\ApprovalList;
use App\Models\User;
use App\Models\Daily;
use App\Models\DailyApproval;
use App\Models\Tracker;
use App\Models\Departemen;
use App\Models\GroupPage;
use App\Models\IssueApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\Tracer\Tracer;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_name = "DWM_Report";
        $user_group = auth()->user()->group_id;
        // $pages = DB::table('users')->leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        //     ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        //     ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        //     ->whereColumn('users.group_id', '=', 'groups.group_id')
        //     ->where('pages.page_name', '=', $page_name)
        //     ->where('group_pages.access', '=', 1)
        //     ->whereBetween('pages.page_id', [10, 14])
        //     ->where('group_pages.group_id','=', $user_group)
        //     ->select(['group_name', 'page_name', 'action', 'access'])
        //     ->limit(5)
        //     ->get();

        $pages = GroupPage::leftJoin('pages','pages.page_id','=','group_pages.page_id')
            ->where('pages.page_name','=',$page_name)
            ->where('group_pages.group_id','=',auth()->user()->group_id)
            ->get();

        $departemen = Departemen::select('name')->get();
        $tracker = DB::table('daily_trackers as d1')
            ->select(
                'd2.tracker_name as tracker_header',
                'd1.tracker_name',
                DB::raw('COALESCE(SUM(IFNULL(open.total, 0)), 0) as total_open'),
                DB::raw('COALESCE(SUM(IFNULL(close.total, 0)), 0) as total_close'),
                DB::raw('COALESCE(SUM(IFNULL(open.total, 0)), 0) + COALESCE(SUM(IFNULL(close.total, 0)), 0) as total')
            )
            ->leftJoin('daily_trackers as d2', 'd1.tracker_header', '=', 'd2.tracker_id')
            ->leftJoin(DB::raw('(SELECT tracker_id, SUM(CASE WHEN status IN ("New", "Continue") THEN 1 ELSE 0 END) as total FROM dailies GROUP BY tracker_id) as open'), 'd1.tracker_id', '=', 'open.tracker_id')
            ->leftJoin(DB::raw('(SELECT tracker_id, SUM(CASE WHEN status IN ("Complete", "Closed") THEN 1 ELSE 0 END) as total FROM dailies GROUP BY tracker_id) as close'), 'd1.tracker_id', '=', 'close.tracker_id')
            ->groupBy('d2.tracker_name', 'd1.tracker_name')
            ->where('d2.tracker_name', '=', request()->query('departemen'))
            ->get();

        $dailies = Daily::leftJoin('daily_trackers', 'dailies.tracker_id', '=', 'daily_trackers.tracker_id')
            ->leftJoin('departemens', 'dailies.departemen', '=', 'departemens.name')
            ->where('departemen', request()->query('departemen'))
            ->where('tracker_name', request()->query('tracker'))
            ->get();

        if (isset($_GET['departemen']) && isset($_GET['tracker'])) {
            $data = [
                'departemen' => request()->query('departemen'),
                'tracker' => request()->query('tracker')
            ];
            return view('daily.index_3', [
                'pages' => $pages,
                'dailies' => $dailies,
                'data' => $data
            ]);
        }

        if (isset($_GET['departemen'])) {
            return view('daily.index_2', [
                'pages' => $pages,
                'tracker' => $tracker
            ]);
        }

        return view('daily.index', [
            'pages' => $pages,
            'departemen' => $departemen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "DAY-";
        $lastCount = Daily::select('daily_id')->latest('daily_id')->pluck('daily_id')->first();
        $count = $lastCount + 1;
        $id = $prefix . str_pad($count, 7, '0', STR_PAD_LEFT) . "/" . $formattedDate;

        $data = [
            'departemen' => request()->query('departemen'),
            'tracker' => request()->query('tracker')
        ];

        $d_tracker = Tracker::where('tracker_name','=',$data['departemen'])->first();
       
        $tracker_header = $d_tracker->tracker_id;

        $tracker = Tracker::where('tracker_header','>',0)
        ->where('tracker_header','=', $tracker_header)
        ->get();

        return view('daily.create', [
            'daily' => $id,
            'users' => User::get(),
            'depts' => Departemen::get(),
            'trackers' => $tracker,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $daily = new Daily;
            $daily->daily_xid = $request->daily_xid;
            $daily->departemen = $request->departemen;
            $daily->subject = $request->subject;
            $daily->c_action = $request->c_action;
            $daily->description_daily = $request->description_daily;
            $daily->status = $request->status;
            $daily->priority = $request->priority;
            $daily->assignee = $request->assignee;
            $daily->pic = $request->pic;
            $daily->start_date = $request->start_date;
            $daily->end_date = $request->end_date;
            $daily->file = $request->file('file') ? $request->file('file')->store('dailies') : null;
            $daily->tracker_id = $request->tracker;
            $daily->is_open = 1;
            $daily->is_private = $request->input('is_private', 0);
            $daily->save();

            $daily_id = $daily->daily_id;

            $tracker = Tracker::where('tracker_id','=',$request->tracker)->first();
            $tracker_name = $tracker->tracker_name;

            $approvallist = ApprovalList::where('app_module','=','dwm')
            ->where('app_departemen','=',$request->departemen)
            ->get();

            foreach($approvallist as $app){
                $daily_approvals = new DailyApproval;
                $daily_approvals->daily_id = $daily_id;
                $daily_approvals->app_list_id = $app->app_list_id;
                $daily_approvals->dai_departemen = $app->app_departemen;
                $daily_approvals->dai_app_user = $app->app_user;
                $daily_approvals->dai_app_status = "Open";
                $daily_approvals->dai_app_ordinal = $app->app_ordinal;
                $daily_approvals->save();
            }

            return redirect('/daily?departemen='.$request->departemen.'&tracker='.$tracker_name)->with('sucess', 'Added Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Daily $daily)
    {
        return view('daily.show', [
            'daily' => Daily::where('departemen', $daily->departemen)->get()
        ]);
    }

    public function document(Daily $daily)
    {
        return view('daily.document', [
            'daily' => $daily
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daily $daily)
    {
        $tracker = Tracker::leftJoin('dailies', 'daily_trackers.tracker_id', '=', 'dailies.tracker_id')
        ->where('tracker_header','>',0)
        ->where('departemen','=',$daily->departemen)
        ->distinct('tracker_name')
        ->get();

        return view('daily.edit', [
            'daily' => $daily,
            'users' => User::get(),
            'depts' => Departemen::get(),
            'trackers' => $tracker,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daily $daily)
    {
        try {
            $validate = $this->validate($request, [
                'daily_id' => 'required',
                'daily_xid' => 'required',
                'departemen' => 'required',
                'subject' => 'required',
                'description' => 'required',
                'status' => 'required',
                'assignee' => 'required',
                'pic' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

            $validate['file'] = $request->file('file') ? $request->file('file')->store('dailies') : null;
            $validate['is_private'] = $request->input('is_private') ? $request->is_private : 0;
            $validate['c_action'] = $request->input('c_action');

            if ($daily->is_open == 1) {
                $validate['is_open'] ? $daily->is_open == 1 : $daily->is_open == 0;
            }

            Daily::where('daily_id', $daily->daily_id)->update($validate);

            return redirect('/daily')->with('sucess', 'Updated Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daily $daily)
    {
        try {
            Daily::destroy($daily->daily_id);

            $daily->file ? Storage::delete([$daily->file]) : Daily::destroy($daily->daily_id);

            return redirect()->route('/daily',)->with('success', 'Deleted Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    public function approved()
    {
        $data = [
            'departemen' => request('departemen'),
            'tracker' => request('tracker')
        ];

        return view('daily.approved',[
            'daily' => Daily::leftJoin('daily_trackers', 'dailies.tracker_id', '=', 'daily_trackers.tracker_id')->get(),
            'data' => $data
        ]);
    }

    public function requestApproved(Request $request, Daily $daily, DailyApproval $dailyApproval)
    {
        try {

        } catch(QueryException $e) {
            return $e->getMessage();
        }
    }
}
