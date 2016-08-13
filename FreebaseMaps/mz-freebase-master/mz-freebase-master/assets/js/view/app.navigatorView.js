/**
 * app.navigatorView.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var max = 16;
	
	var labelType, useGradients, nativeTextSupport, animate;

	(function() {
	  var ua = navigator.userAgent,
		  iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
		  typeOfCanvas = typeof HTMLCanvasElement,
		  nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
		  textSupport = nativeCanvasSupport 
			&& (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
	  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
	  nativeTextSupport = labelType == 'Native';
	  useGradients = nativeCanvasSupport;
	  animate = !(iStuff || !nativeCanvasSupport);
	})();
		
	var rgraph = new $jit.RGraph({
		injectInto: 'mz_navigator',
		background: {
		  CanvasStyles: {
			strokeStyle: '#040',
			strokeSize: 1
		  }
		},
		Navigation: {
		  enable: true,
		  panning: true,
		  zooming: 1
		},
		Node: {
			color: '#f00',
			type: 'circle',
		},
		Label: {
			textBaseline: 'alphabetic',
		},
		Edge: {
			color: '#aaa',
			lineWidth:1,
			shadowColor: '#ccc',  
			shadowBlur: 10  		  
		},

		onBeforeCompute: function(node){
			//$jit.id('inner-details').innerHTML = node.data.relation;
		},
		onCreateLabel: function(domElement, node){
			domElement.innerHTML = node.name;
			domElement.onclick = function(){
				rgraph.onClick(node.id, {
					onComplete: function() {
						app.navigator.onSelectEnd(node);
					}
				});
				app.navigator.onSelectStart(node.id);
			};
		},
		onPlaceLabel: function(domElement, node){
			var style = domElement.style;
			style.display = '';
			style.cursor = 'pointer';
			var lv = app.navigator.getNodeLevel(node.id);
			if(node.id=='_mz'){
				style.fontSize = "18px";
				style.color = "#f11";				
			}
			else if(lv==1){
				style.fontSize = "16px";
				style.color = "#606";
			} 
			else if(lv==2){
				style.fontSize = "12px";
				style.color = "#00f";
			} 
			else if(lv==3){
				style.fontSize = "10px";
				style.color = "#060";
			}					
			else{
				style.fontSize = "8px";
				style.color = "#666";
			}

			var left = parseInt(style.left);
			var w = domElement.offsetWidth;
			style.left = (left - w / 2) + 'px';
		}
	});
		
	var G = bj.createView(app.navigator, {
		handler : rgraph,
		init : function(){
			bj.element('mz_form_search').submit(function(e){
				bj.exitEvent(e);	
				app.navigator.search();
			});
			
			var onResize = function(){
				var ws = bj.getWindowSize();
				bj.element('status').setPosition({left:(ws.w-300)/2, top:10});
				var gc = bj.element('mz_navigator');
				if(!!gc){
					gc.style.width = gc.parentNode.offsetWidth;
					gc.style.height = gc.parentNode.offsetHeight;
				}
			}
			onResize();
			bj.setOnresizeCallback(onResize);			
		},
		render : function(structure){
			var root = structure || this.Model.data.structure;
			rgraph.loadJSON(root);
			rgraph.graph.eachNode(function(n) {
			  var pos = n.getPos();
			  pos.setc(-200, -200);
			});
			rgraph.compute('end');
			rgraph.fx.animate({
			  modes:['polar'],
			  duration: 1000
			});
			this.Model.onRendered();
		},
		update : function(node){
			rgraph.loadJSON(this.Model.data.structure);
			rgraph.refresh();
			if(!!node){
				rgraph.graph.eachNode(function(n) {  
					if(n.id==node.id){
						rgraph.onClick(n.id);
						app.navigator.onSelectStart(n.id);
					} 
				}); 				
			}
		},
		openBox : function(node, txt){
			if(!!txt &&txt.length>100){
				var tpl = Template.dialog;
				var s = tpl.replaceAll('{TITLE}', node.name);
				s = s.replaceAll('{TEXT}', txt.truncate(480));
				s = s.replaceAll('{IMG}', 'https://usercontent.googleapis.com/freebase/v1/image'+node.mid+'?maxheight=200&maxwidth=200');

				
				var ws = bj.getWindowSize();
				var dl = bj.element('dialog');
				dl.innerHTML = s;
				dl.show();
				bj.element('btn_close_dialog').click(function(){
					dl.hide();
				});
			}
			else{
				 bj.element('dialog').hide();
			}
			this.Model.setLoadingState(false);
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
