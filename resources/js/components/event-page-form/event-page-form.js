import angular from "angular";
import buildConstructor from "../../webBuilderUtil/grapejsBuilder";

angular
    .module('app')
    .component('eventPageForm', {
        template: require('./event-page-form.html'),
        controller: ['$uibModal', '$http', controller],
        bindings: {
            event: '<',
        }
    });

function controller($uibModal, $http) {

    let $ctrl = this;
    let editor;

    $ctrl.$onInit = function () {
        $ctrl.passport = $ctrl.event.passport;
        editor = buildConstructor('gjsEventBuilder', {
            passport: $ctrl.passport
        });
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Данная мероприятие сразу же появиться в ленте у пользователей",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then((result) => {
            if (result.isConfirmed) {
                $http
                    .post(`/control-panel/events/${$ctrl.event.id}/publish`)
                    .then(
                        function () {
                            Swal.fire('Успешно опубликована', '', 'success');
                            $ctrl.event.status = 'published';
                        }
                    );
            }
        })
    };
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
            .post(`/control-panel/events/${$ctrl.event.id}/update-page`, {
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
