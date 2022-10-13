<?php

namespace App\Http\Controllers;

use App\Models\proformat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProformatController extends Controller
{
    
    public function index(){
        $proformats = proformat::paginate(15);
        return response()->json($proformats,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'remise'=>'required',
            'envoye'=>'required',
            'montant_totalHT'=>'required',
            'montant_totalHTA'=>'required',
            'montant_totalTT'=>'required',
            'montant_remise'=>'required',
            'montant_tva'=>'required',
            'description'=>'required',
            'lieu_livraison'=>'required',
            'delai_livraison'=>'required',
            'idutilisateur'=>'required',
            'idagence'=>'required',
            'idclient'=>'required',
            'id_mode_reglement'=>'required',
            'idcondition'=>'required',
            'idtva'=>'required',
            'idmonnaie'=>'required'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $proformat = proformat::create($validators->validated());
        return response()->json($proformat,200);
    }
    public function find($id){
        $proformat = proformat::find($id);
        if(is_null($proformat)){
            return response()->json([
                'message'=>'aucune proformat correspondante!'
            ]);
        }
        return response()->json($proformat,200);
    }
    public function update(Request $request, $id){
        $proformat = proformat::find($id);
        if(is_null($proformat)){
            return response()->json(['message'=>'aucune proformat']);
        }
        $proformat_update = $proformat->update($request->all());
        return response()->json($proformat_update,200);
    }
    public function delete($id){
          $proformat = proformat::find($id);
          if(is_null($proformat)){
            return response()->json(['message'=>'aucune proformat correspondante']);
          }
          $proformat = $proformat->delete();
          return response()->json($proformat);
    }
}
