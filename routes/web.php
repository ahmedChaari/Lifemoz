<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => true]);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::delete('/deleteEvent/{id}',    [CalendarController::class, 'deleteEvent'])->name('calender.deleteEvent')->middleware('auth');
Route::post('/store',                 [CalendarController::class, 'store'])->name('calender.store')->middleware('auth');


//users
Route::put('/updateUser/{user}',      [UserController::class, 'updateUser']) ->name('user.update')->middleware('auth');
Route::get('/edit/{user}',            [UserController::class, 'edit'])       ->name('user.edit')->middleware('auth');
Route::get('/listUser',               [UserController::class, 'listUser'])   ->name('user.list')->middleware('auth');
Route::post('/createUser',            [UserController::class, 'createUser']) ->name('user.create')->middleware('auth');
Route::get('/createView',             [UserController::class, 'createView']) ->name('user.createViewUser')->middleware('auth');


Route::get('/editTest/{user}',        [UserController::class, 'editTest'])      ->name('user.editTest')->middleware('auth');
Route::put('/updateUserList/{user}',  [UserController::class, 'updateUserList'])  ->name('user.updateUserList')->middleware('auth');

// products
Route::get('/listProduct',            [ProductController::class, 'listProduct'])   ->name('product.list')->middleware('auth');
Route::get('/create',                 [ProductController::class, 'create'])        ->name('product.createView')->middleware('auth');
Route::post('/createProduct',         [ProductController::class, 'createProduct']) ->name('product.create')->middleware('auth');
Route::put('/updateProduct/{product}',[ProductController::class, 'updateProduct']) ->name('product.update')->middleware('auth');
Route::get('/editProduct/{product}',  [ProductController::class, 'editProduct'])   ->name('product.edit')->middleware('auth');


Route::post('/createCategory',        [CategoryController::class, 'createCategory'])->name('category.create')->middleware('auth');
Route::get('/listCategory',           [CategoryController::class, 'listCategory'])  ->name('category.list')->middleware('auth');


//unity
Route::post('/createUnity',[UnityController::class, 'createUnity'])->name('unity.create')->middleware('auth');
Route::get('/listUnity',[UnityController::class, 'listUnity'])->name('unity.list')->middleware('auth');

//depot
Route::post('/createDepot',           [DepotController::class, 'createDepot'])->name('depot.create')->middleware('auth');
Route::put('/updateDepot',            [DepotController::class, 'updateDepot'])->name('depot.update')->middleware('auth');
Route::get('/editDepot/{depot}',      [DepotController::class, 'editDepot']) ->name('depot.edit')->middleware('auth');
Route::get('/listDepot',              [DepotController::class, 'listDepot'])  ->name('depot.list')->middleware('auth');


//history
Route::get('/listHistories',          [HistoryController::class, 'listHistories'])   ->name('history.list')->middleware('auth');

//role
Route::get('/listRole',               [RoleController::class, 'listRole'])  ->name('role.list')->middleware('auth');
Route::post('/createRole',           [RoleController::class, 'createRole']) ->name('role.create')->middleware('auth');

//compnay
Route::get('/company', function () { return view('company.create');})->name('company.create')->middleware('auth');;



