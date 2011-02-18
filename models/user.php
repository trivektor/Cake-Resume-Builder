<?

class User extends AppModel {
	
	var $name = 'User';
	
	var $useTable = 'users';
	
	var $hasOne = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		)
	);
	
	var $hasMany = array(
		'Resume' => array(
			'className' => 'Resume',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		),
		'Message' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		),
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		),
		'FavoriteJob' => array(
			'className' => 'FavoriteJob',
			'foreignKey' => 'job_id',
			'dependent' => TRUE
		),
		'UserThread' => array(
			'className' => 'UserThread',
			'foreignKey' => 'user_id',
			'dependent' => TRUE
		),
		'SavedSearchResult' => array(
			'className' => 'SavedSearchResult',
			'foreignKey' => 'user_id',
			'depedent' => TRUE
		)
	);
	
	var $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => TRUE,
				'message' => 'Your username can only contain of letters, numbers, and no spaces'
			),
			'between' => array(
				'rule' => array('between', 5,15),
				'message' => 'Your username must be at least 5 characters and at most 15 characters'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This username is not available'
			)
		),
		'passwd' => array(
			'minLength' => array(
				'rule' => array('minLength', 4),
				'message' => 'Your password must be at least 8 characters'
			)
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'required' => TRUE,
				'message' => 'Please use a valid email address'
			),
			'isUnique' => array(
			 	'rule' => 'isUnique',
				'message' => 'This email is not available'
			)
		),
		'first_name' => array(
			'rule' => 'notEmpty',
			'message' => 'First name is required'
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Last name is required'
		),
		'captcha' => array(
			'rule' => array('matchCaptcha'),
			'message' => 'The code you entered did not match the one in the image'
		)
	);
	
	function identicalFieldValues($fields=array(), $compare_field=null) {
		foreach ($fields as $key => $value) {
			$v1 = $value;
			$v2 = $this->data[$this->name][$compare_field];
			if ($v1 !== $v2) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	
	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}
	
	function beforeSave() {
		if (isset($this->data['User']['passwd'])) {
					$this->data['User']['password'] = Security::hash($this->data['User']['passwd'], 'sha1', true);
					$this->data['User']['plain_password'] = $this->data['User']['passwd'];
					unset($this->data['User']['passwd']);
				}
				if (isset($this->data['User']['passwd_confirm'])) {
					unset($this->data['User']['passwd_confirm']);
				}
		return true;
	}
	
	function emailExists($email) {
		return $this->find('count', array(
			'fields' => 'DISTINCT User.email',
			'conditions' => array('User.email' => $email)
		)) == 1;
	}
	
	function emailIsUnique($email) {
		return $this->find('count', array(
			'fields' => 'DISTINCT User.id',
			'conditions' => array('User.email' => $email)
		)) == 0;
	}
	
	function getResumeLikers($likerIds) {
		return $this->User->find('all', array(
			'conditions' => array('IN' => array('User.id' => $likerIds))
		));
	}
	
	function getUsernamesFromIds($userIds) {
		$usernames = array();
		$query = $this->query("SELECT id, username FROM users WHERE id IN (".implode(',',$userIds).')');
		
		foreach($query as $q) {
			$usernames[$q['users']['id']] = $q['users']['username'];
		}
		
		return $usernames;
	}
	
}


?>