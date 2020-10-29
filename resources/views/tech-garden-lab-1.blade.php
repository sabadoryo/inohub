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

            <div class="tabs-inner__section companies">

                <div class="companies__list">

                    <div class="text-cards__item smart-box smart-box--company">

                        <div class="smart-box__body">
                            <img src="/img/lab-company-1.png" alt="" class="smart-box__logo">

                            <div class="smart-box__title">
                                Центр цифровой промышленности Intellisense-Lab
                            </div>

                            <div class="smart-box__text">
                                Центр цифровой промышленности Intellisense-LAB открыт Tech Garden в июне 2018 г.
                                совместно с
                                ТНК «IntelliSense.io Limited» (Великобритания) для разработки и внедрения технологий
                                Индустрии 4.0.
                            </div>
                        </div>

                    </div>

                    <div class="text-cards__item smart-box smart-box--company">

                        <div class="smart-box__body">
                            <img src="/img/bimlab-icon.png" alt="" class="smart-box__logo">

                            <div class="smart-box__title">
                                Лаборатория BIM+
                            </div>

                            <div class="smart-box__text">
                                Центр «Лаборатория BIM+» открыт в январе 2019 г. совместно с ТНК EcoDomus Inc (США) для
                                цифровизации полного жизненного цикла строительства объектов, в том числе промышленных,
                                в целях снижения эксплуатационных расходов.
                            </div>
                        </div>

                    </div>

                    <div class="text-cards__item smart-box smart-box--company">

                        <div class="smart-box__body">

                            <div class="smart-box__title">
                                Центр интеллектуальных систем
                            </div>

                            <div class="smart-box__text">
                                Центр на основе реинжиниринга бизнес-процессов решает вопросы интеграции,
                                прототипирования и понимания использования новых ИТ технологий недропользователями и
                                сервисными компаниями, промышленными предприятиями всех отраслей, логистическими и
                                железнодорожными операторами.
                            </div>
                        </div>

                    </div>

                    <div class="text-cards__item smart-box smart-box--company">

                        <div class="smart-box__body">

                            <div class="smart-box__title">
                                Центр по новым материалам и аддитивным технологиям
                            </div>

                            <div class="smart-box__text">
                                Центр по Новым материалам и аддитивным технологиям – осуществляет трансферт передовой
                                технологии производства металлических порошков, которая позволит снизить себестоимость
                                производства на 35%, а также перерабатывать хвосты и отвалы ГМК Казахстана.
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>

@endsection
