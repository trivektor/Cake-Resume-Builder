<?php
class FeedbackComment extends AppModel {
	var $name = 'FeedbackComment';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'feedback_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $validate = array(
		'full_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your name'
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid email address'
		),
		'comment' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your reply'
		)
	);
	
	function countFeedbackComments() {
		return $this->find('count', array('fields' => 'DISTINCT FeedbackComment.id'));
	}
}
?>