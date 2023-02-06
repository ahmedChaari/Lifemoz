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

    private  $services;
    private $roles;

    public function __construct(){
        $this->services = Service::get();
        $this->roles = Role::get();

    }

    public function listUser(Request $request)
    {
        $company  = Auth::user()->company_id;
        $users = User::where('company_id', $company)->paginate(10);
        return view('user.list' , compact('users'));
    }


    public function edit(User $user)
    {
        return view('user.updateUser')->with('user',$user)
        ->with('services', $this->services)
        ->with('roles', $this->roles);
    }

    public function editTest(User $user)
    {
        return view('user.update');
    }

    public function updateUser(UserUpdateRequest $request,User $user){

        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'update mon profile';
        $user->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => $request->password,
            'password' => Hash::make($request['password']),
            ]);
            Historic::create([
                'name'        => $name,
                'company_id'  => $company,
                'user_id'     => $userCreate,
                'user_create' => $user->name,
            ]);


        return redirect(route('home'));
    }

    public function createView()
    {
        return view('user.create')
                ->with('services',$this->services)
                ->with('roles',$this->roles);
    }

    public function createUser(CreateUserRequest $request){
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create user';
        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'tel'        => $request->tel,
            'fonction'   => $request->fonction,
            'company_id' => $company,
            'user_id'    => $userCreate,
            'service_id' => $request->service_id,
            'role_id'    => $request->role_id,
            'password'   => Hash::make($request->password),
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
            'user_create' => $user->name,
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
        $company     = Auth::user()->company_id;
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
                'company_id'  => $company,
                'user_id'     => $userCreate,
                'user_create' => $user->name,
            ]);
        return redirect(route('user.list'));
    }


    public function deleteUser($id){

        $name = 'Delete user';
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;

        User::find($id)->delete();

        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
            'user_create' => $id->name,
        ]);
        return redirect()->back();
    }

}
