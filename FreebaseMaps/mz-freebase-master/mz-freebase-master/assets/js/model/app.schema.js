/**
 * app.schema.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var loading = false;
	var _rootNodeSize = 30, _zoneNodeSize = 15, _typeNodeSize = 5;
	
	function _loadTypes(zone, callback){
		if(!!zone){
			var ajax = bj.transactor.create();
			ajax.send(APP_INFO.baseDir+'?z='+zone.encode(), callback);
		}		
	}
	
	function _getNodeProperties(id, callback){
		var ajax = bj.transactor.create();
		ajax.send(APP_INFO.baseDir+'?t='+id.encode(), callback);		
	}
	
	function _getRandomPointInCircle(center, radial){
		var xx = center.x, yy = center.y;
		var a = Math.random(), b = Math.random(), p = Math.PI;
		var cos = Math.cos, sin = Math.sin;
		var x = xx-b*radial*sin(2*p*a/b);
		var y = yy-b*radial*cos(2*p*a/b);	
		return {x:x-3, y:y-3}
	}
	function _getRandomPointInEllipse(center, width, height){
		var xx = center.x, yy = center.y;
		var a = Math.random(), b = Math.random(), p = Math.PI;
		var cos = Math.cos, sin = Math.sin;		
		var angle = a*(2*Math.PI);
		var x = (cos(angle)*width);
		var y = (sin(angle)*b*height);
		return {x:x, y:y}
	}
			
	var G = bj.createModel({
		data : {},
		init : function(){
			this.addNodes(_ZONES);
			var nodes = this.getNodes();
			
			var relationships = this.getRelationships();
			this.data.relationships = relationships;
			
			this.View.init();
			this.View.render(nodes, relationships);
			//this.loadTypes();
		},		
		getStructure : function(){
			return this.data.structure;
		},
		getNodes : function(){
			return this.data.nodes || [{
				id : 'root',
				label : 'Myzone',
				size : _rootNodeSize,
				x : 0,
				y : 0,
				color : '#0f0',
				attributes : {}
			}];		
		},
		getRelationships : function(){
			return this.data.relationships||[];
		},
		findRelation : function(node, type, scope){
			var c = scope || this.data.nodes;
			var t = type || false;
			var n = node, nid = n.id, r = n.attributes.relation || false;
			var relation = false;
			if(!!r){
				var target = (function(){
					var t = false;
					for(var i=0;i<c.length;i++){
						if(c[i].id==r){
							t = c[i];
							break;
						}
					}
					return t;
				})();
				if(!!target){
					var rid = bj.createId(8);
					relation = {
						id : rid,
						source : nid,
						target : target.id,
						label : n.name+' - '+target.name,
						size : (target.type=='zone')?1.5:1,
						color : (target.type=='zone')?'#f0f':'#fff',
					}
				}
			}
			return relation;
		},
		getNodeById : function(nid){
			var nodes = this.getNodes();
			for(var i=0;i<nodes.length;i++){
				if(nodes[i].id == nid){
					return nodes[i];
				}
			}
			return false;
		},
		getNodeByPath : function(path){
			var nodes = this.getNodes();
			for(var i=0;i<nodes.length;i++){
				if(!!nodes[i].attributes && nodes[i].attributes.id == path){
					return nodes[i];
				}
			}
			return false;
		},	
		addNodes : function(data, callback){
			var nodes = this.getNodes();
			var relationships = this.getRelationships();
			var ws = bj.getWindowSize();
			var p = function(n){
				var g = n.group;
				var center = {x:ws.w/2, y:ws.h/2}
				if(g=='zone'){
					return  _getRandomPointInEllipse(center, ws.w/2, ws.h/2);
				}
				else if(g=='type'){
					var R = 10;
					var parent = G.getNodeById(n.relation);		
					if(!!parent){
						R+=parent.size*2;
						center = {x:parent.x, y:parent.y}
					}		
					return _getRandomPointInCircle(center, R);
				}
			}
			var s = function(g){
				var _n = 5;
				switch(g){
					case 'zone' : _n = _zoneNodeSize;break;
					case 'type'	: _n = _typeNodeSize;break;
				}	
				return 5+Math.random()*_n;						
			}
			var c = function(g){
				var _c = '#00ff00';
				switch(g){
					case 'zone' : _c = '#ff6';break;
					case 'type'	: _c = '#e6d';break;
				}
				return _c;
			}			
			var cb = callback||function(){};
			var _add = function(item){
				var _p = p(item);
				var n = {
					id : item._id,
					label : item.name,
					size : s(item.group),
					x : _p.x,
					y : _p.y,
					color : c(item.group),
					attributes : {
						group : item.group,
						relation : item.relation,
						type : item.type,
						id : item.id,
					}
				}
				nodes.push(n);
				var r = G.findRelation(n, false, nodes);
				if(!!r){
					relationships.push(r);
				}
				cb(n, r);
			}
			if(bj.isArray(data)){
				data.forEach(function(node){
					_add(node);
				});
			}
			else{
				_add(data);
			}
			this.data.nodes = nodes;
			this.data.relationships = relationships;
		},
		loadTypes : function(){
			var v = this.View;
			var nodes = this.getNodes();
			var k = nodes.length;
			nodes.forEach(function(item){
				_loadTypes(item.id, function(r){
					k+=r.length;
					G.addNodes(r, v.add);
					if(k>=nodes.length){
						v.update();
					}					
				});
			});
		},
		onSelectStart : function(nid){
			var self = this;
			var node = self.getNodeById(nid);
			if(!!node){
				if(!node.attributes.loaded){
					node.attributes.loaded = true;
					if(node.attributes.group=='zone'){
						_loadTypes(nid, function(r){
							if(!!r){
								self.addTypes(r, node);
								self.View.render(self.getStructure());
							}
						});					
					}
					else{
						_getNodeProperties(node.id, function(r){
							if(!!r){
								console.log(r);
							}
						});
					}
				}
				else{
					
				}				
			}
		},
		onSelectEnd : function(nid){
			console.log('selected '+nid);
		},		
		search : function(){
			var t = bj.element('mz_input_keyword');
			var q = t.value.trim();
			if(!!q){
				this.View.process('Searching...');
			}
		},
		setLoadingState : function(bln){
			loading = bln;
			this.View.changeState(loading);
		}
	});
	app.schema = G;
})();
