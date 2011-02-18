<?php
class JobsController extends AppController {

	var $name = 'Jobs';
	
	var $uses = array('Job', 'JobCategory', 'Country', 'JobType', 'SalaryRange', 'JobExperienceLevel');
	
	var $helpers = array('Markdown', 'Timestamp');
	
	var $components = array('FileUpload');
	
	var $paginate = array(
		
	);
	
	function beforeFiler() {
		parent::beforeFilter();
		$this->job_types = $this->JobType->getJobTypes();
	}
	
	//List all job posts
	function index() {
		$this->set('jobs', $this->Job->getAllJobs());
	}
	
	//View a specific job post
	function view() {
		$this->name = 'job_view';
		$this->loadModel('Profile');
		$job = $this->Job->find('first', array(
			'conditions' => array(
				'slug' => $this->params['named']['slug'],
				'company_slug' => $this->params['named']['company']
			)
		));
		
		$this->loadModel('JobApplication');
		
		$already_applied = $this->JobApplication->find('all', array(
			'conditions' => array('job_id' => $job['Job']['id'], 'JobApplication.user_id' => $this->Session->read('Auth.User.id')),
		)) ? true : false;
		
		$this->loadModel('FavoriteJob');
		
		$already_saved = $this->FavoriteJob->find('all', array(
			'conditions' => array('job_id' => $job['Job']['id'], 'FavoriteJob.user_id' => $this->Session->read('Auth.User.id'))
		)) ? true : false;
		
		$this->set(array(
			'job' => $job,
			'poster' => $this->Profile->findByUserId($job['User']['id']),
			'already_saved' => $already_saved,
			'already_applied' => $already_applied
		));
	}
	
	//Post a job
	function post() {
		$this->name = 'job_post';
		$this->_prepareForm();
		if (!empty($this->data)) {
			$this->data['Job']['user_id'] = $this->Session->read('Auth.User.id');
			if ($this->Job->save($this->data)) {
				$this->Session->setFlash('Your job post has been submitted for approval');
				$this->redirect($this->referer());
			}
		}
	}
	
	//Edit a posted job
	function edit($id) {
		$this->name = 'job_edit';
		$this->_prepareForm();
		if (!empty($this->data)) {
			if ($this->Job->save($this->data)) {
				$this->Session->setFlash('Your job post has been updated');
				$this->redirect($this->referer());
			}
		} else {
			$this->data = $this->Job->findById($id);
		}
	}
	
	//Delete a posted job
	function delete() {
		
	}
	
	//Search jobs
	function search() {
		$this->name = 'job_search';
		
		$this->_prepareForm();
		
		if (!empty($this->data)) {
			
			$d = $this->data['Job'];
			
			if ($d['keywords'] == 'Search jobs') $d['keywords'] = '';
			
			$redirect = array(
				'controller' => 'jobs',
				'action' => 'results'
			);
			
			foreach (array('keywords', 'title', 'company_name', 'location', 'postal_code', 'type', 'job_experience_level') as $f) {
				if (!empty($d[$f])) $redirect[$f] = urlencode($d[$f]);
			}
			
			$this->redirect($redirect);
		}
	}
	
	function results() {
		$this->name = 'job_search_results';
		$this->set(array(
			'results' => $this->Job->search($this->params['named']),
			'search_type' => 'job',
		));
		//$this->render('results');
	}
	
	function _prepareForm() {
		$this->set(array(
			'job_types' => $this->JobType->getJobTypes(),
			'job_categories' => $this->JobCategory->getJobCategories(),
			'countries' => $this->Country->getCountriesList(),
			'salary_ranges' => $this->SalaryRange->getSalaryRanges(),
			'job_experience_levels' => $this->JobExperienceLevel->getJobExperienceLevels()
		));
	}

}
?>