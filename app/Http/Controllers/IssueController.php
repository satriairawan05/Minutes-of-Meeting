<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('issue.index',[
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
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) ."/".$formattedDate;
        return view('issue.create',[
            'issue' => $id,
            'users' => User::get(),
            'meet' => Meet::latest()->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $issue = new Issue;
        $issue->issue_xid = $request->input('issue_xid');
        $issue->project = $request->input('project');
        $issue->tracker = $request->input('tracker');
        $issue->subject = $request->input('subject');
        $issue->status = $request->input('status');
        $issue->priority = $request->input('priority');
        $issue->description = $request->input('description');
        $issue->start_date = $request->input('start_date');
        $issue->end_date = $request->input('end_date');
        $issue->c_action = $request->input('c_action');
        $issue->assignee = $request->input('assignee');
        $issue->created_at;

        if($request->file('file')){
            $issue->file = $request->file('file')->store('images');
        }

        if($request->input('is_private')){
            $issue->is_private = $request->is_private;
        } else {
            $issue->is_private = 0;
        }

        $issue->save();

        return redirect('issue')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issue.show',[
            'data' => $issue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        return view('issue.edit',[
            'data' => $issue,
            'meet' => Meet::latest()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $issue = Issue::find($issue->issue_id);
        $issue->project = $request->input('project');
        $issue->tracker = $request->input('tracker');
        $issue->subject = $request->input('subject');
        $issue->status = $request->input('status');
        $issue->priority = $request->input('priority');
        $issue->description = $request->input('description');
        $issue->start_date = $request->input('start_date');
        $issue->end_date = $request->input('end_date');
        $issue->c_action = $request->input('c_action');
        $issue->assignee = $request->input('assignee');
        if($request->file('file')){
            if($request->oldFile){
                Storage::delete([$request->oldFile]);
            }
            $issue->file = $request->file('file')->store('images');
        }

        if($request->input('is_private') == $issue->is_private){
            $issue->is_private = $request->is_private;
        } else {
            $issue->is_private = 0;
        }
        $issue->updated_at;
        $issue->save();

        return redirect('issue')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        Issue::destroy($issue->issue_id);

        if($issue->file){
            Storage::delete([$issue->file]);
        }

        return redirect('issue')->with('success','Deleted Successfully!');
    }
}
