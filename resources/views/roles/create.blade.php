@extends('base')

@section('title', 'Создание роли')

@section('main')
    <h1>Создание роли</h1>

    <form action="{{ route('roles.store') }}" method="post">
        @csrf

        @include('roles.partials.fields')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection