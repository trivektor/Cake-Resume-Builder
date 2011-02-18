<?php
class SalaryRange extends AppModel {
	
	var $name = 'SalaryRange';
	
	
	
	function getSalaryRanges() {
		return $this->find('list', array(
			'conditions' => array('SalaryRange.status' => 'active'),
			'fields' => array('SalaryRange.id', 'SalaryRange.range'),
			'order' => array('SalaryRange.range' => 'ASC')
		));
	}
	
	function afterFind(&$results) {
		foreach ($results as $key => &$value) {
			$value['SalaryRange']['range'] = number_format($value['SalaryRange']['range']);
		}
		return $results;
	}
}
?>