<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>Full Weather Page - A PHP Weather script for your websites!</title>
<script type="text/javascript" src="js/jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="maindemo.css" />	
		
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
   <div class="weaLanguage"><a href="?l=en&c=-34.6084,-58.437"><img src="img/flags/United-Kindom.png" /></a></div>
   <div class="weaLanguage"><a href="?l=de&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Germany.png" /></a></div>
   <div class="weaLanguage"><a href="?l=ru&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Russia.png" /></a></div>    
   <div class="weaLanguage"><a href="?l=gr&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Greece.png" /></a></div> 
   <div class="weaLanguage"><a href="?l=bg&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Bulgaria.png" /></a></div>
     <div class="clear"><!--clear floats--></div>  
	 
	 <br />

	 <h4>Drop Down Menu With Flags Icons</h4>	 
	 <br />
	 
	 
	 <div id="languageDropDownMenu">
	  
		<ul>
		    <li><div class="languageDropDownMenu">Select your Language</div>
		      <ul>

		      	<li><a href="?l=en&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/United-Kindom.png" /> English</a></li>
		        <li><a href="?l=de&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Germany.png" /> German</a></li>
		        <li><a href="?l=ru&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Russia.png" /> Russian</a></li> 				
		        <li><a href="?l=gr&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Greece.png" /> Greek</a></li> 
		        <li><a href="?l=bg&c=-34.6084,-58.437"><img src="http://www.webat.gr/cc/pw/img/flags/Bulgaria.png" /> Bulgarian</a></li> 
		      </ul> 
		    </li>
		</ul>
	 </div>
	 
	 
	 
	 <br /><br /><hr />
     <h3>Cities Menus</h3>	 
	 <h4>Drop Down Menu Cities</h4>	 	 
	 <br />
	 <div id="citiesDropDownMenu">
	  
		<ul>
		    <li><div class="citiesDropDownMenu">Select your City</div>
		      <ul>
<li><a href="?c=37.9908,23.7386">Athens, Greece</a></li><li><a href="?c=39.9394,116.3974">Beijing, China</a></li><li><a href="?c=52.5242,13.4062">Berlin, Germany</a></li><li><a href="?c=-34.6084,-58.437">Buenos Aires, Argentina</a></li><li><a href="?c=-33.9248,18.4240">Cape Town, South Africa</a></li><li><a href="?c=51.5081,-0.1280">London, United Kingdom</a></li><li><a href="?c=-37.8131,144.9629">Melbourne, Australia</a></li><li><a href="?c=45.5087,-73.554">Montreal, Canada</a></li><li><a href="?c=55.7500,37.6166">Moscow, Russia</a></li><li><a href="?c=19.076,72.8777">Mumbai, India</a></li><li><a href="?c=40.7138,-74.0063">New York, NY, USA</a></li><li><a href="?c=59.9139,10.7522">Oslo, Norway</a></li><li><a href="?c=48.8566,2.3522">Paris, France</a></li><li><a href="?c=-22.9035,-43.2095">Rio De Janeiro, Brazil</a></li><li><a href="?c=35.7002,139.4313">Tokyo, Japan</a></li>	
		      </ul> 
		    </li>
		</ul>	
	 </div>  	 
	    <div class="clear"><!--clear floats--></div>
		
		
		
		
		
		
<br /><br />
<span style="color:#666;font-size:12px">Languages and Cities menus are for demo. In documentation you will find detailed instructions for make your own menus.</span>
<br /><br />
<div style="text-align:center">Extended Forecast from: 
<br /><a href="http://www.wunderground.com" target="_blank"><img src="http://www.webat.gr/cc/pw/img/wundergroundLogo_4c.png" border="0"></a></div>

	
	
	
	
	
	
	
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
<br /><a href="http://www.wunderground.com" target="_blank"><img src="img/wundergroundLogo_4c.png" border="0"></a></div>



<div class="space"><!-- space 5px --></div>	
<div class="space"><!-- space 5px --></div>	

<div style="text-align:center">Live Events Script: 
<br /><a href="http://codecanyon.net/item/live-events-v-10/615057?ref=Thomasgr" target="_blank"><img src="le-banner.png" border="0"></a></div>	</div>
	<!-- end left -->	







	
	<!-- start right -->	
	<div class="right">	
<h3>Demo: <b>Weather with Extra icons no1 (blue icons)</b></h3>

<!--start weather javascripts and css files-->
<script type="text/javascript" src="http://www.webat.gr/cc/pw/js/scripts.js"></script>
<script src="http://www.webat.gr/cc/pw/js/H2Hslider.js"></script>
<!--end weather javascripts and css files-->

