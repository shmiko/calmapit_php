/*global angular:true*/
(function() {
	'use strict';
	angular.module('itinerary.directives')
		.directive('mapSearchbox', ['nokia', function(nokia) {
			return {
				restrict: 'ACE',
				link: function(scope, element, attrs) {
					var searchbox = new nokia.places.widgets.SearchBox({
						targetNode: element[0],
						useGeoLocation: true,
						onResults: function(searchResponse) {
							if (searchResponse.results && searchResponse.results.items) {
								// Should be better to display a disambiguation list but for now 
								// I automatically select first result								
								if (scope.resultsList && searchResponse.results.items[0]) {
									scope.$apply(scope.resultsList.push(searchResponse.results.items[0]));
								}
								searchbox.select(' '); // clear searchbox
								searchbox.hideSuggestions();
							}
						}
					});
				},
				scope: {
					resultsList: '='
				}
			};
		}]);
})();