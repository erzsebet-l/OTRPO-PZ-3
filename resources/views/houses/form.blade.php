@extends('layouts.app')

@section('content')
<div class="container my-3 form-container">
    <h2 class="ttl">
        {{ $house->exists ? 'Редактировать дом' : 'Добавить новый дом' }}
    </h2>

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @if($house->exists)
            @method('PUT')
        @endif

        <!-- Название дома -->
        <div class="mb-3">
            <label for="name" class="form-label">Название дома</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
                maxlength="1000"
                placeholder="Например: Старки"
                value="{{ old('name', $house->name) }}"
            >
            <div class="invalid-feedback">
                Пожалуйста, введите название дома
            </div>
        </div>

        <!-- Загрузка изображения -->
        <div class="mb-3">
            <label for="image_file" class="form-label">Герб дома (изображение)</label>

            @if($house->exists && $house->image_url)
                <div class="mb-2">
                    <img
                        src="{{ $house->image_url }}"
                        alt="Текущий герб"
                        style="max-width: 200px; max-height: 200px; object-fit: cover;"
                    >
                </div>
            @endif

            <input
                type="file"
                class="form-control"
                id="image_file"
                name="image_file"
                accept="image/*"
                {{ $house->exists ? '' : 'required' }}
            >

            <div class="invalid-feedback">
                Пожалуйста, выберите изображение
            </div>
        </div>

        <!-- Краткая информация -->
        <div class="mb-3">
            <label for="text" class="form-label">Краткая информация</label>
            <textarea
                class="form-control"
                id="text"
                name="text"
                rows="2"
                required
                maxlength="10000"
                placeholder="Краткое описание дома"
            >{{ old('text', $house->text) }}</textarea>

            <div class="invalid-feedback">
                Введите краткую информацию
            </div>
        </div>

        <!-- Девиз -->
        <div class="mb-3">
            <label for="motto" class="form-label">Девиз</label>
            <input
                type="text"
                class="form-control"
                id="motto"
                name="motto"
                required
                maxlength="1000"
                placeholder="Например: Зима близко"
                value="{{ old('motto', $house->motto) }}"
            >
            <div class="invalid-feedback">
                Введите девиз
            </div>
        </div>

        <!-- Замок -->
        <div class="mb-3">
            <label for="castle" class="form-label">Замок</label>
            <input
                type="text"
                class="form-control"
                id="castle"
                name="castle"
                required
                maxlength="1000"
                placeholder="Например: Винтерфелл"
                value="{{ old('castle', $house->castle) }}"
            >
            <div class="invalid-feedback">
                Введите название замка
            </div>
        </div>

        <!-- Подробная информация -->
        <div class="mb-3">
            <label for="detail_text" class="form-label">Подробная информация</label>
            <textarea
                class="form-control"
                id="detail_text"
                name="detail_text"
                rows="5"
                required
                placeholder="Подробное описание дома"
            >{{ old('detail_text', $house->detail_text) }}</textarea>

            <div class="invalid-feedback">
                Пожалуйста, введите подробную информацию
            </div>
        </div>

        <!-- Кнопки -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning">
                {{ $house->exists ? 'Сохранить изменения' : 'Добавить' }}
            </button>

            <!-- ОТМЕНА -->
            <a href="{{ 
                $house->exists
                    ? route('houses.show', [
                        'username' => $house->user->username,
                        'house' => $house->id
                    ])
                    : route('houses.index', [
                        'username' => auth()->user()->username
                    ])
            }}" class="btn btn-danger">
                Отмена
            </a>
        </div>
    </form>
</div>

<!-- Bootstrap validation -->
<script>
(function () {
    'use strict'
    const forms = document.querySelectorAll('form')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
@endsection
