<?=$this->set('title_for_layout', 'Post A Job')?>

<? $this->Html->css(array('ui-lightness/jquery-ui-1.8.5.custom', 'markitup', 'markitupset'), 'stylesheet', array('media' => 'all', 'inline' => false)) ?>
<? $this->Html->script(array('jquery-ui-1.8.5.custom.min', 'jquery.markitup', 'jquery.markitupset'), false) ?>

<div class="blue_region">
<div class="box_top"></div>
<div class="box">
	<div id="job_post_form">
		
		<h2><?=$this->Html->image('main/postJobHeader.png')?></h2>
		
		<?php echo $this->Form->create('Job');?>

		<h2>About The Job</h2>
		<div class="form_row">
			<?= $this->Form->input('title', array('class' => 'textbox need_slug', 'rel' => 'job_title')); ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('slug', array('id' => 'slug_job_title', 'class' => 'textbox')) ?>
		</div>
		<div class="form_row">
			<?=$this->Form->input('job_category_id', array('type' => 'select', 'options' => $job_categories))?>
		</div>
		<div class="form_row">
			<label for="JobJobExperienceLevel">Experience Level</label>
			<?= $this->Form->input('job_experience_level', array('options' => $job_experience_levels, 'div' => false, 'label' => false)) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('description', array('class' => 'markitup')); ?>
			<div class="clearfloat"></div>
		</div>
		<div class="form_row">
			<?= $this->Form->input('requirements', array('class' => 'markitup')); ?>
			<div class="clearfloat"></div>
		</div>
		<div class="form_row">
			<?= $this->Form->input('location', array('class' => 'textbox')); ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('country', array('options' => $countries)) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('postal_code', array('class' => 'textbox')) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('type', array('options' => $job_types)) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('salary_low_end', array('options' => $salary_ranges, 'div' => false, 'empty' => '----')) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('salary_high_end', array('options' => $salary_ranges, 'div' => false, 'empty' => '----')) ?>
		</div>
		<div class="form_row">
			<?=$this->Form->input('original_job_url', array('class' => 'textbox')) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('other_details', array('class' => 'markitup')); ?>
			<div class="clearfloat"></div>
		</div>
		<div class="form_row">
			<?= $this->Form->input('keywords', array('type' => 'text', 'class' => 'textbox'))?>
			<div class="clearfloat"></div>
		</div>
		<div class="form_row">
			<?= $this->Form->input('how_to_apply', array('class' => 'markitup')) ?>
			<div class="clearfloat"></div>
		</div>
		
		<h2>About The Company</h2>
		<div class="form_row">
			<?= $this->Form->input('company_name', array('class' => 'textbox need_slug', 'rel' => 'company_name')); ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('company_slug', array('id' => 'slug_company_name', 'class' => 'textbox')) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('company_description', array('class' => 'markitup')); ?>
			<div class="clearfloat"></div>
		</div>
		<div class="form_row">
			<?=$this->Form->input('company_website', array('class' => 'textbox'))?>
		</div>
		
		
		<div class="form_row">
			<?= $this->Form->input('contact_details', array('class' => 'textbox')); ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('hiring_manager', array('class' => 'textbox')); ?>
		</div>
		
		<input type="image" src="/img/resume/postJobBtn.png" alt="Post Job" />

		<?php echo $this->Form->end();?>

	</div>
</div>
<div class="box_bottom"></div>
</div>
