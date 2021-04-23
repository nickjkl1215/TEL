<?php

namespace App\Http\Controllers;

use App\Models\User;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//Editar 
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
//Deletar usuario
        public function delete_user($id){
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return Redirect::to('/');
        }
}