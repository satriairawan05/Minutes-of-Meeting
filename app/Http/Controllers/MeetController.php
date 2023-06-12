<?php

namespace App\Http\Controllers;

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
        $pages = User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->where('pages.page_id', '<=', 4)
        ->orWhere('pages.page_name', 'Meeting')
        ->orWhere('group_pages.access', 1)
        ->get();

        return view('meet.index', [
            'meets' => Meet::get(),
            'pages' => $pages
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
            $validate = $request->validate([
                'meet_xid' => ['required'],
                'meet_name' => ['required'],
                'meet_project' => ['required'],
                'meet_date' => ['required'],
                'meet_time' => ['required'],
                'meet_attend' => ['required'],
                'meet_preparedby' => ['required'],
                'meet_locate' => ['required'],
            ]);

            Meet::create($validate);

            return redirect('/meet')->with('success','Added Meet Successfully!');
        } catch (QueryException $e){
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
            $rules = [
                'meet_xid' => ['required'],
                'meet_name' => ['required'],
                'meet_project' => ['required'],
                'meet_date' => ['required'],
                'meet_time' => ['required'],
                'meet_attend' => ['required'],
                'meet_preparedby' => ['required'],
                'meet_locate' => ['required'],
            ];

            $validate = $request->validate($rules);

            Meet::where('meet_id',$meet->meet_id)->update($validate);

            return redirect('/meet')->with('success','Updated Meet Successfully!');
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
