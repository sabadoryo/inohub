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
                            <img src="/img/icons/building.svg" alt="">
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
                    Автономный кластерный фонд «Парк <br>
                    Инновационных технологий»
                </div>

                <table class="about-company__table">
                    <tr>
                        <th>Миссия</th>
                        <td>Создание экосистемы для поддержки промышленных предприятий в их цифровой трансформации и
                            стимулирования активного внедрения цифровых технологий.
                        </td>
                    </tr>
                    <tr>
                        <th>Цель</th>
                        <td>Достижение критической массы предприятий «маяков» – драйверов рынка (~20% пула предприятий
                            ГМК, НГС, машиностроения и др.), активно внедряющих новые технологии для приобретения
                            финансовых и операционных преимуществ.
                        </td>
                    </tr>
                    <tr>
                        <th>Контакты</th>
                        <td>
                            <table class="about-company__inner-table">
                                <tr>
                                    <th>Адрес:</th>
                                    <td>г. Алматы, пр. Жибек-Жолы, д. 135, 5 этаж</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>info@techgarden.kz</td>
                                </tr>
                                <tr>
                                    <th>Телефон:</th>
                                    <td>+7 (727) 355-70-40</td>
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

                <div class="about-company__grey-title">tech garden</div>

            </div>

            <div class="tabs-inner__section team">

                <h2 class="team__title heading-medium">
                    Наша команда
                </h2>

                <div class="swiper-container swiper-4-slides">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide team-card">
                            <img src="/img/techgarden1.png" alt="" class="team-card__img">
                            <h5 class="team-card__name">Сембин Аскар Болатович</h5>
                            <h5 class="team-card__job">Генеральный директор</h5>
                        </div>

                        <div class="swiper-slide team-card">
                            <img src="/img/techgarden2.png" alt="" class="team-card__img">
                            <h5 class="team-card__name">Альмухаметов Айбек Мейрамбекович</h5>
                            <h5 class="team-card__job">Заместитель генерального директора</h5>
                        </div>

                        <div class="swiper-slide team-card">
                            <img src="/img/techgarden3.png" alt="" class="team-card__img">
                            <h5 class="team-card__name">Омарбеков Толеген Базарович</h5>
                            <h5 class="team-card__job">Руководитель аппарата</h5>
                        </div>

                        <div class="swiper-slide team-card">
                            <img src="/img/techgarden4.png" alt="" class="team-card__img">
                            <h5 class="team-card__name">Сырлыбаева Бэла Рашидовна</h5>
                            <h5 class="team-card__job">Директор департамента стратегического планирования и анализа</h5>
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
