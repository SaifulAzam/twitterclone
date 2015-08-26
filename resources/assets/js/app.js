var paths = {
	'BOWER': '../../../vendor/bower_components/'
}

var angular = require('angular');
var angularRoute = require('angular-ui-router');
var satellizer = require('satellizer');

(function() {

    'use strict';

    angular
        .module('TwitterApp', ['ui.router', 'satellizer'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider) {

            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/v1/authenticate';

            // Redirect to the auth state if any other states
            // are requested other than users
            $urlRouterProvider.otherwise('/auth');

            $stateProvider
                .state('auth', {
                    url: '/auth',
                    templateUrl: '../templates/login.html',
                    controller: 'AuthController as auth'
                })
                .state('users', {
                    url: '/users',
                    templateUrl: '../templates/user.html',
                    controller: 'UserController as user'
                })
                .state('newsfeed', {
                    url: '/newsfeed',
                    templateUrl: '../templates/newsfeed.html',
                    controller: 'NewsfeedController'
                })
                .state('profile', {
                    url: '/profile',
                    templateUrl: '../templates/profile.html',
                    controller: 'ProfileController'
                });
        });
})();

var AuthController = require('./controllers/AuthController');
var UserController = require('./controllers/UserController');
var NewsfeedController = require('./controllers/NewsfeedController');
var ProfileController = require('./controllers/ProfileController');
