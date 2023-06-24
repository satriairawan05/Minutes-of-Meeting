<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Issue;
use App\Models\IssueApproval;
use App\Models\Daily;
use App\Models\DailyApproval;
use App\Models\ApprovalHistory;
use App\Models\ApprovalList;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $index = 'approve.index';
        $index2 = 'approve.index2';
        $index3 = 'approve.index3';
        $module = $request->module;
        $views = $index;

        $app_issues = Issue::leftJoin('issue_approvals', 'issue_approvals.issue_id', '=', 'issues.issue_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'issue_approvals.app_list_id')
            ->where('approval_lists.app_module', '=', 'issues')
            ->where('issues.status', '=', 'Complete')
            ->where('issue_approvals.iss_app_user','=',auth()->user()->id)
            ->where(function ($query) {
                $query->where('issue_approvals.iss_app_status','=','Open')
                ->orWhere('issue_approvals.iss_app_status','=','Rejected')
                ->orWhere('issue_approvals.iss_app_status','=','Need Revision');
            })
            ->groupBy('issues.issue_id')
            ->get();

        $app_dwm = Daily::leftJoin('daily_approvals', 'daily_approvals.daily_id', '=', 'dailies.daily_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'daily_approvals.app_list_id')
            ->where('approval_lists.app_module', '=', 'dwm')
            ->where('dailies.status', '=', 'Complete')
            ->where('daily_approvals.dai_app_user','=',auth()->user()->id)
            ->groupBy('dailies.daily_id')
            ->get();

        $app_before = IssueApproval::leftJoin('approval_lists','issue_approvals.app_list_id','=','approval_lists.app_list_id')
        ->get();

        $data = [
            'module' => $module,
            'app_issues' => $app_issues,
            'app_dwm' => $app_dwm
        ];
        if ($module) {
            $views = $module == 'issues' ? $index2 : $index3;
        }
        return view($views)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $idnya)
    {
        $app_issues = Issue::leftJoin('issue_approvals', 'issue_approvals.issue_id', '=', 'issues.issue_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'issue_approvals.app_list_id')
            ->leftJoin('meets','meets.meet_xid','=','issues.project')
            ->where('issues.issue_id','=',$idnya)
            ->where('approval_lists.app_user','=',auth()->user()->id)
            ->groupBy('issues.issue_id')
            ->first();

        $app_dwm = Daily::leftJoin('daily_approvals', 'daily_approvals.daily_id', '=', 'dailies.daily_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'daily_approvals.app_list_id')
            ->where('dailies.daily_id','=',$idnya)
            ->groupBy('dailies.daily_id')
            ->first();

        $module = $request->module;
        $data = [
            'module' => $module,
            'app_issues' => $app_issues,
            'app_dwm' => $app_dwm
        ];
        if ($module) {
            $views = $module == 'issues' ? 'approve.issues' : 'approve.dwm';
        }
        return view($views)->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $issue_id)
    {
        try {   
            $data = [
                'iss_app_status' => $request->iss_app_status,
                'iss_app_date' => now(),
                'iss_app_notes' => $request->app_his_note
            ];
            
            $issue_approval = IssueApproval::where('iss_app_id','=',$request->iss_app_id)->update($data);

            $approval_histories = new ApprovalHistory;
            $approval_histories->app_module = $request->module;
            $approval_histories->app_id = $request->iss_app_id;
            $approval_histories->app_user = auth()->user()->id;
            $approval_histories->app_status = $request->iss_app_status;
            $approval_histories->app_his_note = $request->app_his_note;
            $approval_histories->save();

            $issues_status = "Complete";

            if($request->iss_app_status == 'Need Revision' || $request->iss_app_status == 'Rejected'){
                $issues_status = "Continue";
            }

            $status_closed = 0;
            $closer = 0;

            $issue_app = IssueApproval::where('issue_id','=',$issue_id)->get();

            foreach($issue_app as $d){
                $status_closed = $d->iss_app_status == 'Approved' ? 1 : 0;
            }

            $approval_list = ApprovalList::where('app_user','=',auth()->user()->id)
            ->where('app_module','=','issues')->first();

            $closer = $approval_list->app_closer;
           
            if($status_closed == 1){
                $issues_status = "Closed";
            }

            if($closer == 1){
                $issues_status = "Closed";
            }

            $data = [
                'status' => $issues_status
            ];

            Issue::where('issue_id','=',$issue_id)->update($data);
            
            return redirect('/approval?module='.$request->module)->with('success','Data saved');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approval $approval)
    {
        //
    }
}
