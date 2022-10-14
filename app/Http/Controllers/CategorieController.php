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
        'menu'=>'required|string',
        'idparent'=>'required|int'
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
    //Recursive function to get all subcategories
    public function getChildCat($cat){
        $categories = categorie::where('idparent',$cat->id)->get();
        if (count($categories)<1){
            return 0;
        }
        else{
            $cat->child = $categories;
            foreach($categories as $categorie){
                $this->getChildCat($categorie);
            }
        }
    } 
    public function parents_categories(){
        $categories = categorie::where('idparent',0)->get();
        foreach($categories as $categorie){
            $this->getChildCat($categorie);
        }
        return response()->json($categories,200);
    }
    public function child_categories($id){
        $categories = categorie::where('idparent',$id)->get();
        return response()->json($categories,200);
    }
}
