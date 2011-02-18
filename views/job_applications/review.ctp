<? $this->set('title_for_layout', 'Review job application') ?>

<p style="margin-bottom:20px"><?=count($applicants)?> persons have applied for this job</p>

<div class="blue_region">
	<ul class="item_list">
		<? foreach ($applicants as $a) { ?>
			<li class="white_region">
				<div class="inner">
					<div class="left">
						<?=$html->link($a['User']['username'], array('controller' => 'profiles', 'action' => 'index', $a['User']['username']))?> 
						on 
						<?=date("M d, Y", strtotime($a['JobApplication']['stamp']))?>
					</div>
					<div class="options">
						<span class="view_live view_applicant_details" title="Click to view details" rel="<?=$a['JobApplication']['id']?>"></span>
						<input type="hidden" class="applicant_first_name" value="<?=$a['JobApplication']['first_name']?>" />
						<input type="hidden" class="applicant_last_name" value="<?=$a['JobApplication']['last_name']?>" />
						<input type="hidden" class="applicant_email" value="<?=$a['JobApplication']['email']?>" />
						<input type="hidden" class="applicant_phone_number" value="<?=$a['JobApplication']['phone_number']?>" />
						<input type="hidden" class="applicant_city" value="<?=$a['JobApplication']['city']?>" />
						<input type="hidden" class="applicant_state" value="<?=$a['JobApplication']['state']?>" />
						<input type="hidden" class="applicant_resume" value="<?=$a['JobApplication']['resume']?>" />
						<div style="display:none" class="applicant_cover_letter"><?=$a['JobApplication']['cover_letter']?></div>
						<input type="hidden" class="applicant_username" value="<?=$a['User']['username']?>" />
					</div>
				</div>
				
			</li>
		<? } ?>
	</ul>
</div>

<div id="job_applicant_details_overlay" class="job_applicant_details" style="display:none">
	<?=$html->image('resume/closeOverlay.png', array('alt' => 'Close', 'class' => 'close_overlay'))?>
	<div class="inner">
		<ul class="item_list">
			<li class="form_row">
				<label>First Name</label>
				<input id="applicant_first_name" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>Last Name</label>
				<input id="applicant_last_name" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>Email</label>
				<input id="applicant_email" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>Phone Number</label>
				<input id="applicant_phone_number" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>City</label>
				<input id="applicant_city" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>State/Province</label>
				<input id="applicant_state" type="text" class="textbox" value="" disabled="disabled" />
			</li>
			<li class="form_row">
				<label>Resume</label>
				<a id="applicant_resume" href="/files/resume" target="_blank">View Resume</a>
			</li>
			<li class="form_row">
				<label>Cover Letter</label>
				<div id="applicant_cover_letter"></div>
			</li>
			<li class="form_row">
				<label>Public Profile</label>
				<a id="applicant_profile" href="" target="_blank">View</a>
			</li>
		</ul>
	</div>
</div>

