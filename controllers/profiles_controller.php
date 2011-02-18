<?

class ProfilesController extends AppController {
	
	var $name = 'Profiles';
	
	var $uses = array('User', 'Profile', 'Country', 'JobCategory', 'Resume', 'Thought', 'UserThread');
	
	var $helpers = array('Cropimage', 'Timestamp');
	
	var $components = array('JqImgcrop');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('index'));
	}
	
	function index($username=null) {
		$user = $this->User->findByUsername($username);
		
		$user_profile = $this->Profile->findByUserId($user['User']['id']);
		
		$this->Session->write('profileId', $user_profile['Profile']['id']);
		
		//$this->UserThread->contain();
		
		$shouts = $this->UserThread->getThreadsByUserId($user['User']['id']);
		
		$shouterIds = Set::extract('/UserThread/user_id', $shouts);
		
		$this->set(
			array(
				'user_profile' => $user_profile,
				'user' => $user,
				'jobCategory' => $this->JobCategory->findById($user_profile['Profile']['job_category']),
				'resumeList' => $this->Resume->find('all', array(
					'conditions' => array(
						'Resume.user_id' => $user_profile['Profile']['user_id'],
						'Resume.status' => 'active'
					),
					'order' => array('Resume.created_on' => 'DESC')
				)),
				'thoughts' => $this->Thought->find('all', array(
					'conditions' => array(
						'Thought.user_id' => $user_profile['Profile']['user_id'],
						'Thought.status' => 'active'
					),
					'order' => array('stamp' => 'DESC')
				)),
				'shouts' => $shouts
			)
		);
		
		if ($shouterIds) {
			$this->set('shouters', $this->Profile->getProfilesInfoFromUserIds($shouterIds));
		} else {
			$this->set('shouters', array());
		}
		
		$this->loadModel('ProfileAnalytic');
		
		$userId = $this->Session->read('Auth.User.id');
		
		//Log who views this profile
		if ($userId && $userId != $user_profile['Profile']['user_id']) {
			$this->ProfileAnalytic->updateProfileViewStats($user_profile['Profile']['id'], $userId);
		}
	}
	
	function edit($id) {
		
		$this->set(array(
			'countryList' => $this->Country->find('list', array('fields' => array('Country.id', 'Country.country_name'))),
			'jobCategoryList' => $this->JobCategory->find('list', array('fields' => array('JobCategory.id', 'JobCategory.category_name')))
		));
		
		if (empty($this->data)) {
			$this->Profile->id = $id;
			$this->data = $this->Profile->read();
			
		} else {
			
			//$uploaded = $this->JqImgcrop->uploadImage($this->data['Profile']['photo'], '/userphoto', 'prefix_');
			
			if ($this->Profile->save($this->data)) {
				
				$this->Session->setFlash('Your profile has been updated');
			}
			
		}
	}
	
	function upload_photo() {
		$this->layout = false;
	}
	
	function process_upload_photo() {
		$this->layout = false;
		if (!empty($this->data)) {
			$uploaded = $this->JqImgcrop->uploadImage($this->data['Profile']['image'], '/userphoto/', 'user_'.time().'_');
			$this->set('uploaded', $uploaded);
		}
	}
	
	function crop_photo() {
		
		Configure::write('debug', 0);
		
		$this->layout = false;
		
		$cropped_image = basename($this->JqImgcrop->cropImage(120, 
				$this->data['Profile']['x1'], 
				$this->data['Profile']['y1'], 
				$this->data['Profile']['x2'], 
				$this->data['Profile']['y2'], 
				$this->data['Profile']['w'], 
				$this->data['Profile']['h'], 
				$this->data['Profile']['imagePath'], 
				$this->data['Profile']['imagePath'])
		);
		
		$this->set('cropped_image', $cropped_image);
		
		$profile = $this->Profile->findByUserId($this->Session->read('Auth.User.id'));
		
		$this->data['Profile']['id'] = $profile['Profile']['id'];
		$this->data['Profile']['user_id'] = $profile['Profile']['user_id'];
		$this->data['Profile']['photo'] = $cropped_image;
		$this->Profile->save($this->data);
		
		//$this->Profile->id = $profile['Profile']['id'];
		//$this->Profile->saveField('photo', $cropped_image);
		$this->Session->write('profile', $this->Profile->findByUserId($this->Session->read('Auth.User.id')));

	}
	
}

?>