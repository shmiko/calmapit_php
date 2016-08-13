/**
 * bj.dragger.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2012 bjTech (http://dongnd.koding.com)
*/
;(function(){
	
	var ob = null;
	var tp = 0, lf = 0;
	var dt = {x:0, y:0};
	
	function begin(e, id){
		var el = !!id?bj.element(id):bj.element(this);
		var p = bj.getMousePosition(e);
		var o = {left: el.offsetLeft, top: el.offsetTop};		
		dt.x = p.x-o.left;
		dt.y = p.y-o.top;
		ob = el;	
		bj.listen(document,'mousemove', move);
		bj.listen(document,'mouseup', drop);
		bj.listen(document,'mousedown',bj.exitEvent);	
	}
	
	function move(e){
		if(!!ob){
			var p = bj.getMousePosition(e);
			tp = p.y-dt.y;
			lf = p.x-dt.x;
			ob.setPosition({left:lf, top:tp});
		}
		return false;
	}
	
	function drop(e){
		ob = null;
		bj.ignore(document,'mousemove', move);
		bj.ignore(document,'mouseup', drop);
		bj.ignore(document,'mousedown',bj.exitEvent);	
	}

	bj.dragger = {
		start : begin
	}	
})();
