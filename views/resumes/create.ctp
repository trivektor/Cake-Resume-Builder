<div class="blue_region">

<div class="box_top"></div>

<div class="box">
<h2>Create New Resume</h2>

<?= $form->create('Resume', array('action' => 'create')) ?>

<div class="form_row">
	<label>Pick a URL</label>
	<div class="eg">Your resume will be available at http://localhost:8888/resume/yoururl</div>
	<?= $form->input('url', array('label' => false, 'div' => false, 'class' => 'textbox'))?>
</div>

<div class="form_row">
	<?= $form->input('title', array('div' => false, 'class' => 'textbox')) ?>
</div>

<input type="image" src="/img/resume/createResume.png" alt="Create Resume" />

<?= $form->end() ?>


</div>

<div class="box_bottom"></div>

</div>