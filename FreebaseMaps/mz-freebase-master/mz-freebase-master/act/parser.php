<?php
class Parser{
	public static function init(){
		$p = bj::path();
		if(!!$p[1]){
			$f = $p[1].'.php';
			if(file_exists($f)){
				include $f;
				return true;
			}		
		}
		return bj::json(array(
			'error'=>'Request action is not defined.',
			'timestamp'=>time()
		));
	}
}
Parser::init();
?>
