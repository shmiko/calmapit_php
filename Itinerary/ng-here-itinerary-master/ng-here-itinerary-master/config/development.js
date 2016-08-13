/*global angular:true*/
(function() {
	'use strict';

	angular.module('config', [])
		.factory('config', function() {
			return {
				/*	Setup authentication app_id and app_code 
				*	WARNING: this is a demo-only key
				*	please register for an Evaluation, Base or Commercial key for use in your app.
				*	Just visit http://developer.here.com/get-started for more details. Thank you!
				*/
				hereAPI : {
					app_id: 'DemoAppId01082013GAL',
					app_code: 'AJKnXv84fjrb0KIHawS0Tg',
					serviceMode: 'cit'
				}
			};
		});

})();