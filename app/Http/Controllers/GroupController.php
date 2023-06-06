<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPage;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->name == "Super Admin"){
            $group = Group::get();
        } else {
            $group = Group::where('group_id','!=',1)->orWhere('name','=',auth()->user()->name)->get();
        }
        return view('group.index', [
            'groups' => $group
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group.create', [
            'page_distincts' => Page::distinct('page_name')->get('page_name'),
            'pages' => Page::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Group $group, Page $page, GroupPage $groupPage)
    {
        try {
            $group = new Group;
            $group->group_name = $request->group_name;
            $group->save();
            $pages = Page::all();
            foreach ($pages as $page) {
                $groupPage = new GroupPage;
                $groupPage->page_id = $page->page_id;
                $groupPage->group_id = $group->group_id;
                $groupPage->access = $request->input($page->page_name . $page->action) == "on" ? 1 : 0;
                $groupPage->save();
            }

            return redirect()->to('group')->with('success', 'Added Role Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
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
        return view('group.edit', [
            'group' => $group,
            'page_distincts' => Page::distinct('page_name')->get('page_name'),
            'pages' => GroupPage::leftJoin('pages', 'pages.page_id', '=', 'group_pages.page_id')->where('group_id', '=', $group->group_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group, Page $page, GroupPage $groupPage)
    {
        // return dd($request->all());
        try {
            $update = $this->validate($request, [
                'group_name' => 'required'
            ]);
            Group::where('group_id', $group->group_id)->update($update);
            $pages = Page::all();
            foreach ($pages as $page) {
                $access = $request->input($page->page_name . $page->action) == "on" ? 1 : 0;
                $groupPage = GroupPage::where([
                    'group_id' => $group->group_id,
                    'page_id' => $page->page_id
                ]);
                $groupPage->update([
                    'access' => $access
                ]);
            }
            return redirect('group')->with('success', 'Updated Roles Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        try {
            Group::where('group_id', $group->group_id)->delete();

            $pages = Page::all();
            foreach ($pages as $page) {
                $groupPage = GroupPage::where([
                    'group_id' => $group->group_id,
                    'page_id' => $page->page_id
                ])->first();
                return dd($groupPage);
                if ($groupPage) {
                    $groupPage->delete();
                }
            }

            return redirect('group')->with('success', 'Deleted Roles Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
