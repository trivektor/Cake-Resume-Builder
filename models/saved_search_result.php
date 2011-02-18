<?php
class SavedSearchResult extends AppModel {
	var $name = 'SavedSearchResult';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $recursive = -1;

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function getSavedResultsByUserId($user_id) {
		return $this->find('all', array(
			'conditions' => array('user_id' => $user_id)
		));
	}
}
?>