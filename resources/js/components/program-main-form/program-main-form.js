import angular from "angular";

angular
    .module('app')
    .component('programMainForm', {
        template: require('./program-main-form.html'),
        controller: ['notify', 'moment', '$http', controller],
        bindings: {
            categories: '<',
            program: '<',
        }
    });
    
function controller(notify, moment, $http) {
 
	let $ctrl = this;

    $ctrl.limitDateStatus = false;
    $ctrl.termDateStatus = false;

	$ctrl.$onInit = function () {
	    $ctrl.title = $ctrl.program.title;
	    $ctrl.categoryId = $ctrl.program.program_category_id;
	    if ($ctrl.program.limit_date) {
            $ctrl.limitDate = moment($ctrl.program.limit_date).toDate();
            $ctrl.limitDateStatus = true;
        }
	    if ($ctrl.program.end_date || $ctrl.program.start_date) {
            $ctrl.startDate = moment($ctrl.program.start_date).toDate();
            $ctrl.endDate = moment($ctrl.program.end_date).toDate();
            $ctrl.termDateStatus = true;
        }
    };

	$ctrl.save = () => {
	    let url = '/control-panel/programs/' + $ctrl.program.id + '/update-main';
	    if (!$ctrl.limitDateStatus) {
	        $ctrl.limitDate = null;
        }
        if (!$ctrl.termDateStatus) {
            $ctrl.startDate = null;
            $ctrl.endDate = null;
        }
	    let params = {
	        title: $ctrl.title,
            category_id: $ctrl.categoryId,
            limit_date: $ctrl.limitDate ? moment($ctrl.limitDate).format('YYYY-MM-DD') : null,
            start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
            end_date: $ctrl.endDate ? moment($ctrl.endDate).format('YYYY-MM-DD') : null,
        };
	    $http.post(url, params).then(() => {
            window.Swal.fire({
                icon: 'success',
                title: 'Данные обнавлены',
                timer: 2000,
                showConfirmButton: false,
            });
        }, (error) => {
            notify({
                message: error.data.errors['title'][0],
                duration: 2000,
                classes: 'alert-danger',
            });
        });
    };
}