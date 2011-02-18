<div class="box_top"></div>
<div class="box">
	
	<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'education'))?>
	
	<div class="section_options">
		<div class="options_label">Options</div>
		<div class="add"><?= $html->link('Add a new entry to this section', '/education/add/'.$this->data['Resume']['id']) ?></div>
		<a class="disable_section" rel="education">Disable this section</a>
		<a class="enable_section" rel="education">Enable this section</a>
		<input type="hidden" class="section_mode" value="<?= in_array('education', $disabledSection) ? 'disabled' : 'active' ?>" />
	</div>
	
	<div id="sort_education" class="sortable">
	<? foreach($this->data['ResumeEducation'] as $edu) { ?>
			
		<div class="ui-state-default" id="edu_<?=$edu['id']?>">	
		
			<h3 class="institution_name"><?= $edu['institution'] ?></h3>
			
			<p class="degree">
				<? if ($edu['degree'] || $edu['field_of_study']) { ?>
					<?= $edu['degree'] ?>, <?= $edu['field_of_study'] ?> 
					<br />
				<? } ?>
				
				(<?= $edu['begin_date'] ?> - <?= $edu['end_date'] ? $edu['end_date'] : 'present' ?>)
			</p>
		
			<?= $html->link('', '/education/edit/'.$edu['id'], array('class' => 'edit_link')) ?>
			<?= $html->link('', '/education/delete/'.$edu['id'], array('class' => 'delete_link')) ?>
		</div>
			
	<? } ?>
	</div>
	
	<div class="clearfloat"></div>

</div>
<div class="box_bottom"></div>