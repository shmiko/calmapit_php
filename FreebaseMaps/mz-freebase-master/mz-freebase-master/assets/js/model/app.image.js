/**
 * app.image.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var loading = false;
		
	function _search(kw, sv, callback){
		var ajax = bj.transactor.create();
		var query = APP_INFO.baseDir+'resources?t=images&q='+kw.encode()+'&s='+sv.encode();
		ajax.send(query, callback);
	}	
		
	var I = bj.createModel({
		data : {},
		init : function(){
			this.View.init();
		},
		search : function(kw, sv){
			I.setLoadingState(true);
			_search(kw, sv.join(','), function(r){
				if(!!r&&!!r.result){
					I.View.render(r, kw);
				}
				I.setLoadingState(false);
			});
		},
		setLoadingState : function(bln){
			loading = bln;
			this.View.changeState(loading);
		}
	});
	app.image = I;
})();
