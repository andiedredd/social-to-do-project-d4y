@extends('layouts.app')

@section('title', 'События')

@section('content')
    <br>
    <h1 class="text-center">События и чаты 📨</h1>
    <br><br><br>

    @php
        use Illuminate\Support\Str;
    @endphp

    @if($events->isEmpty())
        <div class="text-center mb-5">
            <p>У вас пока нет групп.</p>
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#createEventModal">
                Создать новую группу
            </button>
        </div>
    @else
        <div class="list-group mb-5">
            @foreach($events as $event)
                <div class="list-group-item mb-3">
                    <h5>Группа: {{ $event->description ?? 'Без описания' }}</h5>
                    <p style="color: grey">
                        Участники:
                        @foreach($event->participants as $participant)
                            @if($participant->id === auth()->id())
                                <strong>Я</strong>{{ !$loop->last ? ',' : '' }}
                            @else
                                {{ $participant->name }}{{ !$loop->last ? ',' : '' }}
                            @endif
                        @endforeach
                    </p>

                    <a href="{{ route('events.chat', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}" class="btn btn-secondary">Перейти в чат</a>
                    <a href="{{ route('events.calendar', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}" class="btn btn-secondary">Календарь</a>
                    <a href="{{ route('events.tasks', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}" class="btn btn-secondary">Запланированные задачи</a>
                    <a href="{{ route('events.projects', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}" class="btn btn-secondary">Проекты</a>

                </div>
            @endforeach
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#createEventModal">
                Создать новую группу
            </button>
        </div>
    @endif

    <!-- Модальное окно -->
    <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Центровка + увеличенная ширина -->
            <div class="modal-content">
                <form method="POST" action="{{ route('events.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createEventModalLabel">Создать новую группу</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Название группы</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Например подготовка к дню рождения..." required>
                        </div>
                        <div class="mb-3">
                            <label for="participants" class="form-label">Другие участники (через запятую)</label>
                            <input type="text" class="form-control" name="participants" id="participants" placeholder="Через запятую: Alex22, Diana..." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-dark">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
