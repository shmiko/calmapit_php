/* globals Util */

var Day = Backbone.Model.extend({
	urlRoot: Util.api + '/day',

	defaults: {
		id: undefined,
		trip_id: undefined,
		day_date: undefined,
		transport_id: null,
		location_id: null,
		sleep_place_id: null,
		location: []
	}
});