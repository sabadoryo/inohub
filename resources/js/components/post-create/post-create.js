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

	$ctrl.loading = false;
	$ctrl.$onInit = function () {

    };

	$ctrl.save = () => {
        $ctrl.loading = true;
        let url = '/posts'
        let params = {
            title: $ctrl.title,
            content_t: $ctrl.content ? $ctrl.content : null,
            image: $ctrl.image ? $ctrl.image : null,
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
            });
        }, (error) => {

        });
    }
}