<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Models\Depot;
use App\Models\Historic;
use App\Models\Unity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


    public function createCategory(CategoryRequest $request){
        $company = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;
        $name = 'create category';
        Category::create([
            'name'        => $request->nameCategory,
            'company_id'  => $company ,
            'description' => $request->description,
        ]);
        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
        ]);
       // return  redirect(route('product.list'));
       return  redirect()->back() ;

    }

    public function listCategory(){
        $company = Auth::user()->company_id;
        $categories = Category::where('company_id', $company)
                        ->paginate(10);
        return view('category.list' , compact('categories'));
    }

    public function deleteCategory($id){
        Category::find($id)->delete();

        $name = 'Delete category';
        $company     = Auth::user()->company_id;
        $userCreate  = Auth::user()->id;

        Historic::create([
            'name'        => $name,
            'company_id'  => $company,
            'user_id'     => $userCreate,
            'user_create' => $id->name,
        ]);
        return redirect()->back();
    }
 }
