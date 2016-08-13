/*
 * jQuery SmoothVerticalScroll
 * [BASED ON: SmoothDivScroll 1.3]
 *
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

 * jquery.mousewheel.min.js
   Used for mousewheel functionality.
   Download the latest version at http://brandonaaron.net/code/mousewheel/demos
 *

 * jquery.kinetic.js
   Used for scrolling by dragging, mainly used on touch devices.
   Download the latest version at https://github.com/davetayls/jquery.kinetic
 *
 */
(function ($) {

	$.widget("andoru.smoothVerticalScroll", {
		// Default options
		options: {
		// #### CHECKED [PASS-1] LEFT = UP / RIGHT = DOWN
			// Classes for elements added by Smooth Div Scroll
			scrollingHotSpotUpClass: "scrollingHotSpotUp", // String
			scrollingHotSpotDownClass: "scrollingHotSpotDown", // String
			scrollableAreaClass: "scrollableArea", // String
			scrollWrapperClass: "scrollWrapper", // String

		// #### CHECKED [PASS-1]
			// Misc settings
			hiddenOnStart: false, // Boolean
			getContentOnLoad: {}, // Object
			countOnlyClass: "", // String
			startAtElementId: "", // String

		// #### CHECKED [PASS-1]
			// Hotspot scrolling
			hotSpotScrolling: true, // Boolean
			hotSpotScrollingStep: 15, // Pixels
			hotSpotScrollingInterval: 10, // Milliseconds
			hotSpotMouseDownSpeedBooster: 3, // Integer
			visibleHotSpotBackgrounds: "hover", // always, onStart, hover or empty (no visible hotspots)
			hotSpotsVisibleTime: 5000, // Milliseconds
			easingAfterHotSpotScrolling: true, // Boolean
			easingAfterHotSpotScrollingDistance: 10, // Pixels
			easingAfterHotSpotScrollingDuration: 300, // Milliseconds
			easingAfterHotSpotScrollingFunction: "easeOutQuart", // String

		// #### CHECKED [PASS-1]
			// Mousewheel scrolling
			mousewheelScrolling: "", // vertical, horizontal, allDirections or empty (no mousewheel scrolling) String
			mousewheelScrollingStep: 70, // Pixels
			easingAfterMouseWheelScrolling: true, // Boolean
			easingAfterMouseWheelScrollingDuration: 300, // Milliseconds
			easingAfterMouseWheelScrollingFunction: "easeOutQuart", // String

		// #### CHECKED [PASS-1]
			// Manual scrolling (hotspot and/or mousewheel scrolling)
			manualContinuousScrolling: false, // Boolean

		// #### CHECKED [PASS-1]
			// Autoscrolling
			autoScrollingMode: "", // always, onStart or empty (no auto scrolling) String
			autoScrollingDirection: "endlessLoopDown", // down, up, backAndForth, endlessLoopDown, endlessLoopUp String
			autoScrollingStep: 1, // Pixels
			autoScrollingInterval: 10, // Milliseconds

			// Touch scrolling
			touchScrolling: false,

			// Easing for when the scrollToElement method is used
			scrollToAnimationDuration: 1000, // Milliseconds
			scrollToEasingFunction: "easeOutQuart" // String
		},
		_create: function () {
			var self = this, o = this.options, el = this.element;

		// #### CHECKED [PASS-1]
			// Create variables for any existing or not existing 
			// scroller elements on the page.
			el.data("scrollWrapper", el.find("." + o.scrollWrapperClass));
			el.data("scrollingHotSpotDown", el.find("." + o.scrollingHotSpotDownClass));
			el.data("scrollingHotSpotUp", el.find("." + o.scrollingHotSpotUpClass));
			el.data("scrollableArea", el.find("." + o.scrollableAreaClass));

			// Check which elements are already present on the page. 
			// Create any elements needed by the plugin if
			// the user hasn't already created them.

		// #### CHECKED [PASS-1]
			// First detach any present hot spots
			if (el.data("scrollingHotSpotDown").length > 0) {

				el.data("scrollingHotSpotDown").detach();
			}
			if (el.data("scrollingHotSpotUp").length > 0) {

				el.data("scrollingHotSpotUp").detach();
			}
	
		// #### CHECKED [PASS-1]
			// Both the scrollable area and the wrapper are missing
			if (el.data("scrollableArea").length === 0 && el.data("scrollWrapper").length === 0) {
				el.wrapInner("<div class='" + o.scrollableAreaClass + "'>").wrapInner("<div class='" + o.scrollWrapperClass + "'>");

				el.data("scrollWrapper", el.find("." + o.scrollWrapperClass));
				el.data("scrollableArea", el.find("." + o.scrollableAreaClass));
			}
			// Only the wrapper is missing
			else if (el.data("scrollWrapper").length === 0) {
				el.wrapInner("<div class='" + o.scrollWrapperClass + "'>");
				el.data("scrollWrapper", el.find("." + o.scrollWrapperClass));
			}
			// Only the scrollable area is missing
			else if (el.data("scrollableArea").length === 0) {
				el.data("scrollWrapper").wrapInner("<div class='" + o.scrollableAreaClass + "'>");
				el.data("scrollableArea", el.find("." + o.scrollableAreaClass));
			}

		// #### CHECKED [PASS-1]
			// Put the down and up hot spot back into the scroller again
			// or create them if they where not present from the beginning.
			if (el.data("scrollingHotSpotDown").length === 0) {
				el.prepend("<div class='" + o.scrollingHotSpotDownClass + "'></div>");
				el.data("scrollingHotSpotDown", el.find("." + o.scrollingHotSpotDownClass));
			} else {
				el.prepend(el.data("scrollingHotSpotDown"));
			}

			if (el.data("scrollingHotSpotUp").length === 0) {
				el.prepend("<div class='" + o.scrollingHotSpotUpClass + "'></div>");
				el.data("scrollingHotSpotUp", el.find("." + o.scrollingHotSpotUpClass));
			} else {
				el.prepend(el.data("scrollingHotSpotUp"));
			}


		// #### CHECKED [PASS-1]
			// Create variables in the element data storage
			el.data("speedBooster", 1);
			el.data("scrollYPos", 0);
			el.data("hotSpotHeight", el.data("scrollingHotSpotUp").innerHeight());
			el.data("scrollableAreaHeight", 0);
			el.data("startingPosition", 0);
			el.data("downScrollingInterval", null);
			el.data("upScrollingInterval", null);
			el.data("autoScrollingInterval", null);
			el.data("hideHotSpotBackgroundsInterval", null);
			el.data("previousScrollUp", 0);  // What does this do?
			el.data("pingPongDirection", "down");
			el.data("getNextElementHeight", true);
			el.data("swapAt", null);
			el.data("startAtElementHasNotPassed", true);
			el.data("swappedElement", null);
			el.data("originalElements", el.data("scrollableArea").children(o.countOnlyClass));
			el.data("visible", true);
			el.data("enabled", true);
			el.data("scrollableAreaWidth", el.data("scrollableArea").width());
			el.data("scrollerOffset", el.offset());


			/*****************************************
			SET UP EVENTS FOR TOUCH SCROLLING
			*****************************************/
		// #### CHECKED [PASS-1]
			if (o.touchScrolling && el.data("enabled")) {
				// Use jquery.kinetic.js for touch scrolling
				// Horizontal scrolling disabled
				el.data("scrollWrapper").kinetic({
					x: false,
					moved: function (settings) {
						if (o.manualContinuousScrolling) {
		// #### CHANGED: .scrollLeft TO: .scrollTop
							if (el.data("scrollWrapper").scrollTop() <= 0) {
								self._checkContinuousSwapUp();
							} else {
								self._checkContinuousSwapDown();
							}
						}
					},
					stopped: function (settings) {
						// Stop any ongoing animations
						el.data("scrollWrapper").stop(true, false);

						// Stop any ongoing auto scrolling
						self.stopAutoScrolling();
					}
				});
			}

			/*****************************************
			SET UP EVENTS FOR SCROLLING DOWN
			*****************************************/

		// #### CHECKED [PASS-1] x = y / hotSpotWidth = hotSpotHeight
			// Check the mouse Y position and calculate 
			// the relative Y position inside the down hotspot
			el.data("scrollingHotSpotDown").bind("mousemove", function (e) {
				if (o.hotSpotScrolling) {
					var y = e.pageY - (this.offsetTop + el.data("scrollerOffset").top);
					el.data("scrollYPos", Math.round((y / el.data("hotSpotHeight")) * o.hotSpotScrollingStep));

					// If the position is less then 1, it's set to 1
					if (el.data("scrollYPos") === Infinity || el.data("scrollYPos") < 1) {
						el.data("scrollYPos", 1);
					}
				}
			});

		// #### CHECKED [PASS-1]
			// Mouseover down hotspot - scrolling
			el.data("scrollingHotSpotDown").bind("mouseover", function () {
				if (o.hotSpotScrolling) {
					// Stop any ongoing animations
					el.data("scrollWrapper").stop(true, false);

					// Stop any ongoing auto scrolling
					self.stopAutoScrolling();

					// Start the scrolling interval
					el.data("downScrollingInterval", setInterval(function () {
						if (el.data("scrollYPos") > 0 && el.data("enabled")) {
							el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + (el.data("scrollYPos") * el.data("speedBooster")));

							if (o.manualContinuousScrolling) {
								self._checkContinuousSwapDown();
							}

							self._showHideHotSpots();
						}
					}, o.hotSpotScrollingInterval));

					// Callback
					self._trigger("mouseOverDownHotSpot");
				}
			});

		// #### CHECKED [PASS-1]
			// Mouseout down hotspot - stop scrolling
			el.data("scrollingHotSpotDown").bind("mouseout", function () {
				if (o.hotSpotScrolling) {
					clearInterval(el.data("downScrollingInterval"));
					el.data("scrollYPos", 0);

					// Easing out after scrolling
					if (o.easingAfterHotSpotScrolling && el.data("enabled")) {
						el.data("scrollWrapper").animate({ scrollTop: el.data("scrollWrapper").scrollTop() + o.easingAfterHotSpotScrollingDistance }, { duration: o.easingAfterHotSpotScrollingDuration, easing: o.easingAfterHotSpotScrollingFunction });
					}
				}
			});


		// #### CHECKED [PASS-1]
			// mousedown down hotspot (add scrolling speed booster)
			el.data("scrollingHotSpotDown").bind("mousedown", function () {
				el.data("speedBooster", o.hotSpotMouseDownSpeedBooster);
			});

			// mouseup anywhere (stop boosting the scrolling speed)
			$("body").bind("mouseup", function () {
				el.data("speedBooster", 1);
			});

			/*****************************************
			SET UP EVENTS FOR SCROLLING UP
			*****************************************/

		// #### CHECKED [PASS-1]
			// Check the mouse Y position and calculate
			// the relative Y position inside the up hotspot
			el.data("scrollingHotSpotUp").bind("mousemove", function (e) {
				if (o.hotSpotScrolling) {
					var y = ((this.offsetTop + el.data("scrollerOffset").top + el.data("hotSpotHeight")) - e.pageY);

					el.data("scrollYPos", Math.round((y / el.data("hotSpotHeight")) * o.hotSpotScrollingStep));

					// If the position is less then 1, it's set to 1
					if (el.data("scrollYPos") === Infinity || el.data("scrollYPos") < 1) {
						el.data("scrollYPos", 1);
					}
				}
			});

		// #### CHECKED [PASS-1]
			// Mouseover up hotspot
			el.data("scrollingHotSpotUp").bind("mouseover", function () {
				if (o.hotSpotScrolling) {
					// Stop any ongoing animations
					el.data("scrollWrapper").stop(true, false);

					// Stop any ongoing auto scrolling
					self.stopAutoScrolling();

					el.data("upScrollingInterval", setInterval(function () {
						if (el.data("scrollYPos") > 0 && el.data("enabled")) {
							el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() - (el.data("scrollYPos") * el.data("speedBooster")));

							if (o.manualContinuousScrolling) {
								self._checkContinuousSwapUp();
							}

							self._showHideHotSpots();
						}
					}, o.hotSpotScrollingInterval));

					// Callback
					self._trigger("mouseOverUpHotSpot");
				}
			});

		// #### CHECKED [PASS-1]
			// mouseout up hotspot
			el.data("scrollingHotSpotUp").bind("mouseout", function () {
				if (o.hotSpotScrolling) {
					clearInterval(el.data("upScrollingInterval"));
					el.data("scrollYPos", 0);

					// Easing out after scrolling
					if (o.easingAfterHotSpotScrolling && el.data("enabled")) {
						el.data("scrollWrapper").animate({ scrollTop: el.data("scrollWrapper").scrollTop() - o.easingAfterHotSpotScrollingDistance }, { duration: o.easingAfterHotSpotScrollingDuration, easing: o.easingAfterHotSpotScrollingFunction });
					}
				}
			});

			// mousedown left hotspot (add scrolling speed booster)
			el.data("scrollingHotSpotUp").bind("mousedown", function () {
				el.data("speedBooster", o.hotSpotMouseDownSpeedBooster);
			});

			/*****************************************
			SET UP EVENT FOR MOUSEWHEEL SCROLLING
			*****************************************/

		// #### REVISIT [PASS-1]
			el.data("scrollableArea").mousewheel(function (event, delta, deltaX, deltaY) {

				console.log("Mouse Wheel moved! " + o.mousewheelScrolling);

				if (el.data("enabled") && o.mousewheelScrolling.length > 0) {
					var pixels;

					// Can be either positive or negative
					// Is multiplied/inverted by minus one since you want it to scroll 
					// up when moving the wheel down/right and down when moving the wheel up/left
					if (o.mousewheelScrolling === "vertical" && deltaY !== 0) {
						// Stop any ongoing auto scrolling if it's running
						self.stopAutoScrolling();
						event.preventDefault();
						pixels = Math.round((o.mousewheelScrollingStep * deltaY) * -1);
						self.move(pixels);
					} else if (o.mousewheelScrolling === "horizontal" && deltaX !== 0) {
						// Stop any ongoing auto scrolling if it's running
						self.stopAutoScrolling();
						event.preventDefault();
						pixels = Math.round((o.mousewheelScrollingStep * deltaX) * -1);
						self.move(pixels);
					} else if (o.mousewheelScrolling === "allDirections") {
						// Stop any ongoing auto scrolling if it's running
						self.stopAutoScrolling();
						event.preventDefault();
						pixels = Math.round((o.mousewheelScrollingStep * delta) * -1);
						self.move(pixels);
					}


				}
			});

		// #### CHECKED [PASS-1]
			// Capture and disable mousewheel events when the pointer
			// is over any of the hotspots
			if (o.mousewheelScrolling) {
				el.data("scrollingHotSpotUp").add(el.data("scrollingHotSpotDown")).mousewheel(function (event) {
					event.preventDefault();
				});
			}

			/*****************************************
			SET UP EVENT FOR RESIZING THE BROWSER WINDOW
			*****************************************/
		// #### CHECKED [PASS-1]
			$(window).bind("resize", function () {
				self._showHideHotSpots();
				self._trigger("windowResized");
			});

			/*****************************************
			FETCHING CONTENT ON INITIALIZATION
			*****************************************/
		// #### CHECKED [PASS-1]
			// If getContentOnLoad is present in the options, 
			// sort out the method and parameters and get the content

			if (!(jQuery.isEmptyObject(o.getContentOnLoad))) {
				self[o.getContentOnLoad.method](o.getContentOnLoad.content, o.getContentOnLoad.manipulationMethod, o.getContentOnLoad.addWhere, o.getContentOnLoad.filterTag);
			}

			// Should it be hidden on start?
			if (o.hiddenOnStart) {
				self.hide();
			}

			/*****************************************
			AUTOSCROLLING
			*****************************************/
			// The $(window).load event handler is used because the width of the elements are not calculated
			// properly until then, at least not in Google Chrome. The start of the auto scrolling and the
			// setting of the hotspot backgrounds is started here as well for the same reason. 
			// If the auto scrolling is not started in $(window).load, it won't start because it 
			// will interpret the scrollable areas as too short.

		// #### REVISIT [PASS-1]
			$(window).load(function () {

				// If scroller is not hidden, recalculate the scrollable area
				if (!(o.hiddenOnStart)) {
					self.recalculateScrollableArea();
				}

				// Autoscrolling is active
				if ((o.autoScrollingMode.length > 0) && !(o.hiddenOnStart)) {
					self.startAutoScrolling();
				}

				// If the user wants to have visible hotspot backgrounds, 
				// here is where it's taken care of
				if (o.autoScrollingMode !== "always") {

					switch (o.visibleHotSpotBackgrounds) {
						case "always":
							self.showHotSpotBackgrounds();
							break;
						case "onStart":
							self.showHotSpotBackgrounds();
							el.data("hideHotSpotBackgroundsInterval", setTimeout(function () {
								self.hideHotSpotBackgrounds(250);
							}, o.hotSpotsVisibleTime));
							break;
						case "hover":
							el.mouseenter(function (event) {
								if (o.hotSpotScrolling) {
									event.stopPropagation();
									self.showHotSpotBackgrounds(250);
								}
							}).mouseleave(function (event) {
								if (o.hotSpotScrolling) {
									event.stopPropagation();
									self.hideHotSpotBackgrounds(250);
								}
							});
							break;
						default:
							break;
					}
				}

				self._showHideHotSpots();

				self._trigger("setupComplete");

			});

		},
		/**********************************************************
		Override _setOption and handle altered options
		**********************************************************/

	// #### CHECKED [PASS-1]
		_setOption: function (key, value) {
			var self = this, o = this.options, el = this.element;

			// Update option
			o[key] = value;

			if (key === "hotSpotScrolling") {
				// Handler if the option hotSpotScrolling is altered
				if (value === true) {
					self._showHideHotSpots();
				} else {
					el.data("scrollingHotSpotUp").hide();
					el.data("scrollingHotSpotDown").hide();
				}
			} else if (key === "autoScrollingStep" ||
			// Make sure that certain values are integers, otherwise
			// they will summon bad spirits in the plugin
				key === "easingAfterHotSpotScrollingDistance" ||
				key === "easingAfterHotSpotScrollingDuration" ||
				key === "easingAfterMouseWheelScrollingDuration") {
				o[key] = parseInt(value, 10);
			} else if (key === "autoScrollingInterval") {
				// Handler if the autoScrollingInterval is altered
				o[key] = parseInt(value, 10);
				self.startAutoScrolling();
			}

		},
		/**********************************************************
		Hotspot functions
		**********************************************************/

	// #### CHECKED [PASS-1]
		showHotSpotBackgrounds: function (fadeSpeed) {

			// Alter the CSS (SmoothDivScroll.css) if you want to customize
			// the look'n'feel of the visible hotspots
			var self = this, el = this.element, o = this.option;


			// Fade in the hotspot backgrounds
			if (fadeSpeed !== undefined) {
				// Before the fade-in starts, we need to make sure the opacity is zero
				//el.data("scrollingHotSpotUp").add(el.data("scrollingHotSpotDown")).css("opacity", "0.0");

				el.data("scrollingHotSpotUp").addClass("scrollingHotSpotUpVisible");
				el.data("scrollingHotSpotDown").addClass("scrollingHotSpotDownVisible");

				// Fade in the hotspots
				el.data("scrollingHotSpotUp").add(el.data("scrollingHotSpotDown")).fadeTo(fadeSpeed, 0.35);
			}
			// Don't fade, just show them
			else {

				// The up hotspot
				el.data("scrollingHotSpotUp").addClass("scrollingHotSpotUpVisible");
				el.data("scrollingHotSpotUp").removeAttr("style");

				// The down hotspot
				el.data("scrollingHotSpotDown").addClass("scrollingHotSpotDownVisible");
				el.data("scrollingHotSpotDown").removeAttr("style");
			}

			self._showHideHotSpots();

		},
		hideHotSpotBackgrounds: function (fadeSpeed) {
			var el = this.element, o = this.option;

			// Fade out the hotspot backgrounds
			if (fadeSpeed !== undefined) {

				// Fade out the left hotspot
				el.data("scrollingHotSpotUp").fadeTo(fadeSpeed, 0.0, function () {
					el.data("scrollingHotSpotUp").removeClass("scrollingHotSpotUpVisible");
				});

				// Fade out the right hotspot
				el.data("scrollingHotSpotDown").fadeTo(fadeSpeed, 0.0, function () {
					el.data("scrollingHotSpotDown").removeClass("scrollingHotSpotDownVisible");
				});

			}
			// Don't fade, just hide them
			else {
				el.data("scrollingHotSpotUp").removeClass("scrollingHotSpotUpVisible").removeAttr("style");
				el.data("scrollingHotSpotDown").removeClass("scrollingHotSpotDownVisible").removeAttr("style");
			}

		},

	// #### CHECKED [PASS-1]
		// Function for showing and hiding hotspots depending on the
		// offset of the scrolling
		_showHideHotSpots: function () {
			var self = this, el = this.element, o = this.options;

			// Hot spot scrolling is not enabled so show no hot spots
			if (!(o.hotSpotScrolling)) {
				el.data("scrollingHotSpotUp").hide();
				el.data("scrollingHotSpotDown").hide();
			} else {

				// If the manual continuous scrolling option is set show both
				if (o.manualContinuousScrolling && o.hotSpotScrolling && o.autoScrollingMode !== "always") {
					el.data("scrollingHotSpotUp").show();
					el.data("scrollingHotSpotDown").show();
				}
				// Autoscrolling not set to always and hotspot scrolling enabled.
				// Regular hot spot scrolling.
				else if (o.autoScrollingMode !== "always" && o.hotSpotScrolling) {
					// If the scrollable area is shorter than the scroll wrapper, both hotspots
					// should be hidden
					if (el.data("scrollableAreaHeight") <= (el.data("scrollWrapper").innerHeight())) {
						el.data("scrollingHotSpotUp").hide();
						el.data("scrollingHotSpotDown").hide();
					}
					// When you can't scroll further left the left scroll hotspot should be hidden
					// and the right hotspot visible.
					else if (el.data("scrollWrapper").scrollTop() === 0) {
						el.data("scrollingHotSpotUp").hide();
						el.data("scrollingHotSpotDown").show();
						// Callback
						self._trigger("scrollerUpLimitReached");
						// Clear interval
						clearInterval(el.data("upScrollingInterval"));
						el.data("upScrollingInterval", null);
					}
					// When you can't scroll further right
					// the right scroll hotspot should be hidden
					// and the left hotspot visible
					else if (el.data("scrollableAreaHeight") <= (el.data("scrollWrapper").innerHeight() + el.data("scrollWrapper").scrollTop())) {
						el.data("scrollingHotSpotUp").show();
						el.data("scrollingHotSpotDown").hide();
						// Callback
						self._trigger("scrollerDownLimitReached");
						// Clear interval
						clearInterval(el.data("downScrollingInterval"));
						el.data("downScrollingInterval", null);
					}
					// If you are somewhere in the middle of your
					// scrolling, both hotspots should be visible
					else {
						el.data("scrollingHotSpotUp").show();
						el.data("scrollingHotSpotDown").show();
					}
				}
				// If auto scrolling is set to always, there should be no hotspots
				else {
					el.data("scrollingHotSpotUp").hide();
					el.data("scrollingHotSpotDown").hide();
				}
			}



		},

	// #### CHECKED [PASS-1]
		// Function for calculating the scroll position of a certain element
		_setElementScrollPosition: function (method, element) {
			var el = this.element, o = this.options, tempScrollPosition = 0;

			switch (method) {
				case "first":
					el.data("scrollYPos", 0);
					return true;
				case "start":
					// Check to see if there is a specified start element in the options 
					// and that the element exists in the DOM
					if (o.startAtElementId !== "") {
						if (el.data("scrollableArea").has("#" + o.startAtElementId)) {
							tempScrollPosition = $("#" + o.startAtElementId).position().top;
							el.data("scrollYPos", tempScrollPosition);
							return true;
						}
					}
					return false;
				case "last":
					el.data("scrollYPos", (el.data("scrollableAreaHeight") - el.data("scrollWrapper").innerHeight()));
					return true;
				case "number":
					// Check to see that an element number is passed
					if (!(isNaN(element))) {
						tempScrollPosition = el.data("scrollableArea").children(o.countOnlyClass).eq(element - 1).position().top;
						el.data("scrollXPos", tempScrollPosition);
						return true;
					}
					return false;
				case "id":
					// Check that an element id is passed and that the element exists in the DOM
					if (element.length > 0) {
						if (el.data("scrollableArea").has("#" + element)) {
							tempScrollPosition = $("#" + element).position().top;
							el.data("scrollYPos", tempScrollPosition);
							return true;
						}
					}
					return false;
				default:
					return false;
			}


		},
		/**********************************************************
		Jumping to a certain element
		**********************************************************/
// REVISIT
	// #### CHECKED [PASS-1]
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

	// #### CHECKED [PASS-1]
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

		},

	// #### CHECKED [PASS-1]
		move: function (pixels) {
			var self = this, el = this.element, o = this.options;
			// clear queue, move to end
			el.data("scrollWrapper").stop(true, true);

			console.log("Mousewheel move: " + pixels);

			// Only run this code if it's possible to scroll up or down,
			if ((pixels < 0 && el.data("scrollWrapper").scrollTop() > 0) || (pixels > 0 && el.data("scrollableAreaHeight") > (el.data("scrollWrapper").innerHeight() + el.data("scrollWrapper").scrollTop()))) {
				if (o.easingAfterMouseWheelScrolling) {
					el.data("scrollWrapper").animate({ scrollTop: el.data("scrollWrapper").scrollTop() + pixels }, { duration: o.easingAfterMouseWheelScrollingDuration, easing: o.easingAfterMouseWheelFunction, complete: function () {
						self._showHideHotSpots();
						if (o.manualContinuousScrolling) {
							if (pixels > 0) {
								self._checkContinuousSwapDown();
							} else {
								self._checkContinuousSwapUp();
							}
						}
					}
					});
				} else {
					el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + pixels);
					self._showHideHotSpots();

					if (o.manualContinuousScrolling) {
						if (pixels > 0) {
							self._checkContinuousSwapDown();
						} else {
							self._checkContinuousSwapUp();
						}
					}
				}
			}


		},
		/**********************************************************
		Adding or replacing content
		**********************************************************/
		/*  Arguments are:
		content - a valid URL to a Flickr feed - string
		manipulationMethod - addFirst, addLast or replace (default) - string
		*/

	// #### CHECKED [PASS-1]
		getFlickrContent: function (content, manipulationMethod) {
			var self = this, el = this.element;

			$.getJSON(content, function (data) {
				// small square - size is 75x75
				// thumbnail -> large - size is the longest side
				var flickrImageSizes = [{ size: "small square", pixels: 75, letter: "_s" },
										{ size: "thumbnail", pixels: 100, letter: "_t" },
										{ size: "small", pixels: 240, letter: "_m" },
										{ size: "medium", pixels: 500, letter: "" },
										{ size: "medium 640", pixels: 640, letter: "_z" },
										{ size: "large", pixels: 1024, letter: "_b"}];
				var loadedFlickrImages = [];
				var imageIdStringBuffer = [];
				var startingIndex;
				var numberOfFlickrItems = data.items.length;
				var loadedFlickrImagesCounter = 0;

				// Determine a plausible starting value for the
				// image height
				if (el.data("scrollableAreaWidth") <= 75) {
					startingIndex = 0;
				} else if (el.data("scrollableAreaWidth") <= 100) {
					startingIndex = 1;
				} else if (el.data("scrollableAreaWidth") <= 240) {
					startingIndex = 2;
				} else if (el.data("scrollableAreaWidth") <= 500) {
					startingIndex = 3;
				} else if (el.data("scrollableAreaWidth") <= 640) {
					startingIndex = 4;
				} else {
					startingIndex = 5;
				}

				// Put all items from the feed in an array.
				// This is necessary

			// #### CHECKED [PASS-1]
				$.each(data.items, function (index, item) {
					loadFlickrImage(item, startingIndex);
				});

				function loadFlickrImage(item, sizeIndex) {
					var path = item.media.m;
					var imgSrc = path.replace("_m", flickrImageSizes[sizeIndex].letter);
					var tempImg = $("<img />").attr("src", imgSrc);

					tempImg.load(function () {
						// Is it still smaller? Load next size
						if (this.width < el.data("scrollableAreaWidth")) {
							// Load a bigger image, if possible
							if ((sizeIndex + 1) < flickrImageSizes.length) {
								loadFlickrImage(item, sizeIndex + 1);
							} else {
								addImageToLoadedImages(this);
							}
						}
						else {
							addImageToLoadedImages(this);
						}

						// Finishing stuff to do when all images have been loaded
						if (loadedFlickrImagesCounter === numberOfFlickrItems) {
							switch (manipulationMethod) {
								case "addFirst":
									// Add the loaded content first in the scrollable area
									el.data("scrollableArea").children(":first").before(loadedFlickrImages);
									break;
								case "addLast":
									// Add the loaded content last in the scrollable area
									el.data("scrollableArea").children(":last").after(loadedFlickrImages);
									break;
								default:
									// Replace the content in the scrollable area
									el.data("scrollableArea").html(loadedFlickrImages);
									break;
							}

							// Recalculate the total width of the elements inside the scrollable area
							self.recalculateScrollableArea();

							// Determine which hotspots to show
							self._showHideHotSpots();

							// Trigger callback
							self._trigger("addedFlickrContent", null, { "addedElementIds": imageIdStringBuffer });
						}

					});
				}

			// #### CHECKED [PASS-1]
				// Add the loaded content first or last in the scrollable area
				function addImageToLoadedImages(imageObj) {
					// Calculate the scaled width
					var heightScalingFactor = el.data("scrollableAreaWidth") / imageObj.width;
					var tempHeight = Math.round(imageObj.height * heightScalingFactor);
					// Set an id for the image - the filename is used as an id
					var tempIdArr = $(imageObj).attr("src").split("/");
					var lastElemIndex = (tempIdArr.length - 1);
					tempIdArr = tempIdArr[lastElemIndex].split(".");
					$(imageObj).attr("id", tempIdArr[0]);
					// Set the height of the image to the height of the scrollable area and add the width
					$(imageObj).css({ "width": el.data("scrollableAreaWidth"), "height": tempHeight });
					// Add the id of the image to the array of id's - this
					// is used as a parameter when the callback is triggered
					imageIdStringBuffer.push(tempIdArr[0]);
					// Add the image to the array of loaded images
					loadedFlickrImages.push(imageObj);

					// Increment counter for loaded images
					loadedFlickrImagesCounter++;
				}

			});
		},

	// #### CHECKED [PASS-1]
		/*  Arguments are:
		content - a valid URL to an AJAX content source - string
		manipulationMethod - addFirst, addLast or replace (default) - string
		filterTag - a jQuery selector that matches the elements from the AJAX content
		source that you want, for example ".myClass" or "#thisDiv" or "div" - string
		*/
		getAjaxContent: function (content, manipulationMethod, filterTag) {
			var self = this, el = this.element;
			$.ajaxSetup({ cache: false });

			$.get(content, function (data) {
				var filteredContent;

				if (filterTag !== undefined) {
					if (filterTag.length > 0) {
						// A bit of a hack since I can't know if the element
						// that the user wants is a direct child of body (= use filter)
						// or other types of elements (= use find)
						filteredContent = $("<div>").html(data).find(filterTag);
					} else {
						filteredContent = content;
					}
				} else {
					filteredContent = data;
				}

				switch (manipulationMethod) {
					case "addFirst":
						// Add the loaded content first in the scrollable area
						el.data("scrollableArea").children(":first").before(filteredContent);
						break;
					case "addLast":
						// Add the loaded content last in the scrollable area
						el.data("scrollableArea").children(":last").after(filteredContent);
						break;
					default:
						// Replace the content in the scrollable area
						el.data("scrollableArea").html(filteredContent);
						break;
				}

				// Recalculate the total width of the elements inside the scrollable area
				self.recalculateScrollableArea();

				// Determine which hotspots to show
				self._showHideHotSpots();

				// Trigger callback
				self._trigger("addedAjaxContent");

			});
		},

	// #### CHECKED [PASS-1]
		getHtmlContent: function (content, manipulationMethod, filterTag) {
			var self = this, el = this.element;

			// No AJAX involved at all - just add raw HTML-content
			/* Arguments are:
			content - any raw HTML that you want - string
			manipulationMethod - addFirst, addLast or replace (default) - string
			filterTag - a jQuery selector that matches the elements from the AJAX content
			source that you want, for example ".myClass" or "#thisDiv" or "div" - string
			*/
			var filteredContent;
			if (filterTag !== undefined) {
				if (filterTag.length > 0) {
					// A bit of a hack since I can't know if the element
					// that the user wants is a direct child of body (= use filter)
					// or other types of elements (= use find)
					filteredContent = $("<div>").html(content).find(filterTag);
				} else {
					filteredContent = content;
				}
			} else {
				filteredContent = content;
			}

			switch (manipulationMethod) {
				case "addFirst":
					// Add the loaded content first in the scrollable area
					el.data("scrollableArea").children(":first").before(filteredContent);
					break;
				case "addLast":
					// Add the loaded content last in the scrollable area
					el.data("scrollableArea").children(":last").after(filteredContent);
					break;
				default:
					// Replace the content in the scrollable area
					el.data("scrollableArea").html(filteredContent);
					break;
			}

			// Recalculate the total width of the elements inside the scrollable area
			self.recalculateScrollableArea();
	
			// Determine which hotspots to show
			self._showHideHotSpots();

			// Trigger callback
			self._trigger("addedHtmlContent");

		},
		/**********************************************************
		Recalculate the scrollable area
		**********************************************************/

	// #### CHECKED [PASS-1]
		recalculateScrollableArea: function () {

			var tempScrollableAreaHeight = 0, foundStartAtElement = false, o = this.options, el = this.element;

			// Add up the total width of all the items inside the scrollable area
			el.data("scrollableArea").children(o.countOnlyClass).each(function () {
				// Check to see if the current element in the loop is the one where the scrolling should start
				if ((o.startAtElementId.length > 0) && (($(this).attr("id")) === o.startAtElementId)) {
					el.data("startingPosition", tempScrollableAreaHeight);
					foundStartAtElement = true;
				}
				tempScrollableAreaHeight = tempScrollableAreaHeight + $(this).outerHeight(true);

			});

			// If the element with the ID specified by startAtElementId
			// is not found, reset it
			if (!(foundStartAtElement)) {
				el.data("startAtElementId", "");
			}

			// Set the width of the scrollable area
			el.data("scrollableAreaHeight", tempScrollableAreaHeight);
			el.data("scrollableArea").height(el.data("scrollableAreaHeight"));

			// Move to the starting position
			el.data("scrollWrapper").scrollLeft(el.data("startingPosition"));
			el.data("scrollYPos", el.data("startingPosition"));
		},
		/**********************************************************
		Get current scrolling left offset
		**********************************************************/

	// #### CHECKED [PASS-1]
		getScrollerOffset: function () {
			var el = this.element;

			// Returns the current left offset
			// Please remember that if the scroller is in continuous
			// mode, the offset is not that relevant anymore since
			// the plugin will swap the elements inside the scroller
			// around and manipulate the offset in this process.
			return el.data("scrollWrapper").scrollTop();
		},
		/**********************************************************
		Stopping, starting and doing the auto scrolling
		**********************************************************/

	// #### CHECKED [PASS-1]
		stopAutoScrolling: function () {
			var self = this, el = this.element;

			if (el.data("autoScrollingInterval") !== null) {
				clearInterval(el.data("autoScrollingInterval"));
				el.data("autoScrollingInterval", null);

				// Check to see which hotspots should be active
				// in the position where the scroller has stopped
				self._showHideHotSpots();

				self._trigger("autoScrollingStopped");
			}
		},
		/**********************************************************
		Start Autoscrolling
		**********************************************************/

	// #### CHECKED [PASS-1]
		startAutoScrolling: function () {
			var self = this, el = this.element, o = this.options;

			if (el.data("enabled")) {
				self._showHideHotSpots();

				// Stop any running interval
				clearInterval(el.data("autoScrollingInterval"));
				el.data("autoScrollingInterval", null);

				// Callback
				self._trigger("autoScrollingStarted");

				// Start interval
				el.data("autoScrollingInterval", setInterval(function () {

					// If the scroller is not visible or
					// if the scrollable area is shorter than the scroll wrapper
					// any running auto scroll interval should stop.
					if (!(el.data("visible")) || (el.data("scrollableAreaHeight") <= (el.data("scrollWrapper").innerHeight()))) {
						// Stop any running interval
						clearInterval(el.data("autoScrollingInterval"));
						el.data("autoScrollingInterval", null);

					}
					else {

						// Store the old scrollTop value to see if the scrolling has reached the end
						el.data("previousScrollTop", el.data("scrollWrapper").scrollTop());

						switch (o.autoScrollingDirection) {
							case "down":

								el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + o.autoScrollingStep);
								if (el.data("previousScrollTop") === el.data("scrollWrapper").scrollTop()) {
									self._trigger("autoScrollingDownLimitReached");
									clearInterval(el.data("autoScrollingInterval"));
									el.data("autoScrollingInterval", null);
									self._trigger("autoScrollingIntervalStopped");
								}
								break;

							case "up":
								el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() - o.autoScrollingStep);
								if (el.data("previousScrollTop") === el.data("scrollWrapper").scrollTop()) {
									self._trigger("autoScrollingTopLimitReached");
									clearInterval(el.data("autoScrollingInterval"));
									el.data("autoScrollingInterval", null);
									self._trigger("autoScrollingIntervalStopped");
								}
								break;

							case "backAndForth":
								if (el.data("pingPongDirection") === "down") {
									el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + (o.autoScrollingStep));
								}
								else {
									el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() - (o.autoScrollingStep));
								}

								// If the scrollTop hasnt't changed it means that the scrolling has reached
								// the end and the direction should be switched
								if (el.data("previousScrollTop") === el.data("scrollWrapper").scrollTop()) {
									if (el.data("pingPongDirection") === "down") {
										el.data("pingPongDirection", "up");
										self._trigger("autoScrollingDownLimitReached");
									}
									else {
										el.data("pingPongDirection", "down");
										self._trigger("autoScrollingUpLimitReached");
									}
								}
								break;

							case "endlessLoopDown":

								// Do the auto scrolling
								el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + o.autoScrollingStep);

								self._checkContinuousSwapDown();
								break;
							case "endlessLoopUp":

								// Do the auto scrolling
								el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() - o.autoScrollingStep);

								self._checkContinuousSwapUp();
								break;
							default:
								break;

						}
					}
				}, o.autoScrollingInterval));
			}
		},
		/**********************************************************
		Check Continuos Swap Down
		**********************************************************/

	// #### CHECKED [PASS-1]
		_checkContinuousSwapDown: function () {
			var el = this.element, o = this.options;

			// Get the height of the first element. When it has scrolled out of view,
			// the element swapping should be executed. A true/false variable is used
			// as a flag variable so the swapAt value doesn't have to be recalculated
			// in each loop.
			if (el.data("getNextElementWidth")) {

				if ((o.startAtElementId.length > 0) && (el.data("startAtElementHasNotPassed"))) {
					// If the user has set a certain element to start at, set swapAt 
					// to that element height. This happens once.
					el.data("swapAt", $("#" + o.startAtElementId).outerHeight(true));
					el.data("startAtElementHasNotPassed", false);
				}
				else {
					// Set swapAt to the first element in the scroller
					el.data("swapAt", el.data("scrollableArea").children(":first").outerHeight(true));
				}
				el.data("getNextElementHeight", false);
			}


			// Check to see if the swap should be done
			if (el.data("swapAt") <= el.data("scrollWrapper").scrollTop()) {
				el.data("swappedElement", el.data("scrollableArea").children(":first").detach());
				el.data("scrollableArea").append(el.data("swappedElement"));
				var wrapperUp = el.data("scrollWrapper").scrollLeft();
				el.data("scrollWrapper").scrollTop(wrapperUp - el.data("swappedElement").outerHeight(true));
				el.data("getNextElementHeight", true);
			}
		},
		/**********************************************************
		Check Continuos Swap Up
		**********************************************************/

	// #### CHECKED [PASS-1]
		_checkContinuousSwapUp: function () {
			var el = this.element, o = this.options;

			// Get the width of the first element. When it has scrolled out of view,
			// the element swapping should be executed. A true/false variable is used
			// as a flag variable so the swapAt value doesn't have to be recalculated
			// in each loop.

			if (el.data("getNextElementHeight")) {
				if ((o.startAtElementId.length > 0) && (el.data("startAtElementHasNotPassed"))) {
					el.data("swapAt", $("#" + o.startAtElementId).outerHeight(true));
					el.data("startAtElementHasNotPassed", false);
				}
				else {
					el.data("swapAt", el.data("scrollableArea").children(":first").outerHeight(true));
				}

				el.data("getNextElementHeight", false);
			}

			// Check to see if the swap should be done
			if (el.data("scrollWrapper").scrollTop() === 0) {
				el.data("swappedElement", el.data("scrollableArea").children(":last").detach());
				el.data("scrollableArea").prepend(el.data("swappedElement"));
				el.data("scrollWrapper").scrollTop(el.data("scrollWrapper").scrollTop() + el.data("swappedElement").outerHeight(true));
				el.data("getNextElementHeight", true);
			}

		},
		restoreOriginalElements: function () {
			var self = this, el = this.element;

			// Restore the original content of the scrollable area
			el.data("scrollableArea").html(el.data("originalElements"));
			self.recalculateScrollableArea();
			self.jumpToElement("first");
		},
		show: function () {
			var el = this.element;
			el.data("visible", true);
			el.show();
		},
		hide: function () {
			var el = this.element;
			el.data("visible", false);
			el.hide();
		},
		enable: function () {
			var el = this.element;

			// Set enabled to true
			el.data("enabled", true);
		},
	// #### CHECKED [PASS-1]
		disable: function () {
			var self = this, el = this.element;

			// Clear all running intervals
			self.stopAutoScrolling();
			clearInterval(el.data("downScrollingInterval"));
			clearInterval(el.data("upScrollingInterval"));
			clearInterval(el.data("hideHotSpotBackgroundsInterval"));

			// Set enabled to false
			el.data("enabled", false);
		},
	// #### CHECKED [PASS-1]
		destroy: function () {
			var self = this, el = this.element;

			// Clear all running intervals
			self.stopAutoScrolling();
			clearInterval(el.data("downScrollingInterval"));
			clearInterval(el.data("upScrollingInterval"));
			clearInterval(el.data("hideHotSpotBackgroundsInterval"));

			// Remove all element specific events
			el.data("scrollingHotSpotDown").unbind("mouseover");
			el.data("scrollingHotSpotDown").unbind("mouseout");
			el.data("scrollingHotSpotDown").unbind("mousedown");

			el.data("scrollingHotSpotUp").unbind("mouseover");
			el.data("scrollingHotSpotUp").unbind("mouseout");
			el.data("scrollingHotSpotUp").unbind("mousedown");

			el.unbind("mousenter");
			el.unbind("mouseleave");

			// Remove all elements created by the plugin
			el.data("scrollingHotSpotDown").remove();
			el.data("scrollingHotSpotUp").remove();
			el.data("scrollableArea").remove();
			el.data("scrollWrapper").remove();

			// Restore the original content of the scrollable area
			el.html(el.data("originalElements"));

			// Call the base destroy function
			$.Widget.prototype.destroy.apply(this, arguments);

		}


	});
})(jQuery);
