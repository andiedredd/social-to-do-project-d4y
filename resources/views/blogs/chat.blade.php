@extends('layouts.app')

@section('title', 'Чат')

@section('content')
    <div class="container-fluid px-3 px-md-5 py-4">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                <div class="card shadow rounded-4 overflow-hidden border-0">
                    <div class="row g-0">
                        {{-- Левая колонка: участники --}}
                        <div class="col-md-4 d-none d-md-block text-white p-4" style="background-color: #0b5ed7;">
                            <h5 class="mb-4">Участники</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex align-items-center">
                                    <span class="me-2 rounded-circle bg-white" style="width: 10px; height: 10px;"></span>
                                    Андрей
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <span class="me-2 rounded-circle bg-white" style="width: 10px; height: 10px;"></span>
                                    Мария
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <span class="me-2 rounded-circle bg-white" style="width: 10px; height: 10px;"></span>
                                    Илья
                                </li>
                            </ul>
                        </div>

                        {{-- Правая часть: чат --}}
                        <div class="col-md-8 d-flex flex-column" style="background-color: #f0f4f8; min-height: 600px;">
                            {{-- Заголовок --}}
                            <div class="px-4 py-3 border-bottom d-flex justify-content-between align-items-center bg-white">
                                <h5 class="mb-0" style="color: #0b5ed7;">Чат: "{{ $event->title }}"</h5>
                            </div>

                            {{-- Сообщения --}}
                            <div class="flex-grow-1 overflow-auto px-4 py-4" style="max-height: 500px;" id="chat-body">
                                <div class="mb-4">
                                    <strong class="text-muted">Мария</strong>
                                    <div class="bg-white rounded-3 p-3 shadow-sm d-inline-block mt-1">Всем привет! Когда созвон?</div>
                                </div>
                                <div class="mb-4 text-end">
                                    <strong class="text-muted">Ты</strong>
                                    <div class="rounded-3 p-3 shadow-sm d-inline-block text-white" style="background-color: #0b5ed7;">Я могу после 6 вечера.</div>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-muted">Илья</strong>
                                    <div class="bg-white rounded-3 p-3 shadow-sm d-inline-block mt-1">Мне тоже удобно после 18:00.</div>
                                </div>
                            </div>

                            {{-- Поле ввода --}}
                            <div class="bg-white px-4 py-3 border-top">
                                <form class="d-flex">
                                    <input type="text" class="form-control me-2 rounded-pill shadow-sm" placeholder="Введите сообщение..." />
                                    <button type="submit" class="btn rounded-pill px-4 shadow-sm text-white" style="background-color: #0b5ed7;">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
