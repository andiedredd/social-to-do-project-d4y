<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои проекты</title>
    <div style="background-color:#2d3748"> </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


<body>
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
</body>
</html>
<br>
<br>
<div class="col-7 container">
    <h4 style='text-align:center; width:100%'>Заметки</h4>
    <br>
    <div class="list-group">
        @foreach ($items as $user)
            <a href="/note/check/{{$user->id}}" class="list-group-item list-group-item-action" style="color: {{$user->checked ? 'green' : 'red'}}">
                {{$user->title}}
            </a>
            <form action="/note/{{$user->id}}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 1000px; height: auto">Удалить</button>
            </form>
        @endforeach
    </div>
    <br>
    <br>
    <h4>
        <a href="/note/check-all">
            <button class="btn btn-success" style="align-content: center; width: 955px" >Выполнить все</button>
        </a>
    </h4>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h4 style="text-align: center">Новая заметка</h4>
    <br>
    <form style="text-align: right" method="POST" action="/note">
        @csrf
        <textarea name="text" id="text" placeholder="Введите текст.." class="form-control">
        </textarea>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>

    </form>
</div>
