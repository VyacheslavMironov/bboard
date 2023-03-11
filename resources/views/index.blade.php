@extends('layouts.base')
@section('title', 'Доска объявлений')
@section('main')
    @if (count($bbs) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($bbs as $bb)
            <tr>
                <td>
                    <h3>{{ $bb->title }}</h3>
                </td>
                <td>
                    <p>{{ $bb->price }}</p>
                </td>
                <td>
                    <a href="{{ route('detail', ['bb' => $bb->id]) }}">Подробнее</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection('main')
