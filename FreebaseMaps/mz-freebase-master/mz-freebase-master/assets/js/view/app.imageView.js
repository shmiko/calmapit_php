/**
 * app.imageView.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var max = 16;
	
	var I = bj.createView(app.image, {
		init : function(){
			var onResize = function(){
				var ws = bj.getWindowSize();
				bj.element('status').setPosition({left:(ws.w-300)/2, top:10});
				var gc = bj.element('result');
				if(!!gc){
					gc.style.width = gc.parentNode.offsetWidth;
					gc.style.height = gc.parentNode.offsetHeight;
				}
			}
			onResize();
			bj.setOnresizeCallback(onResize);			
			bj.element('mz_form_search').submit(function(e){
				bj.exitEvent(e);	
				var kw = bj.element('mz_input_keyword').value.trim();
				var sv = [
					bj.element('sv_google').checked?1:0,
					bj.element('sv_bing').checked?1:0,
					bj.element('sv_photobucket').checked?1:0,
					bj.element('sv_flickr').checked?1:0,
					bj.element('sv_wikipedia').checked?1:0
				];
				if(!!kw){
					I.Model.search(kw, sv);
				}
			});			
		},
		render : function(data, kw){
			var services = {
				google : {
					id: 'google',
					code: '1%2C0%2C0%2C0%2C0',
					data: []
				},
				bing : {
					id: 'bing',
					code: '0%2C1%2C0%2C0%2C0',
					data: []
				},
				photobucket : {
					id: 'photobucket',
					code: '0%2C0%2C1%2C0%2C0',
					data: []
				},				
				flickr : {
					id: 'flickr',
					code: '0%2C0%2C0%2C1%2C0',
					data: []
				},
				wikipedia : {
					id: 'wikipedia',
					code: '0%2C0%2C0%2C0%2C1',
					data: []
				}
			}
			for(var svr in services){
				bj.element('s_'+services[svr].id).hide();
			};
			if(data.result.length>0){
				data.result.forEach(function(item){
					services[item.source].data.push(item);			
				});
			}
			else{
				I.notice('No image found.');
			}
			
			function addImages(sv){
				bj.element('s_'+sv.id).show();
				bj.element('res_'+sv.id).setAttribute('href', APP_INFO.baseDir+'resources?t=images&q='+kw+'&s='+sv.code+'&o=json');
				
				var ul = bj.element('img_'+sv.id);
				ul.innerHTML = '';
				
				var _display = function(pic, contain){
					var img = pic, ul = contain;
					var fw = bj.element('result').offsetWidth/4, fh = (fw*3/4);
					var size = app.imageResize(img.width, img.height, fw, fh, 'fit');
					var li = bj.addElement('LI', ul);
					li.style.width = size.w+'px';
					li.style.height = fh+'px';					
					var im = bj.addElement('IMG', li);
					im.src = img.url;
					im.style.width = size.w+'px';
					var imh = size.h;
					if(imh<fh){
						var sz = app.imageResize(img.width, img.height, fw, fh, 'fill');
						imh = sz.h;
					}
					im.style.height = imh+'px';
					im.setPosition({top:size.top, left:size.left});
				}				
				sv.data.forEach(function(img){
					if(!!img.width && !!img.height){
						(function(a, b){
							_display(a, b);
						})(img, ul);
					}
					else{
						(function(pic, contain){
							var p = new Image();
							p.onload = function(){
								pic.width = this.width;
								pic.height = this.height;
								_display(pic, contain);
							}
							p.src = pic.url;
						})(img, ul);
					}
				});
			}
			if(services.google.data.length>0){
				addImages(services.google);
			}
			if(services.bing.data.length>0){
				addImages(services.bing);
			}
			if(services.photobucket.data.length>0){
				addImages(services.photobucket);
			}			
			if(services.flickr.data.length>0){
				addImages(services.flickr);
			}
			if(services.wikipedia.data.length>0){
				addImages(services.wikipedia);
			}
		},
		update : function(node){

		},
		notice : function(msg){
			var t = bj.element('status');
			t.innerHTML= '<span class="success">'+msg+'</span>';
			t.show();
			setTimeout(function(){t.hide()}, 2000);
		},
		process : function(msg){
			var t = bj.element('status');
			t.innerHTML= '<span class="process">'+msg+'</span>';
			t.show();		
		},
		changeState : function(state){
			var t = bj.element('status');
			if(!!state){
				t.innerHTML= '<span class="process">Loading...</span>';
				t.show();				
			}
			else{
				t.innerHTML= '';
				t.hide();			
			}
		}	
	});
})();
