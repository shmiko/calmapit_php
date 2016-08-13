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
	<link rel="stylesheet" href="<?php echo BASE_PATH;?>assets/css/graph.css">
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bellaJS.min.js"></script>
  </head>
  <body> 
	<div id="status"></div>
	<div id="mz_schema"></div>
	<div id="dialog"></div>
	<script type="text/javascript">
		var _ZONES = <?php echo json_encode(bp::get('ZONES'));?>;
		var APP_INFO = <?php echo bp::get('APP');?>;
	</script>
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/sigma.min.js"></script>
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bj.sha512.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/libs/bj.dragger.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/app.js"></script>	
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/model/app.graph.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/view/app.graphView.js"></script>
	
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/template.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH;?>assets/js/graph.init.js"></script>
  </body>
</html>
