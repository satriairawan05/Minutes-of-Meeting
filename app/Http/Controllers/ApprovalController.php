<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Issue;
use App\Models\IssueApproval;
use App\Models\Daily;
use App\Models\DailyApproval;
use App\Models\ApprovalHistory;
use App\Models\ApprovalList;
use App\Models\ArchiveDaily;
use App\Models\ArchiveIssue;
use App\Models\GroupPage;
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
        $page_name = "Approval";
        $pages = GroupPage::leftJoin('pages', 'pages.page_id', '=', 'group_pages.page_id')
            ->where('pages.page_name', '=', $page_name)
            ->where('group_pages.group_id', '=', auth()->user()->group_id)
            ->get();

        $index = 'approve.index';
        $index2 = 'approve.index2';
        $index3 = 'approve.index3';
        $module = $request->module;
        $views = $index;

        $app_issues = Issue::leftJoin('issue_approvals', 'issue_approvals.issue_id', '=', 'issues.issue_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'issue_approvals.app_list_id')
            ->where('approval_lists.app_module', '=', 'issues')
            ->where('issues.status', '=', 'Complete')
            ->where('issue_approvals.iss_app_user', '=', auth()->user()->id)
            ->where(function ($query) {
                $query->where('issue_approvals.iss_app_status', '=', 'Open')
                    ->orWhere('issue_approvals.iss_app_status', '=', 'Rejected')
                    ->orWhere('issue_approvals.iss_app_status', '=', 'Need Revision');
            })
            ->groupBy('issues.issue_id')
            ->get();

        $app_dwm = Daily::leftJoin('daily_approvals', 'daily_approvals.daily_id', '=', 'dailies.daily_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'daily_approvals.app_list_id')
            ->where('approval_lists.app_module', '=', 'dwm')
            ->where('dailies.status', '=', 'Complete')
            ->where('daily_approvals.dai_app_user', '=', auth()->user()->id)
            ->where(function ($query) {
                $query->where('daily_approvals.dai_app_status', '=', 'Open')
                    ->orWhere('daily_approvals.dai_app_status', '=', 'Rejected')
                    ->orWhere('daily_approvals.dai_app_status', '=', 'Need Revision');
            })
            ->groupBy('dailies.daily_id')
            ->get();

        // $app_before = IssueApproval::leftJoin('approval_lists','issue_approvals.app_list_id','=','approval_lists.app_list_id')
        // ->get();

        // $app_before_dwm = DailyApproval::leftJoin('approval_lists','daily_approvals.app_list_id','=','approval_lists.app_list_id')
        // ->get();

        $data = [
            'pages' => $pages,
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
            ->leftJoin('meets', 'meets.meet_xid', '=', 'issues.project')
            ->where('issues.issue_id', '=', $idnya)
            ->where('approval_lists.app_user', '=', auth()->user()->id)
            ->groupBy('issues.issue_id')
            ->first();

        $app_dwm = Daily::leftJoin('daily_approvals', 'daily_approvals.daily_id', '=', 'dailies.daily_id')
            ->leftJoin('approval_lists', 'approval_lists.app_list_id', '=', 'daily_approvals.app_list_id')
            ->leftJoin('daily_trackers', 'daily_trackers.tracker_id', '=', 'dailies.tracker_id')
            ->where('dailies.daily_id', '=', $idnya)
            ->where('approval_lists.app_user', '=', auth()->user()->id)
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
    public function update(Request $request, String $idnya)
    {
        try {
            if ($request->module == "issues") {
                $data = [
                    'iss_app_status' => $request->iss_app_status,
                    'iss_app_date' => now(),
                    'iss_app_notes' => $request->app_his_note
                ];

                $issue_approval = IssueApproval::where('iss_app_id', '=', $request->iss_app_id)->update($data);

                $approval_histories = new ApprovalHistory;
                $approval_histories->app_module = $request->module;
                $approval_histories->app_id = $request->iss_app_id;
                $approval_histories->app_user = auth()->user()->id;
                $approval_histories->app_status = $request->iss_app_status;
                $approval_histories->app_his_note = $request->app_his_note;
                $approval_histories->save();

                $issues_status = "Complete";

                if ($request->iss_app_status == 'Need Revision' || $request->iss_app_status == 'Rejected') {
                    $issues_status = "Continue";
                }

                $status_closed = 0;
                $closer = 0;

                $issue_app = IssueApproval::where('issue_id', '=', $idnya)->get();

                foreach ($issue_app as $d) {
                    $status_closed = $d->iss_app_status == 'Approved' ? 1 : 0;
                }

                // $approval_list = ApprovalList::where('app_user', '=', auth()->user()->id)
                //     ->where('app_module', '=', 'issues')->first();

                // $closer = $approval_list->app_closer;

                if ($status_closed == 1) {
                    $issues_status = "Closed";
                }

                // if ($closer == 1) {
                //     $issues_status = "Closed";
                // }

                $data = [
                    'status' => $issues_status
                ];

                Issue::where('issue_id', '=', $idnya)->update($data);

                if ($issues_status == 'Closed') {
                    $iss = Issue::where('issue_id', '=', $idnya)->first();
                    $arc_iss = new ArchiveIssue;
                    $arc_iss->issue_id = $iss->issue_id;
                    $arc_iss->issue_xid = $iss->issue_xid;
                    $arc_iss->project = $iss->project;
                    $arc_iss->tracker = $iss->tracker;
                    $arc_iss->subject = $iss->subject;
                    $arc_iss->c_action = $iss->c_action;
                    $arc_iss->description = $iss->description;
                    $arc_iss->status = $iss->status;
                    $arc_iss->priority = $iss->priority;
                    $arc_iss->start_date = $iss->start_date;
                    $arc_iss->end_date = $iss->end_date;
                    $arc_iss->file = $iss->file;
                    $arc_iss->assignee = $iss->assignee;
                    $arc_iss->is_private = $iss->private;
                    $arc_iss->save();
                }
            } else {
                $data = [
                    'dai_app_status' => $request->dai_app_status,
                    'dai_app_date' => now(),
                    'dai_app_notes' => $request->app_his_note
                ];

                $daily_approval = DailyApproval::where('dai_app_id', '=', $request->dai_app_id)->update($data);

                $approval_histories = new ApprovalHistory;
                $approval_histories->app_module = $request->module;
                $approval_histories->app_id = $request->dai_app_id;
                $approval_histories->app_user = auth()->user()->id;
                $approval_histories->app_status = $request->dai_app_status;
                $approval_histories->app_his_note = $request->app_his_note;
                $approval_histories->save();

                $issues_status = "Complete";
                $is_open = 1;

                if ($request->dai_app_status == 'Need Revision' || $request->dai_app_status == 'Rejected') {
                    $issues_status = "Continue";
                }

                $status_closed = 0;
                $closer = 0;

                $daily_app = DailyApproval::where('daily_id', '=', $idnya)->get();

                foreach ($daily_app as $d) {
                    $status_closed = $d->dai_app_status == 'Approved' ? 1 : 0;
                }

                // $approval_list = ApprovalList::where('app_user', '=', auth()->user()->id)
                //     ->where('app_departemen','=',$request->departemen)
                //     ->where('app_module', '=', 'dwm')->first();

                // $closer = $approval_list->app_closer;

                if ($status_closed == 1) {
                    $issues_status = "Closed";
                    $is_open = 0;
                }

                // if ($closer == 1) {
                //     $issues_status = "Closed";
                // }

                $data = [
                    'status' => $issues_status,
                    'is_open' => $is_open
                ];

                Daily::where('daily_id', '=', $idnya)->update($data);

                if ($issues_status == 'Closed') {
                    $dai = Daily::where('daily_id', '=', $idnya)->first();
                    $arc = new ArchiveDaily();
                    $arc->daily_id = $dai->daily_id;
                    $arc->daily_xid = $dai->daily_xid;
                    $arc->departemen = $dai->departemen;
                    $arc->subject = $dai->subject;
                    $arc->c_action = $dai->c_action;
                    $arc->description = $dai->description_daily;
                    $arc->status = $dai->status;
                    $arc->start_date = $dai->start_date;
                    $arc->end_date = $dai->end_date;
                    $arc->file = $dai->file;
                    $arc->assignee = $dai->assignee;
                    $arc->pic = $dai->pic;
                    $arc->is_private = $dai->is_private;
                    $arc->priority = $dai->priority;
                    $arc->save();
                }
            }

            return redirect('/approval?module=' . $request->module)->with('success', 'Data saved');
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