<!--start style css files  for weather-->
<link rel="stylesheet" href="css/weather.css" />
<link rel="stylesheet" href="css/current.css" />
<link rel="stylesheet" href="css/forecast.css" />
<link rel="stylesheet" href="css/sliderH2H.css" />
<!--end style css files  for weather-->




<!--style for demo-->
<style type="text/css">
.clear{
  clear : both;
}

</style>
   



    <div id="right"><!--start right-->

		
		<div class="weatherWrap"><!--start weather main-->
	
			



<!--start current weather-->

<!--start current title-->
<div class="curTitleDiv"><h1>Conditions for Buenos Aires, Argentina</h1></div>

<!--start degrees button-->
<div class="degButtonDiv">
<a href="/cc/pw/site/demo2.php?u=c&c=-34.6084,-58.437" title="Fahrenheit is selected, click for change the weather to Celcius" alt="Fahrenheit is selected, click for change the weather to Celcius&c=-34.6084,-58.437"><div class="degButton-f"></div></a>
</div>
<div class="clearFloats"><!--clear floats--></div>

<!--start current main-->
<div class="weaCurWrap" style="border:1px solid #e0e0e0;">

<!--start current content-->
<div class="weaCurContent" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">

<!--start current left-->
<div class="weaCurLeft">

<!--current conditions text-->
<div class="weaCurText">Clear</div>

<!--current conditions feels like-->
<div class="weaCurConLeft">Feels Like:</div>
<div class="weaCurConRight"><b>77</b> &deg;F</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions dewpoint-->
<div class="weaCurConLeft">Dewpoint:</div>
<div class="weaCurConRight"><b>65</b> &deg;F</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions humadity-->
<div class="weaCurConLeft">Humidity:</div>
<div class="weaCurConRight"><b>64%</b></div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions wind speed-->
<div class="weaCurConLeft">Wind Speed:</div>
<div class="weaCurConRight"><b>0</b> mph<br />(  0 Beufort, Calm )</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions wind direction-->
<div class="weaCurConLeft">Wind Direction:</div>
<div class="weaCurConRight"><div class="dirIcon"><img src="icons/blue/wind/North.png" alt="North" /></div><div class="windDir">North</div></div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions pressure-->
<div class="weaCurConLeft">Barometer:</div>
<div class="weaCurConRight"><b>29.98</b> in</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions visibility-->
<div class="weaCurConLeft">Visibility:</div>
<div class="weaCurConRight"><b>0</b> mi</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current conditions precipitation-->
<div class="weaCurConLeft">Rainfall:</div>
<div class="weaCurConRight"><b>0</b> in</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current UV-->
<div class="weaCurConLeft" style="padding-top:6px;">UV Index:</div>
<div class="weaCurConRight"><div class="uvMeter">
<div class="uvMeterNum" style="margin-left:-8px;color:#007d00;">0</div>
</div></div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current sunrise-->
<div class="weaCurConLeft">Sunrise:</div>
<div class="weaCurConRight"><b>6:01</b> AM</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current sunset-->
<div class="weaCurConLeft">Sunset:</div>
<div class="weaCurConRight"><b>19:14</b> PM</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--current moon-->
<div class="weaCurConLeft">Moon Phase:</div>
<div class="weaCurConRight"><div class="dirIcon"><img src="icons/blue/moon/New_Moon.png" alt="New Moon" /></div><div class="windDir">New Moon</div></div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceFive"><!--space 5 px--></div>

<!--update note-->
<div class="spaceFive"><!--space 5 px--></div><div class="spaceFive"><!--space 5 px--></div>
<div class="hoursUpdateNote">Weather data updated every  1 hour.<br />All dates and times listed in local time of this city.</div>

<!--alerts message-->

</div>
<!--end current left-->

<!--start current right-->
<div class="weaCurRight">

<!--start current icon-->
<div class="weaCurBgIcon" style="background-image:url(/images/current-bg-nt.png);">

<!--current icon url-->
<div class="weaCurIcon">

<img src="icons/blue/160/nt_clear.png" alt="Clear" />

</div>

<!--current temperature and forecast-->
<div class="weaCurTempFor">


<!--current temperature-->
<div class="weaCurTemp" style="	background-image:url(img/thermometer_red.png);">
<b>77</b> &deg;F</div>


<!--today forecast-->
<div class="weaCurFor">
<b>65</b>...<b>90</b> &deg;F</div>

</div>
</div>
<!--end current icon-->

<div class="clearFloats"><!--clear floats--></div>

<!--last update-->
<div class="weaCurUpdate">
Last Updated: Thursday, 23 October 2014 21:21:22 -0300 (Local Time)</div>

