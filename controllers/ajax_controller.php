<?

class AjaxController extends AppController {
	
	var $name = 'Ajax';
	
	var $uses = array();
	
	var $components = array('Auth', 'RequestHandler', 'Security');
	
	//var $helpers = array('Cookie');
	
	function beforeFilter() {
		$this->autoRender = false;
		$this->Auth->allow('*');
		Configure::write('debug', 0);
	}
	
	function sort_education() {
		
		$this->loadModel('ResumeEducation');
		
		$ids = $this->params['form']['id'];
		$weight = count($ids);
		
		$resumeEducation = $this->ResumeEducation->findById($ids[0]);
		$i = 0;
		
		foreach ($ids as $id) {
			$this->data['ResumeEducation']['id'] = $id;
			$this->data['ResumeEducation']['resume_id'] = $resumeEducation['ResumeEducation']['resume_id'];
			$this->data['ResumeEducation']['weight'] = $weight--;
			$this->ResumeEducation->save($this->data);
		}
		
	}
	
	function sort_references() {
		$this->loadModel('ResumeReference');
		
		$ids = $this->params['form']['id'];
		$weight = count($ids);
		
		$resumeReference = $this->ResumeReference->findById($ids[0]);
		$i = 0;
		
		foreach ($ids as $id) {
			$this->data['ResumeReference']['id'] = $id;
			$this->data['ResumeReference']['resume_id'] = $resumeReference['ResumeReference']['resume_id'];
			$this->data['ResumeReference']['weight'] = $weight--;
			$this->ResumeReference->save($this->data);
		}
	}
	
	function sort_experience() {
		$this->loadModel('ResumeWorkExperience');
		
		$ids = $this->params['form']['id'];
		$weight = count($ids);
		
		$resumeWorkExperience = $this->ResumeWorkExperience->findById($ids[0]);
		$i = 0;
		
		foreach ($ids as $id) {
			$this->data['ResumeWorkExperience']['id'] = $id;
			$this->data['ResumeWorkExperience']['resume_id'] = $resumeWorkExperience['ResumeWorkExperience']['resume_id'];
			$this->data['ResumeWorkExperience']['weight'] = $weight--;
			$this->ResumeWorkExperience->save($this->data);
		}
	}
	
	function update_resume_settings() {
		$this->autoRender = false;
		$params = $this->params['form'];
		$this->loadModel('ResumeSetting');
		$resumeSetting = $this->ResumeSetting->findByResumeId($params['resume_id']);
		$this->data['ResumeSetting']['id'] = $resumeSetting['ResumeSetting']['id'];
		$this->data['ResumeSetting']['resume_id'] = $params['resume_id'];
		foreach (array('status', 'hide_personal_info', 'email_notification', 'alert_copy', 'show_last_updated') as $f) {
			$this->data['ResumeSetting'][$f] = $params[$f];
		}
		$this->ResumeSetting->save($this->data);
	}
	
	function sort_resume_sections() {
		$sections = array(
			1 => 'personal_information',
			2 => 'education',
			3 => 'skills',
			4 => 'work_experience',
			5 => 'references',
			6 => 'field_works',
			7 => 'keywords'
 		);
		$ids = $this->params['form']['id'];
		$resume_id = $this->params['form']['resumeId'];
		$section_orders = array();

		foreach ($ids as $id) {
			$section_orders[] = $sections[$id]; 
		}
		
		$this->loadModel('ResumeSectionOrder');
		
		$resumeSectionOrder = $this->ResumeSectionOrder->findByResumeId($resume_id);
		
		$this->data['ResumeSectionOrder']['id'] = $resumeSectionOrder['ResumeSectionOrder']['id'];
		$this->data['ResumeSectionOrder']['resume_id'] = $resume_id;
		$this->data['ResumeSectionOrder']['section_orders'] = implode('/', $section_orders);
		pr($this->data);
		$this->ResumeSectionOrder->save($this->data);
	}
	
	function update_resume_theme() {
		$this->loadModel('ResumeTheme');
		$this->data['ResumeTheme']['id'] = $this->params['form']['id'];
		$this->data['ResumeTheme']['resume_id'] = $this->params['form']['resume_id'];
		$this->data['ResumeTheme']['theme'] = $this->params['form']['theme_id'];
		$this->ResumeTheme->save($this->data);
	}
	
