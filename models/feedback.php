<?php
class Feedback extends AppModel {
	
	var $name = 'Feedback';
	
	var $actsAs = array('Increment'=>array('incrementFieldName'=>'views')); 
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		)
	);
	
	var $hasMany = array(
		'FeedbackTag' => array(
			'className' => 'FeedbackTag',
			'foreignKey' => 'feedback_id',
			'dependent' => TRUE
		),
		'FeedbackComment' => array(
			'className' => 'FeedbackComment',
			'foreignKey' => 'feedback_id',
			'dependent' => TRUE
		)
	);
	
	var $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please enter a title'
			),
			'titleIsUnique' => array(
				'rule' => 'titleIsUnique',
				'message' => 'The title you chose is not available. Please revise'
			)
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter some feedback'
		)
	);
	
	function titleIsUnique($title) {
		return $this->find('count', array(
			'fields' => 'DISTINCT Feedback.id',
			'conditions' => array('Feedback.title' => $title)
		)) == 0;
	}
	
	function beforeSave() {
		if (empty($this->data['Feedback']['type'])) {
			$this->data['Feedback']['type'] = 'general';
		}
		$this->data['Feedback']['slug'] = Inflector::slug($this->data['Feedback']['title']);
		return true;
	}
	
	function getAllFeedbacks() {
		return $this->find('all', array(
			'conditions' => array('Feedback.status' => 'active'),
			'order' => array('Feedback.stamp' => 'DESC')
		));
	}
	
	function getFeedbackBySlug($slug) {
		return $this->find('first', array(
			'conditions' => array('Feedback.slug' => $slug, 'Feedback.status' => 'active')
		));
	}
	
}