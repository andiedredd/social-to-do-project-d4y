@extends('layouts.app')

@section('title', 'События')

@section('content')
    <br>
    <h1 class="text-center">События и чаты 📨</h1>
    <br>
    <br>
    <br>
    <div class="list-group">
        <!-- список чатов (если не добавлены значит нет)-->
        <div class="list-group-item">
            <h5>Участники: andy, misha, matvey, pashok, dinana</h5>
{{--            аналогично --}}
            <p style="color:grey">Обсуждение: группа ливинг визаут</p>
{{--            ссылка на новую БД --}}
            <a href="{{ url('/chat/{id}') }}" class="btn btn-secondary">Перейти в чат</a>
            <a href="{{ url('/calendar/{id}') }}" class="btn btn-secondary">Календарь</a>
            <a href="{{ url('/tasks/{id}') }}" class="btn btn-secondary">Запланированные задачи</a>
            <a href="{{ url('/projects/{id}') }}" class="btn btn-secondary">Проекты</a>
        </div>
        <br>
        <div class="list-group-item">
            <h5>Участники: andy, garry</h5>
{{--            тут прописать сслыку в метод по айдишнику --}}
            <p style="color:grey">Обсуждение: сессия психолог</p>
            <a href="{{ url('/chat/{id}') }}" class="btn btn-secondary">Перейти в чат</a>
            <a href="{{ url('/calendar/{id}') }}" class="btn btn-secondary">Календарь</a>
            <a href="{{ url('/tasks/{id}') }}" class="btn btn-secondary">Запланированные задачи</a>
            <a href="{{ url('/projects/{id}') }}" class="btn btn-secondary">Проекты</a>
        </div>
    </div>
<br>
    <form class="text-center">
        <button class="btn btn-outline-dark ">Создать новую группу</button>
    </form>
@endsection
