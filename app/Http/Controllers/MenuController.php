<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index(){
        $menus = menu::all();
        return response()->json($menus,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'titre'=>'required|string',
        'color'=>'required|string',
        'icon'=>'required|string',
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $menu = menu::create($validators->validated());
        return response()->json($menu,200);
    }
    public function find($id){
        $menu = menu::find($id);
        if(is_null($menu)){
            return response()->json([
                'message'=>'aucun menu correspondant!'
            ]);
        }
        return response()->json($menu,200);
    }
    public function update(Request $request, $id){
        $menu = menu::find($id);
        if(is_null($menu)){
            return response()->json(['message'=>'aucun menu']);
        }
        $menu_update = $menu->update($request->all());
        return response()->json($menu_update,200);
    }
    public function delete($id){
          $menu = menu::find($id);
          if(is_null($menu)){
            return response()->json(['message'=>'aucun menu correspondant']);
          }
          $menu = $menu->delete();
          return response()->json($menu);
    }
    public function mesCategories($id){
        $menu = menu::find($id);
        if(is_null($menu)){
            return response()->json(['message'=>'aucun menu correspondant']);
        }
        $categories = $menu->categorie;
        return response()->json([
            'titre'=>$menu->titre,
            'icon'=>$menu->icon,
            'categories'=>$categories],200);
    }
}
