<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Candle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RegisterSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','user','disable_back']);
    }

    // Crear campo null para traer id de la persona que vendio el producto
    public function index()
    {
        
        // $dataCake['cakes']=Cake::paginate();
        $dataCake['cakes'] = DB::select('select * from cakes where status = ?',['vendido']);
        $dataCandle['candles'] = DB::select('select * from candles where status = ?',['vendido']);
        // $dataCandle['candles']=Candle::paginate();

        $date = Carbon::now();
        return view('sale.index',$dataCake, $dataCandle)->with(compact('date'));
        // return response()->json($dataCake);
    }

    // Pasteles en stock
    public function create()
    {

        $user = Auth::id();
        $dataCake['cakes'] = DB::select('select * from cakes where status = ?',['disponible']);

        return view('sale.create', compact('user'), $dataCake);
    }

    // agregar a la venta
    public function update(Request $request, $id)
    {
        
        $datacake = request()->except('_token','_method');

        Cake::where('id','=',$id)->update($datacake);


        return redirect()->route('Sale')->with('mensaje','Pastel agregado a la venta con éxito');

    }
    // Quitar de la venta
    public function updateQ(Request $request, $id)
    {
        
        $datacake = request()->except('_token','_method');

        Cake::where('id','=',$id)->update($datacake);


        return redirect()->route('Sale')->with('mensaje','Pastel eliminado de la venta con éxito');

    }

    // Velitas en stock
    public function createC()
    {

        $user = Auth::id();
        $dataCandle['candles'] = DB::select('select * from candles where status = ?',['disponible']);

        return view('sale.createC', compact('user'), $dataCandle);
    }

    // Agregar a la venta
    public function updateC(Request $request, $id)
    {
        
        $datacandle = request()->except('_token','_method');

        Candle::where('id','=',$id)->update($datacandle);


        return redirect()->route('Sale')->with('mensaje','Velita agregada a la venta con éxito');

    }

    // Quitar de la venta
    public function updateCQ(Request $request, $id)
    {
        
        $datacake = request()->except('_token','_method');

        Candle::where('id','=',$id)->update($datacake);


        return redirect()->route('Sale')->with('mensaje','Velita eliminada de la venta con éxito');

    }


}
