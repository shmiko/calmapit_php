<?php
/**
 * bellaPHP.php, define main static class on server side
 * Written by Dong Nguyen <ndaidong@gmail.com>
 * Copyright(c) 2012, bjTech
*/
class bp {
	
	private static $storage = array();	
	private static $connection	=	null;
	
	/**
	 * public method to get values from $_POST or $_GET
	*/
	public static function request($key){
		$qdata = self::get('QUERYDATA');
		if(isset($qdata->$key)){
			return $qdata->$key;
		}
		return '';
	}
	public static function path(){
		return self::get('PATH');	
	}	
	
	// context storage
	public static function set($key, $value){
		self::$storage[$key] = $value;
	}
	public static function get($key){
		$t = self::$storage;
		if(array_key_exists($key, $t)){
			return $t[$key];
		}
		return false;
	}	
	public static function remove($key){
		if(array_key_exists($key, self::$storage)){
			unset(self::$storage[$key]);
			return count(self::$storage);
		}
		return false;
	}
	public static function getStorage(){
		return self::$storage;
	}	

	// cache
	private static function deleteCache($c){
		$file = CACHE_DIR.md5($c).'.ewds';
		return unlink($file);
	}
	private static function setCache($c, $data){
		if(!file_exists(CACHE_DIR)){
			@mkdir(CACHE_DIR, 0777);
		}
		$file = CACHE_DIR.md5($c).'.ewds';
		return self::writeFile($file, $data);
	}
	private static function getCache($c){
		$file = CACHE_DIR.md5($c).'.ewds';
		if(file_exists($file) && ((time() - filemtime($file))< CACHE_LIVE_TIME*60*1000)){
			return self::getFile($file);
		}
		return false;
	}
	
	// local files
	public static function writeFile($file, $data){
		if($f = @fopen($file,'wb')){
			fwrite($f, $data, 518000); 
			fclose($f);
			return true;
		}
		return false;
	}
	public static function getFile($file){
		if(file_exists($file)){
			if($s = @file_get_contents($file)){
				return $s;
			}
		}
		return false;
	}	
	public static function delFile($file){
		if(file_exists($file)){
			return unlink($file);
		}
		return false;
	}
	
