<?php

class recommendatorHandler extends Handler {

	public function query($kw){
		$q = urlencode($kw);
		$output = array(
			'query'=>$kw,
			'result'=>array()
		);
		$url = 'https://ajax.googleapis.com/ajax/services/feed/find?v=1.0&q={KEYWORD}&key='.GOOGLE_API_KEY.'&userip='.bp::getClientIP();
		
		$query = str_replace('{KEYWORD}', $q, $url);

		$data = bp::pull($query);
		
		if(!!$data){
			$ob = json_decode($data);
			if(!!$ob){
				if(isset($ob->responseData)){
					$res = $ob->responseData;
					if(isset($res->entries) && is_array($res->entries) && count($res->entries)>0){
						foreach($res->entries as $entry){
							if(!!$entry->title){
								array_push($output['result'], array(
									'title'=>$entry->title,
									'description'=>$entry->contentSnippet,
									'link'=>$entry->link
								));
							}
						}
					}
				}
			}
		}
		
		$this->render(array(
			'type'=>'json',
			'data'=>$output
		));
	}
}

?>
