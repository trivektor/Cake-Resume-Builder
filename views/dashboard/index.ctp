<? 
if (!empty($profile['Profile']['first_name'])) {
	$this->set('title_for_layout', 'Welcome '.$profile['Profile']['first_name'].'!');
} else {
	$this->set('title_for_layout', 'Dashboard');
}

?>

<!-- Thoughtbox starts -->
<h2 id="thoughtbox_header">Share your thought</h2>
<div id="thoughtbox_wrapper" class="blue_region">
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
	<div id="thoughtbox">
		<div id="thoughtbox_left">
			<div id="thoughtbox_right">
				<input type="text" id="thoughtbox_message" rel="Type your thought here..." value="Type your thought here..." />
			</div>
		</div>
		<?=$this->Html->image('resume/gobutton.png', array('id' => 'share_thought'))?>
	</div>
	<div class="clearfloat"></div>
	<div id="thoughts_chars_count_wrapper"><span id="thoughts_chars_count">140</span> characters left</div>
	<div class="clearfloat"></div>
</div>
<!-- Thoughtbox ends -->

<div class="clearfloat"></div>

<!-- Left col starts -->
<div class="left_col">

	<!-- Resumes list starts -->
	
		<h2>Your resumes</h2>
		<div id="your_resumes" class="blue_region">
			
			<? if ($resumeList) { ?>
			<ul id="resumes_list" class="item_list">
				<? foreach ($resumeList as $r) { ?>
					<li class="white_region">
						<div class="left">
							<?= $html->link($r['Resume']['title'], array('controller' => 'resumes', 'action' => 'edit', $r['Resume']['id'])) ?>
							<p class="timestamp">
							Last updated <?=$timestamp->toDate($r['Resume']['last_updated'])?> at <?=$timestamp->toHour($r['Resume']['last_updated'])?>
							</p>
						</div>
						<div class="options">
							<?
							echo $html->link('', array('controller' => 'resumes', 'action' => 'delete', $r['Resume']['id']), array('class' => 'delete', 'title' => 'Delete'));
							echo $html->link('', array('controller' => 'resumes', 'action' => 'view', $r['Resume']['url']), array('class' => 'view_live', 'title' => 'View', 'target' => '_blank'));
							echo $html->link('', array('controller' => 'resumes', 'action' => 'edit', $r['Resume']['id']), array('class' => 'edit', 'title' => 'Edit'));
							echo $html->link('', array('controller' => 'resumes', 'action' => 'analytic', $r['Resume']['id']), array('class' => 'analytic', 'title' => 'Analytics'));
							?>
						</div>
					</li> 
				<? } ?>
			</ul>
			<? } else { ?>
				<div class="white_region">
					<p>You have yet created any resumes</p>
				</div>
			<? } ?>
			<?=
			$html->link($html->image('resume/createAResume.png', array('alt' => 'Create Resume')), array('controller' => 'resumes', 'action' => 'create'), 
			array('id' => 'create_resume_btn', 'escape' => false))
			?>
		</div>
	
	<!-- Resumes list ends -->

	<!-- What's going on starts -->
	<? if ($activities['likes']) { ?>
		<h2>What's going on</h2>

		<div id="dashboard_activity_feed" class="blue_region">
			<ul class="item_list">
		
			<? 
			foreach($activities as $action => $details) {
				foreach($details as $user => $detail) {
			?>
				<li class="white_region">
					<div class="left">
						<? 
						if ($detail['profile']['photo']) {
							echo $this->Html->image("/userphoto/{$detail['profile']['photo']}", array('class' => 'user_image'));
						} else {
							$gender = $detail['profile']['gender'];
							echo $this->Html->image("resume/{$gender}.png", array('class' => 'user_image'));
						}
						?>
						<?=$this->Html->link($user, array('controller' => 'profiles', 'action' => 'index', $user))?> <?=$action?> your resume 
						<?= $this->Html->link($detail['resume_name'], array('controller' => 'resumes', 'action' => 'view', $detail['resume_url'])) ?>
						<p class="timestamp"><?=$timestamp->toDate($detail['stamp'])?> at <?=$timestamp->toHour($detail['stamp'])?></p>
					</div>
					<div class="options">
						<?= $this->Html->image('Basic_set_PNG/delete_16.png', array('title' => 'Alright! I got it', 'rel' => $detail['activity_id'])) ?>
					</div>
				</li>
		
			<? } } ?>
	
			</ul>
		</div>
	<? } ?>
	<!-- What's going on ends -->

	<!-- Your favorites jobs starts -->
	<h2>Saved jobs</h2>
	<div id="your_favorites_jobs" class="blue_region">
		<? if ($favorite_jobs) { ?>
			<ul id="fav_jobs_list" class="item_list">
				<? 
				foreach($favorite_jobs as $job) { 
					$favorite_job_ids[] = $job['Job']['id'];
					echo $this->element('job_item', array('job' => $job, 'type' => 'fav_job_item'));
				} 
				?>
			</ul>
		<? } else { ?>
			<ul id="fav_jobs_list">
				<li class="white_region" id="no_fav_jobs">
					You don't have any saved jobs
				</li>
			</ul>
		<? } ?>
	</div>
	<!-- Your favorites jobs ends -->

	<!-- Other job posts starts -->
	<? if ($jobs) { ?>
		<h2>Jobs you might be interested in</h2>
		<div id="other_job_posts" class="blue_region">
			<ul class="item_list">
				<? 
				foreach ($jobs as $job) {
					echo $this->element('job_item', array('job' => $job, 'type' => 'job_item'));
				} 
				?>
			</ul>
			<?=
			$html->link($html->image('resume/viewMoreJobs.png'), array('controller' => 'jobs', 'action' => 'index'), array('escape' => false))
			?>
		</div>
	<? } ?>
	<!-- Other job posts ends -->
	
	<!-- Jobs posted by you starts -->
	
		<h2>Jobs posted by you</h2>
		<div class="blue_region">
			<? if($jobsPostedByYou) { ?>
			<ul class="item_list">
				<? 
				foreach($jobsPostedByYou as $j) {
					echo $this->element('job_item', array('job' => $j, 'type' => 'personal_posted_job_item'));
				} 
				?>
			</ul>
			<? } else { ?>
				<div class="white_region">
					<p>You have yet posted any job</p>
				</div>
			<? } ?>
			<?= 
			$html->link($html->image('resume/postAJobBtn.png'), array('controller' => 'jobs', 'action' => 'post'), 
			array('id' => 'post_a_job_btn', 'escape' => false))
			?>
		</div>
	
	<!-- Jobs posted by you ends -->
	
	<!-- Saved job search -->
	<? if ($saved_search_results) { ?>
	<h2>Saved job search results</h2>	
	<div class="blue_region">
		<ul class="item_list">
			<? 
			foreach ($saved_search_results as $s) {
				if ($s['SavedSearchResult']['type'] == 'job') echo $this->element('saved_search_results', array('result' => $s, 'type' => 'job'));
			} 
			?>
		</ul>
	</div>
	<? } ?>
	<!-- Saved job search -->
	
	<!-- From our blog starts -->
	<? if ($blogs) { ?>
	<h2>Latest from our blog</h2>
	<ul id="from_our_blog" class="blue_region">		
		<? 
		foreach ($blogs as $b) {
			echo $this->element('blog_post_item', array('blog' => $b));
		} 
		?>
		<li>
			<?=$html->link($html->image('resume/readOurBlog.png'), array('controller' => 'blogs', 'action' => 'index'), array('escape' => false))?>
		</li>
	</ul>
	
	<? } ?>
	<!-- From our blog ends -->


