@extends('base')

@section('title', 'Изменение записи в блоге')

@section('main')
    <h1>Изменение записи в блоге</h1>

    <form action="{{ route('messages.update', $message->id) }}" method="post">
        @csrf

        @include('messages.partials.fields')

        @method('put')

        <input type="submit" class="btn btn-block btn-success">
    </form>
@endsection