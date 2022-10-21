<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller
{
    public function index(){
        $utilisateurs =  utilisateur::all();
        return response()->json($utilisateurs,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|email|unique:utilisateurs',
            'password'=>'required|string',
            'telephone'=>'required|string|unique:utilisateurs',
            'idrole'=>'required|int',   
            'idagence'=>'required|int'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $utilisateur = utilisateur::create($validators->validated());
        return response()->json($utilisateur,200);
    }
    public function find($id){
        $utilisateur = utilisateur::find($id);
        if(is_null($utilisateur)){
            return response()->json([
                'message'=>'aucune utilisateur correspondante!'
            ]);
        }
        return response()->json($utilisateur,200);
    }
    public function update(Request $request, $id){
        $utilisateur = utilisateur::find($id);
        if(is_null($utilisateur)){
            return response()->json(['message'=>'aucune utilisateur']);
        }
        $utilisateur_update = $utilisateur->update($request->all());
        return response()->json($utilisateur_update,200);
    }
    public function delete($id){
          $utilisateur = utilisateur::find($id);
          if(is_null($utilisateur)){
            return response()->json(['message'=>'aucune utilisateur correspondante']);
          }
          $utilisateur = $utilisateur->delete();
          return response()->json($utilisateur);
    }
    
}
