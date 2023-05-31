<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Issue;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issue = Issue::where('status','like','closed')->get();

        return dd($issue);
        return view('doc.index',[
            'docs' => $issue
        ]);
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
        $doc = new Document;
        $doc->issue_xid = $request->issue_xid;
        $doc->project = $request->project;
        $doc->tracker = $request->tracker;
        $doc->assignee = $request->assignee;
        $doc->subject = $request->subject;
        $doc->description = $request->description;
        $doc->category = $request->category;
        $doc->status = $request->status;
        $doc->priority = $request->priority;
        $doc->c_action = $request->c_action;
        $doc->file = $request->file;
        $doc->start_date = $request->start_date;
        $doc->end_date = $request->end_date;
        $doc->is_private = $request->is_private;
        $doc->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
