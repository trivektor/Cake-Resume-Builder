<?php
class FavoriteJob extends AppModel {
	var $name = 'FavoriteJob';
	
	var $useTable = 'favorite_jobs';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function getFavoritesJobsByUser($user_id) {
		return $this->find('all', array(
			'conditions' => array('FavoriteJob.user_id' => $user_id),
			'order' => array('FavoriteJob.stamp' => 'DESC')
		));
	}
	
	
}
?>