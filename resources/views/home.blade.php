@extends('layouts.base')

@section('title', 'Мои объявления')
@section('main')
    <div class="row mb-5">
        <h3>Добро пожаловать {{ Auth::user()->name }}</h3>
    </div>
    <div class="row">
        <a href="{{ route('bb.add') }}" class="btn btn-success">Добавить объявление</a>
    </div>
    @if (count($bbs) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
                <th scope="col"></th>
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
                        <a href="{{ route('detail', ['bb' => $bb->id]) }}">Подробнее</a>
                    </td>
                    <td>
                        <a href="{{ route('bb.edit', ['bb' => $bb->id]) }}">Изменить</a>
                    </td>
                    <td>
                        <a href="{{ route('bb.delete', ['bb' => $bb->id]) }}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
