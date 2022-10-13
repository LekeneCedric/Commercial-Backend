<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    
    public function index(){
        $articles = article::paginate(15);
        return response()->json($articles,200);
    }

    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'titre'=>'required|string',
            'reference'=>'required|string',
            'quantite'=>'required|int',
            'description'=>'required|string',
            'prix'=>'required|int',
            'prix_achat'=>'required|int',
            'isnouveau'=>'required|int',
            'stockable'=>'required',
            'stock_min'=>'required|int',
            'stock_minb'=>'required|int',
            'stock_rea'=>'required|int',
            'stock_res'=>'required|int',
            'idrayon'=>'required|int',
            'idmarque'=>'required|int',
            'idfournisseur'=>'required|int',
            'idcategorie'=>'required|int',

            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $article = article::create($validators->validated());
        return response()->json($article,200);
    }
    public function find($id){
        $article = article::find($id);
        if(is_null($article)){
            return response()->json([
                'message'=>'aucun article correspondante!'
            ]);
        }
        $article->categorie;
        return response()->json($article,200);
    }
    public function update(Request $request, $id){
        $article = article::find($id);
        if(is_null($article)){
            return response()->json(['message'=>'aucun article']);
        }
        $article_update = $article->update($request->all());
        return response()->json($article_update,200);
    }
    public function delete($id){
          $article = article::find($id);
          if(is_null($article)){
            return response()->json(['message'=>'aucun article correspondante']);
          }
          $article = $article->delete();
          return response()->json($article);
    }
    public function articlesCategories($id){
        $categorie = categorie::find($id);
        if(is_null($categorie)){
            return response()->json(['message'=>'aucune categorie correspondante']);
        }
        $articles = $categorie->article;
        foreach($articles as $article){
            $article->categorie;
        }
        return response()->json($articles,200);
    }
}
