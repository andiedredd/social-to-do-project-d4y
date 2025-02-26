

<title>all users</title>
@foreach ($users as $user)
    <h2>{{$user->name}}</h2>
    <h2>{{$user->email}}</h2>
    <h2>{{$user->password}}</h2>
    <h2>{{$user->email_verified_at}}</h2>
    <br>
    <br>
@endforeach
