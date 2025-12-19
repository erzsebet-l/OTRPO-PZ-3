<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;


class HouseController extends Controller
{
    public function index():View
    {
        $houses = House::all();
        $houses = House::withTrashed()->get(); // включает удалённые
        return view('houses.index', compact(['houses']));
    }


    public function create():View
    {
       return view('houses.form', [
            'house' => new House(),       
            'action' => route('houses.store'),
            'method' => 'POST',
            'buttonText' => 'Добавить дом'
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
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

            // Изменение размеров под верстку
            $resizedImage = Image::make($image)->fit(600, 400)->encode();

            // Сохраняем в папку public/images
            $path = public_path('images/' . $filename);
            $resizedImage->save($path);

            $validated['image_url'] = '/images/' . $filename;
        }

        $house = House::create($validated);

        return redirect()->route('houses.index', ['house' => $house->id])
                        ->with('success', 'Дом успешно добавлен!');
    }


    public function show(House $house):View
    {  
        return view('houses.show', compact('house'));
    }

  
    public function edit(House $house):View
    {
        return view('houses.form', [
            'house' => $house,
            'action' => route('houses.update', $house->id),
            'method' => 'PUT',
            'buttonText' => 'Сохранить изменения'
        ]);
    }


    public function update(Request $request, House $house): RedirectResponse
    {
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

        return redirect()->route('houses.show', ['house' => $house->id])
                        ->with('success', 'Дом успешно обновлен!');
    }


    public function destroy(House $house): RedirectResponse
    {
        $house->delete(); // soft delete

        return redirect()->route('houses.index')->with('success', 'Дом успешно удалён!');
    }

    
    public function restore($id): RedirectResponse
    {
        // Найти только удалённый объект
        $house = House::onlyTrashed()->findOrFail($id);

        // Восстановить объект
        $house->restore();

        // Перенаправить на список домов с сообщением
        return redirect()->route('houses.index')->with('success', 'Дом успешно восстановлен!');
    }

}

