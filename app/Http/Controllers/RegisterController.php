<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
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
            'password'=>$request->password
        ]);
    }
}
