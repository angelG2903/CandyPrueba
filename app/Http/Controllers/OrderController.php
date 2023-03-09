<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware(['auth','user']);
     }

    /*  protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'=>['required', 'string', 'max:50'],
            'telefono'=>['required', 'string', 'min:10', 'max:10'],
            'direccion'=>['required', 'string', 'max:200'],
            'sabor'=>['required'],
            'relleno'=>['required', 'string', 'max:100'],
            'rebanadas'=>['required', 'string', 'max:40'],
            'decoracion'=>['required','string','max:200'],
            'precio'=>['required', 'numeric', 'max:6'],
            'anticipo'=>['required', 'numeric', 'max:6'],
            'fechaEntrega'=>['required', 'date'],
            'horaEntrega'=>['required'],

        ]);
    } */

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

        $campos=[
            'nombre'=>'required|string|max:25',
            'telefono'=>'required|string|min:10|max:10',
            'direccion'=>'required|string|max:200',
            'sabor'=>'required',
            'relleno'=>'required|string|max:100',
            'rebanadas'=>'required|string|max:40',
            'decoracion'=>'required|string|max:200',
            'precio'=>'required|numeric|decimal:0,2',
            'anticipo'=>'required|numeric|decimal:0,2',
            'fechaEntrega'=>'required|date',
            'horaEntrega'=>'required',
        ];

        $mensaje=[
            'required'=>'El campo :attribute es obligatorio.',
            // 'max'=>'El nombre es demaciado largo',
            // 'horaEntrega.required'=>'La la hora es requerida',

        ];

        $this->validate($request, $campos,$mensaje);


        $dataOrder = request()->except('_token');

        Order::create($dataOrder);
        
        // return response()->json($dataOrder);
        return redirect()->route('OrderI')->with('mensaje','Pedido registrado con éxito');
        
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

        // $dataOrder = Order::find($id);

        return redirect()->route('OrderI')->with('mensaje','Pedido editado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
