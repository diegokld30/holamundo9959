<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //intercepto el dato username para quitar el espacio y reemplazar por -
        $request->request->add(['username'=>Str::slug($request->username)]);
//Vamos a crear el proceso de validacion
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'username'=>'required|unique:users|min:3|max:50',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed'

        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            //'password'=>bcrypt($request->password)
            //'password'=>Hash::make($request->password)
            'password'=>$request->password
        ]);

        //autenticar

        /*auth()->attempt([
            'email' => $request->email,
            'password'=> $request->password
        ]);*/
        //Otra forma de autenticar

        auth()->attempt($request->only('email','password'));

        //redireccionar
        return redirect()->route('post.index');
    }
}
