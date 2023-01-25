<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProductController;
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
Route::get('/create',                 [UserController::class, 'create'])        ->name('user.createView')->middleware('auth');


Route::get('/editTest/{user}',            [UserController::class, 'editTest'])      ->name('user.editTest')->middleware('auth');
Route::put('/updateUserList/{user}',        [UserController::class, 'updateUserList'])  ->name('user.updateUserList')->middleware('auth');

Route::get('/listProduct',               [ProductController::class, 'listProduct'])   ->name('product.list')->middleware('auth');


