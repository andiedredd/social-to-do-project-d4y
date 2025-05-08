@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm rounded-4 p-4">
            <h2 class="text-center mb-4">Мой профиль 👤</h2>

            {{-- Аватар и кнопка смены --}}
            <div class="text-center mb-4">
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('default-avatar.png') }}"
                     class="rounded-circle mb-3" alt="Аватар" style="width: 150px; height: 150px; object-fit: cover;">

                <form action="{{ route('profile.update.avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <input type="file" name="avatar" accept="image/*" class="form-control">
                    </div>
                    <button class="btn btn-secondary btn-sm">Сменить фотографию</button>
                </form>
            </div>

            {{-- Статус "Обо мне" --}}
            <form action="{{ route('profile.update.info') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="info" class="form-label">Обо мне:</label>
                    <input type="text" name="info" id="info" class="form-control"
                           value="{{ auth()->user()->info }}" maxlength="24" placeholder="До 24 символов">
                </div>
                <button class="btn btn-secondary btn-sm mb-4">Обновить статус</button>
            </form>

            {{-- Основная информация --}}
            <p><strong>Дата рождения:</strong> {{ auth()->user()->birthday }}</p>
            <p><strong>Имя пользователя:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Логин:</strong> {{ auth()->user()->email }}</p>

            {{-- Смена пароля --}}
            <form action="{{ route('profile.update.password') }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <h5>Сменить пароль:</h5>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Новый пароль" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль" required>
                </div>
                <button class="btn btn-outline-primary btn-sm">Обновить пароль</button>
            </form>
        </div>
    </div>
@endsection
