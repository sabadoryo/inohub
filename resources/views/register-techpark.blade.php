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

<body>

<header class="header">

    <div class="header__container">

        <a href="/" class="header__logo">Tech <span class="header__logo-accent">Hub</span></a>

        <div class="header__text-box header__text">
            По вопросам регистрации: <span class="header__text header__text--white">+7(7172) 79-97-61 (220,222)</span>
        </div>

        <div class="header__lang-switcher">
            <div class="header__language">Ru</div>
            <svg class="header__lang-toggle" width="10" height="5">
                <use xlink:href="/img/icons.svg#toggle"></use>
            </svg>

            <ul class="header__lang-dropdown lang-dropdown">
                <li class="lang-dropdown__item"><a href="#" class="lang-dropdown__link">Қазақша</a></li>
                <li class="lang-dropdown__item"><a href="#" class="lang-dropdown__link">Русский</a></li>
                <li class="lang-dropdown__item"><a href="#" class="lang-dropdown__link">English</a></li>
            </ul>

        </div>


        {{--        <user-bar></user-bar>--}}

    </div>

</header>

<main class="techpark-page">

    <div class="techpark-page__section techpark-welcome-section">
        <img src="/img/techpark-bg.png" alt="" class="techpark-welcome-section__bg">

        <button class="techpark-welcome-section__button-back button-back button-back--rotate button-back--transparent">
            <svg class="button-back__icon" width="18" height="18">
                <use href="/img/icons.svg#chevron-right"></use>
            </svg>
            Вернуться
        </button>

        <div class="techpark-welcome-section__title">
            Регистрация участников международного <br>
            технопарка IT-стартапов Astana Hub
        </div>

        <button class="techpark-welcome-section__btn button button--lg">Подать заявку</button>
    </div>

    <div class="techpark-page__section benefit-section">

        <div class="benefit-section__container">
            <div class="benefit-section__row">
                <div class="benefit-section__heading">
                    Что дает статус участника <br>
                    Astana Hub?
                </div>

                <div class="benefit-section__list">

                    <div class="benefit-section__item">
                        — Возможность получить налоговые льготы: КПН – 0%, ИПН – 0%, <br>
                        НДС – 0%, социальный налог на нерезидентов – 0%.
                    </div>

                    <div class="benefit-section__item">
                        — Возможность получить упрощенный визовый и трудовой режим <br>
                        для иностранных участников технопарка и компаний, где работают <br>
                        нерезиденты.
                    </div>

                    <div class="benefit-section__item">
                        — Даем знания и полезные контакты для привлечения инвестиций <br>
                        на выгодных условиях
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="techpark-page__section documents-section">

        <div class="documents-section__container">
            <div class="documents-section__heading heading-medium">
                Lorem ipsum dolor sit amet
            </div>

            <div class="documents-section__list">

                <div class="documents-section__document-box document-box">

                    <svg class="document-box__icon" width="100" height="100">
                        <use href="/img/icons.svg#star-box"></use>
                    </svg>

                    <div class="document-box__title">
                        Перечень приоритетных видов деятельности
                    </div>

                    <button class="document-box__btn button button--grey button--icon-right button--w100">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#download"></use>
                        </svg>
                        Скачать
                    </button>
                </div>

                <div class="documents-section__document-box document-box">

                    <svg class="document-box__icon" width="100" height="100">
                        <use href="/img/icons.svg#sort"></use>
                    </svg>

                    <div class="document-box__title">
                        Порядок регистрации участников
                    </div>

                    <button class="document-box__btn button button--grey button--icon-right button--w100">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#download"></use>
                        </svg>
                        Скачать
                    </button>
                </div>

                <div class="documents-section__document-box document-box">

                    <svg class="document-box__icon" width="100" height="100">
                        <use href="/img/icons.svg#star-box"></use>
                    </svg>

                    <div class="document-box__title">
                        Положение о комиссии по отбору участников
                    </div>

                    <button class="document-box__btn button button--grey button--icon-right button--w100">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#download"></use>
                        </svg>
                        Скачать
                    </button>
                </div>

                <div class="documents-section__document-box document-box">

                    <svg class="document-box__icon" width="100" height="100">
                        <use href="/img/icons.svg#copy"></use>
                    </svg>

                    <div class="document-box__title">
                        Список документов для регистрации участников
                    </div>

                    <button class="document-box__btn button button--grey button--icon-right button--w100">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#download"></use>
                        </svg>
                        Скачать
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="techpark-page__section documents-section">

        <div class="documents-section__container">

            <div class="documents-section__heading heading-medium">
                Памятка потенциального участника
            </div>

            <div class="documents-section__list">

                <div class="documents-section__memo memo-box">

                    <img src="/img/memo-1.png" alt="" class="memo-box__img">

                </div>

                <div class="documents-section__memo memo-box">

                    <img src="/img/memo-2.png" alt="" class="memo-box__img">

                </div>

                <div class="documents-section__memo memo-box">

                    <img src="/img/memo-3.png" alt="" class="memo-box__img">

                </div>

                <div class="documents-section__memo memo-box">

                    <img src="/img/memo-4.png" alt="" class="memo-box__img">

                </div>

            </div>
        </div>

    </div>

    <div class="techpark-page__section timeline-section">

        <div class="timeline-section__container">

            <div class="timeline-section__title heading-medium">
                Lorem ipsum dolor sit amet
            </div>

            <div class="timeline-section__timeline as-timeline">

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        01
                    </div>

                    <div class="as-timeline__block-title">
                        Регистрация будет проходить онлайн на сайте технопарка.
                    </div>

                    <div class="as-timeline__block-subtitle">
                        Необходимо заполнить электронное заявление и обязательно прикрепить все запрашиваемые документы.
                    </div>
                </div>

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        02
                    </div>

                    <div class="as-timeline__block-title">
                        Ожидать результаты первичной обработки документов
                    </div>

                    <div class="as-timeline__block-subtitle">
                        На этом этапе технопарк будет проверять наличие всех документов и информации. Если какой-то из
                        документов не будет соответствовать требованиям, технопарк не примет вашу анкету и вернет
                        документы на доработку.
                    </div>
                </div>

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        03
                    </div>

                    <div class="as-timeline__block-title">
                        Ожидать решения комиссии
                    </div>

                    <div class="as-timeline__block-subtitle">
                        В течение 10 рабочих дней вам на почту придет письмо с решением комиссии. Вы получите письмо при
                        любом раскладе, будь то положительное или отрицательное решение комиссии.
                    </div>
                </div>

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        04
                    </div>

                    <div class="as-timeline__block-title">
                        Подтверждение
                    </div>

                    <div class="as-timeline__block-subtitle">
                        Если вы прошли два этапа отбора комиссии, вы получите свидетельство участника технопарка Astana
                        Hub. Это бумажный документ, который будет подтверждать вашу регистрацию.
                    </div>
                </div>

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        05
                    </div>

                    <div class="as-timeline__block-title">
                        Договор
                    </div>

                    <div class="as-timeline__block-subtitle">
                        Заключить Договор с Astana Hub, где будут прописаны условия деятельности участника технопарка.
                    </div>
                </div>

                <div class="as-timeline__block">
                    <div class="as-timeline__block-number">
                        06
                    </div>

                    <div class="as-timeline__block-title">
                        Результат
                    </div>

                    <div class="as-timeline__block-subtitle">
                        После всех этапов вас включат в Перечень участников Astana Hub, после чего логотип и описание
                        вашего проекта будут опубликованы на сайте технопарка.
                    </div>
                </div>

            </div>

        </div>
    </div>

</main>


<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
