<div id="profile_overlay_wrapper" class="account_overlay_wrapper">
	<div class="account_overlay_left">
		<? 
		$profilePhoto = $profile['Profile']['photo']; 
		if ($profilePhoto == 'male.png' || $profilePhoto == 'female.png') {
			echo $this->Html->image('resume/'.$profilePhoto, array('class' => 'user_image'));
		} else if ($profilePhoto == '') {
			echo $this->Html->image('resume/male.png', array('class' => 'user_image'));
		} else {
			echo $this->Html->image('/userphoto/'.$profilePhoto, array('class' => 'user_image'));
		}
		?>
		<?= $this->Html->image('resume/changePhotoBtn.png', array('id' => 'change_photo_btn')) ?>
	</div>
	<div class="account_overlay_right">
		<div class="inner">
			<div id="profile_image_cropper" style="display:none">
				<iframe width="100%" height="400" frameborder="0" style="border:0" src="/profile/upload_photo" id="photouploadiframe"></iframe>
				<!-- <div id="upload_image_preview" style="overflow-x:auto"></div>
				<div id="file-uploader">       
				    <noscript>          
				        <p>Please enable JavaScript to use file uploader.</p>
				        
				    </noscript>         
				</div> -->
				
			</div>
			<div id="profile_details_input">
				<h2><?=$this->Html->image('resume/profileDetailsHeader.png', array('alt' => 'Profile'))?></h2>
				<div id="edit_profile_message" style="display:none"></div>
				<div class="form_row">
					<label>First Name</label>
					<input id="profile_first_name" type="text" class="textbox" value="<?=$profile['Profile']['first_name']?>" />
				</div>
				<div class="form_row">
					<label>Last Name</label>
					<input id="profile_last_name" type="text" class="textbox" value="<?=$profile['Profile']['last_name']?>" />
				</div>
				<div class="form_row">
					<label>City</label>
					<input id="profile_city" type="text" class="textbox" value="<?=$profile['Profile']['city']?>" />
				</div>
				<div class="form_row">
					<label>State/Province</label>
					<input id="profile_state" type="text" class="textbox" value="<?=$profile['Profile']['state']?>" />
				</div>
				<div class="form_row">
					<label>Country</label>
					<?=$form->input('country_id', array('options' => $countries, 'div' => false, 'label' => false,
					'selected' => $profile['Profile']['country_id'], 'id' => 'profile_country'))?>
				</div>
				<div class="form_row">
					<label>Postal Code</label>
					<input id="profile_postal_code" type="text" class="textbox" value="<?=$profile['Profile']['postal_code']?>" />
				</div>
				<div class="form_row">
					<label>Job Function</label>
					<?=$this->Form->input('job_category', array('options' => $job_categories, 'empty' => '----', 'id' => 'profile_category', 
					'selected' => $profile['Profile']['job_category'], 'label' => false))?>
				</div>
				<div class="form_row">
					<label>Industry</label>
					<?= $this->Form->input('job_industry', array('options' => $job_industries, 'empty' => '----', 'id' => 'profile_industry', 
					'selected' => $profile['Profile']['job_industry'], 'label' => false)) ?>
				</div>
				<div class="form_row">
					<label>Title</label>
					<input id="profile_job_title" type="text" class="textbox" value="<?=$profile['Profile']['job_title']?>" />
				</div>
				<p>
				<? 
				$profileHidden = $profile['Profile']['hidden']; 
				$profileHiddenChecked = $profileHidden ? 'checked="checked"' : '';
				?>
				<input type="checkbox" id="profile_hidden" <?=$profileHiddenChecked?> />
				<span>Hide my profile from search results</span></p>
				<?=$html->image('resume/updateProfileBtn.png', array('alt' => 'Update', 'class' => 'account_overlay_update_btn', 'id' => 'update_profile_btn'))?>
				<div class="clearfloat"></div>
			</div>
		</div>
	</div>
	<div class="clearfloat"></div>
	<?= $this->Html->image('resume/closeOverlay.png', array('id' => 'close_profile_overlay', 'class' => 'close_overlay')) ?>
</div>