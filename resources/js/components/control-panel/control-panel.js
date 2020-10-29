import angular from "angular";

angular
    .module('app')
    .config(['ChartJsProvider', function (ChartJsProvider) {
        ChartJsProvider.setOptions({
            chartColors: ['#62fc03', '#03bafc'],
            responsive: false
        });
        ChartJsProvider.setOptions('line', {
            showLines: true
        });
    }])
    .component('controlPanel', {
        template: require('./control-panel.html'),
        controller: ['$http', 'moment', controller],
        bindings: {
            //
        }
    });

function controller($http, moment) {

	let $ctrl = this;

	$ctrl.appDateRange = 'day';
    $ctrl.userAppsDateRange = 'day';
	$ctrl.labels = [];

	$ctrl.$onInit = function () {
        getApplicationsList();
        getChartMembersList();
        getUsersList();

        for (let i = 30; i >= 0; i--) {
            let date = _.cloneDeep(moment().subtract(i, 'days').format('DD.MM'));
            $ctrl.labels.push(date);
        }
        console.log($ctrl.labels);
    };

	function getApplicationsList () {
	    $http
            .get('/control-panel/get-applications-list', {
                params: {
                    app_date_range: $ctrl.appDateRange
                }
            })
            .then(
                function (response) {
                    $ctrl.openApps = response.data.open;
                    $ctrl.openApps.count = Object.keys(response.data.open).length;
                    $ctrl.closedApps = response.data.closed;
                    $ctrl.closedApps.count = Object.keys(response.data.closed).length;
                    $ctrl.processingApps = response.data.processing;
                    $ctrl.processingApps.count = Object.keys(response.data.processing).length;
                }
            );
    }

    function getChartMembersList () {
        $http
            .get('/control-panel/get-chart-members-list')
            .then(
                function (response) {
                    $ctrl.chartMembers = response.data.chartMembers;
                    console.log($ctrl.chartMembers);
                }
            );
    }

    function getUsersList () {
        $http
            .get('/control-panel/get-users-list', {
                params: {
                    user_apps_date_range: $ctrl.userAppsDateRange
                }
            })
            .then(
                function (response) {
                    $ctrl.users = response.data.users;
                    console.log($ctrl.users);
                }
            );
    }

    $ctrl.changeAppDateRange = function (type) {
	    $ctrl.appDateRange = type;
	    getApplicationsList();
    };

    $ctrl.changeUserAppsDateRange = function (type) {
        $ctrl.userAppsDateRange = type;
        getUsersList();
    };
}






//
//
//
// function controller ($http, moment) {
//
//     let $ctrl = this;
//
//     $ctrl.labels = [];
//     $ctrl.data = [];
//
//     $ctrl.$onInit = function () {
//         $ctrl.today = moment();
//         $ctrl.getData(-20, 0);
//     };
//
//     $ctrl.getData = function (start, end) {
//
//         $ctrl.loading = true;
//
//         let startDate = $ctrl.today.clone().add(start, 'days').format('YYYY-MM-DD');
//         let endDate = $ctrl.today.clone().add(end, 'days').format('YYYY-MM-DD');
//
//         for (let i = end; i >= start; i--) {
//             $ctrl.data.unshift(0);
//             $ctrl.labels.unshift($ctrl.today.clone().add(i, 'days').format('D MMM'));
//         }
//
//         $http
//             .get('/admin/get-users-chart-data', {
//                 params: {
//                     start_date: startDate,
//                     end_date: endDate
//                 }
//             })
//             .then(
//                 function (response) {
//
//                     $ctrl.loading = false;
//
//                     let totals = response.data;
//
//                     totals.forEach(function (item) {
//                         let diff = $ctrl.today.diff(item.create_date, 'days');
//                         let ind = $ctrl.data.length - 1 - diff;
//                         $ctrl.data[ind] = item.count;
//                     });
//
//                     $ctrl.prev = start;
//                 },
//             );
//     };
//
//     $ctrl.showMorePrevious = function () {
//         $ctrl.getData($ctrl.prev - 7, $ctrl.prev - 1);
//     };
//
// }
