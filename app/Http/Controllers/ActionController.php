<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Models\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;



class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $formattedDate = date('Ymd');
        $prefix = "ACT-";
        $lastCount = Action::select('act_counter')->latest('act_counter')->pluck('act_counter')->first();
        $count = $lastCount + 1;
        $id_u = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) ."/".$formattedDate  ;
        return view('action.dataaction', ['actions' => $id_u]);

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
    public function store(StoreActionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActionRequest $request, Action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action)
    {
        //
    }
}
