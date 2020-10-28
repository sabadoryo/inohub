import angular from "angular";

angular
    .module('app')
    .component('smartStoreTaskCompaniesCreate', {
        template: require('./smart-store-task-companies-create.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            //
        }
    });

function controller(Upload, notify) {

    let $ctrl = this;

    $ctrl.name = null;
    $ctrl.link = null;
    $ctrl.manufacturedProducts = null;
    $ctrl.actualTasks = null;
    $ctrl.embeddedTasks = null;
    $ctrl.fullyBP = null;
    $ctrl.partlyBP = null;
    $ctrl.address = null;
    $ctrl.image = null;

    $ctrl.$onInit = function () {};

    $ctrl.submit = function () {

        if (!$ctrl.image) {
            notify({
                message: 'Добавьте изображение',
                duration: 2000,
                position: 'top',
                classes: 'alert-danger'
            });

            return;
        }

        let params = {
            name: $ctrl.name,
            link: $ctrl.link,
            manufacturedProducts: $ctrl.manufacturedProducts,
            fullyBP: $ctrl.fullyBP,
            partlyBP: $ctrl.partlyBP,
            actualTasks: $ctrl.actualTasks,
            embeddedTasks: $ctrl.embeddedTasks,
            address: $ctrl.address,
            image: $ctrl.image,
        };


        Upload
            .upload({
                url: '/control-panel/sm/tasks',
                data: params
            })
            .then(
                res => {
                    window.location.href = `/control-panel/sm/tasks?success_message=${res.data.message}`;
                },
                err => {
                    notify({
                        message: err.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    })
                }
            );
    };
}
