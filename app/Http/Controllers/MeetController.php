<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Http\Requests\StoreMeetRequest;
use App\Http\Requests\UpdateMeetRequest;


class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('meet.data')->with([
            'meets' => Meet::paginate(15)
        ]);
    }

    public function list(){
        return view('meet.data')->with([
            'meets' => Meet::paginate(15)
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
     public function create()
     {
        $formattedDate = date('Ymd');
        $prefix = "MOM-";
        $lastCount = Meet::select('meet_id')->latest('meet_id')->pluck('meet_id')->first();
        $count = $lastCount + 1;
        $id_u = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;
        return view('meet.addmeet', ['meets' => $id_u]);
     }

    public function store(StoreMeetRequest $request)
    {
        $meet = new Meet;
        $meet->meet_xid = $request->txtmid;
        $meet->meet_name = $request->txtmname;
        $meet->meet_date = $request-> txtmdate;
        $meet->meet_time = $request->txtmtime;
        $meet->meet_preparedby = $request->txtmprepared;
        $meet->meet_locate = $request->txtmloc;
        $meet->meet_attend = $request->txtmatt;
        $meet->save();

        return redirect('meet')->with('msg','Add New Meeting Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);
        return view('meet.editmeet')->with([
            'txtmid' => $data->meet_id,
            'txtmxid' => $data->meet_xid,
            'txtmname' => $data->meet_name,
            'txtmdate' => $data->meet_date,
            'txtmtime' => $data->meet_time,
            'txtmprepared' => $data->meet_preparedby,
            'txtmloc' => $data->meet_locate,
            'txtmatt' => $data->meet_attend
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetRequest $request, Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);
        $data->meet_xid = $request->txtmxid;
        $data->meet_name = $request->txtmname;
        $data->meet_date = $request-> txtmdate;
        $data->meet_time = $request->txtmtime;
        $data->meet_preparedby = $request->txtmprepared;
        $data->meet_locate = $request->txtmloc;
        $data->meet_attend = $request->txtmatt;
        $data->save();

        return redirect('meet')->with('msg','Edit Meeting '.$data->meet_name.' ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);
        $data->delete();
        return redirect('meet')->with('msg','Data Meeting '.$data->meet_name.' dihapus');
    }
}
