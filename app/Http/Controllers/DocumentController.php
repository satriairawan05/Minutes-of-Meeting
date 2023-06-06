<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Meet;
use App\Models\Issue;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Issue::join('meets', fn (JoinClause $join) => $join->on('issues.project','=','meets.meet_xid'))->get();
        // return dd($data);
        return view('doc.index', [
            'docs' => $data,
            'meet' => Meet::latest()->get()->first(),
            'documents' => Document::paginate(15)
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
        //
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

    public function showForm(Document $document, Issue $issue)
    {
        // cek apa isunya ada, atau sama dengan 1 atau kurang dari 0
        if ($issue != null || $issue == 1 || $issue < 0) {
            // cek apakah dod_id nya tidak kosong
            if ($document->doc_id == null) {
                // tambah kan 1 setiap tombol di klik
                $document->doc_id = +1;
            }
            // menyimpan data ke document
            $document->issue_id = $issue->issue_id;
            $document->issue_xid = $issue->issue_xid;
            $document->project = $issue->project;
            $document->tracker = $issue->tracker;
            $document->subject = $issue->subject;
            $document->c_action = $issue->c_action;
            $document->description = $issue->description;
            $document->status = $issue->status;
            $document->priority = $issue->priority;
            $document->start_date = $issue->start_date;
            $document->end_date = $issue->end_date;
            $document->assignee = $issue->assignee;
            $document->file = $issue->file;
            $document->is_private = $issue->is_private;
            $document->save();

            return redirect('document')->with('success', 'Added Archive Successfully');
        } else {
            // jika data tidak sesuai
            return back()->with('fail', 'Not Found');
        }
    }

    public function editForm(Document $document, Issue $issue)
    {
        return view('doc.issue_edit',[
            'depts' => Departemen::get(),
            'users' => User::get(),
            'document' => $document,
            'issue' => $issue
        ]);
    }

    public function updateForm(Document $document, Issue $issue)
    {
        // cek priority atau tracker atau status sebelumnya sama
        if ($document->tracker == $issue->tracker || $document->status == $issue->status || $document->priority == $issue->priority) {
            // update datanya
            $document->where('doc_id',$document->doc_id)->update([
                $document->issue_id = $issue->issue_id,
                $document->issue_xid = $issue->issue_xid,
                $document->project = $issue->project,
                $document->tracker = $issue->tracker,
                $document->subject = $issue->subject,
                $document->c_action = $issue->c_action,
                $document->description = $issue->description,
                $document->status = $issue->status,
                $document->priority = $issue->priority,
                $document->start_date = $issue->start_date,
                $document->end_date = $issue->end_date,
                $document->assignee = $issue->assignee,
                $document->file = $issue->file,
                $document->is_private = $issue->is_private,
            ]);

            return redirect('document')->with('success', 'Updated Archive Successfully');
        }

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
