<?php
class Message extends AppModel {
	var $name = 'Message';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	// var $belongsTo = array(
	// 		'User' => array(
	// 			'className' => 'User',
	// 			'foreignKey' => 'user_id',
	// 			'conditions' => '',
	// 			'fields' => '',
	// 			'order' => ''
	// 		)
	// 	);
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_messages',
			'foreignKey' => 'message_id',
			'unique' => TRUE
		)
	);
}
?>