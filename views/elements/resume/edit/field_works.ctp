<div class="box_top"></div>
<div class="box">
	
	<div class="section_options">
		<div class="options_label">Options</div>
		<a class="disable_section" rel="field_works">Disable this section</a>
		<a class="enable_section" rel="field_works">Enable this section</a>
		<input type="hidden" class="section_mode" value="<?= in_array('field_works', $disabledSection) ? 'disabled' : 'active' ?>" />
	</div>
	
	<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'field_works'))?>
	
	<div class="clearfloat"></div>

	<?= $form->input('ResumeFieldWork.field_works', array('type' => 'textarea', 'label' => false, 'class' => 'markitup')) ?>
	<div class="clearfloat"></div>

</div>
<div class="box_bottom"></div>