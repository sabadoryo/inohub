
// parameter: elemId is an id of html element that will hold the grapejs instance
const buildConstructor = elemId => {

    let editor = grapesjs.init({
        // Indicate where to init the editor. You can also pass an HTMLElement
        container: '#' + elemId,
        // Get the content for the canvas directly from the element
        // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
        fromElement: false,
        // Size of the editor
        height: '100vh',
        width: 'auto',
        // Disable the storage manager for the moment
        storageManager: false,
        canvas: {
            styles: ['/css/style.css']
        }
    });

    editor.addComponents(`
<!--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->

<!--        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
    `);

    editor.DomComponents.addType('submit-button-component', {
        // isComponent: el => el.tagName === 'BUTTON',
        model: {
            defaults: {
                attributes: {
                    class: 'dropping submit-button',
                    onclick: `(() => console.log('hello'))()`,
                    'ng-click': '$ctrl.testfunc()'
                },
                tagName: 'button',
                components: `
                    Отправить
                `,
                // components: model => {
                //     return `<p>Header test: ${model.get('type')}</p>`;
                // },
                // traits: [
                //     // Strings are automatically converted to text types
                //     // 'name', // Same as: { type: 'text', name: 'name' }
                //     {
                //         type: 'button',
                //         name: 'my-button-trait',
                //         text: 'Click me',
                //         label: 'My trait',
                //         command: editor => alert('Hello submit button'),
                //     }
                // ],
                style: {
                    'background-color': 'blue',
                    color: 'white',
                    border: '1px solid grey',
                    'height': '50px',
                    'width': '100px',

                }
                // As by default, traits are binded to attributes, so to define
                // their initial value we can use attributes
                // attributes: { type: 'text', required: true },
            },
        },
    });

    editor.DomComponents.addType('droppable-container-component', {
        // isComponent: el => el.tagName === 'DIV',
        model: {
            defaults: {
                droppable: '.dropping',
                components: `
                `,
                attributes: {
                    class: 'container dropping'
                },
                tagName: 'div',
                style: {
                    // border: '1px solid red',
                    'min-height': '80vh'
                }
            }
        }
    });
    editor.DomComponents.addType('droppable-card-deck-component', {
        // isComponent: el => el.tagName === 'DIV',
        model: {
            defaults: {
                droppable: '.dropping',
                attributes: {
                    class: 'card-deck dropping'
                },
                tagName: 'div',
                style: {
                    // border: '1px solid green',
                    'min-height': '300px'
                }
            }
        }
    });
    editor.DomComponents.addType('droppable-card-component', {
        // isComponent: el => el.tagName === 'DIV',
        model: {
            defaults: {
                droppable: '.dropping',
                // components: `

                // `,
                components: `
                    <span class="card-header" data-gjs-droppable=".dropping">Введите текст или перетащите элементы</span>
                    <span class="card-body" data-gjs-droppable=".dropping">
                        <h1 class="card-title">Заглавие</h1>
                        Введите текст или перетащите элементы
                    </span>
                 `,
                attributes: {
                    class: 'card dropping shadow-sm'
                },
                tagName: 'div',
                style: {
                    // border: '1px solid blue',
                    'height': '250px',
                    'min-width': '220px'
                }
            }
        }
    });
    editor.DomComponents.addType('header-1-droppable-component', {
        // isComponent: el => el.tagName === 'DIV',
        model: {
            defaults: {
                droppable: '.dropping',
                components: `
                    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
                    <nav class="my-2 my-md-0 mr-md-3">
                        <a class="p-2 text-dark" href="#">Features</a>
                        <a class="p-2 text-dark" href="#">Enterprise</a>
                        <a class="p-2 text-dark" href="#">Support</a>
                        <a class="p-2 text-dark" href="#">Pricing</a>
                     </nav>
                `,
                attributes: {
                    class: 'd-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm dropping'
                },
                tagName: 'div',
                style: {
                    // border: '1px solid red',
                }
            }
        }
    });
    editor.DomComponents.addType('text-header-component', {
        extend: 'text',
        model: {
            defaults: {
                type: 'textnode',
                components: `
                    Заглавие
                `,
                tagName: 'span',
                attributes: {
                    'data-grapes-lang-kz' : '',
                    'data-grapes-lang-en' : '',
                    'data-grapes-lang-ru' : '',
                    class: 'text-lang'
                },
                style: {'font-size': '3rem'},
                traits: [
                    // Strings are automatically converted to text types
                    // 'name', // Same as: { type: 'text', name: 'name' }
                    {
                        type: 'text',
                        name: 'data-grapes-lang-kz',
                        label: 'Lang KZ'
                    },
                    {
                        type: 'text',
                        name: 'data-grapes-lang-en',
                        label: 'Lang EN'
                    }
                ],
            },
            // init() {
            //     this.on('change:attributes', this.handleHTMLChange);
            // },
            // handleHTMLChange() {
            //     console.log('HTML changed to: ', this.innerHTML);
            // },
        }
    });
    editor.DomComponents.addType('lang-switcher-component', {
        model: {
            defaults: {
                components: `
                    <button id="lang-kz-button">KZ</button>
                    <button id="lang-ru-button">RU</button>
                    <button id="lang-en-button">EN</button>
                `,
                tagName: 'span',
                style: {
                    'font-size': '2rem',
                    width: '100px',
                    height: '45px',
                    display: 'flex'
                },
            }
        }
    })

    // editor.BlockManager.add('droppable-container-block', {
    //     label: 'Droppable container',
    //     content: {
    //         type: 'droppable-container-component',
    //     }
    // });
    // editor.BlockManager.add('droppable-card-deck-block', {
    //     label: 'Droppable card deck',
    //     content: {
    //         type: 'droppable-card-deck-component',
    //     }
    // });
    // editor.BlockManager.add('droppable-card-block', {
    //     label: 'Droppable card',
    //     content: {
    //         type: 'droppable-card-component',
    //     }
    // });
    // editor.BlockManager.add('header-1-droppable-block', {
    //     label: 'Droppable header',
    //     content: {
    //         type: 'header-1-droppable-component',
    //     }
    // });
    // editor.BlockManager.add('button-link', {
    //     label: 'Button link',
    //     content: {
    //         type: 'link',
    //         attributes: {
    //             class: 'btn mx-auto btn-lg btn-block btn-primary dropping'
    //         },
    //         style: {
    //             'max-width': '150px',
    //             position: 'absolute',
    //             bottom: '5%'
    //         }
    //     }
    // });

    // editor.CssComposer.setRule('.submit-button', {
    //
    // });

    editor.BlockManager.add('lang-switcher-block', {
        label: 'Language Switcher',
        category: 'Util',
        content: {
            type: 'lang-switcher-component',
            script: function () {
                document.getElementById('lang-kz-button').addEventListener('click', e => {
                    console.log('kazakh')
                    document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-kz');
                    })
                });

                document.getElementById('lang-en-button').addEventListener('click', e => {
                    document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-en');
                    })
                });

                document.getElementById('lang-ru-button').addEventListener('click', e => {
                    document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-ru');
                    })
                });
            }
        }
    });
    editor.BlockManager.add('text-header-block', {
        label: 'Text Header Block',
        category: 'Text',
        content: {
            type: 'text-header-component'
        }
    });
    editor.BlockManager.add('ui-header-block', {
        label: 'UI Header 1',
        category: 'Header',
        content: `
            <header class="header">

                <div class="header__container header__container--space-between">

                    <!--    <svg class="header__hamburger" width="18" height="12">-->
                    <!--        <use xlink:href="img/icons.svg#hamburger"></use>-->
                    <!--    </svg>-->

                    <a href="/src" class="header__logo">
                        Tech<span class="header__logo-accent">Hub</span>
                    </a>


                    <div class="header__action-box">
                        <div class="header__lang-switcher">
                            <div class="header__language">
                                Ru
                            </div>

                            <svg class="header__lang-toggle" width="10" height="5">
                                <use xlink:href="img/icons.svg#toggle"></use>
                            </svg>
                        </div>

                        <button class="header__login-btn button button--lg">
                            Подать заявку
                        </button>
                    </div>

                </div>
            </header>
        `
    });
    editor.BlockManager.add('ui-main-container-block', {
        label: 'FILLABLE: UI Main Container',
        category: 'Container',
        content: `
            <main data-gjs-droppable=".dropping" class="program-page"></main>
        `
    });
    // editor.BlockManager.add('ui-section-container-block', {
    //     label: 'FILLABLE: UI Section Container',
    //     content: `
    //         <div data-gjs-droppable=".dropping" class="program-page__section dropping">
    //         </div>
    //     `
    // });
    editor.BlockManager.add('ui-welcome-section-block', {
        label: 'Welcome Section',
        category: 'Basic',
        content: `
            <div data-gjs-droppable=".dropping" class="program-page__section program-welcome-section dropping">
                <img data-gjs-type="image" alt="" class="program-welcome-section__img dropping">

                <div data-gjs-droppable=".dropping" class="program-welcome-section__info dropping">
                    <div data-gjs-droppable=".dropping" class="program-welcome-section__title dropping">Наименование</div>
                    <p data-gjs-droppable=".dropping" class="program-welcome-section__subtitle dropping">Второстепенный текст, второе заглавие</p>
                    <button data-gjs-droppable=".dropping" class="program-welcome-section__button button button--lg  dropping">Кнопка</button>
                </div>
            </div>
        `
    });

    editor.BlockManager.add('ui-cards-block', {
        label: 'Cards section',
        category: 'Basic',
        content: `
            <div class="program-page__section program-cards dropping">

                <div class="program-cards__container dropping">
                    <h4 class="program-cards__title">Мы ищем проекты в твоем городе</h4>

                    <div class="program-cards__list dropping">

                        <div class="program-cards__item program-card dropping">

                            <img src="/img/icons.svg" width="130" height="130" class="program-card__icon">
<!--                                <use href="/img/icons.svg#lamp"></use>-->
                            </img>

                            <h5 class="program-card__title dropping">С конкурентоспособной идеей</h5>

                            <p class="program-card__desc dropping">
                                В стартап-индустрии мы называем это "MCI" - максимально конкурентоспособная идея, надобность
                                которой
                                уже прощупана среди целевых клиентов. Идея должна быть осуществимой и иметь потенциал на
                                развитие.
                            </p>

                        </div>

                        <div class="program-cards__item program-card dropping">

                            <svg width="130" height="130" class="program-card__icon">
                                <use href="/img/icons.svg#group"></use>
                            </svg>

                            <h5 class="program-card__title dropping">Не менее 2-х ключевых участников команды</h5>

                            <p class="program-card__desc dropping">
                                Это говорит о том, что у вас есть сформированный костяк команды.
                            </p>

                        </div>

                        <div class="program-cards__item program-card dropping">

                            <svg width="130" height="130" class="program-card__icon">
                                <use href="/img/icons.svg#technology"></use>
                            </svg>

                            <h5 class="program-card__title dropping">С ИТ-решением</h5>

                            <p class="program-card__desc dropping">
                                интернет вещей, e-Commerce, образовательные технологии, информационная безопасность, большие
                                данные и машинное обучение, рекламные и маркетинговые технологии, платформенное и корпоративное
                                ПО, финансовые технологии, онлайн и mobile-игры, искусственный интеллект, дополненная и
                                виртуальная реальность
                            </p>

                        </div>

                        <div class="program-cards__item program-card dropping">

                            <svg width="130" height="130" class="program-card__icon">
                                <use href="/img/icons.svg#star-target"></use>
                            </svg>

                            <h5 class="program-card__title dropping">Полная вовлеченность основателей</h5>

                            <p class="program-card__desc dropping">
                                На первых порах очень важно, чтобы основатель был полностью вовлечен в проект, без параллельной
                                занятости, так как это напрямую сказывается на скорости и качестве развития стартапа.
                            </p>

                        </div>


                    </div>
                </div>

            </div>
        `
    });

    editor.BlockManager.add('ui-info-block', {
        label: 'Info Block',
        category: 'Basic',

        content: `
            <div class="program-page__section program-info">
                <div class="program-info__container">
                    <h4 class="program-info__title">Что ты получишь на инкубации?</h4>

                    <table class="program-info__table">
                        <tr>
                            <th>Наставника</th>
                            <td>Ты сможешь детально разобрать свой проект с бизнес-экспертами (мы называем их трекерами). На
                                индивидуальных консультациях тебе помогут разобраться во всех процессах - от финансов до
                                маркетинга - и выстроить рабочую модель твоего стартапа.
                            </td>
                        </tr>
                        <tr>
                            <th>Понимание, как работает стартап</th>
                            <td>Мы научим тебя создавать ИТ-продукт без навыков кодирования, строить гибкую бизнес-модель,
                                правильно формировать роли в команде и делать продукт, который решает конкретную проблему и
                                приносит доход.
                            </td>
                        </tr>
                        <tr>
                            <th>Нетворкинг</th>
                            <td>
                                Ты автоматически станешь частью комьюнити Astana Hub. Мы познакомим тебя с нашим сообществом,
                                расскажем о твоем проекте на наших площадках и познакомим с людьми и компаниями, которые
                                подтолкнут твой проект к развитию.
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        `
    });

    editor.BlockManager.add('ui-steps-block', {
        label: 'Steps',
        category: 'Basic',

        content: `
            <div class="program-page__section program-steps">

                <div class="program-steps__container">

                    <div class="program-steps__info">
                        <p class="program-steps__text">Решай проблемы людей и меняй привычные процессы, <br>
                            А мы поможем разобраться во всем новом</p>

                        <h4 class="program-steps__heading">Делать стартап - это интересно и современно</h4>
                    </div>

                    <div class="program-steps__list">
                        <div class="program-steps__item program-step">
                            <div class="program-step__number">01</div>
                            <div class="program-step__text">Сформулируй идею</div>
                        </div>

                        <div class="program-steps__item program-step">
                            <div class="program-step__number">02</div>
                            <div class="program-step__text">Подай заявку на инкубацию</div>
                        </div>

                        <div class="program-steps__item program-step">
                            <div class="program-step__number">03</div>
                            <div class="program-step__text">Сделай работающий ИТ-проект</div>
                        </div>
                    </div>
                </div>

            </div>
        `
    });

    editor.BlockManager.add('ui-request', {
        label: 'Request form',
        category: 'Section',
        content: `
            <div class="program-page__section program-request">
                <div class="program-request__title">
                    6 недель твой путь от идеи к бизнесу!
                </div>

                <div class="program-request__subtitle">
                    Прием заявок до 23 октября 2020 <br>
                    Длительность программы: с 26 октября по 7 декабря 2020
                </div>

                <button class="program-request__button button button--lg">
                    Подать заявку
                </button>
            </div>
        `
    });

    editor.Panels.getButton('views', 'open-blocks').set('active', true)

    // submit button with script
    editor.BlockManager.add('submit-button', {
        label: 'Submit button',
        content: {
            type: 'submit-button-component',
        }
    });

    // image
    editor.BlockManager.add('image', {
        id: 'image',
        label: 'Image',
        // Select the component once it's dropped
        select: true,
        // You can pass components as a JSON instead of a simple HTML string,
        // in this case we also use a defined component type `image`
        content: { type: 'image' },
        // This triggers `active` event on dropped components and the `image`
        // reacts by opening the AssetManager
        activate: true,
    });
    editor.BlockManager.add('test', {
        label: 'TEST',
        content: `<div class="test-class">SOME THINGS HERE</div>`
    })

    // important to make canvas work right, do not touch, always set attributes: {class: 'default-wrapper'} on every new block (except droppable components)
    // droppable components should not use it, otherwise they will not be able to be droppable
    // cssComposer.setRule('.default-wrapper', {
    //     display:'inline-block'
    // });
    return editor;
}

export default buildConstructor;
