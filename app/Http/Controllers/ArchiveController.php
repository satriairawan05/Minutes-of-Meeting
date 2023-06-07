<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Issue;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('archive.index',[
            'archives' => Archive::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archive.create',[
            'meet' => Meet::latest('meet_id')->get(),
            'users' => User::get(),
            'issues' => Issue::where('issue_id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Archive $archive, Meet $meet, Issue $issue)
    {
        try {

        } catch(QueryException $e) {
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

        } catch(QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        try {

        } catch(QueryException $e) {
            return $e->getMessage();
        }
    }
}
