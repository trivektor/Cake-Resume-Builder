<?php
class JobApplication extends AppModel {
	var $name = 'JobApplication';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array(
	    'MeioUpload' => array(
	        'resume' => array(
	            'dir' => 'files/resume',
	            'create_directory' => true,
	            'allowedMime' => array('application/msword', 'application/pdf'),
	            'allowedExt' => array('.doc', '.docx', '.word', '.pdf'),
	            // 'thumbsizes' => array(
	            // 	                'normal' => array('width'=>200, 'height'=>200),
	            // 	            ),
	            // 	            'default' => 'default.jpg',
	        )
	    )
	);
	

	var $belongsTo = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id',
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
	
	var $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your first name'
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your last name'
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid email address'
		),
		'phone_number' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a phone number'
		),
		'city' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a city'
		),
		'state' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your state/province'
		),
		'resume' => array(
			'Empty' => array(
				'check' => true
			),
			'InvalidExt' => array(
				'message' => 'Invalid file type'
			)
		)
	);
	
	//Used on dashboard
	function getJobApplicationByUserId($user_id) {
		$job_applications = $this->find('all', array(
			'conditions' => array('JobApplication.user_id' => $user_id),
			'fields' => array('JobApplication.job_id')
		));
		
		return Set::extract('/JobApplication/job_id', $job_applications);
	}
}
?>