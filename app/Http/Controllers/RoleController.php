<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function listRole(){
        $company = Auth::user()->company_id;
        $roles = Role::where('company_id', $company)
        ->orWhere('company_id', null)
                        ->paginate(10);
        return view('role.list' , compact('roles'));
    }

    public function createRole(Request $request){
        $company = Auth::user()->company_id;
        $createRole  = Auth::user()->id;
        $name = 'create role';
        Role::create([
            'company_id'  => $company,
            'name'        => $request->name,
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $createRole,
        ]);
       return  redirect()->back();
    }

    public function deleteRole($id){
        Role::find($id)->delete();

        $name        = 'Delete role';
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;

        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
            //'user_create' => $id->name,
        ]);
        return redirect()->back();
    }

    public function updateRole(Request $request,Role $role){
        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'update role';
        $role->update([
            'name'        => $request->name,
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);
       // return  redirect(route('Product.list'));
       return  redirect()->back() ;

    }

}
