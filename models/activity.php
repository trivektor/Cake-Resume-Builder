<?php
class Activity extends AppModel {
	
	var $name = 'Activity';
	
	var $useTable = 'activities';
	
	function getResumeLikes($resumeIds) {
		
		$resumeLikes = array();
		
		$activities = $this->query("SELECT id, user_id, entity_id, stamp FROM activities WHERE action_id = 1 AND entity_type = 'resume' 
		AND  hidden = 0 AND entity_id IN (".implode(',',$resumeIds).")");
		
		foreach ($activities as $a) {
			$resumeLikes[$a['activities']['user_id']] = array($a['activities']['entity_id'], $a['activities']['stamp'], $a['activities']['id']);
		}
		
		return $resumeLikes;
		
	}
}
?>