<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Depot;
use App\Models\Historic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepotController extends Controller
{

    public function createDepot(Request $request){
        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create depot';
        Depot::create([
            'company_id'  => $company,
            'name'        => $request->name,
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);

       // return  redirect(route('product.list'));
       return  redirect()->back();
    }

    public function listDepot(){
        $company = Auth::user()->company_id;
        $depots = Depot::where('company_id', $company)
                        ->paginate(10);
        return view('depot.list' , compact('depots'));
    }

    public function updateDepot(Request $request, Depot $depot){

        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'update depot';
        $depot->update([
            'name'        => $request->name,
            ]);

            Historic::create([
                'name'        => $name,
                'company_id'  => $company,
                'user_id'     => $userCreate,
            ]);
        return  redirect(route('depot.list'));
    }


    public function editDepot(Depot $depot){
        return view('depot.list')->with('depot',$depot);
    }
}
