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

        <div class="vacations__list">

            <div class="vacations__card vacation-card">

                <div class="vacation-card__title">DDA Logistics</div>

                <div class="vacation-card__name">Frontend-Разработчик</div>

                <div class="vacation-card__subtitle">
                    Астана
                </div>

                <div class="vacation-card__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                </div>

                <button class="vacation-card__btn button button--w100">Откликнуться
                </button>
            </div>

            <div class="vacations__card vacation-card">

                <div class="vacation-card__title">Tech Garden</div>

                <div class="vacation-card__name">PHP Разработчик</div>

                <div class="vacation-card__subtitle">
                    300.000 - 500.000 ₸ ∙ Алматы
                </div>

                <div class="vacation-card__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                </div>

                <button class="vacation-card__btn button button--w100">Откликнуться
                </button>
            </div>

            <div class="vacations__card vacation-card">

                <div class="vacation-card__title">DDA Logistics</div>

                <div class="vacation-card__name">Frontend-Разработчик</div>

                <div class="vacation-card__subtitle">
                    Астана
                </div>

                <div class="vacation-card__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                </div>

                <button class="vacation-card__btn button button--w100">Откликнуться
                </button>
            </div>

            <div class="vacations__card vacation-card">

                <div class="vacation-card__title">DDA Logistics</div>

                <div class="vacation-card__name">Frontend-Разработчик</div>

                <div class="vacation-card__subtitle">
                    Астана
                </div>

                <div class="vacation-card__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                </div>

                <button class="vacation-card__btn button button--w100">Откликнуться
                </button>
            </div>

        </div>

    </div>


@endsection

