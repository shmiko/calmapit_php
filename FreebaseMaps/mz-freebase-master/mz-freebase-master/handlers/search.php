<?php

class searchHandler extends Handler {
	
	private function getImageFromFreebase($id){
		$url_get_image = 'https://usercontent.googleapis.com/freebase/v1/image/{ID}?maxheight=600&maxwidth=800&mode=fit&key='.GOOGLE_API_KEY;
		$file = str_replace('{ID}', urlencode($id), $url_get_image);
		
		$img = getimagesize($file);
		if(!!$img && isset($img['mime']) && (strpos($img['mime'], 'image/')!==-1) && $this->isNoImage($img)){
			return array(
				'url'=>$file,
				'width'=>$img[0],
				'height'=>$img[1]
			);
		}
		return false;
	}
	
	private function isNoImage($img){
		$img1 = getimagesize(realpath('res/files/samples/no-image.png'));
		$w = $img1[0];
		$h = $img1[1];
		$m = $img1['mime'];
		$b = $img1['bits'];
		if($img['mime']==$m && $img[0]==$w && $img[1]==$h && $img['bits']==$b){
            return false;			
		}
		return true;
	}
	
	private function getDataFromFreebase($kw){
		$url_search = 'https://www.googleapis.com/freebase/v1/search?query={KEYWORD}&limit=50&key='.GOOGLE_API_KEY;
		$url_get_text = 'https://www.googleapis.com/freebase/v1/text/{ID}?key='.GOOGLE_API_KEY;
			
		$search_query = str_replace('{KEYWORD}', urlencode($kw), $url_search);
		
		$output = array(
			'query'=>$kw,
			'definition'=>array(
				'name'=>'',
				'text'=>'',
				'images'=>array(),
			),			
			'result'=>array(),
		);
		
		$result = bp::pull($search_query);
		
		if(!!$result){
			$temp = json_decode($result);
			if(!!$temp){
				if($temp->status==200){
					$arr = $temp->result;
					if(is_array($arr) && count($arr)>0){
						$images = array();
						$hasDefinition = false;
						for($i=0;$i<count($arr);$i++){
							$item = (array) $arr[$i];
							if(!!$item['name']){
								$item['description'] = '';
								$text_query = str_replace('{ID}', $item['mid'], $url_get_text);
								$item['link'] = $text_query;
								$text = bp::pull($text_query);
								$image = $this->getImageFromFreebase($item['mid']);
								if(!!$image){
									array_push($output['definition']['images'], $image);
								}
								if(!!$text){
									$_text = json_decode($text);
									if(!!$_text && !isset($_text->error)){
										$item['description'] = $_text->result;
									}
								}
								if(!$hasDefinition && $kw == $item['name']){
									$output['definition']['name'] = $item['name'];
									$output['definition']['text'] = $item['description'];
									$hasDefinition = true;
								}
								else{
									array_push($output['result'], $item);
								}
								if(count($output['result'])>10){
									break;
								}
							}
						}
					}
				}
			}
		}
		return json_encode($output);	
	}
	
	private function getDataFromWikipedia($kw){
		$url = 'http://en.wikipedia.org/w/api.php?action=query&list=search&format=json&srsearch='.urlencode($kw);
		$result = bp::pull($url);
		return $result;
	}
	
	public function query($kw, $s='freebase'){
		$q = $kw;
		if($s=='freebase'){
			$result = $this->getDataFromFreebase($q);
		}
		else{
			$result = $this->getDataFromWikipedia($q);
		}
		$this->render(array(
			'type'=>'json',
			'data'=>json_decode($result)
		));
	}
}

?>
