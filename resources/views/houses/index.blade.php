<!-- разметка родительноского шаблона (footer, header, ссылки) -->
@extends('layouts.app')

<!-- вставка контента -->
@section('content')
<div class="container my-3">
  <h1 class="text mb-3">Дома игры престолов</h1>
  <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 g-3">
    @foreach($houses as $house)
    <div class="col">
      <a href="{{ route('houses.show', ['house' => $house->id]) }}" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <img src="{{ $house->image_url }}" class="img-fluid w-100" alt="Герб {{ $house->name }}" style="height: 200px; object-fit: cover;">
            <span class="badge position-absolute top-0 start-0 m-2" style="pointer-events:none;">Герб</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $house->name }}</h5>
            <p class="card-text">{{ $house->text }}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
