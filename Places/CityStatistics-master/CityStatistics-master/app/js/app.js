'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', '$httpProvider',function($routeProvider,$httpProvider) {
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];

  $routeProvider.when('/states', {templateUrl: 'partials/states.html', controller: 'StatesController'});
  $routeProvider.when('/cities/:state', {templateUrl: 'partials/cities.html', controller: 'CitiesController'});
  $routeProvider.when('/detail/:state/city/:city', {templateUrl: 'partials/details.html', controller: 'DetailController'});
        $routeProvider.otherwise({redirectTo: '/states'});
}]);
