<?php
class ResumeTip extends AppModel {
	var $name = 'ResumeTip';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function randomizeTip() {
		return $this->find('all', array(
			'conditions' => array('approved' => 1),
			'fields' => array('user_id', 'tip_title', 'tip_body', 'credited_to', 'credit_url', 'stamp'),
			'order' => array('RAND()'),
			'limit' => 1
		));
	}
}
?>