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
                <svg class="button-back__icon" width="24" height="24">
                    <use href="/img/icons.svg#chevron-left"></use>
                </svg>
                Назад
            </button>

            <div class="tabs-inner__section application-section">

                <div class="application-section__type">Программа</div>
                <div class="application-section__title">Regional Incubation</div>

                <div class="application-section__details">
                    <div class="application-section__status application-section__status--success">Статус: <span>Подтвердили</span>
                    </div>
                    <div class="application-section__date">
                        <svg class="application-section__date-icon" width="16" height="18">
                            <use href="/img/icons.svg#calendar-grey"></use>
                        </svg>
                        23.10.2020
                    </div>
                </div>

                <button class="application-section__toggle-btn button-back button-back--grey button-back--rotate">
                    <svg class="button-back__icon" width="18" height="18">
                        <use href="/img/icons.svg#toggle-2"></use>
                    </svg>
                    Показать
                </button>

            </div>

            <div class="tabs-inner__section chat-section">

                <div class="chat-section__messages">

                    <div class="chat-section__block message-block message-block--mine">

                        <div class="message-block__content">

                            <div class="message-block__name">Олжас Аскаров</div>

                            <div class="message-block__text message-block__text--bordered">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </div>

                            <div class="message-block__row">
                                <a href="#" class="message-block__file">
                                    <svg width="45" height="45">
                                        <use href="/img/icons.svg#pdf-icon"></use>
                                    </svg>
                                </a>

                                <div class="message-block__date">пт. 23 Октября - 12:31</div>
                            </div>

                        </div>

                        <img src="/img/user-avatar.png" alt="" class="message-block__person-img">

                    </div>

                    <div class="chat-section__block message-block">

                        <img src="/img/user-avatar.png" alt="" class="message-block__person-img">

                        <div class="message-block__content">

                            <div class="message-block__name">Асель Назымова</div>

                            <div class="message-block__text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </div>

                            <div class="message-block__row">
                                <div class="message-block__date">пт. 23 Октября - 12:31</div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="chat-section__message-area">

                    <textarea class="chat-section__message-input"></textarea>

                    <a href="#" class="chat-section__link-box">
                        <svg class="chat-section__link-icon" width="24" height="24">
                            <use href="/img/icons.svg#paper-clip"></use>
                        </svg>
                        Прикрепить файл
                    </a>

                </div>

                <button class="chat-section__btn button button--extra-lg">Отправить</button>

            </div>
        </div>

    </div>


@endsection
