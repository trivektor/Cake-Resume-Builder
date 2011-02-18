<?php
class BlogCommentsController extends AppController {

	var $name = 'BlogComments';
	
	var $uses = array('BlogComment');

	function insert() {

		//save() resets $this->BlogComment->validationErrors so we should use validates() here
		$this->BlogComment->set($this->data);
		if ($this->BlogComment->validates()) {
			$this->BlogComment->save($this->data);
			
		} else {
			//$this->Session->setFlash(implode(",", $this->BlogComment->invalidFields()));
			$this->Session->write('errors', $this->BlogComment->invalidFields());
		}
		
		$this->redirect($this->referer(), null, true);
	}
}
?>