import angular from "angular";

angular
    .module('app')
    .component('applicationActionDetailsModal', {
        template: require('./application-action-details-modal.html'),
        controller: [controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&',
        }
    });

function controller() {

    let $ctrl = this;

    $ctrl.$onInit = function () {
        console.log($ctrl.resolve.action.additional_data);
        $ctrl.resolve.action.additional_data.forEach(data => {
            data.new_value_stringified = null;
            data.old_value_stringified = null;

            if (Array.isArray(data.new_value)) {
                data.new_value_stringified = data.new_value.join(',');
            }
            if (Array.isArray(data.old_value)) {
                data.old_value_stringified = data.old_value.join(',');
            }
        })
    };
}
