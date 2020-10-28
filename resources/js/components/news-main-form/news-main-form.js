import angular from "angular";

angular
    .module('app')
    .component('newsMainForm', {
        template: require('./news-main-form.html'),
        controller: ['$uibModal', 'Upload', 'notify', '$http', controller],
        bindings: {
            news: '<',
        }
    });
    
function controller($uibModal, Upload, notify, $http) {
 
	let $ctrl = this;

	$ctrl.loading = false;

	$ctrl.$onInit = function () {
	    $ctrl.data = $ctrl.news.data;
	    $ctrl.title = $ctrl.news.title;
	    // $ctrl.description = $ctrl.news.short_description;
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Данная публикация сразу же появиться в ленте у пользователей",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then((result) => {
            if (result.isConfirmed) {
                $http
                    .post(`/control-panel/news/${$ctrl.news.id}/publish`)
                    .then(
                        function () {
                            Swal.fire('Успешно опубликована', '', 'success');
                            $ctrl.news.status = 'published';
                        }
                    );
            }
        })
    };

    $ctrl.addText = () => {
        $ctrl.data.push({
            type: 'text',
            content: null
        });
    };

    $ctrl.upItem = (ind) => {
        if (ind > 0) {
            let t = $ctrl.data[ind - 1];
            $ctrl.data[ind - 1] = $ctrl.data[ind];
            $ctrl.data[ind] = t;
        }
    };

    $ctrl.downItem = (ind) => {
        if (ind < $ctrl.data.length - 1) {
            let t = $ctrl.data[ind + 1];
            $ctrl.data[ind + 1] = $ctrl.data[ind];
            $ctrl.data[ind] = t;
        }
    };

    $ctrl.removeDataItem = (key) => {
        if (confirm("Вы уверены?")) {
            $ctrl.data.splice(key, 1);
        }
    };

    $ctrl.selectImageModal = () => {
        $uibModal
            .open({
                component: 'newsUploadImage',
                size: 'md',
            })
            .result
            .then((result) => {
                    $ctrl.data.push({
                        type: 'image',
                        image: result
                    });
                },
                (err) => {

                }
            )
    };

	$ctrl.save = () => {
	    $ctrl.loading = true;
	    let url = '/control-panel/news/' + $ctrl.news.id + '/update-main';
	    let params = {
	        title: $ctrl.title,
            // short_description: $ctrl.description,
            data: $ctrl.data,
        };

        Upload.upload({
            url: url,
            data: params,
        }).then((response) => {
                $ctrl.loading = false;
                window.Swal.fire({
                    icon: 'success',
                    title: 'Сохранено',
                    timer: 2000,
                    showConfirmButton: false,
                });
            }, (error) => {
                $ctrl.loading = false;
                let checked = false;
                let message = '';
                angular.forEach(error.data.errors, (value, key) => {
                    if (!checked && value[0]) {
                        message += value[0];
                        checked = true;
                    }
                });
                notify({
                    message: message ? message : 'Неизвестная ошибка',
                    duration: 2000,
                    classes: 'alert-danger',
                });
            }
        );
    };
}