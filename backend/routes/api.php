<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/author", [AuthorController::class, "index"]); 
Route::get("/author/{id}", [AuthorController::class, "show"]) ; 
Route::post("/author", [AuthorController::class, "store"]); 
Route::put("/author/{id}", [AuthorController::class, "update"]); 
Route::delete("/author/{id}", [AuthorController::class, "destroy"]); 

Route::get("/publisher", [PublisherController::class, "index"]); 
Route::get("/publisher/{id}", [PublisherController::class, "show"]); 
Route::post("/publisher", [PublisherController::class, "store"]); 
Route::put("/publisher/{id}", [PublisherController::class, "update"]); 
Route::delete("/publisher/{id}", [PublisherController::class, "destroy"]); 

Route::get("/genre", [GenreController::class, "index"]); 
Route::get("/genre/{id}", [GenreController::class, "show"]); 
Route::post("/genre", [GenreController::class, "store"]); 
Route::put("/genre/{id}", [GenreController::class, "update"]); 
Route::delete("/genre/{id}", [GenreController::class, "destroy"]); 

Route::get("/book", [BookController::class, "index"]); 
Route::get("/book/{id}", [BookController::class, "show"]); 
Route::post("/book", [BookController::class, "store"]); 
Route::put("/book/{id}", [BookController::class, "update"]); 
Route::delete("/book/{id}", [BookController::class, "destroy"]); 

