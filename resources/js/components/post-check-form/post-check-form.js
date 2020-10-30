import angular from "angular";

angular
    .module('app')
    .component('postCheckForm', {
        template: require('./post-check-form.html'),
        controller: ['$http', controller],
        bindings: {
            post: '<',
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        $ctrl.data = $ctrl.post.data;
        console.log($ctrl.data[1].image);
    };

	$ctrl.submit = (status) => {
	    let url = '/admin/posts/' + $ctrl.post.id + '/update-status';
	    let params = {
	        status: status,
        }
	    $http.post(url, params).then(() => {
	        let message = status === 'accept' ? 'опубликованною' : 'отказано';
            window.Swal.fire({
                icon: 'success',
                title: 'Успешно ' + message,
                timer: 2000,
                showConfirmButton: false,
            }).then(() => {
                window.location = '/admin/posts';
            });
        });
    }
}