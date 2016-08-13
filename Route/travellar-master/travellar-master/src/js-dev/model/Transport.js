/* globals Util */

var Transport = Backbone.Model.extend({
	urlRoot: Util.api + '/transport',

	defaults: {
		id: undefined,
		name: undefined
	}
});