<?

class VisitorInfo extends AppModel {
	
	var $name = 'VisitorInfo';
	
	var $useTable = 'visitor_infos';
	
	var $belongsTo = array(
		'Resume' => array(
			'className' => 'Resume',
			'foreignKey' => 'resume_id'
		)
	);
	
	function update_visitor_info($resume_id) {
		$browser = get_browser(null, true);
		$this->data['VisitorInfo']['resume_id'] = $resume_id;
		$this->data['VisitorInfo']['browser'] = $browser['browser'];
		$this->data['VisitorInfo']['version'] = $browser['version'];
		$this->data['VisitorInfo']['platform'] = $browser['platform'];
		$this->data['VisitorInfo']['ip_address'] = $_SERVER['SERVER_ADDR'];
		$this->data['VisitorInfo']['domain_name'] = $_SERVER['HTTP_HOST'];
		$this->save($this->data);
	}
	
}

?>