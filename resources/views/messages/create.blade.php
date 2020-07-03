@extends('base')

@section('title', 'Создание записи в блоге')

@section('main')
    <h1>Создание записи в блоге</h1>

    <form action="{{ route('messages.store') }}" method="post">
        @csrf

        @include('messages.partials.fields')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection