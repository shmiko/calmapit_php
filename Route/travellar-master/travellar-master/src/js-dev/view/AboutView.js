var AboutView = Backbone.View.extend({
	template: hbs.about,

	initialize: function(options) {
		console.log("[AboutView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;
	},

	render: function() {
		this.$el.html(this.template());
		return this;
	}
});