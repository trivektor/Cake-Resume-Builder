<?

class JobCategory extends AppModel {
	
	var $name = 'JobCategory';
	
	var $useTable = 'job_categories';
	
	var $hasMany = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_category_id'
		)
	);
	
	function getJobCategories() {
		return $this->find('list', array(
			'conditions' => array('JobCategory.status' => 'active'),
			'fields' => array('JobCategory.id', 'JobCategory.category_name')
		));
	}
	
	function getJobCategoryById($id) {
		$query = $this->find('first', array(
			'fields' => array('JobCategory.category_name'),
			'conditions' => array('JobCategory.id' => $id)
		));
		if ($query) {
			return $query['JobCategory']['category_name'];
		} else {
			return '';
		}
	}
	
}

?>