<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Departemen;
use App\Models\GroupPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_name = "User";
        $user_group = auth()->user()->group_id;
        $pages = DB::table('users')->leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->whereColumn('users.group_id', '=', 'groups.group_id')
        ->where('pages.page_name', '=', $page_name)
        ->where('group_pages.access', '=', 1)
        ->whereBetween('pages.page_id', [19, 22])
        ->where('group_pages.group_id','=', $user_group)
        ->select(['group_name', 'page_name', 'action', 'access'])
        ->limit(4)
        ->get();
        
         $pages = GroupPage::leftJoin('pages','pages.page_id','=','group_pages.page_id')
            ->where('pages.page_name','=',$page_name)
            ->where('group_pages.group_id','=',auth()->user()->group_id)
            ->get();

        if(auth()->user()->name == 'Super Admin')
        {
            return view('user.index', [
                'users' => User::leftJoin('groups','groups.group_id','=','users.group_id')->get(),
                'pages' => $pages
            ]);
        } else {
            return view('user.index',[
                'users' => User::where('name','=',auth()->user()->name)->leftJoin('groups','groups.group_id','=','users.group_id')->get(),
                'pages' => $pages
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create',[
            'roles' => Group::get(),
            'depts' => Departemen::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'max:255', 'confirmed'],
                'group_id' => ['required'],
                'departemen' => ['required']
            ]);

            $validate['password'] = bcrypt($request->input('password'));

            User::create($validate);

            return redirect('user')->with('Success','Added User Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
            'roles' => Group::get(),
            'depts' => Departemen::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'max:255', 'confirmed'],
                'group_id' => ['required'],
                'departemen' => ['required']
            ];

            $validate = $request->validate($rules);

            $validate['password'] = bcrypt($request->input('password'));

            User::where('id',$user->id)->update($validate);

            return redirect('user')->with('Success','Updated User Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            User::destroy($user->id);

            return redirect('user')->with('Success','Deleted User Successfully!');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
