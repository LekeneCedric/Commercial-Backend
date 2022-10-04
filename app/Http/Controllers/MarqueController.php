<?php

namespace App\Http\Controllers;

use App\Models\marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarqueController extends Controller
{
    public function index(){
        $marques = marque::paginate(15);
        return response()->json($marques,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'logo'=>'required|string'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $marque = marque::create($validators->validated());
        return response()->json($marque,200);
    }
    public function find($id){
        $marque = marque::find($id);
        if(is_null($marque)){
            return response()->json([
                'message'=>'aucune marque correspondante!'
            ]);
        }
        return response()->json($marque,200);
    }
    public function update(Request $request, $id){
        $marque = marque::find($id);
        if(is_null($marque)){
            return response()->json(['message'=>'aucune marque']);
        }
        $marque_update = $marque->update($request->all());
        return response()->json($marque_update,200);
    }
    public function delete($id){
          $marque = marque::find($id);
          if(is_null($marque)){
            return response()->json(['message'=>'aucune marque correspondante']);
          }
          $marque = $marque->delete();
          return response()->json($marque);
    }
}
