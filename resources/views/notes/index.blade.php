@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="container mt-5">
        <div class="row">
            {{-- левая колонка: формы и индикатор --}}
            <div class="col-md-5 mb-4">
                {{-- "Новая заметка" --}}
                <div class="card shadow-sm rounded-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Добавить напоминание 📝</h5>
                        <form method="POST" action="/note">
                            @csrf
                            <div class="mb-3">
                                <textarea name="text" id="text" placeholder="Введите текст..." class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Отправить</button>
                        </form>
                    </div>
                </div>

                {{-- "выполнить все" --}}
                <div class="card shadow-sm rounded-4 mb-4">
                    <div class="card-body">
                        <form action="/note/check-all" method="GET">
                            <button type="submit" class="btn btn-outline-success w-100">Очистить список</button>
                        </form>
                    </div>
                </div>

                {{-- индикатор выполнено / всего --}}
                @php
                    $doneCount = $items->where('checked', true)->count();
                    $totalCount = $items->count();
                @endphp
                <div class="card shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <h4 class="mb-0"> Выполнено:
                        {{ $doneCount }} / {{ $totalCount }}</h4>
                    </div>
                </div>
            </div>

            {{-- правая колонка: список заметок --}}
            <div class="col-md-7">
                <h4 class="mb-3">Основной список дел 🗒</h4>
                <div class="list-group list-group-flush overflow-auto border border-light rounded-4" style="max-height: 344px;">
                    @forelse ($items as $user)
                        <div class="d-flex justify-content-between align-items-center list-group-item">
                            <a href="/note/check/{{$user->id}}" class="flex-grow-1"
                               style="color: {{ $user->checked ? 'grey' : 'black' }};
                      {{ $user->checked ? 'text-decoration: line-through;' : 'text-decoration: none;' }}">
                                {{ $user->text }}
                            </a>
                            <form action="/note/{{$user->id}}" method="post" class="mb-0 ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">⌫</button>
                            </form>
                        </div>
                    @empty
                        <div class="list-group-item text-center text-muted">Придумаем что-то новое? Или самое время взять паузу.. 🧐</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center">Карта 3-х месячного плана</h3>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 calendar-month" id="calendar-0"></div>
            <div class="col-md-4 calendar-month" id="calendar-1"></div>
            <div class="col-md-4 calendar-month" id="calendar-2"></div>
        </div>
    </div>



@endsection
