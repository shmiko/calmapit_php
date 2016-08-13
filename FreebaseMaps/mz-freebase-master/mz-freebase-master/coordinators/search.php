<?php

class searchCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		
		$keyword = bp::request('q');
		$service = bp::request('service');
		$h->query($keyword, $service);
	}
	
}
?>
