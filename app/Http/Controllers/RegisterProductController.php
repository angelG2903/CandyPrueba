<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Candle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterProductController extends Controller
{

    public function __construct()
     {
        $this->middleware(['auth','user','disable_back']);
     }


    public function index()
    {
        $dataCake['cakes']=Cake::paginate();
        $dataCandle['candles']=Candle::paginate();
        return view('register.index',$dataCake, $dataCandle);
        
        // return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::id();

        return view('register.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $campos=[
            'sabor'=>'required',
            'tamanio'=>'required',
            'etiqueta'=>'required',
            'precio'=>'required|numeric|decimal:0,2',
            'cantidad'=>'required',
            
        ];

        $mensaje=[
            'required'=>'El campo :attribute es obligatorio.',
            // 'max'=>'El nombre es demaciado largo',
            // 'horaEntrega.required'=>'La la hora es requerida',

        ];

        $this->validate($request, $campos,$mensaje);


        $dataOrder = request()->except('_token','cantidad');

        // Cantidad de veses que se ingresaran pasteles
        $data = request('cantidad');

        for ($i=0; $i < $data; $i++) { 
            Cake::create($dataOrder);
        }

        // return response()->json($data);
        return redirect()->route('Product')->with('mensaje','Pastel registrado con éxito');
        
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
        $datacake = Cake::find($id);

        return view('register.edit', compact('datacake'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'sabor'=>'required',
            'tamanio'=>'required',
            'etiqueta'=>'required',
            'precio'=>'required|numeric|decimal:0,2',
            
        ];

        $mensaje=[
            'required'=>'El campo :attribute es obligatorio.',
            // 'max'=>'El nombre es demaciado largo',
            // 'horaEntrega.required'=>'La la hora es requerida',

        ];

        $this->validate($request, $campos,$mensaje);

        $datacake = request()->except('_token','_method');

        Cake::where('id','=',$id)->update($datacake);


        return redirect()->route('Product')->with('mensaje','Pastel editado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cake::destroy($id);

        return redirect('Product')->with('mesaje','Pastel eliminado');
    }


    // Funciones para las velitas --------------------------------------------------------------------

    // vista crear
    public function createC()
    {

        $user = Auth::id();

        return view('register.createC', compact('user'));
    }

    // Guardar 
    public function storeC(Request $request)
    {

        $campos=[
            'nombre'=>'required',
            'precio'=>'required|numeric|decimal:0,2',
            'cantidad'=>'required',
            
        ];

        $mensaje=[
            'required'=>'El campo :attribute es obligatorio.',
            // 'max'=>'El nombre es demaciado largo',
            // 'horaEntrega.required'=>'La la hora es requerida',

        ];

        $this->validate($request, $campos,$mensaje);


        $datacandle = request()->except('_token','cantidad');

        // Cantidad de veses que se ingresaran pasteles
        $data = request('cantidad');

        for ($i=0; $i < $data; $i++) { 
            Candle::create($datacandle);
        }

        // return response()->json($data);
        return redirect()->route('Product')->with('mensaje','Velita registrada con éxito');
        
    }

    // mostrar la información del id velita
    public function editC($id)
    {
        $datacandle = Candle::find($id);

        return view('register.editC', compact('datacandle'));
    }

    // Actualizar información 
    public function updateC(Request $request, $id)
    {
        $campos=[
            'sabor'=>'required',
            'tamanio'=>'required',
            'etiqueta'=>'required',
            'precio'=>'required|numeric|decimal:0,2',
            
        ];

        $mensaje=[
            'required'=>'El campo :attribute es obligatorio.',
            // 'max'=>'El nombre es demaciado largo',
            // 'horaEntrega.required'=>'La la hora es requerida',

        ];

        $this->validate($request, $campos,$mensaje);

        $datacandle = request()->except('_token','_method');

        Candle::where('id','=',$id)->update($datacandle);


        return redirect()->route('Product')->with('mensaje','Velita editada con éxito');

    }

    // Eliminar
    public function destroyC($id)
    {
        Candle::destroy($id);

        return redirect('Product')->with('mesaje','Velita eliminada');
    }


}
