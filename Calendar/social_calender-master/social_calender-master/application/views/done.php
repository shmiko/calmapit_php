<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1><?php
	if(isset($user_id))
	{
		echo "logged in with user_id = ".$user_id."";
		?>
		<div class="form-group">
                        <a class="a" href="<?php echo $this->config->base_url();?>index.php/following/extract_following">extract followings</a>
                        <br>
                         <a class="a" href="<?php echo $this->config->base_url();?>index.php/follower/extract_follower">extract followers</a>
                     	<a class="a" href="<?php $this->load->helper('url'); $segments = array('following', 'add_following', '123'); echo site_url($segments);?>">add followings</a>
                    </div><?php
	}
	else if(isset($arr)) {echo "Followings are :"; foreach($arr as $row)
	{
		echo $row->following_id."<br>";
        }
;}
else if(isset($newarr)) {echo "Followers are :"; foreach($newarr as $row)
	{
		echo $row->follower_id."<br>";
	}
;}
else {echo "Friends are :"; foreach($naarr as $row)
	{
		echo $row->friend_id."<br>";
	}
;}
?></h1>

	

</body>
</html>