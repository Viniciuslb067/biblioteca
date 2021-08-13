<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $name = "Vinicius";
        $query = DB::table("authors")->get();

        return response()->json([ "users" => $query ]);
    }

    public function store(Request $request)
    {
        $author = new Author();
     
        $author->author_name = $request->author_name;
        $author->birthDate = $request->birthDate;
        $author->sex = $request->sex;
        $author->nationality = $request->nationality;

        $rules=array(
            "author_name"=>"required",
            "birthDate"=>"required",
            "sex"=>"required",
            "nationality"=>"required"
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($author->save()) {
            return response()->json([ "success" => "Autor cadastrado com sucesso!" ]);
        }
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return new AuthorResource($author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->birthDate = $request->birthDate;
        $author->sex = $request->sex;
        $author->nationality = $request->nationality;

        $rules=array(
            "name"=>"required",
            "birthDate"=>"required",
            "sex"=>"required",
            "nationality"=>"required"
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($author->save()) {
            return new AuthorResource($author);
        }
    }
 
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        if ($author->delete()) {
            return new AuthorResource($author);
        }
    }
}
