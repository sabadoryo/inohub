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

<div class="modal-full">

    <a href="#" class="modal-full__close">
        <svg width="28" height="28">
            <use href="img/icons.svg#close-icon"></use>
        </svg>
    </a>

    <div class="modal-full__inner">

        <div class="modal-full__step">

            <div class="modal-full__row">
                <div class="modal-full__heading modal-full__heading--active">1. Личные данные</div>

                <a href="#" class="modal-full__autocomplete">
                    Автозаполнить данные
                    <svg class="modal-full__warning-icon" width="24" height="24">
                        <use href="img/icons.svg#warning-icon"></use>
                    </svg>
                </a>
            </div>

            <div class="modal-full__list">

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">ФИО</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="Жалгас Конаев Аскарулы">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Телефон</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="+7 777 838 99 90">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">E-mail</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="info@astanahub.kz">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Аккаунт telegram</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="@zhalgas01">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Страна</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="Казахстан">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Город</label>
                    <div class="input-box__container">
                        <input type="text" class="input-box__input" placeholder="Астана">
                    </div>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Владение языками</label>

                    <div class="input-box__container">
                        <select class="input-box__input">
                            <option value="1">Казахский</option>
                            <option value="1">Казахский</option>
                            <option value="1">Казахский</option>
                            <option value="1">Казахский</option>
                        </select>

                        <svg class="input-box__select-icon" width="24" height="24">
                            <use href="img/icons.svg#chevron-down"></use>
                        </svg>
                    </div>
                </div>

                <div class="modal-full__input-box input-box input-box--span2">
                    <label class="input-box__label">Краткое описание проекта. В чем заключается идея? </label>
                    <textarea class="input-box__textarea" placeholder="Проект был создан для..."></textarea>
                </div>

                <div class="modal-full__input-box input-box">
                    <label class="input-box__label">Привлекали ли вы инвестиции?</label>

                    <div class="input-box__radio-group">
                        <label class="input-box__radio-box custom-radio-box">
                            <input type="radio" name="investment" class="custom-radio-box__radio">
                            <span class="custom-radio-box__checkmark"></span>
                            Да
                        </label>

                        <label class="input-box__radio-box custom-radio-box">
                            <input type="radio" name="investment" class="custom-radio-box__radio">
                            <span class="custom-radio-box__checkmark"></span>
                            Нет
                        </label>
                    </div>
                </div>

            </div>

            <button class="modal-full__button button button--extra-lg" disabled>Далее</button>

        </div>

        <div class="modal-full__step">
            <div class="modal-full__row">
                <div class="modal-full__heading">2. Описание проекта</div>

            </div>
        </div>

        <div class="modal-full__step">
            <div class="modal-full__row">
                <div class="modal-full__heading">3. Вопросы</div>

            </div>
        </div>


    </div>


</div>


<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
