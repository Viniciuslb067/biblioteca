<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use Illuminate\Http\Request;
use App\Models\Genres;
use Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genres::paginate(10);
        return GenreResource::collection($genre);
    }

    public function store(Request $request)
    {
        $genre = new Genres();
     
        $genre->type = $request->type;

        $rules=array(
            "type"=>"required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($genre->save()) {
            return response()->json([ "success" => "Gênero cadastrado com sucesso!" ]);
        }
    }

    public function show($id)
    {

        $genre = Genres::findOrFail($id);
        return "Olá";
    }

    public function update(Request $request, $id)
    {
        $genre = Genres::findOrFail($id);
        $genre->type = $request->type;
   
        $rules=array(
            "type"=>"required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($genre->save()) {
            return new GenreResource($genre);
        }
    }
 
    public function destroy($id)
    {
        $genre = Genres::findOrFail($id);

        if ($genre->delete()) {
            return new GenreResource($genre);
        }
    }
}
