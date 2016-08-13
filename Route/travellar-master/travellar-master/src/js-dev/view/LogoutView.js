/* globals Util */

var LogoutView = Backbone.View.extend({
	template: hbs.logout,

	initialize: function(options) {
		console.log("[LogoutView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;

		// Protected page
		Util.CheckLogin(this.model.user);
	},

	render: function() {
		this.$el.html(this.template());
		var that = this;

		setTimeout(function() {
			that.trigger("LOGGED_OUT");
		}, 3500);

		return this;
	}
});