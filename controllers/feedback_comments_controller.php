<?

class FeedbackCommentsController extends AppController {
	
	var $name = 'FeedbackComments';
	
	var $uses = array('FeedbackComment', 'Feedback');
	
	var $helpers = array('Timestamp');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('reply');
	}
	
	function reply($slug) {
		$this->set('feedback', $this->Feedback->getFeedbackBySlug($slug));
		if (!empty($this->data)) {
			if ($this->FeedbackComment->save($this->data)) {
				$this->Session->setFlash('Your comment has been added');
				$this->redirect(array('controller' => 'feedbacks', 'action' => 'view', $slug));
			}
		} else {
			
		}
	}
	
}

?>