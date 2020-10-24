import angular from "angular";
import buildConstructor from '../../webBuilderUtil/grapejsBuilder';

angular
    .module('app')
    .component('programsCreateForm', {
        template: require('./programs-create-form.html'),
        controller: ['$compile', '$sce', 'moment', '$http', controller],
        bindings: {
            //
        }
    });

function controller($compile, $sce, moment, $http) {

	let $ctrl = this;

	$ctrl.step = 1;
	$ctrl.title = null;
	$ctrl.shortDescription = null;
	$ctrl.limitDate = null;
	$ctrl.startDate = null;
	$ctrl.endDate = null;
	$ctrl.content = null;
	$ctrl.passportHtml = null;
    let editor = null;

	$ctrl.$onInit = function () {
	    editor = buildConstructor('gjsProgramPassport');
    };

	$ctrl.toStep = (step) => {
	    if (step === 3) {
            $ctrl.passportHtml = editor.getHtml();
            $ctrl.passportHtml += `<style>${editor.getCss()}</style>`;
            $ctrl.passportHtml = $sce.trustAsHtml($ctrl.passportHtml)
            $compile($ctrl.passportHtml)($ctrl);
	        console.log($ctrl.passportHtml);
        }
		$ctrl.step = step;
	};

	$ctrl.testfunc = function () {
	    console.log('func test')
    }

	$ctrl.save = function () {
		$ctrl.loading = true;

		$http
			.post('/control-panel/programs', {
				title: $ctrl.title,
				short_description: $ctrl.shortDescription,
				limit_date: $ctrl.limitDate ? moment($ctrl.limitDate).format('YYYY-MM-DD') : null,
				start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
				end_date: $ctrl.endDate ? moment($ctrl.endDate).format('YYYY-MM-DD') : null,
				content: $ctrl.content,
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
