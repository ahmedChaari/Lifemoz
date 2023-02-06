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

}