	// remote files
	public static function getType($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		return curl_getinfo($ch, CURLINFO_CONTENT_TYPE);		
	}	
	public static function pull($url, $typeOnly=false){
      $s = '';
      $fc = false;
		if(ENABLE_CACHING){
			$s = self::getCache($url);
			$fc = true;
		}
		if(!$s){
			if(function_exists('curl_init')){	
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_USERAGENT, APP_NAME.'/'.APP_VERSION.' (+http://'.APP_DOMAIN.')');
				$type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
				$s = curl_exec($ch);
				curl_close($ch);
				if(!!$typeOnly){
					return $type;
				}
			}
			else if(!$typeOnly && ini_get('allow_url_fopen') == '1'){
			  @$data = file_get_contents($url);
				if($data){$s = $data;}
			}
			else{
				trigger_error('Error : Cound not retrieve data from '.$url);	
			}
		}
		if(!$fc && $s!='' && ENABLE_CACHING){
			self::setCache($url, $s);
		}
	  return $s;   
	}
	public static function push($url, $data, $encode = true){
		$s = (is_string($data)||!$encode)?$data:json_encode($data);
		if(function_exists('curl_init')){
			$ch = curl_init($url);                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $s);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, APP_NAME.'/'.APP_VERSION.' (+http://'.APP_DOMAIN.')');                                                                                                                                                                                   
			$result = curl_exec($ch);
			curl_close($ch);		
		}
		else{
			$result = file_get_contents($url, null, stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => 'Content-Type: application/json'."\r\n".'Content-Length: '.strlen($s)."\r\n",
					'content' => $s,
				),
			)));			
		}
		return $result;
	}
		
	// mysql
	public static function connect(){
		if(!self::$connection){
			$c = @mysql_connect(DB_HOST, DB_USER, DB_PASS);
			if(!$c){
				trigger_error('Error : Connection failed : '.mysql_error());	
			}
			if(!mysql_select_db(DB_NAME, $c)){
				trigger_error('Error : Selection database failed : '.mysql_error());				
			}
			self::$connection = $c;
		}
	}
	public static function query($sql, $params = false, $closing = true){
		if(is_string($params)){
			$params = self::escape($params);
		}
		else if(is_array($params)){
			for($i=0;$i<count($params);$i++){
			  $params[$i] = self::escape($params[$i]);
			}
		}		
		$t = trim($sql);
		if(!!$params){
			$sql = vsprintf(str_replace("?","'%s'",$t), $params);
		}
		self::connect();
		if(stripos($sql, 'select')===0){
			$r = array();
			if($data = mysql_query($sql, self::$connection)){
				if(mysql_num_rows($data)>0){
					mysql_data_seek($data, 0);
					while($row = mysql_fetch_assoc($data)){
						foreach($row as $key => $val){
							$row[$key] = self::unescape($val);
						}
						array_push($r, $row);
					}
				}
				mysql_free_result($data);
			}
			else{
				trigger_error('Invalid query: ' .mysql_error()."\n\n".$sql);
			}
		}
		else{
			$r = false;
			if(mysql_query($sql, self::$connection)){
				$r = true;
			}
			else{
				trigger_error('Invalid query: ' .mysql_error()."\n\n".$sql);
			}			
		}
		if($closing){
			self::disconnect();
		}
		return $r;
	}
	public static function disconnect(){
	  if(self::$connection){
		mysql_close(self::$connection);
		self::$connection = null;
	  }
	}
	
	// session 
	public static function removeSession($name){
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		}
	}
    public static function setSession($name, $value){
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		}
		$_SESSION[$name] = $value;
    }	
    public static function getSession($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		return '';
    } 
    
	// cookies 
    public static function setCookie($name, $value){
        $_COOKIE[$name] = $value; 
        return setcookie($name, $value, 0, COOKIE_PATH); 
    } 
    public static function getCookie($name){
		return $_COOKIE[$name];
    }     
    public static function removeCookie($name){ 
        unset($_COOKIE[$name]);
        return setcookie($name, NULL, -1);
    }
	
	public static function date($t = false){
		return date(DATE_FORMAT, !!$t?$t:time());
	}	
	
	public static function URL(){
		return 'http://'.apache_getenv("HTTP_HOST").apache_getenv("REQUEST_URI");
	}
	
	public static function genid($len=16, $prefix='', $withUnderscore=false){
		$base = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ9876543210'.($withUnderscore?'_':'').'abcdefghijklmnopqrstuvwxyz';
		$max = strlen($base)-1;
		$s = '';
		mt_srand((double)microtime()*1000000);
			while(strlen($s)<$len-strlen($prefix)){
				$s.=$base{mt_rand(0,$max)};
			}
		return $prefix.$s;
	}
	
	// method to encrypt password
	public static function encrypt($str){
		if(!!$str && is_string($str)){
			return sha1(md5($str));
		}
		return false;
	}
	
	// string handle
	public static function escape($str){
		return str_replace(
			array("\\","\0","\n","\r","\x1a","'",'"'),
			array("\\\\","\\0","\\n","\\r","\Z","\'",'\"'),
			$str
		);
	}		
	public static function unescape($str){
		return str_replace(
			array("\\\\","\\0","\\n","\\r","\Z","\'",'\"'),
			array("\\","\0","\n","\r","\x1a","'",'"'),
			$str
		);
	}	
	public static function fill($s){
		return str_replace(array("\r", "\n","\r\n", "\t"),'',$s);
	}
	public static function enc($s){
		return EW::escape(htmlspecialchars($s));
	}
	public static function getClientIP(){
		if(getenv('HTTP_X_FORWARDED_FOR')){
			return getenv('HTTP_X_FORWARDED_FOR');
		}
		else if(getenv('HTTP_CLIENT_IP')){
			return getenv('HTTP_CLIENT_IP');
		}		
		else {
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				return $_SERVER["HTTP_X_FORWARDED_FOR"];
			}
			if (isset($_SERVER["HTTP_CLIENT_IP"])){
				return $_SERVER["HTTP_CLIENT_IP"];
			}
			return $_SERVER["REMOTE_ADDR"];
		}
	}
	public static function getClientBrowser(){
		return $_SERVER['HTTP_USER_AGENT'];
	}
	public static function getReferer(){
		if($_SERVER['HTTP_REFERER']){
			return $_SERVER['HTTP_REFERER'];
		}
		else{
			return '';
		}
	}	
		
	/**
	 * Validate an email address. 
	 * Provide email address (raw input)
	 * Returns true if the email address has the email address format and the domain exists.
	**/
	public static function validEmail($email){
	   $isValid = true;
	   $atIndex = strrpos($email, "@");
	   if (is_bool($atIndex) && !$atIndex){
		  $isValid = false;
	   }
	   else{
		  $domain = substr($email, $atIndex+1);
		  $local = substr($email, 0, $atIndex);
		  $localLen = strlen($local);
		  $domainLen = strlen($domain);
		  if($localLen < 1 || $localLen > 64){
			 // local part length exceeded
			 $isValid = false;
		  }
		  else if($domainLen < 1 || $domainLen > 255){
			 // domain part length exceeded
			 $isValid = false;
		  }
		  else if($local[0] == '.' || $local[$localLen-1] == '.'){
			 // local part starts or ends with '.'
			 $isValid = false;
		  }
		  else if(preg_match('/\\.\\./', $local)){
			 // local part has two consecutive dots
			 $isValid = false;
		  }
		  else if(!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)){
			 // character not valid in domain part
			 $isValid = false;
		  }
		  else if(preg_match('/\\.\\./', $domain)){
			 // domain part has two consecutive dots
			 $isValid = false;
		  }
		  else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))){
			 // character not valid in local part unless 
			 // local part is quoted
			 if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))){
				$isValid = false;
			 }
		  }
		  if($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))){
			 // domain not found in DNS
			 $isValid = false;
		  }
	   }
	   return $isValid;
	}	
	/**
	 *  Above function was copied from http://www.linuxjournal.com/article/9585
	**/
	
	public static function json($s, $end=true){
		error_reporting(0);
		ob_start();
		header('content-type:text/javascript;charset=utf-8');
		header('connection: close');
		echo self::fill(json_encode($s));
		@ob_flush();
		@ob_end_flush();
		@flush();
		if(!!$end){exit();}	
	}		
		
	public static function redirect($u){
		if(!$u){
			$u='/';
		}
		header("location:$u");
	}	
	public static function end(){
		$p 	 = self::path();
		
		$arr = array();
		foreach($p as $item){
			if($item!=''){
				array_push($arr, $item);
			}
		}
		$url = implode('/',$arr);
		$MSG_404 = 'The requested URL <span class="path">/'.$url .'</span> was not found on this server.';
		require('errors/404.php');	
		exit;	
	}

	public static function callCoordinator($c, $m = 'parse'){
		$ctrl = false;
		$f = 'coordinators'.DS.$c.'.php';
		if(file_exists($f)){
			include $f;
			$class = $c.'Coordinator';
			$ctrl = new $class;
			$ctrl->setName($c);
			if($m){
				if(method_exists($ctrl, $m)){
					$ctrl->$m();
				}	
				else{
					trigger_error("Error : Called class or method is undefined.", E_USER_ERROR);
				}		
			}
		}
		return $ctrl;
	}
	public static function callHandler($h){
		$hdl = false;
		$f = 'handlers'.DS.$h.'.php';
		if(file_exists($f)){
			include $f;
			$class = $h.'Handler';
			$hdl = new $class;
		}
		return $hdl;
	}

	// start application
	public static function initialize(){
		$r = new Router();
		$r->parse();
	}	
}


