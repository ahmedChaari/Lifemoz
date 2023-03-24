<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depot;
use App\Models\Historic;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function listSale(){

        $company = Auth::user()->company_id;

        $products = Product::where('company_id', $company)->get();
        $depots = Depot::where('company_id', $company)
                ->orWhere('company_id', null)
                ->get();
        $sales = Sale::where('company_id', $company)
                 ->orderBy('created_at', 'DESC')
                ->paginate(10);
        return view('sale.list' , compact('sales'))
        ->with('products', $products)->with('depots', $depots);
    }

    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
         }

    public function createSale(Request $request){
        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create vente';
        Sale::create([
            'company_id'  => $company,
            'code'        => $this->rand_string(10),
            'product_id'  => $request->product_id,
            'depot_id'    => $request->depot_id,
            'quantite'    => $request->quantite,
            'price'       => $request->price,
        ]);

        $product = Product::where('id',$request->product_id)->first();

           Product::where('id',$product->id)
             ->update([
            'quantite'     =>     $product->quantite - $request->quantite ,

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
