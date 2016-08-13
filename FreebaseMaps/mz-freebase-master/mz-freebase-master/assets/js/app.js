/**
 * app.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/
var app = window['app'] = {
	start : function(model){
		
		this.info = APP_INFO;
		
		if(this.hasOwnProperty(model)){
			this[model].init();
		}
	},
	storage : {
		selectDB : function(){
			bj.storage.selectDB('session');
		},
		save : function(key, data){
			this.selectDB();
			bj.storage.set(key, data);
		},
		query : function(key){
			this.selectDB();
			return bj.storage.get(key, 'toJSON');
		}	
	},
	imageResize : function(ow, oh, fw, fh, key){
		var F = Math.floor;
		var ih, iw, it, il;
		var or = ow/oh, fr = fw/fh;
		switch(key){
			case 'fill' :
				if(fr<or){
					ih=fh;iw=F(fh*or);it=0;il=-F((iw-fw)/2);
				}
				else{
					iw=fw;ih=F(fw/or);it=-F((ih-fh)/2);il=0;
				}
				break;		
			case  'fit' :
				if(fr<or){
					iw=fw;ih=F(fw/or);it=-F((ih-fh)/2);il=0;					
				}
				else{
					ih=fh;iw=F(fh*or);it=0;il=-F((iw-fw)/2);
				}
				break;		
			case  'strech' :
					iw=fw;ih=fh;it=0;il=0;	
				break;	
			case  'original' :
			case  'full' :
					iw=ow;ih=oh;it=-F((ih-fh)/2);il=-F((iw-fw)/2);	
				break;													
		}
		return {t:it, l:il, w:iw, h:ih, ow : ow, oh : oh, r:iw/ow}
	}	
}
