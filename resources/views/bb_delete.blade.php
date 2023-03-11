@extends('layouts.base')

@section('title', 'Изменить объявление')
@section('main')
    <div class="col-12 mx-auto">
        <form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <p>Вы точно хотите удалить запись - {{ $bb->title }}? <button type="submit" class="btn btn-danger">Удалить</button></p>
        </form>
    </div>
@endsection
