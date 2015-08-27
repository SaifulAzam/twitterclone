var paths = {
    'BOWER': '../../vendor/bower_components/'
}

var angular = require('angular');
var angularRoute = require('angular-ui-router');
var satellizer = require('satellizer');
var foundation = require('../../../vendor/bower_components/angular-foundation/mm-foundation-tpls');

(function() {

    'use strict';

    angular
        .module('TwitterApp', [
            'ui.router',
            'satellizer',
            'mm.foundation'
        ])
        .config(function($stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

            function redirectWhenLoggedOut($q, $injector) {

                return {

                    responseError: function(rejection) {

                        // Need to use $injector.get to bring in $state or else we get
                        // a circular dependency error
                        var $state = $injector.get('$state');

                        // Instead of checking for a status code of 400 which might be used
                        // for other reasons in Laravel, we check for the specific rejection
                        // reasons to tell us if we need to redirect to the login state
                        var rejectionReasons = [
                            'token_not_provided',
                            'token_expired',
                            'token_absent',
                            'token_invalid'
                        ];

                        // Loop through each rejection reason and redirect to the login
                        // state if one is encountered
                        angular.forEach(rejectionReasons, function(value, key) {

                            if (rejection.data.error === value) {

                                // If we get a rejection corresponding to one of the reasons
                                // in our array, we know we need to authenticate the user so
                                // we can remove the current user from local storage
                                localStorage.removeItem('user');

                                // Send the user to the auth state so they can login
                                $state.go('auth');
                            }
                        });

                        return $q.reject(rejection);
                    }
                }
            }

            // Setup for the $httpInterceptor
            $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

            // Push the new factory onto the $http interceptor array
            $httpProvider.interceptors.push('redirectWhenLoggedOut');

            $authProvider.loginUrl = '/api/v1/authenticate';

            $urlRouterProvider.otherwise('/newsfeed');

            $stateProvider
                .state('auth', {
                    url: '/auth',
                    templateUrl: '../templates/login.html',
                    controller: 'AuthController as auth'
                })
                .state('users', {
                    url: '/users',
                    templateUrl: '../templates/users.html',
                    controller: 'UserController as user'
                })
                .state('user', {
                    url: '/users/:id',
                    templateUrl: '../templates/profile.html',
                    controller: 'UserController'
                })
                .state('profile', {
                    url: '/profile',
                    templateUrl: '../templates/profile.html',
                    controller: 'ProfileController'
                })
                .state('newsfeed', {
                    url: '/newsfeed',
                    templateUrl: '../templates/newsfeed.html',
                    controller: 'NewsfeedController'
                });
        })
        .run(function($rootScope, $state) {

            // $stateChangeStart is fired whenever the state changes. We can use some parameters
            // such as toState to hook into details about the state as it is changing
            $rootScope.$on('$stateChangeStart', function(event, toState) {

                // Grab the user from local storage and parse it to an object
                var user = JSON.parse(localStorage.getItem('user'));

                // If there is any user data in local storage then the user is quite
                // likely authenticated.
                if (user) {

                    // The user's authenticated state gets flipped to true.
                    $rootScope.authenticated = true;

                    // Putting the user's data on $rootScope allows
                    // us to access it anywhere across the app.
                    $rootScope.currentUser = user;

                    // If the user is logged in and we hit the auth route we don't need
                    // to stay there and can send the user to the main state
                    if (toState.name === "auth") {

                        // Preventing the default behavior allows us to use $state.go
                        // to change states
                        event.preventDefault();

                        // go to the "main" state which in our case is users
                        $state.go('newsfeed');
                    }
                }
            });
        });
})();

var AuthController = require('./controllers/AuthController');
var UserController = require('./controllers/UserController');
var NewsfeedController = require('./controllers/NewsfeedController');
var ProfileController = require('./controllers/ProfileController');
