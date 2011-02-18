<?

class ResumeEducationsController extends AppController {
	
	var $name = 'ResumeEducations';
	
	var $uses = array('Resume', 'ResumeEducation');
	
	function index() {
		
	}
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function add($id) {
		if (!empty($this->data)) {
			$this->data['ResumeEducation']['resume_id'] = $id;
			if ($this->ResumeEducation->save($this->data)) {
				$this->Session->setFlash('Your education has been added');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $id));
			}
		}
	}
	
	function edit($id) {
		if (!empty($this->data)) {
			if ($this->ResumeEducation->save($this->data)) {
				$this->Session->setFlash('Your education has been updated');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $this->data['ResumeEducation']['resume_id']));
			}
		} else {
			$this->data = $this->ResumeEducation->findById($id);
		}
	}
	
	function delete($id) {
		$this->ResumeEducation->delete($id);
		$this->Session->setFlash('Your education has been deleted');
		$this->redirect($this->referer());
		
	}
	
}

?>