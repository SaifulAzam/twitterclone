(function() {

    'use strict';

    angular
        .module('TwitterApp')
        .controller('ProfileController', Profile);

    function Profile($scope, $http, $rootScope) {
        
        $http.get('/api/v1/users/' + $rootScope.currentUser.id).success(function(data) {
            $scope.user = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/' + $rootScope.currentUser.id + '/followers').success(function(data) {
            $scope.followers = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/' + $rootScope.currentUser.id + '/following').success(function(data) {
            $scope.following = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/' + $rootScope.currentUser.id + '/tweets').success(function(data) {
            $scope.tweets = data.data;
        }).error(function(error) {
            $scope.error = error;
        });


    }

})();
