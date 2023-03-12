<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Historic;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function listSale(){
        $company = Auth::user()->company_id;
        $sales = Sale::where('company_id', $company)
                ->paginate(10);
        return view('sale.list' , compact('sales'));
    }



    public function createDepot(Request $request){
        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create vente';
        Sale::create([
            'company_id'  => $company,
            'code'        => $request->code,
            'product_id'        => $request->product_id,

        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);

       // return  redirect(route('Product.list'));
       return  redirect()->back();
    }
}