	function update_section_name() {
		
		$this->loadModel('ResumeSectionName');
		$this->data['ResumeSectionName']['resume_id'] = $this->params['form']['resume_id'];
		$this->data['ResumeSectionName']['section'] = $this->params['form']['section'];
		$this->data['ResumeSectionName']['name'] = $this->params['form']['name'];
		$this->data['ResumeSectionName']['id'] = $this->params['form']['id'];
		
		if ($this->params['form']['name'] == '') {
			echo -999;
			return;
		}
		
		if ($this->ResumeSectionName->save($this->data)) {
			echo 1;
		} else {
			echo -1;
		}
		$this->autoRender = false;
	}
	
	function update_section() {
		$this->loadModel('ResumeHiddenField');
		
		$this->data['ResumeHiddenField']['resume_id'] = $this->params['form']['resume_id'];
		
		if ($this->params['form']['action'] == 'disable') {
			$this->data['ResumeHiddenField']['hidden_field'] = $this->params['form']['hidden_field'];
			if ($this->ResumeHiddenField->save($this->data)) {
				echo 1;
			}
		} else {
			$this->ResumeHiddenField->deleteAll(
				array(
					'resume_id' => $this->params['form']['resume_id'],
					'hidden_field' => $this->params['form']['hidden_field']
				)
			);
			echo 1;
		}
		
		$this->autoRender = false;
	}
	
	function upload_photo() {
		
	}
	
	function send_direct_message() {
		
		// $this->loadModel('Message');
		// 		
		// 		$this->data['Message']['sender_id'] = $this->Session->read('Auth.User.id');
		// 		$this->data['Message']['subject'] = $this->params['form']['subject'];
		// 		$this->data['Message']['body'] = $this->params['form']['body'];
		// 		$this->data['Message']['user_id'] = $this->Session->read('resumeOwnerId');
		// 		echo $this->Message->save($this->data) ? 1 : -1;
		
		$this->loadModel('Profile');
		
		$profile = $this->Profile->findByUserId($this->Session->read('Auth.User.id'));
		
		$this->loadModel('User');
		
		$user = $this->User->findById($this->Session->read('Auth.User.id'));
		
		$receiver = $this->User->findById($this->Session->read('resumeOwnerId'));
		
		$this->loadModel('MailQueue');
		$this->data['MailQueue']['name'] = $profile['Profile']['full_name'];
		$this->data['MailQueue']['from'] = $user['User']['email'];
		$this->data['MailQueue']['to'] = $receiver['User']['email'];
		$this->data['MailQueue']['subject'] = $this->params['form']['subject'];
		$this->data['MailQueue']['body'] = $this->params['form']['body'];
		echo $this->Message->save($this->data) ? 1 : -1;
	}
	
	function update_keywords_list() {
		$this->loadModel('ResumeKeyword');
		$this->data['ResumeKeyword']['resume_id'] = $this->params['form']['resume_id'];
		$this->data['ResumeKeyword']['keywords'] = $this->params['form']['keywords'];
		$this->ResumeKeyword->save($this->data);
	
		//echo $this->ResumeKeyword->id;
		echo json_encode(array('id' => $this->ResumeKeyword->id, 'keyword' => $this->params['form']['keywords']));
	}
	
	function remove_keywords() {
		$this->loadModel('ResumeKeyword');
		$this->ResumeKeyword->delete($this->params['form']['id']);
	}
	
	function login() {
		
		$this->loadModel('User');
		
		if ($this->RequestHandler->isAjax()) {
			// $this->data['User']['username'] = 'trivektor';
			// 			$this->data['User']['email'] = 'trivektor@gmail.com';
			// 			$this->data['User']['password'] = '6f43501210b4547462605126e30f6614da6c2c82';
			// 			echo $this->Auth->login($this->data) ? 1 : 0;
			$email = $_POST['email'];
			$password = $_POST['password'];
			$hash_password = Security::hash($password, 'sha1', true);
			
			if ($result = $this->User->find(array('email' => $email, 'password' => $hash_password))) {
				$this->data['User']['username'] = $result['User']['username'];
				$this->data['User']['password'] = $hash_password;
				$this->data['User']['email'] = $email;
				
				if ($this->Auth->login($this->data)) {
					
					echo 1;
				} else {
					echo 0;
				}
				
				
			} else {
				echo -1;
			}
			
		}
	}
	
