<?

class VisitorOperatingSystem extends AppModel {
	
	var $name = 'VisitorOperatingSystem';
	
	var $useTable = 'visitor_operating_systems';
	
	var $belongsTo = array(
		'ResumeAnalytic' => array(
			'className' => 'ResumeAnalytic',
			'foreignKey' => 'resume_analytic_id'
		)
	);
	
}

?>