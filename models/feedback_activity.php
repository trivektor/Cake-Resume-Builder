<?php
class FeedbackActivity extends AppModel {
	var $name = 'FeedbackActivity';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'feedback_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function canTakeActivity($feedback_id, $user_id, $type) {
		return $this->find('count', array(
			'conditions' => array('feedback_id' => $feedback_id, 'user_id' => $user_id, 'FeedbackActivity.type' => $type)
		)) == 0;
	}
}
?>