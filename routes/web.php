<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Route::get('/', function () {
    return view('home');
}); */

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('candy')->middleware('session');

// HAY QUE CHECAR LAS RUTAS VER UN PUTO VIDEO PORQUE EL / SI O SI DEBE DE SER EL HOME Y TAMBIEN DEBE DE ESTAR
// EL LOGIN JUNTOS SIN MIDDLEWARES

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Hay que checar como van a ir las vistas para poder seguir 

// Route::resource('home',HomeController::class);
// con esta linea de codigo mostramos todas las rutas que estan en el controlador

// Route::resource('employee',EmployeeController::class);

// Rutas del empleado
Route::get('employee',[App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('ProfileC', [App\Http\Controllers\EmployeeController::class, 'profileC'])->name('ProfileC');
Route::post('editUC', [App\Http\Controllers\EmployeeController::class, 'editUserE'])->name('editUC');

// Route::get('RegisterOrder',[App\Http\Controllers\EmployeeController::class, 'registerOrder'])->name('employee.RegisterOrder');



// Route::group(['middleware'=>'disable_back'],function(){
Route::get('OrderI',[App\Http\Controllers\OrderController::class, 'index'])->name('OrderI');
Route::get('Order/create',[App\Http\Controllers\OrderController::class, 'create'])->name('Order.create');
Route::post('Order/store',[App\Http\Controllers\OrderController::class, 'store'])->name('Order.store');
Route::get('Order/{id}/edit',[App\Http\Controllers\OrderController::class, 'edit'])->name('Order.edit');
Route::patch('Order/{id}',[App\Http\Controllers\OrderController::class, 'update'])->name('Order.update');
Route::delete('Order/{id}',[\App\Http\Controllers\OrderController::class, 'destroy'])->name('Order.destroy');
Route::patch('OrderI/{id}',[App\Http\Controllers\OrderController::class, 'cancel'])->name('Order.cancel');
Route::patch('OrderPay/{id}',[App\Http\Controllers\OrderController::class, 'payOrder'])->name('Order.payOrder');
// });
// registar pasteles
Route::get('Product',[\App\Http\Controllers\RegisterProductController::class, 'index'])->name('Product');
Route::get('Product/create',[\App\Http\Controllers\RegisterProductController::class, 'create'])->name('Product.create');
Route::post('Product/store',[\App\Http\Controllers\RegisterProductController::class, 'store'])->name('Product.store');
Route::get('Product/{id}/edit',[\App\Http\Controllers\RegisterProductController::class, 'edit'])->name('Product.edit');
Route::patch('Product/{id}',[\App\Http\Controllers\RegisterProductController::class, 'update'])->name('Product.update');
Route::delete('Product/{id}',[\App\Http\Controllers\RegisterProductController::class, 'destroy'])->name('Product.destroy');

// registar velitas
Route::get('Product/createC',[\App\Http\Controllers\RegisterProductController::class, 'createC'])->name('Product.createC');
Route::post('Product/storeC',[\App\Http\Controllers\RegisterProductController::class, 'storeC'])->name('Product.storeC');
Route::get('ProductC/{id}/edit',[\App\Http\Controllers\RegisterProductController::class, 'editC'])->name('Product.editC');
Route::patch('ProductC/{id}',[\App\Http\Controllers\RegisterProductController::class, 'updateC'])->name('Product.updateC');
Route::delete('ProductC/{id}',[\App\Http\Controllers\RegisterProductController::class, 'destroyC'])->name('Product.destroyC');

// rutas venta pastel
Route::get('Sale',[\App\Http\Controllers\RegisterSaleController::class, 'index'])->name('Sale');
Route::get('Sale/create',[\App\Http\Controllers\RegisterSaleController::class, 'create'])->name('Sale.create');
Route::patch('Sale/{id}',[\App\Http\Controllers\RegisterSaleController::class, 'update'])->name('Sale.update');
Route::patch('SaleQ/{id}',[\App\Http\Controllers\RegisterSaleController::class, 'updateQ'])->name('Sale.updateQ');

// velitas venta
Route::get('Sale/createC',[\App\Http\Controllers\RegisterSaleController::class, 'createC'])->name('Sale.createC');
Route::patch('SaleC/{id}',[\App\Http\Controllers\RegisterSaleController::class, 'updateC'])->name('Sale.updateC');
Route::patch('SaleCQ/{id}',[\App\Http\Controllers\RegisterSaleController::class, 'updateCQ'])->name('Sale.updateCQ');





// Rutas del administrador
Route::get('Dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('Dashboard');
Route::get('Inventory',[App\Http\Controllers\AdminController::class, 'inventory'])->name('Inventory');
Route::get('Order',[App\Http\Controllers\AdminController::class, 'showOrder'])->name('Order');
Route::get('RegisterEmployee',[App\Http\Controllers\AdminController::class, 'employee'])->name('RegisterEmployee');
Route::get('Profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('Profile');

Route::post('editU', [App\Http\Controllers\AdminController::class, 'editUser'])->name('editU');
Route::delete('RegisterEmployee/{id}',[\App\Http\Controllers\AdminController::class, 'destroy'])->name('RegisterEmployee.destroy');
Route::get('RegisterEmployee/{id}/edit', [App\Http\Controllers\AdminController::class, 'editEmployee'])->name('RegisterEmployee.edit');
Route::patch('RegisterEmployee/{id}',[\App\Http\Controllers\AdminController::class, 'update'])->name('RegisterEmployee.update');




/* Route::group( function(){ dashboard
    Route::get('/employee/registerOrder', [EmployeeController::class, 'registerO'])->name('registar');
}); */
