import angular from "angular";

angular
    .module('app')
    .component('hubSpaceTenantsCreate', {
        template: require('./hub-space-tenants-create.html'),
        controller: ['$http', 'notify', 'moment', controller],
        bindings: {
            app: '<',
        }
    });

function controller($http, notify, moment) {

    let $ctrl = this;

    $ctrl.companyName = null;
    $ctrl.userId = null;
    $ctrl.phone = null;
    $ctrl.numberOfSeats = null;
    $ctrl.startDateTime = null;
    $ctrl.endDateTime = null;

    $ctrl.$onInit = function () {
        getUsersList();
        if ($ctrl.app) {
            $ctrl.userId = $ctrl.app.entity_id;
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
            $ctrl.companyName = companyName.value;
        }

        let phone = fields.find(v => v.label === 'Номер телефона');

        if (phone) {
            $ctrl.phone = phone.value;
        }

        let numberOfSeats = fields.find(v => v.label === 'Количество мест');

        if (numberOfSeats) {
            $ctrl.numberOfSeats = numberOfSeats.value;
        }

        let startDateTime = fields.find(v => v.label === 'Дата начала');

        if (startDateTime) {
            $ctrl.startDateTime = moment(startDateTime.value, 'DD.MM.YYYY').toDate();
        }

        let endDateTime = fields.find(v => v.label === 'Дата окончания');

        if (endDateTime) {
            $ctrl.endDateTime = moment(endDateTime.value, 'DD.MM.YYYY').toDate();
        }
    }

    $ctrl.submit = function () {

        if ($ctrl.numberOfSeats <= 0) {
            notify({
                message: 'Пожалуйста введите положительное количество мест',
                duration: 2000,
                position: 'top',
                classes: 'alert-danger'
            });

            return;
        }
        let params = {
            companyName: $ctrl.companyName,
            userId: $ctrl.userId,
            phone: $ctrl.phone,
            numberOfSeats: $ctrl.numberOfSeats,
            startDateTime: moment($ctrl.startDateTime).format('YYYY-MM-DD'),
            endDateTime: moment($ctrl.endDateTime).format('YYYY-MM-DD'),
        };

        $http
            .post('/control-panel/hub-space-tenants', params)
            .then(
                res => {
                    window.location.href = `/control-panel/hub-space-tenants?success_message=${res.data.message}`;
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

    function getUsersList () {
        $http
            .get('/control-panel/get-users-list')
            .then(
                function (response) {
                    $ctrl.users = response.data.users;
                }
            )
    }
}
