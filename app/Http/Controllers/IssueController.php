<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('issue.index', [
            'issues' => Issue::get()
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
        if (Issue::whereNull('project')->latest()->get()) {
            return redirect('meet/create');
        }
        return view('issue.create', [
            'issue' => $id,
            'users' => User::get(),
            'meet' => Meet::latest()->first(),
            'depts' => Departemen::get()
        ]);
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
                'c_action' => ['required'],
                'assignee' => ['required']
            ]);


            if ($request->file('file')) {
                $validate['file'] = $request->file('file')->store('images');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Issue::create($validate);

            return redirect('issue')->with('success', 'Added Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issue.show', [
            'data' => $issue
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

    /**
     * Update the specified resource in storage.
     */
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
                $validate['file'] = $request->file('file')->store('images');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Issue::where('issue_id', $issue->issue_id)->update($validate);

            return redirect('issue')->with('success', 'Updated Successfully!');
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

            if ($issue->file) {
                Storage::delete([$issue->file]);
            }

            return redirect('issue')->with('success', 'Deleted Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
