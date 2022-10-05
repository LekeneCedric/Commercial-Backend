<?php

namespace App\Http\Controllers;

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
            'etat'=>'required',
            'description'=>'required',
            'lieu'=>'required',
            'delaipayement'=>'required',
            'id_commercial',
            'id_client'
            
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
    
}
