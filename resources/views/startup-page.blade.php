@extends('main.layout')

@section('content')

    <div class="content__welcome-section startup-welcome-section">

        <div class="startup-welcome-section__info">
            <div class="startup-welcome-section__title">
                Компании
                <img src="/img/icons/satellite-colored.svg" alt="" class="startup-welcome-section__icon">
            </div>

            <div class="startup-welcome-section__subtitle">
                Если Вы хотите чтобы о вашем проекте узнали <br>
                наши пользователи, заполните анкету проекта!
            </div>

            <button class="startup-welcome-section__btn button button--lg">Заполнить</button>
        </div>

        <img src="/img/startup-poster-img.svg" alt="" class="startup-welcome-section__img">

    </div>


    <div class="content__companies companies">

        <div class="companies__title">Компании</div>

        <div class="companies__list">

            <div class="companies__item smart-box smart-box--company">
                <a href="#" class="smart-box__website-link">
                    pc4u.kz
                </a>

                <div class="smart-box__body">
                    <img src="/img/pc4u-logo.png" alt="" class="smart-box__logo">

                    <div class="smart-box__title">
                        PC4U
                    </div>

                    <div class="smart-box__text">
                        Казахстанская компания, которая разработала первый отечественный сертифицированный продукт СОРМ
                    </div>
                </div>

            </div>

            <div class="companies__item smart-box smart-box--company">
                <a href="#" class="smart-box__website-link">
                    shift-systems.kz
                </a>

                <div class="smart-box__body">
                    <img src="/img/shift-system-logo.png" alt="" class="smart-box__logo">

                    <div class="smart-box__title">
                        Shift Systems
                    </div>

                    <div class="smart-box__text">
                        Персональный компьютер PC4U предназначен для работы во многих сферах деятельности, начиная от
                        домашнего использования и заканчивая применением в промышленных задачах
                    </div>
                </div>

            </div>

            <div class="companies__item smart-box smart-box--company">
                <a href="#" class="smart-box__website-link">
                    ticketon.kz
                </a>

                <div class="smart-box__body">
                    <img src="/img/ticketon-logo.png" alt="" class="smart-box__logo">

                    <div class="smart-box__title">
                        Ticketon Events
                    </div>

                    <div class="smart-box__text">
                        Ticketon.kz – крупнейший в Казахстане сервис онлайн-продажи билетов на культурные и спортивные
                        мероприятия
                    </div>
                </div>

            </div>

            <div class="companies__item smart-box smart-box--company">
                <a href="#" class="smart-box__website-link">
                    avsoft.kz
                </a>

                <div class="smart-box__body">
                    <img src="/img/av-logo.png" alt="" class="smart-box__logo">

                    <div class="smart-box__title">
                        AV-Software
                    </div>

                    <div class="smart-box__text">
                        Комплексные решения по разработке, модернизации и обслуживанию IT-структур, слаженных систем и
                        решений для вашего бизнеса.
                    </div>
                </div>

            </div>
        </div>

    </div>






@endsection
