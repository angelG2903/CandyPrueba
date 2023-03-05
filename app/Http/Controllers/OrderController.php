<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware(['auth','user']);
     }

    public function index()
    {
        $dataOrder['orders']=Order::paginate();
        return view('order.index', $dataOrder);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::id();

        return view('order.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataOrder = request()->except('_token');

        Order::create($dataOrder);
        
        // return response()->json($dataOrder);
        return redirect()->route('OrderI');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataOrder = Order::find($id);

        return view('order.edit', compact('dataOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dataOrder = request()->except('_token','_method');

        Order::where('id','=',$id)->update($dataOrder);

        $dataOrder = Order::find($id);

        return view('order.edit', compact('dataOrder'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
