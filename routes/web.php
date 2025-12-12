<?php

use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;
use App\Models\House;

Route::get('/', function () {
    return redirect('/houses');
});


Route::get('/houses',[HouseController::class,'index']);
Route::get('/houses/create',[HouseController::class,'create']);
// Route::get('/houses',[HouseController::class,'store']);

Route::get('/houses/{house}',[HouseController::class,'show']);

Route::get('/houses/{house}/edit',[HouseController::class,'edit']);
// Route::get('/houses/{house}',[HouseController::class,'update']);
// Route::get('/houses/{house}',[HouseController::class,'destroy']);