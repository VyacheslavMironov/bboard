@extends('layouts.base')

@section('title', 'Создать объявление')
@section('main')
    <div class="col-12 mx-auto">
        <form action="{{ route('bb.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" @error('title') is-invalid @enderror>
                @error('title')
                <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputContent" class="form-label">Описание</label>
                {{-- <input type="text" name="title" class="form-control" id="exampleInputTitle"> --}}
                <textarea name="content" id="exampleInputContent" class="form-control" cols="30" rows="10"
                          @error('content') is-invalid @enderror></textarea>
                @error('content')
                <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Цена</label>
                <input type="number" name="price" class="form-control" id="exampleInputPrice" @error('price') is-invalid @enderror>
                @error('price')
                <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
