<?php

namespace App\Http\Controllers;

use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    public function index(){
        $medias = media::paginate(15);
        return response()->json($medias,200);
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'file' => 'required', 
        ]);
        if($request->hasfile('file')) {
                try {
                    $fileName = time().'_'.$request->file('file')->getClientOriginalName();
               $extension = $request->file('file')->getClientOriginalExtension();
               $filePath = $request->file('file')->storeAs('medias', $fileName, 'public');
               media::create(array_merge($request->all(),
               [
                   'filePath'=>$filePath,
                   'extension'=>$extension,
                   'fileName'=>$fileName,
               ]));
                } catch (\Throwable $th) {
                    return response()->json($validator->errors(), 400);
                }
           }
           else{
            return response()->json($validator->errors(), 400);
           }
        return response()->json([
            'message'=>'file(s) uploaded successfully',
        ]);

    }
    public function find($id){
        $media = media::find($id);
        if(is_null($media)){
            return response()->json([
                'message'=>'aucune media correspondante!'
            ]);
        }
        return response()->json($media,200);
    }
    public function delete($id){
          $media = media::find($id);
          if(is_null($media)){
            return response()->json(['message'=>'aucune media correspondante']);
          }
          $media = $media->delete();
          return response()->json($media);
    }
}
