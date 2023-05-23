<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Models\Action;



class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formattedDate = date('Ymd');
        $prefix = "MOM-";
        $lastCount = $this->select('act_counter')->latest('act_counter')->pluck('act_counter')->first();
        $count = $lastCount ++;
        $date = $prefix . str_pad($count, 3, '0', STR_PAD_LEFT) ."/".$formattedDate;
        return view('action.dataaction', [
            'actions' => Action::latest()->get(),
            'date' => $date
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
    public function store(StoreActionRequest $request)
    {
        $validate = $request->validate();

        Action::create($validate);

        return redirect('/action')->with('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action)
    {
        return view('action.show',[
            'action' => $action
        ]);
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
        $validate = $request->validate();

        if($validate){
            Action::where('id', $action->id)->update($validate);

            return redirect('/action')->with('success','Data berhasil di edit');
        } else {
            return http_response_code(503);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action)
    {
        Action::destroy($action->id);

        return redirect('/action')->with('success','Data berhasil di hapus');
    }
}
