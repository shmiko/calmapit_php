<?php

class recommendatorCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		
		$keyword = bp::request('q');
		$h->query($keyword);
	}
	
}
?>