/**
 * Coordinator parent class
 */
class Coordinator {
	
	private $AS = 0; // accessible scope, default is 0 that means no limit
	private $_name = '';

	public function setAccessibleScope($as){
		$this->AS = $as;
	}
	public function getAccessibleScope(){
		return $this->AS;
	}
	public function checkAccessibleScope(){
		$required = $this->AS;
		$userScope = 0;
		if($required===0){
			return true;
		}
		else{
			$user = bp::get('user');
			if(!!$user && is_object($user)){
				$userScope = $user->ascope;
			}
			if($userScope >= $required){
				return true;
			}
		}
		return false;
	}	
	
	public function setName($n){
		$this->_name = $n;
	}
	public function getName(){
		return $this->_name;
	}	
	
	public function loadHandler(){
		if(!$this->checkAccessibleScope()){
			return $this->deny();
		}
		$n = $this->getName();
		if($n){
			$md = bp::callHandler($n);
			if(!!$md && is_object($md)){
				$md->setName($n);
				return $md;
			}
		}
		return $this->deny();
	}	
		
	public function parse(){
		
	}
	
	public function deny(){
		$t = bp::getSession('login_fail_count');
		if($t<=5){
			$url = BASE_PATH.'login';
			header("location:$url");
		}
		$MSG_401 = 'We\'re sorry, you do not have sufficient permissions to access this application.';
		require('errors/401.php');	
		exit;	
	}	
}
/**
 * Handler parent class
 */
