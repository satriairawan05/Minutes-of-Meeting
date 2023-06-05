<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(auth()->user()->name == 'Super Admin')
        {
            return view('user.index', [
                'users' => User::leftJoin('groups','users.group_id','=','groups.id')->paginate(15)
            ]);
        } else {
            return view('user.index',[
                'users' => User::where('name','=',auth()->user()->name)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create',[
            'roles' => Group::get()
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
                'group_id' => ['required']
            ]);

            $validate['password'] = bcrypt($request->input('password'));

            User::create($validate);

            return redirect('user')->with('Success','Added User Successfully!');
        } catch (\Throwable $th) {
            return redirect('user')->with('failed',$th->getMessage());
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
            'roles' => Group::get()
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
                'group_id' => ['required']
            ];

            $validate = $request->validate($rules);

            $validate['password'] = bcrypt($request->input('password'));

            User::where('id',$user->id)->update($validate);

            return redirect('user')->with('Success','Updated User Successfully!');
        } catch (\Throwable $th) {
            return redirect('user')->with('failed',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('user')->with('Success','Deleted User Successfully!');
    }
}
