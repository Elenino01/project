@extends('base')

@section('title', 'Изменение роли')

@section('main')
    <h1>Изменение роли</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="post">
        @csrf

        @include('roles.partials.fields')

        @method('put')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection