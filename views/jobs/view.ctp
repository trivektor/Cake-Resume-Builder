<? 
$this->set('title_for_layout', $job['Job']['title'].' at '.$job['Job']['company_name']. ' in '.$job['Job']['location'].' - Job ');
if ($job['Job']['keywords']) $this->set('meta_keywords', $job['Job']['keywords']);
$this->set('meta_description', $job['Job']['description']);
?>

<div id="job_details_wrapper">
	<!-- Job title header starts -->
	
	
	<h2 id="job_title"><?=$job['Job']['title']?></h2>
	<p id="job_poster">at 
	<?= $job['Job']['company_website'] ? '<a href="'.$job['Job']['company_website'].'" target="_blank">'.$job['Job']['company_name'].'</a>' :  
	$job['Job']['company_name'] ?>, 
	posted by <?=$html->link($poster['Profile']['first_name'].' '.$poster['Profile']['last_name'], array('controller' => 'profiles', 'action' => 'index', 
	$poster['User']['username']))?> on <?=$timestamp->toDate($job['Job']['stamp'])?> at <?=$timestamp->toHour($job['Job']['stamp'])?></p>
	
	
	<!-- Job title header ends -->

	
	<div class="blue_region">
		<!-- Job description starts -->
		<div class="blog_post_shadow">
			<div class="blog_post">
				<h3><?=$html->image('resume/jobDescriptionHeader.png', array('alt' => 'Job Description'))?></h3>
				<div id="job_description">
					<?=Markdown($job['Job']['description'])?>
				</div>
			</div>
		</div>
		<!-- Job description ends -->

		<!-- Job requirements starts -->
		<div class="blog_post_shadow">
			<div class="blog_post">
				<h3><?=$html->image('resume/jobRequirementsHeader.png', array('alt' => 'Job Requirements'))?></h3>
				<div id="job_requirement">
					<?=Markdown($job['Job']['requirements'])?>
				</div>
			</div>
		</div>
		<!-- Job requirements ends -->

		<!-- Company description starts -->
		<? if ($job['Job']['company_description']) { ?>
		<div class="blog_post_shadow">
			<div class="blog_post">
				<h3>About the company</h3>
				<div id="company_description">
					<?= Markdown($job['Job']['company_description'])?>
				</div>
			</div>
		</div>
		<? } ?>
		<!-- Company description ends -->
	
		<!-- How To Apply starts -->
		<? if ($job['Job']['how_to_apply']) { ?>
		<div class="blog_post_shadow">
			<div class="blog_post">
				<h3>How To Apply</h3>
				<div id="how_to_apply">
					<?=Markdown($job['Job']['how_to_apply'])?>
				</div>
			</div>
		</div>
		<? } ?>
		<!-- How To Apply ends -->
	
	</div>
	
	<? 
	if (!$already_applied) {
			echo $this->Html->link(
				$this->Html->image('resume/applyForThisJob.png', array('alt' => 'Apply For This Job')), 
				array(
					'controller' => 'job_applications', 
					'action' => 'apply', 
					'company' => $job['Job']['company_slug'], 
					'job' => $job['Job']['slug']
				), 
				array('escape' => false)
			);
			if (!$already_saved) {
				echo $this->Html->image('resume/saveJobBtn.png', array('class' => 'save_job', 'rel' => $job['Job']['id']));
				echo $this->Html->image('resume/unsaveJobBtn.png', array('class' => 'unsave_job', 'rel' => $job['Job']['id'], 
					'style' => 'display:none'));
			}	
	} else {
	?>
	<p>You have already applied for this job</p>
	<?
	}
	?>
	
	
</div>

<div class="clearfloat"></div>

<!-- <div id="job_poster_details">
	<div class="blue_region">
		<div class="white_region">
			<div>Posted by</div>
			<? 
			$profilePhoto = $poster['Profile']['photo'];
			if ($profilePhoto == 'male.png' || $profilePhoto == 'female.png') {
				echo $this->Html->image('main/'.$profilePhoto, array('class' => 'job_poster_image'));
			} else {
				echo $this->Html->image('/userphoto/'.$profilePhoto, array('class' => 'job_poster_image'));
			}
			?>
			<div id="job_poster_profile">
				<?=$html->link($poster['User']['username'], array('controller' => 'profiles', 'action' => 'index', $poster['User']['username']),
				array('id' => 'job_poster_name'))?>
				<div id="job_poster_title"><?=$poster['Profile']['job_title']?></div>
			</div>
			<div class="clearfloat"></div>
		</div>
	</div>
</div>

<div class="clearfloat"></div> -->