<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\UserController;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// step of create company

// Route::get('/company/step1', [CompanyController::class, 'step1'])->name('company.step1');





Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => true]);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::delete('/delete/event/{id}',    [CalendarController::class, 'deleteEvent'])->name('calender.deleteEvent')->middleware('auth');
Route::post('/store',                 [CalendarController::class, 'store'])->name('calender.store')->middleware('auth');


//users
Route::put('/updateUser/{user}',  [UserController::class, 'updateUser']) ->name('user.update')->middleware('auth');
Route::get('/edit/{user}',        [UserController::class, 'edit'])       ->name('user.edit')->middleware('auth');
Route::get('/users',           [UserController::class, 'listUser'])   ->name('user.list')->middleware('auth');
Route::post('/createUser',        [UserController::class, 'createUser']) ->name('user.create')->middleware('auth');
Route::get('/createView',         [UserController::class, 'createView']) ->name('user.createViewUser')->middleware('auth');
Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('user.delete')->middleware('auth');


Route::get('/editTest/{user}',      [UserController::class, 'editTest'])      ->name('user.editTest')->middleware('auth');
Route::put('/updateUserList/{user}',[UserController::class, 'updateUserList'])  ->name('user.updateUserList')->middleware('auth');

// products
Route::get('/produits',               [ProductController::class, 'listProduct'])   ->name('product.list')->middleware('auth');
Route::get('/create/product',         [ProductController::class, 'create'])        ->name('product.createView')->middleware('auth');
Route::post('/store/product',         [ProductController::class, 'createProduct']) ->name('product.create')->middleware('auth');
Route::put('/updateProduct/{product}',[ProductController::class, 'updateProduct']) ->name('product.update')->middleware('auth');
Route::get('/editProduct/{product}',  [ProductController::class, 'editProduct'])   ->name('product.edit')->middleware('auth');
Route::get('/deleteProduct/{id}',     [ProductController::class, 'deleteProduct'])->name('product.delete')->middleware('auth');

//category
Route::post('/createCategory',         [CategoryController::class, 'createCategory'])->name('category.create')->middleware('auth');
Route::get('/categories',            [CategoryController::class, 'listCategory'])  ->name('category.list')->middleware('auth');
Route::get('/deleteCategory/{id}',     [CategoryController::class, 'deleteCategory'])->name('category.delete')->middleware('auth');
Route::put('/updateCategory/{category}',[CategoryController::class, 'updateCategory'])->name('category.update')->middleware('auth');
Route::get('/editCategory/{category}', [CategoryController::class, 'editCategory'])   ->name('category.edit')->middleware('auth');


//unity
Route::post('/creation/unity',       [UnityController::class, 'createUnity'])->name('unity.create')->middleware('auth');
Route::get('/unity',          [UnityController::class, 'listUnity'])->name('unity.list')->middleware('auth');
Route::get('/delete/unity/{id}',   [UnityController::class, 'deleteUnity'])->name('unity.delete')->middleware('auth');
Route::put('/updateUnity/{unity}',[UnityController::class, 'updateUnity'])->name('unity.update')->middleware('auth');

//depot
Route::post('/createDepot',       [DepotController::class, 'createDepot'])->name('depot.create')->middleware('auth');
Route::put('/updateDepot/{depot}',[DepotController::class, 'updateDepot'])->name('depot.update')->middleware('auth');
Route::get('/editDepot/{depot}',  [DepotController::class, 'editDepot']) ->name('depot.edit')->middleware('auth');
Route::get('/depots',          [DepotController::class, 'listDepot'])  ->name('depot.list')->middleware('auth');
Route::get('/deleteDepot/{id}',   [DepotController::class, 'deleteDepot'])->name('depot.delete')->middleware('auth');


//history
Route::get('/historique',      [HistoryController::class, 'listHistories'])   ->name('history.list')->middleware('auth');
Route::get('/show/{id}',          [HistoryController::class, 'show'])   ->name('history.show')->middleware('auth');

//role
Route::get('/roles',            [RoleController::class, 'listRole'])  ->name('role.list')->middleware('auth');
Route::post('/createRole',         [RoleController::class, 'createRole']) ->name('role.create')->middleware('auth');
Route::get('/deleteRole/{id}',     [RoleController::class, 'deleteRole']) ->name('role.delete')->middleware('auth');
Route::put('/updateRole/{role}',   [RoleController::class, 'updateRole']) ->name('role.update')->middleware('auth');


//compnay
Route::get('/company/modifier/{company}',      [CompanyController::class, 'editCompany'])->name('company.edit')->middleware('auth');
// Route::post('/createCompany',               [CompanyController::class, 'createCompany']) ->name('company.create')->middleware('auth');
Route::put('/company/modifier/info/{company}',     [CompanyController::class, 'updateCompany']) ->name('company.update')->middleware('auth');
Route::put('/company/modifier/param/{company}',    [CompanyController::class, 'updateParamCompany']) ->name('company.param.update')->middleware('auth');
Route::put('/company/modifier/commer/{company}',   [CompanyController::class, 'updateCommCompany']) ->name('company.comm.update')->middleware('auth');

Route::put('/company/modifier/logo/{company}',   [CompanyController::class, 'updatelogoCompany']) ->name('company.logo.update')->middleware('auth');

Route::get('/create',             [CompanyController::class, 'create'])->name('company.create');


//sale
Route::get('/sales',          [SaleController::class, 'listSale'])  ->name('sale.list')->middleware('auth');
Route::post('/create/sale',         [SaleController::class, 'createSale']) ->name('sale.create')->middleware('auth');

//inventory
Route::get('/inventories',                  [InventoryController::class, 'listInventory'])  ->name('inventory.list')->middleware('auth');
Route::post('/create/inventaire',           [InventoryController::class, 'createInvenory']) ->name('inventory.create')->middleware('auth');
Route::get('/inventory/{id}',               [InventoryController::class, 'editInvenory']) ->name('inventory.edit')->middleware('auth');
Route::get('/delete/product/inventory/{id}',[InventoryController::class, 'deleteProductInventory']) ->name('inventory.product.delete')->middleware('auth');



Route::get('/company', function () {
    return view('layouts.company');
})->name('company');
