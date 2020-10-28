import angular from "angular";

angular
    .module('app')
    .component('smartStoreTaskCompaniesEdit', {
        template: require('./smart-store-task-companies-edit.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            company: '<'
        }
    });

function controller(Upload, notify) {

    let $ctrl = this;

    $ctrl.image = null;

    $ctrl.$onInit = function () {
        $ctrl.name = $ctrl.company.name;
        $ctrl.link = $ctrl.company.site;
        $ctrl.manufacturedProducts = $ctrl.company.manufactured_products;
        $ctrl.actualTasks = $ctrl.company.actual_tasks;
        $ctrl.embeddedTasks = $ctrl.company.embedded_tasks;
        $ctrl.fullyBP = $ctrl.company.fully_bp;
        $ctrl.partlyBP = $ctrl.company.partly_bp;
        $ctrl.address = $ctrl.company.address;
        $ctrl.imagePath = $ctrl.company.icon;
    };

    $ctrl.submit = function () {

        if (!$ctrl.image && !$ctrl.imagePath) {
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
            imagePath: $ctrl.imagePath,
        };

        if ($ctrl.image) {
            params['image'] =  $ctrl.image;
        }


        Upload
            .upload({
                url: `/control-panel/sm/tasks/${$ctrl.company.id}/update`,
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
