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

            if (data.type === 'file') {
                let fileName;
                let filePath;
                let new_data = {};
                let old_data = {};
                for (let i = 0; i < data.new_value.length; i++) {
                    fileName = data.new_value_names[i];
                    filePath = data.new_value[i];
                    new_data[fileName] = filePath;
                }
                data.new_data = new_data;
                for (let i = 0; i < data.old_value.length; i++) {
                    fileName = data.old_value_names[i];
                    filePath = data.old_value[i];
                    old_data[fileName] = filePath;
                }
                data.old_data = old_data;
            } else {
                if (Array.isArray(data.new_value)) {
                    data.new_value_stringified = data.new_value.join(',');
                }
                if (Array.isArray(data.old_value)) {
                    data.old_value_stringified = data.old_value.join(',');
                }
            }
        })
    };
}
