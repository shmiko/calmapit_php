/* globals Util: true, Sleepplace: true */

var Sleepplaces = Backbone.Collection.extend({
	model: Sleepplace,
	url: Util.api + "/sleepplaces"
});