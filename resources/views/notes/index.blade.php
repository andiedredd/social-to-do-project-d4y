<title>all users</title>
<h1 style='text-align:center; width:100%'>заметки</h1>
@foreach ($items as $user)
    <a href="/check/{{$user->id}}">
        <h1 style="color: {{$user->checked ? 'green' : 'red'}}">
            {{$user->text}}
        </h1>
    </a>
@endforeach

<h1> <a href="/check/{{$user->id}}"> <button style="align-content: center"> Выполнить все</button> </h1>
