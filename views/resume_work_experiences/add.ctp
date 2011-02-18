<? $this->set('title_for_layout', 'Add Experience') ?>

<div class="blue_region">

<div class="box_top"></div>

<div class="box">
<h2>Add Experience</h2>

<?= $form->create('ResumeWorkExperience', array('action' => 'add/'.$this->params['pass'][0])) ?>

<? $input_options = array('class' => 'textbox', 'label' => false, 'div' => false) ?>

<div class="form_row">
	<label for="ResumeWorkExperienceOrganizationName">Organization Name</label>
	<?= $form->input('ResumeWorkExperience.organization_name', $input_options) ?>
</div>

<div class="form_row">
	<label for="ResumeWorkExperienceBeginDate">Begin Date</label>
	<?= $form->input('ResumeWorkExperience.begin_date', array('label' => false, 'div' => false, 'class' => 'textbox period_date')) ?>
</div>

<div class="form_row">
	<label for="ResumeWorkExperienceEndDate">End Date</label>
	<?= $form->input('ResumeWorkExperience.end_date', array('label' => false, 'div' => false, 'class' => 'textbox period_date')) ?>
</div>

<div class="form_row">
	<label for="ResumeWorkdExperienceTitle">Title</label>
	<?= $form->input('ResumeWorkExperience.title', $input_options) ?>
</div>

<div class="form_row">
	<?= $form->input('ResumeWorkExperience.details', array('class' => 'markitup')) ?>

	<div class="clearfloat"></div>

</div>

<input type="image" src="/img/resume/addItNowBtn.png" alt="Add It Now" />

<?= $form->end() ?>

</div>
<div class="box_bottom"></div>

</div>