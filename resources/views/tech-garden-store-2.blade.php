@extends('main.layout')

@section('content')

    <div class="content__welcome-section welcome-section">

        <img src="/img/tech-garden-poster.png" alt="" class="welcome-section__poster">

        <div class="welcome-section__title">Tech Garden</div>

    </div>

    <div class="content__tabs tabs">

        <div class="tabs__links">
            <a href="/astana-hub/about" class="tabs__link">
                О нас
            </a>
            <a href="/astana-hub/programs" class="tabs__link">
                Программы
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link tabs__link--active">
                Smart Store
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link">
                Технологические лаборатории
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link">
                База знаний
            </a>
        </div>

        <div class="tabs__content tabs-inner">

            <div class="tabs-inner__section about-simp">
                <div class="about-simp__row">
                    <div class="about-simp__heading">
                        Smart Industry Management <br>
                        Platform
                    </div>

                    <div class="about-simp__info">
                        <div class="about-simp__text">
                            Платформа-супермаркет отечественных IT-решений на которой собирается пул качественных
                            IT-решений, а промышленные предприятия размещают свои реальные задачи.
                        </div>

                        <div class="about-simp__text">
                            Принцип работы платформы - «открытые инновации». Промышленные предприятия быстро находят
                            самые эффективные решения для своих задач силами отечественных IT-компаний, включая Центры
                            технологического развития, созданные Tech Garden.
                        </div>
                    </div>
                </div>

                <div class="about-simp__grey-text">SIMP</div>
            </div>

            <div class="tabs-inner__section about-company">
                <div class="about-company__title">
                    Возможности для промышленных предприятий
                </div>

                <table class="about-company__table">
                    <tr>
                        <th>Повышение эффективности</th>
                        <td>Tech Garden знакомит представителей промышленности с лучшими мировыми практиками для
                            построения эффективной стратегии цифровизации.
                        </td>
                    </tr>
                    <tr>
                        <th>Качественные отечественные решения</th>
                        <td>Мы предоставляем доступ к множеству уже проверенных решений, из которых можно выбрать
                            лучшее.
                        </td>
                    </tr>
                    <tr>
                        <th>Прозрачные данные</th>
                        <td>Вы сможете в режиме реального времени получить всю необходимую информацию об интересующем
                            Вам проекте.
                        </td>
                    </tr>
                </table>

            </div>

            <div class="tabs-inner__section about-company">
                <div class="about-company__title">
                    Возможности для ИТ-компании
                </div>

                <table class="about-company__table">
                    <tr>
                        <th>Заключение контракта с промышленностью</th>
                        <td>Участие в данном проекте даст Вам возможность первыми получать информацию о задачах и
                            потребностях промышленных предприятий.
                        </td>
                    </tr>
                    <tr>
                        <th>Доступ к промышленным предприятиям</th>
                        <td>Цель платформы предоставить промышленным предприятиям доступ к информации о Ваших решениях.
                        </td>
                    </tr>
                    <tr>
                        <th>Популяризация Вашей компании</th>
                        <td>В рамках деятельности платформы мы будем публиковать информацию в СМИ о лучших проектах и
                            компаниях.
                        </td>
                    </tr>
                </table>

            </div>

            <div class="tabs-inner__section timeline-section timeline-section--sm timeline-section--white">

                <div class="timeline-section__title heading-medium">
                    Как это работает
                </div>

                <div class="timeline-section__timeline as-timeline as-timeline--sm">

                    <div class="as-timeline__block">
                        <div class="as-timeline__block-number">
                            01
                        </div>

                        <div class="as-timeline__block-title">
                            Готовые решения
                        </div>

                        <div class="as-timeline__block-subtitle">
                            Промышленное предприятие осознает необходимость в автоматизации своих бизнес-процессов.
                            Ответственное лицо переходит на Smart Industry Management Platform, где может с помощью
                            удобного фильтра подобрать уже готовое решение из предложенных на платформе.
                        </div>
                    </div>

                    <div class="as-timeline__block">
                        <div class="as-timeline__block-number">
                            02
                        </div>

                        <div class="as-timeline__block-title">
                            Формирование задачи
                        </div>

                        <div class="as-timeline__block-subtitle">
                            Представитель предприятия формирует техническое задание, которое прорабатывается вместе с
                            представителями Tech Garden. Техническое задание размещается в открытом доступе на Smart
                            Industry Management Platform.
                        </div>
                    </div>

                    <div class="as-timeline__block">
                        <div class="as-timeline__block-number">
                            03
                        </div>

                        <div class="as-timeline__block-title">
                            Подбор решения
                        </div>

                        <div class="as-timeline__block-subtitle">
                            Платформа автоматически оповещает участников об открытой позиции. Решатель подготавливает
                            презентацию и направляет ее на рассмотрение в независимую комиссию. Комиссия оценивает
                            проект и перенаправляет его непосредственно недропользователю.
                        </div>
                    </div>

                    <div class="as-timeline__block">
                        <div class="as-timeline__block-number">
                            04
                        </div>

                        <div class="as-timeline__block-title">
                            Заключение договора
                        </div>

                        <div class="as-timeline__block-subtitle">
                            После проведения анализа на соответствие решения поставленной задачи недропользователь
                            заключает договор с поставщиком услуги.
                        </div>
                    </div>

                </div>

            </div>

            <div class="tabs-inner__section fluid-block">

                <div class="fluid-block__title">
                    Опыт локализации и внедрения технологий.
                </div>

                <div class="fluid-block__subtitle">
                    На сегодняшний день компания Tech Garden реализовала <br>
                    более 40 проектов по внедрению элементов Индустрии 4.0
                </div>

            </div>

            <div class="tabs-inner__section text-cards">

                <div class="text-cards__card text-card">

                    <div class="text-card__title">
                        Задачи промышленных
                        предприятий
                    </div>

                    <div class="text-card__text">
                        Компания Tech Garden является оператором по реализации НИОКР для недропользователей в рамках их
                        обязательств по отчислению 1% СГД/ЗНД и за последние 5 лет реализовала 120 проектов, из которых
                        30% по внедрению элементов Индустрии 4.0.
                    </div>

                    <div class="text-card__text">
                        Одним из наших партнеров по внедрению искусственного интеллекта является лидирующее предприятие
                        в Индустрии 4.0 АО «АК Алтыналмас». Золотодобывающая компания реализует проект «Цифровой рудник»
                        с целью увеличения операционной эффективности до 15% и выстраивания оперативной аналитики,
                        позволяющей быстро находить причины отклонений и отслеживать как происходит их устранение, а так
                        же использовать предиктивный анализ на основе технологий искусственного интеллекта для
                        оптимизации процессов.
                    </div>
                </div>

                <div class="text-cards__card text-card">

                    <div class="text-card__title">
                        ИТ-решения для промышленных предприятий
                    </div>

                    <div class="text-card__text">
                        На протяжении нескольких лет мы успешно локализуем и внедряем передовые IT технологии в
                        промышленность, такие как предиктивный анализ производственных процессов на основе
                        искусственного интеллекта, а также BIM (Building Information Modeling) технологий на стадиях
                        проектирования и эксплуатации промышленных объектов.
                    </div>
                </div>

            </div>

            <div class="tabs-inner__section faq">

                <div class="faq__list">

                    <div class="faq__item">

                        <svg class="faq__close-icon" width="18" height="18">
                            <use xlink:href="img/icons.svg#red-plus"></use>
                        </svg>

                        <div class="faq__title">Как ИТ-компании стать участником платформы?</div>



                    </div>

                    <div class="faq__item">

                        <svg class="faq__close-icon faq__close-icon--active" width="18" height="18">
                            <use xlink:href="img/icons.svg#red-plus"></use>
                        </svg>

                        <div class="faq__title">
                            Какие условия участия для ИТ-компании? Нужен ли договор на участие?
                        </div>

                        <p class="faq__text">
                            Для того, чтобы информация о вашей компании была опубликована на платформе не требуется
                            заключать договор. Необходимо предоставить подробную информацию о вашей компании/решении,
                            подав заявку на участие <a href="#" class="faq__link">https://simp.techgarden.kz/</a> и
                            заполнить все поля.
                        </p>

                    </div>

                    <div class="faq__item">

                        <svg class="faq__close-icon" width="18" height="18">
                            <use xlink:href="img/icons.svg#red-plus"></use>
                        </svg>

                        <div class="faq__title">Нужно ли иметь какое-то портфолио выполненных проектов?</div>


                    </div>

                </div>

            </div>

        </div>

    </div>




@endsection
