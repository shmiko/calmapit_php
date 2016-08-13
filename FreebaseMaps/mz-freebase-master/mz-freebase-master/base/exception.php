<?php
/**
 * exception.php, ouput error info in specified format
 * Written by Dong Nguyen <ndaidong@gmail.com>
 * Copyright(c) 2012, bjTech
*/
class BPException extends Exception {
	
    public function __construct($code = 'E0000', $message = 'Unknown exception', $output = 'json'){
        if($output == 'json'){
			header('content-type:text/javascript;charset=utf-8');
			$out = array(
				'error' => array(
					'code' => $code,
					'message' => $message
				)
			);			
			echo json_encode($out);
		}
        else if($output == 'xml'){
			header('content-type:text/xml;charset=utf-8');
			echo '<?xml version="1.0"?><error><code>'.$code.'</code><message>'.htmlentities($message).'</message></error>';
		}
		exit;
    }
    
}
?>
