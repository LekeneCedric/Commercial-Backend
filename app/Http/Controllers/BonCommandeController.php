<?php

namespace App\Http\Controllers;

use App\Models\bon_commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BonCommandeController extends Controller
{
    public function index(){
        $bon_commandes =  bon_commande::paginate(15);
        return response()->json($bon_commandes,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'num_bon'=>'required|string',
            'delai'=>'required',
            'envoye'=>'required|int',
            'montant_totalHT'=>'required',
            'montant_totalTT'=>'required',
            'description'=>'required',
            'isvalider'=>'required',
            'isvalider1'=>'required',
            'isvalider2'=>'required',
            'motif'=>'required',
            'motif1'=>'required',
            'motif2'=>'required',
            'idutilisateur'=>'required|int',
            'idclient'=>'required|int',
            'id_mode_reglement'=>'required|int',
            'idcondition'=>'required|int',
            'idmonnaie'=>'required|int',
            'idagence'=>'required|int'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $bon_commande = bon_commande::create($validators->validated());
        return response()->json($bon_commande,200);
    }
    public function find($id){
        $bon_commande = bon_commande::find($id);
        if(is_null($bon_commande)){
            return response()->json([
                'message'=>'aucune bon_commande correspondante!'
            ]);
        }
        return response()->json($bon_commande,200);
    }
    public function update(Request $request, $id){
        $bon_commande = bon_commande::find($id);
        if(is_null($bon_commande)){
            return response()->json(['message'=>'aucune bon_commande']);
        }
        $bon_commande_update = $bon_commande->update($request->all());
        return response()->json($bon_commande_update,200);
    }
    public function delete($id){
          $bon_commande = bon_commande::find($id);
          if(is_null($bon_commande)){
            return response()->json(['message'=>'aucune bon_commande correspondante']);
          }
          $bon_commande = $bon_commande->delete();
          return response()->json($bon_commande);
    }
}
