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
            <a href="/astana-hub/programs" class="tabs__link">
                Программы
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link tabs__link--active">
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

            <div class="tabs-inner__section about-simp">
                <div class="about-simp__row">
                    <div class="about-simp__heading">
                        Smart Industry Management <br>
                        Platform
                    </div>

                    <div class="about-simp__info">
                        <div class="about-simp__text">
                            Платформа-супермаркет отечественных IT-решений на которой собирается пул качественных
                            IT-решений, а промышленные предприятия размещают свои реальные задачи.
                        </div>

                        <button class="about-simp__btn button button--lg">Подробнее</button>
                    </div>
                </div>

                <div class="about-simp__grey-text">SIMP</div>
            </div>

            <div class="tabs-inner__section smart-store">

                <div class="smart-store__title">
                    IT – Решения
                </div>

                <div class="smart-box">

                    <a href="#" class="smart-box__website-link">
                        Перейти на сайт
                    </a>

                    <div class="smart-box__body">
                        <img src="/img/bimlab-icon.png" alt="" class="smart-box__logo">

                        <div class="smart-box__title">
                            Центр «Лаборатория BIM+»
                        </div>

                        <div class="smart-box__text">
                            Деятельность лаборатории направлена на решение задач по внедрению BIM-технологий на этапе
                            эксплуатации строительных объектов в секторах гражданского и промышленного строительства, а
                            также для автоматизации...
                        </div>
                    </div>

                    <div class="smart-box__footer">
                        <a href="#" class="smart-box__link-box">
                            <svg class="smart-box__icon" width="24" height="24">
                                <use href="/img/icons.svg#download"></use>
                            </svg>
                            Скачать презентацию
                        </a>
                    </div>


                </div>

                <div class="smart-box">

                    <a href="#" class="smart-box__website-link">
                        silumin.kz
                    </a>

                    <div class="smart-box__body">
                        <img src="/img/silumin-vostok.png" alt="" class="smart-box__logo">

                        <div class="smart-box__title">
                            Товарищество с ограниченной ответственностью «Силумин-Восток»
                        </div>

                        <div class="smart-box__text">
                            Планируется внедрить в ближайшие пять лет: ERP
                            <br>
                            <br>
                            Системы, которые внедрены на предприятии: информация уточняется
                        </div>
                    </div>

                    <div class="smart-box__footer">
                        <button class="smart-box__btn button button--grey button--w100">Посмтреть ТЗ</button>
                        <button class="smart-box__btn button button--w100">Откликнуться</button>
                    </div>


                </div>

            </div>


        </div>


    </div>

@endsection
