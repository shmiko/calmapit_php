/**
 * bellaJS v1.4.2.3, BellaJS
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2012 bjTech (http://dongnd.koding.com)
 * Follows us on GitHub at https://github.com/dongnd/bellaJS
 * and Bitbucket at https://bitbucket.org/dongnd/bellajs
*/
;(function(){
        
        "use strict";
               
        var tof = function(v){
          var ots = Object.prototype.toString;
          var s=typeof v;
			if(s=='object'){
			  if(v){
				if((ots.call(v).indexOf('HTML')!==-1 && ots.call(v).indexOf('Element')!=-1)){return 'element'}
				if(v instanceof Array||(!(v instanceof Object)&&(ots.call(v)=='[object Array]')||typeof v.length=='number'&&typeof v.splice!='undefined'&&typeof v.propertyIsEnumerable!='undefined'&&!v.propertyIsEnumerable('splice'))){return 'array'}
				if(!(v instanceof Object)&&(ots.call(v)=='[object Function]'|| typeof v.call!='undefined'&& typeof v.propertyIsEnumerable!='undefined'&&!v.propertyIsEnumerable('call'))){return 'function'}
			  } 
			  return 'null';      
			} 
			else if(s=='function'&&typeof v.call=='undefined'){return 'object'}
          return s;
        }
        
		function _generateId(leng, prefix){
			function gid(l){
			  var s = '', chr = '';
			  var lng = l || 16;
				while(s.length<lng){
					chr = Math.floor(Math.random()*2147483648 ^ t.now()).toString(36).substring(1);
					if(chr!='_'){s+=chr}
				}
				return s;
			}			
			 return (prefix?(prefix):'')+gid((leng?leng:16)-(prefix?prefix.length:0));
		}
        
		var isDef = function(val){return val!=='undefined'};
		var isNull = function(val){return !val || val===null};
		var isEmpty = function(val){return isNull(val) || val=='' || val.length==0};
		var isEND = function(val){return !val||isEmpty(val)||isNull(val)||!isDef(val)};
		var isArray = function(val){return !isNull(val) && tof(val)=='array'};
		var isString = function(val){return !isNull(val) && typeof val=='string'};
		var isNumber = function(val){return !isNaN(val) && typeof Number(val)=='number'};
		var isFunction = function(val){return !isNull(val) && tof(val)=='function'};
		var isElement = function(val){return !isNull(val) && tof(val)=='element'};
		var isObject = function(val){return !isNull(val) && typeof(val)=='object'};
		     
				    
		function _getElementsByClass(className, tag, elm){
			if(document.getElementsByClassName){
			  var getElementsByClassName = function (className, tag, elm){
				elm = elm || document;
				var elements = elm.getElementsByClassName(className),
					nodeName = (tag)? new RegExp("\\b" + tag + "\\b", "i") : null,
					returnElements = [],
					current;
				for(var i=0, il=elements.length; i<il; i+=1){
					current = elements[i];
					if(!nodeName || nodeName.test(current.nodeName)){
						returnElements.push(current);
					}
				}
				return returnElements;
			  };
			}
			else if (document.evaluate){
			  var getElementsByClassName = function (className, tag, elm){
				tag = tag || "*";
				elm = elm || document;
				var classes = className.split(" "),
					classesToCheck = "",
					xhtmlNamespace = "http://www.w3.org/1999/xhtml",
					namespaceResolver = (document.documentElement.namespaceURI === xhtmlNamespace)? xhtmlNamespace : null,
					returnElements = [],
					elements,
					node;
				for(var j=0, jl=classes.length; j<jl; j+=1){
					classesToCheck += "[contains(concat(' ', @class, ' '), ' " + classes[j] + " ')]";
				}
				try{
					elements = document.evaluate(".//" + tag + classesToCheck, elm, namespaceResolver, 0, null);
				}
				catch(e){
					elements = document.evaluate(".//" + tag + classesToCheck, elm, null, 0, null);
				}
				while((node = elements.iterateNext())){
					returnElements.push(node);
				}
				return returnElements;
			  };
			}
			else{
			  var getElementsByClassName = function (className, tag, elm){
				tag = tag || "*";
				elm = elm || document;
				var classes = className.split(" "),
					classesToCheck = [],
					elements = (tag === "*" && elm.all)? elm.all : elm.getElementsByTagName(tag),
					current,
					returnElements = [],
					match;
				for(var k=0, kl=classes.length; k<kl; k+=1){
					classesToCheck.push(new RegExp("(^|\\s)" + classes[k] + "(\\s|$)"));
				}
				for(var l=0, ll=elements.length; l<ll; l+=1){
					current = elements[l];
					match = false;
					for(var m=0, ml=classesToCheck.length; m<ml; m+=1){
						match = classesToCheck[m].test(current.className);
						if (!match) {
							break;
						}
					}
					if(match) {
						returnElements.push(current);
					}
				}
				return returnElements;
			  };
			}
			return getElementsByClassName(className, tag, elm);
		}
		function _getMousePosition(ev){
		  var cursor = {x:0,y:0}, e = ev||window.event;
			if(e.pageX||e.pageY){
				cursor.x=e.pageX;
				cursor.y=e.pageY;
			}
			else{
			  var de=document.documentElement;
			  var db=document.body;
				cursor.x=e.clientX+(de.scrollLeft||db.scrollLeft)-(de.clientLeft||0);
				cursor.y=e.clientY+(de.scrollTop||db.scrollTop)-(de.clientTop||0);
			}
		  return cursor;
		}
		function _getWindowSize(){
		  var wsize={w:0,h:0};
			if(window.innerWidth){
				wsize.w=window.innerWidth;
				wsize.h=window.innerHeight;
			}
			else if(document.documentElement&&document.documentElement.clientWidth){
				wsize.w=document.documentElement.clientWidth;
				wsize.h=document.documentElement.clientHeight;
			}
			else if(document.body){
				wsize.w=document.body.clientWidth;
				wsize.h=document.body.clientHeight;
			}
		  return wsize;
		}        
        
        // event manager
        
        var EVENT_TYPES = {
			CLICK: 'click',
			DBLCLICK: 'dblclick',
			MOUSEOVER: 'mouseover',
			MOUSEOUT: 'mouseout',
			MOUSEUP: 'mouseup',
			MOUSEDOWN: 'mousedown', 
			CONTEXTMENU: 'contextmenu', 
			KEYDOWN: 'keydown',
			KEYUP: 'keyup',
			KEYPRESS: 'keypress',
			FOCUS: 'focus',
			BLUR: 'blur',
			CHANGE: 'change',
			SELECT: 'select',
			SUBMIT: 'submit',
			INPUT: 'input',
			PROPERTYCHANGE: 'propertychange',
			DRAGSTART: 'dragstart',
			DRAG: 'drag',
			DRAGENTER: 'dragenter',
			DRAGOVER: 'dragover',
			DRAGLEAVE: 'dragleave',
			DROP: 'drop',
			DRAGEND: 'dragend',			
			TOUCHSTART: 'touchstart',
			TOUCHMOVE: 'touchmove',
			TOUCHEND: 'touchend',
			TOUCHCANCEL: 'touchcancel',
			SCROLL: 'scroll'	
		}
		
        var EV_MAPS = {
			data : [],
			put : function(el, ev, fn){
				var dmaps = EV_MAPS.data;
				var ob = false;
				for(var i=0;i<dmaps.length;i++){
					if(dmaps[i].element==el){
						ob = dmaps[i];
						break;
					}
				}
				if(!ob){
					var ob = {
						element : el,
						events : []
					}
					dmaps.push(ob);
				}
				var evd = false;
				for(var i=0;i<ob.events.length;i++){
					if(ob.events[i].name==ev){
						evd = ob.events[i];
						break;
					}
				}
				if(!evd){
					evd = {
						name : ev,
						actions : []
					}
					ob.events.push(evd);
				}
				evd.actions.push(fn);
			},
			getActions : function(el, ev){
				var acts = [];
				var dmaps = EV_MAPS.data;
				var ob = false;
				for(var i=0;i<dmaps.length;i++){
					if(dmaps[i].element==el){
						ob = dmaps[i];
						break;
					}
				}
				if(!!ob){
					var evd = false;
					for(var i=0;i<ob.events.length;i++){
						if(ob.events[i].name==ev){
							evd = ob.events[i];
							break;
						}
					}					
				}
				if(!!evd){
					acts = evd.actions;
				}		
				return acts;
			}
		}
		
        var removeAllEvents = function(el){
			for(var k in EVENT_TYPES){
				(function(ev){
					removeAllListeners(el, ev);
				})(EVENT_TYPES[k]);																		
			}			
		}
        var removeAllListeners = function(el, ev){
			var actions = EV_MAPS.getActions(el, ev);
			actions.forEach(function(act){
				event.ignore(el, ev, act);
			});
			actions.empty();
		}
		
		var event = {
			listen : function(el, ev, cb){
				this.ignore(el, ev, cb);
				var ob = isString(el)?_getElement(el):el;
				if(ob){
					EV_MAPS.put(ob, ev, cb);
					if(ob.addEventListener){
						ob.addEventListener(ev, cb, false);
					}
					else if(ob.attachEvent){
						ob.attachEvent('on'+ev, function(){return cb.call(ob, window.event)});
					}
				}
			},
			ignore : function(el, ev, cb){
				var ob = isString(el)?_getElement(el):el;
				if(!!ob){
					if(!!ev){
						if(!!!!cb){
							if(ob.removeEventListener){ob.removeEventListener(ev, cb, false)}
							else if(ob.detachEvent){
								try{
									ob.detachEvent('on'+ev, cb);
								}
								catch(e){}
							}
						}
						else{
							removeAllListeners(ob, ev);
						}
					}
					else{
						removeAllEvents(ob);
					}					
				}				       
			},
			getEvtTag : function(e){
				var evt = e || window.event;
				var targ = evt.target || evt.srcElement;
				if (targ && targ.nodeType == 3){
					targ = targ.parentNode;
				}
				return targ;
			},     
			onwheel : function(){},
			exit : function(e){
				e.cancelBubble = true;
				e.returnValue = false;
				if(e.stopPropagation){
					e.stopPropagation();
					e.preventDefault();
				}
				return false;
			}       
		}
		var Wheel = function(e){
			var delta = 0;
			var ev = e || window.event;
			if(ev.wheelDelta) {
				delta = ev.wheelDelta/120;
			} 
			else if(ev.detail) {
				delta = -ev.detail/3;
			}
			if(!!delta){
				event.onwheel(delta);
			}
			event.exit(e);
		}
				
		window.onload = function(){
			if(window.addEventListener){
				window.addEventListener('DOMMouseScroll', Wheel, false);
			}
			window.onmousewheel = document.onmousewheel = Wheel;
		}   
		        
        // DOM
        function _getElement(el){
			var p = (isString(el)?document.getElementById(el):el)||null;
			if(!!p && isElement(p)){
				if(!p.hasClass){
					p.hasClass = function(c) {
						var r = true, e = this.className.split(' '); c = c.split(' ');
						for(var i=0; i<c.length; i++){
							if(e.indexOf(c[i])===-1){
								r = false;
								break;
							}
						}
						return r;
					};
				}
				if(!p.addClass){
					p.addClass = function(c){
						c = c.split(' ');
						var t = this.className;
						var nc = c.concat(t);
						var sc = nc.unique();
						this.className = sc.join(' ');
					};
				}
				if(!p.removeClass){
					p.removeClass = function(c){
						var e = this.className.split(' '); c = c.split(' ');
						for(var i=0; i<c.length; i++){
							if(this.hasClass(c[i])){
								e.splice(e.indexOf(c[i]), 1);
							}
						}
						this.className = e.join(' ');
						return this;
					};
				}
				if(!p.opacity){
					p.opacity = function(o){
						this.style.opacity = o;
						if(typeof this.style.opacity!="string"){
							this.style.MozOpacity=o;
							try{
								if(this.filters){
									this.style.filter="progid:DXImageTransform.Microsoft.alpha(opacity="+(o*100)+")";
								}
							} 
							catch(e){}
						}
					}
				}
				for(var k in EVENT_TYPES){
					(function(ev){
						p[ev] = function(callback){
							event.listen(p, ev, callback);
						}
					})(EVENT_TYPES[k]);																		
				}
				p['ignore'] = function(){
					event.ignore(p);
				}
							
                p.show = function(){
                    this.style.display =  'block';
                    this.style.visibility = 'visible';
                }
                p.hide = function(){
                    this.style.display =  'none';
                    this.style.visibility = 'hidden';
                }
                p.css = function(s){
					if(!s){
						return this.getAttribute('style');
					}					
                    this.setAttribute('style', s);
                }
                p.bgpos = function(l, t){
					if(isNumber(l) && isNumber(t)){
						this.style.backgroundPosition = number.round(l,3)+'px '+number.round(t,3)+'px';
					}
                }
                p.html = function(s){
					if(!s){
						return this.innerHTML;
					}					
                    this.innerHTML = s;
                }	
                p.text = function(s){
					if(!s){
						return this.innerText||this.textContent;
					}					
					if(this.innerText){
						this.innerText = s;
					}
					else if(this.textContent){
						this.textContent = s;
					}
                } 
                p.setPosition = function(opts){
                    this.style.top = number.round(opts.top,2)+'px';
                    this.style.left = number.round(opts.left,2)+'px';			
				}           
                p.getOffset = function(ancestor){
					return (function(el, anc){
						var pos = {left:0,top:0};
						var root = (!anc?document.body:_getElement(anc));
						var bs=0;
						if(!!el.offsetParent){
							do{
								if(el==root){break}
								bs = parseInt(document.defaultView.getComputedStyle(el, null).getPropertyValue('border-width'));
								pos.left+=el.offsetLeft+(bs>0?bs:0);
								pos.top+=el.offsetTop+(bs>0?bs:0);      
							} 
							while (el=el.offsetParent);
						}
						return pos;
					})(this, ancestor);				
                }                         	               	
			}
			return p;                 			
        };
        var _addElement = function(tag, parent){
			var p = !!parent?bj.element(parent):document.body;
			var d = document.createElement(tag);
			p.appendChild(d);
			return _getElement(d);
		}              

        if(!Object.create){
			Object.create = function(o){
			   var makeArgs = arguments;
			   function F() {
				  var prop, i=1, arg, val;
				  for(prop in o) {
					if(!o.hasOwnProperty(prop)){
						continue;
					}
					val = o[prop];
					arg = makeArgs[i++];
					if(typeof arg === 'undefined'){
						break;
					}
					this[prop] = arg;
				  }
			   }
			   F.prototype = o;
			   return new F();
			}
		}            
                     				        
        String.prototype.encode = function(){
             return window.encodeURIComponent(this);
        }
        String.prototype.decode = function(){
             return window.decodeURIComponent(this.replace(/\+/g, ' '));
        }
        String.prototype.trim = function(){
             return this.replace(/^[\s\xa0]+|[\s\xa0]+$/g, '');
        }
        String.prototype.truncate = function(t){
			var s=this.trim();
			var ls = s;
			var r='';
				if(s==''||s.indexOf(' ')==-1){return s}
				if(s.length<=t){return s}
				else{
					s = s.substring(0,t);
					var a=s.split(' ');
					var b=a.length;
					if(b>1){
						var c = a.pop();
						r+=a.join(' ');
						if(r.length<ls.length){
								r+='...';
						}
					}
					else{
						s=s.substring(0, t-3);
						r+='...';
					}
				}
			return r;
        }
        String.prototype.stripTags = function(){
            return this.replace(/<\w+(\s+("[^"]*"|'[^']*'|[^>])+)?>|<\/\w+>/gi, '');
        }
        String.prototype.toText = function(){
			var d=document.createElement('span');
			d.innerHTML=this;
			return d.textContent||d.innerText;
        }
        String.prototype.escapeHTML = function(){
            return this.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
        }
        String.prototype.unescapeHTML = function(){
            return this.strip().replace(/&lt;/g,'<').replace(/&gt;/g,'>').replace(/&amp;/g,'&');
        }       
        String.prototype.replaceAll = function(a, b){
			var aa = this.split(a);
			return aa.join(b);
        }       
        String.prototype.addComma = function(comma){
			var s = this;
			if(s.length>0 && s.match(/^\d+(\.?)\d+$/)){
				s+='';x=s.split('.');x1=x[0];x2=x.length>1?'.'+x[1]:'';
				var rgx =/(\d+)(\d{3})/;
					while(rgx.test(x1)){
						x1=x1.replace(rgx,'$1'+(comma?comma:',')+'$2');
					}
				return x1+x2;
			}
			return  s;
        }
        String.prototype.toDomain = function(){
			return this.match(/:\/\/(.[^/]+)/)[1] || '';
		}
   
        if(!Array.prototype.forEach){
          Array.prototype.forEach=function(callback,thisArg){
			var T, k;
			if(this==null){
			  return false;
			}
			var O = Object(this);
			var len = O.length >>> 0;
			if({}.toString.call(callback) != "[object Function]" ){
			  return false;
			}
			if(thisArg){
			  T = thisArg;
			}
			k = 0;
			while(k<len){
			  var kValue;
			  if ( k in O ) {
				kValue = O[ k ];
				callback.call( T, kValue, k, O );
			  }
			  k++;
			}
          }
        }
        if(!Array.prototype.every){
          Array.prototype.every = function(fun){
			if (this === void 0 || this === null){
			  return false;
			}
			var t = Object(this);
			var len = t.length >>> 0;
			if (typeof fun !== "function"){
			  return false;
			}
			var thisp = arguments[1];
			for (var i = 0; i < len; i++){
			  if (i in t && !fun.call(thisp, t[i], i, t)){
				return false;
			  }
			}
			return true;
          }
        }
        if(!Array.prototype.indexOf){
           Array.prototype.indexOf = function(elt /*, from*/){
			 var len = this.length >>> 0;
			 var from = Number(arguments[1]) || 0;
			 from = (from < 0) ? Math.ceil(from) : Math.floor(from);
			 if (from < 0){
				from += len;
			 }
			 for (; from < len; from++){
				if (from in this && this[from] === elt){
					return from;
				}
			 }
			 return -1;
          }
        }
        if(!Array.prototype.filter){
          Array.prototype.filter = function(fun /*, thisp*/){
			var len = this.length;
			var res = new Array();
			var thisp = arguments[1];
			for (var i = 0; i < len; i++){
			  if (i in this){
				var val = this[i]; // in case fun mutates this
				if (fun.call(thisp, val, i, this)){
					 res.push(val);
				}
			  }
			}

			return res;
          }
        }
        if(!Array.prototype.map){
          Array.prototype.map = function(fun /*, thisp*/){
			var len = this.length;
			var res = new Array(len);
			var thisp = arguments[1];
			for (var i = 0; i < len; i++){
			  if(i in this){
				res[i] = fun.call(thisp, this[i], i, this);
			  }
			}
			return res;
          }
        }
		if(!Array.prototype.reduce){
		  Array.prototype.reduce = function reduce(accumulator){
			if (this===null || this===undefined){
				throw new TypeError("Object is null or undefined");
			}
			var i = 0, l = this.length >> 0, curr;
		 
			if(typeof accumulator !== "function"){
			  throw new TypeError("First argument is not callable");
			}
		 
			if(arguments.length < 2) {
			  if (l === 0){
				  throw new TypeError("Array length is 0 and no second argument");
			  }
			  curr = this[0];
			  i = 1;
			}
			else
			  curr = arguments[1];
		 
			while (i < l) {
			  if(i in this){
				  curr = accumulator.call(undefined, curr, this[i], i, this);
			  }
			  ++i;
			}
			return curr;
		  };
		}        
        if(!Array.prototype.some){
            Array.prototype.some = function(fun /*, thisp*/){
                var len = this.length;
                var thisp = arguments[1];
                for (var i = 0; i < len; i++){
                  if (i in this && fun.call(thisp, this[i], i, this)){
                        return true;
                  }
                }
                return false;
           }
        }       
        Array.prototype.unique = function(){
			var r = [];
			for(var i = 0; i < this.length; i++){
			   if( r.indexOf(this[i]) === -1){
					 r.push(this[i]);
			   }
			}
			return r;
        }       
        if(!Array.prototype.max){
			Array.prototype.max = function(){
				return Math.max.apply({},this)
			}
        }
        if(!Array.prototype.min){
			Array.prototype.min = function(){
				return Math.min.apply({},this)
			}
        }
        if(!Array.prototype.contains){
			Array.prototype.contains =  function(el, key){
				for(var i=0;i<this.length;i++){
					var val = this[i];
					if((key && val[key]===el[key])||(val===el)){
						return true;
					}
				};
				return false;
			}
        }
        Array.prototype.msort = function(property, direction){
			if(!property){
				this.sort();
			}
			else{
				var d = (!direction||direction==='asc')?1:-1;
				this.sort(function(a, b){
					return (a[property]>b[property])?d:(a[property]<b[property]?(-1*d):0);
				});
			}
			return this;
        }
        Array.prototype.clone = function(){
             return this.slice();
        }
        Array.prototype.empty = function(){
			for(var i=this.length-1;i>=0;i--){
				 delete this[i];
			}
			this.length=0;
        }      
		
		// userAgent 
		var userAgent = (function(){
			var ua = navigator.userAgent;
			var n = ua.toLowerCase(), rv = 0;
			if(!!window.attachEvent){
				if(n.indexOf('trident/5.0')>-1){
					rv = 9;
				}
				else{
					var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
					if (re.exec(ua) != null){
					  rv = parseFloat(RegExp.$1);
					}
				}
			}
			return {
					SWB     : !!window.localStorage,
					Webkit  : n.indexOf('applewebkit')>-1,
					Gecko   : n.indexOf('gecko')>-1&&n.indexOf('khtml')==-1,
					Chrome  : n.indexOf('applewebkit')>-1&&n.indexOf('chrome')>-1,
					Safari  : n.indexOf('applewebkit')>-1&&n.indexOf('chrome')==-1,
					Firefox : n.indexOf('gecko')>-1&&n.indexOf('firefox')>0,           
					IE      : !!window.attachEvent&&!window.opera,
					IEv     : rv,
					Opera   : !!window.opera,
					Linux   : n.indexOf('linux')!=-1,
					Win     : n.indexOf('win')!=-1,
					Mac     : n.indexOf('mac')!=-1,  
					Unix    : n.indexOf('x11')!=-1                  
			}
		})();	
		
		// webkit notification object
		var noinst = null;
		
		var notification =  {
			show : function(a, b, c, d){
				if(userAgent.Webkit && !cookies.get('_notification_displaying')){
					if(window.webkitNotifications.checkPermission()>0){
						window.webkitNotifications.requestPermission(function(){notification.show(a,b,c,d)});
					}
					else{
						notification.hide();
						noinst=window.webkitNotifications.createNotification(a,b,c);
						noinst.show();
						cookies.set('_notification_displaying', 1);
						if(d&&d<120){
							setTimeout(notification.hide,d*1E3);
						}
					}
				}
			},
			hide : function(){
				if(!!noinst){
					noinst.cancel();
					noinst = null;
					bj.cookies.remove('_notification_displaying');
				}
			}
		}
	   
        // Date 
        var pattern = 'D, M d, Y  H:i:s A';
		var weeks = ["Sunday", "Monday", "Tuesday","Wednesday", "Thursday", "Friday","Saturday"];
		var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		var gmttime = new Date();
		var timezone = (new Date()).getTimezoneOffset();
		
		var date = {
			getTimeZone : function(){
				return timezone;
			},
			setTimeZone : function(t){
				timezone = t;
				return t;
			},			
			getPattern : function(){
				return pattern;
			},
			setPattern : function(p){
				pattern = p;
				return p;
			},			
			toRelativeTime : function(input){
				var time = (input instanceof Date?input:new Date(input));
				var delta = new Date()-time;
				var now_threshold = parseInt(time, 10);
				if(isNaN(now_threshold)){
					now_threshold = 0;
				}
				if(delta <= now_threshold){
					return 'Just now';
				}
				var units = null;
				var conversions = {
					millisecond: 1,
					second: 1000,
					minute: 60,
					hour:   60,
					day:    24,
					month:  30,
					year:   12 
				};
				for(var key in conversions){
					if (delta < conversions[key]){
						break;
					} 
					else{
						units = key;
						delta = delta / conversions[key];
					}
				}
				delta = Math.floor(delta);
				if (delta!==1){units += 's';}
				return [delta, units].join(' ')+' ago';
			},
			make : function(output, input, suninred){
				var s='', sun=suninred||false, meridiem=false, d, f, vchar=/\.*\\?([a-z])/gi;
				if(!input){
					input = new Date(); 
					output = pattern;
				}
				var wn = weeks;
				var mn = months;
				var _num = function(n){
					return ''+(n<10?'0'+n:n);
				}
				var _ord=function(day){
					return day+=function(day){
						var s=' ';
						switch(day){
							case 1:s+='st';break;
							case 2:s+='nd';break;
							case 3:s+='rd';break;
							case 21:s+='st';break;
							case 22:s+='nd';break;
							case 23:s+='rd';break;
							case 31:s+='st';break;
							default:s+='th';
						};
						return s;
					}
				}
				var fix = function(s){
					s=s.replace('....','&nbsp;');
					s=s.replace('...',' at ');
					s=s.replace('..',' on ');
					s=s.replace('.',' in ');
					return s;
				}			
				var _term = function(t,s){
					return f[t]?f[t]():s;
				}
				d = (input instanceof Date) ? input : new Date(input);
				
				if(isNaN(d.getTime())){
					var reg=/^(\d+-\d+-\d+)\s(\d+:\d+:\d+)$/i;
					if(reg.test(input)){
						d = new Date(input.replace(' ','T'));
					}
					else{
						return input+' !';
					}
				}
				if(output.indexOf('a')>0 || output.indexOf('A')>0){
					meridiem=true;
				}
				f = {
					Y:function(){return d.getFullYear()},
					y:function(){return (f.Y()+'').slice(-2)},
					F:function(){return mn[f.n()-1]},
					M:function(){return (f.F()+'').slice(0,3)},
					m:function(){return _num(f.n())},
					n:function(){return d.getMonth()+1},
					S:function(){return _ord(f.j())},
					j:function(){return d.getDate()},
					d:function(){return _num(f.j())},
					t:function(){return (new Date(f.Y(), f.n(), 0)).getDate()},
					w:function(){return d.getDay()},
					l:function(){return wn[f.w()]},
					D:function(){var r=(f.l()+'').slice(0,3);return r},
					G:function(){return d.getHours()},
					g:function(){return (f.G()%12||12)},
					h:function(){return _num(f.g())},
					H:function(){return (meridiem?f.h():_num(f.G()))},
					i:function(){return _num(d.getMinutes())},
					s:function(){return _num(d.getSeconds())},
					a:function(){return f.G()>11?'pm':'am'},
					A:function(){return (f.a()).toUpperCase()}              
				}
				return fix(output.replace(vchar, _term))
			},	
			gmtToLocal : function(input){
				var d = new Date(input);
				d.setTime(d.getTime()+timezone);
				return d.getTime();
			},	
			convert : function(d){
				return date.make(pattern, d);
			},
			validate : function(m, d, y){
				return m>0&&m<13&&y>0&&y<32768&&d>0&&d<=(new Date(y,m,0)).getDate();
			} 
		}
			   
        // AJAX
		var transactor = {    
			state : -1,
			xmlhttp : null,   
			onchange : function(){},
			onerror : function(){},
			onabort : function(){},
			init : function(){
				try{
					var r=null;
					if(window.ActiveXObject){
						r=new ActiveXObject("Msxml2.XMLHTTP");
						if(!r){
							r=new ActiveXObject("Microsoft.XMLHTTP");
						}
					}
					else if(window.XMLHttpRequest){
						r=new XMLHttpRequest();
					}
				}
				catch(e){
					console.log('Cannot create XMLHTTP instance');
				}
				finally{
					this.xmlhttp = r;
				}               
			},
			send : function(opts, callback){
				this.init();
				if(this.xmlhttp){
					var that = this;
					var cb = callback?callback:function(){};
					try{
						this.xmlhttp.onreadystatechange = function(){
							that.state = that.xmlhttp.readyState;
							that.onchange(that.state);
							if(that.state==4 && that.xmlhttp.status==200){			
								var res = that.xmlhttp.responseText;
								var ob = JSON.parse(res)||res;
								cb(ob);
								that.xmlhttp = null;
							}
						}					
						if(isString(opts)){
							this.xmlhttp.open("GET", opts, true);
							this.xmlhttp.send(null);						
						}					
						else if(isObject(opts)){
							var data = (function(d){
								var s;
								if(isString(d)){
									s = d;
								}
								else if(isObject(d)){
									var s = '', a = [];
									for(var k in d){
										if(isObject(d[k])){
											d[k] = JSON.stringify(d[k]);
										}
										a.push(k+'='+d[k]);
									}
									s = a.join('&');
								}
								return s;						
							})(opts.data);
							this.xmlhttp.open("POST", opts.target, true);
							this.xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
							this.xmlhttp.send(data);
						}
					}
					catch(e){
						that.onerror(e);
						cb(false);
					}					
				}
			},
			abort : function(){
				if(this.xmlhttp && this.state>-1){
					this.xmlhttp.abort();
					this.onabort();
				}
			},
			create : function(){
				return bj.inherits(this);
			}
		}
         
        // number  
        var number = {
			round:function(num, dec){
				return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
			},
			addComma:function(s, comma){
				try{
					if(s.match(/^\d+(\.?)\d+$/)){
						s+='';x=s.split('.');x1=x[0];x2=x.length>1?'.'+x[1]:'';
						var rgx =/(\d+)(\d{3})/;
							while(rgx.test(x1)){
								x1=x1.replace(rgx,'$1'+(comma?comma:',')+'$2');
							}
						return x1+x2;
					}       
				}
				catch(e){return s}
			}       
		}
		
		// cookies
		var cookies = {
			set : function(name, value, days){              
				var d = new Date(), v = value+'';
				d.setDate(d.getDate()+days?days:0);
				document.cookie=name+'='+(!!v?v.encode():'')+(!!days?'; expires='+d.toUTCString():'')+'; path=/;';
			},      
			get : function(name, callback){
				if(document.cookie){
					var a = document.cookie.split(';');
					if(!name){
						var res = [];
						for(var i=0;i<a.length;i++){
							var t = a[i].trim(), ac = t.split('='), x = ac[0].trim();
							res.push({
								name : x,
								value : ac[1].decode()
							});
						}
						if(!!callback){
							callback(res);
						}
						return res;
					}						
					var n = name.trim();
					for(var i=0;i<a.length;i++){
						var t = a[i].trim(), ac = t.split('='), x = ac[0].trim();
						if(x==n){
							var res = ac[1].decode();
							if(!!callback){
								callback(res);
							}							
							return res;
						}
					};
				}
				return null;
			},
			remove : function(name){
				this.set(name, null, -1);
			}       
		}
		
		// storage	
		var storage = (function(){
			var _store = {};
			var _instance;
			
			var contextStorage = {
				setItem : function(key, value){
					_store[key] = value;
				},
				getItem : function(key){
					return _store[key] || null;
				},
				removeItem : function(key){
					if(!!_store[key]){
						_store[key] = null;
					}
				},      
				clear : function(){
					_store = {};
				}
			}
			var exc = function(action, key, value){
				try{
					var db = _instance;
					if(!!db){
						if(action=='clear'){
							db.clear();
						}
						else if(action=='remove'){
							db.removeItem(key);
						}
						else if(action=='get'){
							return db.getItem(key);
						}
						else if(action=='set'){
							var k=key.trim();
							var v=value.trim();
							try{
								db.setItem(k,v);
								return 1;
							}
							catch(e){
								if(e==QUOTA_EXCEEDDED_ERR){return 0}
								else if(e==NOT_SUPPORTED_ERR){return -1}
								else{return -2}
							}
						}
					}
					else{
						console.log('Please select least one storage by using selectDB method!');
					}
				}
				catch(e){
					console.log(e);
				}
			} 			
			var selectDB = function(name){
				if(name==='local' || name===2){
					_instance = window.localStorage||false;
				}
				else if(name==='session' || name===1){
					_instance = window.sessionStorage||false;
				}
				else if(!name|| name==='context'){
					_instance = contextStorage;
				}
			}
			var closeDB = function(){
				_instance = null;
			}			
			
			return {
				selectDB : selectDB,
				closeDB : closeDB,
				set : function(key, value){
					var k = key.trim();
					var v = isString(value)?value.trim():JSON.stringify(value);
					return exc('set', k, v);
				},
				get : function(key, callback){
					if(key!=''){
						var k = key.trim();
						var r = exc('get',k);
						if(!!r){
							var o = JSON.parse(r);
							if(callback==='toJSON'){
								return o;
							}
							else if(isFunction(callback)){
								callback(o);
							}
							else{
								return r;
							}
						}
						return '';
					}
				},
				remove : function(key){
					if(key!=''){
						var k=key.trim();
						if(k!=''){exc('remove', k)}
					}
				},
				clear : function(){
					exc('clear');
				}
			}
		})();
		 
		// MVC supporter
		
		var router = (function(){
			var data = [];
			
			var _getRouteBySyntax = function(syntax){
				var a = data;
				for(var i=0;i<a.length;i++){
					if(a[i].key == syntax){
						return a[i];
					}
				}
				return false;				
			}
			var _getRouteByKey = function(key){
				var a = data;
				var res = [];
				for(var i=0;i<a.length;i++){
					var item = a[i];
					if(!!item && item.key){
						var b = item.key.split('/');
						if(b.length>0 && b[0]==key){
							res.push(item);
						}
					}
				}
				return res;				
			}	
			var _parseRoute = function(){
				var h = window.location.hash;
				if(!!h){
					h=h.replace('#','');
					var a = h.split('/');
					var k = a.length;
					if(k>0){
						var routes = _getRouteByKey(a[0]);
						if(!!routes){
							routes.forEach(function(item){
								var route = item.route;
								var j = 1;
								for(var i in route){
									route[i] = a[j]||'';
									j++;
								};
								_onRouterChange(route, item.callback);
							});
						}
					}
				}			
			}		
			var _onRouterChange = function(route, callback){
				callback(route);
			}		

			return {
				register : function(syntax, callback){
					if(!!syntax){
						var cs = syntax.split('/');
						if(cs.length>1){
							if(data.length==0){
								window.onhashchange = _parseRoute;
							}						
							var r = _getRouteBySyntax(syntax);
							if(!r){
								r = {
									key: syntax,
									route: {},
									callback: callback||function(){}
								};						
								data.push(r);
							}
							for(var i=1;i<cs.length;i++){
								r.route[cs[i]] = '';
							}
						}					
					}
				},
				start : function(){
					_parseRoute();
				}
			}			
		})();
		
		
		var _model = (function(){
			var _changed = function(m, key, val){
				var p = m.events[key] || function(){};
				p(val);
			}
			var M = {
				data : {},
				events : {},
				init : function(){
					
				},
				set : function(key, val){
					var old = this.get(key);
					if(!old || old!=val){
						this.data[key] = val;
						_changed(this, key, val);
						_changed(this, 'all', this.data);
					}
				},
				get : function(key){
					return this.data[key]||null;
				},
				clear : function(){
					this.data = {};
				},
				onchange : function(key, callback){
					this.events[key] = callback || function(){};
				}
			}			
			return M;
		})();
		
		function createModel(opts){
			var m = bj.inherits(_model);
			if(!!opts){
				m = bj.extend(opts, m);
				m.View = {};
			}
			return m;			
		}
		function createView(model, opts){
			var v = {};
			if(!!model){
				v = bj.extend(opts, v);
				v.Model = model;
				v.Model.View = v;
			}
			else{
				throw new Error('Model not be specified!');
			}		
			return v;			
		};
		     
        // define bellajs object and it shorthand
        var t = window['bj'] = window['bellajs'] = {			
			register : function(name){
				var parts = name.split('.');
				var pad = this;
				for(var i=0; i<parts.length; i++){
				  if(!pad[parts[i]]){
					 pad[parts[i]]={};
				  }
				  pad=pad[parts[i]];
				}
			},
			inherits : Object.create,
			copies : function(from, to, matched, excepts){
				var mt = matched===false?false:true;
				var ex = excepts || [];
				for(var k in from){
					if(ex.length>0 && ex.contains(k)){
						continue;
					}
					if(!mt || (mt && to.hasOwnProperty(k))){
						to[k] = from[k];
					}
				}               
				return to;
			},
			clone : function(obj){
				if(null == obj || "object" != typeof obj){
					return obj;
				}
				if(obj instanceof Date){
					var copy = new Date();
					copy.setTime(obj.getTime());
					return copy;
				}
				if(obj instanceof Array){
					var copy = [], arr = obj.slice(0);
					for(var i = 0, len = arr.length; i < len; ++i){
						copy[i] = bj.clone(arr[i]);
					}
					return copy;
				}
				if(obj instanceof Object){
					var copy = {};
					for(var attr in obj){
						if(attr=='clone'){
							continue;
						}
						if(obj.hasOwnProperty(attr)){
							copy[attr] = bj.clone(obj[attr]);
						}
					}
					return copy;
				}
				return false;
			},
			extend : function(a, b){
				for(var k in a){
					b[k]=a[k];
				}				
				return b;
			},
			compare : function(a, b){
				var eq = true;
				for(var k in a){
					if(typeof(b[k])==='undefined' || b[k]!=a[k]){
						eq = false;
					}
				}
				return eq;
			},
			getMousePosition : _getMousePosition,                
			getWindowSize : _getWindowSize,  
			getElementsByClass : _getElementsByClass,
			element : _getElement,
			addElement : _addElement,
			getElement : _getElement,
			genid : _generateId,
			createId : _generateId,
			now : function(){return new Date()},
			time : function(){return (new Date()).getTime()},                     
			includeCSS : function(url){
				var head = document.getElementsByTagName("head")[0];         
				var css = document.createElement('link');
				css.type = 'text/css';
				css.rel = 'stylesheet';
				css.href = url;
				css.media = 'screen';
				head.appendChild(css);
			},
			includeJS : function(url, callback){
				var head = document.getElementsByTagName('head')[0];
				var s = document.createElement('script');
				s.type = 'text/javascript';
				s.onload = s.onreadystatechange = function(){
						if(s.readyState=='loaded'||s.readyState=='complete'){
								if(callback){callback()}
						}
				}
				s.src = url;
				head.appendChild(s);                    
			},                    
			listen : function(a, b, c){return event.listen(a, b, c)},
			ignore : function(a, b, c){return event.ignore(a, b, c)},
			getEvtTag : function(e){return event.getEvtTag(e)},             
			exitEvent : function(e){return event.exit(e)},   
			setOnwheelCallback : function(f){event.onwheel = f}, 
			setOnloadCallback : function(f){window.onload=f},
			setOnresizeCallback : function(f){window.onresize=f},
			setOnrehashCallback : function(f){window.onhashchange=f},
			setOnrestateCallback : function(f){window.onpopstate=f},    
			cookies : cookies,
			date : date,
			number : number,
			transactor : transactor,   
			storage : storage,   	
			Router : router,
			createModel : createModel,		      
			createView : createView,              
			isDef : isDef,
			isNull : isNull,
			isEmpty : isEmpty,
			isEND : isEND,
			isArray : isArray,
			isString : isString,
			isNumber : isNumber,
			isFunction : isFunction,
			isElement : isElement,
			isObject : isObject
        }
})();
