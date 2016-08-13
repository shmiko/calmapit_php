/* globals Util */

var User = Backbone.Model.extend({
	urlRoot: Util.api + '/user',

	defaults: {
		id: undefined,
		fname: undefined,
		lname: undefined,
		email: undefined,
		password: undefined,
		hashed: false
	},

	login: function(options) {
		console.log("[User] Logging in");

		var that = this;

		$.ajax({
			url: this.urlRoot + '/check',
			type: 'POST',
			dataType: 'json',
			data: this.toJSON(),
			success: function(response) {
				if(response.status === "success") {
					that.set(response.data);
					that.set("hashed", true);
				}

				if(options !== undefined) {
					options.callback(response.status, response.message);
				}
			}
		});
	}
});