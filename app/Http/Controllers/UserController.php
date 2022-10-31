<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        //ONLY ADMINS ARE GOING TO SEE THIS STUFF
        return view('admin.users.index', ['users'=>$users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function update(User $user)
    {
        $inputs = \request()->validate([
           'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file'], // YOU CAN SPECIFY file:jpeg,png...
        ]);

        //if request has an avatar
        if (request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        //once we have the inputs here, then we are going to grab the user
        $user->update($inputs);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');

        return back();
    }


    public function attach(Role $role)
    {
        dd($role);
    }
}
