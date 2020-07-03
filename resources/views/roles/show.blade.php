@extends('base')

@section('title', $role->name)

@section('main')
    <h1>{{ $role->name }}</h1>

@endsection