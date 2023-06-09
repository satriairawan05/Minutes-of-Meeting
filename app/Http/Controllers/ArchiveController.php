<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Issue;
use App\Models\Meet;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('archive.index', [
            'archives' => Archive::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Meet $meet, Issue $issue)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Archive $archive, Meet $meet, Issue $issue)
    {
        try {
            $issue = Issue::leftJoin('meets', 'meets.meet_xid', '=', 'issues.project')->where('issues.project', '=', $meet->meet_xid)->get();

            foreach ($issue as $isu) {
                $arc = new Archive;
                $arc->meet_id = $isu->meet_id;
                $arc->meet_xid = $isu->meet_xid;
                $arc->meet_name = $isu->meet_name;
                $arc->meet_project = $isu->meet_project;
                $arc->meet_date = $isu->meet_date;
                $arc->meet_time = $isu->meet_time;
                $arc->meet_attend = $isu->meet_attend;
                $arc->meet_preparedby = $isu->meet_preparedby;
                $arc->meet_locate = $isu->meet_locate;
                $arc->issue_id = $isu->issue_id;
                $arc->issue_xid = $isu->issue_xid;
                $arc->project = $isu->project;
                $arc->tracker = $isu->tracker;
                $arc->subject = $isu->subject;
                $arc->status = $isu->status;
                $arc->priority = $isu->priority;
                $arc->description = $isu->description;
                $arc->start_date = $isu->start_date;
                $arc->end_date = $isu->end_date;
                $arc->c_action = $isu->c_action;
                $arc->assignee = $isu->assignee;
                $arc->file = $isu->file;
                $arc->is_private = $isu->is_pirvate;
                $arc->save();
            }

            return redirect()->route('resume.meet', $meet->meet_id)->with('success', 'Added Archive Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archive $archive, Meet $meet, Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive, Meet $meet, Issue $issue)
    {
        try {
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        try {
            Archive::destroy('archive_id', $archive->archive_id);

            return redirect('archive')->with('success', 'Deleted Archive Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
