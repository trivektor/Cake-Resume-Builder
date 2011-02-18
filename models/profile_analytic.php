<?php
class ProfileAnalytic extends AppModel {
	var $name = 'ProfileAnalytic';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'profile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	function updateProfileViewStats($profile_id, $user_id) {
		$this->data['ProfileAnalytic']['profile_id'] = $profile_id;
		$this->data['ProfileAnalytic']['user_id'] = $user_id;
		$this->save($this->data);
	}
	
	function getProfileViewStatsById($profile_id) {
		return $this->find('all', array(
			'conditions' => array('profile_id' => $profile_id),
			'limit' => 10,
			'order' => array('stamp' => 'DESC')
		));
	}
}
?>