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
			
			var stage = new Kinetic.Stage({
				container: container,
				width: ws.w,
				height: ws.h
			});
			var space = new Kinetic.Layer();
			//space.setDraggable("draggable");
			stage.add(space);
			var background = new Kinetic.Rect({
				x: 0,
				y: 0,
				width: ws.w,
				height: ws.h,
				fill: "transparent",
				opacity: 1
			});
			space.add(background);
			space.setScale(space.getScale().x);
			stage.draw();
			var zoom = function(e) {
			  var m = stage.getMousePosition();
			  var mx = m.x, my = m.y;
			  var zoomAmount = e*0.4;
			  var p = space.getAbsolutePosition();
			  var x = p.x, y = p.y;
			  var w = space.getWidth(), h = space.getHeight();
			  var ns = space.getScale().x+zoomAmount;
			  if(ns>=1){
				space.setScale(ns);
				space.setAbsolutePosition(-(w*ns-w)/2, -(h*ns-h)/2);
				space.draw();
			  }
			}
			bj.setOnwheelCallback(zoom);		
			
			this.stage = stage;
			this.space = space;
			return space;
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
			var n = props.name || '';
			var circle = new Kinetic.Circle({
				id: id,
				x: l,
				y: t,
				name: n, 
				weight: w,
				fill: c,
				radius: s,
				opacity: w/100,
				fillLinearGradientStartPoint: [0, 0],
				fillLinearGradientEndPoint: [50, 50],
				fillLinearGradientColorStops: [0, 'red', 1, 'yellow']
			});	
			self.space.add(circle);	
			self.space.draw();
			circle.id = id;
			this.nodes.push(circle);
			return circle;
		},
		addRelation : function(source, target, opts){	
			var self = this;
			var op = opts || {};
			var style = op.type || 'line';
			var color = op.color || '#eee';
			var weight = op.weight/100 || 0.1;
			if(style=='line'){
				var os = self.getNode(source.id);
				var ot = self.getNode(target.id);
				var p1 = os.attrs, p2 = ot.attrs;
				var r1 = p1.radius, r2 = p2.radius;
				var x1 = p1.x, x2 = p2.x;
				var y1 = p1.y, y2 = p2.y;
				var angle = Math.atan2(y2 - y1, x2 - x1);
				var inverse_angle = angle + Math.PI;	
				
				var ox1 = x1 + Math.cos(angle)*r1;
				var oy1 = y1 + Math.sin(angle)*r1;

				var ox2 = x2 + Math.cos(inverse_angle)*r2;
				var oy2 = y2 + Math.sin(inverse_angle)*r2;								

				var line = new Kinetic.Line({
					points: [ox1, oy1, ox2, oy2],
					stroke: color,
					strokeWidth: weight,
					lineCap: 'round',
					lineJoin: 'round',
					opacity: 0.9
				});				
				self.space.add(line);
				self.space.draw();
				self.relationships.push({source:source.id, target:target.id});
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
					Space.stage.setWidth(ws.w);
					Space.stage.setHeight(ws.h);
					raph.setWidth(ws.w);
					raph.setHeight(ws.h);
					raph.draw();
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
			var n1 = Space.addNode({name: 'Myzone', top:250, left:500, color:'#f0f', size: 10, weight:90});
			var n2 = Space.addNode({name: 'Alpha', top:ws.h/2, left:ws.w/2, size: 2, color:'#090'});
			Space.addRelation(n1, n2, {color:'#fff', weight:30});
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
