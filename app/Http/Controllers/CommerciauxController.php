<?php

namespace App\Http\Controllers;

use App\Models\bon_produit;
use App\Models\commerciaux;
use App\Models\facture;
use App\Models\ficheSortie;
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
            'email'=>'required|email|unique:commerciauxes',
            'commission'=>'required|int',
            'telephone'=>'required|string|unique:commerciauxes',
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
          return response()->json(['message'=>'commercial supprime avec success']);
    }

    public function facturesCommercial($id){
        $factures = facture::where('idcommerciaux',$id)->orderBy('created_at','DESC')->get();
        return response()->json($factures,200);
    }

    public function statistics($idcom){
        $commercial = commerciaux::find($idcom);
        if(is_null($commercial)){
            return response()->json(['message'=>'aucun commercial correspondant a ce ID'],404);
        }
         # get benefices : 
         # first time we will get all invoice of commercial and get correspond bon_produit
         # then we will go thought every bon_produit and increment to the final variable that contains total amount
         $produitsVendus = 0 ; 
         $revenusTotal = 0 ;
         $factures = facture::where('idcommerciaux',$idcom)->get();
         
         foreach($factures as $facture){
            $bons = bon_produit::where('idfacture',$facture->id)->get();;
            foreach($bons as $bon){
                $produitsVendus += $bon->quantite;
            }
            $revenusTotal += $facture->montant_totalHT;
         }
         $revenus = $produitsVendus*500;
         $ventesTotal = count(facture::where('idcommerciaux',$idcom)->get());
         $nbclients = count($commercial->client);
         return response()->json([
            'benefice'=>$revenus,
            'nbprodVendus'=>$produitsVendus,
            'revenueTotal'=>$revenusTotal,
            'nbVentes'=>$ventesTotal,
            'nbclients'=>$nbclients
         ],200);
    }
    public function mesArticles($idcom){
     $fiches = ficheSortie::where('idcommercial',$idcom)->get();
     $produits = [];
     foreach($fiches as $fiche){
        $quantite = $fiche->quantite;
            array_push($produits,$fiche->article); 
     }
     return response()->json($fiches,200);
    }  
    public function reduceMyArticleQuantity($idcom,$idarticle,$quantite){
        $fiches = ficheSortie::where('idcommercial',$idcom)->get();
        foreach($fiches as $fiche){
            if ($fiche->idarticle == $idarticle){
                $fi = ficheSortie::find($fiche->id);
                $fi->update(['quantite'=>($fi->quantite) - $quantite ]);
                return response()->json(['message'=>'modification avec success'],200);
            }
        }
        return response()->json([
            'msg'=>'Aucune fiche correspondante'
        ]);
    }
}
