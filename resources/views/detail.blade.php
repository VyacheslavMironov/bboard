@extends('layouts.base')

@section('title', $bb->title)
@section('main')
    <img src="/img/stationery.png" alt="Кнопка канцелярская">
    <a href="{{ route('index') }}">Назад</a>
    <div class="p-2 mt-5">
        <h3>{{ $bb->title }}</h3>
        <p>{{ $bb->content }}</p>
        <p>Автор: {{ $bb->user->name }}</p>
        <p>
            <b>{{ $bb->price }}</b>
        </p>
    </div>
@endsection('main')
