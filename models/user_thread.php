<?php
class UserThread extends AppModel {
	var $name = 'UserThread';
	
	//var $actsAs = array('Containable');
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	function getThreadsByUserId($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'UserThread.target_id' => $user_id,
				'UserThread.type' => 'profile',
				'UserThread.status' => 'active'
			),
			'order' => array(
				'UserThread.stamp' => 'DESC'
			)
		));
	}
}
?>