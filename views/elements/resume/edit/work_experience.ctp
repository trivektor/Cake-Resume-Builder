<div class="box_top"></div>
<div class="box">
	
	<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'work_experience'))?>
	
	<div class="section_options">
		<div class="options_label">Options</div>
		<div class="add"><?= $html->link('Add a new entry to this section', '/experience/add/'.$this->data['Resume']['id']) ?></div>
		<a class="disable_section" rel="work_experience">Disable this section</a>
		<a class="enable_section" rel="work_experience">Enable this section</a>
		<input type="hidden" class="section_mode" value="<?= in_array('work_experience', $disabledSection) ? 'disabled' : 'active' ?>" />
	</div>
	
	<div id="sort_experience" class="sortable">
		
		<? foreach($this->data['ResumeWorkExperience'] as $exp) { ?>
			<div id="exp_<?=$exp['id']?>" class="ui-state-default">

				<?= $html->link('', '/experience/edit/'.$exp['id'], array('class' => 'edit_link')) ?>

				<?= $html->link('', '/experience/edelete/'.$exp['id'], array('class' => 'delete_link')) ?>

				<h3 class="organization_name"><?= $exp['organization_name'] ?></h3>

				<div class="position_title"><?= $exp['title'] ?></div>

				<span class="position_date"><?= $exp['begin_date'] ?> - <?= $exp['end_date'] ? $exp['end_date'] : 'present' ?></span>

				<div class="position_details">
					<div class="more" style="display:none"><?= Markdown($exp['details'])?></div>
				</div>
			</div>
		<? } ?>
		
	</div>

</div>
<div class="box_bottom"></div>