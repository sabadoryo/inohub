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
            <a href="/astana-hub/corporate-innovations" class="tabs__link">
                Smart Store
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link">
                Технологические лаборатории
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link tabs__link--active">
                База знаний
            </a>
        </div>

        <div class="tabs__content">

            <div class="tabs__inner__section resources">

                <h4 class="resources__heading">База знаний</h4>

                <div class="resources__list">

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Опыт внедрения цифровых технологий на предприятии ТОО...
                        </div>

                    </div>

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay-2.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Цифровые технологии для нефтегазового сектора
                        </div>

                    </div>

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay-3.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Новые материалы и аддитивные технологии
                        </div>

                    </div>

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Эффективное производство 4.0
                        </div>

                    </div>

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Применение цифровых двойников в промышленности
                        </div>

                    </div>

                    <div class="resources__item video-box">

                        <div class="video-box__player">

                            <iframe width="304" height="186"
                                    class="video-box__video"
                                    src="https://www.youtube.com/embed/y0-mD3iEE48?start=61" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <div class="video-box__overlay">

                                <img src="/img/video-overlay.png" alt="" class="video-box__img">

                                <svg class="video-box__icon" width="40" height="40">
                                    <use href="/img/icons.svg#play-icon-red"></use>
                                </svg>

                                <div class="video-box__time">51:15</div>
                            </div>

                        </div>

                        <div class="video-box__name">
                            Опыт цифровизации крупнейшей казахстанской золотодобываю...
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
