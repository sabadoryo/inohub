
// parameter: elemId is an id of html element that will hold the grapejs instance
const buildConstructor = elemId => {

    let editor = grapesjs.init({
        // Indicate where to init the editor. You can also pass an HTMLElement
        container: '#' + elemId,
        // Get the content for the canvas directly from the element
        // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
        fromElement: true,
        // Size of the editor
        height: '300px',
        width: 'auto',
        // Disable the storage manager for the moment
        storageManager: false,
        // Avoid any default panel
        // panels: { defaults: [] },
        canvas : {
            // scripts: ['https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js']
        }
        // canvas: {
        //     styles: [
        //         {
        //             href: 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
        //             rel: "stylesheet",
        //             integrity: "sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2",
        //             crossorigin: "anonymous"
        //         }
        //     ],
        //     scripts: [
        //         // { href: '/public/css/app.css' }
        //         // {
        //         //     src: 'https://code.jquery.com/jquery-3.5.1.slim.min.js',
        //         //     integrity: "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj",
        //         //     crossorigin: "anonymous"
        //         // },
        //         // {
        //         //     src: 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
        //         //     integrity: "sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx",
        //         //     crossorigin: "anonymous"
        //         // }
        //     ],
        // },
    });
    editor.Panels.getButton('views', 'open-blocks').set('active', true)

    // text
    editor.BlockManager.add('custom-text-editor', {
        label: 'custom text editor',
        attributes: {class: 'droppable'},
        content: {
            type: 'text',
            script: function () {
                alert('asdasd')
            },
            style: {
                width: '100px',
                height: '30px',
            }
        },
    });

    // submit button with script
    editor.BlockManager.add('submit-button', {
        label: 'Submit button',
        attributes: {class: 'default-wrapper droppable submit-button'},

        content:
        //     {
        //     type: 'button',
        //     script: function () {
        //         let button = this.querySelector('.submit-button');
        //         button.addEventListener('click', () => alert('hello'))
        //     },
        //     style: {
        //         'background-color': 'blue',
        //         color: 'white',
        //         border: '1px solid grey'
        //     }
        // }
            `
                    <button class="submit-button droppable" ng-click="$ctrl.testfunc()">Отправить заявку</button>
                    <style>
                        .submit-button {
                            background-color: blue;
                            color: white;
                            border: 1px solid grey;
                        }
                    </style>
                    <script type="text/javascript">
                        let button = this.querySelector('.submit-button');
                        button.addEventListener('click', () => alert('hello'))
                    </script>
                `
    });

    // is a container in which we can drop elements with class droppable
    editor.BlockManager.add('card-drop-component', {
        label: 'Card',
        content: `
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                    <div data-gjs-droppable=".droppable" class="droppable-container card">
                        <div class="card-header">some header text</div>
                        <div class="card-body"><span class="text-muted">some body text</span></div>
                        <div class="card-footer custom-footer"></div>
                    </div>
                     <style>
                         .droppable-container {
                            width: 300px;
                            height: 200px;
                         }
                         .custom-footer {
                            display: flex;
                            justify-content: flex-end;
                         }
                     </style>`
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

    const cssComposer = editor.CssComposer;
    // cssComposer.setRule('.submit-button', {
    //     'background-color': 'blue',
    //
    //     color: 'white',
    //     border: '1px solid white'
    // });

    // important to make canvas work right, do not touch, always set attributes: {class: 'default-wrapper'} on every new block (except droppable components)
    // droppable components should not use it, otherwise they will not be able to be droppable
    cssComposer.setRule('.default-wrapper', {
        display:'inline-block'
    });

    return editor;
}

export default buildConstructor;
