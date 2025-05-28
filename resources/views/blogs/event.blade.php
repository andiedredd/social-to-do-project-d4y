@extends('layouts.app')

@section('title', 'События')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold display-6">События и чаты <span class="ms-1">📨</span></h1>

        @php use Illuminate\Support\Str; @endphp

        @if($events->isEmpty())
            <div class="text-center mb-5">
                <p class="text-muted fs-5">У вас пока нет групп.</p>
                <button class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#createEventModal"
                        style="transition: box-shadow 0.3s ease;">
                    ➕ Создать новую группу
                </button>
            </div>
        @else
            <div class="row g-4 mb-5">
                @foreach($events as $event)
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100"
                             style="transition: box-shadow 0.3s ease, transform 0.3s ease; border-radius: 0.75rem;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title fw-semibold mb-2">{{ $event->title }}</h5>
                                    <p class="text-muted mb-4 small" style="line-height: 1.4;">
                                        👥 Участники:
                                        @foreach($event->participants as $participant)
                                            @if($participant->id === auth()->id())
                                                <strong>Я</strong>{{ !$loop->last ? ',' : '' }}
                                            @else
                                                {{ $participant->name }}{{ !$loop->last ? ',' : '' }}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('events.chat', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill"
                                       style="transition: background-color 0.3s ease, color 0.3s ease;">
                                        💬 Чат
                                    </a>
                                    <a href="{{ route('events.calendar', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill"
                                       style="transition: background-color 0.3s ease, color 0.3s ease;">
                                        📅 Календарь
                                    </a>
                                    <a href="{{ route('events.tasks', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill"
                                       style="transition: background-color 0.3s ease, color 0.3s ease;">
                                        📝 Задачи
                                    </a>
                                    <a href="{{ route('events.projects', ['slug' => Str::slug($event->title), 'id' => $event->id]) }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill"
                                       style="transition: background-color 0.3s ease, color 0.3s ease;">
                                        📁 Проекты
                                    </a>
                                    @if($event->user_id === auth()->id())
                                        <button class="btn btn-outline-danger btn-sm rounded-pill"
                                                data-bs-toggle="modal" data-bs-target="#deleteEventModal{{ $event->id }}"
                                                style="transition: background-color 0.3s ease, color 0.3s ease;">
                                            🗑 Удалить
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($event->user_id === auth()->id())
                        <div class="modal fade" id="deleteEventModal{{ $event->id }}" tabindex="-1"
                             aria-labelledby="deleteEventModalLabel{{ $event->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="deleteEventModalLabel{{ $event->id }}">
                                                Удалить группу? 🫢
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Вы точно хотите удалить <strong>{{ $event->title }}</strong>?<br>
                                            Это действие <span class="text-danger fw-bold">нельзя отменить</span>.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                                                Отмена
                                            </button>
                                            <button type="submit" class="btn btn-danger rounded-pill">
                                                Удалить навсегда
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="text-center">
                <button class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#createEventModal"
                        style="transition: box-shadow 0.3s ease;">
                    ➕ Создать новую группу
                </button>
            </div>
        @endif

        <!-- Модальное окно создания группы -->
        <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow rounded-4" style="border-radius: 1rem;">
                    <form method="POST" action="{{ route('events.store') }}">
                        @csrf
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-semibold" id="createEventModalLabel">Создать новую группу</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body px-4">
                            <div class="mb-3">
                                <label for="title" class="form-label">Название группы</label>
                                <input type="text" class="form-control rounded" name="title" id="title"
                                       placeholder="Например, Подготовка к дню рождения..." required>
                            </div>
                            <div class="mb-3">
                                <label for="participants" class="form-label">Участники (через запятую)</label>
                                <input type="text" class="form-control rounded" name="participants" id="participants"
                                       placeholder="Alex22, Diana..." required>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-dark rounded-pill">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Плавный ховер с тенью для карточек */
        .card:hover {
            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.12),
                0 2px 6px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        /* Плавный ховер для кнопок */
        .btn-outline-secondary:hover,
        .btn-outline-danger:hover {
            background-color: #6c757d; /* чуть темнее серого */
            color: white !important;
            box-shadow:
                0 4px 10px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Мягкий переход для кнопок */
        .btn {
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Более округлённые кнопки */
        .btn-rounded {
            border-radius: 50px !important;
        }
    </style>
@endsection
