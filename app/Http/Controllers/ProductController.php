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
   public function listProduct()
   {
        $category = Category::all();
        $unity = Unity::all();
        $depot = Depot::all();
        $user = User::all();

        $products = Product::orderBy('created_at', 'DESC')
        ->paginate(10)
                    ;
        return view('product.list' , compact('products'))
        ->with('category' , $category)
        ->with('unity'    , $unity)
        ->with('depot'     , $depot)
        ->with('user'      , $user);
   }
   public function createProduct(ProductRequest $request){

    $user  = Auth::user()->id;
    $name = 'Create product';
    $product = Product::create([
        'name'        => $request->name,
        'category_id' => $request->category_id,
        'depot_id'    => $request->depot_id,
        'user_id'     => $user,
        'unity_id'    => $request->unity_id,
        'quantite'    => $request->quantite,
        'achat'       => $request->achat,
        'vente'       => $request->vente,
        'stock_min'   => $request->stock_min,
        'description' => $request->description,
    ]);

  //  dd($product);

    Historic::create([
        'name'        => $name,
        'product_id'  => $product->id,
        'quantite'    => $product->quantite,
        'user_id'     => $user,
    ]);
    return  redirect(route('product.list'));
   }

// update product + create history

    public function updateProduct(ProductRequest $request, Product $product){

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
        return  redirect(route('product.list'));
    }



   public function create()
    {
        $categories = Category::get();
        $unities = Unity::get();
        $depots = Depot::get();
        return view('product.create')
                ->with('depots',$depots)
                ->with('categories',$categories)
                ->with('unities',$unities);
    }


    public function editProduct(Product $product)
    {
        $categories = Category::get();
        $unities = Unity::get();
        $depots = Depot::get();
        return view('product.create')->with('product',$product)
        ->with('unities',$unities)
        ->with('categories', $categories)
        ->with('depots', $depots);
    }



}
