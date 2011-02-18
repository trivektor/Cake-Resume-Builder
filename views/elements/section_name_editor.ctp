<div class="section_name_editor_wrapper">
	<h2 class="section_name_editable"><?=$sectionName[$sectionSlug]?></h2>
	<input class="section_name_editor" type="text" value="<?=$sectionName[$sectionSlug]?>" title="Click to rename this section" style="display:none" />
	<span class="update_section_name blue_btn" style="display:none" rel="<?=$sectionSlug?>">Update</span>
	<span class="cancel_update_section_name green_btn" style="display:none">Cancel</span>
	<input type="hidden" id="<?=ucwords(str_replace(' ', '', $sectionSlug))?>Id" value="<?=$sectionId[$sectionSlug]?>" />
</div>