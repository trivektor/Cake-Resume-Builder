<div id="forgotPasswordOverlayForm" style="display:none">
	<?=$html->image('resume/closeOverlay.png', array('id' => 'overlayForgotPasswordFormClose'))?>
	<div id="overlayForgotPasswordFormInner">
		<h2 id="forgotPasswordHeader">Forgot Password</h2>
		<div class="clearfloat"></div>
		<div id="forgotPasswordMessage" style="display:none"></div>
		<div class="form_row">
			<label>Enter your email below to retrieve your password</label>
			<input id="userEmail" type="text" class="textbox" />
		</div>
		<div style="text-align:right">
			<input id="cancelForgotPasswordForm" src="/img/resume/cancelLoginButton.png" type="image" />
			<input id="submitForgotPasswordForm" src="/img/resume/loginFormGo.png" type="image" />
		</div>
	</div>
</div>