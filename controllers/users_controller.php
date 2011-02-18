<?php

App::import('Vendor', 'facebook');

class UsersController extends AppController {

	var $name = 'Users';
	
	var $helpers = array('Html', 'Form');
	
	var $components = array('Email', 'RequestHandler', 'Security');
	
	var $uses = array('User');
	
	var $FACEBOOK_APP_ID = '143972068990839';
	var $FACEBOOK_API_ID = 'a5e1bd815d1121de0a0898708f601524';
    var $FACEBOOK_SECRET = '96d698daf4f0970f2e0191c15938f44e';
    var $FACEBOOK_COOKIE = '';
	var $facebook;
	
	function beforeFilter() {
		$this->Auth->allow('login', 'register', 'index', 'logout', 'forgot_password', 'captcha', 'fb_auth');
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
		$this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index');
	}
	
	function index() {
		
	}
	
	function register() {
		$this->layout = 'signup';
		if (!empty($this->data)) {
			
			
			//Check captcha
			if (!isset($this->Captcha)) {
				App::import('Component', 'Captcha');
				$this->Captcha = new CaptchaComponent;
				$this->Captcha->startup($this);
			}
			
			$this->User->setCaptcha($this->Captcha->getVerCode());
			
			//Bind isUnique validation rule to User model on the fly
			//$this->User->validate['email']['isUnique'] = array('rule' => 'isUnique', 'message' => 'This email is not available');
			
			//if ($this->data['User']['passwd'] == $this->data['User']['passwd_confirm']) {
				
				if ($this->User->save($this->data)) {
					$this->data['Profile']['user_id'] = $this->User->id;
					$this->data['Profile']['first_name'] = $this->data['User']['first_name'];
					$this->data['Profile']['last_name'] = $this->data['User']['last_name'];
					$this->User->Profile->save($this->data);
					//$this->Session->setFlash('You have been registered');
					//$this->redirect(array('action' => 'index'));
					$this->data['User']['password'] = Security::hash($this->data['User']['passwd'], 'sha1', true);
					$this->Auth->login($this->data);
					$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				} else {
					
				}
				
			// } else {
			// 				$this->Session->setFlash('Your passwords do not match');
			// 			}
			
		} else {
			$this->name = 'register';
		}
	}
	
	function login() {
		//$this->name = 'login';
		//$this->set('title_for_layout', 'Login');
		
		
	}
	
	function logout() {
		$this->Auth->logout();
		$this->Session->destroy();
		setcookie('fbs_'.$this->FACEBOOK_APP_ID, "", time() - 3600);
		$this->Cookie->delete('fbs_'.$this->FACEBOOK_APP_ID);
		$this->Cookie->destroy();
		$this->redirect('/');
	}
	
	function captcha() {
		$this->autoRender = false;
		$this->layout = 'captcha';
		if (!isset($this->Captcha)) {
			App::import('Component', 'Captcha');
			$this->Captcha = new CaptchaComponent();
			$this->Captcha->startup($this);
		}
		$this->Captcha->create();
	}
	
	function fb_auth() {
		$this->autoRender = false;
		$this->facebook = new Facebook($this->FACEBOOK_API_ID, $this->FACEBOOK_SECRET);
		
		// Check the Login Status
		$this->__checkFBStatus();
	}
	
	function get_facebook_cookie($app_id, $application_secret) {
		
		$args = array();
		
		//$this->Cookie->read('fbs_' . $app_id) doesn't work for some reason
		$fb_cookie = isset($_COOKIE['fbs_' . $app_id]) ? $_COOKIE['fbs_' . $app_id] : '';
		
          if (!empty($fb_cookie)) {
                parse_str(trim($fb_cookie, '\\"'), $args);
                ksort($args);
                $payload = '';
                  foreach ($args as $key => $value) {
                    if ($key != 'sig') {
                      $payload .= $key . '=' . $value;
                    }
                  }
                // if (md5($payload . $application_secret) != $args['sig']) {
                // 			                	return null;
                // 			                }
        }
		return $args;
	}
	
	function __checkFBStatus(){
		  
		$fb_cookie = $this->get_facebook_cookie($this->FACEBOOK_APP_ID, $this->FACEBOOK_SECRET);

		if (!$this->Session->read('Auth.User.id')) {
			if ($fb_cookie) {
			  	$user_record = $this->User->find('first', array(
					'conditions' => array('fbid' => $fb_cookie['uid'])
			    ));
		
			    //create new user
			    if(empty($user_record)) {
		
	                // I need this make no changes to the model
	                $save_options = array( 'validate' => false);
	                // get the User Data from Facebook...
	                $a_user = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$fb_cookie['access_token']));

	                $this->data['User']['token'] = sha1($fb_cookie['uid'].'evmgr');
	                $this->data['User']['username'] = $fb_cookie['uid'];
					$this->data['User']['fbid'] = $fb_cookie['uid'];
         
	                $this->data['User']['facebook_link'] = $a_user->link;
					$this->data['User']['email'] = $fb_cookie['uid'].'@facebookuser.com';
                
					$pwd = $this->__randomString();
					$this->data['User']['password'] = Security::hash($pwd, 'sha1', true);
					$this->data['User']['plain_password'] = $pwd;
					
					// echo '<pre>';
					// print_r($a_user);
					// echo '</pre>';
															
					//Create brand new user
					// $existing_user = $this->User->findByEmail($a_user->email);
					// 					if ($existing_user) {
					// 						$this->data['User']['username'] = $existing_user['User']['username'];
					// 						$this->data['User']['password'] = $existing_user['User']['password'];
					// 						$this->data['User']['email'] = $existing_user['User']['email'];
					// 						$this->User->read(null, $existing_user['User']['id']);
					// 						$this->User->set('fbid', $a_user->id);
					// 						$this->User->set('facebook_link', $a_user->link);
					// 						$this->User->save();
					// 					} else {
					$this->User->save($this->data, $save_options);
					$this->loadModel('Profile');
					$this->data['Profile']['user_id'] = $this->User->id;
					$this->data['Profile']['first_name'] = $a_user->first_name;
					$this->data['Profile']['last_name'] = $a_user->last_name;
					$this->data['Profile']['country'] = 2;
					$this->Profile->save($this->data, $save_options);
					//}
					
	       			
	            } else {
					$this->data['User']['username'] = $user_record['User']['username'];
					$this->data['User']['password'] = $user_record['User']['password'];
					$this->data['User']['email'] = $user_record['User']['email'];
				}
				$this->Auth->login($this->data);
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			} else {
				$this->Auth->logout();
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			}
		} else {
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
	}
			
	private function __randomString($minlength = 20, $maxlength = 20, $useupper = true, $usespecial = false, $usenumbers = true){
		$charset = "abcdefghijklmnopqrstuvwxyz";
		if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if ($usenumbers) $charset .= "0123456789";
		if ($usespecial) $charset .= "~@#$%^*()_+-={}|][";
		if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
		else $length = mt_rand ($minlength, $maxlength);
		$key = '';
		for ($i=0; $i<$length; $i++){
			$key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
		}
		return $key;
	}

}
?>