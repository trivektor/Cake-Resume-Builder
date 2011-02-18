<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	
	var $components = array(
		'Auth', 
		'Session',
		'Cookie',
		'DebugKit.Toolbar'
	);
	
	var $uses = array('Profile', 'JobCategory', 'JobIndustry', 'Country');
	
	function beforeFilter() {
		if (!$this->Session->read('profile')) {
			$this->Session->write('profile', $this->Profile->findByUserId($this->Session->read('Auth.User.id')));
		}
		$profile = $this->Session->read('profile');
		//$this->profile = $profile;
		$this->set(array(
			'profile' => $profile,
			'job_categories' => $this->JobCategory->getJobCategories(),
			'job_industries' => $this->JobIndustry->getJobIndustries(),
			'countries' => $this->Country->getCountriesList()
		));
	}
	
}
