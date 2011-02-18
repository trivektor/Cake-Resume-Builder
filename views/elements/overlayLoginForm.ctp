<div id="overlayLoginForm" style="display:none">
	
	<?=$html->image('resume/closeOverlay.png', array('id' => 'overlayLoginFormClose'))?>
	
	<div id="overlayLoginFormInner">
		<h2 id="overlayLoginFormHeader">Login</h2>
		<div class="clearfloat"></div>
		<div id="loginMessage" style="display:none;text-align:right"></div>
		<div class="form_row">
			<label>Email</label>
			<input type="text" class="textbox" id="loginFormUsername" />
		</div>
		<div class="form_row">
			<label>Password</label>
			<input type="password" class="textbox" id="loginFormPassword" />
		</div>
		<!-- <div id="overlayLoginFormRemember">
			<input type="checkbox" id="rememberMe" />
			<span>Keep me in for 2 weeks unless I sign out</span>
		</div> -->
		<div id="overlayLoginFormButtons">
			<input id="cancelLoginForm"  type="image" src="/img/resume/cancelLoginButton.png" />
			<input id="submitLoginForm" type="image" src="/img/resume/loginFormGo.png" />
		</div>
		<div id="overlayLoginFormBottom">
			<?=$this->element('fb_login_button')?>
			<?=$html->link('Forgot Password', array(), array('id' => 'forgot_password_trigger'))?> /
			<?=$html->link('Signup', array('controller' => 'users', 'action' => 'register'))?>
		</div>
	</div>
</div>

<div id="authenticatingMessage" style="display:none">
	<?=$html->image('resume/ajax-loader.gif', array('alt' => 'Logging in...', 'class' => 'ajax_loader'))?>
	<span id="authenticateMessageContent"></span>
</div>