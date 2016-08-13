<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Security</title>
	<link rel="icon" href="favicon.ico" sizes="24x24">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/base.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/amazium.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/libs/jquery-ui.css">	
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/default.css">
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/underscore-min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/backbone-min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bellaJS.min.js"></script>
  </head>
  <body> 
	<div id="status"></div>
	<div class="row">
		<div class="grid_6">
			<div class="content-block">
				<?php echo bp::getSession('message');?>
				<form action="<?php echo BASE_PATH;?>login?open" method="post">
					<input type="password" id="mz_key" name="key" value="">
					<button>Open</button>
				</form>
			</div>
		</div>
	</div>	
	<script type="text/javascript">
		bj.setOnloadCallback(function(){
			bj.element('mz_key').focus();
		});
	</script>	
  </body>
</html>
