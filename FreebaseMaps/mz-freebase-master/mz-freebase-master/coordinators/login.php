<?php

class loginCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		$key = bp::request('key');
		$h->run($key);
	}
	
}
?>
