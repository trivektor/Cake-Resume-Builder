<?

class ResumeEducation extends AppModel {
	
	var $name = 'ResumeEducation';
	
	var $useTable = 'resume_educations';
	
	// var $belongsTo = array(
	// 		'Resume' => array(
	// 			'className' => 'Resume',
	// 			'foreignKey' => 'resume_id'
	// 		)
	// 	);
	
	var $validate = array(
		'institution' => array(
			'rule' => 'notEmpty',
			'message' => 'Institution is required'
		),
		'degree' => array(
			'rule' => 'notEmpty',
			'message' => 'Degree is required'
		),
		'begin_date' => array(
			'rule' => 'notEmpty',
			'message' => 'Begin Date is required'
		)
	);
	
}

?>