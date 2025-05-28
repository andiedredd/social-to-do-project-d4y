<!doctype html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Do4You')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #fff0f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Градиент для шапки */
        .bg-bordo {
            background: linear-gradient(90deg, #2d1923 0%, #2e0921 50%, rgb(45, 25, 35) 100%);
        }

        /* Навбар бренд и ссылки */
        .navbar-dark .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            letter-spacing: 0.05em;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #f4edea;
            /* Тонкая обводка */
            text-shadow:
                -0.5px -0.5px 0 rgba(0, 0, 0, 0.15),
                0.5px -0.5px 0 rgba(0, 0, 0, 0.15),
                -0.5px 0.5px 0 rgba(0, 0, 0, 0.15),
                0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        }

        .navbar-dark .nav-link {
            font-weight: 500;
            font-size: 1rem;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #ece5e3;
            transition: color 0.3s ease;
            text-shadow:
                -0.3px -0.3px 0 rgba(0, 0, 0, 0.1),
                0.3px -0.3px 0 rgba(0, 0, 0, 0.1),
                -0.3px 0.3px 0 rgba(0, 0, 0, 0.1),
                0.3px 0.3px 0 rgba(0, 0, 0, 0.1);
        }

        .navbar-dark .nav-link:hover,
        .navbar-dark .nav-link:focus {
            color: #d8bbc9;
            text-decoration: none;
        }

        /* кнопка выхода */
        .btn-outline-light {
            font-weight: 600;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            border-width: 2px;
            color: #ece5e3;
            border-color: #ece5e3;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            text-shadow:
                -0.3px -0.3px 0 rgba(0, 0, 0, 0.1),
                0.3px -0.3px 0 rgba(0, 0, 0, 0.1),
                -0.3px 0.3px 0 rgba(0, 0, 0, 0.1),
                0.3px 0.3px 0 rgba(0, 0, 0, 0.1);
        }

        .btn-outline-light:hover,
        .btn-outline-light:focus {
            background-color: #d8bbc9;
            color: #4b3f46;
            border-color: #d8bbc9;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-bordo mb-4" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            it's d4y
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li><a class="nav-link" href="{{ url('/user/' . auth()->id()) }}">Профиль</a></li>
                <li><a class="nav-link" href="{{ route('note.index') }}">Мои проекты</a></li>
                <li><a class="nav-link" href="{{ route('events.index') }}">Группы и события</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light" type="submit">Выйти</button>
            </form>
        </div>
    </div>
</nav>

<main class="container">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
</body>

</html>
