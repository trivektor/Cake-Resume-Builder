<?

class VisitorReferringPage extends AppModel {
	
	var $name = 'VisitorReferringPage';
	
	var $useTable = 'visitor_referring_pages';
	
	var $belongsTo = array(
		'ResumeAnalytic' => array(
			'className' => 'ResumeAnalytic',
			'foreignKey' => 'resume_analytic_id'
		)
	);
	
}

?>