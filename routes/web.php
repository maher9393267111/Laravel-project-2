<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

//categorycontroller

 use  App\Http\Controllers\CategoryController;


 use  App\Http\Controllers\BrandController;


// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

$users = User::all();


    return view('dashboard',compact('users'));
})->name('dashboard');



Route::get('category/all',[CategoryController::class,'Allcat'])->name('all.category');



Route::post('category/add',[CategoryController::class,'Addcat'])->name('store.category');



Route::get('category/edit/{id}',[CategoryController::class,'Edit']);



Route::post('category/update/{id}',[CategoryController::class,'Update']);


Route::get('category/softDelete/{id}',[CategoryController::class,'Softdelete']);



Route::get('category/restore/{id}',[CategoryController::class,'Restore']);




Route::get('category/delete/{id}',[CategoryController::class,'Delete']);


Route::get('brand/all',[BrandController::class,'Allbrand'])->name('all.brand');


Route::post('brand/add',[BrandController::class,'Storebrand'])->name('store.brand');


Route::get('brand/edit/{id}',[BrandController::class,'Edit']);


Route::post('brand/update/{id}',[BrandController::class,'Update']);


Route::get('brand/delete/{id}',[BrandController::class,'delete']);


Route::get('multi/pic',[BrandController::class,'Multipic'])->name('multi.pic');



Route::post('multi/add',[BrandController::class,'Multiadd'])->name('store.image');



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');