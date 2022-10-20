<?php

namespace App\Http\Controllers;

use App\Models\bon_produit;
use App\Models\commercial;
use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    public function index(){
        $factures = facture::paginate(15);
        return response()->json($factures,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'remise'=>'required',
            'etat'=>'required',
            'montant_totalHT'=>'required',
            'montant_totalTT'=>'required',
            'montant_tva'=>'required',
            'montant_autre'=>'required',
            'montant_remise'=>'required',
            'description'=>'required',
            'dateenvoie'=>'required',
            'lieu_livraison'=>'required',
            'idclient'=>'required',
            'idmonnaie'=>'required',
            'idcommerciaux'=>'required',
            'idagence'=>'required',
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $facture = facture::create($validators->validated());
        return response()->json($facture,200);
    }
    public function find($id){
        $facture = facture::find($id);
        if(is_null($facture)){
            return response()->json([
                'message'=>'aucune facture correspondante!'
            ]);
        }
            $bon_produit = bon_produit::where('idfacture',$facture->id)->get();
            $qtetotal=0;
            foreach($bon_produit as $bon_prod){
                $bon_prod->article;
                $qtetotal+=$bon_prod->quantite;
            }
            $facture->quantite_total = $qtetotal;
           $facture->produits = $bon_produit;
           $facture->client;
        return response()->json($facture,200);
    }
    public function update(Request $request, $id){
        $facture = facture::find($id);
        if(is_null($facture)){
            return response()->json(['message'=>'aucune facture']);
        }
        $facture_update = $facture->update($request->all());
        return response()->json($facture_update,200);
    }
    public function delete($id){
          $facture = facture::find($id);
          if(is_null($facture)){
            return response()->json(['message'=>'aucune facture correspondante']);
          }
          $facture = $facture->delete();
          return response()->json($facture);
    }

    public function facturesClient($idclient){
        $factures = facture::where('idclient',$idclient)->orderBy('created_at','DESC')->get();
        if(count($factures)>0){
            $factures[0]->client;
        }
        return response()->json($factures,200);
    }
    
}
