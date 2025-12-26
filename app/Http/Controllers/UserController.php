<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function houses($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $houses = auth()->user()->is_admin
            ? $user->houses()->withTrashed()->get()  // админ видит все, включая удалённые
            : $user->houses()->get();                // обычный пользователь видит только свои

        return view('houses.index', compact('houses', 'user'));
    }


    public function admin()
{
    $user = auth()->user();

    if(!$user->is_admin){
        abort(403);
    }

    // Получаем всех пользователей и все карточки
    $users = \App\Models\User::all();
    $houses = \App\Models\House::withTrashed()->get();

    return view('users.index', compact('user', 'users', 'houses'));
}

}
