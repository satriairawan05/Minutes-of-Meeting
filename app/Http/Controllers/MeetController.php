<?php

namespace App\Http\Controllers;

use App\Models\GroupPage;
use App\Models\Meet;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('meet.index', [
            'meets' => Meet::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "MOM-";
        $lastCount = Meet::select('meet_id')->latest('meet_id')->pluck('meet_id')->first();
        $count = $lastCount + 1;
        $id_u = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;

        return view('meet.create', [
            'meet_id' => $id_u,
            'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $meet = new Meet;
            $meet->meet_xid = $request->meet_xid;
            $meet->meet_name = $request->meet_name;
            $meet->meet_project = $request->meet_project;
            $meet->meet_preparedby = $request->meet_preparedby;
            $meet->meet_date = $request->meet_date;
            $meet->meet_time = $request->meet_time;
            $meet->meet_attend = implode(" ", $request->meet_attend);
            $meet->meet_locate = $request->meet_locate;
            $meet->save();

            return redirect('/meet')->with('success', 'Added Meet Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $meet)
    {
        return view('meet.rapat', [
            'meet' => $meet,
            'issue' => Issue::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meet $meet)
    {
        return view('meet.edit', [
            'meets' => $meet,
            'users' => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meet $meet)
    {
        try {
            $validate['meet_xid'] = $request->input('meet_xid');
            $validate['meet_name'] = $request->input('meet_name');
            $validate['meet_project'] = $request->input('meet_project');
            $validate['meet_date'] = $request->input('meet_date');
            $validate['meet_time'] = $request->input('meet_time');
            $validate['meet_preparedby'] = $request->input('meet_preparedby');
            $validate['meet_locate'] = $request->input('meet_locate');
            $validate['meet_attend'] = implode(" ", $request->meet_attend);

            Meet::where('meet_id', $meet->meet_id)->update($validate);

            return redirect('/meet')->with('success', 'Updated Meet Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $meet)
    {
        try {
            Meet::destroy($meet->meet_id);

            return redirect('/meet')->with('success', 'Deleted Meet Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
