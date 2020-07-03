@extends('base')

@section('title', 'Удаление роли')

@section('main')
    <h1>Удаление роли</h1>

    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
        @csrf

        @method('delete')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection