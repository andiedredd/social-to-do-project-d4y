<title>all users</title>
<br>
<h1 style='text-align:center; width:100%'>все пользователи</h1>
@foreach ($users as $user)
    <br>
    <h1>имя пользователя: {{$user->name}}</h1>
    <h3>email: {{$user->email}}</h3>
    <h3>пароль: {{$user->password}}</h3>
    <h3>время проверки email: {{$user->email_verified_at}}</h3>
    <br>
    <br>
@endforeach
