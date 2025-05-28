@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Добро пожаловать, {{ auth()->user()->name }}! <span style="font-size: 1.5rem;"></span>
        </h1>

        <div class="row g-4">
            @php
                $cards = [
                    ['title' => 'Больше, чем просто to-do', 'icon' => 'bi-check2-circle', 'texts' => [
                        'Это твоя жизнь — удобно, ярко и вместе с другими.',
                        'Мы не просто список задач. И уж точно не стандартная соцсеть.',
                        'Мы — место, где ты можешь спланировать день и показать, когда ты свободен.'
                    ]],
                    ['title' => 'Хочешь встретиться с друзьями?', 'icon' => 'bi-people', 'texts' => [
                        'Сыграть джем, собраться на скейтах, устроить вечер кино или просто погулять?',
                        'Теперь не надо писать каждому в личку — просто обнови свой день, и пусть видят, когда ты на связи.'
                    ]],
                    ['title' => 'Для учёбы, работы и вдохновения', 'icon' => 'bi-lightning-charge', 'texts' => [
                        'Учишься? Работаешь? Хочешь совместный проект?',
                        'Ты фотограф, музыкант, дизайнер, программист или просто кайфуешь от порядка?',
                        'Организуй свой ритм. Делись им. Делай вместе.'
                    ]],
                    ['title' => 'Твой личный штаб', 'icon' => 'bi-house-door', 'texts' => [
                        'Планируй свои дела, пиши заметки, создавай события и приглашай друзей.',
                        'Это твой личный штаб. И место встречи.'
                    ]],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100 rounded-4 border-0 card-pink-gradient"
                         style="min-height: 320px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="card-body d-flex flex-column justify-content-center py-4 px-5 text-center">
                            <div class="mb-3 icon-pink" style="font-size: 2.5rem;">
                                <i class="bi {{ $card['icon'] }}"></i>
                            </div>
                            <h4 class="card-title fw-semibold mb-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #6a1b4d;">
                                {{ $card['title'] }}
                            </h4>
                            <div class="card-text text-pink-muted" style="line-height: 1.7; font-size: 1.1rem;">
                                @foreach ($card['texts'] as $text)
                                    <p class="mb-3">{{ $text }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


                    </div>
                </div>

    <style>
        /* Розовые градиенты для карточек */
        .card-pink-gradient {
            background: linear-gradient(135deg, #f3adc5 0%, #ecbfbf 100%);
        }
        .card-pink-light {
            background: linear-gradient(135deg, #fff0f6 0%, #ffd6e8 100%);
        }

        /* Иконки розовые */
        .icon-pink {
            color: #c84f78;
        }

        /* Текст в розовых тонах для лучшей читаемости */
        .text-pink-muted {
            color: #2d1923;
        }

        /* Hover эффект */
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(248, 0, 0, 0.35);
            cursor: default;
        }

        /* Адаптивные отступы */
        @media (max-width: 768px) {
            .card-body {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }
        }
    </style>
@endsection
