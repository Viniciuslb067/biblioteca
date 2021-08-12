<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Validator;

class BookController extends Controller
{
    public function index()
    {   
        $books = DB::table("books")
        ->join("authors", "books.author_id", "=", "authors.id")
        ->join("publishers", "books.publisher_id", "=", "publishers.id")
        ->join("genres", "books.genre_id", "=", "genres.id")
        ->get();

        return response()->json([ "books" => $books ]);
    }

    public function store(Request $request)
    {
        $book = new Book();
     
        $book->author_id = $request->author_id;
        $book->genre_id = $request->genre_id;
        $book->publisher_id = $request->publisher_id;
        $book->title = $request->title;
        $book->releaseYear = $request->releaseYear;

        $rules=array(
            "author_id"=>"required",
            "genre_id"=>"required",
            "publisher_id"=>"required",
            "title"=>"required",
            "releaseYear"=>"required"
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($book->save()) {
            return response()->json([ "success" => "Livro cadastrado com sucesso!" ]);
        } else {
            return response()->json([ "error" => "Error ao cadastrar o livro" ]);
        }
    }

    public function show($id)
    {
        $book = DB::table("books")
        ->join("authors", "books.author_id", "=", "authors.id")
        ->join("publishers", "books.publisher_id", "=", "publishers.id")
        ->join("genres", "books.genre_id", "=", "genres.id")
        ->where("books.id", "=", $id)
        ->get();

        return response()->json([ "book" => $book ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->author_id = $request->author_id;
        $book->genre_id = $request->genre_id;
        $book->publisher_id = $request->publisher_id;
        $book->title = $request->title;
        $book->releaseYear = $request->releaseYear;

        $rules=array(
            "author_id"=>"required",
            "genre_id"=>"required",
            "publisher_id"=>"required",
            "title"=>"required",
            "releaseYear"=>"required"
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return $validator->errors();
        }

        if ($book->save()) {
            return response()->json([ "success" => "Livro atualizado com sucesso!" ]);
        } else {
            return response()->json([ "error" => "Error ao atualizar o livro" ]);
        }
    }
 
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->delete()) {
            return response()->json([ "success" => "Livro excluido com sucesso!" ]);
        } else {
            return response()->json([ "error" => "Error ao excluir o livro" ]);
        }
    }
}
