'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
  controller('StatesController', ['$scope','$http',function($scope,$http) {
    $scope.states=[];
    delete $http.defaults.headers.common['X-Requested-With'];

    $http({method: 'GET', url: 'http://ec2-184-73-40-119.compute-1.amazonaws.com:35125/States'}).
        success(function(data, status, headers, config) {
            // this callback will be called asynchronously
            // when the response is available
            $scope.states=data;
        }).
        error(function(data, status, headers, config) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
  }])
  .controller('CitiesController', ['$scope','$http','$routeParams',function($scope,$http,$routeParams) {
        $scope.cities=[];
        $scope.state=$routeParams.state;
        delete $http.defaults.headers.common['X-Requested-With'];

        $http({method: 'GET', url: 'http://ec2-184-73-40-119.compute-1.amazonaws.com:35125/Cities/state/' + $scope.state}).
            success(function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
                $scope.cities=data;
            }).
            error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
    }])

   .controller('DetailController', ['$scope','$http','$routeParams',function($scope,$http,$routeParams) {
        $scope.city=$routeParams.city;
        $scope.state=$routeParams.state;
        delete $http.defaults.headers.common['X-Requested-With'];

        $scope.aggregatePopulation=function(details){
            var result = 0;

            angular.forEach(details,function(detail){
                result+=detail.pop;
            });

            return result;

        };

        $http({method: 'GET', url: 'http://ec2-184-73-40-119.compute-1.amazonaws.com:35125/City/state/' + $scope.state + '/city/' + $scope.city}).
            success(function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
                $scope.details=data[0].details;
                $scope.totalPopulation = $scope.aggregatePopulation($scope.details);
            }).
            error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
    }]);