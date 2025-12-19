@extends('layouts.app')

@section('content')
<div class="container my-3">
  <div class="lebel-1 d-flex justify-content-between align-items-center">
    <h1 class="text mb-3">Дома игры престолов</h1>
    <a href="{{ route('houses.create') }}" 
       class="btn-add d-flex justify-content-center align-items-center" 
       style="font-size: 18px; padding: 10px 20px; text-decoration: none;">
      Добавить карточку
    </a>
  </div>

  <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 g-3">
    @foreach($houses as $house)
    <div class="col">
      <div class="card h-100 card-clickable @if($house->trashed()) bg-light text-muted @endif" 
           data-href="{{ $house->trashed() ? '#' : route('houses.show', ['house' => $house->id]) }}">
        <div class="position-relative">
          <img src="{{ $house->image_url }}" class="img-fluid w-100" alt="Герб {{ $house->name }}" style="height: 200px; object-fit: cover;">
          <span class="badge position-absolute top-0 start-0 m-2" style="pointer-events:none;">Герб</span>
        </div>
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $house->name }}</h5>
          <p class="card-text">{{ $house->text }}</p>
          
          @if($house->trashed())
            <!-- Кнопка восстановить -->
            <form action="{{ route('houses.restore', $house->id) }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-success w-100">Восстановить</button>
            </form>
          @else
            <!-- Кнопка подробнее -->
            <a href="{{ route('houses.show', ['house' => $house->id]) }}" class="btn btn-detail mb-2">
              Подробнее
            </a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- JS для кликабельной карточки -->
<script>
  document.querySelectorAll('.card-clickable').forEach(card => {
    card.addEventListener('click', function(e) {
      // Если клик не по кнопкам "Подробнее", "Редактировать" или "Восстановить"
      if(!e.target.closest('.btn-detail') && !e.target.closest('.btn-warning') && !e.target.closest('button')){
        window.location = card.dataset.href;
      }
    });
  });
</script>
@endsection
