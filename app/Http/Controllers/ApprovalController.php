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
            ->get();

        $app_dwm = Daily::leftJoin('daily_approvals', 'daily_approvals.daily_id', '=', 'dailies.daily_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'daily_approvals.app_list_id')
            ->where('approval_lists.app_module', '=', 'dwm')
            ->where('dailies.status', '=', 'Complete')
            ->where('daily_approvals.dai_app_user','=',auth()->user()->id)
            ->get();

        $data = [
            'module' => $module,
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
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approval $approval)
    {
        //
    }
}
