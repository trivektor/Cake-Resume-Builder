<?

class ResumesController extends AppController {
	
	var $name = 'Resumes';
	
	var $helpers = array('Markdown', 'ResumeTask', 'EmailProtect');
	
	var $components = array('Analytic');
	
	var $uses = array('Resume', 'ResumePersonalInformation', 'ResumeWorkExperience', 'ResumeKeyword', 'ResumeFieldWork', 'ResumeSectionName', 'Theme');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}
	
	function index() {
		//List all my resume
	}
	
	function create() {
		if (!empty($this->data)) {
			
			$this->data['Resume']['user_id'] = $this->Session->read('Auth.User.id');
			$this->data['Resume']['status'] = 'active';
			
			if ($this->Resume->save($this->data)) {
				
				//Save Resume Education
				//$this->data['ResumeEducation']['resume_id'] = $this->Resume->id;
				$this->data['ResumeSkill']['resume_id'] = $this->Resume->id;
				$this->data['ResumeFieldWork']['resume_id'] = $this->Resume->id;
				$this->data['ResumePersonalInformation']['resume_id'] = $this->Resume->id;
				$this->data['ResumeKeyword']['resume_id'] = $this->Resume->id;
				$this->data['ResumeSectionOrder']['resume_id'] = $this->Resume->id;
				$this->data['ResumeSectionOrder']['section_orders'] = 'personal_information/education/skills/work_experience/references/field_works';
				$this->data['ResumeTheme']['resume_id'] = $this->Resume->id;
				$this->data['ResumeTheme']['theme'] = $this->Theme->getDefaultTheme();
				$this->data['ResumeSetting']['resume_id'] = $this->Resume->id;
				$this->data['ResumeHiddenField']['resume_id'] = $this->Resume->id;
				
				//$this->data['ResumeWorkExperience']['resume_id'] = $this->Resume->id;
				
				//$this->Resume->ResumeEducation->save($this->data);
				
				$this->Resume->ResumePersonalInformation->save($this->data);
				
				$this->Resume->ResumeSkill->save($this->data);
				
				$this->Resume->ResumeFieldWork->save($this->data);
				
				//$this->Resume->ResumeKeyword->save($this->data);
				
				$this->Resume->ResumeSectionOrder->save($this->data);
				
				$this->Resume->ResumeTheme->save($this->data);
				
				$this->Resume->ResumeSetting->save($this->data);
				
				$this->data = array();
				
				foreach (array('personal_information', 'education', 'skills', 'work_experience', 'field_works', 'references') as $f) {
					$this->ResumeSectionName->create();
					$this->data['ResumeSectionName']['resume_id'] = $this->Resume->id;
					$this->data['ResumeSectionName']['section'] = $f;
					$this->data['ResumeSectionName']['name'] = ucwords(str_replace('_', ' ', $f));
					$this->Resume->ResumeSectionName->save($this->data);
				}
				
				$this->Session->setFlash('Your resume has been created');
				$this->redirect('/dashboard');
			}
		}
	}
	
	function edit($id) {
		
		$this->name = 'resume_edit';
		
		if (!empty($this->data)) {
			
			if ($this->Resume->save($this->data) 
				&& $this->Resume->ResumePersonalInformation->save($this->data) 
				&& $this->Resume->ResumeSkill->save($this->data)
				&& $this->Resume->ResumeFieldWork->save($this->data)
				&& $this->Resume->ResumeKeyword->save($this->data)
			) {
				
				$this->Session->setFlash('Your changes have been saved');
				$this->redirect('/resumes/edit/'.$id);
			} else {
				$this->Session->setFlash('Data not saved');
				$this->redirect($this->referer());
			}
		} else {
			$this->data = $this->Resume->findById($id);
			
			$this->set('sectionName', array_combine(Set::extract('/section', $this->data['ResumeSectionName']), Set::extract('/name', $this->data['ResumeSectionName'])));
			$this->set('sectionId', array_combine(Set::extract('/section', $this->data['ResumeSectionName']), Set::extract('/id', $this->data['ResumeSectionName'])));
			$this->set('disabledSection', Set::extract('/hidden_field', $this->data['ResumeHiddenField']));
		}
	}
	
	function delete($id) {
		$this->Resume->delete($id);
		$this->redirect($this->referer());
	}
	
	function view($url) {
		
		$resume = $this->Resume->findByUrl($url);
		
		if (!$resume) {
			//$this->redirect('')
		}
		
		$this->loadModel('Theme');
		$theme = $this->Theme->findById($resume['ResumeTheme']['theme']);
		
		//$this->layout = 'resume_'.$theme['Theme']['style_slug'];
		
		$this->layout = 'resumes/resume_'.$theme['Theme']['slug'];
		
		$this->set(array('resume' => $resume, 'theme_slug' => $theme['Theme']['slug']));
		
		$this->loadModel('VisitorInfo');
		$this->VisitorInfo->update_visitor_info($resume['Resume']['id']);
		
		$this->loadModel('MailQueue');
		
		if ($resume['ResumeSetting']['email_notification']) {
			//doesn't work
			// $this->MailQueue->send_resume_visitor_notification(array(
			// 				'resume_name' => $resume['Resume']['title'],
			// 				'to' => $resume['User']['email'],
			// 				'when' => date("l F d Y, H:i:s A"),
			// 				'who' => '127.0.0.1',
			// 				'resume_id' => $resume['Resume']['id'],
			// 				'user_id' => $resume['User']['id']
			// 			));
		}
		
		$this->set('sectionName', array_combine(Set::extract('/section', $resume['ResumeSectionName']), Set::extract('/name', $resume['ResumeSectionName'])));
		
		$this->set('disabledSection', Set::extract('/hidden_field', $resume['ResumeHiddenField']));
		
		$this->loadModel('Profile');
		
		$this->set('profile', $this->Profile->findByUserId($resume['User']['id']));
		
		$this->Session->write(array('resumeOwnerId' => $resume['User']['id'], 'resumeId' => $resume['Resume']['id']));
		
		//$this->render('view_'.$theme['Theme']['style_slug']);
	}
	
	function analytic($id) {
		$this->helpers[] = 'Analytic';
		$this->loadModel('VisitorInfo');
		
		$this->data['views'] = $this->VisitorInfo->find('all', array(
			'conditions' => array(
				'resume_id' => $id,
				'stamp >= ' => date("Y-m-d", strtotime("-1 week"))
			)
		));
		
		Configure::write('browser_distribution_ago', 30);
		
		$this->data['browsers_platforms'] = $this->VisitorInfo->find('all', array(
			'conditions' => array(
				'resume_id' => $id,
				'stamp >= ' => date("Y-m-d", strtotime("-".Configure::read('browser_distribution_ago')." days"))
			)
		));
		
		$resume = $this->Resume->find('first', 
			array(
				'conditions' => array('Resume.id' => $id),
				'recursive' => false
		));
		
		$this->set('resume_title', $resume['Resume']['title']);
		
	}
	
	function select_theme($id) {
		Configure::write('debug', 0);
		$this->layout = 'theme_selector';
		$this->name = 'select_themes';
		$this->data =  $this->Resume->findById($id);
		$this->loadModel('Theme');
		$this->set('themeList', $this->Theme->find('list', 
			array(
				'fields' => array('Theme.id', 'Theme.theme'),
				'conditions' => array('status' => 'active')
			)
		));
	}
	
	function import() {
		if (!empty($this->data)) {
			$file = new File($this->data['Resume']['file']['tmp_name']);
			$filename = 'resume_'.time();
			$data = $file->read();
			$file->close();
			$file = new File(WWW_ROOT.'/docs/'.$filename.'.txt', true);
			$file->write($data);
			$file->close();
			$content = file_get_contents(WWW_ROOT.'/docs/'.$filename.'.txt', 'r');
			echo $content;
		}
	}
	
	function _import_resume() {
		
	}

}

?>