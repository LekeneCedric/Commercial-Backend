<?php

namespace App\Http\Controllers;

use App\Models\bon_livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BonLivraisonController extends Controller
{
    public function index(){
        $bon_livraisons = bon_livraison::paginate(15);
        return response()->json($bon_livraisons,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'description'=>'required|string',
            'total'=>'required|int',
            'statut',
            'motif',
            'isvalider',
            'isvalider1',
            'motif1',
            'isvalider1',
            'motif1',
            'idutilisateur',
            'idclient',
            'id_bon_commande'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $bon_livraison = bon_livraison::create($validators->validated());
        return response()->json($bon_livraison,200);
    }
    public function find($id){
        $bon_livraison = bon_livraison::find($id);
        if(is_null($bon_livraison)){
            return response()->json([
                'message'=>'aucune bon_livraison correspondante!'
            ]);
        }
        return response()->json($bon_livraison,200);
    }
    public function update(Request $request, $id){
        $bon_livraison = bon_livraison::find($id);
        if(is_null($bon_livraison)){
            return response()->json(['message'=>'aucune bon_livraison']);
        }
        $bon_livraison_update = $bon_livraison->update($request->all());
        return response()->json($bon_livraison_update,200);
    }
    public function delete($id){
          $bon_livraison = bon_livraison::find($id);
          if(is_null($bon_livraison)){
            return response()->json(['message'=>'aucune bon_livraison correspondante']);
          }
          $bon_livraison = $bon_livraison->delete();
          return response()->json($bon_livraison);
    }
}
