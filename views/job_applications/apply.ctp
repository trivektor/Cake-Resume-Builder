<? $this->set('title_for_layout', $job['Job']['title'].' at '.$job['Job']['company_name'].' in '.$job['Job']['location'].' - Application') ?>

<? $this->Html->css(array('ui-lightness/jquery-ui-1.8.5.custom', 'markitup', 'markitupset'), 'stylesheet', array('media' => 'all', 'inline' => false)) ?>
<? $this->Html->script(array('jquery-ui-1.8.5.custom.min', 'jquery.markitup', 'jquery.markitupset'), false) ?>


<div class="blue_region">
		
	<div class="box_top"></div>
	
	<div class="box">
		<?=$this->Html->image('resume/jobApplicationHeader.png', array('alt' => 'Application'))?>
		
		<h2 style="margin:30px 0 5px;font-size:40px"><?=$job['Job']['title']?></h2>
		<p>at <?=$job['Job']['company_name']?> in <?=$job['Job']['location']?></p>
		
		<?= $this->Form->create('JobApplication', array(
			'id' => 'job_application_form',
			'action' => 'apply/company:'.$this->params['named']['company'].'/job:'.$this->params['named']['job'],
			'enctype' => 'multipart/form-data')) ?>
			
		<h3>Contact Information</h3>
		
		<? $input_options = array('class' => 'textbox', 'div' => false) ?>
		
		<div class="form_row">
			<?=$this->Form->input('first_name', $input_options)?>
		</div>
		
		<div class="form_row">
			<?=$this->Form->input('last_name', $input_options)?>
		</div>
		
		<div class="form_row">
			<?=$this->Form->input('email', $input_options)?>
		</div>

		<div class="form_row">
			<?=$this->Form->input('phone_number', $input_options)?>
		</div>	
		
		<div class="form_row">
			<?=$this->Form->input('city', $input_options)?>
		</div>
		
		<div class="form_row">
			<label>State/Province</label>
			<?=$this->Form->input('state', array('label' => false, 'class' => 'textbox', 'div' => false))?>
		</div>
		
		<div class="form_row">
			<?=$this->Form->input('country', array('options' => $countries))?>
		</div>
		
		<br /><br />
		<h3>Resume & Cover Letter</h3>
			
		<div class="form_row">
			<?= $this->Form->input('JobApplication.resume', array('between' => '', 'type' => 'file')) ?>
		</div>
		<div class="form_row">
			<?= $this->Form->input('JobApplication.cover_letter', array('type' => 'textarea', 'class' => 'markitup')) ?>
			<div class="clearfloat"></div>
		</div>
		<?=$this->Form->input('dir', array('type' => 'hidden'))?>
		<?=$this->Form->input('mimetype', array('type' => 'hidden'))?>
		<?=$this->Form->input('filesize', array('type' => 'hidden'))?>
		<input type="image" src="/img/resume/applyNowBtn.png" alt="Apply Now" />
		<?= $this->Form->end() ?>
		
	</div>
	<div class="box_bottom"></div>
</div>