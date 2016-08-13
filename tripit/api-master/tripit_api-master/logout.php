<?php
session_start();
if (isset($_SESSION['mytripit'])):
	unset($_SESSION['mytripit']);
	header ('location: index.php');
	exit;
else:
	header ('location: index.php');
	exit;
endif;
?>