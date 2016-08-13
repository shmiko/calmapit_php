<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>Full Weather Page - A PHP Weather script for your websites!</title>
<script type="text/javascript" src="js/jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="maindemo.css" />	
	<link rel="stylesheet" type="text/css" href="../css/weather.css" />			
<!--start fancybox javascripts and css files-->
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<!--end fancybox javascripts and css files-->		

<script type="text/javascript">
		$(document).ready(function() {


	$("a[rel=photos_group]").fancybox({

				'titleShow'     : true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'scroll'		: 5
			});	
		});
	</script>
<style type="text/css">
* {
	outline:none;
}
.containerSlide {
	width:900px;
	padding:0;
	margin: 0 auto;
}
/*--Main Container--*/
.main_view {
	float:left;
	position: relative;
}
/*--Window/Masking Styles--*/
.window {
	height:300px;
	width:900px;
	overflow:hidden;
	/*--Hides anything outside of the set width/height--*/
	position:relative;
	border:5px solid #c0dbf5;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	-webkit-border-radius:5px;
}
.image_reel {
	position:absolute;
	top:0;
	left:0;
}
.image_reel img {
	float: left;
}
/*--Paging Styles--*/
.paging {
	position:absolute;
	bottom:40px;
	right:-7px;
	width:178px;
	height:47px;
	z-index:100;
	/*--Assures the paging stays on the top layer--*/
	text-align:center;
	line-height:40px;
	background:url(paging_bg2.png) no-repeat;
	display:none;
	/*--Hidden by default,will be later shown with jQuery--*/
}
.paging a {
	background:url(slide-off.png) no-repeat;
	margin-right:2px;
	width:14px;
	height:14px;
	line-height:14px;
}
.paging a.active {
	background:url(slide-on.png) no-repeat;
	width:14px;
	height:14px;
	line-height:14px;
}
.paging a:hover {
	background:url(slide-on.png) no-repeat;
}
.shadow-slider {
	margin:0 auto;
	width:881px;
	height:50px;
	z-index:0;
}
.wrapslider {
	text-align:center;
}
img,a {
	outline:0;
	border:0;
}
a:link {
	outline:0;
	border:0;
}
.demolink {
	font-size:14px;
	font-family:Arial;
	font-weight:normal;
	background-color:#dcebfa;
	text-align:center;
	padding-top:7px;
	padding-left:5px;
	padding-right:5px;
	padding-bottom:5px;
	margin-top:auto;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:auto;
	width:120px;
	height:18px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	display:block;
	
}
.demolink:hover {
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	background-color:#ffefdf;

}

