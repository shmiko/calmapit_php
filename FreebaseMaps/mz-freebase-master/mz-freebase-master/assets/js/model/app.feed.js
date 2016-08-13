/**
 * app.feed.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var NO_STREAM = 1;
	
	var _resort = function(entries){
		var arr = [];
		var datepattern = bj.date.getPattern();
		entries.forEach(function(entry){
			if(!!entry.title){
				var t = entry.publishedDate;
				var x = new Date(t);
				entry.pubDate = x.getTime();
				entry.date = bj.date.make(datepattern, x);
				entry.text = entry.content.stripTags();
				entry.summary = entry.text.truncate(300);
				if(!!entry.summary){
					arr.push(entry);
				}
			}
		});
		arr.msort('pubDate', 'dec');
		return arr;
	}
		
	var F = app.Feed = bj.Model.create({
		stream : '',
		page : 1,
		cates : []
	});
	F.onStreamChange = function(route){
		var s = route.name, p = route.page;
		if(!p || !bj.isNumber(p)){
			var p = 1;
		}
		F.load(s, p);
	}	
	F.setActiveStream = function(hash){
		this.set('stream', hash);
		app.FeedView.setActiveStream(hash);
	}
	F.setError = function(msg){
		app.FeedView.dplError(msg);
	}
	F.load = function(s, p){
		var cs = F.get('stream');
		var cp = F.get('page');
		if(cs!==s || cp!==p){
			var c, _cates = F.get('cates');
			
			for(var i=0;i<_cates.length;i++){
				if(_cates[i].hash==s){
					c = _cates[i];
					break;
				}					
			}
			
			if(!c){
				return F.setError(NO_STREAM);
			}
			
			app.loading();
			app.FeedView.loading(s);
			
			var data = {};
			if(c.entries.length>0){
				app.FeedView.render(c);
			}
			else{
				var feeds = c.feeds;
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
								c.entries = _resort(entries);
								app.FeedView.render(c);
							}
						}
					});					
				}
			}
		}
	}
})();
