<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profileC()
    {
        return view('employee.editPro');
    }



    public function editUserE (Request $request)
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

               
               
                return redirect('employee')->with('mensaje','actualizado');
                

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
                
                return redirect('employee')->with('mensaje','actualizado');
                

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

                return redirect('employee')->with('mensaje','actualizado');
                
            }else{
                return redirect()->back()->with('mensaje','La contraseña actual no coincide con nuestros registros');
            }

        }elseif($request->email == $userEmail && $request->name == $name && $request->last_name == $last_name && $request->phone_number == $phone_number){

            return redirect('employee')->with('mensaje','nada');

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

            return redirect('employee')->with('mensaje','actualizado');
        }

    }

}
