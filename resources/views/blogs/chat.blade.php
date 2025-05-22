@extends('layouts.app')

@section('title', 'Чат')

@section('content')
    <h1>Чат: "{{ $event->title }}"</h1>
@endsection
