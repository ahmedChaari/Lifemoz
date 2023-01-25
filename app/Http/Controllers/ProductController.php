<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Depot;
use App\Models\Product;
use App\Models\Unity;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function listProduct()
   {
        $category = Category::all();
        $unity = Unity::all();
        $depot = Depot::all();
        $user = User::all();

        $products = Product::paginate(10)
                    ;
        return view('product.list' , compact('products'))
        ->with('category' , $category)
        ->with('unity'    , $unity)
        ->with('depot'     , $depot)
        ->with('user'      , $user);
   }
}
