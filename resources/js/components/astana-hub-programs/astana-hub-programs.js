import angular from "angular";

angular
    .module('app')
    .component('astanaHubPrograms', {
        template: require('./astana-hub-programs.html'),
        controller: [controller],
        bindings: {
            'programs': '<'
        }
    });

function controller() {

    this.$onInit = () => {
        console.log(this.programs);
    }
}
