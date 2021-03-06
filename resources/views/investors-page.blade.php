@extends('main.layout')

@section('content')

    <div class="content__welcome-section startup-welcome-section">

        <div class="startup-welcome-section__info">
            <div class="startup-welcome-section__title">
                Инвесторы 🤝
                <img src="/img/icons/satellite-colored.svg" alt="" class="startup-welcome-section__icon">
            </div>

            <div class="startup-welcome-section__subtitle">
                Если Вы хотите найти проекты для инвестиции, <br>
                заполните анкету инвестора!
            </div>

            <button class="startup-welcome-section__btn button button--lg">Заполнить</button>
        </div>

        <img src="/img/investors-poster-img.svg" alt="" class="startup-welcome-section__img">

    </div>


    <div class="content__investors investors">

        <div class="investors__title">Инвесторы</div>

        <div class="investors__list">

            <div class="investors__item person-card">

                <img src="/img/investor-1.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Марат Толибаев
                </div>

                <div class="person-card__desc">
                    директор инвестиционной компании "Activat", бизнесмен, участник Школы инвестора Astana Hub
                </div>

            </div>

            <div class="investors__item person-card">

                <img src="/img/investor-2.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Самат Даумов
                </div>

                <div class="person-card__desc">
                    бизнесмен, участник Школы инвестора Astana Hub
                </div>

            </div>

            <div class="investors__item person-card">

                <img src="/img/investor-3.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Рафаэль Жансултанов
                </div>

                <div class="person-card__desc">
                    аналитик, инвестор, участник Школы инвестора Astana Hub
                </div>

            </div>

            <div class="investors__item person-card">

                <img src="/img/investor-1.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Марат Толибаев
                </div>

                <div class="person-card__desc">
                    директор инвестиционной компании "Activat", бизнесмен, участник Школы инвестора Astana Hub
                </div>

            </div>

            <div class="investors__item person-card">

                <img src="/img/investor-2.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Самат Даумов
                </div>

                <div class="person-card__desc">
                    бизнесмен, участник Школы инвестора Astana Hub
                </div>

            </div>

            <div class="investors__item person-card">

                <img src="/img/investor-3.png" alt="" class="person-card__img">

                <div class="person-card__name">
                    Рафаэль Жансултанов
                </div>

                <div class="person-card__desc">
                    аналитик, инвестор, участник Школы инвестора Astana Hub
                </div>

            </div>

        </div>

    </div>

@endsection
