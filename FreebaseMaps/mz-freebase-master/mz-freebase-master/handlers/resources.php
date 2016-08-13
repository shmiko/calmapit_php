<?php

class resourcesHandler extends Handler {
	
	CONST TPL_IMG_PATH = 'http://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}_{size}.jpg';

	public function searchPhotos($kw, $service='', $type='html'){

		$output = array(
			'query'=>$kw,
			'result'=>array()
		);

		$services = array(1, 0, 0, 0, 0);
		
		if(!!$service){
			$services = explode(',', $service);
		}
		
		$google = $services[0];
		$bing = $services[1];
		$photobucket = $services[2];
		$flickr = $services[3];
		$wikipedia = $services[4];
		
		$num = 8;

		$query = '';
		
		if($google==1){
			$url = 'http://www.google.com/uds/GimageSearch?q={TEXT}&imgsz=small,medium,large,xlarge&key='.GOOGLE_API_KEY.'&v=1.0&rsz=large';
			
			$query = str_replace('{TEXT}', urlencode($kw), $url);
			
			$data = bp::pull($query);
			
			if(!!$data){
				$ob = json_decode($data);	
				if($type=='json'){
					bp::json(array(
						'keyword'=>$kw,
						'query'=>$query,
						'originalResponse'=>$ob
					));
				}				
				if(!!$ob && isset($ob->responseData) && isset($ob->responseData->results) && is_array($ob->responseData->results)){
					$list = $ob->responseData->results;
					$mmax = 0;
					foreach($list as $item){
						if($mmax<=$num){
							array_push($output['result'], array(
								'title'=>ucfirst($item->titleNoFormatting),
								'url'=>$item->url,
								'width'=>$item->width,
								'height'=>$item->height,
								'source'=>'google',
							));	
							$mmax++;
						}		
					}		
				}
			}
		}
		if($bing==1){
			$data = $this->getImageFromBing($kw, $num, $type);

			if(!!$data && isset($data['d']) && isset($data['d']['results'])){
				
				$list = $data['d']['results'];
				if(is_array($list) && count($list)>0){
					foreach($list as $item){
						$img = (object) $item;
						array_push($output['result'], array(
							'title'=>ucfirst($img->Title),
							'url'=>$img->MediaUrl,
							'width'=>$img->Width,
							'height'=>$img->Height,
							'source'=>'bing',
						));			
					}
				}
			}
		}
		if($photobucket==1){
			
			$url = 'http://feed.photobucket.com/images/{TEXT}/feed.rss';
			
			$query = str_replace('{TEXT}', urlencode($kw), $url);

			$data = bp::pull($query);
			
			$temp = json_encode(simplexml_load_string($data));

			if($type=='json'){
				bp::json(array(
					'keyword'=>$kw,
					'query'=>$query,
					'originalResponse'=>json_decode($temp)
				));
			}			
			$list = $this->parsePhotobucketRSS($temp);

			if(count($list)>0){
				$k = 0;
				foreach($list as $item){
					if($k<$num){
						$img = (object) $item;
						array_push($output['result'], array(
							'title'=>ucfirst($img->title),
							'url'=>$img->url,
							'width'=>0,
							'height'=>0,
							'source'=>'photobucket',
						));
						$k++;
					}
				}	
			}
		}				
		if($flickr==1){
			$url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key='.YAHOO_API_KEY.'&text={TEXT}&privacy_filter=1&content_type=1&sort=relevance&extras=original_format&format=json&nojsoncallback=1&page=1&per_page='.$num;
			
			$query = str_replace('{TEXT}', urlencode($kw), $url);

			$data = bp::pull($query);
					
			if(!!$data){
				$ob = json_decode($data);
				if($type=='json'){
					bp::json(array(
						'keyword'=>$kw,
						'query'=>$query,
						'originalResponse'=>$ob
					));
				}					
				if(!!$ob){					
					if(isset($ob->photos)){
						$res = (object) $ob->photos;
						if(isset($res->photo)){
							$list = $res->photo;
							if(is_array($list) && count($list)>0){
								foreach($list as $entry){
									if(!!$entry->title){
										$path = $this->convertPath($entry);
										if(!!$path){
											$src = $this->toFlickrPath($path, 'b');
											$size = $this->getImageSize($src);
											if(!!$size){
												array_push($output['result'], array(
													'title'=>ucfirst($entry->title),
													'url'=>$src,
													'width'=>$size->width,
													'height'=>$size->height,
													'source'=>'flickr',
												));
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		if($wikipedia==1){
			
			$url = 'http://en.wikipedia.org/w/api.php?action=query&list=allimages&ailimit='.$num.'&aifrom={TEXT}&format=json';
			
			$query = str_replace('{TEXT}', urlencode($kw), $url);
			
			$data = bp::pull($query);

			if(!!$data){
				$ob = json_decode($data);
				if($type=='json'){
					bp::json(array(
						'keyword'=>$kw,
						'query'=>$query,
						'originalResponse'=>$ob
					));
				}					
				if(!!$ob && property_exists($ob, 'query')){
					if(property_exists($ob->query, 'allimages')){
						$images = $ob->query->allimages;
						if(is_array($images) && count($images)>0){
							foreach($images as $item){
								$src = $item->url;
								$size = $this->getImageSize($src);
								if(!!$size){
									array_push($output['result'], array(
										'title'=>$item->name,
										'url'=>$src,
										'width'=>$size->width,
										'height'=>$size->height,
										'source'=>'wikipedia',
									));	
								}		
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
	
	private function parsePhotobucketRSS($str){
		$res = array();
		$ob = json_decode($str);
		if(!!$ob && isset($ob->channel)){
			$channel = $ob->channel;
			if(property_exists($channel, 'item')){
				$list = $channel->item;
				if(is_array($list) && count($list)>0){
					foreach($list as $item){
						array_push($res, array(
							'url'=>$item->guid,
							'title'=>$item->title
						));
					}
				}
			}
		}
		return $res;
	}
	
	private function convertPath($pic){
		$p = self::TPL_IMG_PATH;
		$r = '';
		if(isset($pic->farm)){
			$p = str_replace('{farm-id}', $pic->farm, $p);
			if(isset($pic->server)){
				$p = str_replace('{server-id}', $pic->server, $p);
				if(isset($pic->id)){
					$p = str_replace('{id}', $pic->id, $p);
					if(isset($pic->secret)){
						$p = str_replace('{secret}', $pic->secret, $p);
						$r = $p;
					}					
				}				
			}			
		}
		return $r;
	}
	
	private function getImageSize($path){
		$r = array(
			'width'=>0,
			'height'=>0,
		);
		return (object) $r;
	}
	
	private function toFlickrPath($path, $size='q'){
		return str_replace('{size}', $size, $path);
	}
	
	private function getImageFromBing($kw, $count=4, $output=false){
		
		$context = stream_context_create(array(
			'http' => array(
			  'request_fulluri' => true,       
			  'header'  => "Authorization: Basic " . base64_encode(BING_API_KEY . ":" . BING_API_KEY)
			) 
		)); 

		$ServiceRootURL =  'https://api.datamarket.azure.com/Bing/Search/v1/Image?';
		$WebSearchURL = $ServiceRootURL . '$format=json&Query=';  

		$request = $WebSearchURL.urlencode("'$kw'");
		if($count){
			$request .= "&\$top=$count";
		}
		$data = json_decode(file_get_contents($request, 0, $context), true);
		if($output=='json'){
			bp::json(array(
				'keyword'=>$kw,
				'query'=>$request,
				'originalResponse'=>$data
			));
		}
		else{
			return $data;
		}	
	}
}

?>
