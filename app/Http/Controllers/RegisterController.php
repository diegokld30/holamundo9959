<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request->password);
        //Vamos a crear el proceso de validacion
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'username'=>'required|min:3|max:50',
            'email'=>'required',
            'password'=>'required'

        ]);
    }
}
