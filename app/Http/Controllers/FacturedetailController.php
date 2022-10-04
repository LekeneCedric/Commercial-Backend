<?php

namespace App\Http\Controllers;

use App\Models\facturedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacturedetailController extends Controller
{
    public function index(){
        $facturedetails = facturedetail::paginate(15);
        return response()->json($facturedetails,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'prixUnitaire'=>'required|int',
        'quantite'=>'required|int',
        'id_facture'=>'required|int',
        'id_article'=>'required|int'
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $facturedetail = facturedetail::create(
           array_merge( $validators->validated(),[
            'total'=>$request->quantite*$request->prixUnitaire,
           ]));
        return response()->json($facturedetail,200);
    }
    public function find($id){
        $facturedetail = facturedetail::find($id);
        if(is_null($facturedetail)){
            return response()->json([
                'message'=>'aucune facturedetail correspondante!'
            ]);
        }
        return response()->json($facturedetail,200);
    }
    public function update(Request $request, $id){
        $facturedetail = facturedetail::find($id);
        if(is_null($facturedetail)){
            return response()->json(['message'=>'aucune facturedetail']);
        }
        $facturedetail_update = $facturedetail->update($request->all());
        return response()->json($facturedetail_update,200);
    }
    public function delete($id){
          $facturedetail = facturedetail::find($id);
          if(is_null($facturedetail)){
            return response()->json(['message'=>'aucune facturedetail correspondante']);
          }
          $facturedetail = $facturedetail->delete();
          return response()->json($facturedetail);
    }
}
