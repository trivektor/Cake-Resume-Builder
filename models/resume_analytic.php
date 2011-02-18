<?

class ResumeAnalytic extends AppModel {
	
	var $name = 'ResumeAnalytic';
	
	var $useTable = 'resume_analytics';
	
	var $belongsTo = array(
		'Resume' => array(
			'className' => 'Resume',
			'foreignKey' => 'resume_id'
		)
	);
	
	var $hasMany = array(
		'VisitorDomainName' => array(
			'className' => 'VisitorDomainName',
			'foreignKey' => 'resume_analytic_id',
			'dependent' => TRUE
		),
		'VisitorBrowser' => array(
			'className' => 'VisitorBrowser',
			'foreignKey' => 'resume_analytic_id',
			'dependent' => TRUE
		),
	);
	
}

?>