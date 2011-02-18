<?

class ResumeWorkExperiencesController extends AppController {
	
	var $name = 'ResumeWorkExperiences';
	
	var $uses = array('Resume', 'ResumeWorkExperience');
	
	function index() {
		
	}
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function add($id) {
		if (!empty($this->data)) {
			$this->data['ResumeWorkExperience']['resume_id'] = $id;
			if ($this->ResumeWorkExperience->save($this->data)) {
				$this->Session->setFlash('Your experience has been added');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $id));
			}
		}
	}
	
	function edit($id) {
		if (!empty($this->data)) {
			if ($this->ResumeWorkExperience->save($this->data)) {
				$this->Session->setFlash('Your experience has been saved');
				$this->redirect(array('controller' => 'resumes', 'action' => 'edit', $this->data['ResumeWorkExperience']['resume_id']));
			}
			
		} else {
			$this->data = $this->ResumeWorkExperience->findById($id);
		}
	}
	
	function delete($id) {
		$this->ResumeWorkExperience->delete($id);
		$this->Session->setFlash('Your experience has been deleted');
		$this->redirect('/resumes/edit/'.$id);
	}
	
}

?>