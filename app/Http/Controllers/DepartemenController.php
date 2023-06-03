<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dept.index',[
            'depts' => Departemen::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dept.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required']
        ]);

        Departemen::create($validate);

        return redirect('/departemen')->with('success','Add Departemen Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen, $dept_id)
    {
        return view('dept.edit',[
            'dept' => $departemen->find($dept_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        $rules = [
            'name' => ['required']
        ];

        $validate = $request->validate($rules);

        Departemen::where('id',$departemen->id)->update($validate);

        return redirect('/departemen')->with('success','Updated Departemen Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        //
    }
}
