<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\ProductRequest;
use App\Models\Category;
use App\Models\Depot;
use App\Models\Historic;
use App\Models\Product;
use App\Models\Unity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

   public function listProduct(){
       $company = Auth::user()->company_id;
       $category = Category::get();
        $unity = Unity::get();
        $depot = Depot::get();
        $user = User::get();

        $products = Product::where('company_id' ,$company )
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('product.list' , compact('products'))
        ->with('category' , $category)
        ->with('unity'    , $unity)
        ->with('depot'     , $depot)
        ->with('user'      , $user);
   }
   public function createProduct(ProductRequest $request){
        $company = Auth::user()->company_id;
        $user = Auth::user()->id;
        $name = 'Create product';

        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'depot_id'    => $request->depot_id,
            'user_id'     => $user,
            'company_id'  => $company,
            'unity_id'    => $request->unity_id,
            'quantite'    => $request->quantite,
            'achat'       => $request->achat,
            'vente'       => $request->vente,
            'stock_min'   => $request->stock_min,
            'description' => $request->description,
        ]);


    Historic::create([
        'name'        => $name,
        'company_id'  => $company,
        'product_id'  => $product->id,
        'quantite'    => $product->quantite,
        'user_id'     => $user,
    ]);
//    return  view('product.list');
    return redirect(route('product.list'));
   }

// update product + create history

    public function updateProduct(ProductRequest $request, Product $product){


        $company = Auth::user()->company_id;
        $user = Auth::user()->id;
        $name = 'update product';
        $product->update([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'depot_id'    => $request->depot_id,
            'unity_id'    => $request->unity_id,
            'quantite'    => $request->quantite,
            'achat'       => $request->achat,
            'vente'       => $request->vente,
            'stock_min'   => $request->stock_min,
            'description' => $request->description,
            ]);


    Historic::create([
        'name'        => $name,
        'company_id'  => $company,
        'product_id'  => $product->id,
        'quantite'    => $product->quantite,
        'user_id'     => $user,
    ]);
        return  view('product.list');
    }



   public function create()
    {
        $company = Auth::user()->company_id;
        $category = Category::where('company_id', $company)->get();
        $unity = Unity::where('company_id', $company)
                ->get();
        $depot = Depot::where('company_id', $company)
                ->get();
        return view('product.create')
            ->with('depots',$depot)
            ->with('categories',$category)
            ->with('unities',$unity);
    }


    public function editProduct(Product $product){
        $company = Auth::user()->company_id;
        $category = Category::where('company_id', $company)->get();
        $unity = Unity::where('company_id', $company)->get();
        $depot = Depot::where('company_id', $company)->get();
        return view('product.create')->with('product',$product)
        ->with('unities',$unity)
        ->with('categories', $category)
        ->with('depots', $depot);
    }

    public function deleteProduct($id){
        Product::find($id)->delete();
        $name = 'Delete product';
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;

        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
          //  'user_create' => $id->name,
        ]);
        return redirect()->back();
    }

}
