(function() {

    'use strict';

    angular
        .module('TwitterApp')
        .controller('NewsfeedController', functionName);

    function functionName($scope, $http) {

        $http.get('/api/v1/users/1').success(function(data) {
            $scope.user = data;
        });

        $http.get('/api/v1/users/1/newsfeed').success(function(data) {
            $scope.newsfeed = data;
        });

        $http.get('/api/v1/users/1/followers').success(function(data) {
            $scope.followers = data;
        });

        $http.get('/api/v1/users/1/following').success(function(data) {
            $scope.following = data;
        });

    }

})();
