<?php

use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;
use App\Models\House;

Route::get('/', function () {
    return redirect('/houses');
});

Route::resource('houses', HouseController::class)
->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

// Восстановление soft-deleted дома
Route::post('/houses/{house}/restore', [HouseController::class, 'restore'])->name('houses.restore');
