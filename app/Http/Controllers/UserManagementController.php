<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $validate['password'] = bcrypt($request->input('password'));

        User::create($validate);

        return redirect('management')->with('Success','Added User Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, $user_id)
    {
        return view('user.show', [
            'user' => $user->find($user_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $user_id)
    {
        return view('user.edit', [
            'user' => $user->find($user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $validate = $request->validate($rules);

        $validate['password'] = bcrypt($request->input('password'));

        User::where('id',$user->id)->update($validate);

        return redirect('management')->with('Success','Updated User Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $user_id)
    {
        User::destroy($user->find($user_id));

        return redirect('management')->with('success', 'Deleted User Successfully!');
    }
}
