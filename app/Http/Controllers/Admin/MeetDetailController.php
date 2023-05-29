<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meet;
use App\Models\MeetDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MeetDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.detail.index',[
            'meetDetails' =>  MeetDetail::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.detail.create',[
            'meets' => Meet::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $issues = new MeetDetail;
        $issues->meet_id = $request->meet_id;
        $issues->project = $request->project;
        $issues->subject = $request->subject;
        $issues->tracker = $request->tracker;
        $issues->priority  = $request->priority;
        $issues->description = $request->description;
        $issues->status = $request->status;
        $issues->start_date = $request->start_date;
        $issues->end_date = $request->end_date;
        $issues->c_action = $request->c_action;
        $issues->assigned = $request->assigned;

        // cek apakah radio is_private di tekan
        $issues->is_private = $request->is_private ? true : false;

        // cek apakah ada upload file
        $issues->file = $request->file('file') ? $request->file('image')->store('images') : null;

        // menginsert data
        $issues->save();

        // mengembalikan ke halaman resume
        return redirect()->to('/issue')->with('success','Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(MeetDetail $meetDetail, $meet_id)
    {
        $meet = MeetDetail::find($meet_id);
        return view('admin.detail.show',[
            'meet' => $meet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetDetail $meetDetail, $meet_id)
    {
        $data = MeetDetail::find($meet_id);
        return view('admin.detail.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetDetail $meetDetail)
    {
        $issues = new MeetDetail;
        $issues->meet_id = $request->meet_id;
        $issues->project = $request->project;
        $issues->subject = $request->subject;
        $issues->tracker = $request->tracker;
        $issues->description = $request->description;
        $issues->status = $request->status;
        $issues->start_date = $request->start_date;
        $issues->end_date = $request->end_date;
        $issues->c_action = $request->c_action;
        $issues->assigned = $request->assigned;
        $issues->priority = $request->priority;

        // cek apakah gambarnya ada diinput yang baru
        if($request->file('file')){
            // cek nilai gambar lama nya
            if($request->oldFile){
                Storage::delete([$request->oldFile]);
            }
            $issues->file = $request->file('image')->store('images');
        }

        // mengupdate ke database
        $issues->save();

        // mengembalikan ke halaman resume
        return redirect()->to('/issue')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetDetail $meetDetail, $meet_id)
    {
        // cek apakah ada id nya
        $data = MeetDetail::find($meet_id);

        // menghapus file
        $meetDetail->file ? Storage::delete([$meetDetail->file]) : $data->delete();

        // mengembalikan ke halaman resume
        return redirect()->to('/issue')->with('success','Deleted Successfully!');
    }
}
