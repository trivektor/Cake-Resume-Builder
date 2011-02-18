<?php
class FeedbacksController extends AppController {

	var $name = 'Feedbacks';
	
	var $uses = array('Feedback', 'FeedbackActivity', 'User', 'Profile', 'FeedbackComment');
	
	var $helpers = array('Timestamp');
	
	var $hasMany = array(
		'FeedbackTag' => array(
			'name' => 'FeedbackTag',
			'foreignKey' => 'feedback_id',
			'dependent' => TRUE
		)
	);
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('*'));
		$this->Cookie->name = 'feedback_vote';
		$this->Cookie->time = 182*24*3600;
		$this->Cookie->path = '/';
		$this->Cookie->domain = 'resumebuilder.localhost';
		$this->Cookie->secure = false;
		$this->Cookie->key = 'adfkjh!34234*asdad';
	}
	
	function index() {
		$this->name = 'feedbacks';
		$feedbacks = $this->Feedback->getAllFeedbacks();
		$user_ids = Set::extract('/Feedback/user_id', $feedbacks);
		$this->set(
			array(
				'feedbacks' => $feedbacks, 
				'feedback_posters' => $this->Profile->getProfilesInfoFromUserIds($user_ids),
				'feedback_count' => $this->FeedbackComment->countFeedbackComments()
			)
		);
	}
	
	function create() {
		
		$this->name = 'feedback_create';
		
		if (!empty($this->data)) {
			
			if ($this->Feedback->save($this->data)) {
				
				$tags = explode(",", $this->data['Feedback']['tags']);
				
				$this->loadModel('FeedbackTag');
				
				foreach ($tags as $t) {
					$this->FeedbackTag->create();
					$this->data['FeedbackTag']['feedback_id'] = $this->Feedback->id;
					$this->data['FeedbackTag']['tag'] = $t;
					$this->FeedbackTag->save($this->data);
				}
				
				$this->Session->setFlash('Thanks! Your feedback has been submitted. We really appreciate it');
				$this->redirect($this->referer());
			}
			
		}
		
	}
	
	function view($slug) {
		$feedback = $this->Feedback->getFeedbackBySlug($slug);
		if ($feedback) {
			$feedback_poster = $this->Profile->getProfilesInfoFromUserIds($feedback['Feedback']['user_id']);
			$this->set('feedback_poster', $feedback_poster[$feedback['Feedback']['user_id']]);
			$this->Feedback->doIncrement($feedback['Feedback']['id'], 1, 'views');
		} 
		$this->set('feedback', $feedback);
	}
	
	function reply($slug) {
		
		if (empty($this->data)) {
			$feedback = $this->Feedback->getFeedbackBySlug($slug);
			$this->set('feedback', $feedback);
		} else {
			if ($this->Feedback->save($this->data)) {
				$this->Session->setFlash('Your reply has been added');
				$this->redirect(array('controller' => 'feedbacks', 'action' => 'view', $slug));
			}
		}
		
	}
	
	function me_too($id) {
		if ($this->FeedbackActivity->canTakeActivity($id, $this->Session->read('Auth.User.id'), 'vote')) {
			$this->Feedback->doIncrement($id, 1, 'votes');
			$this->data['FeedbackActivity']['feedback_id'] = $id;
			$this->data['FeedbackActivity']['user_id'] = $this->Session->read('Auth.User.id');
			$this->data['FeedbackActivity']['type'] = 'vote';
			$this->FeedbackActivity->save($this->data);
			$this->Session->setFlash('Your vote has been casted');
		} else {
			$this->Session->setFlash('You have already voted for this');
		}
		$this->autoRender = false;
		$this->redirect($this->referer());
	}
	
	function like($id) {
		if ($this->FeedbackActivity->canTakeActivity($id, $this->Session->read('Auth.User.id'), 'likes')) {
			$this->Feedback->doIncrement($id, 1, 'likes');
			$this->data['FeedbackActivity']['feedback_id'] = $id;
			$this->data['FeedbackActivity']['user_id'] = $this->Session->read('Auth.User.id');
			$this->data['FeedbackActivity']['type'] = 'likes';
			$this->FeedbackActivity->save($this->data);
			$this->Session->setFlash('Thanks for liking this feedback');
		} else {
			$this->Session->setFlash('You have already liked this feedback');
		}
		$this->redirect($this->referer());
		
	}
	
	function search() {
		
	}

}
?>