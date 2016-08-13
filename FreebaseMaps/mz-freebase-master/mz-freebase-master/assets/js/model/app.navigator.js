/**
 * app.navigator.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
;(function(){
	
	'use strict';
	
	var max = 16, loading = false;

	function _getNodeById(id, data){
		var node = false;
		if(data.id==id){
			return data;
		}
		if(!!data.children){
			for(var i =0;i<data.children.length;i++){
				var item  = data.children[i];
				node = _getNodeById(id, item);
				if(!!node){
					return node;
				}
			};	
		}
		return node;
	}
	
	function _buildQuery(node){
		var q = '';
		var lv = node.level;
		if(lv===1){
			q = [{
				id:	null,
				name: null,
				type: "/type/type",
				domain: {
					id: node.path
				}
			}];			
		}
		else if(lv===2){
			q = node.path;
		}
		else if(lv===3){
			q = node.mid;
		}		
		return q;
	}
	
	function _getSubNodes(node, callback){
		var q = _buildQuery(node);
		if(!!q){
			var lv = node.level;
			var ajax = bj.transactor.create();
			ajax.send(APP_INFO.baseDir+'mqread?lv='+lv+'&q='+(lv>2?q:JSON.stringify(q)), callback);
		}
	}
		
	function _search(kw, callback){
		var ajax = bj.transactor.create();
		ajax.send(APP_INFO.baseDir+'mqread?action=search&q='+kw.encode(), callback);
	}	
		
	var G = bj.createModel({
		data : {},
		init : function(){
			
			var root = {
				id : '_mz',
				name : 'Myzone',
				path : '',
				group : '',
				children : [],
				level : 0
			}
			
			var zones = _ZONES||[];
			if(!!zones){
				zones.forEach(function(item){
					G.pushChild(root, {
						level : 1,
						id :  item._id,
						name : item.name,
						path : item.id,
						group : item.group,
						children : []
					});
				});
			}
			this.data.structure = root;
			this.View.init();
			this.View.render();
		},		
		load : function(s, p){
			var cs = G.get('stream');
			var cp = G.get('page');
			
		},
		getNodeLevel : function(nodeid){
			var node = _getNodeById(nodeid, this.data.structure);
			return node.level || -1;
		},
		removeChild : function(node){
			node.children = [];
		},
		removeAllChild : function(nodes){
			if(!!nodes){
				nodes.forEach(function(node){
					node.children = [];
				});
			}
		},
		pushChild : function(parent, childs){
			if(!parent.children){
				parent.children = [];
			};
			if(parent.level>0){
				var ancestor = parent._||false;
				if(!!ancestor){
					var ob = _getNodeById(ancestor, this.data.structure);
					if(!!ob){
						G.removeAllChild(ob.children);
					}
				}
			}
			
			var add = function(a, b){
				a._ = b.id;
				a.level = b.level+1;
				if(!!a.id && !a.path){
					a.path = a.id;
				}
				a.id = bj.createId(8);
				a.children = [];
				b.children.push(a);			
			}
			if(bj.isArray(childs)){
				childs.forEach(function(item){
					add(item, parent);
				});
			}
			else{
				add(childs, parent);
			}
		},
		loadChild : function(id){
			var node = _getNodeById(id, this.data.structure);
			if(!!node && node.level<4){
				var self = this;
				_getSubNodes(node, function(r){
					if(!!r && !!r.result){
						if(node.level<3){
							self.View.process('Updating...');
							G.pushChild(node, r.result);
							self.View.update();
						}
						else{
							self.View.openBox(node, r.result);
						}
					}
					else{
						self.View.notice('Request sucessfully, no response data.');
					}	
				});
			}
		},
		onSelectStart : function(nodeid){
			var ob = _getNodeById(nodeid, this.data.structure);
			if(ob.level>0){
				G.setLoadingState(true);
				G.loadChild(nodeid);
			}
		},	
		onSelectEnd : function(node){
			G.setLoadingState(false);
		},
		onRendered : function(){
			this.View.notice('Load complete.');
		},
		search : function(){
			var t = bj.element('mz_input_keyword');
			var q = t.value.trim();
			if(!!q){
				this.View.process('Searching...');
				var self = this;
				_search(q, function(r){
					if(!!r && !!r.result && r.result.length>0){
						var root = {
							id : '_mz',
							name : 'Myzone',
							children : [],
							level : 0
						}
						var alpha = false;
						r.result.forEach(function(item){
							var oo = bj.clone(item);
							var ob = {
								level : 1,
								id :  item._id,
								name : item.name,
								path : item.id,
								children : []
							}
							G.pushChild(root, ob);
							G.pushChild(ob, item.children);
							if(oo.children[0].children.length>0){
								alpha = oo.children[0].children[0];
								G.pushChild(item.children[0], oo.children[0].children);
							}
						});
						self.data.structure = root;
						self.View.update(alpha);				
					}
					else{
						self.View.notice('No item matched.');
					}
				});
			}
		},
		setLoadingState : function(bln){
			loading = bln;
			this.View.changeState(loading);
		}
	});
	app.navigator = G;
	
})();
