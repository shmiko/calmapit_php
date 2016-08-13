/* globals App, Util */

(function() {
	function init() {
		// Custom jQuery functions
		Util.CustomJqueryFunctions();

		// Custom Handlebars functions
		Util.CustomHandlebarsFunctions();

		// Start application
		var app = new App();
		$('body').prepend(app.render().$el);

		// Hide address bar immediately
		window.scrollTo(0, 1);

		// Fastclick
		$(function() {
		    FastClick.attach(document.body);
		});

		// nsProgress
        $('#progress_modal').nsProgress({ img_path: 'layout/images/vendor/nsprogress' });
	}

	init();
})();