/* globals Util: true, Day: true */

var Days = Backbone.Collection.extend({
	model: Day,
	url: Util.api + "/days",

	save: function(callback) {
		function checkState(count, length, data, callback) {
			if(count === length) {
				console.log("[Days] Save complete, making the callback");

				if(callback !== undefined && data !== undefined) {
					callback(data);
				}
			}
		}

		var i = 0;
		var total = this.length;
		var responses = [];
		this.each(function(day, index) {
			day.save(null, {
				success: function(model, response) {
					i++;
					responses.push(response);

					checkState(i, total, response, callback);
				},
				error: function(model, response) {
					i++;
					responses.push(response);

					checkState(i, total, response, callback);
				}
			});

		}, this);
	}
});