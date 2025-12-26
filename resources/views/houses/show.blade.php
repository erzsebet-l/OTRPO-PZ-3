@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-end gap-3 align-items-center mb-3">

        <!-- Редактировать -->
        <a href="{{ route('houses.edit', [
            'username' => $house->user->username,
            'house' => $house->id
        ]) }}"
           class="btn btn-warning"
           style="font-size: 18px; color: black;">
            Редактировать
        </a>

        <!-- Удалить (soft delete) -->
        <form action="{{ route('houses.destroy', [
            'username' => $house->user->username,
            'house' => $house->id
        ]) }}"
              method="POST"
              onsubmit="return confirm('Вы уверены, что хотите удалить этот дом?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger"
                    style="font-size: 18px; color: black;">
                Удалить
            </button>
        </form>

    </div>

    <!-- Изображение -->
    <div class="text-center mb-4">
        <img src="{{ $house->image_url }}"
             alt="Герб {{ $house->name }}"
             class="img-fluid"
             style="max-width: 1000px; max-height: 800px; object-fit: cover;">
    </div>

    <!-- Название -->
    <h1 class="mb-3">{{ $house->name }}</h1>

    <!-- Подробная информация -->
    <div class="text-left">
        <p style="font-size: 20px;">{{ $house->detail_text }}</p>
    </div>

    <!-- Даты -->
    <div class="text-left mt-3">
        <p>Создано: {{ $house->created_at->format('d.m.Y H:i') }}</p>
        <p>Последнее обновление: {{ $house->updated_at->format('d.m.Y H:i') }}</p>
    </div>

    <!-- Назад -->
    <!-- Назад -->
<div class="text-left mt-4">
    @if(auth()->user()->is_admin)
        <!-- Админ видит все карточки -->
        <a href="{{ route('houses.index', ['username' => auth()->user()->username]) }}"
           class="btn btn-warning"
           style="font-size: 18px; color: black;">
            Назад ко всем домам
        </a>
    @else
        <!-- Обычный пользователь видит только свои -->
        <a href="{{ route('houses.index', [
            'username' => auth()->user()->username
        ]) }}"
           class="btn btn-warning"
           style="font-size: 18px; color: black;">
            Назад ко всем домам
        </a>
    @endif
</div>



</div>
@endsection
