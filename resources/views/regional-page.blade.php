@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/astana-hub-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Astana Hub</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link">
                О нас
            </a>
            <a href="/astana-hub/programs" class="tabs__link tabs__link--active">
                Программы
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link">
                Корпоративные инновации
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link">
                Hub Space
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link">
                R&D
            </a>
            <a href="/astana-hub/resources" class="tabs__link">
                Ресурсы
            </a>
        </div>

        <div class="tabs__content tabs-inner">

            <div class="tabs-inner__section black-fluid">

                <div class="black-fluid__circles circles"></div>

                <div class="black-fluid__row">

                    <div class="black-fluid__title">
                        Региональное развитие
                    </div>

                    <div class="black-fluid__info">

                        <div class="black-fluid__text">
                            Программа развития региональных партнеров рассчитана для поддержки и развития региональных
                            технопарков, акселераторов, инкубаторов и коворкингов.
                        </div>

                        <button class="black-fluid__btn button button--lg">
                            Подробнее
                        </button>
                    </div>

                </div>

            </div>

            <div class="tabs-inner__section programs">

                <div class="programs__list">

                    <div class="programs__card program-box">
                        <a href="" class="program-box__more-btn">
                            <img src="/img/icons/chevron-right-alt.svg" alt="">
                        </a>

                        <div class="program-box__title">
                            Прием заявок на программу развития региональных партнеров с 4 мая по 24 маяРейтинг стартапов
                        </div>

                        <div class="program-box__text">
                            Региональное развитие
                        </div>
                    </div>

                    <div class="programs__card program-box">
                        <a href="" class="program-box__more-btn">
                            <img src="/img/icons/chevron-right-alt.svg" alt="">
                        </a>

                        <div class="program-box__title">
                            Качаем регионы: возможности для развития областных технопарков
                        </div>

                        <div class="program-box__text">
                            Региональное развитие
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>

@endsection

