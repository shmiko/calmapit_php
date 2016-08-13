/* Singleline functions
---------------------------------------------------------------- */

function $d(d){
	return document.getElementById(d);
}

/* Zone code selector
---------------------------------------------------------------- */

var zoncos = function(){
	return {
		initialize:function(){
			
			// Select
			$('#select-zone').bind('click', function(){zoncos.show(this);});
			
			// Bind
			$('#select-zone-items').bind('mousewheel DOMMouseScroll', function(e){
				
				// Variable
				var scrt = null;

				// Type
				if(e.type=='mousewheel'){
					scrt = (e.originalEvent.wheelDelta * -1);
				}else if(e.type=='DOMMouseScroll'){
					scrt = 40 * e.originalEvent.detail;
				}

				// Prevent
				if(scrt){
					e.preventDefault();
					$(this).scrollTop(scrt + $(this).scrollTop());
				}
				
			});
			
			// Content
			$.getJSON('/inc/zones/', function(data){
				
				// Build variable
				var html = '';
				
				// Loop
				$.each(data.data, function(i,item){
					
					// Build
					html += '<div class="item" data-label="'+item.label+'" data-zone="'+item.zonecode+'" onclick="zoncos.click(this);">';
					html += '	<div class="lbl">';
					html += '		<p>'+item.label+'</p>';
					html += '	</div>';
					html += '	<div class="zone">';
					html += '		<p>Zonecode: '+item.zonecode+'</p>';
					html += '	</div>';
					html += '	<div class="clr"></div>';
					html += '</div>';
					
					// Append
					$('#select-zone-items').append(html);
					
					// Reset
					html = '';
					
					// Append to zone select
					$('#zonecode').append('<option value="'+item.zonecode+'">'+item.label+'</option>');
					
				});
				
				// Cookies
				generate.initialize();
				
			});
			
		},
		show:function(){
			
			// Show
			$('#select-zone-list').show();
			
			// Bind
			setTimeout("zoncos.binder(true);", 50);
			
			// Offset counter
			var topc = 0;
			
			// Datazone
			var zon = $('#select-zone').attr('data-zone');
			
			// Scrool to
			$('#select-zone-items .item').each(function(){
				
				// Add
				topc += $(this).height();
				
				// Break
				var zxo = $(this).attr('data-zone');
				if(zxo==zon){
					return false;
				}
				
			});
			
			// Adjust scroll
			$('#select-zone-items').scrollTop(topc);
			
		},
		binder:function(x){
		
			// Bind
			if(x){
				$(document).bind('click', zoncos.delay);
			}
			
		},
		hide:function(){
			
			// Show
			$('#select-zone-list').hide();
			
			// Bind
			$(document).unbind('click', zoncos.delay);
			
		},
		delay:function(){
		
			// Timeout
			setTimeout("zoncos.hide();", 200);
		
		},
		click:function(f){
		
			// Transfer
			$('#select-zone-x').html($(f).attr('data-label'));
			$('#select-zone-y').html($(f).attr('data-zone'));
			$('#zone-code-upd').html($(f).attr('data-zone'));
			$('#select-zone').attr('data-zone',$(f).attr('data-zone'));
			
		}
	};
}();

/* Attach */
$(window).bind('load', function(){zoncos.initialize();});

/* Menu
---------------------------------------------------------------- */

