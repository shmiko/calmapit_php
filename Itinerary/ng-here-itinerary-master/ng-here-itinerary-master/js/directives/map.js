/*global angular:true*/
(function() {
	'use strict';
	angular.module('itinerary.directives')
		.directive('map', ['nokia', function(nokia) {

			var updateRoute = function(router, items, modes) {
				if (angular.isArray(items)) {
					var route_waypoints = new nokia.maps.routing.WaypointParameterList();
					items.forEach(function(item) {
						route_waypoints.addCoordinate(new nokia.maps.geo.Coordinate(item.position.latitude, item.position.longitude));
					});
					if (route_waypoints.size() > 1) {
						router.calculateRoute(route_waypoints, modes);
					}
				}
			};

			return {
				restrict: 'ACE',
				link: function(scope, element, attrs) {
					scope.map = new nokia.maps.map.Display(element[0], {
						zoomLevel: 10,
						center: [52.51, 13.4],
						components: [new nokia.maps.map.component.Behavior(),
							new nokia.maps.map.component.TypeSelector(),
							new nokia.maps.map.component.ZoomBar(),
							new nokia.maps.map.component.ContextMenu()
						]
					});
				},
				scope: {
					points: '='
				},
				controller: function($scope) {
					var router = new nokia.maps.routing.Manager(),
						router_modes = [{
							type: "fastest",
							transportModes: ["car"],
							trafficMode: "disabled",
							options: ""
						}],
						resultContainer;

					router.addObserver("state", function(observedRouter, key, value) {
						if (value == "finished") {
							// remove old container ...
							if (resultContainer) {
								$scope.map.objects.remove(resultContainer);
							}
							// ... reassign a new one
							resultContainer = new nokia.maps.map.Container();

							var routes = observedRouter.getRoutes(),
								route = routes[0],
								waypoints = route.waypoints,
								i, length = waypoints.length;
							
							// Add route polyline to the container
							resultContainer.objects.add(new nokia.maps.map.Polyline(route.shape, {
								pen : new nokia.maps.util.Pen({
									lineWidth: 5,
									strokeColor: "#F7A133"
								})
							}));

							// Add container to the map
							$scope.map.objects.add(resultContainer);

							// Iterate through all waypoints and add them to the container
							for (i = 0; i < length; i++) {
								resultContainer.objects.add(new nokia.maps.map.StandardMarker(waypoints[i].originalPosition, {
									text: i + 1
								}));
							}
							//Zoom to the bounding box of the route
							$scope.map.zoomTo(resultContainer.getBoundingBox(), false, "default");
						} else if (value == "failed") {
							alert("The routing request failed.");
						}
					});

					$scope.$watch('map', function(map) {
						$scope.$watch('points', function(points) {

							if (points.length > 1) {
								updateRoute(router, points, router_modes);
							} else if (points.length) {
								// remove old container ...
								if (resultContainer) {
									$scope.map.objects.remove(resultContainer);
								}
								// ... reassign a new one
								resultContainer = new nokia.maps.map.Container();


								var coordinate = new nokia.maps.geo.Coordinate(points[0].position.latitude, points[0].position.longitude),
									marker = new nokia.maps.map.StandardMarker(
										coordinate, {
										text: '1'
									});

								resultContainer.objects.add(marker);
								map.objects.add(resultContainer);
								map.setCenter(coordinate, "default");
							} else {
								if (resultContainer) {
									$scope.map.objects.remove(resultContainer);
								}
							}

						}, true);
					});
				}
			};
		}]);
})();