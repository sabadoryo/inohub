import angular from "angular";

angular
    .module('app')
    .component('programsForm', {
        template: require('./programs-form.html'),
        controller: ['moment', '$http', controller],
        bindings: {
            forms: '<',
        }
    });
    
function controller(moment, $http) {
 
	let $ctrl = this;

	$ctrl.step = 1;
	$ctrl.title = null;
	$ctrl.shortDescription = null;
	$ctrl.limitDate = null;
	$ctrl.startDate = null;
	$ctrl.endDate = null;
	$ctrl.content = null;
	$ctrl.selectedForm = null;
	$ctrl.selectedForms = [];

	$ctrl.$onInit = function () {
        //
    };

	$ctrl.addForm = function () {
		$ctrl.selectedForms.push($ctrl.selectedForm);
	};

	$ctrl.toStep = (step) => {
		$ctrl.step = step;
	};

	$ctrl.save = function () {
		$ctrl.loading = true;

		let selectedFormsIds = [];

		$ctrl.selectedForms.forEach(f => {selectedFormsIds.push(f.id)});

		$http
			.post('/control-panel/programs', {
				title: $ctrl.title,
				short_description: $ctrl.shortDescription,
				limit_date: $ctrl.limitDate ? moment($ctrl.limitDate).format('YYYY-MM-DD') : null,
				start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
				end_date: $ctrl.endDate ? moment($ctrl.endDate).format('YYYY-MM-DD') : null,
				content: $ctrl.content,
				selected_forms_ids: selectedFormsIds,
			})
			.then(
				function (response) {
					const id = response.data.id;

					let timerInterval;

					Swal.fire({
						title: 'Пасспорт программы сохранен!',
						html: 'Переход на страницу программ через <b></b> милисекунд',
						timer: 3000,
						icon: 'success',
						showConfirmButton: false,
						timerProgressBar: true,
						onBeforeOpen: () => {
							Swal.showLoading();
							timerInterval = setInterval(() => {
								const content = Swal.getContent();
								if (content) {
									const b = content.querySelector('b');
									if (b) {
										b.textContent = Swal.getTimerLeft()
									}
								}
							}, 100)
						},
						onClose: () => {
							clearInterval(timerInterval)
						}
					}).then(result => {
						window.location = '/control-panel/programs'
					});
				},
				function (error) {
					alert(error);
					// todo handle error
				}
			);
	};
}