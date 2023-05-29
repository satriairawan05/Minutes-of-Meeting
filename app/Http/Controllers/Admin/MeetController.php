<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetRequest;
use App\Http\Requests\UpdateMeetRequest;


class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meet = Meet::where('meet_locate', '=', 'Head Office')->latest('updated_at')->lazy();
        return view('admin.meet.detailmeet', compact('meet'));
    }

    public function list()
    {
        return view('admin.meet.data')->with([
            'meets' => Meet::all()
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeetRequest $request)
    {
        $meet = new Meet;
        $meet->meet_id = $request->txtmid;
        $meet->meet_name = $request->txtmname;
        $meet->meet_date = $request->txtmdate;
        $meet->meet_time = $request->txtmtime;
        $meet->meet_preparedby = $request->txtmprepared;
        $meet->meet_locate = $request->txtmloc;
        $meet->meet_attend = $request->txtmatt;
        $meet->save();

        return redirect('meet/list')->with('msg', 'Add New Meeting Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);

        return view('admin.meet.editmeet')->with([
            'txtmid' => $data->meet_id,
            'txtmname' => $data->meet_name,
            'txtmdate' => $data->meet_date,
            'txtmtime' => $data->meet_time,
            'txtmprepared' => $data->meet_preparedby,
            'txtmloc' => $data->meet_locate,
            'txtmatt' => $data->meet_attend
            // Add other variables here
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetRequest $request, Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);

        $data->meet_name = $request->txtmname;
        $data->meet_date = $request->txtmdate;
        $data->meet_time = $request->txtmtime;
        $data->meet_preparedby = $request->txtmprepared;
        $data->meet_locate = $request->txtmloc;
        $data->meet_attend = $request->txtmatt;
        $data->save();


        return redirect('meet/list')->with('msg', 'Edit Meeting ' . $data->meet_name . ' ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $meets, $meet_id)
    {
        $data = $meets->find($meet_id);

        $data->delete();

        return redirect('meet/list')->with('msg', 'Data Meeting ' . $data->meet_name . ' dihapus');
    }
}
