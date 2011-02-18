<?

class BlogComment extends AppModel {
	
	var $name = 'BlogComment';
	
	var $useTable = 'blog_comments';
	
	var $belongsTo = array(
		'Blog' => array(
			'name' => 'Blog',
			'foreignKey' => 'blog_id',
			'dependent' => TRUE
		)
	);
	
	var $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Name cannot be empty'
			)
		),
		'website' => array(
			'rule' => 'url',
			'message' => 'Please enter a valid website url'
		),
		'comment' => array(
			'rule' => 'notEmpty',
			'message' => 'Comment cannot be empty'
		)
	);
	
}

?>