<?php
class Job extends AppModel {
	
	var $name = 'Job';
	
	var $displayField = 'title';
	
	var $helpers = array('Session');
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'JobCategory' => array(
			'className' => 'JobCategory',
			'foreignKey' => 'job_category_id'
		)
	);
	
	var $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Job title cannot be empty'
			)
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Slug cannot be empty'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The slug you chose is not available'
			)
		),
		'company_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Company name cannot be empty'
			)
		),
		'company_slug' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Company slug cannot be emty'
			)
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Job description cannot be empty'
			)
		),
		'requirements' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Job requirements cannot be empty'
			)
		),
		'job_category_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select a job category'
			)
		),
		'location' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Location cannot be empty'
			)
		),
		'salary_low_end' => array(
			'validSalaryRange' => array(
				'rule' => 'validSalaryRange',
				'message' => 'Invalid salary range'
			)
		),
		'salary_high_end' => array(
			'validSalaryRange' => array(
				'rule' => 'validSalaryRange',
				'message' => 'Invalid salary range'
			)
		)
	);
	
	function slugIsUnique($slug) {
		return $this->find('count', array(
			'fields' => array('Job.id'),
			'conditions' => array('Job.slug = ', $slug)
		));
	}
	
	function validSalaryRange() {
		if (empty($this->data['Job']['salary_low_end']) && empty($this->data['Job']['salary_high_end'])) {
			return true;
		}
		return $this->data['Job']['salary_low_end'] <= $this->data['Job']['salary_high_end'];
	}
	
	function getJobByCategory($category_id) {
		return $this->find('all', array(
			'conditions' => array('Job.job_category_id' => $category_id, 'Job.approved' => 1, 'Job.status' => 'active'),
			'order' => array('Job.stamp' => 'DESC')
		));
	}
	
	function getRandomJobsByCategory($category_id, $limit=4) {
		return $this->find('all', array(
			'conditions' => array('Job.status' => 'active', 'approved' => 1, 'Job.job_category_id' => $category_id),
			'order' => array('Job.stamp' => 'DESC')
		));
	}
	
	function getAllJobs() {
		return $this->find('all', array(
			'conditions' => array('Job.status' => 'active')
		));
	}
	
	function getJobsPostedByUserId($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Job.user_id' => $user_id,
				'Job.status' => 'active'
			),
			'order' => array('Job.stamp' => 'DESC')
		));
	}
	
	function search($params) {
		$conditions = array();
		if (!empty($params['keywords'])) {
			$conditions = array('Job.keywords LIKE' => '%'.$params['keywords'].'%');
		}
			foreach (array('title', 'company_name', 'location', 'postal_code') as $f) {
				if (!empty($params[$f])) $conditions['Job.'.$f.' LIKE'] = '%'.$params[$f].'%';
			}
			foreach (array('country', 'job_category_id', 'type', 'job_experience_level') as $f) {
				if (!empty($params[$f])) $conditions['Job.'.$f] = '%'.$params[$f].'%';
			}
			return $this->find('all', array('conditions' => $conditions));
	}
	
}
?>