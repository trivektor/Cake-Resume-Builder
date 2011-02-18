<?

class BlogsController extends AppController {
	
	var $name = 'Blogs';
	
	var $uses = array('Blog');
	
	var $helpers = array('Slug', 'Markdown');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
	//List all blog posts
	function index() {
		$this->name = 'blog_index';
		$this->set('blogs', $this->Blog->find('all', array('conditions' => array('status' => 'active'), 'order' => array('stamp' => 'DESC'))));
	}
	
	function view() {
		if (empty($this->data)) {
			$this->name = 'blog_details';
			$this->set('blog', $this->Blog->findBySlug($this->params['pass'][0]));
		}
	}
	
	//To be implemented, should be applicable to app admin only
	function edit($id) {
		
	}
	
	//To be implemented, should be applicable to app admin only
	function delete($id) {
		
	}
	
	function comment() {
		$this->loadModel('BlogComment');
		$this->BlogComment->save($this->data);
		$this->redirect($this->refer());
	}
	
	function authors() {
		App::import('Helper', 'Slug');
		$slug = new SlugHelper;
		$authorName = $slug->deslug($this->params['pass'][0]);
		
		$this->set(
			array(
			'blogs' => $this->Blog->find('all', 
				array(
					'conditions' => array('Blog.status' => 'active', 'Blog.author' => $authorName),
					'order' => array('Blog.stamp' => 'DESC')
				)
			),
			'author' => $authorName
			)
		);
		
	}
	
	function archives() {
		
	}
	
	
}

?>