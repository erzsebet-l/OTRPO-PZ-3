@extends('layouts.app')

@section('content')
<div class="container my-3">

    <div class="lebel-1 d-flex justify-content-between align-items-center">
        <h1 class="text mb-3">Дома игры престолов</h1>

        <!-- Кнопка "Добавить карточку" -->
        @if(auth()->user()->is_admin || ($owner && $owner->id === auth()->user()->id))
            <a href="{{ route('houses.create', ['username' => $owner ? $owner->username : auth()->user()->username]) }}" 
               class="btn-add d-flex justify-content-center align-items-center"
               style="font-size: 18px; padding: 10px 20px; text-decoration: none;">
                Добавить карточку
            </a>
        @endif
    </div>

    @if($houses->count())
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 g-3">
            @foreach($houses as $house)
                <div class="col">
                    <div class="card h-100 card-clickable @if($house->trashed()) bg-light text-muted @endif"
                         data-href="{{ $house->trashed() ? '#' : route('houses.show', ['username' => $owner ? $owner->username : $house->user->username, 'house' => $house->id]) }}">

                        <img src="{{ $house->image_url }}"
                             class="img-fluid w-100"
                             style="height: 200px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $house->name }}</h5>
                            <p class="card-text">{{ $house->text }}</p>

                            @if(auth()->user()->is_admin && $house->trashed())
                                <!-- Кнопка восстановить -->
                                <form action="{{ route('houses.restore', ['username' => $owner ? $owner->username : $house->user->username, 'id' => $house->id]) }}" 
                                      method="POST" class="mt-auto mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100">Восстановить</button>
                                </form>

                                <!-- Кнопка удалить совсем -->
                                <form action="{{ route('houses.forceDelete', ['username' => $owner ? $owner->username : $house->user->username, 'id' => $house->id]) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Удалить объект без возможности восстановления?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">Удалить совсем</button>
                                </form>
                            @else
                                <!-- Для обычного пользователя или не удалённых карточек -->
                                <a href="{{ route('houses.show', ['username' => $owner ? $owner->username : $house->user->username, 'house' => $house->id]) }}" 
                                   class="btn btn-detail mt-auto">
                                    Подробнее
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Надпись по центру -->
        <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="text-center px-5 py-4">
                @if(auth()->user()->is_admin)
                    В системе пока нет ни одной карточки домов
                @else
                    У вас пока нет созданных карточек домов
                @endif
            </div>
        </div>
    @endif

</div>

<script>
    document.querySelectorAll('.card-clickable').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.btn-detail') && !e.target.closest('button')) {
                window.location = card.dataset.href;
            }
        });
    });
</script>
@endsection