<!--station-->
<div class="weaCurUpdate">
Station: Buenos Aires, Argentina<div class="spaceFive"><!--space 5 px--></div>
<a href="cityMap.php?c=-34.6084,-58.437" id="cityMap">City Map</a>
</div>
<div class="spaceFive"><!--space 5 px--></div>

<!--Wunderground copyright-->
<div class="weaCurCopyright">
Extended Forecast from :<br /> <a href="http://www.wunderground.com/" target="_new"><img src="img/wundergroundLogo_black_150.png" alt="www.wunderground.com" /></a>
</div>


</div>
<!--end current right-->
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceTen"><!--space 10 px--></div>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hcur").hide();
	$("#hour2hourNote").text('Click on the title for show forecast hour by hour.');
	$("#h2hShowHideCur").show();
	$("#h2hShowHideCur").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideCur').click(function () {
		$("#sliderH2Hcur").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideCur").removeClass("h2hShow").addClass("h2hHide");
			$("#hour2hourNote").text('Use the buttons above-right for see the next/previous forecast hours.');
		} else {
			$("#h2hShowHideCur").removeClass("h2hHide").addClass("h2hShow");
			$("#hour2hourNote").text('Click on the title for show forecast hour by hour.');
		}
	});
	
});
</script>

<!--start hour to hour-->
<div id="h2hShowHideCur">
<h2>Today's Hour by Hour Forecast</h2>
</div>
<div class="hour2hourDiv">

<div id="sliderH2Hcur">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
		<li class="touchcarousel-item"><div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>



</div>


</div></li><li class="touchcarousel-item"><div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>



</div>


</div></li><div class="clearFloats"><!--clear floats--></div>		</ul>
	</div>
	    <ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">22-23</a></li>
		
    </ul>	
</div>
	
</div>
<div class="hour2hourNote" id="hour2hourNote">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->

</div>
<!--end current content-->

</div>
<!--end current main-->




 
			<div class="spaceTen"><!--space 10 px--></div>
			<div class="spaceTen"><!--space 10 px--></div>			
			
<div>
<div class="forDays"><h1>10 days forecast for  Buenos Aires, Argentina</h1></div>
<div class="forCharts" title="Charts" alt="Charts">
<div style="padding-top:6px;">Charts: &nbsp;&nbsp;</div>
<div><a href="forecast-wind-chart.php?c=-34.6084,-58.437"  id="windChart" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart" /></a>
<a href="forecast-chart.php?c=-34.6084,-58.437"  id="tempChart" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" /></a> </div>
</div>
<div class="clearFloats"><!--clear floats--></div>
<div class="spaceTen"><!--space 10 px--></div>
</div>

<div>
<div class="forTitleDiv"><h3 id="forAnchor1">Today, Thursday, 23 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/clear.png" alt="Clear" />


</div>

<div class="weaForRight">

<div class="weaForText">Clear <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=23/10/2014&c=-34.6084,-58.437"  id="tempChartH2H1" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=23/10/2014&c=-34.6084,-58.437"  id="windChartH2H1" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H1").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H1").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>65</b> &deg;F <span>| Hi.:</span> <b>90</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay1"><b>Day:</b> Clear. Lows overnight in the mid 60s.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt1"><b>Night:</b> A clear sky. Low around 65F. Winds ESE at 5 to 10 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>88</b>% (from: <b>87</b>% to: <b>89</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>0</b> mph, (  0 Beufort, Calm ),  maximum to: <b>0</b> mph, (  0 Beufort, Calm )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/South.png" alt="South" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>South</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 6:01</div>
<div class="forSunsetDiv">Sunset: 19:14</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">

</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor2">Tomorrow, Friday, 24 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/clear.png" alt="Clear" />


</div>

<div class="weaForRight">

<div class="weaForText">Clear <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=24/10/2014&c=-34.6084,-58.437"  id="tempChartH2H2" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=24/10/2014&c=-34.6084,-58.437"  id="windChartH2H2" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H2").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H2").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>66</b> &deg;F <span>| Hi.:</span> <b>80</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay2"><b>Day:</b> Sun and a few passing clouds. High near 80F. Winds ESE at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt2"><b>Night:</b> Mainly clear early, then a few clouds later on. Low 66F. Winds E at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>78</b>% (from: <b>65</b>% to: <b>90</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>12</b> mph, (  4 Beufort, Moderate breeze ),  maximum to: <b>15</b> mph, (  4 Beufort, Moderate breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/ESE.png" alt="ESE" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>ESE</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 6:00</div>
<div class="forSunsetDiv">Sunset: 19:15</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor2 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_2").hide();
	$("#hour2hourNote2").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor2").show();
	$("#h2hShowHideFor2").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor2').click(function () {
		$("#sliderH2Hfor_2").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor2").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote2").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor2").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote2").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor2"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_2">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>90</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>62</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>62</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>73</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>70</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>68</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>73</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>77</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>80</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote2">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor3">Saturday, 25 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/clear.png" alt="Clear" />


