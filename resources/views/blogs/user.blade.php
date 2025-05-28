@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-5 text-center fw-bold display-6">Профиль пользователя</h1>

        <div class="row justify-content-center g-4">

            {{-- Левая колонка: Аватар + удалить аватар + имя (статичное) + email + форма имени + форма статуса --}}
            <div class="col-lg-6">
                <div class="card shadow rounded-4 h-100">
                    <div class="card-body text-center py-5 px-4">

                        {{-- Кликабельный аватар --}}
                        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" id="avatar-form">
                            @csrf
                            <input type="file" name="avatar" id="avatar-input" accept="image/*" class="d-none">
                            <label for="avatar-input" style="cursor: pointer;">
                                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.png') }}"
                                     alt="Аватар"
                                     class="rounded-circle mb-3 shadow"
                                     style="width: 140px; height: 140px; object-fit: cover;">
                            </label>
                        </form>

                        {{-- Кнопка удалить аватар --}}
                        <form action="{{ route('profile.avatar.delete') }}" method="POST" class="mb-4">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4 shadow-sm">Удалить аватар</button>
                        </form>

                        {{-- Статичное имя --}}
                        <h4 class="fw-semibold mb-1">{{ $user->name }}</h4>

                        {{-- Email --}}
                        <p class="text-muted small mb-4">{{ $user->email }}</p>

                        <div class="mb-3 mx-auto" style="max-width: 300px;">
                            <form action="{{ route('profile.name') }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-sm" placeholder="Имя">
                                <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">Сохранить</button>
                            </form>
                        </div>

                        <div class="mb-3 mx-auto" style="max-width: 300px;">
                            <form action="{{ route('profile.info') }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <input type="text" name="info" value="{{ old('info', $user->info) }}" maxlength="24"
                                       class="form-control form-control-sm rounded-pill" placeholder="Статус">
                                <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3 shadow-sm">Обновить</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Правая колонка: смена пароля --}}
            <div class="col-lg-5">
                <div class="card shadow rounded-4 h-100">
                    <div class="card-body py-5 px-4">

                        <h5 class="mb-4 fw-semibold text-center">Сменить пароль</h5>

                        <form action="{{ route('profile.password') }}" method="POST" class="mx-auto" style="max-width: 400px;">
                            @csrf
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control rounded-pill py-2" placeholder="Новый пароль">
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password_confirmation" class="form-control rounded-pill py-2" placeholder="Подтвердите пароль">
                            </div>
                            <button type="submit" class="btn btn-warning rounded-pill w-100 shadow-sm">Обновить</button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Уведомления --}}
            @if (session('success'))
                <div class="alert alert-success mt-5 mx-auto text-center rounded-pill shadow-sm px-4 py-2" style="max-width: 500px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mt-4 mx-auto rounded-4 shadow-sm" style="max-width: 500px;">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('avatar-input')?.addEventListener('change', function () {
            if (this.files.length > 0) {
                document.getElementById('avatar-form').submit();
            }
        });
    </script>
@endsection
