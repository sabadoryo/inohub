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
            <a href="/astana-hub/programs" class="tabs__link tabs__link--active">
                Заявки
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link">
                Уведомления
                <span class="tabs__badge as-badge">12</span>
            </a>
        </div>

        <div class="tabs-content tabs-inner">

            <div class="tabs-inner__section-filter section-filter">

                <div class="section-filter__title">6 заявок</div>

                <div class="section-filter__btn-group">
                    <button class="section-filter__btn button-back button-back--icon-right button-back--rotate button-back--white">
                        Все
                        <svg class="button-back__icon" width="18" height="18">
                            <use href="/img/icons.svg#toggle-2"></use>
                        </svg>
                    </button>

                    <button class="section-filter__btn button-back button-back--icon-right button-back--rotate button-back--white">
                        Статус
                        <svg class="button-back__icon" width="18" height="18">
                            <use href="/img/icons.svg#toggle-2"></use>
                        </svg>
                    </button>
                </div>

            </div>

            <div class="tabs-inner__section application-list">

                <div class="application-list__items">

                    <a href="#" class="application-list__item">

                        <div class="application-list__type">
                            Мероприятие
                        </div>

                        <div class="application-list__title">
                            Speaker Night
                        </div>

                        <div class="application-list__status">
                            На рассмотрении
                        </div>

                        <div class="application-list__date">
                            23 Окт.
                        </div>

                    </a>

                    <a href="#" class="application-list__item">

                        <div class="application-list__type">
                            Программа
                        </div>

                        <div class="application-list__title">
                            Конкурс на лучший проект «Moving» - сервисфывафыва
                        </div>

                        <div class="application-list__status application-list__status--success">
                            Подтвердили
                        </div>

                        <div class="application-list__date">
                            23 Окт.
                        </div>

                    </a>

                    <a href="#" class="application-list__item">

                        <div class="application-list__type">
                            Мероприятие
                        </div>

                        <div class="application-list__title">
                            Speaker Night
                        </div>

                        <div class="application-list__status application-list__status--danger">
                            Отказ
                        </div>

                        <div class="application-list__date">
                            23 Окт.
                        </div>

                    </a>

                    <a href="#" class="application-list__item">

                        <div class="application-list__type">
                            Мероприятие
                        </div>

                        <div class="application-list__title">
                            Speaker Night
                        </div>

                        <div class="application-list__status">
                            На рассмотрении
                        </div>

                        <div class="application-list__date">
                            23 Окт.
                        </div>

                    </a>

                </div>

            </div>
        </div>

    </div>


@endsection
