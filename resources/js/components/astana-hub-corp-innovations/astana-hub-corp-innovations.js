import angular from "angular";

angular
    .module('app')
    .component('astanaHubCorpInnovations', {
        template: require('./astana-hub-corp-innovations.html'),
        controller: ['applicationWindow', controller],
        bindings: {
            //
        }
    });

function controller(applicationWindow) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        //
    };

	$ctrl.openApplicationModalForTask = function () {
	    applicationWindow
            .open({
                resolve: {
                    entityType: function () {
                        return 'corp-task';
                    },
                    entityId: function () {
                        return null;
                    }
                }
            })
    };
}
