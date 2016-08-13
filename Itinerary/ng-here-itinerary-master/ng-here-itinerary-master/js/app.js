/*global angular:true*/
(function() {
	'use strict';

	var app = angular.module('itinerary', [
		'itinerary.directives',
		'ui.sortable'
	]);

	angular.module('itinerary.directives', ['hereAPI']);

	app.controller('MainCtrl', ['$scope', function($scope) {
		var waypoints = $scope.waypoints = [];

		$scope.sortableOptions = {
			axis: 'y'
		};

		$scope.removeWaypoint = function(waypoint) {
			waypoints.splice(waypoints.indexOf(waypoint), 1);
		};
	}]);

})();