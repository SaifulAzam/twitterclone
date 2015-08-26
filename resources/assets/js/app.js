var paths = {
	'BOWER': '../../../vendor/bower_components/'
}

var angular = require('angular');
var angularRoute = require('angular-route');

(function() {

    'use strict';

    angular
        .module('TwitterApp', [
            'ngRoute'
        ])
        .config(['$routeProvider',
            function($routeProvider) {
                $routeProvider
                    .when('/', {
                        templateUrl: 'templates/newsfeed.html',
                        controller: 'NewsfeedController'
                    })
                    .when('/users/:id', {
                        templateUrl: 'templates/profile.html',
                        controller: 'ProfileController'
                    })
                    .otherwise({
                        redirectTo: '/'
                    });
            }
        ]);

})();

var NewsfeedController = require('./controllers/NewsfeedController');
var ProfileController = require('./controllers/ProfileController');