	function forgot_password() {
		$this->loadModel('User');
		$email = $this->params['form']['email'];
		$user = $this->User->findByEmail($email);
		if ($user) {
			$this->loadModel('MailQueue');
			if ($this->MailQueue->sendPasswordReminder(array(
				'name' => 'Killer Resume Builder',
				'from' => 'noreply@resumebuilder.org',
				'to' => $email,
				'subject' => 'Password Reminder - Killer Resume Builder',
				'body' => "Hi {$user['User']['username']}, 
				
Your password to login at http://www.resumebuilder.org is 
				
------------
{$user['User']['plain_password']}
------------

If you have any question, please contact us.

Regards,

Killer Resume Builder"
			))) {
				echo json_encode(array(
					'result' => 1,
					'message' => 'A password reminder has been sent to your email'
				));
			}
		} else {
			echo json_encode(array(
				'result' => -1,
				'message' => 'No such email was found in our system'
			));
		}
	}
	
	function like_resume() {
		
		if ($resumeId = $this->Session->read('resumeId')) {
			$this->loadModel('Activity');
			$this->data['Activity']['user_id'] = $this->Session->read('Auth.User.id');
			$this->data['Activity']['action_id'] = 1;
			$this->data['Activity']['entity_id'] = $this->Session->read('resumeId');
			$this->data['Activity']['entity_type'] = 'resume';
			$this->data['Activity']['description'] = '';
			$this->Activity->save($this->data);
		}
		
	}
	
	function send_thought() {
		$this->loadModel('Thought');
		$this->data['Thought']['user_id'] = $this->Session->read('Auth.User.id');
		$this->data['Thought']['thought'] = $this->params['form']['thought'];
		$this->Thought->save($this->data);
	}
	
	function hide_activity() {
		$this->loadModel('Activity');
		$this->data['Activity']['id'] = $this->params['form']['activity_id'];
		$this->data['Activity']['hidden'] = 1;
		echo $this->Activity->save($this->data) ? 1 : 0;
	}
	
	function fav_job() {

		$this->loadModel('FavoriteJob');
		$user_id = $this->Session->read('Auth.User.id');
		if (!$this->FavoriteJob->find('all', array('conditions' => array('FavoriteJob.user_id' => $user_id, 'job_id' => $this->params['form']['job_id'])))) {
			$this->data['FavoriteJob']['user_id'] = $user_id;
			$this->data['FavoriteJob']['job_id'] = $this->params['form']['job_id'];
			if ($this->FavoriteJob->save($this->data)) {
				$this->loadModel('Job');
				$job =  $this->Job->findById($this->params['form']['job_id']);
				echo json_encode(array(
					'action' => 'fav_job',
					'result' => 1,
					'message' => 'Job has been added to your favorite list',
					'job_id' => $job['Job']['id'],
					'job_slug' => $job['Job']['slug'],
					'job_title' => $job['Job']['title'],
					'company_name' => $job['Job']['company_name'],
					'company_slug' => $job['Job']['company_slug'],
					'posted_date' => date("Y M, d", strtotime($job['Job']['stamp']))
				));
				
			} else {
				echo -1;
			}
		} else {
			echo -1;
		}
		
		
	}
	
	function unfav_job() {
		$this->loadModel('FavoriteJob');
		if ($this->FavoriteJob->query('DELETE FROM favorite_jobs WHERE job_id = '.$this->params['form']['job_id'])) {
			echo json_encode(array(
				'action' => 'unfav_job',
				'result' => 1,
				'message' => 'Job has been removed from your favorite list',
				'job_id' => $this->params['form']['job_id']
			));
		}
	}
	
	function shout() {
		$type = $this->params['form']['type'];
		$this->loadModel('UserThread');
		$this->data['UserThread']['user_id'] = $this->Session->read('Auth.User.id');
		$this->data['UserThread']['target_id'] = $this->Session->read($type.'Id');
		$this->data['UserThread']['content'] = $this->params['form']['shout'];
		$this->data['UserThread']['private'] = $this->params['form']['make_private'];
		echo $this->UserThread->save($this->data) ? 1 : 0;
	}
	
