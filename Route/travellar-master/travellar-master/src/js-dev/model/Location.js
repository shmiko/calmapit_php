/* globals Util */

var Location = Backbone.Model.extend({
	urlRoot: Util.api + '/location',

	defaults: {
		id: undefined,
		lng: undefined,
		lat: undefined
	}
});