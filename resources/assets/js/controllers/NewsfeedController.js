(function() {

    'use strict';

    angular
        .module('TwitterApp')
        .controller('NewsfeedController', functionName);

    function functionName($scope, $http, $rootScope) {

        $scope.newsfeeds = [];

        $http.get('/api/v1/users/1').success(function(data) {
            $scope.user = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/1/followers').success(function(data) {
            $scope.followers = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/1/following').success(function(data) {
            $scope.following = data;
        }).error(function(error) {
            $scope.error = error;
        });

        $http.get('/api/v1/users/1/newsfeed').success(function(data) {
            $scope.newsfeeds = data.data;
        }).error(function(error) {
            $scope.error = error;
        });


        $scope.newTweet = function() {

            var tweet = {
                user_id: $rootScope.currentUser.id,
                message: $scope.tweetMessage
            };

            $scope.newsfeeds.push(tweet);

            $http.post('/api/v1/tweets', tweet);

        };

    }

})();
