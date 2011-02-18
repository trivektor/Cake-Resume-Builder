<? $this->set('title_for_layout', 'Edit Resume') ?>

<?=$html->link('Back to dashboard', array('controller' => 'dashboard', 'action' => 'index'))?>
<br /><br />

<div class="blue_region">

<?= $form->create('Resume', array('action' => 'edit')) ?>

<div id="resume_controls">
	<a class="trigger_overlay blue_btn" rel="order_sections" effect="bounce">Order Sections</a>
	<?= $html->link('Delete resume', array('controller' => 'resumes', 'action' => 'delete', $this->data['Resume']['id']), array('class' => 'red_btn delete')) ?>
	<?= $html->link('View live', array('controller' => 'resumes', 'action' => 'view', $this->data['Resume']['url']), array('class' => 'blue_btn', 'target' => '_blank')) ?>
	<?= $html->link('Theme', '/resumes/select_theme/'.$this->data['Resume']['id'], array('class' => 'green_btn')) ?>
	<a class="trigger_overlay blue_btn" rel="resume_settings" effect="shake">Settings</a>
</div>

<div class="clearfloat"></div>

<?= $this->element('resume/edit/title') ?>

<!-- Resume sections starts -->
<? 
$resume_sections = explode('/', $this->data['ResumeSectionOrder']['section_orders']);
foreach ($resume_sections as $s) {
	echo $this->element('resume/edit/'.$s); 
}
?>
<!-- Resume section ends -->

<!-- Keywords starts -->
<?= $this->element('resume/edit/keywords') ?>
<!-- Keywords ends -->


<?= $form->input('Resume.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumeFieldWork.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumeKeyword.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumePersonalInformation.id', array('type' => 'hidden'))?>
<?= $form->input('ResumeEducation.id', array('type' => 'hidden'))?>
<?= $form->input('ResumeSkill.id', array('type' => 'hidden'))?>
<?= $form->input('ResumeTheme.id', array('type' => 'hidden'))?>

<input type="image" src="/img/resume/updateResume.png" alt="Update Resume" />

<?= $form->end() ?>

</div>

<!-- Resume setting starts -->
<div id="resume_settings" style="display:none">
	<h2>Resume Settings</h2>
	<?=$html->image('main/closeLoginForm.png', array('class' => 'close_overlay'))?>
	<ul>
		<li>
			<?= $form->radio('ResumeSetting.status', array('active' => 'active', 'disabled' => 'disabled'), array('legend' => false)) ?> 
		</li>
		<li>
			<?= $form->checkbox('ResumeSetting.hide_personal_info') ?> <span>hide personal info</span>
		</li>
		<li>
			<?= $form->checkbox('ResumeSetting.alert_copy') ?> <span>notify me when someone copies my resume</span>
		</li>
		<li>
			<?= $form->checkbox('ResumeSetting.email_notification') ?> <span>email me when someone visits my resume</span>
		</li>
		<li>
			<?= $form->checkbox('ResumeSetting.show_last_updated') ?> <span>show last updated date</span>
		</li>
	</ul>
	<span id="resume_updated" style="display:none">Your resume settings has been updated :-)</span>
	<?=$html->image('resume/updateSettingsBtn.png', array('id' => 'update_resume_settings'))?>
</div>
<!-- Resume ends -->

<!-- Order sections starts -->
<?

$sections = array(
	1 => 'personal_information',
	2 => 'education',
	3 => 'skills',
	4 => 'work_experience',
	5 => 'references',
	6 => 'field_works',
	7 => 'keywords'
);

?>
<div id="order_sections" style="display:none">
	<h2>Order Sections</h2>
	<?=$html->image('resume/closeOverlay.png', array('class' => 'close_overlay'))?>
	<div id="sort_resume_sections" class="sortable">
		<? foreach ($resume_sections as $f) { ?>
			<div id="section_<?=array_search($f, $sections)?>" class="sections"><?=ucwords($sectionName[$f])?></div>
		<? } ?>
	</div>
	<div class="updated" style="display:none">Your resume sections have been re-ordered. Please refresh your browser.</div>
</div>
<!-- Order sections ends -->

<div id="updated_status" style="display:none">Your resume has been updated :)</div>