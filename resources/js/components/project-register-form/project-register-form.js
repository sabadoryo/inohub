import angular from "angular";

angular
    .module('app')
    .component('projectRegisterForm', {
        template: require('./project-register-form.html'),
        controller: ['$http', 'Upload', controller],
        bindings: {
            //
        }
    });
    
function controller($http, Upload) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
    };

	$ctrl.submit = () => {
	    let url = '/register-project';
	    let params = {
	        title: $ctrl.title,
            link: $ctrl.link,
            image: $ctrl.image,
            company_name: $ctrl.companyName,
            description: $ctrl.description,
        };
        Upload.upload({
            url: url,
            data: params,
        }).then((res) => {
            window.Swal.fire({
                icon: 'success',
                title: 'Отправлено на проверку',
                timer: 2000,
                showConfirmButton: false,
            }).then(() => {
                window.location = '/';
            });
        }, (error) => {

        })
    }
}