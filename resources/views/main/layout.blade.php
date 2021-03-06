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
    @if(isset($includeBootstrap) && $includeBootstrap)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .btn {font-size: 1.4rem !important;}
            .ta-scroll-window > .ta-bind {
                padding: 6px 25px !important;
            }
            p {
                font-size: 16px !important;
            }
            h3 {
                font-size: 20px !important;
            }
        </style>
    @endif
    <style>

        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none !important;
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }

        .swal2-popup {
            width: 38em;
        }

        .swal2-title {
            font-size: 3.2em;
        }

        .swal2-content {
            font-size: 2em;
        }

        .swal2-styled.swal2-confirm {
            font-size: 1.6em;
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

                <input type="text" class="search-box__input" placeholder="{{$dictionary['Search'] ?? 'Search'}}">

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


            <div uib-dropdown="" class="header__lang-container">

                <div class="header__lang-switcher" uib-dropdown-toggle="">
                    <div class="header__language">{{ $dictionary['En'] ?? "En" }}</div>
                    <svg class="header__lang-toggle" width="10" height="5">
                        <use xlink:href="/img/icons.svg#toggle"></use>
                    </svg>
                </div>
                <ul class="header__lang-dropdown lang-dropdown" uib-dropdown-menu="">
                    <li class="lang-dropdown__item"><a href="/select-language/kk" class="lang-dropdown__link">Қазақша</a>
                    </li>
                    <li class="lang-dropdown__item"><a href="/select-language/ru" class="lang-dropdown__link">Русский</a>
                    </li>
                    <li class="lang-dropdown__item"><a href="/select-language/en" class="lang-dropdown__link">English</a>
                    </li>
                </ul>

            </div>

            <user-bar></user-bar>

        </div>

    </header>

    <main class="main">

        <div class="main__container">

            <perfect-scrollbar class="main__as-navbar as-navbar">

                <div class="as-navbar__section">
                    <a href="/" class="as-navbar__item {{isset($activePage) && $activePage == 'main' ? 'as-navbar__item--active' : ''}}">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#house"></use>
                        </svg>
                        {{$dictionary['Feed'] ?? 'Feed'}}
                    </a>

                    <a href="/events" class="as-navbar__item {{isset($activePage) && $activePage == 'events' ? 'as-navbar__item--active' : ''}}">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#calendar"></use>
                        </svg>
                        {{$dictionary['Events'] ?? 'Events'}}

                    </a>

                    <a href="/startups" class="as-navbar__item {{isset($activePage) && $activePage == 'startups' ? 'as-navbar__item--active' : ''}}">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#rocket"></use>
                        </svg>
                        {{__('Startups')}}
                    </a>

                    <a href="/investors" class="as-navbar__item {{isset($activePage) && $activePage == 'investors' ? 'as-navbar__item--active' : ''}}">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#handshake"></use>
                        </svg>
                        {{__('Investors')}}
                    </a>

                    <a href="/vacancies" class="as-navbar__item">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#jobs"></use>
                        </svg>
                        {{$dictionary['Vacancies'] ?? 'Vacancies'}}
                    </a>

                    <a href="#" class="as-navbar__item">
                        <svg class="as-navbar__icon" width="20" height="17">
                            <use xlink:href="/img/icons.svg#purchases"></use>
                        </svg>
                        {{$dictionary['Purchases'] ?? 'Purchases'}}

                    </a>
                </div>

                <div class="as-navbar__section">

                    <a href="/astana-hub/about" class="as-navbar__organization">
                        <img src="/img/icons/astana-hub-icon-sm.png" alt="" class="as-navbar__organization-icon">
                        Astana Hub
                    </a>

                    <a href="/tech-garden/about" class="as-navbar__organization">
                        <img src="/img/icons/tech-garden-icon-sm.png" alt="" class="as-navbar__organization-icon">
                        Tech Garden
                    </a>

                    <a href="/ao-cett/about" class="as-navbar__organization">
                        <img src="/img/icons/cett-icon-sm.png" alt="" class="as-navbar__organization-icon">
                        ЦИТТ
                    </a>

                </div>

                <div class="as-navbar__section">
                    <a href="#" class="as-navbar__link">FAQ</a>
                    <a href="#" class="as-navbar__link">{{$dictionary['Feedback'] ?? 'Feedback'}}</a>
                    <a href="#" class="as-navbar__link">СМИ</a>
                </div>

            </perfect-scrollbar>

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
            .constant('Language', '{{\App::getLocale()}}')
            .constant('Dictionary', {!! json_encode($dictionary) !!})
    </script>

</body>
</html>
