<?php

namespace App\Http\Controllers;

use App\Models\GroupPage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('partials.sidebar',[
            'groupPages' => GroupPage::where('group_id','=',auth()->user()->group_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(GroupPage $groupPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupPage $groupPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupPage $groupPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupPage $groupPage)
    {
        //
    }
}
