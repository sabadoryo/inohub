import angular from "angular";

angular
    .module('app')
    .component('formCreateForm', {
        template: require('./form-create-form.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	window.t = this;

	$ctrl.filesTypes = [
        {key: 'img', value: 'Изображение'},
        {key: 'pdf', value: 'PDF'},
        {key: 'excel', value: 'Excel'},
        {key: 'word', value: 'Word'},
        {key: 'ppx', value: 'Powerpoint'},
        {key: 'audio', value: 'Аудио'},
        {key: 'video', value: 'Видео'},
    ];

	$ctrl.title = null;
	$ctrl.description = null;
	$ctrl.fields = [];

	$ctrl.$onInit = function () {
	    $ctrl.addField();
    };

	$ctrl.addField = function () {
        $ctrl.fields.push({
            type: 'text',
            label: null,
            isRequired: false,
            prompt: null,
            options: null,
            otherOption: false,
            maxFilesCount: null,
            fileAllows: null,
            fileTypes: null,
        });
    };

	$ctrl.delField = function (ind) {
	    if (confirm('Вы действительно хотите удалить поле?')) {
            $ctrl.fields.splice(ind, 1);
        }
    };

	$ctrl.fieldTypeChanged = function (field) {
        field.options = null;
        field.otherOption = false;
        field.maxFilesCount = null;
        field.fileAllows = null;
        field.fileTypes = null;

	    if (field.type == 'radio' || field.type == 'checkbox' || field.type == 'select') {
            field.options = [];
            field.options.push({val: null});
        }

	    if (field.type == 'file') {
            field.maxFilesCount = 1;
            field.fileAllows = 'any';
            field.fileTypes = [];
        }
	};

	$ctrl.addOption = function (field) {
        field.options.push({val: null});
    };

	$ctrl.delOption = function (field, ind) {
	    field.options.splice(ind, 1);
    };

	$ctrl.submit = function () {
	    $ctrl.loading = true;

        $http
            .post(`/control-panel/forms`, {
                title: $ctrl.title,
                description: $ctrl.description,
                fields: $ctrl.fields,
            })
            .then(
                res => {
                    $ctrl.loading = false;
                },
                err => {
                    $ctrl.loading = false;
                }
            );
    };
}

