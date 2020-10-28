@extends('main.layout')

@section('content')

    <button class="content__button-back button-back">
        <svg class="button-back__icon" width="24" height="24">
            <use href="/img/icons.svg#chevron-left"></use>
        </svg>
        Назад
    </button>

    <div class="content__news-more news-more">

        <div class="news-more__details">
            <div class="news-more__detail">
                <svg width="18" height="18" class="news-more__detail-icon">
                    <use xlink:href="/img/icons.svg#chat"></use>
                </svg>
                43
            </div>

            <div class="news-more__detail">
                <svg width="20" height="14" class="news-more__detail-icon">
                    <use xlink:href="/img/icons.svg#eye"></use>
                </svg>
                405
            </div>
        </div>

        <div class="news-more__row">
            <div class="news-more__tag">
                <img src="/img/icons/astana-hub-icon-xs.png" alt="" class="news-more__tag-icon">
                Astana Hub
            </div>

            <div class="news-more__date">
                26 октября 2020 г.
            </div>
        </div>

        <div class="news-more__heading">
            Десять лучших IT-стартапов определят в Казахстане
        </div>

        <div class="news-more__section">
            <div class="news-more__text">
                Рейтинг лучших IT-стартапов – ежегодный общенациональный список лучших казахстанских IT-стартапов,
                разрабатывающих инновационные и технологические продукты и услуги и решающих важные проблемные вопросы
                на
                рынке.
            </div>

            <div class="news-more__text">
                Рейтинг позволит определить успешных игроков среди отечественных IT-стартапов на рынке, стимулировать
                развитие IT-предпринимательства и обозначить вектор развития инноваций в Казахстане.
            </div>
        </div>

        <div class="news-more__section">
            <img src="/img/news-poster.png" alt="" class="news-more__img">
        </div>

        <div class="news-more__section">
            <div class="news-more__text">
                Звание лучших стартапов получат проекты, набравшие наибольшее количество баллов при оценке членов жюри –
                известных IT-предпринимателей, венчурных инвесторов и бизнес-ангелов.
            </div>

            <div class="news-more__text">
                Стартапы, вошедшие в рейтинг, получат возможность рассказать о своем проекте всему Казахстану и за его
                пределами, стать участником Astana Hub и пользоваться налоговыми преференциями, получить доступ к 100 и
                более инвесторам. Топ-10 стартапов получат индивидуальное менторство с рекомендациями по привлечению
                инвестиций от Seedstars Kazakhstan, а также селективное приглашение на инвестиционный день.
            </div>
        </div>

        <div class="news-more__section">
            <div class="news-more__title">
                Кроме того, ТОП-3 стартапа получат специальные подарки от партнеров и организаторов:
            </div>

            <ul class="news-more__list">
                <li class="news-more__list-item">
                    1. Офис в Astana Hub Space на 6 месяцев, обзорный ролик для стартапа;
                </li>
                <li class="news-more__list-item">
                    2. Участие в программе Investment Readiness Accelerator от
                    Бизнес-инкубатора MOST, обзорный ролик для стартапа;
                </li>
                <li class="news-more__list-item">
                    3. Ноутбук от Tech Garden Ventures, обзорный ролик для стартапа.
                </li>
            </ul>
        </div>

        <div class="news-more__section">
            <div class="news-more__text">
                Среди партнеров проекта такие компании, как Tech Garden, UVCA, Seedstars Kazakhstan, Centras, AIFC Fintech,
                Бизнес-инкубатор MOST, Central Asian Angel Investors Club.
            </div>
        </div>

        <div class="news-more__section">
            <div class="news-more__title">
                Критерии для участников следующие:
            </div>

            <ul class="news-more__list">
                <li class="news-more__list-item">
                    Продукт должен иметь технологическое решение (ограничений по сфере деятельности нет);
                </li>
                <li class="news-more__list-item">
                    Иметь MVP или MVO продукт;
                </li>
                <li class="news-more__list-item">
                    Быть масштабируемым;
                </li>
                <li class="news-more__list-item">
                    Компания должна быть зарегистрирована в Казахстане.
                </li>
            </ul>

        </div>

        <div class="news-more__section">
            <div class="news-more__title">
                Для участия в Рейтинге IT-стартапы должны подать заявку на официальном сайте до 15 ноября 2020 года. Подробнее можно узнать
                <span class="news-more__link">по ссылке</span>
            </div>
        </div>

    </div>

@endsection
