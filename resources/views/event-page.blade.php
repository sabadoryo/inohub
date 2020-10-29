@extends('main.layout')

@section('content')

    <div class="content__welcome-section event-welcome-section">

        <div class="event-welcome-section__img-box">
            <img src="/img/kek.jpg" alt="" class="event-welcome-section__img">
        </div>

        <img src="/img/astana-hub-tag-125x33.png" alt="" class="event-welcome-section__tag">

        <div class="event-welcome-section__date">26 октября</div>

        <div class="event-welcome-section__title">Speaker Night</div>

        <div class="event-welcome-section__subtitle">
            “Как презентовать стартап потенциальному <br>
            инвестору" с Александром Горным
        </div>

        <button class="event-welcome-section__button button button--lg">Записаться</button>
    </div>


    <div class="content__events events">

        <div class="events__title">Мероприятия на ближайшую неделю</div>

        <div class="events__list">

            <div class="events__card event-card">

                <div class="event-card__date">12 ноября</div>

                <div class="event-card__title">Level Up Yor StartUp</div>

                <div class="event-card__subtitle">
                    “Разбери свой стартап с профессионалами” с Маратом Толибаевым!
                </div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/astana-hub-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

            <div class="events__card event-card">

                <div class="event-card__date">17 ноября</div>

                <div class="event-card__title">Цифровые технологии для нефтегазового сектора</div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

            <div class="events__card event-card">

                <div class="event-card__date">19 ноября</div>

                <div class="event-card__title">Level Up Yor StartUp</div>

                <div class="event-card__subtitle">
                    Вебинар на тему: “Как делают бренды из IT проектов?" с Дианой Барлубаевой
                </div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/astana-hub-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

        </div>

    </div>

    <div class="content__events events">

        <div class="events__title">Мероприятия на ближайший месяц</div>

        <div class="events__list">

            <div class="events__card event-card">

                <div class="event-card__date">3 декабря</div>

                <div class="event-card__title">Вебинар на тему «Система управления рисками</div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

            <div class="events__card event-card">

                <div class="event-card__date">15 декабря</div>

                <div class="event-card__title">Fail Up Night</div>

                <div class="event-card__subtitle">
                    “Психология провала — почему не стоит бояться совершать ошибки?”
                </div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

            <div class="events__card event-card">

                <div class="event-card__date">22 декабря</div>

                <div class="event-card__title">Эффективное производство 4.0</div>

                <div class="event-card__img-box">
                    <img src="/img/lol.jpg" alt="" class="event-card__img">
                </div>

                <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                <button class="event-card__btn">
                    <svg width="24" height="24">
                        <use href="/img/icons.svg#arrow24x24"></use>
                    </svg>
                </button>

            </div>

        </div>

    </div>

    <div class="content__events events">

        <div class="events__title">Мероприятия на ближайший месяц</div>

        <div class="swiper-container swiper-3-slides">

            <div class="swiper-wrapper">

                <div class="swiper-slide event-card">

                    <div class="event-card__date">12 ноября</div>

                    <div class="event-card__title">Level Up Yor StartUp</div>

                    <div class="event-card__subtitle">
                        “Разбери свой стартап с профессионалами” с Маратом Толибаевым!
                    </div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/astana-hub-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

                <div class="swiper-slide event-card">

                    <div class="event-card__date">17 ноября</div>

                    <div class="event-card__title">Цифровые технологии для нефтегазового сектора</div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

                <div class="swiper-slide event-card">

                    <div class="event-card__date">19 ноября</div>

                    <div class="event-card__title">Level Up Yor StartUp</div>

                    <div class="event-card__subtitle">
                        Вебинар на тему: “Как делают бренды из IT проектов?" с Дианой Барлубаевой
                    </div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/astana-hub-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

                <div class="swiper-slide event-card">

                    <div class="event-card__date">3 декабря</div>

                    <div class="event-card__title">Вебинар на тему «Система управления рисками</div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

                <div class="swiper-slide event-card">

                    <div class="event-card__date">15 декабря</div>

                    <div class="event-card__title">Fail Up Night</div>

                    <div class="event-card__subtitle">
                        “Психология провала — почему не стоит бояться совершать ошибки?”
                    </div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

                <div class="swiper-slide event-card">

                    <div class="event-card__date">22 декабря</div>

                    <div class="event-card__title">Эффективное производство 4.0</div>

                    <div class="event-card__img-box">
                        <img src="/img/lol.jpg" alt="" class="event-card__img">
                    </div>

                    <img src="/img/tech-garden-tag.png" alt="" class="event-card__tag">

                    <button class="event-card__btn">
                        <svg width="24" height="24">
                            <use href="/img/icons.svg#arrow24x24"></use>
                        </svg>
                    </button>

                </div>

            </div>

            <!-- Add Arrows -->
            <div class="swiper-button-next smart-store__btn smart-store__btn--right">
                <svg width="13" height="13">
                    <use xlink:href="/img/icons.svg#chevron-right"></use>
                </svg>
            </div>

            <div class="swiper-button-prev smart-store__btn smart-store__btn--left">
                <svg width="13" height="13">
                    <use xlink:href="/img/icons.svg#chevron-right"></use>
                </svg>
            </div>

        </div>

    </div>



@endsection
