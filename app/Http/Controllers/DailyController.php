<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Daily;
use App\Models\Departemen;
use App\Models\ArchiveDaily;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->whereBetween('pages.page_id',[9,12])
        ->orWhere('pages.page_name', 'DWM Report')
        ->orWhere('group_pages.access', 1)
        ->get();

        return view('daily.index', [
            'dailies' => Daily::distinct('departemen')->get('departemen'),
            'pages' => $pages
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
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;

        return view('daily.create', [
            'daily' => $id,
            'users' => User::get(),
            'depts' => Departemen::get()
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
            $daily->is_private = $request->input('is_private',0);
            $daily->save();

            $archiveDaily = new ArchiveDaily;
            $archiveDaily->daily_id = +1;
            $archiveDaily->daily_xid = $request->daily_xid;
            $archiveDaily->departemen = $request->departemen;
            $archiveDaily->subject = $request->subject;
            $archiveDaily->c_action = $request->c_action;
            $archiveDaily->description = $request->description_daily;
            $archiveDaily->status = $request->status;
            $archiveDaily->priority = $request->priority;
            $archiveDaily->assignee = $request->assignee;
            $archiveDaily->pic = $request->pic;
            $archiveDaily->start_date = $request->start_date;
            $archiveDaily->end_date = $request->end_date;
            $archiveDaily->file = $request->file('file') ? $request->file('file')->store('dailies') : null;
            $archiveDaily->is_private = $request->input('is_private',0);
            $archiveDaily->save();

            return redirect('/daily')->with('sucess','Added Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Daily $daily)
    {
        return view('daily.show',[
            'daily' => Daily::where('subject',$daily->subject)->get()
        ]);
    }

    public function document(Daily $daily)
    {
        return view('daily.document',[
            'daily' => $daily
        ]);
    }

       /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daily $daily)
    {
        return view('daily.edit', [
            'daily' => $daily,
            'users' => User::get(),
            'depts' => Departemen::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daily $daily, ArchiveDaily $archiveDaily)
    {
        try {
            $validate = $this->validate($request,[
                'daily_id' => 'required',
                'daily_xid' => 'required',
                'departemen' => 'required',
                'subject' => 'required',
                'description' => 'required',
                'status' => 'required',
                'priority' => 'required',
                'assignee' => 'required',
                'pic' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

            $validate['file'] = $request->file('file') ? $request->file('file')->store('dailies') : null;
            $validate['is_private'] = $request->input('is_private') ? $request->is_private : 0;
            $validate['c_action'] = $request->input('c_action');

            Daily::where('daily_id',$daily->daily_id)->update($validate);
            ArchiveDaily::where('arc_daily_id',$archiveDaily->arc_daily_id)->update($validate);

            return redirect('/daily')->with('sucess','Updated Daily Successfully!');
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
}
