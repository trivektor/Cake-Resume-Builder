<?

class Blog extends AppModel {
	
	var $name = 'Blog';
	
	var $useTable = 'blogs';
	
	var $hasMany = array(
		'BlogComment' => array(
			'name' => 'BlogComment',
			'foreignKey' => 'blog_id',
			'dependent' => TRUE
		),
		'BlogRecommendation' => array(
			'name' => 'BlogRecommendation',
			'foreignKey' => 'blog_id',
			'dependent' => TRUE
		)
	);
	
	function getBlogs($num) {
		return $this->find('all', array(
			'conditions' => array('Blog.status' => 'active'),
			'limit' => $num,
			'order' => array('Blog.stamp' => 'DESC')
		));
	}
	
}

?>