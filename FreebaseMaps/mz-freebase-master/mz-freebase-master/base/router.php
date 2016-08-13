<?php
/**
 * Router class
 */
class Router{
	
	private $path;
	private $queries;
	
	function __construct(){
		// move path info into context storage
		$path = $GLOBALS['BP_PATH'];
		$a = explode('/',$path);
		array_shift($a);
		$t = array();
		for($i=0;$i<count($a);$i++){
			if('/'.$a[$i].'/'!==BASE_PATH){
				array_push($t, $a[$i]);
			}
		}		
		while(count($t)<7){
			array_push($t, '');
		}
		bp::set('PATH', $t);
		// move all of request parametters into context storage
		bp::set('QUERYDATA', json_decode(json_encode($GLOBALS['BP_REQUEST'])));		
		$this->path = bp::path();
		$this->queries = bp::get('QUERYDATA');
	}
	public function parse(){
		$p = $this->path;
		$user = (object) bp::getSession('user');
		if(!$user || !isset($user->username)){
			$_user = array(
				'username'=>'',
				'password'=>'',
				'ascope'=>0,
			);	
			$user = (object) $_user;
		}
		bp::set('user', $user);	

		if(!$p[0]){
			$p[0] = 'index';
		}

		if($p[0]!=''){
			$f = 'coordinators'.DS.$p[0].'.php';
			if(file_exists($f)){
				return bp::callCoordinator($p[0], 'parse');
			}
		}
		return bp::end();
	}
}
?>
