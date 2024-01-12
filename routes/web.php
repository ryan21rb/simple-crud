<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\mobilcontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMobilController;
use App\Http\Controllers\SesiController;
use App\Http\Middleware\Session;
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
 //Login    



Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/staff', [AdminController::class, 'staff'])->middleware('userAkses:staff');
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');


Route::middleware(['Session'])->group(function() {
    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/customer-mobil', [CustomerMobilController::class, 'index'])->name('customer_mobil.index');
});
   

Route::get('/home', function (){
    return redirect('/admin');
});

        //mobil
 Route::middleware(['akses:admin'])->group(function() {
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
});
        //Mobil Customer
        
        Route::get('customer_mobil/create', [CustomerMobilController::class, 'create'])->name('customer_mobil.create');
        Route::post('customer_mobil/store', [CustomerMobilController::class, 'store'])->name('customer_mobil.store');
        Route::delete('customer_mobil/delete/{kode}', [CustomerMobilController::class, 'delete'])->name('customer_mobil.delete');
        Route::get('customer_mobil/{kode}/edit', [CustomerMobilController::class, 'edit'])->name('customer_mobil.edit');
        Route::put('customer_mobil/{kode}', [CustomerMobilController::class, 'update'])->name('customer_mobil.update');

});

Route::middleware(['akses:admin,staff'])->group(function() {
    Route::get('customer_mobil/create', [CustomerMobilController::class, 'create'])->name('customer_mobil.create');
    Route::post('customer_mobil/store', [CustomerMobilController::class, 'store'])->name('customer_mobil.store');
    Route::delete('customer_mobil/delete/{kode}', [CustomerMobilController::class, 'delete'])->name('customer_mobil.delete');
    Route::get('customer_mobil/{kode}/edit', [CustomerMobilController::class, 'edit'])->name('customer_mobil.edit');
    Route::put('customer_mobil/{kode}', [CustomerMobilController::class, 'update'])->name('customer_mobil.update');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
}); // Adjust the URL based on your form submission
