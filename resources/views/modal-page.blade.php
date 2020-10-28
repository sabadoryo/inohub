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

<div class="as-modal-box">

    <div class="as-modal-box__overlay"></div>

    <div class="as-modal as-modal--sm">

        <a href="#" class="as-modal__close-btn">
            <svg width="28" height="28">
                <use href="/img/icons.svg#close-icon"></use>
            </svg>
        </a>

        <div class="as-modal__heading">
            Войти
        </div>

        <img src="/img/avatar-placeholder.svg" alt="" class="as-modal__profile-photo">

        <form class="as-modal__form">

            <div class="as-modal__input-box input-box">
                <label class="input-box__label">E-mail</label>
                <input type="text" class="input-box__input" placeholder="info@astanahub.kz">
            </div>

            <div class="as-modal__input-box input-box input-box--error">
                <label class="input-box__label">Пароль</label>
                <div class="input-box__container">
                    <input type="password" class="input-box__input" placeholder="Введите пароль">
                    <a href="#" class="input-box__pass-eye">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#pass-eye"></use>
                        </svg>
                    </a>
                </div>

                <div class="input-box__error-text">
                    Неверный пароль. Повторите попытку или нажмите на ссылку "Забыли пароль?", чтобы сбросить его.
                </div>
            </div>

            <button class="as-modal__button button button--w100">Войти</button>

            <button class="as-modal__button button button--grey button--w100">
                <Пропустить></Пропустить>
            </button>

        </form>

        <div class="as-modal__section as-modal__section--centered">
            <a href="#" class="as-modal__link">Забыли пароль?</a>
        </div>

        <div class="as-modal__section">
            <div class="as-modal__text">
                У вас нету аккаунта? <a href="#" class="as-modal__link">Зарегестрироваться</a>
            </div>
        </div>

        <div class="as-modal__section as-modal__section--centered">
            <div class="as-modal__border-side">
                Или
            </div>
        </div>

        <div class="as-modal__btn-group">
            <button class="as-modal__btn-item button-w-icon">
                Войти с
                <svg width="20" height="20">
                    <use href="/img/icons.svg#google-icon"></use>
                </svg>
            </button>
            <button class="as-modal__btn-item button-w-icon button-w-icon--blue">
                Войти с
                <svg width="20" height="20">
                    <use href="/img/icons.svg#fb-icon"></use>
                </svg>
            </button>
        </div>

    </div>

</div>

<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
