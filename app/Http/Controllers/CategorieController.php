<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    public function index(){
        $categories = categorie::all();
        return response()->json($categories,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'titre'=>'required|string',
        'icon'=>'required|string',
        'menu_id'=>'required|int',
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $categorie = categorie::create($validators->validated());
        return response()->json($categorie,200);
    }
    public function find($id){
        $categorie = categorie::find($id);
        if(is_null($categorie)){
            return response()->json([
                'message'=>'aucune categorie correspondante!'
            ]);
        }
        return response()->json($categorie,200);
    }
    public function update(Request $request, $id){
        $categorie = categorie::find($id);
        if(is_null($categorie)){
            return response()->json(['message'=>'aucune categorie']);
        }
        $categorie_update = $categorie->update($request->all());
        return response()->json($categorie_update,200);
    }
    public function delete($id){
          $categorie = categorie::find($id);
          if(is_null($categorie)){
            return response()->json(['message'=>'aucune categorie correspondante']);
          }
          $categorie = $categorie->delete();
          return response()->json($categorie);
    }
}
