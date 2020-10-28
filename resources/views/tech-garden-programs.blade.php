@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/tech-garden-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Tech Garden</div>

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
                Smart Store
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link">
                Технологические лаборатории
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link">
                База знаний
            </a>
        </div>

        <div class="tabs__content tabs-inner">
            <div class="tabs-inner__section programs">

                <h2 class="programs__title heading-medium">Программы</h2>

                <div class="programs__list">

                    <div class="programs__card program-box program-box--red">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">Корпоративная <br>
                            акселерация
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                    <div class="programs__card program-box program-box--purple">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">
                            Финансирование <br>
                            проектов за счет 1% СГД <br>
                            (ЗНД)
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                    <div class="programs__card program-box program-box--green">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">
                            Центр по новым <br>
                            материалам и аддитивным <br>
                            технологиям
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                    <div class="programs__card program-box program-box--blue">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">
                            Лаборатория BIM+
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                    <div class="programs__card program-box program-box--yellow">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">
                            Центр цифровой <br>
                            промышленности <br>
                            Intellisense-Lab
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                    <div class="programs__card program-box program-box--beige">
                        <div class="program-box__circles"></div>
                        <div class="program-box__title">
                            Центр <br>
                            интеллектуальных <br>
                            систем
                        </div>
                        <button class="program-box__button button button--white">Подробнее</button>
                    </div>

                </div>
            </div>
        </div>



    </div>

@endsection
