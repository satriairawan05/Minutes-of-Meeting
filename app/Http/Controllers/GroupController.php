<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPage;
use App\Models\Page;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('group.index',[
            'groups' => Group::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group.create',[
            'page_distincts' => Page::distinct('page_name')->get('page_name'),
            'pages' => Page::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'group_name' => 'required|min:5|max:255',
            ]);

            if($validate){
                $group = new Group;
                $group->group_name = $request->group_name;
                $group->save();
                $pages = new Page;
                foreach($pages as $page){
                    $groupPage = new GroupPage;
                    $groupPage->page_id = $page->page_id;
                    $groupPage->group_id = $group->group_id;
                    $action = $request->input($page->page_name.$page->action) == "on" ? 1 : 0;
                    $groupPage->action = $action;
                    $groupPage->save();
                }
            }
            return redirect('group')->with('success','Added Roles Successfully!');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('group.edit',[
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        try {
            $rules = [
                'group_name' => ['required','max:255']
            ];

            $validate = $request->validate($rules);

            Group::where('id',$group->id)->update($validate);

            return redirect('group')->with('success','Updated Roles Successfully!');
        } catch (\Throwable $th) {
            return redirect('group')->with('failed',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        try {
            Group::destroy($group->id);

            return redirect('group')->with('success','Deleted Roles Successfully!');
        } catch (\Throwable $th) {
            return redirect('group')->with('failed',$th->getMessage());
        }
    }
}
