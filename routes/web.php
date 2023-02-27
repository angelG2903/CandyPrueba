<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
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
Route::get('employee',[App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('RegisterOrder',[App\Http\Controllers\EmployeeController::class, 'registerOrder'])->name('employee.RegisterOrder');
Route::get('ShowOrder',[App\Http\Controllers\EmployeeController::class, 'showOrder'])->name('employee.showOrder');
Route::get('RegisterProduct',[App\Http\Controllers\EmployeeController::class, 'registerProduc'])->name('employee.RegisterProduct');
Route::get('RecordSale',[App\Http\Controllers\EmployeeController::class, 'recordSale'])->name('employee.RecordSale');



Route::get('Dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('Dashboard');
Route::get('Inventory',[App\Http\Controllers\AdminController::class, 'inventory'])->name('Inventory');
Route::get('Order',[App\Http\Controllers\AdminController::class, 'showOrder'])->name('Order');
Route::get('RegisterEmployee',[App\Http\Controllers\AdminController::class, 'employee'])->name('RegisterEmployee');





/* Route::group( function(){ dashboard
    Route::get('/employee/registerOrder', [EmployeeController::class, 'registerO'])->name('registar');
}); */
