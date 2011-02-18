<? $username = $this->Session->read('Auth.User.username') ?>

<div id="header_wrapper">
	
	<div id="header">
	
		<h1 id="app_logo"><?=$html->link('Killer Resume Builder', array('controller' => 'home', 'action' => 'index'))?></h1>
	
		<? if ($username) { ?>
		<ul id="top_panel">
			
				<!-- User is logged in -->		
				
				<? $is_logged_in = $session->read('Auth.User.id') ? true : false ?>
				<li><?= $html->link('Feedback', array('controller' => 'feedback', 'action' => 'index'), array('class' => 'last')) ?></li>
				<li><?= $html->link('Tour', array('controller' => 'pages', 'action' => 'tour')) ?></li>
				<li><?= $html->link('Blog', array('controller' => 'blogs', 'action' => 'index')) ?></li>
				<li><?= $html->link($is_logged_in ? 'Dashboard' : 'Home', !$is_logged_in ? '/home' : '/dashboard') ?></li>
				<li id="username_tab">
					<span><?=$profile['Profile']['first_name']?> <?=$profile['Profile']['last_name']?>!</span>
					<div id="account_links" style="display:none">
					<ul class="white_region">
						<li><?=$html->link('Profile', array('controller' => 'profiles', 'action' => 'index', $username), array('class' => 'view_profile profile_control_links'))?></li>
						<li><?=$html->link('Edit Profile', array('controller' => 'profiles', 'action' => 'index', $username), array('class' => 'edit_profile_btn profile_control_links'))?></li>
						<? if (!$profile['User']['fbid']) { ?>
						<li><?=$html->link('Account Settings', array('controller' => 'users', 'action' => 'account_settings'), array('id' => 'edit_account_settings', 'class' => 'edit_account_settings profile_control_links'))?></li>
						<? } ?>
						<li>
						<? if ($profile['User']['fbid']) {
							echo $this->element('fb_login_button');
						} else {
							echo $html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'logout profile_control_links'));
						}
						?>
						<div class="clearfloat"></div>
						</li>
						<li class="omega"><a id="close_account_links" class="close profile_control_links">Close</a></li>
					</ul>
					</div>
				</li> 
			
		</ul>
		
		
		
		<div class="clearfloat"></div>
		
		<? } else {
	
			echo $html->image('resume/login.png', array('id' => 'login_link'));
			
			echo $html->link(
				$html->image('resume/signup.png'), 
				array('controller' => 'users', 'action' => 'register'), 
				array('id' => 'signup_link', 'escape' => false)
			);
		
		} 
		?>
		
	</div>
	
	<div id="header_nav_wrapper">
		<div class="site_search">
			
			<?=$form->create('Job', array('action' => 'search'))?>
				<?=$html->image('resume/startSearchBtn.png', array('id' => 'start_search_job', 'class' => 'start_search_btn'))?>			
				<?=$form->input('Job.keywords', array('type' => 'text', 'id' => 'resume_search', 'value' => 'Search jobs', 'class' => 'site_search_box focusLabel', 'rel' => 'Search jobs',
				'div' => false, 'label' => false))?>
				<?=$html->link('Advanced', array('controller' => 'jobs', 'action' => 'search', 'mode' => 'advanced'), array('class' => 'site_search_options'))?>
			</form>
			<div class="clearfloat"></div>
		</div>
		<div class="clearfloat"></div>
	</div>
	
</div>