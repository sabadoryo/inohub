@extends('main.layout')

@section('content')

    <div class="content__vacations vacations">

        <div class="vacations__row">
            <div class="vacations__title">
                Вакансии
            </div>

            <div class="vacations__filter-box">
                <button
                    class="vacations__filter-btn button-back button-back--icon-right button-back--white">
                    По умолчанию
                    <svg class="button-back__icon" width="18" height="18">
                        <use href="/img/icons.svg#toggle-2"></use>
                    </svg>
                </button>

                <div class="vacations__dropdown vacations__dropdown--show">
                    <a href="#" class="vacations__dropdown-item">
                        Сначала новые
                    </a>
                    <a href="#" class="vacations__dropdown-item">
                        Сначало старые
                    </a>
                </div>
            </div>
        </div>

        <div class="vacations__inner">

            <div class="vacations__left vacation-box">

                <div class="vacation-box__row">
                    <div class="vacation-box__company">Tech Garden</div>
                    <div class="vacation-box__salary">300.000 - 500.000 ₸ ∙ Алматы</div>
                </div>

                <div class="vacation-box__section">
                    <div class="vacation-box__heading">
                        PHP Разработчик
                    </div>
                </div>

                <div class="vacation-box__section">
                    <div class="vacation-box__text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                </div>

                <div class="vacation-box__section">
                    <div class="vacation-box__title">
                        Lorem ipsum
                    </div>

                    <div class="vacation-box__text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </div>
                </div>

                <div class="vacation-box__section">
                    <div class="vacation-box__title">
                        Lorem ipsum
                    </div>

                    <div class="vacation-box__text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    </div>
                </div>

            </div>

            <div class="vacations__right reply-box">

                <div class="reply-box__heading">
                    Сопроводительное письмо
                </div>

                <textarea class="reply-box__textarea" placeholder="Ваше сопроводительное письмо..."></textarea>

                <button class="reply-box__button button button--w100">Откликнуться</button>
            </div>

        </div>

    </div>


@endsection

