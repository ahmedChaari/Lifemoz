<?php

namespace App\Http\Controllers;

use App\Http\Requests\Depot\createDepotRequest;
use App\Models\Company;
use App\Models\Depot;
use App\Models\Historic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepotController extends Controller
{

    public function createDepot(createDepotRequest $request){
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

       // return  redirect(route('Product.list'));
       return  redirect()->back();
    }

    public function listDepot(){
        $company = Auth::user()->company_id;
        $depots = Depot::where('company_id', $company)
        ->orWhere('company_id', null)
                        ->paginate(10);
        return view('depot.list' , compact('depots'));
    }

    public function updateDepot(createDepotRequest $request,Depot $depot){

        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $depot->update([
            'name'        => $request->name,
        ]);
        if (isset($depot)) {
            
            $name = 'update depot';
    
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


    public function editDepot(Depot $depot){
        return view('depot.list')->with('depot',$depot);
    }

    public function deleteDepot($id){
        Depot::find($id)->delete();


        $name = 'Delete depot';
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;

        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);

        return redirect()->back();
    }
}
