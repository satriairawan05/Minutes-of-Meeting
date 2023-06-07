<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daily.index',[
            'dailies' => Daily::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daily.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        } catch(QueryException $e) {
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
        return view('daily.edit',[
            'daily' => $daily
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daily $daily)
    {
        try {

        } catch(QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daily $daily)
    {
        //
    }
}
