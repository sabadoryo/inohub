import angular from "angular";

angular
    .module('app')
    .component('newsMainForm', {
        template: require('./news-main-form.html'),
        controller: ['$uibModal', controller],
        bindings: {
            news: '<',
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
	    $ctrl.data = $ctrl.news.data;
	    $ctrl.title = $ctrl.news.title;
	    $ctrl.description = $ctrl.news.short_description;
    };

	$ctrl.save = () => {
	    console.log($ctrl.data);
    }

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
}