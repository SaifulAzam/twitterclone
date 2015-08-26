(function() {

    'use strict';

    angular
        .module('TwitterApp')
        .controller('ProfileController', ProjectShow);

    function ProjectShow($scope, $http, $routeParams) {

        $http.get('/api/v1/users/' + $routeParams.id).success(function(data) {
            $scope.user = data;
        });

        $http.get('/api/v1/users/'  + $routeParams.id + '/tweets').success(function(data) {
            $scope.tweets = data;
        });

    }

})();
