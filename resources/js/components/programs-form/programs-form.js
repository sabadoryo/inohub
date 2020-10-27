import angular from "angular";
import buildConstructor from '../../webBuilderUtil/grapejsBuilder';

angular
    .module('app')
    .component('programsCreateForm', {
        template: require('./programs-create-form.html'),
        controller: ['$rootScope', '$compile', '$sce', 'moment', '$http', controller],
        bindings: {
            forms: '<',
        }
    });

function controller($rootScope, $compile, $sce, moment, $http) {

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
	$ctrl.selectedForm = null;
	$ctrl.selectedForms = [];

	$ctrl.$onInit = function () {
	    editor = buildConstructor('gjsProgramPassport');
	    console.log(editor);
    };

	$ctrl.addForm = function () {
		$ctrl.selectedForms.push($ctrl.selectedForm);
	};

	$ctrl.toStep = (step) => {
	    if (step === 3) {
            $ctrl.passportHtml = `
                <html>
                    <head>
                        <link rel="stylesheet" href="/css/style.css">
                    </head>
                    <body>
                        ${editor.getHtml()}
                    </body>
                </html>
            `;
            let iframe = document.getElementById('passportResult');
            iframe.contentWindow.document.open('text/htmlreplace');
            iframe.contentWindow.document.write($ctrl.passportHtml);
            iframe.contentWindow.document.close();

	        console.log('$ctrl.passportHtml', $ctrl.passportHtml);
        }
		$ctrl.step = step;
	};

	$ctrl.testfunc = function () {
	    alert('func test')
    }

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
