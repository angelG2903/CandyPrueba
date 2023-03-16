<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin','disable_back']);
        // $this->middleware('auth');
        
    }
    
    public function index(Request $request)
    {

        $buscar=$request->get('buscar'); 

        // $dataCake['cakes'] = DB::select('select * from cakes where DATE(updated_at) = ? and status = ? ',[$buscar,'vendido']);
        $cakes = DB::select('select * from cakes where DATE(updated_at) = ? and status = ? ',[$buscar,'vendido']);

        // $dataCandle['candles'] = DB::select('select * from candles where DATE(updated_at) = ? and status = ?',[$buscar,'vendido']);
        $candles = DB::select('select * from candles where DATE(updated_at) = ? and status = ?',[$buscar,'vendido']);

        // $dataOrder['orders'] = DB::select('select * from orders where DATE(created_at) = ? and status = ?',[$buscar,'cancelado']);
        $orders = DB::select('select * from orders where DATE(created_at) = ? and status = ?',[$buscar,'disponible']);
        
        $date = Carbon::now();
        // return response()->json($dataCake);
        return view('admin.index',compact('date','buscar','cakes','candles','orders'));
    }

    public function inventory()
    {

        $cakes = DB::select('select * from cakes where status = ?',['disponible']);
        $candles = DB::select('select * from candles where status = ?',['disponible']);
        
        return view('admin.inventory', compact('cakes', 'candles'));
    }

    public function showOrder(Request $request)
    {
        $buscar=$request->get('buscar');

        // $orders['orders'] = DB::select('select * from orders where status = ?',[$buscar]);
        $orders['orders'] = DB::select('select * from orders where status = ?',[$buscar]);

        return view('admin.order', $orders)->with(compact('buscar'));
    }

    public function employee()
    {

        $users['users'] = DB::select('select * from users where rol = ?',['user']);

        return view('admin.employee',$users);
    }


}
