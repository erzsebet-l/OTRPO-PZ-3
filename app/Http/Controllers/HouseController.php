<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    /**
     * Отображение списка домов пользователя
     */
    public function index(?string $username = null): View
{
    $currentUser = auth()->user();

    if ($currentUser->is_admin) {
        if ($username) {
            // Админ просматривает конкретного пользователя
            $owner = User::where('username', $username)->firstOrFail();
            $houses = House::where('user_id', $owner->id)->withTrashed()->get();
        } else {
            // Админ видит все карточки всех пользователей
            $owner = null;
            $houses = House::withTrashed()->get();
        }
    } else {
        // Обычный пользователь видит только свои карточки
        $owner = $currentUser;
        $houses = House::where('user_id', $currentUser->id)->withTrashed()->get();
    }

    return view('houses.index', compact('houses', 'owner', 'currentUser'));
}



   





    public function create(string $username): View
    {
        return view('houses.form', [
            'house' => new House(),
            'action' => route('houses.store', ['username' => $username]),
            'method' => 'POST',
            'buttonText' => 'Добавить дом',
            'username' => $username
        ]);
    }

    public function store(Request $request, string $username): RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();

        // Проверка прав: обычный пользователь может добавлять только свои карточки
        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:1000',
            'text' => 'required|string|max:10000',
            'motto' => 'required|string|max:250',
            'castle' => 'required|string|max:1000',
            'detail_text' => 'required|string',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->fit(600, 400)->encode();
            $path = public_path('images/' . $filename);
            $resizedImage->save($path);

            $validated['image_url'] = '/images/' . $filename;
        }

        $validated['user_id'] = $user->id;

        $house = House::create($validated);

        return redirect()->route('houses.index', ['username' => $username])
                         ->with('success', 'Дом успешно добавлен!');
    }

    public function show(string $username, House $house): View
    {
        $user = User::where('username', $username)->firstOrFail();

        if ($house->user_id !== $user->id) {
            abort(403);
        }

        // Проверка прав: обычный пользователь видит только свои карточки
        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            abort(403);
        }

        return view('houses.show', compact('house', 'user'));
    }

    public function edit(string $username, House $house): View
    {
        $user = User::where('username', $username)->firstOrFail();

        if ($house->user_id !== $user->id) {
            abort(403);
        }

        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            abort(403);
        }

        return view('houses.form', [
            'house' => $house,
            'action' => route('houses.update', ['username' => $username, 'house' => $house->id]),
            'method' => 'PUT',
            'buttonText' => 'Сохранить изменения',
            'username' => $username
        ]);
    }

    public function update(Request $request, string $username, House $house): RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();

        if ($house->user_id !== $user->id) {
            abort(403);
        }

        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:1000',
            'text' => 'required|string|max:10000',
            'motto' => 'required|string|max:250',
            'castle' => 'required|string|max:1000',
            'detail_text' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->fit(600, 400)->encode();
            $path = public_path('images/' . $filename);
            $resizedImage->save($path);
            $validated['image_url'] = '/images/' . $filename;
        }

        $house->update($validated);

        return redirect()->route('houses.show', ['username' => $username, 'house' => $house->id])
                         ->with('success', 'Дом успешно обновлен!');
    }

    public function destroy(string $username, House $house): RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();

        if ($house->user_id !== $user->id) {
            abort(403);
        }

        if (!Auth::user()->is_admin && Auth::id() !== $user->id) {
            abort(403);
        }

        $house->delete();

        return redirect()->route('houses.index', ['username' => $username])
                         ->with('success', 'Дом успешно удалён!');
    }

    public function restore(string $username, $id): RedirectResponse
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        $house = House::onlyTrashed()->findOrFail($id);
        $house->restore();

        return redirect()->route('houses.index', ['username' => $username])
                         ->with('success', 'Дом успешно восстановлен!');
    }

    public function forceDelete(string $username, $id): RedirectResponse
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        $house = House::withTrashed()->findOrFail($id);
        $house->forceDelete();

        return redirect()->route('houses.index', ['username' => $username])
                         ->with('success', 'Дом удалён без возможности восстановления!');
    }
}
