<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
       return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
           'name' => ['required','max:255'],
            'email' => ['required','email','unique:users','max:255'],
            'phone' => ['required','unique:users','max:15'],
        ]);

        $attributes['password'] = $attributes['phone'];

        User::create($attributes);

        return redirect()->route('dashboard.users.index')->with('success_message','The user has been created successfully');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(request $request,User $user)
    {
        $attributes = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','unique:users,email,' . $user->id ,'max:255'],
            'phone' => ['required','unique:users,phone,' . $user->id,'max:15'],
        ]);

        $attributes['password'] = $attributes['phone'];

        $user->update($attributes);

        return redirect()->route('dashboard.users.index')->with('success_message','The user has been Updated successfully');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show',compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success_message','The user has been Deleted successfully');

    }


}
