<?php

class mqreadHandler extends Handler {

	public function query($act='query', $kw, $lv){

		$q = urlencode($kw);
		$output = array(
			'query'=>$kw,
			'result'=>array()
		);

		$url1 = 'https://www.googleapis.com/freebase/v1/mqlread?query={QUERY}&';
		$url2 = 'https://www.googleapis.com/freebase/v1/search?type={QUERY}&limit=50&';
		$url3 = 'https://www.googleapis.com/freebase/v1/text{QUERY}?';
		$url4 = 'https://www.googleapis.com/freebase/v1/search?query={QUERY}&limit=20&';
		
		$query = '';
		
		if($act=='search'){
			$query = str_replace('{QUERY}', $q, $url4);
		}
		else{
			if($lv==1){
				$query = str_replace('{QUERY}', $q, $url1);
			}
			else if($lv==2){
				$query = str_replace('{QUERY}', $q, $url2);
			}
			else if($lv==3){
				$query = str_replace('{QUERY}', $kw, $url3);
			}
		}
				
		$query.='key='.GOOGLE_API_KEY.'&userip='.bp::getClientIP();

		$data = bp::pull($query);
		
		if(!!$data){
			$ob = json_decode($data);
			if(!!$ob && !!$ob->result){
				if($act=='search'){
					$ob->result = $this->collectZones($ob->result);				
				}
				$output['result'] = $ob->result;
			}
		}
		
		$this->render(array(
			'type'=>'json',
			'data'=>$output
		));
	}
	
	private function collectZones($arr){
		$res = array();
		$slt = array();
		$zs = array();
		$zones = mzquery::getZones();
		if(!!$zones){
			foreach($arr as $item){
				if(property_exists($item, 'notable')){
					$nob = $item->notable;
					$nid = $nob->id;
					$anid = explode('/', $nid);
					if(count($anid)>2){
						$zid = '/'.$anid[1];
						for($i=0;$i<count($zones);$i++){
							if($zones[$i]->id == $zid){
								array_push($slt, $zid);
							}
						}
					}
				}
			}
		}
		$slt = array_unique($slt);
		
		foreach($slt as $item){
			for($i=0;$i<count($zones);$i++){
				if($zones[$i]->id == $item){
					$zones[$i]->children = array();
					array_push($zs, $zones[$i]);
					break;
				}
			}			
		}
		
		if(count($zs)>0){	
			foreach($zs as $zone){
				foreach($arr as $ob){
					if(property_exists($ob, 'notable')){
						$temp = $ob->notable;
						if(strpos($temp->id, $zone->id)===0 && count($zone->children)==0){
							$temp->children = array();
							array_push($zone->children, $temp);
						}
					}
				}
			}
				
			$fisrt = $zs[0];
			foreach($arr as $ob){
				if(property_exists($ob, 'notable') && $ob->notable->id===$fisrt->children[0]->id){
					$tmp = array(
						'mid'=> $ob->mid,
						'id'=> $ob->id,
						'name'=> $ob->name,
						'score'=> $ob->score				
					);
					array_push($zs[0]->children[0]->children, $tmp);
				}
			}
		}
		return $zs;	
	}
}

?>
