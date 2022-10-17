<?php

namespace App\Http\Controllers;

use App\Models\bon_produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BonProduitController extends Controller
{
    public function index(){
        $bon_produits = bon_produit::paginate(15);
        return response()->json($bon_produits,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'idfacture'=>'required|integer',
            'idproduit'=>'required|integer',
            'unite'=>'required',
            'quantite'=>'required|integer',
            'prix_unitaire'=>'required|integer',
            'total'=>'required|integer',
            'observations'=>'required',
            'dateajout'=>'required'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $bon_produit = bon_produit::create($validators->validated());
        return response()->json($bon_produit,200);
    }
    public function find($id){
        $bon_produit = bon_produit::find($id);
        if(is_null($bon_produit)){
            return response()->json([
                'message'=>'aucune bon_produit correspondante!'
            ]);
        }
        return response()->json($bon_produit,200);
    }
    public function update(Request $request, $id){
        $bon_produit = bon_produit::find($id);
        if(is_null($bon_produit)){
            return response()->json(['message'=>'aucune bon_produit']);
        }
        $bon_produit_update = $bon_produit->update($request->all());
        return response()->json($bon_produit_update,200);
    }
    public function delete($id){
          $bon_produit = bon_produit::find($id);
          if(is_null($bon_produit)){
            return response()->json(['message'=>'aucune bon_produit correspondante']);
          }
          $bon_produit = $bon_produit->delete();
          return response()->json($bon_produit);
    }
}
