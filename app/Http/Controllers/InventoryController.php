<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depot;
use App\Models\Inventory;
use App\Models\InventoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
            'company_id' => $company,
            'user_id'    => $userCreate ,
            'status'     => 0,
        ]);

       return  redirect()->back();
    }
    public function editInvenory($id){

         $inventory = Inventory::find($id);
         $productInventories = InventoryProduct::where('inventory_id', $inventory->id )
         ->get();

      $inventorydata = DB::table('inventory_product')
      ->where('inventory_id', $inventory->id )
      ->select(DB::raw('(SUM(quantite_en_ligne - quantite_en_stock) * SUM(achat)) as dataCount'))->get();

     // dd( $inventorydata);

        return view('inventory.edit', compact('inventory'))
       ->with('productInventories' ,$productInventories)
       ->with('inventorydata', $inventorydata);
    }

    public function deleteProductInventory($id){
        InventoryProduct::find($id)->delete();
        return redirect()->back();
    }

    public function getInventory(Request $request,$id){

        $inventory = InventoryProduct::find($id);
       // dd($inventory);
       $productInventories =[];
        $productInventories = InventoryProduct::where('inventory_id', $inventory->inventory_id)->get('id')
        ;
      dd($productInventories);
            foreach($productInventories as $productInventory){
                dd($productInventory);
var_dump($productInventory);
exit();
                InventoryProduct::where('id', $productInventory->id)
                                ->update([ 'quantite_en_stock'
                                 => $request->quantite_en_stock,]);
            }

        return redirect()->back();
    }


}




//try {






 //   $user= User::FindOrFail($id);
  //  return response()->json(['user'=>user], 200);
//} catch (\Exception $e) {
   // return response()->json(['message'=>'user not found!'], 404);
//}
