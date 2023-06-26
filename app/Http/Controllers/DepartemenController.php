<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\GroupPage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $page_name = "Departemen";
        $pages = GroupPage::leftJoin('pages','pages.page_id','=','group_pages.page_id')
            ->where('pages.page_name','=',$page_name)
            ->where('group_pages.group_id','=',auth()->user()->group_id)
            ->get(); */
        return view('dept.index',[
            'depts' => Departemen::all(),
            /* 'pages' => $pages */
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
        try {
            $validate = $request->validate([
                'name' => ['required']
            ]);

            Departemen::create($validate);

            return redirect('/departemen')->with('success','Add Departemen Successfully!');
        } catch(QueryException $e){
            return $e->getMessage();
        }
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
    public function update(Request $request, Departemen $departemen, String $departemen_id)
    {
        try {
            $rules = [
                'name' => ['required']
            ];

            $validate = $request->validate($rules);

            Departemen::where('id',$departemen_id)->update($validate);

            return redirect('/departemen')->with('success','Updated Departemen Successfully');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen, String $departemen_id)
    {
        Departemen::destroy($departemen_id);

        return redirect('/departemen')->with('success','Deleted Departemen Successfully');
    }
}
