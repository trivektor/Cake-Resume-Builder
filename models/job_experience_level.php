<?php
class JobExperienceLevel extends AppModel {
	var $name = 'JobExperienceLevel';
	
	function getJobExperienceLevels() {
		return $this->find('list', array(
			'conditions' => array('JobExperienceLevel.status' => 'active'),
			'fields' => array('JobExperienceLevel.id', 'JobExperienceLevel.level')
		));
	}
}
?>