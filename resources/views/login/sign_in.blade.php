<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>

        .btn-custom {
            background-color: #dc3545; /* ваш цвет кнопки (красный) */
            color: white;
        }
    </style>
</head>

<body class="text-center" style="background-color: #fff8dc;">


<div class="d-flex justify-content-center align-items-center vh-100">
    <main class="form-signin" style="width: 300px;">
        <form>
            <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/12500/12500060.png" alt="" width="57" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" style="transform-style:"> Remember me
                </label>
            </div>
            <a href="/home"> <button class="w-100 btn btn-lg btn-custom" type="submit">Sign in</button></a>
            <p class="fs-10 mt-4 mb-3 text-muted">© 2025</p>
        </form>
    </main>
</div>

</body>
</html>
