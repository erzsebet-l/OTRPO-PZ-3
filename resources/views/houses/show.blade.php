@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-end gap-3 align-items-center mb-3">
        <!-- Кнопка редактировать -->
        <a href="{{ route('houses.edit', $house->id) }}" 
           class="btn btn-warning" style="font-size: 18px; color: black;">
            Редактировать
        </a>
        <!-- Форма для удаления с Soft Delete -->
        <form action="{{ route('houses.destroy', $house->id) }}" method="POST" 
              onsubmit="return confirm('Вы уверены, что хотите удалить этот дом?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="font-size: 18px; color: black;">
                Удалить
            </button>
        </form>
    </div>
    
    <!-- Изображение дома -->
    <div class="text-center mb-4">
        <img src="{{ $house->image_url }}" alt="Герб {{ $house->name }}" 
             class="img-fluid" style="max-width: 1000px; max-height: 800px; object-fit: cover;">
    </div>

    <!-- Название дома -->
    <h1 class="mb-3">{{ $house->name }}</h1>

    <!-- Подробная информация -->
    <div class="text-left">
        <p style="font-size: 20px;">{{ $house->detail_text }}</p>
    </div>

    <!-- Даты создания и обновления -->
    <div class="text-left mt-3">
        <p>Создано: {{ \Carbon\Carbon::parse($house->created_at)->format('d.m.Y H:i') }}</p>
        <p>Последнее обновление: {{ \Carbon\Carbon::parse($house->updated_at)->format('d.m.Y H:i') }}</p>
    </div>

    <!-- Кнопка назад -->
    <div class="text-left mt-4">
        <a href="{{ route('houses.index') }}" class="btn btn-warning" style="font-size: 18px; color: black;">
            Назад ко всем домам
        </a>
    </div>
</div>
@endsection
