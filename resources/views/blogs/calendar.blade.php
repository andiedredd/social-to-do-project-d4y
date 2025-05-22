@extends('layouts.app')

@section('title', 'Календарь события')

@section('content')
    <h1>Календарь для "{{ $event->title }}"</h1>
@endsection
