<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Daily;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daily.index', [
            'dailies' => Daily::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formattedDate = date('mY');
        $prefix = "DAY-";
        $lastCount = Daily::select('daily_id')->latest('daily_id')->pluck('daily_id')->first();
        $count = $lastCount + 1;
        $id = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $formattedDate;

        return view('daily.create', [
            'daily' => $id,
            'users' => User::get(),
            'depts' => Departemen::get()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'daily_xid' => ['required','unique:dailies'],
                'departemen' => ['required'],
                'subject' => ['required'],
                'c_action' => ['required'],
                'description' => ['required'],
                'status' => ['required'],
                'assignee' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);

            if ($request->file('file')) {
                $validate['file'] = $request->file('file')->store('dailies');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Daily::create($validate);

            return redirect('/daily')->with('sucess','Added Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Daily $daily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daily $daily)
    {
        return view('daily.edit', [
            'daily' => $daily,
            'users' => User::get(),
            'depts' => Departemen::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daily $daily)
    {
        try {
            $rules = [
                'daily_xid' => ['required'],
                'departemen' => ['required'],
                'subject' => ['required'],
                'c_action' => ['required'],
                'description' => ['required'],
                'status' => ['required'],
                'assignee' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ];

            $validate = $request->validate($rules);

            if ($request->file('file')) {
                $validate['file'] = $request->file('file')->store('dailies');
            }

            if ($request->input('is_private')) {
                $validate['is_private'] = $request->is_private;
            } else {
                $validate['is_private'] = 0;
            }

            Daily::where('daily_id',$daily->daily_id)->update($validate);

            return redirect('/daily')->with('sucess','Updated Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daily $daily)
    {
        try {
            Daily::destroy($daily->daily_id);

            $daily->file ? Storage::delete([$daily->file]) : Daily::destroy($daily->daily_id);

            return redirect('/daily')->with('success', 'Deleted Daily Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
