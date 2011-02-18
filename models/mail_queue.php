<?php
class MailQueue extends AppModel {
	var $name = 'MailQueue';
	var $displayField = 'name';
	
	function sendPasswordReminder($reminder) {
		$this->data['MailQueue'] = array(
			'name' => $reminder['name'],
			'from' => $reminder['from'],
			'to' => $reminder['to'],
			'subject' => $reminder['subject'],
			'body' => $reminder['body']
		);
		
		return $this->save($this->data);
	}
}
?>