</div>

<div class="weaForRight">

<div class="weaForText">Clear <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=25/10/2014&c=-34.6084,-58.437"  id="tempChartH2H3" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=25/10/2014&c=-34.6084,-58.437"  id="windChartH2H3" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H3").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H3").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>68</b> &deg;F <span>| Hi.:</span> <b>80</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay3"><b>Day:</b> Sunshine along with some cloudy intervals. High near 80F. Winds ENE at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt3"><b>Night:</b> Mainly clear early, then a few clouds later on. Low 68F. Winds NE at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>77</b>% (from: <b>61</b>% to: <b>89</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>10</b> mph, (  3 Beufort, Gentle breeze ),  maximum to: <b>15</b> mph, (  4 Beufort, Moderate breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/ENE.png" alt="ENE" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>ENE</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:59</div>
<div class="forSunsetDiv">Sunset: 19:15</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor3 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_3").hide();
	$("#hour2hourNote3").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor3").show();
	$("#h2hShowHideFor3").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor3').click(function () {
		$("#sliderH2Hfor_3").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor3").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote3").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor3").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote3").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor3"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_3">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>85</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>85</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>8</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>85</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>8</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>73</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>68</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>5</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>64</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>71</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>77</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote3">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor4">Sunday, 26 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/partlycloudy.png" alt="Partly Cloudy" />


</div>

<div class="weaForRight">

<div class="weaForText">Partly Cloudy <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=26/10/2014&c=-34.6084,-58.437"  id="tempChartH2H4" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=26/10/2014&c=-34.6084,-58.437"  id="windChartH2H4" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H4").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H4").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>71</b> &deg;F <span>| Hi.:</span> <b>85</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay4"><b>Day:</b> Sunshine and clouds mixed. High near 85F. Winds NNE at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt4"><b>Night:</b> Mostly clear skies. Low 71F. Winds NNE at 10 to 20 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>69</b>% (from: <b>54</b>% to: <b>85</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>11</b> mph, (  3 Beufort, Gentle breeze ),  maximum to: <b>15</b> mph, (  4 Beufort, Moderate breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/NNE.png" alt="NNE" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>NNE</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:58</div>
<div class="forSunsetDiv">Sunset: 19:16</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor4 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_4").hide();
	$("#hour2hourNote4").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor4").show();
	$("#h2hShowHideFor4").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor4').click(function () {
		$("#sliderH2Hfor_4").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor4").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote4").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor4").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote4").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor4"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_4">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>80</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>78</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>78</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>63</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>76</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>80</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>85</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>74</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>81</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>82</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>59</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>82</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>84</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>56</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>83</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>84</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>55</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>83</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>84</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>64</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>54</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>82</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>85</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>58</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>82</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>85</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>80</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>80</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote4">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor5">Monday, 27 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/chancetstorms.png" alt="Chance of a Thunderstorm" />


</div>

<div class="weaForRight">

<div class="weaForText">Chance of a Thunderstorm <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=27/10/2014&c=-34.6084,-58.437"  id="tempChartH2H5" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=27/10/2014&c=-34.6084,-58.437"  id="windChartH2H5" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H5").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H5").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>69</b> &deg;F <span>| Hi.:</span> <b>88</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay5"><b>Day:</b> Partly cloudy early with thunderstorms becoming likely during the afternoon. High 88F. Winds NNW at 10 to 20 mph. Chance of rain 80%.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt5"><b>Night:</b> Thunderstorms likely. Low 69F. Winds SE at 10 to 15 mph. Chance of rain 90%.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>71</b>% (from: <b>58</b>% to: <b>82</b>%) | Change of Rain: <b>80</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>13</b> mph, (  4 Beufort, Moderate breeze ),  maximum to: <b>20</b> mph, (  5 Beufort, Fresh breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/NNW.png" alt="NNW" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>NNW</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:57</div>
<div class="forSunsetDiv">Sunset: 19:17</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor5 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_5").hide();
	$("#hour2hourNote5").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor5").show();
	$("#h2hShowHideFor5").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor5').click(function () {
		$("#sliderH2Hfor_5").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor5").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote5").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor5").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote5").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor5"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_5">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>73</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>74</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>76</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>75</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>78</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>7</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>14</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>76</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>14</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>71</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>81</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>83</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>22</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNW.png)"><b>NNW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>83</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>85</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>21</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNW.png)"><b>NNW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>85</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>88</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>22</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NW.png)"><b>NW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>86</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>90</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>58</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>21</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NW.png)"><b>NW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>85</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>88</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>59</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>21</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NW.png)"><b>NW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>85</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>88</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>59</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NW.png)"><b>NW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>83</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>86</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>61</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>5</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SW.png)"><b>SW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>81</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>84</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>68</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>63</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>4</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSW.png)"><b>SSW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>79</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>79</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>73</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>78</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>78</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>78</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>78</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>49</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>51</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote5">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor6">Tuesday, 28 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/tstorms.png" alt="Thunderstorm" />


