<?

class VisitorBrowser extends AppModel {
	
	var $name = 'VisitorBrowser';
	
	var $useTable = 'visitor_browsers';
	
	var $belongsTo = array(
		'ResumeAnalytic' => array(
			'className' => 'ResumeAnalytic',
			'foreignKey' => 'resume_analytic_id'
		)
	);
	
}

?>