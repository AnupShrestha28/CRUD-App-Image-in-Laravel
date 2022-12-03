<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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


Route::get('/', function(){
    return view('login');
});

Route::get('product-list', [ProductController::class, 'productList'])->middleware('auth');

Route::get('add-product', [ProductController::class, 'addProduct']);

Route::post('save-product', [ProductController::class, 'saveProduct']);

Route::get('edit-product/{id}', [ProductController::class, 'editProduct']);

Route::post('update-product', [ProductController::class, 'updateProduct']);

Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct']);

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('user-login', [AuthController::class, 'userLogin'])->name('userLogin');

Route::get('register', [AuthController::class, 'register'])->name('register');

Route::post('user-register', [AuthController::class, 'userRegister'])->name('userRegister');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');