</div>

<div class="weaForRight">

<div class="weaForText">Thunderstorm <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=28/10/2014&c=-34.6084,-58.437"  id="tempChartH2H6" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=28/10/2014&c=-34.6084,-58.437"  id="windChartH2H6" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H6").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H6").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>67</b> &deg;F <span>| Hi.:</span> <b>78</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay6"><b>Day:</b> Thunderstorms likely. High 78F. Winds ENE at 10 to 15 mph. Chance of rain 90%.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt6"><b>Night:</b> Variable clouds with scattered thunderstorms. Low 67F. Winds N at 10 to 15 mph. Chance of rain 50%.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>85</b>% (from: <b>79</b>% to: <b>89</b>%) | Change of Rain: <b>90</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>10</b> mph, (  3 Beufort, Gentle breeze ),  maximum to: <b>15</b> mph, (  4 Beufort, Moderate breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/ENE.png" alt="ENE" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>ENE</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:55</div>
<div class="forSunsetDiv">Sunset: 19:18</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor6 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_6").hide();
	$("#hour2hourNote6").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor6").show();
	$("#h2hShowHideFor6").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor6').click(function () {
		$("#sliderH2Hfor_6").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor6").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote6").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor6").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote6").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor6"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_6">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>52</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>79</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>87</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>90</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>89</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>89</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>74</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>87</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>74</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>74</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>76</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>76</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>72</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>87</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>72</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>87</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>72</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>85</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NE.png)"><b>NE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>82</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>86</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>77</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>77</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>85</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>86</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>54</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>87</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>54</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>71</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>54</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>4</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>87</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>52</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>5</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNW.png)"><b>NNW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>87</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>51</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NW.png)"><b>NW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote6">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor7">Wednesday, 29 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/tstorms.png" alt="Thunderstorm" />


</div>

<div class="weaForRight">

<div class="weaForText">Thunderstorm <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=29/10/2014&c=-34.6084,-58.437"  id="tempChartH2H7" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=29/10/2014&c=-34.6084,-58.437"  id="windChartH2H7" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H7").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H7").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>59</b> &deg;F <span>| Hi.:</span> <b>75</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay7"><b>Day:</b> Thunderstorms. High near 75F. N winds shifting to S at 10 to 20 mph. Chance of rain 80%.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt7"><b>Night:</b> Windy with a steady rain in the evening. Showers continuing late. Low 59F. Winds S at 20 to 30 mph. Chance of rain 80%. Rainfall near a quarter of an inch.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>81</b>% (from: <b>67</b>% to: <b>94</b>%) | Change of Rain: <b>80</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>16</b> mph, (  4 Beufort, Moderate breeze ),  maximum to: <b>20</b> mph, (  5 Beufort, Fresh breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/SSW.png" alt="SSW" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>SSW</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:54</div>
<div class="forSunsetDiv">Sunset: 19:19</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor7 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_7").hide();
	$("#hour2hourNote7").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor7").show();
	$("#h2hShowHideFor7").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor7').click(function () {
		$("#sliderH2Hfor_7").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor7").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote7").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor7").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote7").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor7"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_7">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>51</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>6</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/W.png)"><b>West</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>89</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>51</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/WSW.png)"><b>WSW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>92</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>52</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>53</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>90</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>50</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>94</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>49</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/chancetstorms.png" alt="Chance of a Thunderstorm" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of a Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>91</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>49</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>67</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>94</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>80</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>68</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>92</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>80</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/NNE.png)"><b>NNE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>90</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>88</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>79</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>70</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>78</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/N.png)"><b>North</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>75</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>75</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>84</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>78</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SW.png)"><b>SW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>74</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>74</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>69</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>83</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>78</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSW.png)"><b>SSW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>73</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>73</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>66</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>81</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>77</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>65</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>80</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>77</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>16</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>62</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>74</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>76</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>16</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>60</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>71</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>76</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>16</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/tstorms.png" alt="Thunderstorm" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Thunderstorm</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>57</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>76</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/rain.png" alt="Rain" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Rain</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>55</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>75</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>18</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_rain.png" alt="Rain" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Rain</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>75</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>18</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_rain.png" alt="Rain" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Rain</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>70</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>74</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>21</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>70</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>50</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>20</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>72</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>50</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>17</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote7">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor8">Thursday, 30 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/partlycloudy.png" alt="Partly Cloudy" />


