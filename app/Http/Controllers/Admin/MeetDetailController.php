<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi yang wajib diisi
        $validate = $request->validate([
            'project' => 'required',
            'tracker' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'c_action' => 'required',
        ]);

        // cek apakah radio is_private di tekan
        $request->is_private ? $validate['is_private'] = true : $validate['is_private'] = false;

        // cek apakah ada upload file
        $request->file('file') ? $validate['file'] = $request->file('image')->store('images') : null;

        // menginsert data
        MeetDetail::create($validate);

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
        // yang wajib diisi
        $rules = [
            'project' => 'required',
            'tracker' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'c_action' => 'required',
        ];

        // memasukan rules ke validasi
        $validate = $request->validate($rules);

        // cek apakah gambarnya ada diinput yang baur
        if($request->file('file')){
            // cek nilai gambar lama nya
            if($request->oldFile){
                Storage::delete([$request->oldFile]);
            }
            $validate['file'] = $request->file('image')->store('images');
        }

        // mengupdate ke database
        MeetDetail::where('id',$meetDetail->id)->update($validate);

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
