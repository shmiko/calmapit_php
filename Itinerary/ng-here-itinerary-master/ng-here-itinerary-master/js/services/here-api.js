/*global angular:true*/
(function() {
	'use strict';

	angular.module('hereAPI', ['config'])
		.factory('nokia', ['$window', 'config', function($window, config) {

			if (! $window.nokia) {
				throw("Nokia namespace is not defined. Inject HERE javascript API before your application.");
			}

			var nokia = $window.nokia;

			if (config && angular.isObject(config.hereAPI)) {
				Object.keys(config.hereAPI).forEach(function(key) {
					nokia.Settings.set(key, config.hereAPI[key]);
				});
			}

			return nokia;
		}]);
})();