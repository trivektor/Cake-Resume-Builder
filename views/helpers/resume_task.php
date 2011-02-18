<?

class ResumeTaskHelper extends AppHelper {
	
	var $helpers = array('Session');
	
	function generateLikeButton($resumeId) {
		
		if (!$this->Session->read('Auth.User.id')) return;
		
		//load model in helper
		$this->Activity = ClassRegistry::init('Activity');
		
		$like = $this->Activity->find('all', 
			array(
				'conditions' => array(
					'user_id' => $this->Session->read('Auth.User.id'),
					'action_id' => 1,
					'entity_type' => 'resume',
					'entity_id' => $resumeId
				)
			)
		);
		
		if (!$like) {
			$likeButton =& ClassRegistry::getObject('View');
			return $likeButton->element('resume_like_button');
		}
		
	}
	
}

?>