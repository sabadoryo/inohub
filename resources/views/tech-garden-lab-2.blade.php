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
            <a href="/astana-hub/programs" class="tabs__link tabs__link--active">
                Программы
            </a>
            <a href="/astana-hub/corporate-innovations" class="tabs__link">
                Smart Store
            </a>
            <a href="/astana-hub/hub-space" class="tabs__link">
                Технологические лаборатории
            </a>
            <a href="/astana-hub/r-and-d" class="tabs__link">
                База знаний
            </a>
        </div>

        <div class="tabs-content tabs-inner">

            <button class="tabs-inner__button-back button-back">
                <svg class="button-back__icon" width="24" height="24">
                    <use href="/img/icons.svg#chevron-left"></use>
                </svg>
                Назад
            </button>

            <div class="tabs-inner__section about-lab">

                <div class="about-lab__left">
                    <img src="/img/bim-sm-logo.png" alt="" class="about-lab__logo">

                    <div class="about-lab__name">
                        Лаборатория BIM+
                    </div>
                </div>

                <div class="about-lab__right">

                    <div class="about-lab__text">
                        Центр «Лаборатория BIM+» открыт в январе 2019 г. совместно с ТНК EcoDomus Inc (США) для
                        цифровизации полного жизненного цикла строительства объектов, в том числе промышленных, в целях
                        снижения эксплуатационных расходов.
                    </div>

                </div>

            </div>

            <div class="tabs-inner__section about-company">

                <table class="about-company__table">
                    <tr>
                        <th>Деятельность</th>
                        <td>Деятельность «Лаборатория BIM+» направлена на решение задач по внедрению технологии BIM
                            (Building Information Modeling) на этапе эксплуатации строительных объектов и применению
                            сопутствующих технологий «Интернет вещей» и «Big Data» в секторах гражданского и
                            промышленного строительства, для автоматизации технического обслуживания и эксплуатации
                            объектов, развития и применения концепции «Умных городов».
                        </td>
                    </tr>
                    <tr>
                        <th>Задача</th>
                        <td>Технология базируется на Концепции Digital Twin – создании Цифровых двойников, и направлена
                            на решение задач Индустрии 4.0.
                            <br>
                            <br>
                            Цифровые двойники на базе интерфейса, основанного на BIM-модели – это комплексное решение
                            взаимодействия людей, датчиков, оборудования и искусственного интеллекта для мониторинга
                            данных, регистрации информации и принятия своевременных решений при управлении строительным
                            объектом.
                        </td>
                    </tr>
                </table>

                <div class="about-company__grey-title">BIM +</div>

            </div>

            <div class="tabs-inner__section about-hub-space">

                <div class="about-hub-space__title">
                    Возможности лаборатории
                </div>

                <div class="about-hub-space__row">

                    <div class="about-hub-space__info">
                        <div class="about-hub-space__name">Лазерное 3D сканирование</div>
                        <p class="about-hub-space__text">
                            Метод съемки, который позволяет создавать цифровую модель окружающих объектов, которая
                            представлена в виде «3D облака точек» с координатами. На основе облака точек в последствии
                            создается BIM-модель.
                        </p>
                    </div>

                    <img src="/img/lab-opp-1.png" alt="" class="about-hub-space__img">
                </div>

                <div class="about-hub-space__row">
                    <img src="/img/lab-opp-2.png" alt="" class="about-hub-space__img">

                    <div class="about-hub-space__info">
                        <div class="about-hub-space__name">Создание модели BIM (Building Information Modeling)</div>
                        <p class="about-hub-space__text">
                            Создание трёхмерной модели объектов, связанных с базой данных , в которой каждому элементу
                            модели можно присвоить все необходимые атрибуты.
                        </p>
                    </div>
                </div>

                <div class="about-hub-space__row">
                    <div class="about-hub-space__info">
                        <div class="about-hub-space__name">Внедрение платформы Ecodomus для эксплуатации объектов</div>
                        <p class="about-hub-space__text">
                            Внедрение ПО на базе BIM-моделей, снижающего расходы на содержание объекта при обслуживании,
                            эксплуатации, а также позволяющее вести учет активов.
                        </p>
                    </div>

                    <img src="/img/lab-opp-3.png" alt="" class="about-hub-space__img">
                </div>

                <div class="about-hub-space__row">
                    <img src="/img/lab-opp-4.png" alt="" class="about-hub-space__img">

                    <div class="about-hub-space__info">
                        <div class="about-hub-space__name">Создание цифрового двойника</div>
                        <p class="about-hub-space__text">
                            Создание цифровой копии физического объекта или процесса, помогающая оптимизировать
                            эффективность технологического процесса.
                        </p>
                    </div>
                </div>
            </div>

            <div class="tabs-inner__section advantages">

                <h4 class="advantages__heading">Цели</h4>

                <div class="advantages__list advantages__list--black-line">

                    <div class="advantages__item">
                        Снижение эксплуатационных расходов
                        предприятия при внедрении платформы
                        Ecodomus
                    </div>

                    <div class="advantages__item">
                        Оптимизация режимов работы
                        объектов/предприятий и мониторинг
                        состояния оборудования за счет создания
                        цифрового двойника
                    </div>

                    <div class="advantages__item">
                        Точность учета активов здания
                    </div>

                    <div class="advantages__item">
                        Оптимизация использования пространства
                    </div>

                    <div class="advantages__item">
                        Использования VR технологий для симуляций
                        непредвиденных ситуаций и оперативного
                        реагирования
                    </div>

                    <div class="advantages__item">
                        Централизованный доступ ко всем данным
                        оборудования и других объектов
                    </div>

                    <div class="advantages__item">
                        Сокращение сроков создания BIM модели
                        за счет лазерного сканирования
                    </div>

                </div>

            </div>

            <div class="tabs-inner__section smart-store">


                <div class="smart-store__title">
                    Промышленные предприятия (задачи)
                </div>

                <div class="swiper-container swiper-2-slides">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide project-box">
                            <img src="/img/project-1.png" alt="" class="project-box__img">

                            <div class="project-box__info">
                                <div class="project-box__name">
                                    Здание EagleBank Arena в г. Фэрфакс, США
                                </div>

                                <div class="project-box__text">
                                    Лаборатория BIM+» совместно с ТНК EcoDomus Inc. (США) приняли участие в проекте по
                                    применению технологии BIM для обеспечения безопасности строительных объектов и
                                    автоматизации управления в случае чрезвычайных ситуаций.
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide project-box">
                            <img src="/img/project-2.png" alt="" class="project-box__img">

                            <div class="project-box__info">
                                <div class="project-box__name">
                                    Ледовый дворец «Барыс Арена»
                                </div>

                                <div class="project-box__text">
                                    По заказу акимата г. Нур-Султан и СПК «Астаны» на основе существующей проектной
                                    документации Центром «Лаборатория BIM+» создана BIM-модель для осуществления
                                    строительно-монтажных работ и/или капитального ремонта Ледового дворца «Барыс Арена»
                                    в городе Нур-Султан, содержащая данные по разделам «КР» - конструкции.
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide project-box">
                            <img src="/img/project-1.png" alt="" class="project-box__img">

                            <div class="project-box__info">
                                <div class="project-box__name">
                                    Здание EagleBank Arena в г. Фэрфакс, США
                                </div>

                                <div class="project-box__text">
                                    Лаборатория BIM+» совместно с ТНК EcoDomus Inc. (США) приняли участие в проекте по
                                    применению технологии BIM для обеспечения безопасности строительных объектов и
                                    автоматизации управления в случае чрезвычайных ситуаций.
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide project-box">
                            <img src="/img/project-2.png" alt="" class="project-box__img">

                            <div class="project-box__info">
                                <div class="project-box__name">
                                    Ледовый дворец «Барыс Арена»
                                </div>

                                <div class="project-box__text">
                                    По заказу акимата г. Нур-Султан и СПК «Астаны» на основе существующей проектной
                                    документации Центром «Лаборатория BIM+» создана BIM-модель для осуществления
                                    строительно-монтажных работ и/или капитального ремонта Ледового дворца «Барыс Арена»
                                    в городе Нур-Султан, содержащая данные по разделам «КР» - конструкции.
                                </div>
                            </div>
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

            <div class="tabs-inner__section tabled-info">

                <div class="tabled-info__heading">
                    Эффекты применения продуктов лаборатории
                </div>

                <div class="tabled-info__list">

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            30-50%
                        </div>

                        <div class="tabled-info__text">
                            сокращение сроков разработки ПСД
                        </div>
                    </div>

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            10-20%
                        </div>

                        <div class="tabled-info__text">
                            сокращение сроков строительства
                        </div>
                    </div>

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            20%
                        </div>

                        <div class="tabled-info__text">
                            сокращение сроков экспертизы ПСД
                        </div>
                    </div>

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            10-30%
                        </div>

                        <div class="tabled-info__text">
                            сокращение затрат на эксплуатацию
                        </div>
                    </div>

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            30%
                        </div>

                        <div class="tabled-info__text">
                            сокращение затрат на строительство
                        </div>
                    </div>

                    <div class="tabled-info__item">
                        <div class="tabled-info__accent">
                            5%
                        </div>

                        <div class="tabled-info__text">
                            экономия на ремонте
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabs-inner__section partners">

                <div class="partners__heading">
                    Партнеры
                </div>

                <div class="partners__list">
                    <img src="/img/partner-1.png" alt="" class="partners__item">
                    <img src="/img/partner-2.png" alt="" class="partners__item">
                </div>
            </div>

            <div class="tabs-inner__section team-2">

                <div class="team-2__heading">
                    Наша команда
                </div>

                <div class="team-2__list">

                    <div class="team-2__card team-2-card">

                        <img src="/img/team-2.png" alt="" class="team-2-card__img">

                        <div class="team-2-card__name">
                            Переплетов Михаил
                        </div>

                        <div class="team-2-card__text">
                            Руководитель проектов цифрового строительства АКФ «ПИТ»
                        </div>

                        <div class="team-2-card__details">
                            +7 (777) 677-17-67 <br>
                            m.perepletov@techgarden.kz
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
