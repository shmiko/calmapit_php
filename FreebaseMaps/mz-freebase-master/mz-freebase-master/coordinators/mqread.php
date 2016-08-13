<?php

class mqreadCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		
		$action = bp::request('action');
		$keyword = bp::request('q');
		$level = bp::request('lv');
		$h->query($action, $keyword, $level);
	}
	
}
?>