</div>

<div class="weaForRight">

<div class="weaForText">Partly Cloudy <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=30/10/2014&c=-34.6084,-58.437"  id="tempChartH2H8" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=30/10/2014&c=-34.6084,-58.437"  id="windChartH2H8" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H8").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H8").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>60</b> &deg;F <span>| Hi.:</span> <b>73</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay8"><b>Day:</b> Partly cloudy skies. High 73F. Winds S at 5 to 10 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt8"><b>Night:</b> Mostly clear skies. Low around 60F. Winds ESE at 5 to 10 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>58</b>% (from: <b>47</b>% to: <b>74</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>9</b> mph, (  3 Beufort, Gentle breeze ),  maximum to: <b>10</b> mph, (  3 Beufort, Gentle breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/S.png" alt="South" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>South</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:53</div>
<div class="forSunsetDiv">Sunset: 19:20</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor8 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_8").hide();
	$("#hour2hourNote8").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor8").show();
	$("#h2hShowHideFor8").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor8').click(function () {
		$("#sliderH2Hfor_8").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor8").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote8").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor8").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote8").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor8"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_8">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>74</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>50</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>13</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>74</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>44</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>71</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>44</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_chancerain.png" alt="Chance of Rain" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Chance of Rain</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>44</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>48</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>47</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>64</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>6</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>48</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSW.png)"><b>SSW</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>48</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>59</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>55</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>51</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>50</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>49</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>49</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>72</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>72</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>49</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>47</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>50</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/S.png)"><b>South</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>53</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>55</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SSE.png)"><b>SSE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>56</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>65</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>65</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>57</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>58</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote8">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor9">Friday, 31 October 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/partlycloudy.png" alt="Partly Cloudy" />


</div>

<div class="weaForRight">

<div class="weaForText">Partly Cloudy <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=31/10/2014&c=-34.6084,-58.437"  id="tempChartH2H9" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=31/10/2014&c=-34.6084,-58.437"  id="windChartH2H9" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H9").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H9").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>59</b> &deg;F <span>| Hi.:</span> <b>72</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay9"><b>Day:</b> Intervals of clouds and sunshine. High 72F. Winds E at 5 to 10 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt9"><b>Night:</b> Mainly clear skies. Low 59F. Winds ESE at 10 to 15 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>58</b>% (from: <b>49</b>% to: <b>66</b>%) | Change of Rain: <b>0</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>9</b> mph, (  3 Beufort, Gentle breeze ),  maximum to: <b>10</b> mph, (  3 Beufort, Gentle breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/E.png" alt="East" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>East</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:52</div>
<div class="forSunsetDiv">Sunset: 19:21</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor9 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_9").hide();
	$("#hour2hourNote9").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor9").show();
	$("#h2hShowHideFor9").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor9').click(function () {
		$("#sliderH2Hfor_9").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor9").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote9").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor9").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote9").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor9"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_9">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>64</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>48</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>5</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ENE.png)"><b>ENE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>66</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>66</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>56</b>% | UV Index: <b>6</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>54</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>54</b>% | UV Index: <b>8</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>53</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>52</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>71</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>71</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>49</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>50</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>0</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>7</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>53</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>1</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>8</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>56</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>65</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>65</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>58</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>63</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote9">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div>
<div>
<div class="forTitleDiv"><h3 id="forAnchor10">Saturday, 1 November 2014</h3></div>
<div class="clearFloats"><!--clear floats--></div>
</div>


<div class="weaForWrap">
<div class="weaForContent">

<div class="weaForLeft">

<img src="icons/blue/100/partlycloudy.png" alt="Partly Cloudy" />


</div>

<div class="weaForRight">

<div class="weaForText">Partly Cloudy <div class="h2hChartDiv"><div class="h2hChartText">Charts:&nbsp;&nbsp;</div>
<div style="position:relative;float:left;"> 

<a href="h2h-chart.php?d=1/11/2014&c=-34.6084,-58.437"  id="tempChartH2H10" title="Temperature" alt="Temperature"><img src="img/thermo.png"  id="tempChart" height="18" /></a> 

<a href="h2h-wind-chart.php?d=1/11/2014&c=-34.6084,-58.437"  id="windChartH2H10" title="Wind Speed" alt="Wind Speed"><img src="img/wind.png" id="windChart"  height="18" /></a>

