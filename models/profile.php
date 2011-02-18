<?

class Profile extends AppModel {
	
	var $name = 'Profile';
	
	var $useTable = 'profiles';
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		)
	);
	
	var $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your first name'
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your last name'
		)
	);
	
	// function beforeSave() {
	// 		App::import('Component', 'JqImgcrop');
	// 		$jqimgcrop = new JqImgcropComponent();
	// 		//App::import('Helper', 'Cri');
	// 		if (empty($this->data['Profile']['photo']['size'])) {
	// 			$this->data['Profile']['photo'] = '';
	// 		} else {
	// 			//$this->data['Profile']['photo'] = $this->JqImgcrop->uploadImage($this->data['Profile']['photo'], '/userphoto', 'prefix_');;
	// 			pr($jqimgcrop->uploadImage($this->data['Profile']['photo'], '/userphoto/', 'user_'));
	// 			exit;
	// 		}
	// 		return true;
	// 	}
	
	function getProfilesInfoFromUserIds($ids) {
		$profiles = $this->find('all', array(
			'fields' => array('Profile.user_id', 'Profile.first_name', 'Profile.last_name', 'Profile.photo', 'Profile.gender'),
			'conditions' => array(
				'Profile.user_id' => $ids
			)
		));
		
		$profilesInfo = array();
		
		foreach ($profiles as $p) {
			$profilesInfo[$p['Profile']['user_id']] = array(
				'user_id' => $p['Profile']['user_id'], 
				'first_name' => $p['Profile']['first_name'], 
				'last_name' => $p['Profile']['last_name'],
				'photo' => $p['Profile']['photo'], 
				'gender' => $p['Profile']['gender']
			);
		}
		
		return $profilesInfo;
	}
	
}

?>