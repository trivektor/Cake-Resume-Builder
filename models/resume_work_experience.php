<?

class ResumeWorkExperience extends AppModel {
	
	var $name = 'ResumeWorkExperience';
	
	var $useTable = 'resume_work_experiences';
	
	// var $belongsTo = array(
	// 		'Resume' => array(
	// 			'className' => 'Resume',
	// 			'foreignKey' => 'resume_id'
	// 		)
	// 	);
	
	//Why can't we specify the order here?
	// var $order = array(
	// 		'ResumeWorkExperience.end_date' => 'desc'
	// 	);
	
	var $validate = array(
		'organization_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Organization Name is required'
		),
		'begin_date' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Begin Date is required'
			)
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Title is required'
			),
			'title' => array(
				'rule' => 'validateTitle',
				'message' => 'Title can only consist of letters and numbers and spaces'
			)
		),
		'details' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Details is required'
			)
		)
	);
	
	function validateBeginDate() {
		return strtotime($this->data['ResumeWorkExperience']['begin_date']) <= strtotime(date("m/d/Y"));
	}
	
	function validateEndDate() {
		return strtotime($this->data['ResumeWorkExperience']['end_date']) >= strtotime($this->data['ResumeWorkExperience']['begin_date']); 
	}
	
	function validateTitle() {
		return preg_match('/^[0-9a-zA-Z ]+$/', $this->data['ResumeWorkExperience']['title']);
	}
	
}

?>