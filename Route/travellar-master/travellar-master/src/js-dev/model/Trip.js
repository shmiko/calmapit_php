/* globals Util */

var Trip = Backbone.Model.extend({
	urlRoot: Util.api + '/trip',

	defaults: {
		id: undefined,
		name: undefined,
		start_date: undefined,
		end_date: undefined,
		companions: []
	}
});