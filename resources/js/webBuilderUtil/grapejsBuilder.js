
// parameter: elemId is an id of html element that will hold the grapejs instance
const buildConstructor = (elemId, options) => {

    let idCounter = 0;
    const customComponentTypes = editor => {
        editor.DomComponents.addType('text', {
            model: {
                defaults: {
                    attributes: {
                        'data-grapes-lang-kk' : '',
                        'data-grapes-lang-en' : '',
                        'data-grapes-lang-ru' : '',
                        // class: 'text-lang'
                    },
                    traits: [
                        {
                            type: 'textarea',
                            name: 'data-grapes-lang-kk',
                            label: 'Lang KK'
                        },
                        {
                            type: 'textarea',
                            name: 'data-grapes-lang-en',
                            label: 'Lang EN'
                        }
                    ]
                }
            }
        });

        editor.TraitManager.addType('textarea', {
            createInput({ trait }) {
                const el = document.createElement('textarea');
                trait.attributes.value = 'sex'
                console.log('trait', trait)
                return el;
            },
            onUpdate({ component, elInput, trait }) {
                elInput.value = component.getAttributes()[trait.attributes.name];
                console.log('elInput.value', elInput.value)
            }
        })

        // editor.DomComponents.addType('link', {
        //     view: {
        //         onRender() {
        //             const inp = document.createElement('input');
        //             inp.type='text'
        //             inp.value = 'href';
        //             // This is just an example, AVOID adding events on inner elements,
        //             // use `events` for these cases
        //             // btn.addEventListener('click', () => {});
        //             this.el.appendChild(inp);
        //         }
        //     }
        // });
    };
    let editor = grapesjs.init({
        // Indicate where to init the editor. You can also pass an HTMLElement
        container: '#' + elemId,
        plugins: [ customComponentTypes ],
        // Get the content for the canvas directly from the element
        // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
        // fromElement: true,
        components: options.passport.content,
        // Size of the editor
        height: '800px',
        width: 'auto',
        avoidInlineStyle: 1,
        // Disable the storage manager for the moment
        storageManager: {
            type: 'remote',
            autosave: true,
            stepsBeforeSave: 5,
            storeHtml: 1,
            storeCss: 1,
            storeComponents: 0,
            urlStore: `/control-panel/passports/${options.passport.id}/save-changes`,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            beforeSend(xhr, setting) {
                // console.log('sending html to server', xhr, setting)
            }
        },
        assetManager: {
            assets: [
                '/img/program-poster.png'
            ],
            upload: '/control-panel/images/',
            uploadName: 'files',
            // Custom headers to pass with the upload request
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            // Custom parameters to pass with the upload request, eg. csrf token
            params: {

            },
            credentials: 'include'

        },
        styleManager: {
            sectors: [
                {
                    name: 'Позиция',
                    buildProps: ['width', 'height', 'min-width', 'min-height', 'margin-top', 'margin-bottom', 'margin-left', 'margin-right']
                },
                {
                    name: 'Типография',
                    buildProps: ['font-size', 'font-weight', 'text-align', 'letter-spacing', 'color', 'text-shadow', 'background-color']
                }
            ]
        },
        canvas: {
            styles: ['/css/style.css', '/css/ui-components.css', '/css/main.css']
        }
    });
    editor.SelectorManager.getAll().each(selector => selector.set('private', 1));

// All new selectors will be private
    editor.on('selector:add', selector => selector.set('private', 1));
    editor.on('component:add', model => {
        // model.addСlass(` ${model.attributes.type + '-' + model.ccid}`);
        // console.log('model', model)
    });
    editor.addComponents(`
<!--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->

<!--        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
    `);

    //examples
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

    // containers
    editor.DomComponents.addType('ui-main-component', {
        model: {
            defaults: {
                tagName: 'main',
                attributes: {
                    class: 'ui-main'
                },
                droppable: 'section, .main-droppable',
                components: ``
            }
        }
    });
    editor.DomComponents.addType('ui-header-component', {
        // isComponent: el => el.tagName === 'DIV',
        model: {
            defaults: {
                // droppable: '.dropping',
                attributes: {
                    class: 'ui-header-1'
                },
                tagName: 'header',
                style: {
                    // border: '1px solid red',
                },
                components: `
                    <div class="ui-header-1__container ui-header-1__container--space-between">

                        <a href="/src" class="ui-header-1__logo">
                            Tech<span class="ui-header-1__logo-accent">Hub</span>
                        </a>

                        <div class="ui-header-1__action-box">
                            <div class="ui-header-1__lang-switcher">
                                <div class="ui-header-1__language">
                                    Ru
                                </div>

                                <svg class="ui-header-1__lang-toggle" width="10" height="5">
                                    <use xlink:href="img/icons.svg#toggle"></use>
                                </svg>
                            </div>

                            <button data-gjs-type="ui-button-red-md-component" class="ui-header-1__login-btn button button--lg">

                            </button>
                        </div>
                    </div>
<!--                    <main class="ui-main" data-gjs-type="box" data-gjs-droppable="section .main-droppable">-->
<!--                    </main>-->
                `,

            }
        }
    });
    editor.DomComponents.addType('ui-section-80vh-component', {
        model: {
            defaults: {
                droppable: '.ui-container, .ui-container-fix, img',
                draggable: 'main',
                attributes: {
                    class: 'ui-section-80vh main-droppable'
                },
                tagName: 'section',
            }
        }
    });
    editor.DomComponents.addType('ui-section-component', {
        model: {
            defaults: {
                droppable: '.ui-container, .ui-container-fix, img',
                // draggable: 'main, body',
                attributes: {
                    class: 'ui-section main-droppable'
                },
                tagName: 'section',
            }
        }
    });
    editor.DomComponents.addType('ui-section-black-component', {
        model: {
            defaults: {
                droppable: '.ui-container, .ui-container-fix, img',
                draggable: 'main',
                attributes: {
                    class: 'ui-section-black main-droppable'
                },
                tagName: 'section',
            }
        }
    });
    editor.DomComponents.addType('ui-container-component', {
        model: {
            defaults: {
                droppable: '*',
                draggable: 'section',
                attributes: {
                    class: 'ui-container'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-container-fix-component', {
        model: {
            defaults: {
                droppable: '*',
                draggable: 'section',
                attributes: {
                    class: 'ui-container-fix'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-top-left-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-top-left'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-center-left-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-center-left'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-top-center-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-top-center'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-center-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-center'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-top-right-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-top-right'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-pos-center-right-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '*',
                attributes: {
                    class: 'ui-pos-center-right'
                }
            }
        }
    });

    //grid
    editor.DomComponents.addType('ui-grid-2-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '.ui-container, *',
                attributes: {
                    class: 'ui-grid-2'
                },
                components: `
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                `
            }
        }
    });
    editor.DomComponents.addType('ui-grid-3-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '.ui-container, *',
                attributes: {
                    class: 'ui-grid-3'
                },
                components: `
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                `
            }
        }
    });
    editor.DomComponents.addType('ui-grid-4-component', {
        model: {
            defaults: {
                tagName: 'div',
                draggable: '.ui-container, *',
                attributes: {
                    class: 'ui-grid-4'
                },
                components: `
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                    <div data-gjs-droppable="*" style="min-height: 100px"></div>
                `
            }
        }
    });

    //border
    editor.DomComponents.addType('ui-border-component', {
        model: {
            defaults: {
                tagName: 'div',
                droppable: '*',
                attributes: {
                    class: 'ui-border'
                },
            }
        }
    });

    // text and language
    editor.DomComponents.addType('ui-heading-white-component', {
        extend: 'text',
        model: {
            defaults: {
                components: `
                    Astana hub heading program slim shady
                `,
                tagName: 'p',
                attributes: {
                    class: 'text-lang ui-heading-white'
                },
            }
        }
    });
    editor.DomComponents.addType('ui-heading-black-component', {
        extend: 'text',
        model: {
            defaults: {
                type: 'textnode',
                components: `
                    Astana hub heading program slim shady
                `,
                tagName: 'p',
                attributes: {
                    class: 'text-lang ui-heading-black'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-paragraph-white-component', {
        extend: 'text',
        model: {
            defaults: {
                components: `
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eveniet explicabo vel! Alias delectus dolores esse ex ipsam iste laudantium natus placeat reiciendis sequi suscipit totam unde, vel vitae voluptatum
                `,
                tagName: 'p',
                attributes: {
                    class: 'text-lang ui-paragraph-white'
                }
            }
        }
    });
    editor.DomComponents.addType('ui-paragraph-black-component', {
        extend: 'text',
        model: {
            defaults: {
                components: `
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eveniet explicabo vel! Alias delectus dolores esse ex ipsam iste laudantium natus placeat reiciendis sequi suscipit totam unde, vel vitae voluptatum
                `,
                tagName: 'p',
                attributes: {
                    class: 'text-lang ui-paragraph-black'
                }
            }
        }
    });
    editor.DomComponents.addType('lang-switcher-component', {
        model: {
            defaults: {
                components: `
                    <button id="lang-kk-button">KK</button>
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

    // cards
    editor.DomComponents.addType('ui-card-column-component', {
        model: {
            defaults: {
                tagName: 'div',
                attributes: {
                    class: 'ui-card-column'
                },
                components: `
                    <img data-gjs-type="image" src="/img/icons/lamp.svg" alt="" class="ui-card-column__icon">

                    <div class="ui-card-column__title">
                        С конкурентоспособной идеей
                    </div>

                    <div class="ui-card-column__subtitle">
                        В стартап-индустрии мы называем это "MCI" - максимально конкурентоспособная идея, надобность
                        которой уже прощупана среди целевых клиентов. Идея должна быть осуществимой и иметь
                        потенциал на развитие.
                    </div>
                `
            }
        }
    });

    // steps
    editor.DomComponents.addType('ui-step-component', {
        model: {
            defaults: {
                tagName: 'div',
                attributes: {
                    class: 'ui-step'
                },
                components: `
                    <div class="ui-step__number">
                        01
                    </div>
                    <div class="ui-step__text">
                        Сформулируй идею
                    </div>
                `
            }
        }
    });

    // buttons
    editor.DomComponents.addType('ui-button-red-md-component', {
        extend: 'text',
        model: {
            defaults: {
                tagName: 'button',
                attributes: {
                    class: 'text-lang ui-button-red-md',
                    // 'onclick': `window.open('/')`,
                    'ng-click': `openApplicationModal()`
                },
                components: `Подать заявку`,
            }
        }
    });

    // socials
    editor.DomComponents.addType('ui-socials-component', {
        model: {
            defaults: {
                tagName: 'div',
                attributes: {
                    class: 'ui-socials'
                },
                components: `
                    <a href="#" data-gjs-type="link" class="ui-socials__item">
                        <img src="/img/icons/fb-icon.png" alt="">
                    </a>

                    <a href="#" data-gjs-type="link" class="ui-socials__item">
                        <img src="/img/icons/linkeddn-icon.png" alt="">
                    </a>

                    <a href="#" data-gjs-type="link" class="ui-socials__item">
                        <img src="/img/icons/inst-icon.png" alt="">
                    </a>

                    <a href="#" data-gjs-type="link" class="ui-socials__item">
                        <img src="/img/icons/tg-icon.png" alt="">
                    </a>

                    <a href="#" data-gjs-type="link" class="ui-socials__item">
                        <img src="/img/icons/youtube-icon.png" alt="">
                    </a>
                `
            }
        }
    });

    editor.CssComposer.setRule('#wrapper', {
        'padding-bottom': '30px'
    });

    // BLOCKS

    //TEST
    // editor.BlockManager.add('ui-main-container-block', {
    //     label: 'FILLABLE: UI Main Container',
    //     // category: 'Container',
    //     content: `
    //         <main data-gjs-droppable=".dropping" class="program-page"></main>
    //     `
    // });
    // Ready block
    editor.BlockManager.add('ui-welcome-section-block', {
        label: 'Welcome Section',
        category: 'Готовые блоки',
        content: `
            <div data-gjs-droppable=".dropping" class="program-page__section program-welcome-section dropping">
                <img data-gjs-type="image" alt="" class="program-welcome-section__img dropping">

                <div data-gjs-droppable=".dropping" class="program-welcome-section__info dropping">
                    <div data-gjs-droppable=".dropping" class="program-welcome-section__title dropping text-lang">Наименование</div>
                    <p data-gjs-droppable=".dropping" class="program-welcome-section__subtitle dropping text-lang">Второстепенный текст, второе заглавие</p>
                    <button data-gjs-droppable=".dropping" class="program-welcome-section__button button button--lg  dropping text-lang" data-gjs-type="ui-button-red-md-component"></button>
                </div>
            </div>
        `
    });
    // Ready block
    editor.BlockManager.add('ui-cards-block', {
        label: 'Cards section',
        category: 'Готовые блоки',
        content: `
            <div class="program-page__section program-cards dropping">

                <div class="program-cards__container dropping">
                    <h4 class="program-cards__title text-lang">Мы ищем проекты в твоем городе</h4>

                    <div class="program-cards__list dropping">

                        <div class="program-cards__item program-card dropping">

                            <svg src="/img/icons.svg" width="130" height="130" class="program-card__icon">
                                <use href="/img/icons.svg#lamp"></use>
                            </svg>

                            <h5 class="program-card__title dropping text-lang">С конкурентоспособной идеей</h5>

                            <p class="program-card__desc dropping text-lang">
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

                            <h5 class="program-card__title dropping text-lang">Не менее 2-х ключевых участников команды</h5>

                            <p class="program-card__desc dropping text-lang">
                                Это говорит о том, что у вас есть сформированный костяк команды.
                            </p>

                        </div>

                        <div class="program-cards__item program-card dropping">

                            <svg width="130" height="130" class="program-card__icon">
                                <use href="/img/icons.svg#technology"></use>
                            </svg>

                            <h5 class="program-card__title dropping text-lang">С ИТ-решением</h5>

                            <p class="program-card__desc dropping text-lang">
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

                            <h5 class="program-card__title dropping text-lang">Полная вовлеченность основателей</h5>

                            <p class="program-card__desc dropping text-lang">
                                На первых порах очень важно, чтобы основатель был полностью вовлечен в проект, без параллельной
                                занятости, так как это напрямую сказывается на скорости и качестве развития стартапа.
                            </p>

                        </div>


                    </div>
                </div>

            </div>
        `
    });
    // Ready block
    editor.BlockManager.add('ui-info-block', {
        label: 'Info Block',
        category: 'Готовые блоки',
        content: `
            <div class="program-page__section program-info">
                <div class="program-info__container">
                    <h4 class="program-info__title text-lang">Что ты получишь на инкубации?</h4>

                    <table class="program-info__table">
                        <tr>
                            <th class="text-lang">Наставника</th>
                            <td class="text-lang">Ты сможешь детально разобрать свой проект с бизнес-экспертами (мы называем их трекерами). На
                                индивидуальных консультациях тебе помогут разобраться во всех процессах - от финансов до
                                маркетинга - и выстроить рабочую модель твоего стартапа.
                            </td>
                        </tr>
                        <tr>
                            <th class="text-lang">Понимание, как работает стартап</th>
                            <td class="text-lang">Мы научим тебя создавать ИТ-продукт без навыков кодирования, строить гибкую бизнес-модель,
                                правильно формировать роли в команде и делать продукт, который решает конкретную проблему и
                                приносит доход.
                            </td>
                        </tr>
                        <tr>
                            <th class="text-lang">Нетворкинг</th>
                            <td class="text-lang">
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
    // Ready block
    editor.BlockManager.add('ui-steps-block', {
        label: 'Steps',
        category: 'Готовые блоки',
        content: `
            <div class="program-page__section program-steps">

                <div class="program-steps__container">

                    <div class="program-steps__info">
                        <p class="program-steps__text text-lang">Решай проблемы людей и меняй привычные процессы, <br>
                            А мы поможем разобраться во всем новом</p>

                        <h4 class="program-steps__heading text-lang">Делать стартап - это интересно и современно</h4>
                    </div>

                    <div class="program-steps__list">
                        <div class="program-steps__item program-step">
                            <div class="program-step__number">01</div>
                            <div class="program-step__text text-lang">Сформулируй идею</div>
                        </div>

                        <div class="program-steps__item program-step">
                            <div class="program-step__number">02</div>
                            <div class="program-step__text text-lang">Подай заявку на инкубацию</div>
                        </div>

                        <div class="program-steps__item program-step">
                            <div class="program-step__number">03</div>
                            <div class="program-step__text text-lang">Сделай работающий ИТ-проект</div>
                        </div>
                    </div>
                </div>

            </div>
        `
    });
    // Ready block
    editor.BlockManager.add('ui-request', {
        label: 'Request form',
        category: 'Готовые блоки',
        content: `
            <div class="program-page__section program-request">
                <div class="program-request__title text-lang">
                    6 недель твой путь от идеи к бизнесу!
                </div>

                <div class="program-request__subtitle text-lang">
                    Прием заявок до 23 октября 2020 <br>
                    Длительность программы: с 26 октября по 7 декабря 2020
                </div>

                <button class="program-request__button button button--lg text-lang" data-gjs-type="ui-button-red-md-component">

                </button>
            </div>
        `
    });
    // Ready block
    editor.BlockManager.add('ui-welcome-section-2-block', {
        label: 'Welcome Section 2',
        category: 'Готовые блоки',
        content: `
            <div class="techpark-page__section techpark-welcome-section">
                <img src="/img/techpark-bg.png" alt="" class="techpark-welcome-section__bg">

                <button class="techpark-welcome-section__button-back button-back button-back--rotate button-back--transparent">
                    <svg class="button-back__icon" width="18" height="18">
                        <use href="/img/icons.svg#chevron-right"></use>
                    </svg>
                    Вернуться
                </button>

                <div class="techpark-welcome-section__title">
                    Регистрация участников международного <br>
                    технопарка IT-стартапов Astana Hub
                </div>

                <button class="techpark-welcome-section__btn button button--lg" data-gjs-type="ui-button-red-md-component"></button>
            </div>
        `
    });

    editor.BlockManager.add('ui-benefit-section-2-block', {
        label: 'Benefit Section 2',
        category: 'Готовые блоки',
        content: `
            <div class="techpark-page__section benefit-section">

                <div class="benefit-section__container">
                    <div class="benefit-section__row">
                        <div class="benefit-section__heading">
                            Что дает статус участника <br>
                            Astana Hub?
                        </div>

                        <div class="benefit-section__list">

                            <div class="benefit-section__item">
                                — Возможность получить налоговые льготы: КПН – 0%, ИПН – 0%, <br>
                                НДС – 0%, социальный налог на нерезидентов – 0%.
                            </div>

                            <div class="benefit-section__item">
                                — Возможность получить упрощенный визовый и трудовой режим <br>
                                для иностранных участников технопарка и компаний, где работают <br>
                                нерезиденты.
                            </div>

                            <div class="benefit-section__item">
                                — Даем знания и полезные контакты для привлечения инвестиций <br>
                                на выгодных условиях
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        `
    });

    editor.BlockManager.add('ui-documents-section-block', {
        label: 'Documents Section',
        category: 'Готовые блоки',
        content: `
            <div class="techpark-page__section documents-section">

                    <div class="documents-section__container">
                        <div class="documents-section__heading heading-medium">
                            Lorem ipsum dolor sit amet
                        </div>

                        <div class="documents-section__list">

                            <div class="documents-section__document-box document-box">

                                <svg class="document-box__icon" width="100" height="100">
                                    <use href="/img/icons.svg#star-box"></use>
                                </svg>

                                <div class="document-box__title">
                                    Перечень приоритетных видов деятельности
                                </div>

                                <button class="document-box__btn button button--grey button--icon-right button--w100">
                                    <svg width="24" height="24">
                                        <use href="/img/icons.svg#download"></use>
                                    </svg>
                                    Скачать
                                </button>
                            </div>

                            <div class="documents-section__document-box document-box">

                                <svg class="document-box__icon" width="100" height="100">
                                    <use href="/img/icons.svg#sort"></use>
                                </svg>

                                <div class="document-box__title">
                                    Порядок регистрации участников
                                </div>

                                <button class="document-box__btn button button--grey button--icon-right button--w100">
                                    <svg width="24" height="24">
                                        <use href="/img/icons.svg#download"></use>
                                    </svg>
                                    Скачать
                                </button>
                            </div>

                            <div class="documents-section__document-box document-box">

                                <svg class="document-box__icon" width="100" height="100">
                                    <use href="/img/icons.svg#star-box"></use>
                                </svg>

                                <div class="document-box__title">
                                    Положение о комиссии по отбору участников
                                </div>

                                <button class="document-box__btn button button--grey button--icon-right button--w100">
                                    <svg width="24" height="24">
                                        <use href="/img/icons.svg#download"></use>
                                    </svg>
                                    Скачать
                                </button>
                            </div>

                            <div class="documents-section__document-box document-box">

                                <svg class="document-box__icon" width="100" height="100">
                                    <use href="/img/icons.svg#copy"></use>
                                </svg>

                                <div class="document-box__title">
                                    Список документов для регистрации участников
                                </div>

                                <button class="document-box__btn button button--grey button--icon-right button--w100">
                                    <svg width="24" height="24">
                                        <use href="/img/icons.svg#download"></use>
                                    </svg>
                                    Скачать
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
        `
    });

    editor.BlockManager.add('ui-documents-section-2-block', {
        label: 'Documents Section 2',
        category: 'Готовые блоки',
        content: `
            <div class="techpark-page__section documents-section">
                <div class="documents-section__container">

                    <div class="documents-section__heading heading-medium">
                        Памятка потенциального участника
                    </div>

                    <div class="documents-section__list">

                        <div class="documents-section__memo memo-box">

                            <img src="/img/memo-1.png" alt="" class="memo-box__img">

                        </div>

                        <div class="documents-section__memo memo-box">

                            <img src="/img/memo-2.png" alt="" class="memo-box__img">

                        </div>

                        <div class="documents-section__memo memo-box">

                            <img src="/img/memo-3.png" alt="" class="memo-box__img">

                        </div>

                        <div class="documents-section__memo memo-box">

                            <img src="/img/memo-4.png" alt="" class="memo-box__img">

                        </div>

                    </div>
                </div>

            </div>
        `
    });

    editor.BlockManager.add('ui-timeline-section-block', {
        label: 'Timeline Section',
        category: 'Готовые блоки',
        content: `
            <div class="techpark-page__section timeline-section">

                <div class="timeline-section__container">

                    <div class="timeline-section__title heading-medium">
                        Lorem ipsum dolor sit amet
                    </div>

                    <div class="timeline-section__timeline as-timeline">

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                01
                            </div>

                            <div class="as-timeline__block-title">
                                Регистрация будет проходить онлайн на сайте технопарка.
                            </div>

                            <div class="as-timeline__block-subtitle">
                                Необходимо заполнить электронное заявление и обязательно прикрепить все запрашиваемые документы.
                            </div>
                        </div>

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                02
                            </div>

                            <div class="as-timeline__block-title">
                                Ожидать результаты первичной обработки документов
                            </div>

                            <div class="as-timeline__block-subtitle">
                                На этом этапе технопарк будет проверять наличие всех документов и информации. Если какой-то из
                                документов не будет соответствовать требованиям, технопарк не примет вашу анкету и вернет
                                документы на доработку.
                            </div>
                        </div>

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                03
                            </div>

                            <div class="as-timeline__block-title">
                                Ожидать решения комиссии
                            </div>

                            <div class="as-timeline__block-subtitle">
                                В течение 10 рабочих дней вам на почту придет письмо с решением комиссии. Вы получите письмо при
                                любом раскладе, будь то положительное или отрицательное решение комиссии.
                            </div>
                        </div>

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                04
                            </div>

                            <div class="as-timeline__block-title">
                                Подтверждение
                            </div>

                            <div class="as-timeline__block-subtitle">
                                Если вы прошли два этапа отбора комиссии, вы получите свидетельство участника технопарка Astana
                                Hub. Это бумажный документ, который будет подтверждать вашу регистрацию.
                            </div>
                        </div>

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                05
                            </div>

                            <div class="as-timeline__block-title">
                                Договор
                            </div>

                            <div class="as-timeline__block-subtitle">
                                Заключить Договор с Astana Hub, где будут прописаны условия деятельности участника технопарка.
                            </div>
                        </div>

                        <div class="as-timeline__block">
                            <div class="as-timeline__block-number">
                                06
                            </div>

                            <div class="as-timeline__block-title">
                                Результат
                            </div>

                            <div class="as-timeline__block-subtitle">
                                После всех этапов вас включат в Перечень участников Astana Hub, после чего логотип и описание
                                вашего проекта будут опубликованы на сайте технопарка.
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        `
    });


    // Opening the block panel on init
    editor.Panels.getButton('views', 'open-blocks').set('active', true)

    // submit button with script
    //TEST

    //TEST
    editor.BlockManager.add('image', {
        id: 'image',
        label: 'Image',
        category: 'Util',
        // Select the component once it's dropped
        select: true,
        // You can pass components as a JSON instead of a simple HTML string,
        // in this case we also use a defined component type `image`
        content: { type: 'image' },
        // This triggers `active` event on dropped components and the `image`
        // reacts by opening the AssetManager
        activate: true,
    });

    // used blocks
    editor.BlockManager.add('ui-header-block', {
        label: 'UI Header',
        category: 'UI Headers',
        content: `
            <header data-gjs-type="ui-header-component"></header>
            <main data-gjs-type="ui-main-component"></main>
        `
    });
    editor.BlockManager.add('ui-section-80vh-block', {
        label: 'UI Section 80vh',
        category: 'UI Section',
        content: {
            type: 'ui-section-80vh-component'
        }
    });
    editor.BlockManager.add('ui-section-block', {
        label: 'UI Section',
        category: 'UI Section',
        content: {
            type: 'ui-section-component'
        }
    });
    editor.BlockManager.add('ui-section-black-block', {
        label: 'UI Section Black',
        category: 'UI Section',
        content: {
            type: 'ui-section-black-component'
        }
    });
    editor.BlockManager.add('ui-container-block', {
        label: 'UI Container h100',
        category: 'UI Container',
        content: {
            type: 'ui-container-component'
        }
    });
    editor.BlockManager.add('ui-container-fix-block', {
        label: 'UI Container Fix',
        category: 'UI Container',
        content: {
            type: 'ui-container-fix-component'
        }
    });
    editor.BlockManager.add('ui-bg-img-block', {
        label: 'UI Background Image',
        category: 'UI Image',
        content: {
            attributes: {
                class: 'ui-bg-img',
                'data-gjs-draggable': '.ui-container, .ui-container-fix'
            },
            type: 'image'
        }
    });
    editor.BlockManager.add('ui-pos-top-left-block', {
        label: 'UI Position Top Left Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-top-left-component'
        }
    });
    editor.BlockManager.add('ui-pos-center-left-block', {
        label: 'UI Position Center Left Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-center-left-component'
        }
    });
    editor.BlockManager.add('ui-pos-top-center-block', {
        label: 'UI Position Top Center Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-top-center-component'
        }
    });
    editor.BlockManager.add('ui-pos-center-block', {
        label: 'UI Position Center Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-center-component'
        }
    });
    editor.BlockManager.add('ui-pos-top-right-block', {
        label: 'UI Position Top Right Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-top-right-component'
        }
    });
    editor.BlockManager.add('ui-pos-center-right-block', {
        label: 'UI Position Center Right Container',
        category: 'UI Position Container',
        content: {
            type: 'ui-pos-center-right-component'
        }
    });
    editor.BlockManager.add('ui-border-block', {
        label: 'UI Border',
        category: 'UI Borders',
        content: {
            type: 'ui-border-component'
        }
    });
    editor.BlockManager.add('ui-grid-2-block', {
        label: 'UI Grid 2',
        category: 'UI Grid',
        content: {
            type: 'ui-grid-2-component'
        }
    });
    editor.BlockManager.add('ui-grid-3-block', {
        label: 'UI Grid 3',
        category: 'UI Grid',
        content: {
            type: 'ui-grid-3-component'
        }
    });
    editor.BlockManager.add('ui-grid-4-block', {
        label: 'UI Grid 4',
        category: 'UI Grid',
        content: {
            type: 'ui-grid-4-component'
        }
    });
    // text and lang
    editor.BlockManager.add('lang-switcher-block', {
        label: 'Language Switcher',
        category: 'Util',
        content: {
            type: 'lang-switcher-component',
            script: function () {
                document.getElementById('lang-kk-button').addEventListener('click', e => {
                    document.querySelectorAll('.text-lang').forEach(elem => {

                        if (!elem.getAttribute('data-grapes-lang-ru'))
                            elem.setAttribute('data-grapes-lang-ru', elem.innerHTML);

                        elem.innerHTML = elem.getAttribute('data-grapes-lang-kk');
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
    editor.BlockManager.add('ui-heading-white-block', {
        label: 'Text Heading White',
        category: 'Text',
        content: {
            type: 'ui-heading-white-component'
        }
    });
    editor.BlockManager.add('ui-heading-black-block', {
        label: 'Text Heading Black',
        category: 'Text',
        content: {
            type: 'ui-heading-black-component'
        }
    });
    editor.BlockManager.add('ui-paragraph-white-block', {
        label: 'Text Paragraph White',
        category: 'Text',
        content: {
            type: 'ui-paragraph-white-component'
        }
    });
    editor.BlockManager.add('ui-paragraph-black-block', {
        label: 'Text Paragraph Black',
        category: 'Text',
        content: {
            type: 'ui-paragraph-black-component'
        }
    });
    // card
    editor.BlockManager.add('ui-card-column-block', {
        label: 'Card Column',
        category: 'Card',
        content: {
            type: 'ui-card-column-component'
        }
    });
    // step
    editor.BlockManager.add('ui-step-block', {
        label: 'UI Step',
        category: 'Card',
        content: {
            type: 'ui-step-component'
        }
    });
    editor.BlockManager.add('ui-button-red-md-block', {
        label: 'Button Red',
        category: 'Buttons',
        content: {
            type: 'ui-button-red-md-component'
        }
    });
    editor.BlockManager.add('ui-socials-block', {
        label: 'Socials',
        category: 'Util',
        content: {
            type: 'ui-socials-component'
        }
    });

    return editor;
}

export default buildConstructor;
