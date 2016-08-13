/* globals Util */

var Sleepplace = Backbone.Model.extend({
	urlRoot: Util.api + '/sleepplace',

	defaults: {
		id: undefined,
		place: undefined
	}
});