<?

class ResumeTheme extends AppModel {
	
	var $name = 'ResumeTheme';
	
	var $useTable = 'resume_themes';
	
	var $belongsTo = array(
		'Resume' => array(
			'className' => 'Resume',
			'foreignKey' => 'resume_id'
		)
	);
	
}

?>