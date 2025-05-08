<!doctype html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '2D4Y')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<script src="{{ asset('js/calendar.js') }}"></script>
<body style="background-color: #edf2f7;">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">2D4Y</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li><a class="nav-link" href="{{ url('/user/' . auth()->id()) }}">Профиль</a></li>
                <li><a class="nav-link" href="{{ route('note.index') }}">Мои проекты</a></li>
                <li><a class="nav-link" href="{{ url('/event/' . auth()->id()) }}">События и чаты</a></li>
            </ul>
            <form>
                <p> 30 апр. 19:18 </p>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger" type="submit">Выйти</button>
            </form>
        </div>
    </div>
</nav>

<main class="container">
    @yield('content')
</main>

</body>
</html>
