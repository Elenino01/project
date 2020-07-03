@extends('base')

@section('title', $message->title)

@section('main')
    <h1>{{ $message->title }}</h1>

    {{ $message->content }}
@endsection