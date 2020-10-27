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

            <button class="tabs-inner__button-back button-back">

            </button>

            <div class="tabs-inner__section application-section">
                <div class="application-section__type">Программа</div>
                <div class="application-section__title">Regional Incubation</div>
            </div>
        </div>

    </div>


@endsection
