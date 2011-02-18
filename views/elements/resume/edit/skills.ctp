<div class="box_top"></div>
<div class="box">
	
<div class="section_options">
	<div class="options_label">Options</div>
	<a class="disable_section" rel="skills">Disable this section</a>
	<a class="enable_section" rel="skills">Enable this section</a>
	<input type="hidden" class="section_mode" value="<?= in_array('skills', $disabledSection) ? 'disabled' : 'active' ?>" />
</div>

<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'skills'))?>

<div class="clearfloat"></div>
<div class="form_row">
	<?= $form->input('ResumeSkill.skills', array('type' => 'textarea', 'class' => 'markitup', 'label' => false)) ?>
	<div class="clearfloat"></div>
</div>
</div>
<div class="box_bottom"></div>