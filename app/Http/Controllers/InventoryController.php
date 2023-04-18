<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depot;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{

    public function listInventory(){
        $company = Auth::user()->company_id;
       // $userCreate  = Auth::user()->id;
       $depots = Depot::where('company_id',  $company)->get();
        $inventories = Inventory::where('company_id', $company)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        return view('inventory.list' , compact('inventories'))->with('depots', $depots);

    }
    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

    public function createInvenory(Request $request){
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;


        Inventory::create([
            'reference' =>  $this->rand_string(10),
            'objet'      => $request->objet,
            'depot_id'   => $request->depot_id,
            'company_id' =>  $company,
            'user_id'    => $userCreate ,
            'status'     => 0,
        ]);

       return  redirect()->back();
    }

}
