
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html itemscope itemtype="http://schema.org/Product">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="description" content="Find the location of an IP address or domain"/>
  <meta name="keywords" content="ip locator" />
  <meta name="author" content="Marc-Andre Caron" />
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
  <meta itemprop="name" content="IPInfoDB | Free IP Address Geolocation Tools">
  <meta itemprop="description" content="Free Geolocation tools for IP Location, API, database and fraud detection tools">
  <meta itemprop="image" content="/img/sitelogo.gif">

  <style>
  label#form{float:left;margin-top:1px;width:100px;font-weight: bold;cursor:pointer;}

  #social_btn li
	{
	display: inline;
	float: right;
	list-style-type: none;
	padding-right: 10px;
	}

  </style>
  <title>IP locator</title>
  <script language="JavaScript" src="http://code.google.com/apis/gears/gears_init.js"></script>
  <script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js"></script>
  <script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.3/scriptaculous.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <script  type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyCDyuMEpvjNHZS8ACf1rJPhxMOODrfJyL4"></script>
  <script  type="text/javascript" src="js/map.js"></script>

<script type="text/javascript">
function getLocation(){
	try{
		var geo = google.gears.factory.create('beta.geolocation');
		geo.getCurrentPosition(successCallback, errorCallback);
	}
	catch(e){
		try{
			navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
		}
		catch(e){
			errorCallback({code:2,message:e.message});
		}
	}
}

function errorCallback(err){}

function successCallback(r){
	new Ajax.Request('/geo5.php?lat=' + r.coords.latitude + '&lon=' + r.coords.longitude,{
		method:'get',
		onSuccess: function(transport){},
		onFailure: function(){ alert('Failed to report location.') }
	});
}

</script>
</head>

<body id="top">
  <div id="layout_wrapper_outer">
  <div id="layout_wrapper">

    <div id="layout_top">

      <div id="site_title">

      	<table width="100%">
      		<tr>
      			<td width="40%">
      				<a href="index.php"><img src="/img/sitelogo.gif" alt="logo"/></a>
      			</td>
      			<td style="margin-bottom:0;" align="right">
				<div style="width:250px;height:73px;background:url(/img/socialbtn.jpg);">
				
				</div>
				<div style="clear:both;"></div>
      			</td>
      		</tr>
      	</table>

       <!-- <h5>Free IP address geolocation tools</h5> -->
      </div>

    </div>

    <div id="layout_body_outer">
    <div id="layout_body">

      <div id="navigation">

        <div id="nav1">

          <ul>
            <li class="current_page_item"><a href="index.php">IP Location</a></li>
            <li><a href="ip_location_api.php">IP Location API</a></li>
            <li><a href="ip_country_block.php">Block IP by Country</a></li>
            <li><a href="ip_database.php">IP Database</a></li>
            <li><a href="fraud_detection.php">Fraud Detection</a></li>
            <li><a href="account.php">Account</a></li>
                      </ul>

        <div class="clearer">&nbsp;</div>

        </div>

        <div id="nav2">

          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="my_ip_location.php">My IP location</a></li>
            <li class="current_page_item"><a href="ip_locator.php">IP locator</a></li>
          </ul>

          <div class="clearer">&nbsp;</div>

        </div>

      </div>

      <div id="main">

        <div class="left" id="content_outer">

          <div id="content">

            <div class="post">

              <div class="post_body">
                <div class="section">
                  <h5>IP locator</h5>
                  <p>
                    Find the location of an IP address or a domain name (example.com).
                  </p>
                  <form action="ip_locator.php" enctype="multipart/form-data" name="search_form" id="search_form" method="post">
                    <input type="text" value="" id="query" name="ip" /><input type="submit" value="GO" />
                  </form>
				  <p>
					Information is provided by <a href="http://www.ip2location.com/?rid=1094" target="_blank">IP2Location</a> Commercial version.
				  </p>
                  <ul>
                    <li>IP address : <strong>101.176.218.180</strong></li>
                    <li>Country : AU <img src="/img/flags/au.gif"/></li>
                    <li>State/Province : NEW SOUTH WALES</li>

                    <li>City : SYDNEY</li>

                    <li>Zip or postal code : 2000</li>
                    <li>Latitude : -33.86785</li>
                    <li>Longitude : 151.20732</li>
					<li>Weather : <a href="http://www.weatherdatasource.com/-33.86785/151.20732" target="_blank">View Weather</a></li>
                    <li>Timezone : +10:00</li>
                    <li>Local time : October 27 20:43:03</li>
                    <li>Hostname : cpe-101-176-218-180.nb02.dyn.asp.telstra.net</li>
                  </ul>
                  </ul>
				  Inaccurate result? Click <a href="report.php?ip=101.176.218.180">here</a> to report and we will fix it on next release.
                  <div id="map_canvas" style="width: 600px; height: 400px"></div>
                </div>
              </div>
          
            </div>
          
          </div>
      
        </div>

        <div class="right" id="sidebar_outer">

          <div id="sidebar"> 
          	           	
            <div class="box">
            	
              <div class="box_content" align="center">
					<div>
						<img src="img/ip2location-banner.jpg" alt="IP2Location" />
					</div>
					
					<div style="padding-top:10px;">
						<iframe src="http://tools.ip2location.com/ib2" width="204" height="162" marginwidth="1" scrolling="no" frameborder="0"></iframe>
					</div>            

					<div style="padding-top:10px;">
						<iframe src="ads.php" style="height: 200px; width: 200px; margin: 0px; padding: 0px;" scrolling="no" frameborder="0"></iframe>
					</div> 

					<div style="margin-top:10px;"><a href="https://chrome.google.com/webstore/detail/ip2location-ip-geolocatio/hkccjlilianihdjogdpflgmeegaomloj" target="_blank"><img alt="IP2Location Chrome Extension" src="/img/ip2location-chrome-extension.png" /></a></div>					
				</div>

			 </div>

          </div>

        </div>

        <div class="clearer">&nbsp;</div>

      </div>

    </div>
    </div>

    <div id="footer">

      <div class="left">
        &copy; 2014 www.ipinfodb.com
      </div>

      <div class="right">
        <a href="mailto:support@ipinfodb.com">support@ipinfodb.com</a>
      </div>


    </div>
   <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-11026515-16', 'auto');
	  ga('send', 'pageview');

	</script>
  </div>
  </div>
<a href="/important-notice.php" style="display:none;"> </a>
</body>
</html>
