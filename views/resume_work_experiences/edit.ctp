<? $this->set('title_for_layout', 'Edit Experience') ?>

<div class="blue_region">
	
<div class="box_top"></div>

<div class="box">
<h2>Edit Experience</h2>

<?= $form->create('ResumeWorkExperience', array('action' => 'edit/'.$this->params['pass'][0]))?>

<? $input_options = array('class' => 'textbox', 'label' => false, 'div' => false) ?>

<div class="form_row">
	<label for="ResumeWorkExperienceOganizationName">Organization Name</label>
	<?= $form->input('ResumeWorkExperience.organization_name', $input_options)?>
</div>

<div class="form_row">
	<label for="ResumeWorkExperienceBeginDate">Begin Date</label>
	<?= $form->input('ResumeWorkExperience.begin_date', array('label' => false, 'div' => false, 'class' => 'textbox period_date'))?>
</div>

<div class="form_row">
	<label for="ResumeWorkExperienceEndDate">End Date</label>
	<?= $form->input('ResumeWorkExperience.end_date', array('label' => false, 'div' => false, 'class' => 'textbox period_date')) ?>
</div>

<div class="form_row">
	<label for="ResumeWorkExperienceTitle">Title</label>
	<?= $form->input('ResumeWorkExperience.title', $input_options)?>
</div>

<div class="form_row">
	<?= $form->input('ResumeWorkExperience.details', array('type' => 'textarea', 'class' => 'markitup'))?>
	<div class="clearfloat"></div>
</div>

<?= $form->input('ResumeWorkExperience.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumeWorkExperience.resume_id', array('type' => 'hidden')) ?>

<input type="image" src="/img/resume/updateBtn.png" alt="Update" />

<?= $form->end() ?>
</div>

<div class="box_bottom"></div>

</div>