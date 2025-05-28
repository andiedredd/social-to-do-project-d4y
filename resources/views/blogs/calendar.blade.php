@extends('layouts.app')

@section('title', 'Календарь события')

@section('content')

    <h3 class="text-center">Карта 3-х месячного плана: "{{ $event->title }}"</h3>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 calendar-month" id="calendar-0"></div>
            <div class="col-md-4 calendar-month" id="calendar-1"></div>
            <div class="col-md-4 calendar-month" id="calendar-2"></div>
        </div>
    </div>
@endsection
