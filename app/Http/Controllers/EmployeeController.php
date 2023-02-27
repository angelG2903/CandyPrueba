<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','user']);
    }


    public function index()
    {
        return view('employee.index');
    }

    // estas 2 funciones van para el controlador de orders
    public function registerOrder()
    {
        return view('employee.registerO');
    }

    public function showOrder()
    {
        return view('employee.showO');
    }

    // Registar producto
    public function registerProduc()
    {
        return view('employee.registerP');
    }

    public function recordSale()
    {
        return view('employee.registerS');
    }
}