var menu = function(){
	return {
		initialize:function(){
		
			// Append
			$('#totop').bind('click', function(){menu.totop(this);return false;});
			
			// Append
			$('#get-started').bind('click', function(){menu.goto(this,'anchor-install');return false;});
			$('#top-install').bind('click', function(){menu.goto(this,'anchor-install');return false;});
			$('#top-themes').bind('click', function(){menu.goto(this,'anchor-themes');return false;});
			$('#top-generate').bind('click', function(){menu.goto(this,'anchor-generate');return false;});
			$('#top-license').bind('click', function(){menu.goto(this,'anchor-license');return false;});
			$('#top-faq').bind('click', function(){menu.goto(this,'anchor-faq');return false;});
			$('#top-ask').bind('click', function(){menu.goto(this,'anchor-ask');return false;});
			$('.gotobuyalicense').bind('click', function(){menu.goto(this,'anchor-license');return false;});
			$('.gotofaq').bind('click', function(){menu.goto(this,'anchor-faq');return false;});
			$('#license1').bind('click', function(){menu.license(this,'1');});
			$('#license2').bind('click', function(){menu.license(this,'2');});
			$('.extrasettings').bind('click', function(){menu.goto(this,'anchor-install-extra');return false;});
			
			// Any hash?
			var hash = window.location.hash;
			if(hash.indexOf('install')!=-1){setTimeout("menu.goto(this,'anchor-install');", 1000);}
			if(hash.indexOf('license')!=-1){setTimeout("menu.goto(this,'anchor-license');", 1000);}

		},
		gotopay:function(){
		
			// Go to payment
			setTimeout("menu.goto(this,'anchor-license');", 1000);
			
		},
		top:function(){
		
			// Scroll top
			var t = $(document).scrollTop();
			
			// Append class
			if(t>50){
				$('#top').addClass('less');
			}else{
				$('#top').removeClass('less');
			}
			
			// Closest
			var store;
			
			// Loop
			$(".anchor").each(function(){
				
				// Get reference
				var fid = $(this).attr('data-menu-ref');
				var fit = $(this).offset().top - 140;
				
				// Closest to top
				if(fit<=t){
					store = fid;
				}
				
			});
			
			// Set / reset
			$(".top ul li a").each(function(){
				
				// Get reference
				var fid = $(this).attr('id');
				
				// Match?
				if(fid=='top-'+store){
					$(this).attr('class','selected');
				}else{
					$(this).attr('class','');
				}
				
			});
			
		
		},
		totop:function(){
		
			// Scroll to top
			$('html, body').animate({scrollTop:0}, 'slow');
		
		},
		goto:function(f,x){
		
			// Locate top
			var t = $('#'+x).offset().top - 69;
		
			// Scroll to top
			$('html, body').animate({scrollTop: t}, 'slow');
			
			// Statistics
			try{
				ga('send','event','AddThisEvent.com','menu',x);
			}catch(e){
				// Do nothing
			}
		
		},
		buy:function(){
			
			// Show / hide
			$('#bal-button').hide();
			$('#commercial-license').show();
			
			// Go to
			menu.goto(this,'anchor-license');
			
		},
		license:function(f,x){
		
			// Hide
			$('#license-single').hide();
			$('#license-multiple').hide();
			
			// Show
			if(x=='1'){
				$('#license-single').show();
			}
			if(x=='2'){
				$('#license-multiple').show();
			}
		
		}
	};
}();

/* Attach */
$(window).bind('load', function(){menu.initialize();});
$(window).bind('ready', function(){menu.top();});
$(window).bind('scroll', function(){menu.top();});

/* Examples
---------------------------------------------------------------- */

var examples = function(){
	return {
		initialize:function(){
		
			// Append
			$('#examples a').bind('click', function(){examples.click(this);return false;});
			
		},
		click:function(f){
		
			// Reset links
			$("#examples a").each(function(){
				
				// Set class
				$(this).attr('class', '');
				
			});
			
			// Reset examples
			$("#examples-box .example").each(function(){
				
				// Set class
				$(this).hide();
				
			});
			
			// Get references
			var url = $(f).attr('data-reference');
			var id = $(f).attr('data-id');
			
			// Show example
			$('#examples-n'+id).show();
			
			// Update theme label
			$('#examples-theme').html(f.innerHTML);
			
			// Update example link
			$('#examples-view').attr('href', url);
			
			// Update example link
			$('#examples-download').attr('href', url + '/download.zip');
			
			// Set
			$(f).attr('class', 'selected');
		
		}
	};
}();

/* Attach */
$(window).bind('load', function(){examples.initialize();});

/* References
---------------------------------------------------------------- */

var references = function(){
	var counter = 1;
	return {
		initialize:function(){
		
			// Timed
			setTimeout(function(){
			
				// Call
				references.toogle();
			
			}, 8000);
			
		},
		toogle:function(){
		
			// All
			var all = parseInt($('#refs .ref').length);
		
			// Hide all
			$("#refs .ref").each(function(){
				
				// Set visibility
				$(this).hide();
				
			});
			
			// Toogle
			if(counter==all){
				counter = 1;
			}else{
				counter++;
			}
			
			// Show next
			$('#ref'+counter).fadeIn('fast');
			
			// Timed
			setTimeout(function(){
			
				// Call
				references.toogle();
			
			}, 8000);
			
		}
	};
}();

/* Attach */
$(window).bind('load', function(){references.initialize();});

/* Validate
---------------------------------------------------------------- */

