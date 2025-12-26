<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
     ->middleware('auth')
     ->name('logout');

// Главная
Route::get('/', function () {
    if(auth()->check()){
        $user = auth()->user();
        if($user->is_admin){
            // Админ видит все карточки — можно использовать свой username или null, если HouseController обрабатывает
            return redirect()->route('houses.index', ['username' => $user->username]);
        }
        return redirect()->route('houses.index', ['username' => $user->username]); // Обычный пользователь
    }
    return view('welcome');
});

// Все маршруты домов с обязательным username
Route::middleware('auth')->group(function () {
    Route::get('/users/{username}/houses', [HouseController::class, 'index'])->name('houses.index');
    Route::get('/users/{username}/houses/create', [HouseController::class, 'create'])->name('houses.create');
    Route::post('/users/{username}/houses', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/users/{username}/houses/{house}', [HouseController::class, 'show'])->name('houses.show');
    Route::get('/users/{username}/houses/{house}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::put('/users/{username}/houses/{house}', [HouseController::class, 'update'])->name('houses.update');
    Route::delete('/users/{username}/houses/{house}', [HouseController::class, 'destroy'])->name('houses.destroy');
    Route::post('/users/{username}/houses/{id}/restore', [HouseController::class, 'restore'])->name('houses.restore');
    Route::delete('/users/{username}/houses/{id}/force', [HouseController::class, 'forceDelete'])->name('houses.forceDelete');
});

// Auth маршруты
require __DIR__.'/auth.php';
