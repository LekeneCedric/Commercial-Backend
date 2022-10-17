<?php

namespace App\Http\Controllers;

use App\Models\bon_produit;
use App\Models\commerciaux;
use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommerciauxController extends Controller
{
    public function index(){
        $commerciauxs =  commerciaux::paginate(15);
        return response()->json($commerciauxs,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|email',
            'telephone'=>'required|string',
            'idagence'=>'required|int',
            'idutilisateur'=>'required|int'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $commerciaux = commerciaux::create($validators->validated());
        return response()->json($commerciaux,200);
    }
    public function find($id){
        $commerciaux = commerciaux::find($id);
        if(is_null($commerciaux)){
            return response()->json([
                'message'=>'aucune commerciaux correspondante!'
            ]);
        }
        return response()->json($commerciaux,200);
    }
    public function update(Request $request, $id){
        $commerciaux = commerciaux::find($id);
        if(is_null($commerciaux)){
            return response()->json(['message'=>'aucune commerciaux']);
        }
        $commerciaux_update = $commerciaux->update($request->all());
        return response()->json($commerciaux_update,200);
    }
    public function delete($id){
          $commerciaux = commerciaux::find($id);
          if(is_null($commerciaux)){
            return response()->json(['message'=>'aucune commerciaux correspondante']);
          }
          $commerciaux = $commerciaux->delete();
          return response()->json($commerciaux);
    }

    public function facturesCommercial($id){
        $factures = facture::where('idcommerciaux',$id)->get();
        foreach ($factures as $facture){
            $bon_produit = bon_produit::where('idfacture',$facture->id)->get();
            foreach($bon_produit as $bon_prod){
                $bon_prod->article;
            }
           $facture->produits = $bon_produit;
        }
        return response()->json($factures,200);
    }
}
