<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    public function index(){
        $suggestions = suggestion::paginate(15);
        return response()->json($suggestions,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'intitule'=>'required|string',
        'description'=>'required|string',
        'ancien_prix'=>'required|int',
        'prix_suggere'=>'required|int',
        'id_article'=>'required|int',
        'id_client'=>'required|int',
        'id_commercial'=>'required|int'
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $suggestion = suggestion::create($validators->validated());
        return response()->json($suggestion,200);
    }
    public function find($id){
        $suggestion = suggestion::find($id);
        if(is_null($suggestion)){
            return response()->json([
                'message'=>'aucune suggestion correspondante!'
            ]);
        }
        return response()->json($suggestion,200);
    }
    public function update(Request $request, $id){
        $suggestion = suggestion::find($id);
        if(is_null($suggestion)){
            return response()->json(['message'=>'aucune suggestion']);
        }
        $suggestion_update = $suggestion->update($request->all());
        return response()->json($suggestion_update,200);
    }
    public function delete($id){
          $suggestion = suggestion::find($id);
          if(is_null($suggestion)){
            return response()->json(['message'=>'aucune suggestion correspondante']);
          }
          $suggestion = $suggestion->delete();
          return response()->json($suggestion);
    }
    public function suggestionsClient($id_client){
        $client = client::find($id_client);
        $suggestions = $client->suggestion;
        return response()->json($suggestions,200);
    }
}
