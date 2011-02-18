<?

class VisitorDomainName extends AppModel {
	
	var $name = 'VisitorDomainName';
	
	var $useTable = 'visitor_domain_names';
	
	var $belongsTo = array(
		'ResumeAnalytic' => array(
			'className' => 'ResumeAnalytic',
			'foreignKey' => 'resume_analytic_id'
		)
	);
	
}

?>