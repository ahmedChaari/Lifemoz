<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $services = Service::get();
        $roles = Role::get();
        $users = User::paginate(10);
        return view('user.list' , compact('users'))
                ->with('services',$services)
                ->with('roles',$roles);
    }


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

    public function create()
    {
        $services = Service::get();
        $roles = Role::get();
        return view('user.create') ->with('services',$services)
        ->with('roles',$roles);
    }

    public function createUser(CreateUserRequest $request){



       User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'tel'        => $request->tel,
            'fonction'   => $request->fonction,
            'service_id' => $request->service_id,
            'role_id'    => $request->role_id,
            'password'   => Hash::make($request->password),
        ]);

        return  redirect(route('user.list'));
    }


}
