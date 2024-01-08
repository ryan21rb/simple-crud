<?php

use App\Http\Controllers\mobilcontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMobilController;
use App\Models\customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
     
// });


//mobil
Route::get('/', [mobilcontroller::class, 'index']);
Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/create', [mobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('mobil/{id_mobil}/edit', [mobilcontroller::class, 'edit'])->name('mobil.edit');
Route::post('mobil/{id_mobil}/update', [mobilcontroller::class, 'update'])->name('mobil.update');
Route::delete('/mobil/{id_mobil}', [MobilController::class, 'delete'])->name('mobil.delete');

//customer
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('customer/{id_customer}/edit', [Customercontroller::class, 'edit'])->name('customer.edit');
Route::post('customer/{id_customer}/update', [Customercontroller::class, 'update'])->name('customer.update');
Route::delete('/customer/{id_customer}', [Customercontroller::class, 'delete'])->name('customer.delete');

//Mobil dan Customer
Route::get('/customer-mobil', [CustomerMobilController::class, 'index'])->name('customer_mobil.index');
Route::get('customer_mobil/create', [CustomerMobilController::class, 'create'])->name('customer_mobil.create');
Route::post('customer_mobil/store', [CustomerMobilController::class, 'store'])->name('customer_mobil.store');
Route::delete('customer_mobil/delete/{kode}', [CustomerMobilController::class, 'delete'])->name('customer_mobil.delete');
Route::get('customer_mobil/{kode}/edit', [CustomerMobilController::class, 'edit'])->name('customer_mobil.edit');


Route::put('customer_mobil/{kode}', [CustomerMobilController::class, 'update'])->name('customer_mobil.update');