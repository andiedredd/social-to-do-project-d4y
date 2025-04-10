<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои проекты</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="text-left" style="background-color: #fff8dc;">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">2D4Y</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/user/{id}">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/note/check-all">Мои проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chat/{id}">События и чаты</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Андрей</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h4 class="mt-5 ps-3">Заметки</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="list-group mb-4 w-100 p-3">
                @foreach ($items as $user)
                    <div class="d-flex justify-content-between align-items-center list-group-item">
                        <a href="/note/check/{{$user->id}}" class="text-decoration-none" style="color: {{$user->checked ? 'green' : 'red'}}">
                            {{$user->text}}
                        </a>
                        <form action="/note/{{$user->id}}" method="post" class="mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <h4>
                <a href="/note/check-all">
                    <button class="btn btn-success w-50 p-3" style="width: 300px;">Выполнить все</button>
                </a>
            </h4>
            <br>

            <h4 class="mt-5 ps-3">Новая заметка</h4>
            <form method="POST" action="/note">
                @csrf
                <div class="mb-4 w-50 p-3">
                    <textarea name="text" id="text" placeholder="Введите текст.." class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success w-50 p-3">Отправить</button>
            </form>
        </div>

        <div class="col-md-6">
            <img src="https://psv4.userapi.com/s/v1/d/DianYQTU5DCW-YDBFHwmNxwfJjE2HharRF5kOhQVsUJRvIkAU0A9Sr8q8uiY2T17eOqo2LyIxSXtVQ74MlWCjZW5sN5k3abRjD6UkEQcOATWmfF_iSHFeA/nevypolnennykh-no-bg-preview_carve_photos.png" alt="Описание изображения" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: cover;">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
