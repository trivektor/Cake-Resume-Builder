<?

class HomeController extends AppController {
	
	var $name = 'Home';
	
	var $uses = array('Blog');
	
	var $helpers = array('Slug');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	function index() {
		$this->set('latest_blog', $this->Blog->find('first', array(
			'conditions' => array('Blog.status' => 'active'),
			'order' => array('Blog.stamp' => 'DESC')
		)));
	}
	
}

?>