<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Models\Depot;
use App\Models\Unity;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(CategoryRequest $request){

        Category::create([
            'name'        => $request->name,
            'description'  => $request->description,
        ]);

       // return  redirect(route('product.list'));
       return  redirect()->back() ;

    }

    public function createDepot(Request $request){

        Depot::create([
            'name'        => $request->name,
        ]);

       // return  redirect(route('product.list'));
       return  redirect()->back() ;

    }

    public function createUnity(CategoryRequest $request){

        Unity::create([
            'name'        => $request->name,
            'description'  => $request->description,
        ]);

       // return  redirect(route('product.list'));
       return  redirect()->back() ;

    }
 }
