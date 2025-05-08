<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>

        .btn-custom {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body class="text-center" style="background-color: #edf2f7;">


<div class="d-flex justify-content-center align-items-center vh-100">
    <main class="form-signin" style="width: 300px;">
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/12500/12500060.png" alt="" width="57" height="57">
            <h1 class="h3 mb-3 fw-normal">С возвращением! 😉</h1>
            <br>
            <input type="email" name="email" class="form-control" placeholder="Электронная почта" required>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            <br>
            <button class="btn btn-lg btn-danger w-100" type="submit">Войти</button>
            <br>
            <br>
            <p><a href="http://localhost/register" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Впервые в 2D4Y? 😶‍🌫️</a></p>
        </form>



    </main>
</div>

</body>
</html>
