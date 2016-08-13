/**
 * bj.PicView.js
 * Description : Picture Viewer Object prototype
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
**/
;(function(){
	var fit = function(ow, oh, fw, fh){
		var F = Math.floor;
		var ih, iw, it, il;
		var or = ow/oh, fr = fw/fh;
		if(fr<or){
			iw=fw;ih=F(fw/or);it=-F((ih-fh)/2);il=0;				
		}
		else{
			ih=fh;iw=F(fh*or);it=0;il=-F((iw-fw)/2);
		}		
		if(iw>ow){
			iw=ow;il=F((fw-iw)/2);
		}
		if(ih>oh){
			ih=oh;it=F((fh-ih)/2);
		}										
		return {t:it, l:il, w:iw, h:ih, ow : ow, oh : oh, r:iw/ow}
	}
	var T = transition = {
		step : 0.2,
		timeout : 100, 
		cirling : true,
		playmode : 'M',//'A'
		playtimer : null,
		delay : 3,
		mainLayer : {el : null, opa:1},
		subLayer : {el : null, opa:0},
		change : function(c){
			(function(f){
				var a = 0, b = 0;
				var check = function(){
					if((a+b)==2){
						if(f){f()}
						T.mainLayer.opa = 1;
						T.subLayer.opa = 0;	
						T.prepare();				
					}
				}
				var f1 = function(){
					if(T.mainLayer.timer){
						window.clearTimeout(T.mainLayer.timer);
					}
					if(T.mainLayer.opa<1){
						T.mainLayer.opa+=T.step;
						if(T.mainLayer.opa>1){
							T.mainLayer.opa = 1;
						}
						bj.opacity(T.mainLayer.el, T.mainLayer.opa);
						T.mainLayer.timer = window.setTimeout(f1, T.timeout);
					}
					else{
						a = 1;
						check();
					}
				}
				var f2 = function(){
					if(T.subLayer.timer){
						window.clearTimeout(T.subLayer.timer);
					}
					if(T.subLayer.opa>0){
						T.subLayer.opa-=T.step;
						if(T.subLayer.opa<0){
							T.subLayer.opa = 0;
						}
						bj.opacity(T.subLayer.el, T.subLayer.opa);
						T.subLayer.timer = window.setTimeout(f2, T.timeout);
					}					
					else{
						b = 1; 
						check();
					}
				}
				f1();f2();
			})(c);
		},
		play : function(){
			T.mode='A';
			T.prepare();
			jlwe.ui.dplMsg('Autoplay mode : ON', 'info');
		},
		pause : function(d){
			T.mode='M';
			if(T.playtimer){
				window.clearTimeout(T.playtimer);
				if(!d || d!==1){
					jlwe.ui.dplMsg('Autoplay mode : OFF', 'info');
				}
			}			
		},
		prepare : function(){
			if(T.playtimer){
				window.clearTimeout(T.playtimer);
			}
			if(T.mode=='A'){
				T.playtimer = window.setTimeout(function(){
					PV.next(1);
				}, T.delay*1000);
			}
		}
	}
	var PV = window['PicView'] = {
		loaded : [],
		pi : -1,
		iid : 'PicView_activeImage',
		init : function(){
			var sprite_path = APP_INFO.baseDir+'assets/img/sprite/btnPicView.png';
			
			var d = document.createElement('DIV');
			document.body.appendChild(d);
			d.setAttribute('style', 'position:fixed;top:0px;left:0px;z-index:100000;width:100%;height:100%;cursor:default;');
			PV.panel = bj.element(d);
			
			var dd = document.createElement('DIV');
			dd.setAttribute('style', 'position:relative;top:0px;left:0px;width:100%;height:100%;');
			d.appendChild(dd);
			
			var btnPrev = document.createElement('DIV');
			btnPrev.setAttribute('title', 'Previous');
			btnPrev.setAttribute('style', 'position:absolute;z-index:200;width:80px;height:128px;top:200px;left:10px;background:transparent url('+sprite_path+') no-repeat -22px 0px;');			
			d.appendChild(btnPrev);
			PV.btnPrev = bj.element(btnPrev);
			
			var btnNext = document.createElement('DIV');
			btnNext.setAttribute('title', 'Next');
			btnNext.setAttribute('style', 'position:absolute;z-index:200;width:80px;height:128px;top:200px;right:20px;background:transparent url('+sprite_path+') no-repeat -300px 0px;');
			d.appendChild(btnNext);
			PV.btnNext = bj.element(btnNext);

			var btnClose = document.createElement('DIV');
			btnClose.setAttribute('title', 'Close');
			btnClose.setAttribute('style', 'position:absolute;z-index:200;width:40px;height:40px;top:0px;right:10px;background:transparent url('+sprite_path+') no-repeat -180px -41px;');
			d.appendChild(btnClose);
			PV.btnClose = bj.element(btnClose);			

			var container_front = document.createElement('DIV');
			container_front.setAttribute('style', 'position:absolute;z-index:3;top:0px;left:0px;width:100%;height:100%;');
			dd.appendChild(container_front);
			PV.container_front = bj.element(container_front);
					
			var container = document.createElement('DIV');
			container.setAttribute('style', 'position:absolute;z-index:2;top:0px;left:0px;width:100%;height:100%;');
			dd.appendChild(container);
			PV.container = bj.element(container);
			
			var container_back = document.createElement('DIV');
			container_back.setAttribute('style', 'position:absolute;z-index:1;top:0px;left:0px;width:100%;height:100%;background-color:#000;');
			dd.appendChild(container_back);		
			PV.container_back = bj.element(container_back);	
			
			PV.container_back.opacity(0.9);
			PV.btnClose.opacity(0.5);
			PV.btnPrev.opacity(0.5);
			PV.btnNext.opacity(0.5);
			
			bj.listen(PV.btnClose, 'mouseover', function(){
				PV.btnClose.opacity(1.0);
			});
			bj.listen(PV.btnPrev, 'mouseover', function(){
				PV.btnPrev.opacity(1.0);
			});
			bj.listen(PV.btnNext, 'mouseover', function(){
				PV.btnNext.opacity(1.0);
			});	
			bj.listen(PV.btnClose, 'mouseout', function(){
				PV.btnClose.opacity(0.5);
			});
			bj.listen(PV.btnPrev, 'mouseout', function(){
				PV.btnPrev.opacity(0.5);
			});
			bj.listen(PV.btnNext, 'mouseout', function(){
				PV.btnNext.opacity(0.5);
			});	
				
			bj.listen(PV.btnClose, 'click', function(){
				PV.close();
			});
			bj.listen(PV.container_front, 'click', function(){
				PV.close();
			});			
			PV.btnPrev.hide();
			PV.btnNext.hide();									
			
			PV.setSize();
			window.onresize = PV.setSize;
		},
		setSize : function(){
			var ws = bj.getWindowSize();
			document.body.style.overflow = 'hidden';
			PV.panel.style.width = ws.w+'px';
			PV.panel.style.height = ws.h+'px';
			PV.size = {width:ws.w, height:ws.h};
			PV.onresize();
		},
		onresize : function(){
			var el = bj.element(PV.iid);
			var img = PV.curpic;
			if(!!el && !!img){
				var frame = PV.size;
				var size = fit(img.width, img.height, frame.width, frame.height);
				el.css('position:absolute;top:'+size.t+'px;left:'+size.l+'px;width:'+(size.w-4)+'px;height:'+(size.h-4)+'px;border:solid 2px #fff;');				
			}
		},
		open : function(img){
			PV.init();
			PV.render(img);
		},
		close : function(){
			document.body.removeChild(PV.panel);
			PV.curpic = null;
		},	
		render: function(img){
			var frame = PV.size;
			var size = fit(img.width, img.height, frame.width, frame.height);
			var d = document.createElement('DIV');
			d.setAttribute('style', 'position:relative;top:0px;left:0px;width:100%;height:100%;');
			PV.container.appendChild(d);
			
			var si = '<img id="'+PV.iid+'" src="'+img.url+'" style="position:absolute;top:'+size.t+'px;left:'+size.l+'px;width:'+(size.w-4)+'px;height:'+(size.h-4)+'px;border:solid 2px #fff;">';
			d.innerHTML = si;
			PV.curpic = img;
		},	
		charge : function(arr){
			this.items = arr;
		},
		start : function(collection, pic){
			$('#outf').empty();
			var c = [], k = 0, ii = 0;
			collection.forEach(function(item){
				var path = item.src||item.url;
				c.push(path);
				if(path==pic){
					ii = k;
				}
				k++;
			});
			if(c.length>0){
				PV.charge(c);
				PV.preload(ii, function(){
					jlwe.ui.outerbox.open(function(){
						PV.open();
						PV.playFrom(ii);
					});					
				});
			}
		},
		autoplay : T.play,
		playFrom : function(k){
			var c = PV.items;
			if(c.length>0 && c[k]){
				PV.display(k);
			}			
		},
		display : function(k, prv){
			var loc = PV.items[k];
			var pic = PV.getLoadedItem(loc);
			var w = $(window).width(), h = $(window).height();
			var x = $('#pic_contain');
			x.empty();
			x.append('<div><img id="pviewer_displaying" src="'+loc+'" /></div>');
			PV.pi = {k : k, w : pic.w, h:pic.h};
			PV.normalize(pic.w, pic.h);
			T.prepare();
			PV.preload(k+1);
		},
		normalize : function(pw, ph){
			var w = $(window).width(), h = $(window).height();
			var pc = $('#pic_contain'), pcs = $('#pic_contain_sad');
			var pd = $('#pviewer_displaying');
			if(!bj.isNumber(pw) && !bj.isNumber(ph)){
				var pw = PV.pi.w;
				var ph = PV.pi.h;
			}
			pc.width(w);pcs.width(w);
			pc.height(h);pcs.height(h);
			var size = jlwe.normalizePic(pw, ph, w, h, 'fit');
			var it = size.t, il = size.l, iw = size.w, ih = size.h;
			if(size.w>pw){
				iw = pw;
				il = (w-pw)/2;
			}
			if(size.h>ph){
				ih = ph;
				it = (h-ph)/2;
			}
			pd.css({top:it, left:il, width:iw, height:ih});
			$('#btn_popup_prev').css({top:(h-$('#btn_popup_prev').height())/2});
			$('#btn_popup_next').css({top:(h-$('#btn_popup_next').height())/2});		
		},
		preload : function(k, callback){
			var c = PV.items, url = k;
			if(bj.isNumber(k)){
				if(k<0){k=c.length-1}
				if(k>=c.length){k=0}
				url = c[k];
			}
			if(!!url){
				if(!PV.isLoaded(url)){
					var p = new Image();
					p.onload = function(){
						PV.addLoaded({src : url, w : p.width, h : p.height});
						if(callback){callback()}
					}
					p.onerror = function(){
						console.log('Loading failed : '+url);
						PV.items.splice(k, 1);
						if(c.length>0){
							var n = k<c.length?k:0;
							PV.preload(n, callback||function(){});
						}
					}
					p.src = url;
				}
				else{
					if(callback){callback()}
				}
			}
		},
		addLoaded : function(ob){
			PV.loaded.push(ob);
		},
		getLoadedItem : function(url){
			var f = false;
			for(var i=0;i<PV.loaded.length;i++){
				if(PV.loaded[i].src==url){
					f = PV.loaded[i];break;
				}
			}
			return f;
		},
		isLoaded : function(url){
			var ld = false;
			for(var i=0;i<PV.loaded.length;i++){
				if(PV.loaded[i].src==url){
					ld = true;break;
				}
			}
			return ld;
		},
		prev : function(x){
			if((!x || x!=1) && T.mode=='A'){
				T.pause();
			}
			var n = PV.pi.k;
			var k = n-1;
			if(k<0){k=PV.items.length-1}
			var loc = PV.items[k];
			if(PV.isLoaded(loc)){
				PV.pi.k=k;
				PV.transit(k, n);
			}
			else{
				PV.preload(k, function(){PV.prev(x||null)});
			}
		},
		next : function(x){
			if((!x || x!=1) && T.mode=='A'){
				T.pause();
			}
			var n = PV.pi.k;
			var k = n+1;
			if(k>=PV.items.length){k=0}
			var loc = PV.items[k];
			if(PV.isLoaded(loc)){
				PV.pi.k=k;
				PV.transit(k, n);
			}
			else{
				PV.preload(k, function(){PV.next(x||null)});
			}				
		},
		transit : function(k, n){
			var w = $(window).width(), h = $(window).height();
			T.mainLayer.opa = 0;
			T.subLayer.opa = 1;			
			(function(v){
				var loc = PV.items[v];
				var pc = PV.getLoadedItem(loc);
				var pw = pc.w, ph = pc.h;
				var size = jlwe.normalizePic(pw, ph, w, h, 'fit');
				var it = size.t, il = size.l, iw = size.w, ih = size.h;
				if(size.w>pw){
					iw = pw;
					il = (w-pw)/2;
				}
				if(size.h>ph){
					ih = ph;
					it = (h-ph)/2;
				}
				var x = $('#pic_contain');
				bj.opacity('pic_contain', 0);
				x.empty();
				x.append('<div><img id="pviewer_displaying" src="'+loc+'" /></div>');
				x.width(w);x.height(h);	
				$('#pviewer_displaying').css({top:it, left:il, width:iw, height:ih});				
			})(k);

			(function(v){
				var loc = PV.items[v];
				var pc = PV.getLoadedItem(loc);
				var pw = pc.w, ph = pc.h;
				var size = jlwe.normalizePic(pw, ph, w, h, 'fit');
				var it = size.t, il = size.l, iw = size.w, ih = size.h;
				if(size.w>pw){
					iw = pw;
					il = (w-pw)/2;
				}
				if(size.h>ph){
					ih = ph;
					it = (h-ph)/2;
				}
				var x = $('#pic_contain_shad');
				bj.opacity('pic_contain_shad', 1);
				x.empty();
				x.append('<div><img id="pviewer_shad" src="'+loc+'" /></div>');
				x.width(w);x.height(h);
				$('#pviewer_shad').css({top:it, left:il, width:iw, height:ih});	
			})(n);
			T.change();
		},
		keylisten : function(evt){
			var e = evt || window.event;
			var k = e.which;
			if(!k&&((e.charCode||e.charCode===0)?e.charCode:e.keyCode)){
				k = e.charCode || e.keyCode;
			}
			switch(k){
				case 27 : PV.close(e);
					break;				
				case 37 : 
					$('#btn_popup_prev').animate({opacity:0.8}, 50, function(){
						$('#btn_popup_prev').animate({opacity:0.2}, 100);
						PV.prev();
					});
					break;
				case 39 : 
					$('#btn_popup_next').animate({opacity:0.8}, 50, function(){
						$('#btn_popup_next').animate({opacity:0.2}, 100);
						PV.next();
					});
					break;
				case 65 : T.play();break;
				case 83 : T.pause();break;
			}
		}		
	}
})();
