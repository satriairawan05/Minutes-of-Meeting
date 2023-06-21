<?php

namespace App\Http\Controllers;

use App\Models\ArchiveIssue;
use App\Models\Departemen;
use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_name = "Issue";
        $user_group = auth()->user()->group_id;
        $pages = DB::table('users')->leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->whereColumn('users.group_id', '=', 'groups.group_id')
        ->where('pages.page_name', '=', $page_name)
        ->where('group_pages.access', '=', 1)
        ->whereBetween('pages.page_id', [5, 9])
        ->where('group_pages.group_id','=', $user_group)
        ->select(['group_name', 'page_name', 'action', 'access'])
        ->limit(5)
        ->get();

        $issue = Issue::distinct('tracker')->orderBy('tracker')->paginate(15);

        return view('issue.index', [
            'issues' => $issue,
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "ISSUE-";
        $lastCount = Issue::select('issue_id')->latest('issue_id')->pluck('issue_id')->first();
        $count = $lastCount + 1;
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;

        if (Issue::whereNotNull('project')->latest()->get()) {
            return view('issue.create', [
                'issue' => $id,
                'users' => User::get(),
                'meet' => Meet::latest()->first(),
                'depts' => Departemen::get()
            ]);
        }

        return redirect('meet/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'issue_xid' => ['required'],
                'project' => ['required'],
                'tracker' => ['required'],
                'subject' => ['required'],
                'status' => ['required'],
                'priority' => ['required'],
                'description' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
                'assignee' => ['required'],
                'pic' => ['required'],
            ]);

            if ($request->input('c_action')) {
                $validate['c_action'] = $request->input('c_action');
            }

            if ($request->file('file')) {
                $validate['file'] = $request->file('file')->store('images');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Issue::create($validate);

            return redirect('issue')->with('success', 'Added Issue Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issue.approval');
    }

    public function documentIssue(Issue $issue)
    {
        return view('issue.document', [
            'issue' => $issue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        return view('issue.edit', [
            'data' => $issue,
            'meet' => Meet::latest()->first(),
            'depts' => Departemen::get(),
            'users' => User::get()
        ]);
    }

    public function approvedForm()
    {
        return view('issue.approved',[
            'approved' => Issue::get()
        ]);
    }


    public function approved(Request $request, Issue $issue)
    {
        return dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        try {
            $validate = $request->validate([
                'issue_id' => ['required'],
                'issue_xid' => ['required'],
                'project' => ['required'],
                'tracker' => ['required'],
                'subject' => ['required'],
                'status' => ['required'],
                'priority' => ['required'],
                'description' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
                'assignee' => ['required'],
                'pic' => ['required'],
            ]);

            if ($request->input('c_action')) {
                $validate['c_action'] = $request->input('c_action');
            }

            if ($request->file('file')) {
                if ($request->oldFile) {
                    Storage::delete([$request->oldFile]);
                }
                $validate['file'] = $request->file('file')->store('images');
            }

            $request->input('is_private') ? $request->is_private : 0;

            if ($request->input('status') == "Closed") {
                Issue::where('issue_id', $issue->issue_id)->update($validate);
                ArchiveIssue::create($validate);
            } else {
                Issue::where('issue_id', $issue->issue_id)->update($validate);
            }

            return redirect('issue')->with('success', 'Update Issue Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        try {
            Issue::destroy($issue->issue_id);

            $issue->file ? Storage::delete([$issue->file]) : Issue::destroy($issue->issue_id);

            return redirect('issue')->with('success', 'Deleted Issue Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
