/**
 * app.graphView.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var G = bj.createView(app.graph, {
		init : function(){
			var self = this;
			var space = bj.element('mz_schema');
			var onResize = function(){
				var ws = bj.getWindowSize();
				bj.element('status').setPosition({left:(ws.w-300)/2, top:10});
				if(!!space){
					space.style.width = ws.w+'px';
					space.style.height = ws.h+'px';
				}
				if(!!self.Model && !!self.Model.sigma){
					self.Model.sigma.draw();
				}
			}
			onResize();
			bj.setOnresizeCallback(onResize);
			
			var sigInst = sigma.init(space).drawingProperties({
				defaultLabelColor: '#fff',
				defaultLabelSize: 12,
				defaultLabelBGColor: 'transparent',
				defaultLabelHoverColor: '#000',
				labelThreshold: 6,
				defaultEdgeType: 'line',
			  }).graphProperties({
				minNodeSize: 1,
				maxNodeSize: 9,
				minEdgeSize: 0.2,
				maxEdgeSize: 1,
			  }).mouseProperties({
				maxRatio: 100
			});		
			sigInst.bind('overnodes',function(event){
				self.Model.onmouseover(event.content[0]);
				
			});
			sigInst.bind('outnodes',function(event){
				self.Model.onmouseout(event.content[0]);
			});

			self.space = space;		
			self.Model.sigma = sigInst;	
		},
		render : function(nodes, relationships){
			var m = this.Model, sigma = m.sigma;
			nodes.forEach(function(item){
				sigma.addNode(item.id, item);
			});
			relationships.forEach(function(item){
				sigma.addEdge(item.id, item.source, item.target, item);
			});
			sigma.draw();
		},
		add : function(n, r){
			var m = G.Model, sigma = m.sigma;
			if(!!n){
				sigma.addNode(n.id, n);
			}
			if(!!r){
				sigma.addEdge(r.id, r.source, r.target, r);
			}
		},
		update : function(){
			this.Model.sigma.draw();
		},
		dplNodeInfo : function(node){
			//console.log(node);
		},
		hideNodeInfo : function(node){
			
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
			G.model.setLoadingState(false);
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
