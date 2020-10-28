@extends('main.layout')

@section('content')

    <div class="content__welcome-section profile-welcome-section">

        <a href="#" class="profile-welcome-section__img-box">
            <img src="/img/user-avatar.png" alt="" class="profile-welcome-section__img">
        </a>

        <div class="profile-welcome-section__text">
            <div class="profile-welcome-section__name">Олжас Аскаров</div>
            <div class="profile-welcome-section__username">@olzh01</div>
        </div>

        <div class="profile-welcome-section__circles"></div>
    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link">
                Профиль
            </a>
            <a href="/astana-hub/programs" class="tabs__link">
                Заявки
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link tabs__link--active">
                Уведомления
                <span class="tabs__badge as-badge">12</span>
            </a>
        </div>

        <div class="tabs-content tabs-inner">

            <div class="tabs-inner__section notifications-section">

                <div class="notifications-section__list">

                    <a href="#" class="notifications-section__item notifications-section__item--notify">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                             23 Окт.
                        </div>
                    </a>

                    <a href="#" class="notifications-section__item">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                            23 Окт.
                        </div>
                    </a>

                    <a href="#" class="notifications-section__item">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                            23 Окт.
                        </div>
                    </a>

                    <a href="#" class="notifications-section__item">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                            23 Окт.
                        </div>
                    </a>

                    <a href="#" class="notifications-section__item">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                            23 Окт.
                        </div>
                    </a>

                    <a href="#" class="notifications-section__item">
                        <div class="notifications-section__title">
                            Astana hub
                        </div>

                        <div class="notifications-section__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </div>

                        <div class="notifications-section__date">
                            23 Окт.
                        </div>
                    </a>
                </div>
            </div>


        </div>

    </div>


@endsection
