<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function resume(Meet $meet)
    {
        $meets = Meet::select('meet_xid')->latest('meet_xid')->pluck('meet_xid')->first();
        $issues = Issue::select('project')->leftJoin('meets', 'meets.meet_xid', '=', 'issues.project')->where('status', '!=', 'Closed')->update(['project' => $meets]);

        return view('resume.index', [
            'meet' => $meet,
            'issues' => $issues,
            'issue' => Issue::get()
        ]);
    }

    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "ISSUE-";
        $lastCount = Issue::select('issue_id')->latest('issue_id')->pluck('issue_id')->first();
        $count = $lastCount + 1;
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;
        return view('resume.create', [
            'issue' => $id,
            'users' => User::get(),
            'meet' => Meet::latest()->first(),
            'depts' => Departemen::get()
        ]);
    }

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
                'c_action' => ['required'],
                'assignee' => ['required']
            ]);

            if ($request->file('file')) {
                $validate['file'] = $request->file('file')->store('documents');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Issue::create($validate);

            return back()->with('success', 'Added Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    public function edit(Issue $issue)
    {
        return view('resume.edit', [
            'data' => $issue,
            'meet' => Meet::latest()->first(),
            'depts' => Departemen::get(),
            'users' => User::get()
        ]);
    }

    public function update(Request $request, Issue $issue)
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
                'c_action' => ['required'],
                'assignee' => ['required']
            ]);

            if ($request->file('file')) {
                if ($request->oldFile) {
                    Storage::delete([$request->oldFile]);
                }
                $validate['file'] = $request->file('file')->store('documents');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Issue::where('issue_id', $issue->issue_id)->update($validate);

            return back()->with('success', 'Updated Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Issue $issue)
    {
        Issue::destroy($issue->issue_id);

        if ($issue->file) {
            Storage::delete([$issue->file]);
        }

        return back()->with('success', 'Deleted Successfully!');
    }
}
