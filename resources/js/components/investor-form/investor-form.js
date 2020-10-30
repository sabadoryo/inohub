import angular from "angular";

angular
    .module('app')
    .component('investorForm', {
        template: require('./investor-form.html'),
        controller: ['Upload', controller],
        bindings: {
            dismiss: '&',
            close: '&',
        }
    });

function controller(Upload) {

    let $ctrl = this;

    $ctrl.about = null;
    $ctrl.interest = null;
    $ctrl.photo = null;

    $ctrl.$onInit = function () {
    };

    $ctrl.submit = () => {
        $ctrl.loading = true;

        Upload.upload({
            url: '/investors',
            data: {
                about: $ctrl.about,
                interest: $ctrl.interest,
                photo: $ctrl.photo,
            }
        }).then(
            res => {
                $ctrl.loading = false;
                Swal.fire(
                    'Отлично!',
                    `Данные отправлены на проверку. После проверки ваша карточка появится в списке`,
                    'success'
                ).then(res => {
                    $ctrl.close();
                });
            },
            err => {
                $ctrl.loading = false;
            }
        );
    };
}