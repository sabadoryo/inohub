@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/cett-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">АО ЦИТТ</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link">
                О нас
            </a>
            <a href="/astana-hub/programs" class="tabs__link tabs__link--active">
                Гранты
            </a>
        </div>

        <div class="tabs__content tabs-inner">
            <div class="tabs-inner__section grants">

                <div class="grants__list">

                    <div class="grants__card grant-card">
                        <div class="grant-card__title">Предоставление инновационных грантов на</div>
                        <div class="grant-card__heading">
                            Коммерциализацию технологий
                        </div>
                        <button class="grant-card__btn button button--w100">Подать заявку</button>
                    </div>

                    <div class="grants__card grant-card">
                        <div class="grant-card__title">Предоставление инновационных грантов на</div>
                        <div class="grant-card__heading">
                            Технологическое развитие предприятий
                        </div>
                        <button class="grant-card__btn button button--w100">Подать заявку</button>
                    </div>

                    <div class="grants__card grant-card">
                        <div class="grant-card__title">Предоставление инновационных грантов на</div>
                        <div class="grant-card__heading">
                            Технологическое развитие отраслей

                        </div>
                        <button class="grant-card__btn button button--w100">Подать заявку</button>
                    </div>
                </div>

            </div>
        </div>



    </div>

@endsection