	function update_profile() {
		$this->loadModel('Profile');
		$profile = $this->Profile->findByUserId($this->Session->read('Auth.User.id'));
		$this->data['Profile']['id'] = $profile['Profile']['id'];
		$this->data['Profile']['user_id'] = $profile['Profile']['user_id'];
		$this->data['Profile']['first_name'] = $this->params['form']['first_name'];
		$this->data['Profile']['last_name'] = $this->params['form']['last_name'];
		$this->data['Profile']['city'] = $this->params['form']['city'];
		$this->data['Profile']['state'] = $this->params['form']['state'];
		$this->data['Profile']['postal_code'] = $this->params['form']['postal_code'];
		$this->data['Profile']['country_id'] = $this->params['form']['country_id'];
		$this->data['Profile']['job_title'] = $this->params['form']['job_title'];
		$this->data['Profile']['job_category'] = $this->params['form']['job_category'];
		$this->data['Profile']['job_industry'] = $this->params['form']['job_industry'];
		$this->data['Profile']['hidden'] = $this->params['form']['hidden'];
		echo $this->Profile->save($this->data) ? 1 : 0;
		$this->Session->write('profile', $this->Profile->findByUserId($this->Session->read('Auth.User.id')));
	}
	
	function upload_profile_photo() {
		App::import('Vendor', 'photoupload');
	}
	
	function save_search_results() {
		$this->loadModel('SavedSearchResult');
		$this->data['SavedSearchResult']['user_id'] = $this->Session->read('Auth.User.id');
		$this->data['SavedSearchResult']['name'] = $this->params['form']['name'];
		$this->data['SavedSearchResult']['url'] = $this->params['form']['url'];
		$this->data['SavedSearchResult']['type'] = $this->params['form']['type'];
		echo $this->SavedSearchResult->save($this->data) ? 1 : 0;
	}
	
	function remove_search_results() {
		$this->loadModel('SavedSearchResult');
		$this->SavedSearchResult->delete($this->params['form']['id']);
	}
	
	function recommend_post() {
		$this->loadModel('BlogRecommendation');
		$this->data['BlogRecommendation']['blog_id'] = $this->params['form']['id'];
		$this->data['BlogRecommendation']['ip_address'] = $_SERVER['SERVER_ADDR'];
		$this->BlogRecommendation->save($this->data);
	}
	
	function remove_profile_comment() {
		$this->loadModel('UserThread');
		$this->UserThread->delete($this->params['form']['comment_id']);
	}
	
	function report_profile_comment() {
		$this->loadModel('UserThread');
		$this->data['UserThread']['id'] = $this->params['form']['comment_id'];
		$this->data['UserThread']['reported'] = 1;
		$this->UserThread->save($this->data);
	}
	
	function update_account_password() {
		$this->loadModel('User');
		$password = $this->params['form']['password'];
		if (strlen($password) < 4) {
			echo json_encode(array(
				'result' => -1,
				'message' => 'Your password needs to be at least 4 characters'
			));
		} else {
				//If we don't have all these fields, save() won't work as update,
				//this leads us to thinking of going with set();
				// $this->data['User']['id'] = $this->Session->read('Auth.User.id');
				// 				$this->data['User']['email'] = $this->Session->read('Auth.User.email');
				// 				$this->data['User']['username'] = $this->Session->read('Auth.User.username');
				// 				$this->data['User']['plain_password'] = $password;
				// 				$this->data['User']['password'] = Security::hash($password, 'sha1', true);
				
				$this->User->read(null, $this->Session->read('Auth.User.id'));
				$this->User->set('plain_password', $password);
				$this->User->set('password', Security::hash($password, 'sha1', true));
				
				if ($this->User->save()) {
					echo json_encode(array(
						'result' => 1,
						'message' => 'Your password has been updated'
					));
				} else {
					echo json_encode(array(
						'result' => -3,
						'message' => 'An error occured. Please try again later'
					));
				}
		}
	}
	
	function update_account_email() {
		$this->loadModel('User');
		$email = $this->params['form']['email'];
		if (!$this->User->emailIsUnique($email)) {
			echo json_encode(array(
				'result' => -1,
				'message' => 'This email is not available'
			));
		} else {
			$this->User->read(null, $this->Session->read('Auth.User.id'));
			$this->User->set('email', $email);
			
			if ($this->User->save()) {
				echo json_encode(array(
					'result' => 1,
					'message' => 'Your email has been updated'
				));
			} else {
				echo json_encode(array(
					'result' => -3,
					'message' => 'An error occured. Please try again later'
				));
			}
		}
	}
}

?>