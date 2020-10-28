import angular from "angular";

angular
    .module('app')
    .component('membersCreateForm', {
        template: require('./members-create-form.html'),
        controller: ['$http', 'Upload', 'notify', controller],
        bindings: {
            app: '<',
        }
    });
    
function controller($http, Upload, notify) {
 
	let $ctrl = this;

	$ctrl.activities = [
        {label: 'Разработка, внедрение, сопровождение, развитие, модификация и реализация программного обеспечения и программного продукта.'},
        {label: 'Создание, опытная и промышленная эксплуатация, внедрение, развитие, модификация, сопровождение информационных систем (за исключением информационных систем государственных органов).'},
        {label: 'Деятельность по обработке данных (обнаружение знаний в базах данных) с применением программного обеспечения.'},
        {label: 'Разработка, развитие, модификация, внедрение, эксплуатация и сопровождение программного обеспечения'},
    ];

	$ctrl.companyName = null;
	$ctrl.projectName = null;
	$ctrl.projectDescription = null;
	$ctrl.expectedResult = null;
	$ctrl.address = null;
    $ctrl.applicationFile = null;
    $ctrl.registerCertificateFile = null;
    $ctrl.absenceTaxFile = null;

    $ctrl.applicationFileUrl = null;
    $ctrl.registerCertificateFileUrl = null;
    $ctrl.absenceTaxFileUrl = null;

	$ctrl.$onInit = () => {
	    $ctrl.activities.forEach(item => item.isSelected = false);

	    if ($ctrl.app) {
	        setAppData();
        }
    };

	function setAppData() {

	    let fields = [];

	    $ctrl.app.forms.forEach(form => {
	        form.fields.forEach(field => {
	           fields.push({
                   label: field.form_field.label,
                   value: field.value
               });
            });
        });

	    let companyName = fields.find(v => v.label == 'Название компании');

	    if (companyName) {
	        $ctrl.companyName = companyName.value;
        }

        let projectName = fields.find(v => v.label == 'Название проекта');

        if (projectName) {
            $ctrl.projectName = projectName.value;
        }

        let projectDescription = fields.find(v => v.label == 'Описание проекта');

        if (projectDescription) {
            $ctrl.projectDescription = projectDescription.value;
        }

        let activities = fields.find(v => v.label == 'Сфера деятельности');

        if (activities) {
            let values = activities.value;
            $ctrl.activities.forEach(item => {
                if (values.indexOf(item.label) != -1) {
                    item.isSelected = true;
                }
            });
        }

        let expectedResult = fields.find(v => v.label == 'Описание ожидаемого конечного результата');

        if (expectedResult) {
            $ctrl.expectedResult = expectedResult.value;
        }

        let address = fields.find(v => v.label == 'Адрес');

        if (address) {
            $ctrl.address = address.value;
        }

        let applicationFileUrl = fields.find(v => v.label == 'Заявление на участие в качестве участника технопарка');

        if (applicationFileUrl) {
            $ctrl.applicationFileUrl = applicationFileUrl.value[0];
        }

        let registerCertificateFileUrl = fields.find(v => v.label == 'Справка о государственной регистрации');

        if (registerCertificateFileUrl) {
            $ctrl.registerCertificateFileUrl = registerCertificateFileUrl.value[0];
        }

        let absenceTaxFileUrl = fields.find(v => v.label == 'Сведения об отсутствии (наличии) налоговой задолженности');

        if (absenceTaxFileUrl) {
            $ctrl.absenceTaxFileUrl = absenceTaxFileUrl.value[0];
        }
    }

	$ctrl.submit = () => {

	    let selectedActivities = [];

	    $ctrl.activities.forEach(item => {
	        if (item.isSelected) {
                selectedActivities.push(item.label);
            }
        });

	    if (!selectedActivities.length) {
	        notify({
                message: 'Не выбрано сфера деятельности',
                classes: 'alert-danger',
                duration: 3000
            });
	        return;
        }

	    if ($ctrl.app) {
            if (!$ctrl.applicationFileUrl && !$ctrl.applicationFile) {
                notify({
                    message: 'Выберите файл заявление',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }

            if (!$ctrl.registerCertificateFileUrl && !$ctrl.registerCertificateFile) {
                notify({
                    message: 'Выберите файл регистрации',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }

            if (!$ctrl.absenceTaxFileUrl && !$ctrl.absenceTaxFile) {
                notify({
                    message: 'Выберите файл об отсутствии (наличии) налоговой задолженности',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }
        } else {
            if (!$ctrl.applicationFile) {
                notify({
                    message: 'Выберите файл заявление',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }

            if (!$ctrl.registerCertificateFile) {
                notify({
                    message: 'Выберите файл регистрации',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }

            if (!$ctrl.absenceTaxFile) {
                notify({
                    message: 'Выберите файл об отсутствии (наличии) налоговой задолженности',
                    classes: 'alert-danger',
                    duration: 3000
                });
                return;
            }
        }

        $ctrl.loading = true;

        Upload
            .upload({
                url: '/control-panel/members',
                data: {
                    application_id: $ctrl.app ? $ctrl.app.id : null,
                    company_name: $ctrl.companyName,
                    project_name: $ctrl.projectName,
                    project_description: $ctrl.projectDescription,
                    activities: selectedActivities,
                    expected_result: $ctrl.expectedResult,
                    address: $ctrl.address,
                    application_file: $ctrl.applicationFile,
                    register_certificate_file: $ctrl.registerCertificateFile,
                    absence_tax_file: $ctrl.absenceTaxFile,
                }
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    Swal.fire(
                        'Отлично!',
                        'Участник успешно зарегистрирован',
                        'success'
                    ).then(res => {
                        window.location = '/control-panel/members';
                    });
                },
                err => {
                    $ctrl.loading = false;
                }
            );
    };

    $ctrl.delApplicationFile = () => {
        $ctrl.applicationFileUrl = null;
    };

    $ctrl.delRegisterCertificateFile = () => {
        $ctrl.registerCertificateFileUrl = null;
    };

    $ctrl.delAbsenceTaxFile = () => {
        $ctrl.absenceTaxFileUrl = null;
    };
}