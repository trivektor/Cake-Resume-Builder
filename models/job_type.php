<?php
class JobType extends AppModel {
	var $name = 'JobType';
	
	function getJobTypes() {
		return $this->find('list', array(
			'conditions' => array('JobType.status' => 'active'),
			'fields' => array('JobType.id', 'JobType.type'),
		));
	}
}
?>