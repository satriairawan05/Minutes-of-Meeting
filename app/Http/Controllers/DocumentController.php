<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use App\Models\Document;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Issue::where('status', '=', 'Closed')->get();

        return view('doc.index', [
            'docs' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doc.create',[
            'issue' => Issue::where('status', '=', 'Closed')->get(),
            'depts' => Departemen::get(),
            'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doc = new Document;
        $doc->issue_xid = $request->issue_xid;
        $doc->start_date = $request->start_date;
        $doc->end_date = $request->end_date;
        $doc->project = $request->project;
        $doc->tracker = $request->tracker;
        $doc->assignee = $request->assignee;
        $doc->description = $request->description;
        $doc->subject = $request->subject;
        $doc->status = $request->status;
        $doc->c_action = $request->c_action;
        $doc->file = $request->file;
        $doc->is_private = $request->is_private;
        $doc->save();

        return redirect('/document')->with('success', 'Added Document Successfully');
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
        return view('doc.edit', [
            'doc' => Issue::where('status', '=', 'Closed')->get(),
            'depts' => Departemen::get(),
            'users' => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $doc = new Document;
        $doc->issue_xid = $request->issue_xid;
        $doc->start_date = $request->start_date;
        $doc->end_date = $request->end_date;
        $doc->project = $request->project;
        $doc->tracker = $request->tracker;
        $doc->assignee = $request->assignee;
        $doc->description = $request->description;
        $doc->subject = $request->subject;
        $doc->status = $request->status;
        $doc->c_action = $request->c_action;
        $doc->file = $request->file;
        $doc->is_private = $request->is_private;
        $doc->save();

        return redirect('/document')->with('success', 'Updated Document Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Document::destroy($document->id);

        if ($document->document) {
            Storage::delete([$document->document]);
        }

        return redirect('/document')->with('success', 'Deleted Document Successfully');
    }
}
