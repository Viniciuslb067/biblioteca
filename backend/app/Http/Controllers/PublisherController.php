<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublisherResource;
use Illuminate\Http\Request;
use App\Models\Publishers;
use Validator;

class PublisherController extends Controller
{
    public function index()
    {
        $publisher = Publishers::paginate(10);
        return PublisherResource::collection($publisher);
    }

    public function store(Request $request)
    {
        $publisher = new Publishers();
     
        $publisher->publisher_name = $request->publisher_name;
        $publisher->cnpj = $request->cnpj;

        $rules=array(
            "name"=>"required",
            "cnpj"=>"required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($publisher->save()) {
            return response()->json([ "success" => "Editora cadastrada com sucesso!" ]);
        }
    }

    public function show($id)
    {
        $publisher = Publishers::findOrFail($id);
        return new PublisherResource($publisher);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publishers::findOrFail($id);

        $publisher->publisher_name = $request->publisher_name;
        $publisher->cnpj = $request->cnpj;


        $rules=array(
            "name"=>"required",
            "cnpj"=>"required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($publisher->save()) {
            return new PublisherResource($publisher);
        }
    }
 
    public function destroy($id)
    {
        $publisher = Publishers::findOrFail($id);

        if ($publisher->delete()) {
            return new PublisherResource($publisher);
        }
    }
}
