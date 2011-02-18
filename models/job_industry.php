<?php
class JobIndustry extends AppModel {
	
	var $name = 'JobIndustry';
	
	var $useTable = 'job_industries';
	
	function getJobIndustries() {
		return $this->find('list', array(
			'conditions' => array('JobIndustry.status' => 'active'),
			'fields' => array('JobIndustry.id', 'JobIndustry.industry')
		));
	}
}
?>