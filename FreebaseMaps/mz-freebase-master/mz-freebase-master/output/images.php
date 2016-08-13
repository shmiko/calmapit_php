<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Myzone demo : Images</title>
	<link rel="icon" href="favicon.ico" sizes="24x24">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/base.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/amazium.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/default.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/images.css">
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bellaJS.min.js"></script>
  </head>
  <body> 
	<div id="status"></div>
	<div id="main">
	<div class="row">
		<div class="grid_2">
			<div class="site-logo">
				<h2>LOGO</h2>
			</div>
		</div>		
		<div class="grid_10">
			<div class="search-box">
				<form name="mz_form_search" id="mz_form_search">
					<input class="mz-input" type="text" name="q" id="mz_input_keyword" placeholder="Enter anything..." value="">
					<button id="mz_button_search" class="ui-button">Search</button>
				</form>
			</div>
			<div class="service-opts">
				<label><input type="checkbox" id="sv_google" value="g">Google</label>
				<label><input type="checkbox" id="sv_bing" value="b">Bing</label>
				<label><input type="checkbox" id="sv_photobucket" value="P">Photobucket</label>
				<label><input type="checkbox" id="sv_flickr" value="f">Flickr</label>
				<label><input type="checkbox" id="sv_wikipedia" value="w">Wikipedia</label>
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="grid_12 outer-block">			
			<div id="result">
				<div class="sv" id="s_google">
					<label>Google (<a id="res_google" target="_blank" href="">View original response</a>)</label>
					<ul id="img_google"></ul>
				</div>
				<div class="sv" id="s_bing">
					<label>Bing (<a id="res_bing" target="_blank" href="">View original response</a>)</label>
					<ul id="img_bing"></ul>
				</div>
				<div class="sv" id="s_photobucket">
					<label>Photobucket (<a id="res_photobucket" target="_blank" href="">View original response</a>)</label>
					<ul id="img_photobucket"></ul>
				</div>
				<div class="sv" id="s_flickr">
					<label>Flickr (<a id="res_flickr" target="_blank" href="">View original response</a>)</label>
					<ul id="img_flickr"></ul>
				</div>
				<div class="sv" id="s_wikipedia">
					<label>Wikipedia (<a id="res_wikipedia" target="_blank" href="">View original response</a>)</label>
					<ul id="img_wikipedia"></ul>
				</div>															
			</div>
		</div>							
	</div>		
	<div class="row">
		<div class="grid_10">
			<div class="footer">
				&copy;2013 Myzone
			</div>
		</div>
	</div>
	<div id="dialog"></div>
	<script type="text/javascript">
		var _ZONES = <?php echo json_encode(bp::get('ZONES'));?>;
	</script>
	<script type="text/javascript">var APP_INFO = <?php echo bp::get('APP');?>;</script>
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/jit.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bj.sha512.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bj.dragger.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/prettyPrint.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/app.js"></script>	
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/model/app.image.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/view/app.imageView.js"></script>
		
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/image.init.js"></script>
	
  </body>
</html>
