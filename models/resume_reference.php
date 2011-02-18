<?

class ResumeReference extends AppModel {
	
	var $name = 'ResumeReference';
	
	var $useTable = 'resume_references';
	
	// var $belongsTo = array(
	// 		'Resume' => array(
	// 			'className' => 'Resume',
	// 			'foreignKey' => 'resume_id'
	// 		)
	// 	);
	
	var $validate = array(
		'name' => array(
			'rule-1' => array(
				'rule' => "/[a-zA-Z0-9-_':,. ]+/i",
				'message' => 'Only characters such as letters, numbers, dash, underscore, comma, apostrophe are allowed'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Name cannot be blank'
			)
		),
		'organization' => array(
			'rule-1' => array(
				'rule' => "/[a-zA-Z0-9-_':,. ]+/i",
				'message' => 'Only characters such as letters, numbers, dash, underscore, comma, apostrophe are allowed'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Organization Name cannot be blank'
			)
		),
		'title' => array(
			'rule-1' => array(
				'rule' => "/[a-zA-Z0-9-_':,. ]+/i",
				'message' => 'Only characters such as letters, numbers, dash, underscore, comma, apostrophe are allowed'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Title cannot be blank'
			)
		),
		'email' => array(
			'rule' => array('validateEmailFormat'),
			'message' => 'Please supply a valid email address'
		)
	);
	
	function validateEmailFormat($check) {
		if (empty($check['email'])) return true;
		return Validation::email($check['email']);
	}
	
}

?>