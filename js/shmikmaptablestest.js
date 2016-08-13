
			
			// Enable the visual refresh
			google.maps.visualRefresh = true;
			var s;
			var panorama;
			var tableId = "1VnXlhSBM_FglBZSnM7UZUWSyi4ZYg29Sg7Wh7pv4";
			var tableId2 = "1VnXlhSBM_FglBZSnM7UZUWSyi4ZYg29Sg7Wh7pv4";
			//var layer = new google.maps.FusionTablesLayer(tableId2); //create a new FusionTablesLayer
			var layer = new google.maps.FusionTablesLayer({
				suppressInfoWindows: true,
				query: {
					where: "'Event Start' > '2016.03.10' AND 'Event Start' < '2016.03.12'", // query
					from: tableId2,                // encrypted table id
					select: '*'        // location column
				},
				map: map
			});
			//var geocoder = new google.maps.Geocoder();
			var FusionTablesData = null;
			//google.load('visualization', '1', {'packages':['table']});
			
				google.load('visualization', '1', {
					'packages': ['table'],
					'callback': function(getData) {
						// do stuff, if you wan't - it doesn't matter, because the page isn't blank!
					}
				} )

			var map;
			var markers = [];
			var infoWindow = new google.maps.InfoWindow();
			
			function initialize() {
				var morefeatures = [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"on"}]}];
				var featureOpts = 	[{"featureType":"administrative","stylers":[{"visibility":"on"}]}
														,{"featureType":"poi","stylers":[{"visibility":"simplified"}]}
														,{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]}
														,{"featureType":"water","stylers":[{"visibility":"simplified"}]}
														,{"featureType":"transit","stylers":[{"visibility":"simplified"}]}
														,{"featureType":"landscape","stylers":[{"visibility":"simplified"}]}
														,{"featureType":"road.highway","stylers":[{"visibility":"on"}]}
														,{"featureType":"road.local","stylers":[{"visibility":"on"}]}
														,{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]}
														,{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]}
														,{"stylers":[{"saturation":-17},{"gamma":0.36}]}
														,{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}
														];	
				var mapstyle = [
				{"featureType":"administrative","stylers":[{"visibility":"off"}]}
				,{"featureType":"poi","stylers":[{"visibility":"simplified"}]}
				,{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]}
				,{"featureType":"water","stylers":[{"visibility":"simplified"}]}
				,{"featureType":"transit","stylers":[{"visibility":"simplified"}]}
				,{"featureType":"landscape","stylers":[{"visibility":"simplified"}]}
				,{"featureType":"road.highway","stylers":[{"visibility":"off"}]}
				,{"featureType":"road.local","stylers":[{"visibility":"on"}]}
				,{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]}
				,{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]}
				,{"stylers":[{"saturation":-17},{"gamma":0.36}]}
				,{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}
				];
				panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));
				var istanbul = new google.maps.LatLng(38.250768035056424, -91.72011112031248);
				var myOptions = {
							//center: new google.maps.LatLng(cnMFUI.opts.mapCenterLt, cnMFUI.opts.mapCenterLg),35.496456,-101.981445
							center: istanbul,
							//zoom: cnMFUI.opts.mapZoom,
							zoom: 5,
							panControl:true,
							zoomControl:true,
							mapTypeControl:true,
							scaleControl:true,
							streetViewControl:true,
							//streetView: new google.maps.StreetViewPanorama(document.getElementById('map_id')),
							overviewMapControl:true,
							rotateControl:true,
							disableDefaultUI: true,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							styles: morefeatures
							//mapTypeId: google.maps.MapTypeId.ROADMAP // TODO: use cnMFUI.opts.mapType
						};
				var styledMapOptions = {
						  name: 'Custom Style'
						};
						
				
				var MY_MAPTYPE_ID = 'custom_style';			
				map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
				//var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
				//map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
				
				google.maps.event.addListener(map, 'click', function() {
					infoWindow.close();
				});
				document.getElementById('infoPanelBottom').innerHTML += "querying for data";
				document.getElementById('EventsListQuery2').innerHTML = " From 10 March <b>(<a href='./about.html#where-did-you-get-your-data-from'>?</a>)</b><br> ";
				document.getElementById('EventsListQuery').innerHTML = " From 10 March <b>(<a href='./about.html#where-did-you-get-your-data-from'>?</a>)</b><br> ";
				var queryStr = "SELECT * FROM "+tableId+" ";
				var querystart = "SELECT * FROM "+tableId+" WHERE 'Event Start' > '2016.03.10' ";//AND 'Event Start' < '2016.03.12'";		
				var queryTextStart = encodeURIComponent(querystart);
				var startquery = new google.visualization.Query('http://www.google.com/fusiontables/gvizdata?tq='  + queryTextStart);
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
				map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);	
				
				startquery.send(getData);
				
				layer.setQuery(startquery);
				layer.setMap(map);
				//querystart.send(getData);
				
				// We get the map's default panorama and set up some defaults.
				// Note that we don't yet set it visible.
				  panorama = map.getStreetView();
				  panorama.setPosition(istanbul);
				  panorama.setPov(/** @type {google.maps.StreetViewPov} */({
					heading: 265,
					pitch: 0
				  }));
				
				
			} //end initialize
			
			 // Set a callback to run when the Google Visualization API is loaded.
			//google.setOnLoadCallback(getData);
			
			function toggleStreetView() {
			  var toggle = panorama.getVisible();
			  if (toggle == false) {
				panorama.setVisible(true);
			  } else {
				panorama.setVisible(false);
			  }
			}
			
			function removeMarkers(){
				var r;
				for(r=0;r<markers.length;i++){
				markers[r].setMap(null);
				}
				markers = [];
				console.log("1st (in remove) we should be clearing the markers now, checking markers count",markers.length);
			}
			
			//google.maps.event.addListener(layer, 'click', displayData);
			//initializeSlider();
			
			//var layer = new google.maps.FusionTablesLayer({query:{from:tableId}, map:map, suppressInfoWindows: true});
			

			function getData(response) {
				markers = [];
			  console.log("2nd we should be clearing the markers now, checking markers count",markers.length);
			  if (!response) {
				alert('no response');
				return;
			  }
			  if (response.isError()) {
				alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
				return;
			  } 
			  var dt ;//= new google.visualization.DataTable(response.table);
			  //FusionTablesData = [];
			  FusionTablesData = response.getDataTable();  
			  //var dt = [];
			  dt = FusionTablesData;
			  console.log("3rd we should be building the markers now, checking markers count: marker "+i+"",markers.length);
			  //markers = [];	
			  var side_html = '<table style="border-collapse: collapse" border="1" \
							   cellpadding="3"> \
							   <thead> \
								 <tr style="background-color:#e0e0e0"> \
								   <th style="width:20px">Date</th> \
								   <th style="width:25px">Title</th> \
								   <th style="width:130px">Desc</th> \
								   <th style="width:30px">Type</th> \
								   <th style="width:60px">Location</th> \
								 </tr> \
							   </thead> \
							   <tbody>';
			 console.log("numRows is", dt.getNumberOfRows());
			 
			  document.getElementById('infoPanelBottom').innerHTML += "<br>rows="+dt.getNumberOfRows()+"<br>";
			  document.getElementById('EventsListQuery3').innerHTML = "Viewing "+dt.getNumberOfRows()+"<div id ='white'>.</div>";
			  
			  for (var i = 0; i < dt.getNumberOfRows(); i++) {
				var  start_date = dt.getValue(i,4);
				var  title = dt.getValue(i,1);
				var desc = dt.getValue(i,2);
				var url = dt.getValue(i,17);
				var lat = dt.getValue(i,12);
				var lng = dt.getValue(i,13);
				var type = dt.getValue(i,14);
				var location = dt.getValue(i,3);
				var image = dt.getValue(i,15);
				var markerid = i;
				console.log("markerid is", markerid);
				if (!isNaN(lat) && !isNaN(lng)) {
				  var latlng = new google.maps.LatLng(lat,lng);
				  var html = "<strong><a href='"+url+"'>" + title + "</a></strong></br>";
				  if (markerid) html += "<b/>" +markerid + "</b></br>";
				  if (start_date) html += start_date + "</br>";
				  if (Image) html += Image + "</br>";
				  if (desc) html += desc + "</br>";
				  if (location) html += location + "</br>";
				  //' Title? '+title+'<br/>\n Desc? '+info+'<br/>\n Image? '+info+'<br/>\n When? '+start_date+'<br/>\n Where? '+location
				  side_html += '<tr> \
								<td style="max-width:33px;word-wrap: break-word;"><a href="javascript:myclick(' + i + ')">' + start_date  + '</a></td> \
								<td style="max-width:65px; word-wrap: break-word;"><a href="javascript:myclick(' + i + ')">' + title + '</a></td> \
								<td style="max-width:340px; word-wrap: break-word;"><a href="javascript:myclick(' + i + ')">' + desc + '</a></td> \
								<td style="max-width:60px"><a href="javascript:myclick(' + i + ')">' + type + '</a></td> \
								<td style="max-width:180px"><a href="javascript:myclick(' + i + ')">' + location + '</a></td> \
							  </tr>';
			  
					console.log("3rd we should be building the markers now, checking markers count: marker "+i+"",markers.length);
				  markers.push(createMarker(latlng, desc,image,start_date,location,title,html,markerid));
				  
				} else {
				  alert("bad coordinates: marker "+i+", hotel="+hotels);
				}
			  }

			  side_html += '</tbody> \
						</table>';
			  document.getElementById("EventsListData").innerHTML = side_html;
			}

			function createMarker(point,info,image,start_date,location,title,html,markerid) {
			  console.log("html is num"+markerid+"", html,markerid);
			  var myMarkerOpts = {
				position: point,
				icon: image,
				animation: google.maps.Animation.DROP,
				zIndex: markerid, //markers[markers.length],
				anchorPoint: new google.maps.Point(3,-4),
				html: html,//' Title? '+title+'<br/>\n Desc? '+info+'<br/>\n Image? '+info+'<br/>\n When? '+start_date+'<br/>\n Where? '+location,
				map: map,
				title: title
			  };
			  
				
			
			  var marker = new google.maps.Marker(myMarkerOpts);
			  
			  google.maps.event.trigger(marker, 'click', {
				  latLng: new google.maps.LatLng(0, 0)
				});	

			  google.maps.event.addListener(marker, 'click', function() {
				infoWindow.close();
				infoWindow.setContent(this.html);
				infoWindow.setPosition(point); 
				infoWindow.open(map,marker); 
				map.setZoom(15);
				map.setCenter(point);
			  });
			  console.log("4th we should be seeing the markers now, checking markers count: marker "+markerid+"",markerid);
			  return marker;
			}

			function myclick(num) {
				console.log("5th we should be seeing the markers now, checking markers count: marker "+num+"",num);
				google.maps.event.trigger(markers[num], "click");
			}
			
			
			
			google.maps.event.addDomListener(window, 'load', initialize);

	