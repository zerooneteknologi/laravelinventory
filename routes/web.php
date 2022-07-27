<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuplayerController;
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
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/company', CompanyController::class);

Route::resource('/purchase', PurchaseController::class);
Route::get('/checksuplayer', [PurchaseController::class, 'checksuplayer']);
Route::get('/printPO/{id}', [PurchaseController::class, 'printPO'])->name('printPO');

Route::resource('/invoice', InvoiceController::class);
Route::get('/getMember/{customer:customerNo}', [InvoiceController::class, 'getMember']);
Route::get('/getProduct/{product:productCode}', [InvoiceController::class, 'getProduct']);
Route::get('/printInvoice/{id}', [InvoiceController::class, 'printInvoice'])->name('printInvoice');

Route::resource('/credit', CreditController::class);

Route::post('/index', [OrderController::class, 'index']);
Route::post('/store', [OrderController::class, 'store']);
Route::post('/update/{id}', [OrderController::class, 'update']);
Route::post('/destroy/{id}', [OrderController::class, 'destroy']);
Route::post('/deletedraf', [OrderController::class, 'deletedraf']);

Route::get('/setting', [SettingController::class, 'index']);
