<?php

class indexCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		
		$zone_id = bp::request('z');
		$type_id = bp::request('t');
		if(!!$zone_id){
			return $h->getTypes($zone_id);
		}
		else if(!!$type_id){
			return $h->getTypeInfo($type_id);
		}		
		$h->run();
	}
	
}
?>
