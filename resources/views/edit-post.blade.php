@extends('main.layout')

@section('content')

    <div class="content__row content__row--flex-start">
        <button class="content__button-back button-back">
            <svg class="button-back__icon" width="24" height="24">
                <use href="/img/icons.svg#chevron-left"></use>
            </svg>
            Назад
        </button>

        <button class="button button--xs">
            Опубликовать
        </button>
    </div>

    <div class="content__edit edit-post">

        <div class="edit-post__details">
            <div class="edit-post__user-box">
                <img src="/img/user-avatar.png" alt="" class="edit-post__user-img">
                <div class="edit-post__user-name">
                    Олжас Аскаров
                </div>
            </div>

            <div class="edit-post__date">
                26 октября 2020 г.
            </div>
        </div>

        <input class="edit-post__title-input" placeholder="Заголовок">

        <div class="edit-post__title">
            Astana Hub приглашает Стартапы и IT-компании СНГ
        </div>

        <img src="/img/edit-post-img.png" alt="" class="edit-post__img">

        <div class="edit-post__dropdown-box">

            <button class="edit-post__toggle-btn button-back button-back--grey button-back--icon-right button-back--rotate45">
                Добавить
                <svg class="button-back__icon" width="20" height="20">
                    <use href="/img/icons.svg#plus-black"></use>
                </svg>
            </button>

            <div class="edit-post__dropdown edit-post__dropdown--show">

                <a href="#" class="edit-post__dropdown-item">
                    <svg width="24" height="24" class="edit-post__dropdown-icon">
                        <use href="/img/icons.svg#format-text"></use>
                    </svg>
                    Добавить текст
                </a>

                <a href="#" class="edit-post__dropdown-item">
                    <svg width="24" height="24" class="edit-post__dropdown-icon">
                        <use href="/img/icons.svg#format-img"></use>
                    </svg>
                    Добавить изображение
                </a>

            </div>

        </div>

    </div>

@endsection
