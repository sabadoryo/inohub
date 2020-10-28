import angular from "angular";

angular
    .module('app')
    .component('smartStoreTaskCompaniesCreate', {
        template: require('./smart-store-task-companies-create.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            app: '<'
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

    $ctrl.$onInit = function () {
        if ($ctrl.app) {
            setAppData();
        }
    };

    function setAppData() {
        let fields = [];

        $ctrl.app.forms.forEach(form => {
            form.fields.forEach(field => {
                fields.push({
                    label: field.form_field.label,
                    value: field.value
                });
            });
        });

        let companyName = fields.find(v => v.label === 'Название компании');

        if (companyName) {
            $ctrl.name = companyName.value;
        }

        let image = fields.find(v => v.label === 'Логотип');

        if (image) {
            $ctrl.image = image.value[0];
            $ctrl.imageType = 'string';
        }

        let address = fields.find(v => v.label === 'Адрес компании');

        if (address) {
            $ctrl.address = address.value;
        }

        let link = fields.find(v => v.label === 'Сайт компании');

        if (link) {
            $ctrl.link = link.value;
        }

        let manufacturedProducts = fields.find(v => v.label === 'Виды выпускаемой продукции');

        if (manufacturedProducts) {
            $ctrl.manufacturedProducts = manufacturedProducts.value;
        }

        let fullyBP = fields.find(v => v.label === 'Полностью автоматизированные бизнес-процессы');

        if (fullyBP) {
            $ctrl.fullyBP = fullyBP.value;
        }

        let partlyBP = fields.find(v => v.label === 'Частично автоматизированные бизнес-процессы');

        if (partlyBP) {
            $ctrl.partlyBP = partlyBP.value;
        }

        let actualTasks = fields.find(v => v.label === 'Задачи');

        if (actualTasks) {
            $ctrl.actualTasks = actualTasks.value;
        }

        let embeddedTasks = fields.find(v => v.label === 'Системы, которые внедрены на предприятии');

        if (embeddedTasks) {
            $ctrl.embeddedTasks = embeddedTasks.value;
        }
    }

    $ctrl.imageChanged = function () {
        $ctrl.imageType = 'file';
    };

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
        };

        if ($ctrl.imageType === 'string') {
            params['imagePath'] = $ctrl.image;
        } else {
            params['image'] = $ctrl.image;
        }


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
