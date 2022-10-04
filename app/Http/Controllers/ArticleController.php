<?php

namespace App\Http\Controllers;

use App\Models\article;
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
            'stockable'=>'required',
            'dateajout'=>'required|date_format:Y-m-d H:i:s',
            'stock_securite'=>'required|int',
            'stock_restant'=>'required|int',
            'stock_realise'=>'required|int',
            'id_fournisseur'=>'required|int',
            'id_marque'=>'required|int',
            'id_categorie'=>'required|int'
            
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
}
