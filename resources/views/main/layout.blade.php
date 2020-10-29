<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/ui-components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}

    <style>

        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none !important;
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }

    </style>

</head>
<body ng-controller="MainController" ng-cloak="">

<header class="header">

    <div class="header__container">

        <a href="/" class="header__logo">Tech <span class="header__logo-accent">Hub</span></a>

        <div class="header__search-box search-box">

            <a href="#" class="search-box__icon">
                <svg width="18" height="18">
                    <use xlink:href="/img/icons.svg#search"></use>
                </svg>
            </a>

            <input type="text" class="search-box__input" placeholder="Поиск">

            <div class="search-box__dropdown search-dropdown">

                <a href="#" class="search-dropdown__item">
                    <img src="/img/icons/astana-hub-icon-xs.png" alt="" class="search-dropdown__icon">

                    <div class="search-dropdown__info">
                        <div class="search-dropdown__title">Speaker Night</div>

                        <div class="search-dropdown__subtitle">
                            “Как презентовать стартап потенциальному инвестору”
                        </div>
                    </div>
                </a>

                <a href="#" class="search-dropdown__item">
                    <img src="/img/icons/astana-hub-icon-xs.png" alt="" class="search-dropdown__icon">

                    <div class="search-dropdown__info">
                        <div class="search-dropdown__title">Speaker Night</div>

                        <div class="search-dropdown__subtitle">
                            “Ключевые правила ЭФФЕКТИВНЫХ ПРОДАЖ 2020”
                        </div>
                    </div>
                </a>
            </div>

        </div>

{{--        <div class="header__lang-switcher" onclick="console.log(document.getElementsByClassName('lang-dropdown'))">--}}
        <div class="header__lang-switcher" onclick="document.getElementsByClassName('lang-dropdown')[0].classList.toggle('lang-dropdown--show')">
            <div class="header__language">Ru</div>
            <svg class="header__lang-toggle" width="10" height="5">
                <use xlink:href="/img/icons.svg#toggle"></use>
            </svg>

            <ul class="header__lang-dropdown lang-dropdown">
                <li class="lang-dropdown__item" onclick="document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-kz');
                    })"><a href="#" class="lang-dropdown__link">Қазақша</a></li>
                <li class="lang-dropdown__item" onclick="document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-ru');
                    })"><a href="#" class="lang-dropdown__link">Русский</a></li>
                <li class="lang-dropdown__item" onclick="document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-en');
                    })"><a href="#" class="lang-dropdown__link">English</a></li>
            </ul>

        </div>


        <user-bar></user-bar>

    </div>

</header>

<main class="main">

    <div class="main__container">

        <nav class="main__as-navbar as-navbar">

            <a href="/" class="as-navbar__item as-navbar__item--active">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#house"></use>
                </svg>
                Лента
            </a>

            <a href="/events" class="as-navbar__item">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#calendar"></use>
                </svg>
                Мероприятия
            </a>

            <!--            <a href="#" class="as-navbar__item">-->
            <!--                <svg class="as-navbar__icon" width="20" height="17">-->
            <!--                    <use xlink:href="/img/icons.svg#blog"></use>-->
            <!--                </svg>-->
            <!--                Блог-->
            <!--            </a>-->

            <!--            <a href="#" class="as-navbar__item">-->
            <!--                <svg class="as-navbar__icon" width="20" height="17">-->
            <!--                    <use xlink:href="/img/icons.svg#news"></use>-->
            <!--                </svg>-->
            <!--                Новости-->
            <!--            </a>-->

            <a href="" class="as-navbar__item">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#rocket"></use>
                </svg>
                Компании
            </a>

            <a href="" class="as-navbar__item">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#handshake"></use>
                </svg>
                Инвесторы
            </a>

            <a href="" class="as-navbar__item">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#jobs"></use>
                </svg>
                Вакансии
            </a>

            <a href="#" class="as-navbar__item">
                <svg class="as-navbar__icon" width="20" height="17">
                    <use xlink:href="/img/icons.svg#purchases"></use>
                </svg>
                Закупки
            </a>

            <div class="as-navbar__organization-section">

                <a href="/astana-hub/about" class="as-navbar__organization">
                    <img src="/img/icons/astana-hub-icon-sm.png" alt="" class="as-navbar__organization-icon">
                    Astana Hub
                </a>

                <a href="/tech-garden/about" class="as-navbar__organization">
                    <img src="/img/icons/tech-garden-icon-sm.png" alt="" class="as-navbar__organization-icon">
                    Tech Garden
                </a>

                <a href="#" class="as-navbar__organization">
                    <img src="/img/icons/cett-icon-sm.png" alt="" class="as-navbar__organization-icon">
                    ЦИТТ
                </a>

            </div>

        </nav>

        <div class="main__content content">

            @yield('content')

        </div>

    </div>

</main>


<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>

<script>
    window
        .angular
        .module('app')
        .constant('AUTH_USER', {!! \Auth::user() !!})
        .constant('AUTH_ROLES', {!! $AUTH_ROLES !!})
        .constant('AUTH_PERMISSIONS', {!! $AUTH_PERMISSIONS !!})
</script>

</body>
</html>
