<? $this->set('title_for_layout', 'Add Education') ?>

<div class="blue_region">
<div class="box_top"></div>
<div class="box">

<h2>Add Education</h2>

<?= $form->create('ResumeEducation', array('action' => '/add/'.$this->params['pass'][0])) ?>

<div class="form_row">
	<label for="ResumeEducationInstitution">Institution</label>
	<?= $form->input('ResumeEducation.institution', array('class' => 'textbox', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationBeginDate">Begin Date</label>
	<?= $form->input('ResumeEducation.begin_date', array('class' => 'textbox period_date', 'label' => false, 'div' => false))?>
</div>

<div class="form_row">
	<label for="ResumeEducationEndDate">End Date</label>
	<?= $form->input('ResumeEducation.end_date', array('class' => 'textbox period_date', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationDegree">Degree</label>
	<?= $form->input('ResumeEducation.degree', array('class' => 'textbox', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationFieldOfStudy">Field of Study</label>
	<?= $form->input('ResumeEducation.field_of_study', array('class' => 'textbox', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationGpa">GPA</label>
	<?= $form->input('ResumeEducation.gpa', array('class' => 'textbox', 'label' => false, 'div' => false)) ?>
</div>

<div class="form_row">
	<label for="ResumeEducationLocation">Location</label>
	<?= $form->input('ResumeEducation.location', array('class' => 'textbox', 'label' => false, 'div' => false))?>
</div>

<input type="image" src="/img/resume/addItNowBtn.png" alt="Add It Now" />

<?= $form->end() ?>

</div>
<div class="box_bottom"></div>
</div>