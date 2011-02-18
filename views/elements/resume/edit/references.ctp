<div class="box_top"></div>
<div class="box">
	
	<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'references'))?>
	
	<div class="clearfloat"></div>
	
	<div class="section_options">
		<div class="options_label">Options</div>
		<div class="add"><?= $html->link('Add a new entry to this section', '/reference/add/'.$this->data['Resume']['id']) ?></div>
		<a class="disable_section" rel="references">Disable this section</a>
		<a class="enable_section" rel="references">Enable this section</a>
		<input type="hidden" class="section_mode" value="<?= in_array('references', $disabledSection) ? 'disabled' : 'active' ?>" />
	</div>
	
	<div id="sort_references" class="sortable">
	<? foreach($this->data['ResumeReference'] as $ref) { ?>
		<div id="ref_<?=$ref['id']?>" class="ui-state-default">
		
			<?= $html->link('', '/reference/edit/'.$ref['id'], array('class' => 'edit_link'))?> 
			<?= $html->link('', '/reference/delete/'.$ref['id'], array('class' => 'delete_link')) ?>
			
			<ul class="reference_details">
				<li><?= $ref['name'] ?>, <?= $ref['title'] ?></li>
				<li><?= $ref['organization'] ?></li>
				<li><a href="mailto:<?=$ref['email']?>"><bdo dir="rtl"><?= strrev($ref['email']) ?></bdo></a></li>
			</ul>
			
		</div>
	<? } ?>
	</div>

</div>
<div class="box_bottom"></div>