var generate = function(){
	return {
		initialize:function(){
		
			// Get zonecode value
			var val = cookies.read('zonecode');

			// Set zonecode
			$("#zonecode option").each(function(){
				
				// Value
				var iv = $(this).val();
				
				if(iv==val){
					$(this).attr('selected', 'selected');
				}else{
					$(this).removeAttr('selected');
				}
				
				if(!val){
					if(iv=='35'){
						$(this).attr('selected', 'selected');
					}
				}
				
			});
		
		},
		validate:function(f){
		
			// Execute
			var execute = true;
			
			// Validate
			if(!generate.empty(f.headline.value)){
				execute = false;
				$(f.headline).addClass('error');
			}else{
				$(f.headline).removeClass('error');
			}
			if(!generate.empty(f.date_start_date.value)){
				execute = false;
				$(f.date_start_date).addClass('error');
			}else{
				$(f.date_start_date).removeClass('error');
			}
			if(!generate.empty(f.date_end_date.value)){
				execute = false;
				$(f.date_end_date).addClass('error');
			}else{
				$(f.date_end_date).removeClass('error');
			}
			
			// Date
			var dat = $("#generateform").serialize();
			
			// Post
			if(execute){
			
				// Ajax
				$.ajax({
					url: '/actions/generate/?post=true&' + dat,
					success:function(data){
						$('#generate-ajax').html(data);
					}
				});
			
			}
			
			// Return
			return false;
		
		},
		allday:function(f){
			
			// Value
			var val = f.options[f.selectedIndex].value;
			
			if(val=='true'){
				$('#date_start_time').addClass('disabled');
				$('#date_start_ampm').addClass('disabled');
				$('#date_end_time').addClass('disabled');
				$('#date_end_ampm').addClass('disabled');
				$('#date_start_time').attr('disabled','disabled');
				$('#date_start_ampm').attr('disabled','disabled');
				$('#date_end_time').attr('disabled','disabled');
				$('#date_end_ampm').attr('disabled','disabled');
			}else{
				$('#date_start_time').removeClass('disabled');
				$('#date_start_ampm').removeClass('disabled');
				$('#date_end_time').removeClass('disabled');
				$('#date_end_ampm').removeClass('disabled');
				$('#date_start_time').removeAttr('disabled');
				$('#date_start_ampm').removeAttr('disabled');
				$('#date_end_time').removeAttr('disabled');
				$('#date_end_ampm').removeAttr('disabled');
			}
			
		},
		email:function(str){
			var filter = /^[^\s@]+@[^\s@]+\.[a-z]{2,6}$/i;
			if(filter.test(str)){return true;}else{return false;}
		},
		empty:function(str){
			var filter = /^\s+$/;
			var expression;
			if(filter.test(str) || str==''){expression = false;}else{expression = true;}
			return expression;
		},
		validdate:function(d){
			if(Object.prototype.toString.call(d)!=='[object Date]'){
				return false;
			}
			return !isNaN(d.getTime());
		},
		markup:function(f){
			
			// Focus
			f.focus();
			
			// Select
			f.select();
			
		},
		limited:function(f){
		
			// Allowed characters
			var chars = 300;
		
			// Limit
			if(f.value.length>chars){
				f.value = f.value.substring(0, chars);
			}
			
			// Diff
			var diff = chars - f.value.length;
			
			// Counter
			$('#counter').html(diff);
		
		},
		zonecode:function(f){
		
			// Get value
			var val = f.options[f.selectedIndex].value;

			// Remember
			cookies.create('zonecode', val, 365);
			
		}
	};
}();

/* Cookies
---------------------------------------------------------------- */

var cookies = function(){
	return {
		create:function(name,value,days){
			if(days){
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		},
		read:function(name){
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++){
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return false;
		},
		erase:function(name){
			cookies.create(name,"",-1);
		}
	};
}();

/* Validation
---------------------------------------------------------------- */

var validate = function(){
	var execute = true;
	return {
		err:function(f,act){
			var obj = $d(f);
			if(obj){if(act=='reset'){obj.style.backgroundColor = '#f0f0f0';}else{obj.style.backgroundColor = '#eccdce';}}
		},
		email:function(str){
			var filter = /^[^\s@]+@[^\s@]+\.[a-z]{2,6}$/i;
			if(filter.test(str)){return true;}else{return false;}
		},
		empty:function(str){
			var filter = /^\s+$/;
			var expression;
			if(filter.test(str) || str==''){expression = false;}else{expression = true;}
			return expression;
		},
		onlynumbers:function(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode;
			if(charCode > 31 && (charCode < 48 || charCode > 57)){return false;}else{return true;}
		},
		maxlength:function(f,max){
			var l = parseInt(max);
			if(f.value.length>l){
				f.value = f.value.substring(0, l);
			}
		},
		payment:function(f){
			execute = true;
			var nam = $d('name-err');
			var ema = $d('email-err');
			if(nam && ema){
			
				// Hide
				nam.style.visibility = 'hidden';
				ema.style.visibility = 'hidden';
				
				// Validate
				if(!validate.empty(f.name.value)){
					execute = false;
					nam.style.visibility = 'visible';
				}
				
				if(!validate.email(f.email.value)){
					execute = false;
					ema.style.visibility = 'visible';
				}
				
			}
			return execute;
		}
	};
}();