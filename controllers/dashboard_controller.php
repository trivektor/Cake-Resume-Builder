<?

class DashboardController extends AppController {
	
	var $name = 'Dashboard';
	
	var $uses = array('Resume');
	
	var $helpers = array('Markdown', 'Slug', 'Timestamp');
	
	var $cacheAction = '1 hour';
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function index() {
		
		$this->loadModel('Profile');
		
		$resumeList = $this->Resume->getResumeByUserId($this->Session->read('Auth.User.id'));
		
		$this->set('resumeList', $resumeList);
		
		$resumes = array();
		
		foreach ($resumeList as $r) {
			$resumes[$r['Resume']['id']] = array('resume_name' => $r['Resume']['title'], 'resume_url' => $r['Resume']['url']);
		}
		
		$this->loadModel('Activity');
		
		if ($resumes) {
			$resumeLikes = $this->Activity->getResumeLikes(array_keys($resumes));
		} else {
			$resumeLikes = array();
		}
		
		$this->loadModel('User');
		
		if ($resumeLikes) {
			$usernames = $this->User->getUsernamesFromIds(array_keys($resumeLikes));
		} else {
			$usernames = array();
		}
		
		$this->loadModel('Profile');
		
		$profilesInfo = $this->Profile->getProfilesInfoFromUserIds(array_keys($resumeLikes));
			
		$likes = array();
		
		//pr($resumeLikes);
		
		foreach ($resumeLikes as $likerId => $val) {
			$likes[$usernames[$likerId]] = array(
			'activity_id' => $val[2],
			'profile' => $profilesInfo[$likerId],
			'resume_id' => $val[0],  
			'resume_name' => $resumes[$val[0]]['resume_name'],
			'resume_url' => $resumes[$val[0]]['resume_url'],
			'stamp' => $val[1]);
		}
		
		$activities = array();
		
		$activities['likes'] = $likes;
		
		$this->set('activities', $activities);
		
		$this->loadModel('ResumeTip');
		
		$this->set('resumeTips', $this->ResumeTip->randomizeTip());
		
		$this->loadModel('JobCategory');
		
		$profile = $this->viewVars['profile'];
		
		if ($profile['Profile']['job_category']) {
			$this->set('profile_job_category', $this->JobCategory->getJobCategoryById($profile['Profile']['job_category']));
		} else {
			$this->set('profile_job_category', '');
		}
		
		$this->loadModel('Job');
		
		if ($profile['Profile']['job_category']) {
			$this->set('jobs', $this->Job->getJobByCategory($profile['Profile']['job_category']));
		} else {
			$this->set('jobs', array());
		}
		
		$this->set('jobsPostedByYou', $this->Job->getJobsPostedByUserId($this->Session->read('Auth.User.id')));
		
		$this->loadModel('JobApplication');
		
		$this->set('job_applications', $this->JobApplication->getJobApplicationByUserId($this->Session->read('Auth.User.id')));
		
		$this->loadModel('FavoriteJob');
		
		$this->set('favorite_jobs', $this->FavoriteJob->getFavoritesJobsByUser($this->Session->read('Auth.User.id')));
		
		$this->loadModel('Blog');
		
		$this->set('blogs', $this->Blog->getBlogs(3));
		
		$this->loadModel('SavedSearchResult');
		$this->set('saved_search_results', $this->SavedSearchResult->getSavedResultsByUserId($this->Session->read('Auth.User.id')));
		
		$this->loadModel('ProfileAnalytic');
		$this->set('profile_view_stats', $this->ProfileAnalytic->getProfileViewStatsById($profile['Profile']['id']));
		
	}
	
}

?>