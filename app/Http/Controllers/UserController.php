<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Historic;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $users = User::paginate(10);
        return view('user.list' , compact('users'))
               ;
    }


    public function edit(User $user)
    {
        $services = Service::get();
        $roles = Role::get();
        return view('user.updateUser')->with('user',$user)
        ->with('services', $services)
        ->with('roles', $roles);
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

        return redirect(route('home'));
    }

    public function createView()
    {
        $services = Service::get();
        $roles = Role::get();
        return view('user.create')
                ->with('services',$services)
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
    // update user in the list
    public function editUserList(User $user)
    {
        return view('user.updateUser')->with('user',$user);
    }

    public function updateUserList(UserUpdateRequest $request,User $user){
        $name = 'Update user';
        $userCreate  = Auth::user()->id;
        $user->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'tel'        => $request->tel,
            'fonction'   => $request->fonction,
            'service_id' => $request->service_id,
            'role_id'    => $request->role_id,
            'password'   => $request->password,
            'password' => Hash::make($request['password']),
            'active' => $request->has('active'),
            ]);
            Historic::create([
                'name'        => $name,
                'user_id'     => $userCreate,
            ]);



        return redirect(route('user.list'));
    }


}