class Handler {
	
	protected $ES =  0; // accessible scope, default is 0 that means no limit
	private $_name = '';

	protected function setExecutableScope($es){
		$this->ES = $es;
	}
	protected function getExecutableScope(){
		return $this->ES;
	}
	public function __call($methods, $args){
		if($this->checkExecutableScope()){
			call_user_func_array(array($this, $methods),$args);
		}
		else{
			return bp::json(array(
				'error'=>array(
					'code'=>133,
					'message'=>'Do not have sufficient permissions to execute this action.'
				)
			));
			exit;
		}
	}
	protected function checkExecutableScope(){
		$required = $this->getExecutableScope();
		$userScope = 0;
		if($required===0){
			return true;
		}
		else{
			$userScope = bp::get('user');
			if(!!$user && is_object($user)){
				$userScope = $user->ascope;
			}
			if($userScope >= $required){
				return true;
			}
		}
		return false;
	}
		
	public function setName($n){
		$this->_name = $n;
	}
	public function getName(){
		return $this->_name;
	}	
			
	public function execute(){
		$this->onExecuteStart();
		$this->output();
		$this->onExecuteEnd();
	}
	
	public function output($opts = false, $layout=false){
		if(is_array($opts)){
			if(isset($opts['type'])){
				if($opts['type']=='json'){
					return bp::json($opts['data']);
				}
			}
		}
		$n = !!$layout ? $layout : $this->getName();
		if($n){
			$v = 'output'.DS.$n.'.php';
			if(file_exists($v)){
				bp::set('APP', json_encode(array(
					'name'=>APP_NAME,
					'version'=>APP_VERSION,
					'dateformat'=>DATE_FORMAT,
					'svrTime'=>bp::date(),
					'baseDir'=>BASE_PATH		
				)));			
				header('content-type:text/html;charset=utf-8;');
				include($v);
				return true;
			}
		}
		return $this->stopAccess();
	}

	private function onExecuteStart(){
		if(!$this->checkExecutableScope()){
			bp::json(array(
				'error'=>array(
					'code'=>401,
					'message'=>'Do not have sufficient permissions to execute this action.',
					'currentScope'=>bp::get('user')->ascope,
					'requiredScope'=>'Greather than or equal to '.$this->getExecutableScope()
				)
			));
			exit();
		}
	}
	private function onExecuteEnd(){
		// coming soon
	}	
	public function stopAccess(){
		require('errors/401.php');
		exit;	
	}
	
	public function render($layout = false, $opts = false){
		return $this->output($layout, $opts);
	}
}
?>
