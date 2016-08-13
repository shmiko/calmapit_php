<?php
require_once '../base/config.php';
require_once '../base/init.php';
require_once '../base/bellaPHP.php';
require_once '../base/libs/SimpleImage.php';

function getIcon(){
	$f = isset($_GET['f'])?$_GET['f']:false;
	header('content-type:image/x-icon');
	$data = false;
	$md5 = '';
	if(!!$f){
		$md5 = '../'.CACHE_FAVICON_DIR.md5($f);
		if(file_exists($md5)){
			$data = bp::getFile($md5);
		}
		else{
			$type = bp::getType($f);
			if($type==='image/x-icon'){
				$data = bp::pull($f);
				bp::writeFile($md5, $data);
				if(file_exists($md5)){
					$si = new SimpleImage();
					$si->load($md5);
					$w = $si->getWidth();
					$h = $si->getWidth();
					if($w>16||$h>16){
						$si->fillTo(16, 16);
					}
					$si->save($md5);
					$data = bp::getFile($md5);
				}
			}
		}
	}
	if(!$data){
		$data = bp::getFile('../favicon.ico');
		if(!!$md5){
			bp::writeFile($md5, $data);
		}
	}
	echo $data;
}
getIcon();
?>
