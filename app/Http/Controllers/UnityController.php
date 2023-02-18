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
       // return  redirect(route('Product.list'));
       return  redirect()->back() ;
    }

    public function listUnity(){
        $company = Auth::user()->company_id;
        $unities = Unity::where('company_id', $company)
        ->orWhere('company_id', null)
                        ->paginate(10);
        return view('unity.list' , compact('unities'));
    }

    public function deleteUnity($id){
        Unity::find($id)->delete();

        $name = 'Delete unity';
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


    public function updateUnity(Request $request,Unity $unity){

        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $unity->update([
            'name'        => $request->name,
        ]);
        if (isset($unity)) {

            $name = 'update unity';

                Historic::create([
                    'name'        => $name,
                    'company_id'  => $company,
                    'user_id'     => $userCreate,
                ]);
                return  redirect()->back();
        }else {
            return ([
                'errors' => $request->errors()
            ]);
        }

    }
}
