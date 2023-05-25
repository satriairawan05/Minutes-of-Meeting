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
        ]);

        // cek apakah radio is_private di tekan
        $request->is_private ? $validate['is_private'] = true : $validate['is_private'] = false;

        // cek apakah ada upload file
        $request->file('file') ? $validate['file'] = $request->file('image')->store('images') : null;

        // menginsert data
        MeetDetail::create($validate);

        // mengembalikan ke halaman resume
        return redirect()->to('/resume')->with('success','Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(MeetDetail $meetDetail)
    {
        return view('admin.detail.show',[
            'meet_details' => $meetDetail
        ]);
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
        return redirect()->to('')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetDetail $meetDetail)
    {
        // cek apakah ada id nya
        $hapus = MeetDetail::destroy($meetDetail);

        // menghapus file
        $meetDetail->file ? Storage::delete([$meetDetail->file]) : $hapus;

        // mengembalikan ke halaman resume
        return redirect()->to('')->with('success','Deleted Successfully!');
    }
}
