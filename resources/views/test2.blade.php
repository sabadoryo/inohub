<!doctype html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/ui-components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

            <ui class="header__lang-dropdown lang-dropdown">
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
            </ui>
        </div>


        <user-bar></user-bar>

    </div>

</header>

{!! $passport->content !!}

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


    window.changeLang = function () {
        document.querySelectorAll('.text-lang').forEach(elem => {

            if (!elem.getAttribute('data-grapes-lang-ru'))
                elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

            elem.innerHTML = elem.getAttribute('data-grapes-lang-kz');
        })
    }


</script>

</body>
</html>
