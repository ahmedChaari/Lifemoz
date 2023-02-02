<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use App\Models\Unity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnityController extends Controller
{

    public function createUnity(Request $request){

        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create unity';
        Unity::create([
            'company_id'  => $company ,
            'name'        => $request->name,
            'description'  => $request->description,
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);
       // return  redirect(route('product.list'));
       return  redirect()->back() ;
    }

    public function listUnity(){
        $company = Auth::user()->company_id;
        $unities = Unity::where('company_id', $company)
                        ->paginate(10);
        return view('unity.list' , compact('unities'));
    }
}
