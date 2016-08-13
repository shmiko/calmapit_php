/**
 * @author Giri Jeedigunta
 * Visit: http://thewebstorebyg.wordpress.com/ for more tutorials on maps
 */
(function(mapEvents, $, undefined) {
	mapEvents.Directions = (function() {
		function _Directions() {
			
			
			var  directionsService, directionsDisplay, 
				autoSrc, autoDest, pinA, pinB, 
				markerA = new google.maps.MarkerImage('m1.png',
						new google.maps.Size(24, 27),
						new google.maps.Point(0, 0),
						new google.maps.Point(12, 27)),		
				markerB = new google.maps.MarkerImage('m2.png',
						new google.maps.Size(24, 28),
						new google.maps.Point(0, 0),
						new google.maps.Point(12, 28)), 
				
				// Caching the Selectors		
				$Selectors = {
					mapCanvas: jQuery('#map_canvas')[0], 
					dirPanel: jQuery('#directionsPanel'),
					dirInputs: jQuery('.directionInputs'),
					dirSrc: jQuery('#dirSource'),
					dirDst: jQuery('#dirDestination'),
					dirSrch: jQuery('#gmap_where'),
					getDirBtn: jQuery('#getDirections'),
					
					dirSrcLeft: jQuery('#dirSourceLeft'),
					dirDstLeft: jQuery('#dirDestinationLeft'),
					getDirBtnLeft: jQuery('#getDirectionsLeft'),
					
					dirSteps: jQuery('#directionSteps'), 
					paneToggle: jQuery('#paneToggle'), 
					paneToggleRight: jQuery('#paneToggleRight'), 
					dirPanelRight: jQuery('#directionsPanelRight'),
					useGPSBtn: jQuery('#useGPS'), 
					paneResetBtn: jQuery('#paneReset'),
					paneToggleSearch: jQuery('#paneToggleSearch'), 
					paneToggleTopLeft: jQuery('#paneToggleTopLeft'),
					paneToggleBottom: jQuery('#paneToggleBottom'), 
					dirPanelBottom: jQuery('#directionsPanelBottom'),
					infoToggleBottom: jQuery('#infoToggleBottom'), 
					infoToggleBottom2: jQuery('#infoToggleBottom2'), 
					infoPanelBottom: jQuery('#infoPanelBottom'),
					hideshow: jQuery('#hideshow'),
					directionStepsRight: jQuery('#directionStepsRight'),
					search: jQuery('#search'),
					paneToggleAllDates: jQuery('#paneToggleAllDates') 
					
					
					
				},
				
				autoCompleteSetup = function() {
					autoSrc = new google.maps.places.Autocomplete($Selectors.dirSrc[0]);
					autoDest = new google.maps.places.Autocomplete($Selectors.dirDst[0]);
					autoSearch = new google.maps.places.Autocomplete($Selectors.dirSrch[0]);
				}, // autoCompleteSetup Ends
			
				directionsSetup = function() {
					directionsService = new google.maps.DirectionsService();
					directionsDisplay = new google.maps.DirectionsRenderer({
						suppressMarkers: true
					});	
					
					directionsDisplay.setPanel($Selectors.dirSteps[0]);											
				}, // direstionsSetup Ends
				
				trafficSetup = function() {					
					// Creating a Custom Control and appending it to the map
					var controlDiv = document.createElement('div'), 
						controlUI = document.createElement('div'), 
						trafficLayer = new google.maps.TrafficLayer();
							
					jQuery(controlDiv).addClass('gmap-control-container').addClass('gmnoprint');
					jQuery(controlUI).text('Traffic').addClass('gmap-control');
					jQuery(controlDiv).append(controlUI);				
							
					// Traffic Btn Click Event	  
					google.maps.event.addDomListener(controlUI, 'click', function() {
						if (typeof trafficLayer.getMap() == 'undefined' || trafficLayer.getMap() === null) {
							jQuery(controlUI).addClass('gmap-control-active');
							trafficLayer.setMap(map);
						} else {
							trafficLayer.setMap(null);
							jQuery(controlUI).removeClass('gmap-control-active');
						}
					});							  
					//map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);								
				}, // trafficSetup Ends
				
				mapSetup = function() {		
					var morefeatures = [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"on"}]}];
					var istanbul2 = new google.maps.LatLng(38.250768035056424, -91.72011112031248);
					var morefeatures22 = [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"on"}]}];
					var myOptions2 = {
							//center: new google.maps.LatLng(cnMFUI.opts.mapCenterLt, cnMFUI.opts.mapCenterLg),35.496456,-101.981445
							center: istanbul2,
							//zoom: cnMFUI.opts.mapZoom,
							zoom: 7,
							panControl:true,
							zoomControl:true,
							scrollwheel: false,
							mapTypeControl:true,
							scaleControl:true,
							streetViewControl:true,
							//streetView: new google.maps.StreetViewPanorama(document.getElementById('map_id')),
							overviewMapControl:true,
							rotateControl:true,
							disableDefaultUI: true,
							mapTypeId: google.maps.MapTypeId.TERRAIN,
							styles: morefeatures22
							//mapTypeId: google.maps.MapTypeId.ROADMAP // TODO: use cnMFUI.opts.mapType
						};
					//map = new google.maps.Map($Selectors.mapCanvas, myOptions2);
					
					autoCompleteSetup();
					directionsSetup();
					trafficSetup();
					
					
				}, // mapSetup Ends 
				
				directionsRender = function(source, destination) {
					$Selectors.dirSteps.find('.msg').hide();
					directionsDisplay.setMap(map);
					
					var request = {
						origin: source,
						destination: destination,
						provideRouteAlternatives: false, 
						travelMode: google.maps.DirectionsTravelMode.DRIVING
					};		
					
					directionsService.route(request, function(response, status) {
						if (status == google.maps.DirectionsStatus.OK) {

							directionsDisplay.setDirections(response);
							
							var _route = response.routes[0].legs[0]; 
							
							pinA = new google.maps.Marker({position: _route.start_location, map: map, icon: markerA}), 
							pinB = new google.maps.Marker({position: _route.end_location, map: map, icon: markerB});																	
						}
					});
				}, // directionsRender Ends
				
				fetchAddress = function(p) {
					var Position = new google.maps.LatLng(p.coords.latitude, p.coords.longitude),  
						Locater = new google.maps.Geocoder();
					
					Locater.geocode({'latLng': Position}, function (results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var _r = results[0];
							$Selectors.dirSrc.val(_r.formatted_address);
						}
					});
				}, // fetchAddress Ends
				
				invokeEvents = function() {
					// Get Directions
					$Selectors.getDirBtn.on('click', function(e) {
						e.preventDefault();
						var src = $Selectors.dirSrc.val(), 
							dst = $Selectors.dirDst.val();
						
						directionsRender(src, dst);
					});
					
					$Selectors.getDirBtnLeft.on('click', function(e) {
						e.preventDefault();
							var srcLeft = $Selectors.dirSrcLeft.val(), 
							dstLeft = $Selectors.dirDstLeft.val();
						
						directionsRender(srcLeft, dstLeft);
					});
					
					// Reset Btn
					$Selectors.paneResetBtn.on('click', function(e) {
						$Selectors.dirSteps.html('');
						$Selectors.dirSrc.val('');
						$Selectors.dirDst.val('');
						$Selectors.dirSrcLeft.val('');
						$Selectors.dirDstLeft.val('');
						
						if(pinA) pinA.setMap(null);
						if(pinB) pinB.setMap(null);		
						
						directionsDisplay.setMap(null);					
					});
					
					// Toggle Btn
					$Selectors.paneToggle.toggle(function(e) {
						$Selectors.dirPanel.animate({'left': '-=354px'});
						jQuery(this).html('&gt;');
					}, function() {
						$Selectors.dirPanel.animate({'left': '+=354px'});
						jQuery(this).html('&lt;');
					});
					
					
					$Selectors.paneToggleRight.toggle(function(e) {
						$Selectors.dirPanelRight.animate({'right': '-=332px'});
						jQuery(this).html('&lt;');
					}, function() {
						$Selectors.dirPanelRight.animate({'right': '+=332px'});
						jQuery(this).html('&gt;');
					});
					
					$Selectors.paneToggleTopLeft.toggle(function(e) {
						$Selectors.dirPanel.animate({'left': '-=354px'});
						jQuery(this).html('&gt;');
					}, function() {
						$Selectors.dirPanel.animate({'left': '+=354px'});
						jQuery(this).html('&lt;');
					});
					
					$Selectors.paneToggleBottom.toggle(function(e) {
						$Selectors.dirPanelBottom.animate({'left': '-=663px'});
						jQuery(this).html('&lt;');
					}, function() {
						$Selectors.dirPanelBottom.animate({'left': '+=663'});
						jQuery(this).html('&gt;');
					});
					
					$Selectors.infoToggleBottom.toggle(function(e) {
						$Selectors.infoPanelBottom.animate({'right': '-=663px'});
						jQuery(this).html('&lt;');
					}, function() {
						$Selectors.infoPanelBottom.animate({'right': '+=663'});
						jQuery(this).html('&gt;');
					});
					
					$Selectors.infoToggleBottom2.toggle(function(e) {
						$Selectors.infoPanelBottom.animate({'right': '-=685px'});
						jQuery(this).html(' OPEN DEBUG');
					}, function() {
						$Selectors.infoPanelBottom.animate({'right': '+=685'});
						jQuery(this).html('CLOSE DEBUG');
					});
					
					$Selectors.paneToggleSearch.toggle(function(e) {
						$Selectors.search.slideToggle("slow");
						jQuery(this).html('Show Filters');
						$Selectors.directionStepsRight.height(500);
						$Selectors.paneToggleAllDates.show().offset({ top: 250, right: 5});
					}, function() {
						$Selectors.search.slideToggle("slow");
						jQuery(this).html('Hide Filters');
						$Selectors.directionStepsRight.height(250);
						$Selectors.paneToggleAllDates.hide();
					});
					
					$Selectors.paneToggleAllDates.toggle(function(e) {
						//$Selectors.search.slideToggle("slow");
						jQuery(this).html('Reset');
						//$Selectors.directionStepsRight.height(500);
					}, function() {
						//$Selectors.search.slideToggle("slow");
						jQuery(this).html('Show All Dates');
						//$Selectors.directionStepsRight.height(250);
					});
					
					// Use My Location / Geo Location Btn
					$Selectors.useGPSBtn.on('click', function(e) {		
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(function(position) {
								fetchAddress(position);
							});	
						}
					});
					
					// $("#tabs").appendTo(map.getPanes().floatShadow);
					
					
				}, //invokeEvents Ends 
				
				_init = function() {
					mapSetup();
					invokeEvents();
					
				}; // _init Ends	  
					
				
				
			this.init = function() {
				_init();
				return this; // Refers to: mapEvents.Directions
			}
			return this.init(); // Refers to: mapEvents.Directions.init()
		} // _Directions Ends
		return new _Directions(); // Creating a new object of _Directions rather than a funtion
		concole.log("mapEvents.Directions is ",mapEvents.Directions);
	}()); // mapEvents.Directions Ends
})(window.mapEvents = window.mapEvents || {}, jQuery);
