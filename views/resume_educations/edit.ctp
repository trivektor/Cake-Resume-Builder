<? $this->set('title_for_layout', 'Edit Education') ?>

<div class="blue_region">
	
<div class="box_top"></div>

<div class="box">
<h2>Edit Education</h2>

<?= $form->create('ResumeEducation') ?>

<? $input_options = array('class' => 'textbox', 'label' => false, 'div' => false) ?>

<div class="form_row">
	<label for="ResumeEducationInstitution">Institution</label>
	<?= $form->input('ResumeEducation.institution', $input_options) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationBeginDate">Begin Date</label>
	<?= $form->input('ResumeEducation.begin_date', array('class' => 'textbox period_date', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationEndDate">End Date</label>
	<?= $form->input('ResumeEducation.end_date', array('class' => 'textbox period_date', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationDegree">Degree</label>
	<?= $form->input('ResumeEducation.degree', $input_options) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationFieldOfStudy">Field of Study</label>
	<?= $form->input('ResumeEducation.field_of_study', $input_options) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationGpa">GPA</label>
	<?= $form->input('ResumeEducation.gpa', $input_options) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationLocation">Location</label>
	<?= $form->input('ResumeEducation.location', $input_options) ?>
</div>

<input type="image" src="/img/resume/updateBtn.png" alt="Update" />

<?= $form->input('ResumeEducation.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumeEducation.resume_id', array('type' => 'hidden')) ?>

<?= $form->end() ?>
</div>
<div class="box_bottom"></div>

</div>