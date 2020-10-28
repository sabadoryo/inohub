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

                <div class="application-section__header">
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

                    <button class="application-section__toggle-btn button-back button-back--grey">
                        <svg class="button-back__icon" width="18" height="18">
                            <use href="/img/icons.svg#toggle-2"></use>
                        </svg>
                        Скрыть
                    </button>
                </div>

                <div class="application-section__body">

                    <div class="application-section__block application-block">

                        <div class="application-block__row">
                            <div class="application-block__heading">Личные данные</div>

                            <div class="application-block__link-box">
                                <a href="#" class="application-block__link">Отменить</a>
                            </div>
                        </div>

                        <div class="application-block__input-list">

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">ФИО</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Олжас Аскаров Сапарулы">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Телефон</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="+7 777 838 99 90">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">E-mail</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="olzhas01@gmail.com">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Аккаунт telegram</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="olzhas01@gmail.com">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Страна</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Казахстан">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Город</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Астана">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Владение языками</label>

                                <div class="input-box__container">
                                    <select class="input-box__input">
                                        <option value="1">Казахский</option>
                                        <option value="1">Казахский</option>
                                        <option value="1">Казахский</option>
                                        <option value="1">Казахский</option>
                                    </select>

                                    <svg class="input-box__select-icon" width="24" height="24">
                                        <use href="img/icons.svg#chevron-down"></use>
                                    </svg>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="application-section__block application-block">

                        <div class="application-block__row">
                            <div class="application-block__heading">Описание проекта</div>
                        </div>

                        <div class="application-block__input-list">

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Название проекта</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Salakz">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Отрасль деятельности ИКТ-компании</label>
                                <div class="input-box__container">
                                    <select class="input-box__input">
                                        <option value="1">Информационные технологии</option>
                                        <option value="1">Информационные технологии</option>
                                        <option value="1">Информационные технологии</option>
                                        <option value="1">Информационные технологии</option>
                                    </select>

                                    <svg class="input-box__select-icon" width="24" height="24">
                                        <use href="img/icons.svg#chevron-down"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Основатель проекта</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Олжас Аскаров">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Год основания</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="2018">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Стадия развития</label>
                                <div class="input-box__container">
                                    <select class="input-box__input">
                                        <option value="1">MCI</option>
                                        <option value="1">MCI</option>
                                        <option value="1">MCI</option>
                                        <option value="1">MCI</option>
                                    </select>

                                    <svg class="input-box__select-icon" width="24" height="24">
                                        <use href="img/icons.svg#chevron-down"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Сфера применения/технология</label>
                                <div class="input-box__container">
                                    <select class="input-box__input">
                                        <option value="1">AI</option>
                                        <option value="1">AI</option>
                                        <option value="1">AI</option>
                                        <option value="1">AI</option>
                                    </select>

                                    <svg class="input-box__select-icon" width="24" height="24">
                                        <use href="img/icons.svg#chevron-down"></use>
                                    </svg>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="application-section__block application-block">

                        <div class="application-block__row">
                            <div class="application-block__heading">Вопросы</div>
                        </div>

                        <div class="application-block__input-list">

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Какой стартовый капитал проекта?</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="$ 10 000">
                                </div>
                            </div>

                            <div class="application-block__input-box input-box input-box--span2">
                                <label class="input-box__label">Краткое описание проекта. В чем заключается
                                    идея? </label>
                                <textarea class="input-box__textarea">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Какие воркшопы могут быть полезны в создании Вашего
                                    MVP? </label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Lorem ipsum dolor sit amet"
                                    >
                                </div>
                            </div>

                            <div class="modal-full__input-box input-box">
                                <label class="input-box__label">Привлекали ли вы инвестиции?</label>

                                <div class="input-box__radio-group">
                                    <label class="input-box__radio-box custom-radio-box">
                                        <input type="radio" name="investment" class="custom-radio-box__radio">
                                        <span class="custom-radio-box__checkmark"></span>
                                        Да
                                    </label>

                                    <label class="input-box__radio-box custom-radio-box">
                                        <input type="radio" name="investment" class="custom-radio-box__radio">
                                        <span class="custom-radio-box__checkmark"></span>
                                        Нет
                                    </label>
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Какую проблему вы решаете?</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="Lorem ipsum dolor sit amet"
                                    >
                                </div>
                            </div>

                            <div class="application-block__input-box input-box">
                                <label class="input-box__label">Если привлекали инвестиции, то в каком размере и на
                                    каких условиях?</label>
                                <div class="input-box__container">
                                    <input type="text" class="input-box__input" value="В размере 20.000.000 тенге"
                                    >
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <button class="application-section__btn button button--extra-lg">Изменить</button>


            </div>
        </div>

    </div>


@endsection
