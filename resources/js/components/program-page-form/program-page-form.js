import angular from "angular";
import buildConstructor from "../../webBuilderUtil/grapejsBuilder";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: ['notify', '$http', '$uibModal', controller],
        bindings: {
            program: '<'
        }
    });

function controller(notify, $http, $uibModal) {

	let $ctrl = this;

	let editor;

	$ctrl.$onInit = function () {
        $ctrl.passport = $ctrl.program.passport;
        $ctrl.imagePaths
        editor = buildConstructor('gjsProgramPassport', {
            program: $ctrl.program,
            passport: $ctrl.passport
        });
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            icon: 'warning',
            title: 'Вы дейстивтельно хотиту опубликовать программу?',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then(
            res => {
                if (res.isConfirmed) {
                    $http
                        .post('/control-panel/programs/' + $ctrl.program.id + '/publish')
                        .then(() => {
                            $ctrl.program.status = 'published';
                            Swal.fire(
                                'Отлично!',
                                'Программа успешно опубликована',
                                'success'
                            );
                        });
                }
            }
        )
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

    $ctrl.save = () => {

        let rawHtml = editor.getHtml() + `<style>${editor.getCss()}</style>`;

        // $ctrl.passportHtml = `
        //         <html>
        //             <head>
        //                 <link rel="stylesheet" href="/css/style.css">
        //                 <link rel="stylesheet" href="/css/ui-components.css">
        //                 <link rel="stylesheet" href="/css/main.css">
        //             </head>
        //             <body>
        //                 ${$ctrl.rawHtml}
        //             </body>
        //         </html>
        //     `;
        // let iframe = document.getElementById('passportResult');
        // iframe.contentWindow.document.open('text/htmlreplace');
        // iframe.contentWindow.document.write($ctrl.passportHtml);
        // iframe.contentWindow.document.close();

        $http
            .post(`/control-panel/programs/${$ctrl.program.id}/update-page`, {
                content: rawHtml
            })
            .then(res => {
                window.Swal.fire({
                    icon: 'success',
                    title: 'Страница успешно обновлена',
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
