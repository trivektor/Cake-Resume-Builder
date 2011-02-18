<?

class ResumeReferencesController extends AppController {
	
	var $name = 'ResumeReferences';
	
	var $uses = array('ResumeReference');
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function add($id) {
		if (!empty($this->data)) {
			$this->data['ResumeReference']['resume_id'] = $id;
			if ($this->ResumeReference->save($this->data)) {
				$this->Session->setFlash('Your reference has been added');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $id));
			}
		}
	}
	
	function edit($id) {
		if (!empty($this->data)) {
			if ($this->ResumeReference->save($this->data)) {
				$this->Session->setFlash('Your reference has been updated');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $this->data['ResumeReference']['resume_id']));
			}
		} else {
			$this->data = $this->ResumeReference->findById($id);
		}
	}
	
	function delete($id) {
		$this->ResumeReference->delete($id);
		$this->Session->setFlash('Your reference has been deleted');
		$this->redirect($this->referer());
	}
}

?>