import angular from "angular";

angular
    .module('app')
    .component('postCreate', {
        template: require('./post-create.html'),
        controller: ['Upload', controller],
        bindings: {
            //
        }
    });

function controller(Upload) {

	let $ctrl = this;

    $ctrl.data = [];
	$ctrl.loading = false;
	$ctrl.$onInit = function () {
    };

    $ctrl.addText = () => {
        $ctrl.data.push({
            type: 'text',
            content: null
        });
    };
    $ctrl.selectImageModal = () => {
        $ctrl.data.push({
            type: 'image',
            image: null,
        });
    }

	$ctrl.save = () => {
        $ctrl.loading = true;
        let url = '/posts'
        let params = {
            title: $ctrl.title,
            data: $ctrl.data,
        };
        Upload.upload({
            url: url,
            data: params,
        }).then((res) => {
            $ctrl.loading = false;
            window.Swal.fire({
                icon: 'success',
                title: 'Отправлено на проверку',
                timer: 2000,
                showConfirmButton: false,
            }).then(() => {
                window.location = '/';
            }, () => {
                $ctrl.loading = false;
            });
        }, (error) => {

        });
    }
}