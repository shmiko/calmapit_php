<?php

class navigatorCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();

		$h->run();
	}
	
}
?>