</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
<script>
jQuery(document).ready(function() {

	$("#windChartH2H10").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	$("#tempChartH2H10").fancybox({
		'width'				: 950,
		'height'			: 450,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe'
	});
	});
</script>

<div class="clearFloats"><!--clear floats--></div></div>

<div class="weaForTemp"><span>Low:</span> <b>59</b> &deg;F <span>| Hi.:</span> <b>71</b> &deg;F</div>
<div class="spaceFive"><!--space 5 px--></div>


<div class="weaForDesc" id="weaForDescDay10"><b>Day:</b> Wind increasing. Partly cloudy skies during the morning will give way to mostly cloudy skies in the afternoon. High 71F. Winds ESE at 20 to 30 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDescNt" id="weaForDescNt10"><b>Night:</b> Considerable clouds early. Some decrease in clouds late. Low 59F. Winds E at 15 to 25 mph.</div><div class="spaceFive"><!--space 5 px--></div>

<div class="weaForDetails humidity">Humidity: <b>61</b>% (from: <b>52</b>% to: <b>69</b>%) | Change of Rain: <b>10</b>%
</div>

<div class="weaForDetails windSpeed">Wind Speed: <b>20</b> mph, (  5 Beufort, Fresh breeze ),  maximum to: <b>30</b> mph, (  6 Beufort, Strong breeze )</div>

<div class="weaForDetails windDirFor">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">Wind Direction: &nbsp;</div></td>
      <td align="left" valign="top"><div class="weaForDetails"><img src="icons/blue/wind/ESE.png" alt="ESE" /></div></td>
      <td align="left" valign="top"><div class="weaForDetails" style="padding-top:2px;">&nbsp;<b>ESE</b> </div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="weaForDetails">
<div class="forSunDiv">
<div class="forSunrizeDiv">Sunrise: 5:51</div>
<div class="forSunsetDiv">Sunset: 19:22</div>
<div class="clearFloats"><!--clear floats--></div>
</div>
</div>

</div>
<div class="clearFloats"><!--clear floats--></div>

<div class="weaForDetails">


<div class="spaceTen"><!--space 10 px--></div>
<!--start hour to hour-->
<style>
#h2hShowHideFor10 {
	cursor:pointer;
	padding-left:20px;

}
</style>
<script type="text/javascript">
$(document).ready(function () {
		$("#sliderH2Hfor_10").hide();
	$("#hour2hourNote10").text('Click on the title for show forecast hour by hour.');	
	$("#h2hShowHideFor10").show();
	$("#h2hShowHideFor10").removeClass("h2hHide").addClass("h2hShow");
		$('#h2hShowHideFor10').click(function () {
		$("#sliderH2Hfor_10").slideToggle();
		if ($(this).attr("class") == 'h2hShow') {
			$("#h2hShowHideFor10").removeClass("h2hShow").addClass("h2hHide");
		$("#hour2hourNote10").text('Use the buttons above-right for see the next/previous forecast hours.');				
		} else {
			$("#h2hShowHideFor10").removeClass("h2hHide").addClass("h2hShow");
		$("#hour2hourNote10").text('Click on the title for show forecast hour by hour.');	
		}
	});
	
});
</script>
<div id="h2hShowHideFor10"><h2>Today's Hour by Hour Forecast</h2></div>
<div class="hour2hourDiv">
<div id="sliderH2Hfor_10">
<a class="buttons next" href="javascript:void(0);"></a>
<a class="buttons prev" href="javascript:void(0);"></a> 

	<div class="viewport">
		<ul class="overview">
<li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">0:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/SE.png)"><b>SE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">1:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">2:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>60</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>60</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>69</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>10</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">3:00</div>
<img src="icons/blue/75/nt_partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>64</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>9</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">4:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">5:00</div>
<img src="icons/blue/75/nt_clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>67</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">6:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">7:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>61</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>61</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>49</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>4</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>14</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">8:00</div>
<img src="icons/blue/75/clear.png" alt="Clear" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Clear</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">9:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>2</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">10:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>65</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>65</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>61</b>% | UV Index: <b>4</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">11:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>59</b>% | UV Index: <b>6</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>17</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">12:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>57</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>3</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>16</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">13:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>53</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>57</b>% | UV Index: <b>7</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>18</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">14:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>55</b>% | UV Index: <b>6</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>15</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">15:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>70</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>70</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>52</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>54</b>% | UV Index: <b>5</b></div>

<div class="h2hDetails">Change of Rain: <b>2</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>16</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">16:00</div>
<img src="icons/blue/75/partlycloudy.png" alt="Partly Cloudy" />
<div class="h2hTemp"><b>69</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Partly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>69</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>52</b>% | UV Index: <b>3</b></div>

