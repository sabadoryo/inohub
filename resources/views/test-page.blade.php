<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ui-components.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>

        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none !important;
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }

    </style>

</head>

<body>

<header class="ui-header-1">

    <div class="ui-header-1__container ui-header-1__container--space-between">

        <a href="/src" class="ui-header-1__logo">
            Tech<span class="ui-header-1__logo-accent">Hub</span>
        </a>


        <div class="ui-header-1__action-box">
            <div class="ui-header-1__lang-switcher">
                <div class="ui-header-1__language">
                    Ru
                </div>

                <svg class="ui-header-1__lang-toggle" width="10" height="5">
                    <use xlink:href="img/icons.svg#toggle"></use>
                </svg>
            </div>

            <button class="ui-header-1__login-btn button button--lg">
                Подать заявку
            </button>
        </div>

    </div>

</header>

<main class="ui-main">

    <section class="ui-section-80vh">

        <img src="/img/program-poster.png" alt="" class="ui-bg-img">

        <div class="ui-container">

            <div class="ui-pos-center-left">

                <div class="ui-heading-white">Astana hub heading program slim shady</div>

                <div class="ui-mb-16"></div>

                <div class="ui-paragraph-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eveniet
                    explicabo vel! Alias delectus dolores esse ex ipsam iste laudantium natus placeat reiciendis sequi
                    suscipit totam unde, vel vitae voluptatum.
                </div>

                <div class="ui-mb-24"></div>

                <button class="ui-button-red-lg">Подать заявку</button>

            </div>

        </div>

    </section>

    <div class="ui-mb-120"></div>

    <section class="ui-section">

        <div class="ui-container">

            <div class="ui-heading-black ui-centered-text">Мы ищем проекты в твоем городе</div>
            <div class="ui-mb-40"></div>

            <div class="ui-grid-2">

                <div class="">
                    <div class="ui-card-column">
                        <img src="/img/icons/lamp.svg" alt="" class="ui-card-column__icon">

                        <div class="ui-card-column__title">
                            С конкурентоспособной идеей
                        </div>

                        <div class="ui-card-column__subtitle">
                            В стартап-индустрии мы называем это "MCI" - максимально конкурентоспособная идея, надобность
                            которой уже прощупана среди целевых клиентов. Идея должна быть осуществимой и иметь
                            потенциал на развитие.
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="ui-card-column">
                        <img src="/img/icons/lamp.svg" alt="" class="ui-card-column__icon">

                        <div class="ui-card-column__title">
                            Не менее 2-х ключевых участников команды
                        </div>

                        <div class="ui-card-column__subtitle">
                            Это говорит о том, что у вас есть сформированный костяк команды.
                        </div>
                    </div>
                </div>

            </div>

            <div class="ui-mb-24"></div>

            <div class="ui-grid-2">

                <div class="">
                    <div class="ui-card-column">
                        <img src="/img/icons/lamp.svg" alt="" class="ui-card-column__icon">

                        <div class="ui-card-column__title">
                            С конкурентоспособной идеей
                        </div>

                        <div class="ui-card-column__subtitle">
                            В стартап-индустрии мы называем это "MCI" - максимально конкурентоспособная идея, надобность
                            которой уже прощупана среди целевых клиентов. Идея должна быть осуществимой и иметь
                            потенциал на развитие.
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="ui-card-column">
                        <img src="/img/icons/lamp.svg" alt="" class="ui-card-column__icon">

                        <div class="ui-card-column__title">
                            Не менее 2-х ключевых участников команды
                        </div>

                        <div class="ui-card-column__subtitle">
                            Это говорит о том, что у вас есть сформированный костяк команды.
                        </div>
                    </div>
                </div>

            </div>

            <div class="ui-mb-120"></div>

            <div class="ui-heading-black ui-centered-text">Что ты получишь на инкубации?</div>

            <div class="ui-mb-60"></div>

            <div class="ui-grid-2">
                <div class="">
                    <div class="ui-heading-black">Наставник</div>
                </div>

                <div class="">
                    <div class="ui-paragraph-black">Ты сможешь детально разобрать свой проект с бизнес-экспертами (мы
                        называем их трекерами). На индивидуальных консультациях тебе помогут разобраться во всех
                        процессах - от финансов до маркетинга - и выстроить рабочую модель твоего стартапа.
                    </div>
                </div>

            </div>

            <div class="ui-mb-24"></div>

            <div class="ui-border"></div>

            <div class="ui-mb-24"></div>

            <div class="ui-grid-2">
                <div class="">
                    <div class="ui-heading-black">Понимание, как работает стартап</div>
                </div>

                <div class="">
                    <div class="ui-paragraph-black">Мы научим тебя создавать ИТ-продукт без навыков кодирования, строить
                        гибкую бизнес-модель, правильно формировать роли в команде и делать продукт, который решает
                        конкретную проблему и приносит доход.
                    </div>
                </div>

            </div>

            <div class="ui-mb-24"></div>

            <div class="ui-border"></div>

            <div class="ui-mb-24"></div>

            <div class="ui-grid-2">
                <div class="">
                    <div class="ui-heading-black">Нетворкинг</div>
                </div>

                <div class="">
                    <div class="ui-paragraph-black">Ты автоматически станешь частью комьюнити Astana Hub. Мы познакомим
                        тебя с нашим сообществом, расскажем о твоем проекте на наших площадках и познакомим с людьми и
                        компаниями, которые подтолкнут твой проект к развитию.
                    </div>
                </div>

            </div>

            <div class="ui-mb-120"></div>

        </div>

        <div class="ui-section-black">
            <div class="ui-mb-100"></div>
            <div class="ui-container">
                <div class="ui-paragraph-white ui-centered-text">Решай проблемы людей и меняй привычные процессы, <br>
                    А мы поможем разобраться во всем новом</div>

                <div class="ui-mb-24"></div>

                <div class="ui-heading-white ui-centered-text">Делать стартап - это интересно и современно</div>

                <div class="ui-mb-60"></div>

                <div class="ui-grid-3">
                    <div class="">
                        <div class="ui-step">
                            <div class="ui-step__number">
                                01
                            </div>
                            <div class="ui-step__text">
                                Сформулируй идею
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="ui-step">
                            <div class="ui-step__number">
                                02
                            </div>
                            <div class="ui-step__text">
                                Подай заявку на инкубацию
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="ui-step">
                            <div class="ui-step__number">
                                03
                            </div>
                            <div class="ui-step__text">
                                Сделай работающий ИТ-проект
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui-mb-100"></div>
        </div>

        <div class="ui-mb-120"></div>

        <div class="ui-container">
            <div class="ui-section ui-centered-text">
                <div class="ui-heading-black">6 недель твой путь от идеи к бизнесу!</div>
                <div class="ui-mb-24"></div>
                <div class="ui-paragraph-black">
                    Прием заявок до 23 октября 2020 <br>
                    Длительность программы: с 26 октября по 7 декабря 2020
                </div>
                <div class="ui-mb-24"></div>
                <button class="ui-button-red-md">Подать заявку</button>
            </div>

            <div class="ui-mb-120"></div>

            <div class="ui-section">

                <div class="ui-pos-center">

                    <div class="ui-socials">

                        <a href="#" class="ui-socials__item">
                            <img src="/img/icons/fb-icon.png" alt="">
                        </a>

                        <a href="#" class="ui-socials__item">
                            <img src="/img/icons/linkeddn-icon.png" alt="">
                        </a>

                        <a href="#" class="ui-socials__item">
                            <img src="/img/icons/inst-icon.png" alt="">
                        </a>

                        <a href="#" class="ui-socials__item">
                            <img src="/img/icons/tg-icon.png" alt="">
                        </a>

                        <a href="#" class="ui-socials__item">
                            <img src="/img/icons/youtube-icon.png" alt="">
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
