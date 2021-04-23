<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

//Exibir 
    public function index(){
        $clientes = Cliente::get();
        return view('clientes.list', ['clientes' => $clientes]);
    }
//Adicionar 
    public function new(){
        return view('clientes.form');
    }
    public function add( Request $request){
        $cliente = new Cliente;
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
//Editar
    public function edit( $id ){
        $cliente = Cliente::findOrFail( $id );
        return view('clientes.form', [ 'cliente' => $cliente]);
    }

    public function update($id, Request $request){
        switch($request->local_nascimento){
            case 'São Paulo':
                $request->validate(['rg' => 'required']);
            break;
            case 'Bahia':
                $request->validate(['data_de_nascimento' => 'required|date|before: 18 years ago']);
            break;
        }
            $cliente = Cliente::findOrFail( $id );
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
//Deletar 
    public function delete($id){
        $cliente = Cliente::findOrFail( $id );
        $cliente->delete();
        return Redirect::to('/clientes');
    }
}
