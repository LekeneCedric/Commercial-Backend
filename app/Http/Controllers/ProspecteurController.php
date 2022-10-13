<?php

namespace App\Http\Controllers;

use App\Models\prospecteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProspecteurController extends Controller
{
    public function index(){
        $prospecteurs = prospecteur::paginate(15);
        return response()->json($prospecteurs,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'telephone'=>'required|string',
            'adresse'=>'required|string',
            'email'=>'required|email'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $prospecteur = prospecteur::create($validators->validated());
        return response()->json($prospecteur,200);
    }
    public function find($id){
        $prospecteur = prospecteur::find($id);
        if(is_null($prospecteur)){
            return response()->json([
                'message'=>'aucune prospecteur correspondante!'
            ]);
        }
        return response()->json($prospecteur,200);
    }
    public function update(Request $request, $id){
        $prospecteur = prospecteur::find($id);
        if(is_null($prospecteur)){
            return response()->json(['message'=>'aucune prospecteur']);
        }
        $prospecteur_update = $prospecteur->update($request->all());
        return response()->json($prospecteur_update,200);
    }
    public function delete($id){
          $prospecteur = prospecteur::find($id);
          if(is_null($prospecteur)){
            return response()->json(['message'=>'aucune prospecteur correspondante']);
          }
          $prospecteur = $prospecteur->delete();
          return response()->json($prospecteur);
    }
}
