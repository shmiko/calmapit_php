/* globals Util: true, Transport: true */

var Transports = Backbone.Collection.extend({
	model: Transport,
	url: Util.api + "/transports"
});