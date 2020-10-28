import angular from "angular";
import buildConstructor from "../../webBuilderUtil/grapejsBuilder";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: ['$uibModal', controller],
        bindings: {
            program: '<',
        }
    });

function controller($uibModal) {

	let $ctrl = this;

	let editor;

	$ctrl.$onInit = function () {
        editor = buildConstructor('gjsProgramPassport');
        console.log(editor);
    };

	$ctrl.test = () => {
        $ctrl.passportHtml = `
                <html>
                    <head>
                        <link rel="stylesheet" href="/css/style.css">
                    </head>
                    <body>
                        ${editor.getHtml()}
                    </body>
                </html>
            `;
        let iframe = document.getElementById('passportResult');
        iframe.contentWindow.document.open('text/htmlreplace');
        iframe.contentWindow.document.write($ctrl.passportHtml);
        iframe.contentWindow.document.close();

    };

    $ctrl.openToPublishModal = () => {
        $uibModal
            .open({
                component: 'programToPublishModal',
                resolve: {
                    program: function () {
                        return $ctrl.program;
                    }
                }
            })
            .result
            .then(
                res => {
                    window.Swal.fire({
                        icon: 'success',
                        title: 'Опубликовано',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                },
                err => {

                }
            );
    };

    $ctrl.save = () => {
        $ctrl.passportHtml = `
                <html>
                    <head>
                        <link rel="stylesheet" href="/css/style.css">
                        <link rel="stylesheet" href="/css/ui-components.css">
                    </head>
                    <body>
                        ${editor.getHtml()}
                    </body>
                </html>
            `;
        let iframe = document.getElementById('passportResult');
        iframe.contentWindow.document.open('text/htmlreplace');
        iframe.contentWindow.document.write($ctrl.passportHtml);
        iframe.contentWindow.document.close();
    }
}
