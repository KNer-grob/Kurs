<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get("/user", [UserController::class, "user"]);
    Route::get('/usersSpisok', [UserController::class, 'usersSpisok']);
     
    Route::get("/items", [ItemsController::class, "index"]);
    Route::post("/items", [ItemsController::class, "store"]);
    Route::delete("/items/{items}", [ItemsController::class, "destroy"]);
   
    

});
