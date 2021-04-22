<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Form_editar_user(User $user){
        return view('Form_Editar_User', ['user' => $user]);
    }

    public function editar_user(User $user, Request $request){
        $user->name = $request->name;
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
             $user->email = $request->email;
        }
        if(!empty($request->password)){
             $user->password = Hash::make($request->password);
        }
        $user->save();
        return Redirect::to('/dashboard');
    }

    public function delete_user($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return Redirect::to('/');
    }

    public function index(){
        $clientes = Usuario::get();
        return view('clientes.list', ['clientes' => $clientes]);
    }



    public function new(){
        return view('clientes.form');
    }


    public function add( Request $request){
        $cliente = new Usuario;

        switch($request->local_nascimento){
            case 'São Paulo':
                $request->validate(['rg' => 'required']);
            break;
            case 'Bahia':
                $request->validate(['data_de_nascimento' => 'required|date|before: 18 years ago']);
            break;
        }


        $cliente->name = $request->name;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->data_de_nascimento = $request->data_de_nascimento;
        $cliente->telefone = $request->telefone;
        $cliente->local_nascimento = $request->local_nascimento;
        $cliente->created_by = Auth::user()->name;
        $cliente->updated_by = '';

        $cliente->save();
        
        return Redirect::to('/clientes');
    }





    public function edit( $id ){
        $cliente = Usuario::findOrFail( $id );
        return view('clientes.form', [ 'cliente' => $cliente]);
    }




    public function update($id, Request $request){

        $cliente = Usuario::findOrFail( $id );
        $cliente->name = $request->name;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->data_de_nascimento = $request->data_de_nascimento;
        $cliente->telefone = $request->telefone;
        $cliente->local_nascimento = $request->local_nascimento;
        $cliente->updated_by = Auth::user()->name;
        $cliente->save();
        
        return Redirect::to('/clientes');
        
    }
    public function delete($id){
        $cliente = Usuario::findOrFail( $id );
        $cliente->delete();
        return Redirect::to('/clientes');
    }

 

}
