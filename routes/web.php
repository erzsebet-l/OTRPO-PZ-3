<?php

use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;
use App\Models\House;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HouseController::class,'index']);

Route::get('/houses',[HouseController::class,'index']);
Route::get('/houses/create',[HouseController::class,'create']);
Route::get('/houses',[HouseController::class,'store']);
Route::get('/houses/{house}',[HouseController::class,'show']);
Route::get('/houses/{house}/edit',[HouseController::class,'edit']);
Route::get('/houses/{house}',[HouseController::class,'update']);
Route::get('/houses/{house}',[HouseController::class,'destroy']);