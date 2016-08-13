/**
 * app.blog.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
		
	var B = app.Blog = bj.Model.create({
		feeds : ['http://ndaidong.blogspot.com/feeds/posts/default/-/WWW'],
		data : false
	});
	B.load = function(){
		var data = B.get('data');
		var feeds = B.get('feeds');
		
		if(!data){
			var count = feeds.length;
			var entries = [];
			for(var i=0;i<feeds.length;i++){
				var url = feeds[i];
				var feed = new google.feeds.Feed(url);
				feed.includeHistoricalEntries();
				feed.setNumEntries(5);
				feed.load(function(res){
					count--;
					if(res.status.code==200){
						entries = entries.concat(res.feed.entries);
						if(count==0){
							B.filter(entries);
						}
					}
				});					
			}				
		}
	}
	B.filter = function(data){
		var c = [];
		data.forEach(function(item){
			if(!!item.title && item.title.length>5){
				c.push(item);
			}
		});
		if(c.length>0){
			app.BlogView.render(c);
		}
	}
})();
