@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/tech-garden-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Tech Garden</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link tabs__link--active">
                О нас
            </a>
            <a href="/astana-hub/programs" class="tabs__link">
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

            <div class="tabs-inner__section feature-cards">

                <div class="feature-cards__title heading-medium">
                    Tech Garden сегодня
                </div>

                <div class="feature-cards__list">

                    <div class="feature-cards__card feature-card">

                        <div class="feature-card__title">
                            Проекты
                            <img src="/img/icons/satellite-colored.svg" alt="">
                        </div>

                        <div class="feature-card__inner">

                            <div class="feature-card__section">
                                <h4 class="feature-card__heading">120</h4>
                                <p class="feature-card__desc">По внедрению инновационных решений на промышленных
                                    предприятиях</p>
                            </div>

                        </div>

                    </div>

                    <div class="feature-cards__card feature-card">

                        <div class="feature-card__title">
                            Инвестиции
                            <img src="/img/icons/money-bag.svg" alt="">
                        </div>

                        <div class="feature-card__inner">

                            <div class="feature-card__section">
                                <h4 class="feature-card__heading">66 млн</h4>
                                <p class="feature-card__desc">Средняя сумма реализованных договоров между промышленным
                                    предприятием и компанией исполнителем</p>
                            </div>

                        </div>

                    </div>

                    <div class="feature-cards__card feature-card">

                        <div class="feature-card__title">
                            Компании
                        </div>

                        <div class="feature-card__inner">

                            <div class="feature-card__section">
                                <h4 class="feature-card__heading">57</h4>
                                <p class="feature-card__desc">Промышленных компаний являются заказчиками инновационных
                                    решений через Tech Garden</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="tabs-inner__section about-company">
                <div class="about-company__title">
                    Astana Hub Международный <br>
                    технопарк IT стартапов
                </div>

                <table class="about-company__table">
                    <tr>
                        <th>Миссия</th>
                        <td>Развивать стартап-культуру и поддерживать высокотехнологичные проекты для укрепления
                            экономики страны.
                        </td>
                    </tr>
                    <tr>
                        <th>Видение</th>
                        <td>Международный технопарк IT-стартапов “Astana Hub” должен стать ядром и локомотивом
                            развития экосистемы инноваций Казахстана и международно признанным хабом для
                            развития технологического бизнеса.
                        </td>
                    </tr>
                    <tr>
                        <th>Цель</th>
                        <td>67 миллиардов тенге должно быть инвестировано в стартапы-резиденты (выпускники
                            программ Astana Hub) к 2022 году.
                        </td>
                    </tr>
                    <tr>
                        <th>Контакты</th>
                        <td>
                            <table class="about-company__inner-table">
                                <tr>
                                    <th>Адрес:</th>
                                    <td>Республика Казахстан, г. Астана, пр. Мангилик ел, павильон С 4.6</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>info@astanahub.kz</td>
                                </tr>
                                <tr>
                                    <th>Телефон:</th>
                                    <td>+7 7172 79-97-61 (220, 222)</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <div class="about-company__socials socials">
                    <a href="#" class="socials__item">
                        <img src="/img/icons/fb-icon.png" alt="">
                    </a>

                    <a href="#" class="socials__item">
                        <img src="/img/icons/linkeddn-icon.png" alt="">
                    </a>

                    <a href="#" class="socials__item">
                        <img src="/img/icons/inst-icon.png" alt="">
                    </a>

                    <a href="#" class="socials__item">
                        <img src="/img/icons/tg-icon.png" alt="">
                    </a>

                    <a href="#" class="socials__item">
                        <img src="/img/icons/youtube-icon.png" alt="">
                    </a>
                </div>

                <div class="about-company__grey-title">astana hub</div>

            </div>

            <div class="tabs-inner__section team">

                <h2 class="team__title heading-medium">
                    Наша команда
                </h2>

                <div class="swiper-container">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide team-card">
                            <img src="/img/team-member.png" alt="" class="team-card__img">
                            <h5 class="team-card__name">Самал Турсунова</h5>
                            <h5 class="team-card__job">Руководитель</h5>
                        </div>

                    </div>

                    <!-- Add Arrows -->
                    <div class="swiper-button-next team__btn team__btn--right">
                        <svg width="13" height="13">
                            <use xlink:href="/img/icons.svg#chevron-right"></use>
                        </svg>
                    </div>

                    <div class="swiper-button-prev team__btn team__btn--left">
                        <svg width="13" height="13">
                            <use xlink:href="/img/icons.svg#chevron-right"></use>
                        </svg>
                    </div>

                </div>

            </div>

        </div>


    </div>

@endsection
