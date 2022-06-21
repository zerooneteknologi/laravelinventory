<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuplayerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/suplayer', SuplayerController::class);
Route::resource('/category', CategoryController::class)->except(['create', 'show']);
Route::resource('/product', ProductController::class);
Route::get('product/getproduct/{product:productCode}', [ProductController::class, 'getproduct']);

Route::resource('/customer', CustomerController::class);
Route::get('/customer/getcode/{customer:customerNo}', [CustomerController::class, 'getcode']);

Route::resource('/company', CompanyController::class)->only(['edit', 'update']);
Route::resource('/user', UserController::class)->except(['edit', 'update', 'show']);
Route::resource('/invoice', InvoiceController::class)->except(['destroy']);

Route::get('/setting', [SettingController::class, 'index']);
