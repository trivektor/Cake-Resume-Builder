<?php
class MessagesController extends AppController {

	var $name = 'Messages';
	
	var $helpers = array('Text');
	
	var $uses = array('Message', 'User', 'Profile');

	function index() {
		
		$messages = $this->Message->find('all', array('conditions' => array('user_id' => $this->Session->read('Auth.User.id'))));
		
		$userIds = array_unique(Set::extract('/Message/sender_id', $messages));
		
		$profiles = $this->Profile->find('all', array(
			'conditions' => array('Profile.user_id' => $userIds)
		));
		
//		pr($profiles);
		
//		pr(Set::extract('/Profile/user_photo', $profiles));
		
		$profilePhoto = array_combine(Set::extract('/Profile/user_id', $profiles), Set::extract('/Profile/photo', $profiles)); 
		
		$this->set(array('messages' => $messages, 'profilePhoto' => $profilePhoto));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
	
		$message = $this->Message->read(null, $id);
		$senderProfile = $this->Profile->findById($message['Message']['sender_id']);
		$this->set(array('message' => $message, 'senderProfile' => $senderProfile));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for message', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Message->delete($id)) {
			$this->Session->setFlash(__('Message deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Message was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>