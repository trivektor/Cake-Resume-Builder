<?php

App::import('Sanitize');

class UserThreadsController extends AppController {

	var $name = 'UserThreads';
	
	var $uses = array('UserThread');

	function shout(){
		$this->data['UserThread']['user_id'] = $this->Session->read('Auth.User.id');
		$this->data['UserThread']['target_id'] = $this->data['UserThread']['target_id'];
		$this->data['UserThread']['content'] = Sanitize::clean($this->data['UserThread']['content']);
		$this->data['UserThread']['private'] = $this->data['UserThread']['private'];
		$this->UserThread->save($this->data);
		$this->redirect($this->referer());
	}
}
?>