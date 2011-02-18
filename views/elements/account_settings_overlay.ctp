<div id="account_settings_overlay_wrapper" class="account_overlay_wrapper">
	<div class="account_overlay_left">
		<?=$html->image('resume/accountSettingsLock.png', array('alt' => 'Account Settings', 'id' => 'account_settings_lock'))?>
	</div>
	<div class="account_overlay_right">
		<div class="inner">
			<h2><?=$html->image('resume/accountSettingsHeader.png', array('alt' => 'Account Settings'))?></h2>
			
			<!-- <div class="form_row">
				<label>Username</label>
				<input id="account_username" type="text" class="textbox" />
			</div> -->
			<div id="edit_account_settings_message" style="display:none"></div>
			<div class="form_row">
				<label>Email</label>
				<input id="account_email" type="text" class="textbox" value="<?=$profile['User']['email']?>" />
			</div>
			
			<?=$html->image('resume/updateProfileBtn.png', array('alt' => 'Update', 'class' => 'account_overlay_update_btn', 
			'id' => 'update_account_email_btn'))?>
			
			<div class="clearfloat"></div>
			
			<div class="form_row">
				<label>Password</label>
				<input id="account_password" type="password" class="textbox" />
			</div>
			
			
			<?=$html->image('resume/updateProfileBtn.png', array('alt' => 'Update', 'class' => 'account_overlay_update_btn', 
			'id' => 'update_account_password_btn'))?>
			<div class="clearfloat"></div>
		</div>
	</div>
	<div class="clearfloat"></div>
	<?= $html->image('resume/closeOverlay.png', array('class' => 'close_overlay')) ?>
</div>