<div class="section_options">
	<div class="options_label">Options</div>
	<div class="add"><?= $html->link('Add Education', '/education/add/'.$this->data['Resume']['id']) ?></div>
	<a class="disable_section" rel="education">Disable this section</a>
	<a class="enable_section" rel="education">Enable this section</a>
	<input type="hidden" class="section_mode" value="<?= in_array('education', $disabledSection) ? 'disabled' : 'active' ?>" />
</div>