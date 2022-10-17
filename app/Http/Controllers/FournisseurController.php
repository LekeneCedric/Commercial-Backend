<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    public function index(){
        $fournisseurs = fournisseur::paginate(15);
        return response()->json($fournisseurs,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'email'=>'required|email',
            'telephone'=>'required|string',
            'adresse'=>'required|string',
            'domaine_activite'=>'required|string',
            'dateajout'=>'required'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $fournisseur = fournisseur::create($validators->validated());
        return response()->json($fournisseur,200);
    }
    public function find($id){
        $fournisseur = fournisseur::find($id);
        if(is_null($fournisseur)){
            return response()->json([
                'message'=>'aucune fournisseur correspondante!'
            ]);
        }
        return response()->json($fournisseur,200);
    }
    public function update(Request $request, $id){
        $fournisseur = fournisseur::find($id);
        if(is_null($fournisseur)){
            return response()->json(['message'=>'aucune fournisseur']);
        }
        $fournisseur_update = $fournisseur->update($request->all());
        return response()->json($fournisseur_update,200);
    }
    public function delete($id){
          $fournisseur = fournisseur::find($id);
          if(is_null($fournisseur)){
            return response()->json(['message'=>'aucune fournisseur correspondante']);
          }
          $fournisseur = $fournisseur->delete();
          return response()->json($fournisseur);
    }
}