<div class="h2hDetails">Change of Rain: <b>12</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>20</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">17:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>68</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>68</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>54</b>% | UV Index: <b>1</b></div>

<div class="h2hDetails">Change of Rain: <b>13</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>17</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">18:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>67</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>67</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>57</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>14</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>18</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/ESE.png)"><b>ESE</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" >
<div class="h2hIcon">
<div class="h2hTime">19:00</div>
<img src="icons/blue/75/mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>65</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>65</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>60</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>14</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>18</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">20:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>64</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>64</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>62</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>15</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>14</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">21:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>63</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>63</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>64</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>16</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>17</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">22:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>51</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>65</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>12</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li>
<!--hour to hour box-->
<div class="hour2hour" style="background:#dfdde2; background-image:url(/images/wea-bg-nt.png); background-repeat:repeat-x;">
<div class="h2hIcon">
<div class="h2hTime">23:00</div>
<img src="icons/blue/75/nt_mostlycloudy.png" alt="Mostly Cloudy" />
<div class="h2hTemp"><b>62</b> &deg;F</div>
</div>

<div class="h2hRight">

<div class="h2hText">Mostly Cloudy</div>

<div class="h2hDetails">Feels Like: <b>62</b> &deg;F</div>

<div class="h2hDetails">Dewpoint: <b>50</b> &deg;F</div>

<div class="h2hDetails">Humidity: <b>66</b>% | UV Index: <b>0</b></div>

<div class="h2hDetails">Change of Rain: <b>24</b>%</div>

<div class="h2hDetails">Wind Speed: <b><b>11</b> mph</b></div>

<div class="h2hDetails" style="position:relative;float:left;	display:block-inline;">Wind Direction:</div><div class="h2hDetails h2hWindBg" style="background-image : url(icons/blue/wind/E.png)"><b>East</b></div>

</div>
</div>
<!--end to hour box-->
</li><li></li>		</ul>
	</div>
	<ul class="pager">
	        <li><a rel="0" class="pagenum" href="javascript:void(0);">0</a></li>
	        <li><a rel="1" class="pagenum" href="javascript:void(0);">1</a></li>
	        <li><a rel="2" class="pagenum" href="javascript:void(0);">2</a></li>
	        <li><a rel="3" class="pagenum" href="javascript:void(0);">3</a></li>
	        <li><a rel="4" class="pagenum" href="javascript:void(0);">4</a></li>
	        <li><a rel="5" class="pagenum" href="javascript:void(0);">5</a></li>
	        <li><a rel="6" class="pagenum" href="javascript:void(0);">6</a></li>
	        <li><a rel="7" class="pagenum" href="javascript:void(0);">7</a></li>
	        <li><a rel="8" class="pagenum" href="javascript:void(0);">8</a></li>
	        <li><a rel="9" class="pagenum" href="javascript:void(0);">9</a></li>
	        <li><a rel="10" class="pagenum" href="javascript:void(0);">10</a></li>
	        <li><a rel="11" class="pagenum" href="javascript:void(0);">11</a></li>
	        <li><a rel="12" class="pagenum" href="javascript:void(0);">12</a></li>
	        <li><a rel="13" class="pagenum" href="javascript:void(0);">13</a></li>
	        <li><a rel="14" class="pagenum" href="javascript:void(0);">14</a></li>
	        <li><a rel="15" class="pagenum" href="javascript:void(0);">15</a></li>
	        <li><a rel="16" class="pagenum" href="javascript:void(0);">16</a></li>
	        <li><a rel="17" class="pagenum" href="javascript:void(0);">17</a></li>
	        <li><a rel="18" class="pagenum" href="javascript:void(0);">18</a></li>
	        <li><a rel="19" class="pagenum" href="javascript:void(0);">19</a></li>
	        <li><a rel="20" class="pagenum" href="javascript:void(0);">20</a></li>
	        <li><a rel="21" class="pagenum" href="javascript:void(0);">21</a></li>
	        <li><a rel="22-23" class="pagenum" href="javascript:void(0);">22-23</a></li>
	        <li><a rel="23" class="pagenum" href="javascript:void(0);">23</a></li>
		
    </ul>	
</div>

</div>
<div class="hour2hourNote" id="hour2hourNote10">Use the buttons above-right for see the next/previous forecast hours.</div>
<!--end hour to hour-->


</div>
</div>
</div> 	  
	  
	  
	  
	  
	  
	  
		</div><!--end weather main-->	 
<div style="text-align:center">Extended Forecast from: 
<br /><a href="http://www.wunderground.com" target="_blank"><img src="img/wundergroundLogo_horz650.png" border="0"></a></div>		
    </div><!--end right-->

	
	

	
	
	    <div class="clear"><!--clear floats--></div>	
	


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