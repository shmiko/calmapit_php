/**
 * app.schemaView.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var Space = {
		nodes : [],
		relationships : [],
		create : function(container){
			var ws = bj.getWindowSize();
			var r = Raphael(container, ws.w, ws.h);
				(function(ins){			
					var ratio = 0.1;
					var viewBoxWidth = ins.width;
					var viewBoxHeight = ins.height;
					var startX,startY;
					var dX,dY;
					var oX = 0, oY = 0, oWidth = viewBoxWidth, oHeight = viewBoxHeight;
					var viewBox = ins.setViewBox(oX, oY, viewBoxWidth, viewBoxHeight);
					viewBox.X = oX;
					viewBox.Y = oY;

					function zoom(delta) {
						var vBHo = viewBoxHeight;
						var vBWo = viewBoxWidth;
						if(delta<0){
							viewBoxWidth*=(1-ratio);
							viewBoxHeight*=(1-ratio);
						}
						else{
							viewBoxWidth*=(1+ratio);
							viewBoxHeight*=(1+ratio);
						}	
						viewBox.X -= (viewBoxWidth - vBWo) / 2;
						viewBox.Y -= (viewBoxHeight - vBHo) / 2;          
						ins.setViewBox(viewBox.X, viewBox.Y, viewBoxWidth, viewBoxHeight);
					}		
					bj.setOnwheelCallback(zoom);
				})(r);		
			this.space = r;
			return r;
		},
		getNode : function(id){
			var nodes = this.nodes;
			for(var i=0;i<nodes.length;i++){
				if(nodes[i].id==id){
					return nodes[i];
				}
			}
			return false;
		},
		addNode : function(props){
			var self = this;
			var id = props.id || bj.createId(8);
			var c = props.color || '#fff';
			var s = props.size || 10;
			var w = props.weight || 50;
			var d = props.deep || 0;
			var t = props.top;
			var l = props.left;
			var label = props.label || '';
			var n = self.space.circle(l, t, s);
			n.attr({
				 "fill": "90-"+c+":15-#fff:165",
				 "fill-opacity": w/100,
				 "stroke": "transparent"
			});			
			n.properties = {
				id : id,
				color : c, 
				size : s,
				weight : w,
				deep : d,
				label : label
			};

			var start = function(){
				this.ox = this.attr("cx");
				this.oy = this.attr("cy");
			}
			var move = function (dx, dy) {
				var att = {cx: this.ox + dx, cy: this.oy + dy};
				this.attr(att);
				self.space.safari();
			}
			var end = function(){}	
			
			//n.drag(move, start, end);
			n.click(function(){
				self.onclick(n);
			});
			
			this.nodes.push(n);
			return n;
		},
		addRelation : function(source, target, color, type){	
			var self = this;
			var style = type || 'line';
			if(style=='curve'){
				self.space.connect(source, target, color, '1');	
			}
			else{
				var x1 = source.attrs.cx, x2 = target.attrs.cx;
				var y1 = source.attrs.cy, y2 = target.attrs.cy;
				var r1 = source.properties.size, r2 = target.properties.size;
				var angle = Math.atan2(y2 - y1, x2 - x1);
				var inverse_angle = angle + Math.PI;	
				
				var ox1 = x1 + Math.cos(angle)*r1;
				var oy1 = y1 + Math.sin(angle)*r1;

				var ox2 = x2 + Math.cos(inverse_angle)*r2;
				var oy2 = y2 + Math.sin(inverse_angle)*r2;
				var pathstr = "M" + ox1 + "," + oy1 + " L" + ox2 + "," + oy2;						
				self.space.path( pathstr ).attr({fill: color, stroke: color, 'stroke-width': 1});	
			}	
		},
		onclick : function(node){
			console.log(node);
		}
	}

	var G = bj.createView(app.schema, {
		init : function(data){
			var space = bj.element('mz_space');
			var raph = Space.create(space);
			
			var onResize = function(){
				var ws = bj.getWindowSize();
				bj.element('status').setPosition({left:(ws.w-300)/2, top:10});
				if(!!space){
					space.style.width = ws.w+'px';
					space.style.height = ws.h+'px';
					raph.setSize(ws.w, ws.h);
				}
			}
			onResize();
			
			this.space = raph;
			bj.setOnresizeCallback(onResize);
		},
		render : function(structure){
			var root = structure || this.Model.data.structure;
			var ws = bj.getWindowSize();
			var r = this.space;
			var n1 = Space.addNode({top:250, left:400, color:'#f00', weight:80, size:5});
			var n2 = Space.addNode({top:ws.h/2, left:ws.w/2, color:'#090', weight:50});
			Space.addRelation(n1, n2, '#fff', 'line');
		},
		update : function(node){

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
