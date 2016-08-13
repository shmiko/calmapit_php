/**
 * app.blogView.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';

	var B = app.BlogView = bj.View.create(app.Blog);
	B.render= function(data){
		var s = (function(d){
			var _s = '';
			var lim = d.length;
			for(var i=0;i<lim;i++){
				var entry = d[i];
				var txt = Template.blogEntry;
				txt = txt.replaceAll('{LINK}', entry.link);
				txt = txt.replaceAll('{TITLE}', entry.title);
				txt = txt.replaceAll('{CONTENT}', entry.contentSnippet.truncate(100));
				_s+=txt;
			}
			return _s;
		})(data);
		bj.element('myblog_data').innerHTML=s;	
	}
})();
