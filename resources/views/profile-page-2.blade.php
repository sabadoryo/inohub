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
            <a href="/astana-hub/about" class="tabs__link tabs__link--active">
                Профиль
            </a>
            <a href="/astana-hub/programs" class="tabs__link">
                Заявки
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link">
                Уведомления
                <span class="tabs__badge as-badge">12</span>
            </a>
        </div>

        <div class="tabs-content tabs-inner">

            <div class="tabs-inner__section personal-data">

                <div class="personal-data__row">
                    <div class="personal-data__title">
                        Личные данные
                    </div>

                    <div class="personal-data__link-box">
                        <svg class="personal-data__edit-icon" width="24" height="24">
                            <use href="/img/icons.svg#edit-colored"></use>
                        </svg>

                        <a href="#" class="personal-data__link">Редактировать</a>
                    </div>
                </div>

                <div class="personal-data__section personal-data__section--bordered">
                    <div class="personal-data__input-list">

                        <div class="modal-full__input-box input-box">
                            <label class="input-box__label">ФИО</label>
                            <div class="input-box__container">
                                <input type="text" class="input-box__input" value="Олжас Аскаров Сапарулы">

                                <svg class="input-box__edit" width="24" height="24">
                                    <use href="/img/icons.svg#pencil"></use>
                                </svg>
                            </div>
                        </div>


                        <div class="modal-full__input-box input-box">
                            <label class="input-box__label">Номер телефона</label>
                            <div class="input-box__container">
                                <input type="text" class="input-box__input" value="+7 777 838 99 90">
                                <svg class="input-box__edit" width="24" height="24">
                                    <use href="/img/icons.svg#pencil"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="modal-full__input-box input-box">
                            <label class="input-box__label">E-mail</label>
                            <div class="input-box__container">
                                <input type="text" class="input-box__input" value="olzhas01@gmail.com">
                                <svg class="input-box__edit" width="24" height="24">
                                    <use href="/img/icons.svg#pencil"></use>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="personal-data__section">
                    <div class="personal-data__input-list">

                        <div class="modal-full__input-box input-box">
                            <label class="input-box__label">Пароль</label>
                            <div class="input-box__container">
                                <input type="password" class="input-box__input" value="12345678">
                                <svg class="input-box__edit" width="24" height="24">
                                    <use href="/img/icons.svg#pass-eye"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="modal-full__input-box input-box">
                            <label class="input-box__label">Повторите пароль</label>
                            <div class="input-box__container">
                                <input type="password" class="input-box__input">
                                <svg class="input-box__edit" width="24" height="24">
                                    <use href="/img/icons.svg#pass-eye"></use>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

                <button class="personal-data__button button button--extra-lg">Изменить</button>

            </div>
        </div>

    </div>


@endsection
