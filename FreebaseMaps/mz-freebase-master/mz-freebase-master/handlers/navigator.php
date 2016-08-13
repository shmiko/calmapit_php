<?php

class navigatorHandler extends Handler {
	
	public function run(){
		$z = mzquery::getZones();
		$arr = array();
		if(!!$z && is_array($z)){
			$rands = array_rand($z, 12);
			foreach($rands as $item){
				array_push($arr, $z[$item]);
			}
		}
		//bp::json($arr);
		bp::set('ZONES', $arr);
		$this->render();
	}
}

?>
