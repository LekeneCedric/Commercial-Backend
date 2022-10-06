<?php

namespace App\Http\Controllers;

use App\Models\retour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetourController extends Controller
{
    
    public function index(){
        $retours = retour::paginate(15);
        return response()->json($retours,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'intitule'=>'required|string',
        'description'=>'required|string',
        'article_id'=>'required|int',
        'client_id'=>'required|int',
        'commercial_id'=>'required|int'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $retour = retour::create($validators->validated());
        return response()->json($retour,200);
    }
    public function find($id){
        $retour = retour::find($id);
        if(is_null($retour)){
            return response()->json([
                'message'=>'aucune retour correspondante!'
            ]);
        }
        return response()->json($retour,200);
    }
    public function update(Request $request, $id){
        $retour = retour::find($id);
        if(is_null($retour)){
            return response()->json(['message'=>'aucune retour']);
        }
        $retour_update = $retour->update($request->all());
        return response()->json($retour_update,200);
    }
    public function delete($id){
          $retour = retour::find($id);
          if(is_null($retour)){
            return response()->json(['message'=>'aucune retour correspondante']);
          }
          $retour = $retour->delete();
          return response()->json($retour);
    }
}