.toplink {
	font-size:16px;
	font-family:Arial;
	font-weight:normal;
	background-color:#92bbf6;
	background:-moz-linear-gradient(top,#92bbf6,#629bf2);
	background:-webkit-gradient(linear,0 0,0 100%,from(#92bbf6),to(#629bf2));
	text-shadow:1px 1px #000;
	text-align:center;
	padding-top:7px;
	padding-left:5px;
	padding-right:5px;
	padding-bottom:5px;
	margin-top:auto;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:auto;
	width:130px;
	height:22px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	display:block;
	postion:relative;
	float:right;
	margin-right:15px;
	color:#fff;
	
}
.toplink:hover {
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	background-color:#629bf2;
	background:-moz-linear-gradient(top,#629bf2,#92bbf6);
	background:-webkit-gradient(linear,0 0,0 100%,from(#629bf2),to(#92bbf6));

}
a.toplink:link, a.toplink:active,a.toplink:visited{
	color:#fff;
}
a.toplink:hover{
	color:#14487c;
	text-shadow:1px 1px #fff;
}

.left h3, .left h2{
padding:0;
margin:0;
}
.widgedDemoDiv{
  padding-top : 10px;
  padding-left : 10px;
  padding-right : 10px;
  padding-bottom : 10px;
  margin-top : 10px;
  margin-left : 10px;
  margin-right : 10px;
  margin-bottom : 10px;border-width : 1px 1px 1px 1px;border-style : solid solid solid solid;border-color : #cccccc #cccccc #cccccc #cccccc;
  width : 280px;
  float : left;
  position : relative;
}
.widgedDemoDiv h2{
margin:0px;
padding:0px;
margin-bottom:3px;
font-size:16px;
}
</style>
</head>
<body>
<div id="version"><img src="version.png" /></div>
<div id="container">
<div class="top">
	<div class="intop">
		<div class="leftop">
		<img src="logo.png" border="0">
		</div>

		<a href="http://codecanyon.net/item/full-weather-page-v10/1333286?ref=Thomasgr" target="_new" class="toplink">Purchase</a>			
	
		<a href="demo.php" class="toplink">Demos			
		</a>		

		<a href="index.php" class="toplink">Home</a>	
		<div class="clear"></div>
	</div>
</div>
<div class="clear">
</div>
<div class="main">
	<div class="content">
	<!-- start left -->
<div style="padding:15px 0;text-align:center;">

<a href="http://www.webat.gr/weather-history/" target="new"><img src="http://www.webat.gr/weather-history/banner.jpg"/></a>

<div>	
    <div class="left"><!--start left-->
     <h3>Languages Menus</h3>
	 <h4>Simple Menu With Flags Icons</h4>
	<div class="clear"><!--clear floats--></div> 
   <div class="weaLanguage"><a href="?l=en&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/United-Kindom.png" /></a></div>
   <div class="weaLanguage"><a href="?l=de&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Germany.png" /></a></div>
   <div class="weaLanguage"><a href="?l=ru&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Russia.png" /></a></div>    
   <div class="weaLanguage"><a href="?l=gr&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Greece.png" /></a></div> 
   <div class="weaLanguage"><a href="?l=bg&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Bulgaria.png" /></a></div>
     <div class="clear"><!--clear floats--></div>  
	 
	 <br />

	 <h4>Drop Down Menu With Flags Icons</h4>	 
	 <br />
	 
	 
	 <div id="languageDropDownMenu">
	  
		<ul>
		    <li><div class="languageDropDownMenu">Select your Language</div>
		      <ul>

		      	<li><a href="?l=en&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/United-Kindom.png" /> English</a></li>
		        <li><a href="?l=de&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Germany.png" /> German</a></li>
		        <li><a href="?l=ru&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Russia.png" /> Russian</a></li> 				
		        <li><a href="?l=gr&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Greece.png" /> Greek</a></li> 
		        <li><a href="?l=bg&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/images/flags/Bulgaria.png" /> Bulgarian</a></li> 
		      </ul> 
		    </li>
		</ul>
	 </div> 
	 
	 
	 

<span style="color:#666;font-size:12px">Languages and Cities menus are for demo. In documentation you will find detailed instructions for make your own menus.</span>
<br /><br />
<div style="text-align:center">Extended Forecast from: 
<br /><a href="http://www.wunderground.com" target="_blank"><img src="http://www.webat.gr/cc/pw/images/wundergroundLogo_4c.png" border="0"></a></div>

	
	
	
	
	
	
	
<h2>Demos</h2>
Below you can choose a demo  of our application:
<div class="space"><!-- space 5px --></div>
<h3>Default Icons</h3>
Weather with default icons:
<div class="space"><!-- space 5px --></div>
<b><a href="demo.php" class="demolink">Default Demo</a></b>

<div class="space"><!-- space 5px --></div>
<div class="space"><!-- space 5px --></div>
	
<h3>Extra Icons no 1</h3>
Weather with another set of icons:

<div class="space"><!-- space 5px --></div>
<b><a href="demo2.php" class="demolink">Extra 1 Demo</a></b>

<div class="space"><!-- space 5px --></div>
<div class="space"><!-- space 5px --></div>

	<h3>Extra Icons no 2</h3>
Weather with another set of icons:
<div class="space"><!-- space 5px --></div>
<b><a href="demo3.php" class="demolink">Extra 2 Demo</a></b>

<div class="space"><!-- space 5px --></div>
<div class="space"><!-- space 5px --></div>


	<h3>Widgets Demos</h3>
Take a look at our widgets:
<div class="space"><!-- space 5px --></div>
<b><a href="widgets.php" class="demolink">Widgets Demo</a></b>

<div class="space"><!-- space 5px --></div>
<div class="space"><!-- space 5px --></div>



<h3>Adminpanel Screenshots</h3>
Select a screenshot for adminpanel
<div class="space"><!-- space 5px --></div>
<a href="shots/admin-main.jpg" class="adminscreens" rel="photos_group" title="Main Page">Main Page</a>
<div class="space"><!-- space 5px --></div>
<a href="shots/admin-city-form.jpg" class="adminscreens" rel="photos_group" title="Add City/Location form">Add City/Location form</a>
<div class="space"><!-- space 5px --></div>
<a href="shots/admin-city-map.jpg" class="adminscreens" rel="photos_group" title="Add City/Location map">Add City/Location map</a>
<div class="space"><!-- space 5px --></div>
<a href="shots/admin-city-edit.jpg" class="adminscreens" rel="photos_group" title="Edit/Delete City/Location">Edit/Delete City/Location</a>
<div class="space"><!-- space 5px --></div>
<a href="shots/admin-widget.jpg" class="adminscreens" rel="photos_group" title="Widgets Generator">Widgets Generator</a>

<div class="space"><!-- space 5px --></div>
<div class="space"><!-- space 5px --></div>
<h2>Support</h2>
We support this script for our clients forever!<br />
<a href="http://codecanyon.net/user/Thomasgr" target="_new" >For technical support you must use the form from here</a> <br /> 
For pre-sales questions you can use this email address:<br /> 
<img src="email.png" /><br />
(you must write in message your Item Purchase Code)			   
<div class="space"><!-- space 5px --></div>	
<div class="space"><!-- space 5px --></div>	   
<h2>We Used</h2>
for this script we used:<br />
<a href="http://www.wunderground.com/weather/api/" target="_new">Wunderground.com API</a>, 
<a href="http://www.php.net/" target="_new">PHP</a> (v. 5+),  
 
<a href="http://jquery.com/" target="_new">jQuey</a> (v. 1.5+), 
<a href="http://www.highcharts.com/" target="_new">Highcharts</a>,
<a href="http://www.fancybox.net/" target="_new">Fancybox</a>, 
<a href="http://www.baijs.nl/tinycarousel/" target="_new">Tiny Carousel</a>
and thousands lines of custom code!  
<div class="space"><!-- space 5px --></div>	
<div class="space"><!-- space 5px --></div>	

<a href="http://www.facebook.com/pages/WebAtgr/220748464652888?sk=wall" target="_new"><img src="facebook-button2.png" /></a>
<div class="space"><!-- space 5px --></div>	
<div class="space"><!-- space 5px --></div>	

<div style="text-align:center">Extended Forecast from: 
<br /><a href="http://www.wunderground.com" target="_blank"><img src="../images/wundergroundLogo_4c.png" border="0"></a></div>
	</div>
	<!-- end left -->	







	
	<!-- start right -->	
	<div class="right">	
<h3 style="font-size:18px;">Demo: <b>Widgets</b></h3>

<div class="widgedDemoDiv"><h2>Simple Widget</h2>
	
<!--START WEATHER WIDGET-->



<!--start style css files  for weather-->
<link rel="stylesheet" href="http://www.webat.gr/cc/pw/css/plugins.css" />
<!--end style css files  for weather-->

	<script>
$(document).ready(function () {
	
	$.get('http://www.webat.gr/cc/pw/plugins/simple-plugin.php?u=f&c=40.7138,-74.0063&weaurl=cc/pw/', function (data) {
		$('#weatherSimplePluginDiv').html(data);
	});
	
	$("#weaF").click(function () {
		$('#weatherSimplePluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');
		$('#weatherSimplePluginDiv').slideUp("slow");
		$('#weatherSimplePluginDiv').load('http://www.webat.gr/cc/pw/plugins/simple-plugin.php?u=f&c=40.7138,-74.0063&weaurl=cc/pw/').slideDown("slow");
	});
	
	$("#weaC").click(function () {
		$('#weatherSimplePluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');	
		$('#weatherSimplePluginDiv').slideUp("slow");
		$('#weatherSimplePluginDiv').load('http://www.webat.gr/cc/pw/plugins/simple-plugin.php?u=c&c=40.7138,-74.0063&weaurl=cc/pw/').slideDown("slow");
	});
	
});
</script>
<!--degrees div-->
<div class="pluginsDegrees"><a  href="javascript:void(0);" id="weaC">&deg;C</a> | <a  href="javascript:void(0);" id="weaF">&deg;F</a></div>
<div id="weatherSimplePluginDiv"><img src="http://www.webat.gr/cc/pw/images/preloader.png" /><!--show weather here--></div>
<!--link to full weather page - change as your needs-->	 
<div class="weatherUrl"><a  href="demo.php?c=40.7138,-74.0063"><i>Details &raquo;</i></a></div>	

<!--END WEATHER WIDGET-->
</div>

<div class="widgedDemoDiv"><h2>Scroller With Multiple Cities</h2>
<!--START WEATHER WIDGET-->


<!--IE8+ fix-->
<!--[if gte IE 8]>
<style>
#scrollIEFix {
height:0px;
}
</style>
<![endif]-->

<script>
$(document).ready(function () {
	var listCities = ['37.9908,23.7386','39.9394,116.3974','52.5242,13.4062','19.076,72.8777','-34.6084,-58.437','-33.9248,18.4240','51.5081,-0.1280','-37.8131,144.9629','55.7500,37.6166','40.7138,-74.0063','59.9139,10.7522','48.8566,2.3522','-22.9035,-43.2095','35.7002,139.4313'];// cities names
	$('#weatherScrollerPluginDiv').load('http://www.webat.gr/cc/pw/plugins/scroller-plugin.php?u=f&weaurl=cc/pw/', { 'pluginCitiesScroller[]': listCities } );
	
	$("#weaScrollF").click(function () {
		$('#weatherScrollerPluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');
		$('#weatherScrollerPluginDiv').slideUp("slow");
		$('#weatherScrollerPluginDiv').load('http://www.webat.gr/cc/pw/plugins/scroller-plugin.php?u=f&weaurl=cc/pw/', { 'pluginCitiesScroller[]': listCities } ).slideDown("slow");
	});
	
	$("#weaScrollC").click(function () {
		$('#weatherScrollerPluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');	
		$('#weatherScrollerPluginDiv').slideUp("slow");
		$('#weatherScrollerPluginDiv').load('http://www.webat.gr/cc/pw/plugins/scroller-plugin.php?u=c&weaurl=cc/pw/', { 'pluginCitiesScroller[]': listCities } ).slideDown("slow");
	});
	
});
</script>

<div style="width:270px;">
<div class="pluginsDegrees" style="position:relative;float:left;margin-top:-2px;" id="scrollIEFix"><a  href="javascript:void(0);" id="weaScrollC">&deg;C</a> | <a  href="javascript:void(0);" id="weaScrollF">&deg;F</a></div>
<div style="clear:both;height:5px;"><!--clear floats--></div>	
<div id="weatherScrollerPluginDiv"><img src="http://www.webat.gr/cc/pw/images/preloader.png" /><!--show weather here--></div>
</div>	 


<!--END WEATHER WIDGET-->
	
</div>
<div style="clear:both;"></div>

<div class="widgedDemoDiv"><h2>Simple Widget with Forecast</h2>
	
<!--START WEATHER WIDGET-->

 
<script>
$(document).ready(function () {
	
	$.get('http://www.webat.gr/cc/pw/plugins/simple-plugin-forecast.php?u=f&c=-37.8131,144.9629&weaurl=cc/pw/&fdays=3', function (data) {
		$('#weatherSimpleForPluginDiv').html(data);
	});
	
	$("#weaForF").click(function () {
		$('#weatherSimpleForPluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');
		$('#weatherSimpleForPluginDiv').slideUp("slow");
		$('#weatherSimpleForPluginDiv').load('http://www.webat.gr/cc/pw/plugins/simple-plugin-forecast.php?u=f&c=-37.8131,144.9629&weaurl=cc/pw/&fdays=3').slideDown("slow");
	});
	
	$("#weaForC").click(function () {
		$('#weatherSimpleForPluginDiv').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');	
		$('#weatherSimpleForPluginDiv').slideUp("slow");
		$('#weatherSimpleForPluginDiv').load('http://www.webat.gr/cc/pw/plugins/simple-plugin-forecast.php?u=c&c=-37.8131,144.9629&weaurl=cc/pw/&fdays=3').slideDown("slow");
	});
	
});
</script>
<!--degrees div-->
<div class="pluginsDegrees"><a  href="javascript:void(0);" id="weaForC">&deg;C</a> | <a  href="javascript:void(0);" id="weaForF">&deg;F</a></div>
<div id="weatherSimpleForPluginDiv"><img src="http://www.webat.gr/cc/pw/images/preloader.png" /><!--show weather here--></div>
<!--link to full weather page - change as your needs-->	 
<div class="weatherUrl"><a  href="demo.php?c=-37.8131,144.9629"><i>Details &raquo;</i></a></div>	

<!--END WEATHER WIDGET-->
</div>

<div class="widgedDemoDiv"><h2>Simple List Widget with multiple Cities</h2>
	
<!--START WEATHER WIDGET-->
<script>
$(document).ready(function () {
	var listCities = ['37.9908,23.7386','39.9394,116.3974','51.5081,-0.1280','59.9139,10.7522','35.7002,139.4313'];// cities names
	$('#weatherSimpleListPlugin').load('http://www.webat.gr/cc/pw/plugins/list-simple-plugin.php?u=f&weaurl=cc/pw/', { 'pluginCities[]': listCities } );
	
	$("#weaSimpleF").click(function () {
		$('#weatherSimpleListPlugin').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');
		$('#weatherSimpleListPlugin').slideUp("slow");
		$('#weatherSimpleListPlugin').load('http://www.webat.gr/cc/pw/plugins/list-simple-plugin.php?u=f&weaurl=cc/pw/', { 'pluginCities[]': listCities } ).slideDown("slow");
	});
	
	$("#weaSimpleC").click(function () {
		$('#weatherSimpleListPlugin').html('<img src="http://www.webat.gr/cc/pw/images/preloader.png" />');	
		$('#weatherSimpleListPlugin').slideUp("slow");
		$('#weatherSimpleListPlugin').load('http://www.webat.gr/cc/pw/plugins/list-simple-plugin.php?u=c&weaurl=cc/pw/', { 'pluginCities[]': listCities } ).slideDown("slow");
	});
	
});
</script>
<!--degrees div-->
<div class="pluginsDegrees"><a  href="javascript:void(0);" id="weaSimpleC">&deg;C</a> | <a  href="javascript:void(0);" id="weaSimpleF">&deg;F</a></div>
<div style="clear:both;height:5px;"><!--clear floats--></div>
<div id="weatherSimpleListPlugin"><img src="http://www.webat.gr/cc/pw/images/preloader.png" /><!--show weather here--></div>

<!--END WEATHER WIDGET-->
</div>
<div style="clear:both;"></div>


<div class="widgedDemoDiv"><h2>Drop Down Menu With Multiple Cities</h2>
	
<!--START WEATHER WIDGET-->


<div id="citiesPluginDropDownMenu">
	  
		<ul>
	
	<li><div class="citiesPluginDropDownMenu">
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=39.9394,116.3974">
<div class="weaListPlugin">
<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/hazy.png" alt="Mist"  title="Mist" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Beijing, China</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>49</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >91%</div> 
<div class="weaListWind" alt="WNW"  title="WNW" ><b>0</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>
<div class="spacePlugin"><!--spacer--></div>
<!--end plugin wrapper--></div><ul>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=19.076,72.8777">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_hazy.png" alt="Smoke"  title="Smoke" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Mumbai, India</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>84</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >66%</div> 
<div class="weaListWind" alt="NE"  title="NE" ><b>5</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=-34.6084,-58.437">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_clear.png" alt="Clear"  title="Clear" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Buenos Aires, Argentina</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>77</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >64%</div> 
<div class="weaListWind" alt="North"  title="North" ><b>0</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=-33.9248,18.4240">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_clear.png" alt="Clear"  title="Clear" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Cape Town, South Africa</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>67</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >70%</div> 
<div class="weaListWind" alt="ESE"  title="ESE" ><b>7</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=51.5081,-0.1280">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_cloudy.png" alt="Overcast"  title="Overcast" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">London, United Kingdom</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>63</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >73%</div> 
<div class="weaListWind" alt="SE"  title="SE" ><b>7</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=55.7500,37.6166">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_cloudy.png" alt="Overcast"  title="Overcast" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Moscow, Russia</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>24</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >78%</div> 
<div class="weaListWind" alt="North"  title="North" ><b>3</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=59.9139,10.7522">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_rain.png" alt="Light Rain"  title="Light Rain" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Oslo, Norway</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>52</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >92%</div> 
<div class="weaListWind" alt="SW"  title="SW" ><b>1</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>
<li>
<!--start simple plugin-->
<!--start plugin wrapper-->
<a href="http://www.webat.gr/cc/pw/site/demo.php?c=-22.9035,-43.2095">
<div class="weaListPlugin">

<!--weather conditions-->

<div class="weaSimpleListPluginIcon"><img src="http://www.webat.gr/cc/pw/icons/40/nt_clear.png" alt="Clear"  title="Clear" /></div>

<div class="weaSimpleListPluginData">
<div class="weaSimpleListPluginCity">Rio De Janeiro, Brazil</div>
<div class="weaListTemp" alt="Temperature"  title="Temperature" ><b>73</b> &deg;F</div> 
<div class="weaListHum" alt="Humidity"  title="Humidity" >68%</div> 
<div class="weaListWind" alt="East"  title="East" ><b>2</b> mph</div>
<div class="clearFloats"><!--clear floats--></div>
</div>

<div class="clearFloats"><!--clear floats--></div>
</div></a>

<!--end plugin wrapper-->
</li>

<!--end simple plugin-->		      </ul> 
		    </li>
		</ul>
	 </div> 
<div style="clear:both;height:5px;"><!--clear floats--></div>	

<!--END WEATHER WIDGET-->
</div>

<div style="clear:both;height:5px;"><!--clear floats--></div>
<br /><br />
<h2>Google Weather Map (version 1.2)</h2>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=el&libraries=weather"></script>
<script type="text/javascript" src="http://www.webat.gr/cc/pw/googleMap/util.js"></script>
<script type="text/javascript">
var infowindow;
var map;
var bounds = new google.maps.LatLngBounds();
  
  function initialize() {
    var myLatlng = new google.maps.LatLng(0, 0);
    var myOptions = {
      zoom: 9,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("weather_map"), myOptions);

    downloadUrl("http://www.webat.gr/cc/pw/googleMap/map_f.xml", function(data) {
      var markers = data.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var latlng = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
		var infowindowContent = '<div class="weatherinfo"><div style="font-size:16px;color:#ff0000;"><strong>'+markers[i].getAttribute("title")+'</strong></div><div><img src="'+markers[i].getAttribute("iconbig")+'"  align="left" /><span style="font-size:14px;"><b>'+markers[i].getAttribute("context")+', '+markers[i].getAttribute("temp")+'</b></span><br /><i> Feels Like:</i> '+markers[i].getAttribute("feel")+'<br /><i>Humidity:</i> <b>'+markers[i].getAttribute("hum")+'</b><br /><i>Wind Speed:</i> '+markers[i].getAttribute("wind")+', <b>'+markers[i].getAttribute("windir")+'</b><div style="clear:both">Today forecast: '+markers[i].getAttribute("forlow")+'...'+markers[i].getAttribute("forhigh")+'</div></div><div style="padding-top:10px;text-align:right;"><a href="http://www.webat.gr/cc/pw/site/demo.php?c='+markers[i].getAttribute("lat")+','+markers[i].getAttribute("lng")+' " target="_parent">Details</a></div>';

		var title = markers[i].getAttribute("title");	
		var icon = markers[i].getAttribute("icon");			
        var marker = createMarker(infowindowContent,title,icon,latlng);
       }
	
    map.fitBounds(bounds);   
     });
	cloudLayer = new google.maps.weather.CloudLayer();
	cloudLayer.setMap(map);	 
  }

  function createMarker(name, title, icon, latlng) {
     var markerIcon = new google.maps.MarkerImage(
    icon,
    new google.maps.Size(40,40),
    new google.maps.Point(0,0),
    new google.maps.Point(20,40)
  ); 
 
    var marker = new google.maps.Marker({
	position: latlng, 
	map: map, 	
	icon:markerIcon, 
	title: title
	});
    google.maps.event.addListener(marker, "click", function() {
      if (infowindow) infowindow.close();
      infowindow = new google.maps.InfoWindow({content: name});
      infowindow.open(map, marker);
    });
	bounds.extend(latlng);
    return marker;
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
.weatherinfo{
	width:300px;
	font-family:Verdana;
	font-size:11px;
	font-weight:normal;
	color:#004a95;
}

#weather_map_out {
	padding:5px;
	border:1px solid #e0e0e0;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	-webkit-border-radius:5px;
	-moz-box-shadow:1px 1px 2px #b6b6b6;
	-webkit-box-shadow:1px 1px 2px #b6b6b6;
	box-shadow:1px 1px 2px #b6b6b6;
	background:#eaf4ff;
}
</style>

 <div id="weather_map_out" style="width:98%; height:400px;"><div id="weather_map" style="width:100%; height:400px;"><!--SHOW HERE THE MAP - weather map div--></div></div>

	</div>

	<!-- end right -->
	
	</div>
<div class="clear"></div>

</div>
	<div class="footer">
		<div class="infooter">
			<div class="leftop"><img src="logo-micro.png" border="0" /></div>	
			<div class="rightop" style="text-align:center;margin-top:-3px;">Powered by:<br /><img src="logo-mini.png" /></div>	
			<div class="rightop" style="text-align:center;margin-top:-3px;width:650px;">Webat.gr &copy; 2012, All rights reserved<br />All third-party trademarks belong to their respective owners.</b></div>				
		</div>
	</div>
</div>

</body>
</html>