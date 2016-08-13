<?php

class mzquery {
	private static function getData(){
		$temp = bp::getFile('res/data/schema.mz');
		$ob = json_decode($temp);
		return $ob;
	}
	public static function getZones(){
		$arr = self::getData();
		$res = array();
		foreach($arr as $item){
			if($item->group == 'zone'){
				array_push($res, $item);
			}
		}
		return $res;
	}
	public static function getTypes($zone=''){
		$arr = self::getData();
		$res = array();
		foreach($arr as $item){
			if($item->group == 'type' && $item->relation==$zone){
				array_push($res, $item);
			}
		}
		return $res;
	}	
	public static function getTypeInfo($type=''){
		$path = 'res/data/extends/{TYPE}.txt';
		if(!!$type){
			$file = str_replace('{TYPE}', $type, $path);
			$res = bp::getFile($file);
			return json_decode($res);
		}
		return false;
	}	
}
?>
