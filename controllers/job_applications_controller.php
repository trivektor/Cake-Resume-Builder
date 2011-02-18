<?

class JobApplicationsController extends AppController {
	
	var $name = 'JobApplications';
	
	var $uses = array('Job', 'JobApplication', 'Country');
	
	function apply() {
		$job = $this->Job->find('first', array(
			'conditions' => array('company_slug' => $this->params['named']['company'], 'slug' => $this->params['named']['job'],
			'Job.status' => 'active')
		));
		$this->set(array(
			'job' => $job
		));
		if (!empty($this->data)) {
			$this->data['JobApplication']['job_id'] = $job['Job']['id'];
			$this->data['JobApplication']['user_id'] = $this->Session->read('Auth.User.id');
			//pr($this->data);
			if ($this->JobApplication->save($this->data)) {
				$this->Session->setFlash('Your application has been submitted');
				$this->redirect($this->referer());
			}
		} else {
			$this->name = 'job_apply';
		}
	}
	
	function review($job_id) {
		$this->name = 'job_application_review';
		$this->set(array('applicants' => $this->JobApplication->find('all', array(
			'conditions' => array('JobApplication.job_id' => $job_id)
		))));
	}
	
	function details() {
		$this->name = 'job_application_details';
		$this->set(
			array(
				'job_application_details' => $this->JobApplication->find('first',
					array('conditions' => array(
						'JobApplication.id' => $this->params['named']['application_id'],
						'JobApplication.job_id' => $this->params['named']['job_id']
					))
			)
		));
	}
	
	function status() {
		
	}
	
	
}

?>