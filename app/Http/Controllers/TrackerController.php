<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tracker.index',[
            'trackers' => Tracker::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tracker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'tracker_name' => 'required',
        ]);

        if($request->tracker_header){
            $validate['tracker_header'] = implode(" ", $request->tracker_header);
        } else {
            $validate['tracker_header'] = 0;
        }

        Tracker::create($validate);

        return redirect('tracker')->with('success','Added Tracker Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracker $tracker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracker $tracker)
    {
        return view('tracker.edit',[
            'tracker' => $tracker
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracker $tracker)
    {
        $rules = [
            'tracker_name' => 'required',
        ];

        $validate = $request->validate($rules);

        if($request->tracker_header){
            $validate['tracker_header'] = implode(" ", $request->tracker_header);
        } else {
            $validate['tracker_header'] = 0;
        }

        Tracker::where('tracker_id',$tracker->tracker_id)->update($validate);

        return redirect('tracker')->with('success','Updated Tracker Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracker $tracker)
    {
        Tracker::destroy($tracker->tracker_id);

        return redirect('tracker')->with('success','Deleted Tracker Successfully!');
    }
}