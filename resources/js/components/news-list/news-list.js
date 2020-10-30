import angular from "angular";

angular
    .module('app')
    .component('newsList', {
        template: require('./news-list.html'),
        controller: ['$http', controller],
        bindings: {
            news: '<',
            newsCount: '<',
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;
    $ctrl.display = true;

    $ctrl.$onInit = () => {
    };

	$ctrl.loadMore = () => {
	    $ctrl.page++;

	    $http
            .get('/get-news-list', {
                params: {
                    page: $ctrl.page
                }
            })
            .then(
                res => {
                    res.data.forEach(newsItem => {
                        $ctrl.news.push(newsItem);
                    });
                }
            );
    };
}