<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('issue.index',[
            'issues' => Issue::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('issue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $issue = new Issue;
        $issue->project = $request->project;
        $issue->tracker = $request->tracker;
        $issue->subject = $request->subject;
        $issue->category = $request->category;
        $issue->status = $request->status;
        $issue->priority = $request->priority;
        $issue->description = $request->description;
        $issue->start_date = $request->start_date;
        $issue->end_date = $request->end_date;
        $issue->c_action = $request->c_action;
        $issue->assignee = $request->assignee;
        $request->file('file') ? $request->file('file')->store('images') : null;
        $issue->is_private = $request->is_private;
        $issue->created_at;
        $issue->save();

        return redirect('issue')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issue.show',[
            'meet' => $issue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        return view('issue.edit',[
            'data' => $issue
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $issue = Issue::find($issue->id);
        $issue->project = $request->project;
        $issue->tracker = $request->tracker;
        $issue->subject = $request->subject;
        $issue->category = $request->category;
        $issue->status = $request->status;
        $issue->priority = $request->priority;
        $issue->description = $request->description;
        $issue->start_date = $request->start_date;
        $issue->end_date = $request->end_date;
        $issue->c_action = $request->c_action;
        $issue->assignee = $request->assignee;
        $request->file('file') ? $request->file('file')->store('images') : null;
        $issue->is_private = $request->is_private;
        $issue->updated_at;
        $issue->save();

        return redirect('issue')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        Issue::destroy($issue->id);

        return redirect('issue')->with('success','Deleted Successfully!');
    }
}
