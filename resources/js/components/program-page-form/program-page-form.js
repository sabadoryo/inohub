import angular from "angular";
import buildConstructor from "../../webBuilderUtil/grapejsBuilder";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: ['notify', '$http', '$uibModal', controller],
        bindings: {
            program: '<',
            passport: '<'
        }
    });

function controller(notify, $http, $uibModal) {

	let $ctrl = this;

	let editor;



	$ctrl.$onInit = function () {
        $ctrl.programId = $ctrl.program.id;
        editor = buildConstructor('gjsProgramPassport', {
            program: $ctrl.program,
            passport: $ctrl.passport
        });
        console.log(editor);
    };

	// $ctrl.test = () => {
    //     $ctrl.passportHtml = `
    //             <html>
    //                 <head>
    //                     <link rel="stylesheet" href="/css/style.css">
    //                 </head>
    //                 <body>
    //                     ${editor.getHtml()}
    //                 </body>
    //             </html>
    //         `;
    //     let iframe = document.getElementById('passportResult');
    //     iframe.contentWindow.document.open('text/htmlreplace');
    //     iframe.contentWindow.document.write($ctrl.passportHtml);
    //     iframe.contentWindow.document.close();
    //
    // };

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
        $ctrl.rawHtml = editor.getHtml() + `<style>${editor.getCss()}</style>`;
        console.log($ctrl.rawHtml)
        $ctrl.passportHtml = `
                <html>
                    <head>
                        <link rel="stylesheet" href="/css/style.css">
                        <link rel="stylesheet" href="/css/ui-components.css">
                    </head>
                    <body>
                        ${$ctrl.rawHtml}
                    </body>
                </html>
            `;
        let iframe = document.getElementById('passportResult');
        iframe.contentWindow.document.open('text/htmlreplace');
        iframe.contentWindow.document.write($ctrl.passportHtml);
        iframe.contentWindow.document.close();

        $http
            .post(`/control-panel/programs/${$ctrl.programId}/update-page`, {
                content: $ctrl.rawHtml
            })
            .then(res => {
                window.Swal.fire({
                    icon: 'success',
                    title: 'Данные обновлены',
                    timer: 2000,
                    showConfirmButton: false,
                });
                window.onbeforeunload = null; // Для того чтобы не выскакивало предупреждение о покидании страницы
            })
            .catch(err => {
                notify({
                    message: 'Ошибка!',
                    duration: 2000,
                    classes: 'alert-danger',
                });
            })
    }
}
