<?php
/**
 * Routes Configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
	Router::connect('/signup', array('controller' => 'users', 'action' => 'register'));
	
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	
	/* Profile */
	Router::connect('/profile/edit/*', array('controller' => 'profiles', 'action' => 'edit'));
	
	Router::connect('/profile/process_upload_photo', array('controller' => 'profiles', 'action' => 'process_upload_photo'));
	
	Router::connect('/profile/upload_photo', array('controller' => 'profiles', 'action' => 'upload_photo'));
	
	Router::connect('/profile/crop_photo', array('controller' => 'profiles', 'action' => 'crop_photo'));
	
	Router::connect('/profile/*', array('controller' => 'profiles', 'action' => 'index'));
	
	/* Experience */
	Router::connect('/experience/add/*', array('controller' => 'resume_work_experiences', 'action' => 'add'));
	
	Router::connect('/experience/edit/*', array('controller' => 'resume_work_experiences', 'action' => 'edit'));
	
	Router::connect('/experience/delete/*', array('controller' => 'resume_work_experiences', 'action' => 'delete'));
	
	/* Education */
	Router::connect('/education/add/*', array('controller' => 'resume_educations', 'action' => 'add'));
	
	Router::connect('/education/edit/*', array('controller' => 'resume_educations', 'action' => 'edit'));
	
	Router::connect('/education/delete/*', array('controller' => 'resume_educations', 'action' => 'delete'));
	
	/* References */
	Router::connect('/reference/add/*', array('controller' => 'resume_references', 'action' => 'add'));
	
	Router::connect('/reference/edit/*', array('controller' => 'resume_references', 'action' => 'edit'));
	
	Router::connect('/reference/delete/*', array('controller' => 'resume_references', 'action' => 'delete'));
	
	/* Messages */
	Router::connect('/messages', array('controller' => 'messages', 'action' => 'index'));
	
	Router::connect('/messages/view/*', array('controller' => 'messages', 'action' => 'view'));
	
	/* Blog */
	Router::connect('/blog', array('controller' => 'blogs', 'action' => 'index'));
	Router::connect('/blog/*', array('controller' => 'blogs', 'action' => 'view'));
	
	/* Feedback */
	
	Router::connect('/feedback', array('controller' => 'feedbacks', 'action' => 'index'));
	//Router::connect('/feedback/reply/*', array('controller' => 'feedback_comments', 'action' => 'reply'));
	Router::connect('/feedback/*', array('controller' => 'feedbacks', 'action' => 'view'));
	Router::connect('/give-feedback', array('controller' => 'feedbacks', 'action' => 'create'));
	
