var Util = (function(){

	function Util(){

	}

	Util.ShowLoading = function() {
		$('#progress_modal').nsProgress('showWithImageAndStatusAndMaskType', 'nsLoader.gif', 'Loading&hellip;', 'black');
		Util.DisableScrolling();
	};

	Util.HideLoading = function() {
		$('#progress_modal').nsProgress('dismiss');
		Util.EnableScrolling();
	};
	
	Util.DateBiggerThan = function(startDateStr, endDateStr) {
		var inDate = new Date(startDateStr),
		eDate = new Date(endDateStr);

		return (inDate > eDate);
	};
	
	Util.FormatDate = function(string) {
		var myDate = new Date(string);
		return myDate.getFullYear() + "-" + ('0' + (myDate.getMonth() + 1)).slice(-2) + "-" + ('0' + myDate.getDate()).slice(-2);
	};
	
	Util.FormatReadableDate = function(string) {
		var myDate = new Date(string);
		return myDate.getDate() + "/" + (myDate.getMonth() + 1) + "/" + myDate.getFullYear();
	};
	
	Util.DaysDifferenceDate = function(startDate, endDate) {
		var date1 = new Date(startDate);
		var date2 = new Date(endDate);
		var timeDiff = Math.abs(date2.getTime() - date1.getTime());

		return Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
	};

	Util.DisableScrolling = function() {
		console.log("[Util] Disable scrolling!");

		$('html, body').on('touchstart touchmove mousewheel DOMMouseScroll', function(e){ 
		     e.preventDefault(); 
		});
	};

	Util.EnableScrolling = function() {
		console.log("[Util] Enable scrolling!");
		
		$('html, body').unbind();
	};

	Util.DisplayStatusMessage = function(container, status, message) {
		container.html('<p class="' + status + '">' + message + '</p>');
	};

	Util.HideStatusMessage = function(time) {
		setTimeout(function() {
			$("div.response").slideUp(function() {
				$(this).html("");
			});
		}, time);
	};

	Util.CustomJqueryFunctions = function() {
		$.fn.serializeObject = function() {
		    var o = {};
		    var a = this.serializeArray();
		    $.each(a, function() {
		        if (o[this.name] !== undefined) {
		            if (!o[this.name].push) {
		                o[this.name] = [o[this.name]];
		            }
		            o[this.name].push(this.value || '');
		        } else {
		            o[this.name] = this.value || '';
		        }
		    });
		    return o;
		};
	};

	Util.CustomHandlebarsFunctions = function() {
		Handlebars.registerHelper("foreach",function(arr,options) {
		    if(options.inverse && !arr.length) {
		        return options.inverse(this);
		    }

		    return arr.map(function(item,index) {
		        item.$index = index;
		        item.$first = index === 0;
		        item.$last  = index === arr.length-1;
		        return options.fn(item);
		    }).join('');
		});

		Handlebars.registerHelper('dateFormat', function(context, block) {
			if(window.moment) {
				var f = block.hash.format || "MMM Do, YYYY";
				return moment(context).format(f);
			}
			else{
				return context;
			}
		});


		Handlebars.registerHelper('equal', function(lvalue, rvalue, options) {
			if(arguments.length < 3) {
				throw new Error("Handlebars Helper equal needs 2 parameters");
			}
	
			if(lvalue !== rvalue) {
				return options.inverse(this);
			}
			else {
				return options.fn(this);
			}
		});

		Handlebars.registerHelper('compare', function(lvalue, rvalue, options) {

			if (arguments.length < 3) {
			throw new Error("Handlerbars Helper 'compare' needs 2 parameters");

			}

			var operator = options.hash.operator || "==";

			var operators = {
			'===':      function(l,r) { return l === r; },
			'<':        function(l,r) { return l < r; },
			'>':        function(l,r) { return l > r; },
			'<=':       function(l,r) { return l <= r; },
			'>=':       function(l,r) { return l >= r; }
			};

			if (!operators[operator]) {
			throw new Error("Handlerbars Helper 'compare' doesn't know the operator "+operator);

			}

			var result = operators[operator](lvalue,rvalue);

			if( result ) {
			return options.fn(this);
			} else {
			return options.inverse(this);
			}
			});

	};

	

	Util.CheckLogin = function(model, callback) {
		console.log("[Util] Checking login");
		
		function loginHandler(status, message) {
			// If callback is set, use that one
			if(callback !== undefined) {
				callback(status, message);
			}
			else {
				if(status === "error") {
					$.removeCookie('travellar_user');
					window.location.href = "./";
				}
			}
		}

		model.login({callback: loginHandler});
	};

	Util.api = "../api/restapi.php";

	return Util;
})();

