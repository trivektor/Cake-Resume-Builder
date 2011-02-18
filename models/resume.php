<?

class Resume extends AppModel {
	
	var $name = 'Resume';
	
	var $useTable = 'resumes';
	
	var $components = array('Session');
	
	var $cacheQueries = true;
	
	var $hasOne = array(
		'ResumePersonalInformation' => array(
			'className' => 'ResumePersonalInformation',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeSkill' => array(
			'className' => 'ResumeSkill',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeFieldWork' => array(
			'className' => 'ResumeFieldWork',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeSetting' => array(
			'className' => 'ResumeSetting',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeSectionOrder' => array(
			'className' => 'ResumeSectionOrder',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeTheme' => array(
			'className' => 'ResumeTheme',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		)
	);
	
	var $hasMany = array(
		'ResumeKeyword' => array(
			'className' => 'ResumeKeyword',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE,
			'order' => array('ResumeKeyword.id' => 'ASC')
		),
		'ResumeEducation' => array(
			'className' => 'ResumeEducation',
			'foreignKey' => 'resume_id',
			'order' => 'ResumeEducation.weight DESC',
			'dependent' => TRUE
		),
		'ResumeWorkExperience' => array(
			'className' => 'ResumeWorkExperience',
			'foreignKey' => 'resume_id',
			'order' => 'ResumeWorkExperience.weight DESC',
			'dependent' => TRUE
		),
		'ResumeReference' => array(
			'className' => 'ResumeReference',
			'foreignKey' => 'resume_id',
			'order' => 'ResumeReference.weight DESC',
			'dependent' => TRUE
		),
		'ResumeHiddenField' => array(
			'className' => 'ResumeHiddenField',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		),
		'ResumeSectionName' => array(
			'className' => 'ResumeSectionName',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE,
			'fields' => array('id', 'section', 'name')
		),
		'VisitorInfo' => array(
			'className' => 'VisitorInfo',
			'foreignKey' => 'resume_id',
			'dependent' => TRUE
		)
	);
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	var $validate = array(
		'url' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'URL can only consist of letters and numbers'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'URL is required'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This URL is not available'
			)
		),
		'title' => array(
			'rule-1' => array(
				'rule' => "/[a-zA-Z0-9-_':,. ]+/i",
				'message' => 'Only characters such as letters, numbers, dash, underscore, comma, apostrophe are allowed'
			),
			'rule-2' => array(
				'rule' => 'isUnique',
				'message' => 'This resume title is in use'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Title is required'
			)
		)
	);
	
	
	function beforeSave() {
		$this->data['Resume']['last_updated'] = date("Y-m-d H:i:s");
		return true;
	}
	
	function getResumeByUserId($user_id) {
		return $this->find('all', 
			array(
				'fields' => '*', 
				'conditions' => array(
					'Resume.status' => 'active', 
					'user_id' => $user_id
			),
			'order' => array('Resume.created_on' => 'DESC'))
		);
	}
}

?>