/* globals Util: true, Trip: true */

var Trips = Backbone.Collection.extend({
	model: Trip,
	url: Util.api + "/trips",

	initialize: function(options) {
		console.log("[Trips] Init");
		if(options !== undefined) {
			if(options.id !== undefined) {
				this.url += "/" + options.id;
			}
		}
	},

	save: function() {
		this.each(function(trip, index) {
			trip.save();
		}, this);
	}
});