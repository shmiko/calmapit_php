<?php

class resourcesCoordinator extends Coordinator {
	
	public function parse(){

		$this->setAccessibleScope(0);// allows guest
		
		$h = $this->loadHandler();
		
		$type = bp::request('t');
		$keyword = bp::request('q');
		$service = bp::request('s');
		$output = bp::request('o');
		
		if($type=='images'){
			if(!!$keyword){
				return $h->searchPhotos($keyword, $service, $output);
			}
		}
		return bp::end();
	}
	
}
?>
