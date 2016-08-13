<?php

class schemaHandler extends Handler {
	
	public function run(){
		$z = mzquery::getZones();
		bp::set('ZONES', $z);
		$this->render();
	}
	public function getTypes($zid){
		$z = mzquery::getTypes($zid);
		bp::json($z);
	}
	public function getTypeInfo($tid){
		$a = array(
			'properties'=>array(),
			'included_types'=>array(),		
		);
		$z = mzquery::getTypeInfo($tid);
		if(!!$z){
			$a = array(
				'properties'=>$z->properties,
				'included_types'=>$z->included_types,
			);
		}
		bp::json($a);		
	}
	// unused method
	private function _crawl($path=''){
		$url = 'http://10.0.0.35/yii/test/myzone/site/view/?path={PATH}&output=json';
		$query = str_replace('{PATH}', $path, $url);
		$txt = bp::pull($query);
		$ob = json_decode($txt);
		$res = array(
			'properties'=>array(),
			'included_types'=>array(),
		);
		if(isset($ob->properties)){
			forEach($ob->properties as $item){
				if(!$item->description){
					$item->description = '';
				}
				array_push($res['properties'], $item);
			}
		}
		if(isset($ob->included_types)){
			$res['included_types'] = $ob->included_types;
		}
		return json_encode($res);
	}
}

?>
