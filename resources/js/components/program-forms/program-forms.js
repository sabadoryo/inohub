import angular from "angular";

angular
    .module('app')
    .component('programForms', {
        template: require('./program-forms.html'),
        controller: ['notify', '$http', '$uibModal', controller],
        bindings: {
            program: '<',
        }
    });
    
function controller(notify, $http, $uibModal) {
 
	let $ctrl = this;

	$ctrl.loadingSave = false;

	$ctrl.$onInit = function () {
		$ctrl.programForms = $ctrl.program.forms;
		$ctrl.getForms();
	};

	$ctrl.getForms = () => {
		$http
			.get('/control-panel/forms/get-all')
			.then((res) => {
				$ctrl.forms = res.data;
			});
	};

	$ctrl.openToPublishModal = () => {
		Swal.fire({
			icon: 'warning',
			title: 'Вы дейстивтельно хотиту опубликовать программу?',
			showConfirmButton: true,
			showCancelButton: true,
			confirmButtonText: 'Да',
			cancelButtonText: 'Отмена'
		}).then(
			res => {
				if (res.isConfirmed) {
					$http
						.post('/control-panel/programs/' + $ctrl.program.id + '/publish')
						.then(() => {
							$ctrl.program.status = 'published';
							Swal.fire(
								'Отлично!',
								'Программа успешно опубликована',
								'success'
							);
						});
				}
			}
		)
	};

	$ctrl.addForm = () => {
	    if (!$ctrl.form) {
			notify({
				message: 'Выберите форму',
				duration: 2000,
				classes: 'alert-danger',
			});
	        return ;
        }
		let ind = $ctrl.programForms.findIndex(v => v.id === $ctrl.form.id);
	    if (ind !== -1) {
			notify({
				message: 'Данная форма уже добавлена',
				duration: 2000,
				classes: 'alert-danger',
			});
			$ctrl.form = null;
			return ;
		}
	    $ctrl.programForms.push($ctrl.form);
	    $ctrl.form = null;
    };

    $ctrl.deleteForm = (index) => {
		notify({
			message: 'Форма удалена',
			duration: 2000,
			classes: 'alert-success',
		});
		$ctrl.programForms.splice(index, 1);
	};

	$ctrl.formDown = (index) => {
		if ($ctrl.programForms[index + 1]) {
			let x = $ctrl.programForms[index];
			$ctrl.programForms[index] = $ctrl.programForms[index + 1];
			$ctrl.programForms[index + 1] = x;
		}
	};

	$ctrl.formUp = (index) => {
		if ($ctrl.programForms[index - 1]) {
			let x = $ctrl.programForms[index];
			$ctrl.programForms[index] = $ctrl.programForms[index - 1];
			$ctrl.programForms[index - 1] = x;
		}
	};

	$ctrl.openFormCreate = () => {
		window.open('/control-panel/forms/create');
	};


	$ctrl.save = () => {
		$ctrl.loadingSave = true;
		let url = '/control-panel/programs/' + $ctrl.program.id + '/update-forms';
		let params = {
			forms: $ctrl.programForms,
		}
		$http.post(url, params).then(() => {
			$ctrl.loadingSave = false;
			window.Swal.fire({
				icon: 'success',
				title: 'Данные обновлены',
				timer: 2000,
				showConfirmButton: false,
			});
		}, (error) => {
			$ctrl.loadingSave = false;
			notify({
				message: 'Ошибка!',
				duration: 2000,
				classes: 'alert-danger',
			});
		});
	};
}