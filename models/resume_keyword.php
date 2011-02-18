<?

class ResumeKeyword extends AppModel {
	
	var $name = 'ResumeKeyword';
	
	var $useTable = 'resume_keywords';
	
	// var $belongsTo = array(
	// 		'Resume' => array(
	// 			'className' => 'Resume',
	// 			'foreignKey' => 'resume_id'
	// 		)
	// 	);
	
	var $validate = array(
		'keywords' => array(
			'rule' => array('maxLength', 300),
			'message' => 'Please limit keywords to 200 characters'
		)
	);
	
}

?>