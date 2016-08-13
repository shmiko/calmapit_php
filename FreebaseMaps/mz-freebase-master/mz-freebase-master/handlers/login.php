<?php

class loginHandler extends Handler {
	
	public function run($pass = false){
		bp::setSession('message', 'Please enter your key:');
		if(!!$pass){
			$k = bp::encrypt($pass);
			if($k==APP_KEY){
				$_user = array(
					'username'=>'MyzoneLabs',
					'password'=>APP_KEY,
					'ascope'=>2,
				);				
				bp::setSession('user', $_user);
				bp::setSession('login_fail_count', 0);
				$url = BASE_PATH;
				header("location:$url");				
			}
			else{
				$t = bp::getSession('login_fail_count');
				if($t>5){
					$url = BASE_PATH;
					header("location:$url");
				}
				else{
					bp::setSession('message', '<font color="red">Sorry, key is not valid!</font>');
					bp::setSession('login_fail_count', $t+1);
				}
			}
		}
		$this->render();
	}
}

?>
