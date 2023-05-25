<?php

namespace App\Http\Controllers\Admin;

use App\Models\MeetDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.detail.index',[
            'details' => MeetDetail::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.detail.create');
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
    public function show(MeetDetail $meetDetail)
    {
        return view('admin.detail.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetDetail $meetDetail)
    {
        return view('admin.detail.edit',[
            'detail' => $meetDetail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetDetail $meetDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetDetail $meetDetail)
    {
        //
    }
}
