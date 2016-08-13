<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Myzone demo</title>
	<link rel="icon" href="favicon.ico" sizes="24x24">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/base.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/amazium.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/default.css">
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
					<input class="mz-input" type="text" name="q" id="mz_input_keyword" placeholder="What do you want to define?" value="">
					<button id="mz_button_search" class="ui-button">Search</button>
				</form>
			</div>
		</div>
	</div>		
		<div class="row">
			<div class="grid_12 outer-block center-panel">			
				<div id="mz_navigator"></div>		
			</div>	
		</div>		
		<div class="row">
			<div class="grid_10">
				<div class="footer">
					&copy;2013 Myzone
				</div>
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
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/app.js"></script>	
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/model/app.navigator.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/view/app.navigatorView.js"></script>
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/template.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/init.js"></script>
  </body>
</html>
