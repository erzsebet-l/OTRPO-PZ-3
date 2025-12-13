<!-- разметка родительноского шаблона (footer, header, ссылки) -->
@extends('layouts.app')

<!-- вставка контента -->
@section('content')
<div class="container my-4">
    <div class="text-center mb-4">
        <img src="{{ $house->image_url }}" alt="Герб {{ $house->name }}" class="img-fluid" style="max-width: 1000px; max-height: 800px;">
    </div>
    <h1 class="mb-3">{{ $house->name }}</h1>
    <div class="text-left">
        <p style="font-size: 20px;">{{ $house->detail_text }}</p>
    </div>
    <div class="text-left mt-4">
        <a href="{{ url('/houses') }}" class="btn btn-secondary" style="font-size: 18px;">Назад ко всем домам</a>
    </div>
</div>
@endsection
