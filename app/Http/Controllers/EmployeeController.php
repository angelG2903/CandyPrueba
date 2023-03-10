<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','user','disable_back']);
    }


    public function index()
    {
        return view('employee.index');
    }

    public function recordSale()
    {
        return view('employee.registerS');
    }
}
