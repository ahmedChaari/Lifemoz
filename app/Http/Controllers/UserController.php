<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function edit(User $user)
    {
        return view('user.update')->with('user',$user);
    }



    public function editTest(User $user)
    {
        return view('user.update');
    }



    public function updateUser(UserUpdateRequest $request,User $user){
        $user->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => $request->password,
            'password' => Hash::make($request['password']),
            ]);

        return redirect(route('calender.create'));
    }

}
