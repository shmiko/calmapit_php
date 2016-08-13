<!DOCTYPE html>
<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps Events | Demo: Simple Div with Directions and Coordinates</title>
<!--JAVASCRIPTS START-->
<!--map files-->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/util.js"></script>
<!--jquery library - remove if you have allready in your pages-->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--scrollbars file-->
<script src="js/scrollbars.min.js"></script>
<!--tooltip file-->
<script src="js/tooltip.js"></script>	
<script>
//****//   CONFIGURATION   //****//
//---edit these settings below---//


//xml file
var xmlFile = 'markers-europe.xml';

// map type ( ROADMAP displays the default road map view |  SATELLITE displays Google Earth satellite images | HYBRID displays a mixture of normal // and satellite views | MapTypeId.TERRAIN displays a physical map based on terrain information. )
var thisMapType = google.maps.MapTypeId.ROADMAP;

//line symbol (line icon) for directions or polylines
var lineSymbol = {
	path : google.maps.SymbolPath.FORWARD_CLOSED_ARROW, // symbol type, more here: https://developers.google.com/maps/documentation/javascript/overlays#PolylineSymbols
	strokeOpacity : 0, //opacity (set to zero (0) if you don't want show the lines symbols)
	scale : 1.7, //scale
	strokeColor : "#ff0000", //symbol color	
}

//directions line (straight line)
var pOptions = {
	strokeColor : "#ff0000", //line color
	strokeOpacity : 1, //opacity (set to zero (0) if you don't want show the line)
	strokeWeight : 3,
	zIndex : 99,
	icons : [{
			icon : lineSymbol,
			offset : '100%',
			repeat : '10px'//distance between symbols
		}
	]
};
var mDirectionsRendererOptions = {
	suppressMarkers : true,
	suppressInfoWindows : true,
	polylineOptions : pOptions
};

//****   END CONFIGURATION  ****//
</script>
<script src="js/div-coordinates-directions.js"></script>
<!--JAVASCRIPTS END-->

<!--MAP STYLE-->
<link href="css/mapStyle.css" rel="stylesheet" type="text/css" />

<!--DEMO STYLE-->
<link href="demo.css" rel="stylesheet" type="text/css" />
<style>
#map{
	width:100%;
	height:500px;
	float:none;
}
</style>
</head>
<body>
<div class="header">
Google Maps Events
<p>Demo: Simple Div with Directions and Coordinates</p>
</div>
<div class="outer">
<!--SIMPLE DIV AND MAP START HERE-->

	<div id="map"><!--place for map here--></div>

	<div id="divMap"><!--place for div content here--></div>
	
<!--SIMPLE DIV AND MAP END HERE-->
<div style="text-align:right;padding-top:3px;font-size:11px;color:#666;font-style:italic;">click on map icons for get city/location's information</div>		
</div>

<div class="links">
	<a href="./">&bull; Back to main page</a><br /><br />

	<b>Other Demos:</b><br /><br />
	With Coordinates:<br />
	<a href="accordion-xml-coordinates-polylines.php"> Accordion with Polylines</a> | 
	<a href="accordion-xml-coordinates-directions.php"> Accordion with Directions</a> |
	<a href="accordion-xml-coordinates-no-lines.php"> Accordion without Directions or Polylines</a><br />
	<a href="tabs-xml-coordinates-polylines.php"> Tabs with Polylines</a>  | 
	<a href="tabs-xml-coordinates-directions.php"> Tabs with Directions</a> | 
	<a href="tabs-xml-coordinates-no-lines.php"> Tabs without Directions or Polylines</a><br />
	<a href="modal-xml-coordinates-polylines.php"> Modal Window with Polylines</a> | 
	<a href="modal-xml-coordinates-directions.php"> Modal Window with Directions</a> | 
	<a href="modal-xml-coordinates-no-lines.php"> Modal Window without Directions or Polylines</a><br /> 
	<a href="div-xml-coordinates-polylines.php"> Simple Div with Polylines</a> | 
	<a href="div-xml-coordinates-directions.php"> Simple Div with Directions</a> | 
	<a href="div-xml-coordinates-no-lines.php"> Simple Div without Directions or Polylines</a><br />

	With Geocoding:<br />
	<a href="accordion-xml-polylines.php"> Accordion with Polylines</a> | 
	<a href="accordion-xml-directions.php"> Accordion with Directions</a> |
	<a href="accordion-xml-no-lines.php"> Accordion without Directions or Polylines</a><br />
	<a href="tabs-xml-polylines.php"> Tabs with Polylines</a>  | 
	<a href="tabs-xml-directions.php"> Tabs with Directions</a> | 
	<a href="tabs-xml-no-lines.php"> Tabs without Directions or Polylines</a><br />
	<a href="modal-xml-polylines.php"> Modal Window with Polylines</a> | 
	<a href="modal-xml-directions.php"> Modal Window with Directions</a> | 
	<a href="modal-xml-no-lines.php"> Modal Window without Directions or Polylines</a><br /> 
	<a href="div-xml-polylines.php"> Simple Div with Polylines</a> | 
	<a href="div-xml-directions.php"> Simple Div with Directions</a> | 
	<a href="div-xml-no-lines.php"> Simple Div without Directions or Polylines</a><br /><br />Weather Maps (v. 1.2):<br /><a href="accordion-weather.php"> Accordion Weather</a><br />
</div>


<p class="copy">"Google Maps Events" by WebAT.gr</p>
</body>
</html>

