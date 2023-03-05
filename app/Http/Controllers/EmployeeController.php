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
