<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
        // $this->middleware('auth');
        
    }
    
    public function index()
    {
        return view('admin.index');
    }

    public function inventory()
    {
        return view('admin.inventory');
    }

    public function showOrder()
    {
        return view('admin.order');
    }

    public function employee()
    {
        return view('admin.employee');
    }


}
