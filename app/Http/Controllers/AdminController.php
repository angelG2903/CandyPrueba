<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
        // solo comenta esta linea para poder entrar a registrar el admin
        // $this->middleware(['auth','admin','disable_back']);

        
    }
    
    public function index(Request $request)
    {

        $date = Carbon::now();
        
        $buscar=$request->get('buscar'); 

        // $dataCake['cakes'] = DB::select('select * from cakes where DATE(updated_at) = ? and status = ? ',[$buscar,'vendido']);
        $cakes = DB::select('select * from cakes where DATE(updated_at) = ? and status = ? ',[$buscar,'vendido']);

        // $dataCandle['candles'] = DB::select('select * from candles where DATE(updated_at) = ? and status = ?',[$buscar,'vendido']);
        $candles = DB::select('select * from candles where DATE(updated_at) = ? and status = ?',[$buscar,'vendido']);

        // $dataOrder['orders'] = DB::select('select * from orders where DATE(created_at) = ? and status = ?',[$buscar,'cancelado']);
        $orders = DB::select('select * from orders where DATE(created_at) = ? and status = ?',[$buscar,'disponible']);

        $users = DB::select('select id, name from users');
        
        
        // return response()->json($dataCake);
        return view('admin.index',compact('date','buscar','cakes','candles','orders','users'));
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
        $orders['orders'] = DB::select('select * from orders where status = ? order by fechaEntrega desc',[$buscar]);
        $users = DB::select('select * from users');

        return view('admin.order', $orders)->with(compact('buscar','users'));
    }

    public function employee()
    {

        $users['users'] = DB::select('select * from users where rol = ?',['user']);

        return view('admin.employee',$users);
    }


    public function profile()
    {
        return view('admin.editProfile');
    }



    public function editUser (Request $request)
    {
        
        $user = Auth::user();
        $userEmail = $user->email;
        $name = $user->name;
        $last_name = $user->last_name;
        $phone_number = $user->phone_number;
        $userPassword = $user->password;
        
        if ($request->password != "" && $request->email == $userEmail){

            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|min:3|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35',
                'password'=>'required|string|min:8|confirmed',
                
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
            ];
    
            $this->validate($request, $campos,$mensaje);


            // Verificamos que la contraseña sea igual a la que esta en el sistema
            if(Hash::check($request->password_actual, $userPassword)){

                $user->password = Hash::make($request->password);
                
                $sql = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['password'=> $user->password]);


                $perfil = request()->except('_token', 'password_actual', 'password','password_confirmation');

                User::where('id','=',$user->id)->update($perfil);
                

                return redirect('Dashboard')->with('mensaje','actualizado');
                

            }else{
                return redirect()->back()->with('mensaje','La contraseña actual no coincide con nuestros registros');
            }

        }elseif($request->password != "" && $request->email != $userEmail){

            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|min:3|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35|unique:users',
                'password'=>'required|string|min:8|confirmed',
                
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
            ];
    
            $this->validate($request, $campos,$mensaje);


            // Verificamos que la contraseña sea igual a la que esta en el sistema
            if(Hash::check($request->password_actual, $userPassword)){

                $user->password = Hash::make($request->password);
                $sql = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['password'=> $user->password]);

                $perfil = request()->except('_token', 'password_actual', 'password','password_confirmation');

                User::where('id','=',$user->id)->update($perfil);
                
                return redirect('Dashboard')->with('mensaje','actualizado');
                

            }else{
                return redirect()->back()->with('mensaje','La contraseña actual no coincide con nuestros registros');
            }

        }elseif($request->email != $userEmail){
            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|min:3|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35|unique:users',
                
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
            ];
    
            $this->validate($request, $campos,$mensaje);


            if(Hash::check($request->password_actual, $userPassword)){

                $perfil = request()->except('_token', 'password_actual', 'password','password_confirmation');

                User::where('id','=',$user->id)->update($perfil);

                return redirect('Dashboard')->with('mensaje','actualizado');
                
            }else{
                return redirect()->back()->with('mensaje','La contraseña actual no coincide con nuestros registros');
            }
            

        }elseif($request->email == $userEmail && $request->name == $name && $request->last_name == $last_name && $request->phone_number == $phone_number){

            return redirect('Dashboard')->with('mensaje','nada');

        }else{
            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|min:3|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35',
                
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
            ];
    
            $this->validate($request, $campos,$mensaje);

            $perfil = request()->except('_token', 'password_actual', 'password','password_confirmation');

            User::where('id','=',$user->id)->update($perfil);
           
            return redirect('Dashboard')->with('mensaje','actualizado');
        }

    }

    public function editEmployee ($id)
    {
        $employee = User::find($id);

        return view('admin.editEmployee', compact('employee'));

    }

    // update
    public function update(Request $request, $id)
    {
        
        $employee = User::find($id);
        $userEmail = $employee->email;
        $name = $employee->name;
        $last_name = $employee->last_name;
        $phone_number = $employee->phone_number;
        $userPassword = $employee->password;

        if ($request->password != "" && $request->email == $userEmail){

            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email' => 'required|string|email|max:35',           
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
    
            ];
    
            $this->validate($request, $campos,$mensaje);

            $employee->password = Hash::make($request->password);
                
            $sql = DB::table('users')
                    ->where('id', $id)
                    ->update(['password'=> $employee->password]);


            $perfil = request()->except('_token','_method','password','password_confirmation');

            User::where('id','=',$id)->update($perfil);
            

            return redirect('RegisterEmployee')->with('mensaje','actualizado');

        }elseif($request->password != "" && $request->email != $userEmail){

            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35|unique:users',
                'password'=>'required|string|min:8|confirmed',
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
    
            ];
    
            $this->validate($request, $campos,$mensaje);

            $employee->password = Hash::make($request->password);
            $sql = DB::table('users')
                    ->where('id', $id)
                    ->update(['password'=> $employee->password]);

            $perfil = request()->except('_token','_method','password','password_confirmation');

            User::where('id','=',$id)->update($perfil);
            
            return redirect('RegisterEmployee')->with('mensaje','actualizado');
            

        }elseif($request->email != $userEmail){
            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email'=>'required|string|email|max:35|unique:users',       
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
    
            ];
    
            $this->validate($request, $campos,$mensaje);

            $perfil = request()->except('_token','_method','password','password_confirmation');

            User::where('id','=',$id)->update($perfil);

            return redirect('RegisterEmployee')->with('mensaje','actualizado');
            

        }elseif($request->email == $userEmail && $request->name == $name && $request->last_name == $last_name && $request->phone_number == $phone_number){

            return redirect('RegisterEmployee')->with('mensaje','nada');

        }else{
            $campos=[
                'name'=>'required|string|min:3|max:25',
                'last_name'=>'required|string|max:25',
                'phone_number'=>'required|string|min:10|max:10',
                'email' => 'required|string|email|max:35',           
            ];
    
            $mensaje=[
                'required'=>'El campo :attribute es obligatorio.',
    
            ];
    
            $this->validate($request, $campos,$mensaje);
    
            $employee = request()->except('_token','_method','password','password_confirmation');
    
            User::where('id','=',$id)->update($employee);
    
    
            return redirect()->route('RegisterEmployee')->with('mensaje','actualizado');
        }


    }

    // Eliminar un empleado
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('RegisterEmployee')->with('mensaje','EliminarUser');
    }


}
