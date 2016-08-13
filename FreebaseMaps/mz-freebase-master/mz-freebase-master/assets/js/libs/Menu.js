/**
 * Menu.js
 * Description : Menu Object prototype
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
**/
;(function(){
	
	var _active = null;
	var _items = [];
	
	// subMenu of bookmark list
	var subMenu = {
		active : false,
		open : function(el){
			var ob = bj.element(el);
			if(this.active){
				this.active.removeClass('display');
			}
			ob.addClass('display');
			this.active = ob;
		}
	}
	var menitems = bj.getElementsByClass('menu-item');
	menitems.forEach(function(a){
		bj.listen(a, 'click', function(e){
			bj.exitEvent(e);
			subMenu.open(a);
		});
	});
	
	var aboutBox = {
		state : 0,
		element : bj.element('about_box_detail'),
		open : function(){
			var d = this.element;
			d.show();
			bj.element('about_box').addClass('opening');
			this.state = 1;				
		},
		close : function(){
			var d = this.element;
			d.hide();
			bj.element('about_box').removeClass('opening');			
			this.state = 0;
		}
	}
	var bmk = {
		open : function(){
			bj.element('nav_bmk').addClass('display');
			bj.element('btn_quicklink').addClass('open');
		},
		close : function(){
			bj.element('nav_bmk').removeClass('display');	
			bj.element('btn_quicklink').removeClass('open');			
		},
		state : 0
	}
	
	var searchBox = {
		state : 0,
		cname : 'google',
		cworld : '',
		clink : 'http://www.google.com/search?hl=en&q=',
		eicon : bj.element('icoSearch'),
		open : function(){
			bj.element('search_pad').show();
		},
		close : function(){
			bj.element('search_pad').hide();		
		},
		setService : function(name, link){
			var el = searchBox.eicon;
			el.removeClass(searchBox.cname);
			el.addClass(name);
			searchBox.cname = name;
			searchBox.clink = link;
			searchBox.send();
		},
		send : function(){
			var kw=bj.element('txtSearch').value.trim();
			if(kw!=''){
				document.fsearch.action=searchBox.clink+kw;
				document.fsearch.target='_'+bj.genid(10);
				document.fsearch.submit();
				searchBox.cworld = kw;
				setTimeout(function(){bj.element('txtSearch').value=''},100);
			}
			return false;			
		}
	}
	var ssitems = bj.getElementsByClass('ss-item');
	ssitems.forEach(function(a){
		bj.listen(a, 'click', function(){
			var lnk = a.getAttribute('link');
			var cls = a.getAttribute('name');
			searchBox.setService(cls, lnk);
		});
	});		
	document.fsearch.onsubmit=function(){
		return searchBox.send();
	};
		
	var M = app['Menu'] = {
		register : function(opts){
			_items.push(opts);
			bj.listen(opts.id, 'click', function(e){
				bj.exitEvent(e);
				M.click(opts.id);
			});
		},
		click : function(id){
			for(var i=0;i<_items.length;i++){
				var cm = _items[i];
				if(cm.id==id){
					M.open(cm.ins);
				}
				else{
					M.close(cm.ins);
				}
			}
		},
		open : function(m){
			if(m.state==0){
				m.open();
				m.state = 1;
			}		
		},
		close : function(m){
			if(m.state==1){
				m.close();
				m.state = 0;
			}	
		}
	}
	
	M.register({
		id : 'btn_quicklink',
		ins : bmk
	});
	M.register({
		id : 'about_box',
		ins : aboutBox
	});	
	M.register({
		id : 'icoSearch',
		ins : searchBox
	});		
	
	bj.listen(document.body, 'click', app.Menu.click);
})();