</div>
<!-- Left col ends -->

<!-- Right col starts -->
<div class="right_col">
	
	<!-- Profile starts -->
	<h2>Your profile</h2>
	<div id="your_profile" class="blue_region">
		
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

			<? $update_link_options = array('controller' => 'profile', 'action' => 'edit', $profile['Profile']['user_id']) ?>
			<ul id="your_profile_header" class="white_region">
				<li id="your_profile_name">
					<?= $profile['Profile']['first_name'] && $profile['Profile']['last_name'] ? $profile['Profile']['first_name'].' '.$profile['Profile']['last_name'] 
					: $this->Html->link('Update your names', $update_link_options) ?>
				</li>
				<li><?= $profile['Profile']['job_title'] ? $profile['Profile']['job_title'] : $this->Html->link('Update your job title', $update_link_options, array('class' => 'edit_profile_btn')) ?></li>
				<li><?= $profile['Profile']['city'] && $profile['Profile']['state'] ? $profile['Profile']['city'].', '.$profile['Profile']['state'] : $this->Html->link('Update your location', $update_link_options, array('class' => 'edit_profile_btn')) ?></li>
				<li><?= $profile_job_category ? $profile_job_category : $this->Html->link("Update your job category", $update_link_options, array('class' => 'edit_profile_btn')) ?></li>
				<li><?=$this->Html->link('Edit your profile', array('controller' => 'profiles', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('class' => 'edit_profile_btn'))?></li>
			</ul>
			<div class="clearfloat"></div>
		
	</div>
	<!-- Profile ends -->
	
	<!-- Profile stats starts -->
	<h2>Profile stats</h2>
	<div id="profile_stats" class="blue_region">
		<? if (count($profile_view_stats)) { ?>
			<p style="margin-bottom:10px">Your profile has been view <?=count($profile_view_stats)?> times</p>
			<ul class="item_list">
				<? foreach ($profile_view_stats as $pvs) { ?>
					<li class="white_region">
						<?=$html->link($pvs['User']['username'], array('controller' => 'profiles', 'action' => 'index', $pvs['User']['username']))?> 
						<span class="timestamp">on <?=$timestamp->toDate($pvs['ProfileAnalytic']['stamp'])?> at <?=$timestamp->toHour($pvs['ProfileAnalytic']['stamp'])?></span>
					</li>
				<? } ?>
			</ul>
		<? } else { ?>
			<div class="white_region">
				<p>Your profile view statistics will appear here as people view them</p>
			</div>
		<? } ?>
	</div>
	<!-- Profile stats ends -->
	
	<!-- Resume Tips starts -->
	<h2 id="resume_tips_header">Resume tips</h2>
	<div id="resume_tips" class="blue_region">
		<? if (count($resumeTips)) { ?>
			<? foreach($resumeTips as $rt) { ?>
			<div class="white_region">
				<span class="resume_tip_title"><?=$rt['ResumeTip']['tip_title']?></span>
				<p><?=$rt['ResumeTip']['tip_body']?></p>
				<div class="resume_tip_credit">
					<? if ($rt['ResumeTip']['credited_to'] && $rt['ResumeTip']['credit_url']) { ?>
						by <?=$this->Html->link($rt['ResumeTip']['credited_to'], $rt['ResumeTip']['credit_url'], array('target' => '_blank'))?>
					<? } else { ?>
						<? 
						if ($rt['ResumeTip']['credited_to']) {
							echo 'by '.$rt['ResumeTip']['credited_to'];
						}
						if ($rt['ResumeTip']['credit_url']) {
							echo 'from '.$this->Html->link($rt['ResumeTip']['credit_url'], $rt['ResumeTip']['credit_url'] , array('target' => '_blank'));
						}
						?>

					<? } ?>
				</div>
			</div>
			<? } ?>
		<? } ?>
		<?=$html->link($html->image('resume/submitATip.png'), array('controller' => 'resume_tips', 'action' => 'create'), array('escape' => false))?>
	</div>
	<!-- Resume Tips ends -->
	

</div>

<!-- Right col ends -->

<div class="clearfloat"></div>

