<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .btn-custom {
            background-color: #dc3545; /* красная кнопка */
            color: white;
        }
    </style>
</head>

<body class="text-center" style="background-color: #edf2f7;">
<br>
<br>
<div class="d-flex justify-content-center align-items-center vh-100">
    <main class="form-signin" style="width: 300px;">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/12500/12500060.png" alt="" width="57" height="57">
            <br>
            <h1 class="h3 mb-3 fw-normal">Регистрация 😌</h1>
            <br>
            <input type="text" name="name" class="form-control" id="floatingEmail" placeholder="Имя пользователя" required>
            <br>
            <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Электронная почта" required>
            <br>
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Придумайте пароль" required>
            <br>
            <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Подтвердите пароль" required>
            <br>
            <button class="w-100 btn btn-lg btn-danger" type="submit">Подтвердить регистрацию</button>
            <br>
            <br>
            <p><a href="http://localhost/login" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Уже с нами? 🤔</a></p>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>
</div>

</body>
</html>
