/*
 * jQuery SmoothSnapScroll
 *
 * Depends:
 * jquery-1.8.x.min.js
   Please use https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js
   ...or later

 * jquery.ui.widget.js
 * jquery.ui.effects.min.js
   Make your own custom download at http://jqueryui.com/download.
   First deselect all components. Then check just "Widget" and "Effects Core".
   Download the file and put it in your javascript folder.

 * jquery.kinetic.js
   Used for scrolling by dragging, mainly used on touch devices.
   Download the latest version at https://github.com/davetayls/jquery.kinetic

 * jquery.jsizes.js

 *
 */
(function ($) {

	$.widget("andoru.smoothSnapScroll", {
		// Default options
		options: {

			//scrollableAreaClass: "scrollArea", // String

			// Misc settings
			//startAtElementId: "", // String

			// Touch scrolling
			touchScrolling: true,

			// Snap Point
			snapToCenter: true,

			// Callback Options
			elementStopCallback: 'selected',
			elementStopCallbackDelay: 800,

			// Menu Opacity Effect
			opacityEffect: true,
			opacityMinimum: 0.2,

			// Easing for when the scrollToElement method is used
			scrollToAnimationDuration: 1000, // Milliseconds
			scrollToEasingFunction: "easeOutQuart" // String
		},
		_create: function () {
			var self = this, o = this.options, el = this.element;

			console.log("Start Snap Setup...");

			// Create variables in the element data storage

			el.data("visible", true);
			el.data("enabled", true);

			el.data("mousedown",false);

			el.data("paddingTop", 0);
			el.data("paddingBottom", 0);

			el.data("directionY",0);

			el.data("targetSnapSet", false);
			el.data("targetY",0);
			el.data("targetSnap",0);
			el.data("targetTime",0);

			el.data("decelerate", false);
			el.data("releaseVelocityChecked", true);

			el.data("elementInView", el.children('.scrollArea').children(':first'));
			el.data("elementInViewBoundsTop", 0);
			el.data("elementInViewBoundsBottom", 0);

			el.data("targetElementInView", el.children('.scrollArea').children(':first'));
			el.data("targetElementInViewBoundsTop", 0);
			el.data("targetElementInViewBoundsBottom", 0);

			if(o.elementStopCallback)
			{
				el.data("elementStopCallback",o.elementStopCallback);

				if(o.elementStopCallbackDelay)
				{
					el.data("elementStopCallbackDelay", o.elementStopCallbackDelay);
					
				}
			}

			if(o.opacityEffect)
			{
				el.data("opacityMinimum", o.opacityMinimum);

				el.children(".scrollArea").children().each(function()
				{
					$(this).css('opacity', el.data("opacityMinimum"));				
				});

				self._updateOpacity();
			}

			if(o.snapToCenter)
			{
				var sy = el.innerHeight() / 2;
				//console.log("SY: " + sy); 
				el.data("snapToOffset",sy);
				
				var ity = el.children('.scrollArea').children(':first').outerHeight() / 2;
				//console.log("ITY: " + ity); 

				var iby = el.children('.scrollArea').children(':last').outerHeight() / 2;
				//console.log("IBY: " + iby); 

				el.data("paddingTop", sy-ity);
				el.children('.scrollArea').css('paddingTop', el.data("paddingTop"));

				el.data("paddingBottom", sy-iby);
				el.children('.scrollArea').css('paddingBottom', el.data("paddingBottom"));
			}
			else
			{
				el.data("snapTo",0);
			}

			self._setElementInViewBounds();

			/*****************************************
			SET UP GENERAL LISTENERS
			*****************************************/
			el.mousedown(function() {
			
  				el.data("mousedown",true);

				// Stop current animation
				if( el.data("elementStopCallbackTimeout") )
				{
					clearTimeout( el.data("elementStopCallbackTimeout") );
					console.log("Timeout Cleared");
				}
				
				// Stop current deceleration
  				if( el.data("decelerate") )
  				{
  					el.data("decelerate",false);
					//console.log("Stop deceleration...");
  				}			
				
			});

			el.mouseup(function() {
  				el.data("mousedown",false);

				// Start deceleration
				el.data("decelerate", true);
				el.data("releaseVelocityChecked", false);

			});

			el.mouseout(function() {
  				el.data("mousedown",false);
			});

			/*****************************************
			SET UP EVENTS FOR TOUCH SCROLLING
			*****************************************/
			if (o.touchScrolling && el.data("enabled")) {
				// Use jquery.kinetic.js for touch scrolling
				// Vertical scrolling disabled
				el.kinetic({
					x: false,
					slowdown: el.data("slowdownBasic"),
					moved: function (settings) { 
						
						//console.log(">>> SCROLLTOP:" + settings.scrollTop + "  > VELOCITY-Y:" + settings.velocityY);

						// Check for current element in view
						self._setDirection(settings);
						self._checkElementInView(settings);

						if( el.data("decelerate") )
						{

							if( !el.data("releaseVelocityChecked") )
							{
								self._checkReleaseVelocity(settings);
								el.data("releaseVelocityChecked",true);
							}
							
							if( el.data("directionY") > 0 )
							{
								if( settings.scrollTop >= el.data("targetSnap") )
								{
									el.kinetic('stop');
								}
								else if( settings.velocityY <= 1.5 )
								{
									settings.velocityY /= 0.9;
								}
							}
							else if( el.data("directionY") < 0 )
														{
								if( settings.scrollTop <= el.data("targetSnap") )
								{
									el.kinetic('stop');
								}
								else if( settings.velocityY >= -1.5 )
								{
									settings.velocityY /= 0.9;
								}
							}				

						}

						if(o.opacityEffect)
						{
							self._updateOpacity();
							console.log(settings.scrollTop);
						}

					},
					stopped: function (settings)
					{
						console.log("STOPPED > IN-VIEW:" + el.data("elementInView").text() + " TOP:" + el.data("elementInViewBoundsTop") + " BOT:" + el.data("elementInViewBoundsBottom") + " ST:" + settings.scrollTop);	
	
						if( el.data("decelerate") )
						{
							// Set scrollTop to target
							el.scrollTop(el.data("targetSnap"));
						}

						if( el.data("elementStopCallback") )
						{
							setTimeout(function()
							{
								var to = el.data("elementInView").trigger( el.data("elementStopCallback") );
								el.data("elementStopCallbackTimeout", to);
							}, el.data("elementStopCallbackDelay"));
						}
		
						// Reset
						el.data("directionY",0);
						el.data("targetSnapSet", false);
						el.data("decelerate", false);
					}
				});			

				console.log("Kinetic Setup Complete...");
			}
		},

		/***********************************************************
		 SET DIRECTION
		**********************************************************/
	
		_setDirection: function (settings) 
		{
			var self = this, el = this.element;

			if(settings.velocityY > 0)
			{
				el.data("directionY",1);
			}
			else
			{		
				el.data("directionY",-1);
			}

		},

		/***********************************************************
		 CHECK RELEASE VELOCITY
		**********************************************************/
	
		_checkReleaseVelocity: function (settings) 
		{
			var self = this, el = this.element;
			
			self._getDistanceForVelocity(settings);
			self._setTargetElementForDistance(el.data("targetY"));
			self._setTargetSnapForTargetElement();
			self._setVelocityToTargetSnap(settings);

		},

		/***********************************************************
		 CHECK ELEMENT IN VIEW
		**********************************************************/
	
		_checkElementInView: function (settings) 
		{
			var self = this, el = this.element;

			if( settings.scrollTop < el.data("elementInViewBoundsTop") || settings.scrollTop > el.data("elementInViewBoundsBottom") )
			{
				self._setElementInView(settings);
			}
		},


		/***********************************************************
		 SET ELEMENT IN VIEW
		**********************************************************/
	
		_setElementInView: function (settings) 
		{
			var self = this, el = this.element;

			var nel;

			if( el.data("directionY") > 0 )
			{
				//Change to next element
				if( !el.data("elementInView").is( el.children('.scrollArea').children(":last")) )
				{
					nel = el.data("elementInView").next();
					self._setNewElementInView(nel,settings);
				}
				else
				{
					console.log("[Reached end of items...]");
				}

			}
			else if( el.data("directionY") < 0 )
			{
				//Change to previous element
				if( !el.data("elementInView").is( el.children('.scrollArea').children(":first")) )
				{
					nel = el.data("elementInView").prev();
					self._setNewElementInView(nel,settings);
				}
				else
				{
					console.log("[Reached start of items...]");
				}				

			}
			
		},


		/***********************************************************
		 SET NEW ELEMENT IN VIEW
		**********************************************************/
	
		_setNewElementInView: function (nel, settings) 
		{
			var self = this, el = this.element;
			
			if(nel)
			{
				el.data("elementInView", nel);
				self._setElementInViewBounds();
				console.log("CHANGED > IN-VIEW:" + el.data("elementInView").text() + " TOP:" + el.data("elementInViewBoundsTop") + " BOT:" + el.data("elementInViewBoundsBottom") + " ST:" + settings.scrollTop + " VY:" + settings.velocityY);
			}

			
		},

		/***********************************************************
		 SET ELEMENT IN VIEW BOUNDS
		**********************************************************/
	
		_setElementInViewBounds: function () 
		{
			var self = this, el = this.element;

			// REVISIT - No need for EACH loop, does keep to date of element height changes though.
			var cur = el.data("elementInView");
			var dY = -(el.children('.scrollArea').children(':first').outerHeight() / 2);

			cur.prevAll().each(function(){
				dY += $(this).outerHeight();
			});

			el.data("elementInViewBoundsTop", dY);
			el.data("elementInViewBoundsBottom", (dY + cur.outerHeight()) );

			//console.log("IN-VIEW BOUNDS > " + el.data("elementInViewBoundsTop") + " : " + el.data("elementInViewBoundsBottom"));
			
		},

		/***********************************************************
		 GET DISTANCE FOR VELOCITY
		**********************************************************/
	
		_getDistanceForVelocity: function (settings) 
		{
			var self = this, el = this.element;

			var dY = settings.scrollTop;
			var dT = 0;

			// Substitute 0.9 for slowdown variable [DONE].
			for(v = settings.velocityY; v > 1 || v < -1; v *= settings.slowdown)
			{
				dT++;
				dY += v;
				dY = Math.floor(dY);
				// Sometimes more equals infinity.
				//console.log(v);
			}

			el.data("targetY", dY);

			console.log("Predicting finish at scrollTop: " + dY + "(from: " + settings.scrollTop + ")");		
		},

		/***********************************************************
		 GET VELOCITY FOR DISTANCE
		**********************************************************/
	
		_getVelocityForDistance: function (dist,iV,settings) 
		{
			var self = this, el = this.element;

			var v = Math.abs(iV);
			var d = Math.abs(dist);
			var distanceReached = false;
			var count = 0; var countLimit = 200;
			

			while(!distanceReached && count <= countLimit)
			{		
				var nV = v; var nD = 0;
		
				while(nV > 1)
				{
					nD = Math.floor(nD + nV);
					nV *= settings.slowdown;

				}
	
				if(nD >= d)
				{
					distanceReached = true;
				}
				else
				{
					v++;
				}
				count++;
			}

			if(distanceReached)
			{
				console.log("Initial velocity of " + v + " needed to cover distance of " + dist + " (actual distance " + nD + ")");
				return v;
			}
			else
			{
				console.error("No initial velocity could be calculated for distance " + dist + " [OUTSIDE LIMITS]");
			}

		},

		/***********************************************************
		 SET TARGET ELEMENT FOR DISTANCE ELEMENT
		**********************************************************/
	
		_setTargetElementForDistance: function (scp) 
		{
			var self = this, el = this.element;
			
			var dY = -(el.children(".scrollArea").children(":first").outerHeight() / 2);

			el.children(".scrollArea").children().each(function()
			{
				dY += $(this).outerHeight();

				// Check if element bounds contains scrollTop
				if(dY > scp || $(this).is(el.children(".scrollArea").children(":last")))	
				{
					el.data("targetElementInView", $(this));
					el.data("targetElementInViewBoundsTop", (dY - $(this).outerHeight()) );
					el.data("targetElementInViewBoundsBottom", dY );
					return false;
				}
			});

			console.log("Target Element set: " + el.data("targetElementInView").text() );
			
		},

		
		/***********************************************************
		 SET TARGET SNAP FOR TARGET ELEMENT
		**********************************************************/
	
		_setTargetSnapForTargetElement: function ()
		{
			var self = this, el = this.element;
	
			var sTar = el.data("targetElementInViewBoundsTop") + ((el.data("targetElementInViewBoundsBottom") - el.data("targetElementInViewBoundsTop")) / 2);
			el.data("targetSnap",sTar);

			el.data("targetSnapSet", true);

			console.log("New target acquired: " + sTar );

		},


		/***********************************************************
		 SET VELOCITY TO TARGET SNAP
		**********************************************************/
	
		_setVelocityToTargetSnap: function (settings)
		{
			var self = this, el = this.element;
	
			var d = settings.scrollTop - el.data("targetSnap");

			var v = self._getVelocityForDistance(d,0,settings);

			settings.velocityY = v * el.data("directionY");

		},


		/***********************************************************
		 SET TARGET ELEMENT TO CURRENT ELEMENT
		**********************************************************/
	
		_setTargetElementToCurrentElement: function ()
		{
			var self = this, el = this.element;
	
			el.data("targetElementInView", el.data("elementInView") );
			el.data("targetElementInViewBoundsTop", el.data("elementInViewBoundsTop") );
			el.data("targetElementInViewBoundsBottom", el.data("elementInViewBoundsBottom") );

		},


		/***********************************************************
		 UPDATE OPACITY
		**********************************************************/
	
		_updateOpacity: function ()
		{
			var self = this, el = this.element;
	
			var viewportMid = el.scrollTop();
			var viewportTop = viewportMid - (el.innerHeight() / 2);
			var viewportBot = viewportMid + (el.innerHeight() / 2);
			var dY = -(el.children(".scrollArea").children(":first").outerHeight() / 2);

			el.children(".scrollArea").children().each(function()
			{
				var elementTop = dY;
				var elementBot = dY + $(this).outerHeight();

				if( elementBot >= viewportTop || elementTop <= viewportBot )
				{
					var elementMid = dY + ($(this).outerHeight() / 2);
					var df = Math.abs(viewportMid - elementMid) / Math.abs(viewportMid - viewportTop);
					var opacity = el.data("opacityMinimum") + ((1-el.data("opacityMinimum")) - ((1-el.data("opacityMinimum")) * df));
					$(this).css('opacity', opacity);				
				}						

				dY += $(this).outerHeight();
				
				if(dY > viewportBot)
				{
					return false;
				}
			});

		},

		/**********************************************************
		
					FUNCTIONS

		***********************************************************
		JUMP TO ELEMENT
		**********************************************************/
	
		jumpToElement: function (element)
		{
			
		}





/*
		jumpToElement: function (jumpTo, element) {
			var self = this, el = this.element;

			// Check to see that the scroller is enabled
			if (el.data("enabled")) {
				// Get the position of the element to scroll to
				if (self._setElementScrollPosition(jumpTo, element)) {
					// Jump to the element
					el.data("scrollWrapper").scrollTop(el.data("scrollYPos"));
					// Check the hotspots
					self._showHideHotSpots();
					// Trigger the right callback
					switch (jumpTo) {
						case "first":
							self._trigger("jumpedToFirstElement");
							break;
						case "start":
							self._trigger("jumpedToStartElement");
							break;
						case "last":
							self._trigger("jumpedToLastElement");
							break;
						case "number":
							self._trigger("jumpedToElementNumber", null, { "elementNumber": element });
							break;
						case "id":
							self._trigger("jumpedToElementId", null, { "elementId": element });
							break;
						default:
							break;
					}

				}
			}
		},
		/**********************************************************
		Scrolling to a certain element
		**********************************************************/
	/*
		scrollToElement: function (scrollTo, element) {
			var self = this, el = this.element, o = this.options, autoscrollingWasRunning = false;

			if (el.data("enabled")) {
				// Get the position of the element to scroll to
				if (self._setElementScrollPosition(scrollTo, element)) {
					// Stop any ongoing auto scrolling
					if (el.data("autoScrollingInterval") !== null) {
						self.stopAutoScrolling();
						autoscrollingWasRunning = true;
					}

					// Stop any other running animations
					// (clear queue but don't jump to the end)
					el.data("scrollWrapper").stop(true, false);

					// Do the scolling animation
					el.data("scrollWrapper").animate({
						scrollTop: el.data("scrollYPos")
					}, { duration: o.scrollToAnimationDuration, easing: o.scrollToEasingFunction, complete: function () {
						// If auto scrolling was running before, start it again
						if (autoscrollingWasRunning) {
							self.startAutoScrolling();
						}

						self._showHideHotSpots();

						// Trigger the right callback
						switch (scrollTo) {
							case "first":
								self._trigger("scrolledToFirstElement");
								break;
							case "start":
								self._trigger("scrolledToStartElement");
								break;
							case "last":
								self._trigger("scrolledToLastElement");
								break;
							case "number":
								self._trigger("scrolledToElementNumber", null, { "elementNumber": element });
								break;
							case "id":
								self._trigger("scrolledToElementId", null, { "elementId": element });
								break;
							default:
								break;
						}
					}
					});
				}
			}

		}

	*/

	});
})(jQuery);
