<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html itemscope itemtype="http://schema.org/Product">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="description" content="Display my IP address location"/>
  <meta name="keywords" content="my ip, my ip location" />
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
  <title>My IP location</title>
  <link rel="alternate" type="application/rss+xml" title="IPInfoDB RSS" href="http://ipinfodb.com/rss.xml" />
  <script language="JavaScript" src="http://code.google.com/apis/gears/gears_init.js"></script>
  <script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js"></script>
  <script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.3/scriptaculous.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <script  type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAySFuY6iCq7YsTnznHfs84BTjC_OfEfDBWmzOMAAbQLGAGqHFmBSbKtHE-L2RYuaGFri6ZBGD00jm9w"></script>
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

<body onload="showMap(-33.86785,151.20732)" onunload="GUnload()" id="top">
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
				<ul id="social_btn" style="padding-top:44px;">
					<li>
						<div id="fb-root" ></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like" data-href="http://www.facebook.com/IPGeolocation" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
					</li>
					<li>
						<a href="http://twitter.com/share" data-url="http://www.ipinfodb.com" data-counturl="http://www.ipinfodb.com" data-text="IPInfoDB | Free IP Address Geolocation Tools" class="twitter-share-button" data-count="none" data-via=""></a>
						<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					</li>
					<li>
						<!-- Place this tag where you want the +1 button to render -->
						<g:plusone size="medium" annotation="none" href="http://www.ipinfodb.com"></g:plusone>

						<!-- Place this render call where appropriate -->
						<script type="text/javascript">
						  (function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/plusone.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						  })();
						</script>
					</li>
					<li>
						<!-- Place this tag where you want the su badge to render -->
						<su:badge layout="4"></su:badge>

						<!-- Place this snippet wherever appropriate -->
						 <script type="text/javascript">
						 (function() {
							 var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
							  li.src = 'https://platform.stumbleupon.com/1/widgets.js';
							  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
						 })();
						 </script>
					</li>
				</ul>
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
            <li><a href="index.php">Home</a></li>
            <li class="current_page_item"><a href="my_ip_location.php">My IP location</a></li>
            <li><a href="ip_locator.php">IP locator</a></li>
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
                  <h5>Your IP address information</h5>
				  <br>Information is provided by <a href="http://www.ip2location.com/?rid=1094" target="_blank">IP2Location</a> Commercial version.<br>
                  <ul>
                    <li>IP address : <strong>101.176.218.180</strong></li>
                    <li>Country : AUSTRALIA <img src="/img/flags/au.gif"/></li>
                    <li>State/Province : NEW SOUTH WALES</li>

                    <li>City : SYDNEY</li>

                    <li>Zip or postal code : 2000</li>
                    <li>Latitude : -33.86785</li>
                    <li>Longitude : 151.20732</li>
                    <li>Hostname : cpe-101-176-218-180.nb02.dyn.asp.telstra.net</li>
                  </ul>
				  Inaccurate result? Click <a href="report.php?ip=101.176.218.180">here</a> to report and we will fix it on next release.
                </div>
                <div id="map_canvas" style="width: 600px; height: 400px"></div>

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
