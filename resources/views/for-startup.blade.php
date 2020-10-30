@extends('main.layout')

@section('content')

    <button class="content__button-back button-back">
        <svg class="button-back__icon" width="24" height="24">
            <use href="/img/icons.svg#chevron-left"></use>
        </svg>
        Назад
    </button>

    <div class="content__info info-section">

        <div class="info-section__heading">
            Для стартапов
        </div>

        <div class="info-section__list">

            <div class="info-section__block">

                <div class="info-section__title">
                    Программы от Astana Hub
                </div>

                <div class="info-section__items">
                    <a href="#" class="info-section__link">Рейтинг стартапов</a>
                    <a href="#" class="info-section__link">Incubation program</a>
                    <a href="#" class="info-section__link">Accelerator 9.0</a>
                    <a href="#" class="info-section__link">Корпоративные инновации</a>
                </div>
            </div>

            <div class="info-section__block">

                <div class="info-section__title">
                    Программы от Tech Garden
                </div>

                <div class="info-section__items">
                    <a href="#" class="info-section__link">Корпоративная акселерация</a>
                    <a href="#" class="info-section__link">Финансирование проектов за счет 1% СГД (ЗНД)</a>
                    <a href="#" class="info-section__link">Центр интеллектуальных систем</a>
                </div>
            </div>

            <div class="info-section__block">

                <div class="info-section__title">
                    Гранты от АО “ЦИТТ”
                </div>

                <div class="info-section__items">
                    <a href="#" class="info-section__link">Коммерциализацию технологий</a>
                    <a href="#" class="info-section__link">Технологическое развитие предприятий</a>
                </div>
            </div>
        </div>

    </div>

@endsection
