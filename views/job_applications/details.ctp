<? $this->set('title_for_layout', 'Review job application details') ?>

<? $details = $job_application_details['JobApplication'] ?>

<div class="blue_region">
		<h2>Details</h2>
		<ul class="item_list">
			<li class="white_region">
				<label>Applicant's email</label>
				<input type="text" class="textbox" value="<?=$details['email']?>" readonly="readonly" />
			</li>
			<li class="white_region">
				<label>Applicant's phone number</label>
				<input type="text" class="textbox" value="<?=$details['phone_number']?>" readonly="readonly" />
			</li>
			<li class="white_region">
				<label>City</label>
				<input type="text" class="textbox" value="<?=$details['city']?>" readonly="readonly" />
			</li>
			<li class="white_region">
				<label>State/Province</label>
				<input type="text" class="textbox" value="<?=$details['state']?>" readonly="readonly" />
			</li>
			<li class="white_region">
				<?=$form->input('country', array('options' => $countries, 'selected' => $details['country'], 'div' => false))?>
			</li>
			<li class="white_region">
				<label>Resume</label>
				<a href="/files/resume/<?=$details['resume']?>">View Resume</a>
			</li>
			<? if ($details['cover_letter']) { ?>
			<li class="white_region">
				<label>Cover Letter</label>
				<p><?=$details['cover_letter']?></p>
			</li>
			<? } ?>
		</ul>
</div>