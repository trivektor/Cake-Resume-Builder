<li class="white_region" id="<?=$type?>_<?=$job['Job']['id']?>">
	<div class="left">
		<?=
		$this->Html->link(
			$job['Job']['title'], 
			array('controller' => 'jobs', 'action' => 'view', 'company' => $job['Job']['company_slug'], 'slug' => $job['Job']['slug']),
			array('class' => 'job_title'
		))
		?>
		at 
		<?= $job['Job']['company_name'] ?>
		
		<p class="timestamp">posted on <?=$timestamp->toDate($job['Job']['stamp'])?> at <?=$timestamp->toHour($job['Job']['stamp'])?></p>
	</div>
	<div class="options">
		<?
		if ($type == 'fav_job_item') {
			
			if (in_array($job['Job']['id'], $job_applications)) {
				echo $this->Html->image('Basic_set_PNG/tick_16.png', array('class' => 'applied_job', 'title' => 'You have applied for this job'));
			} else {
				echo $this->Html->image('Basic_set_PNG/delete_16.png', array('class' => 'remove_fav_job', 'title' => 'Remove this job',
				'rel' => $job['Job']['id']));
			}
			
		} else if ($type == 'job_item') {
			echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'view', 'company' => $job['Job']['company_slug'], 'slug' => $job['Job']['slug']), array('class' => 'view_live'));
		} else if ($type == 'personal_posted_job_item') {
			echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'delete', $job['Job']['id']), array('class' => 'delete', 'title' => 'Remove this job'));
			echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'view', 'company' => $job['Job']['company_slug'], 'slug' => $job['Job']['slug']), array('class' => 'view_live'));
			echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'edit', $job['Job']['id']), array('class' => 'edit', 'title' => 'Edit this job'));
			echo $this->Html->link('', array('controller' => 'jobs', 'action' => 'analytic', $job['Job']['id']), array('class' => 'analytic', 'title' => 'Analytics'));
			echo $this->Html->link('', array('controller' => 'job_applications', 'action' => 'review', $job['Job']['id']), array('class' => 'review', 'title' => 'Review applicants'));
		}
		?>
	</div>
</li>