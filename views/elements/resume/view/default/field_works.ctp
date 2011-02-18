<? $fieldWorks = explode('
', $resume['ResumeFieldWork']['field_works']) ?>
<? if (count($fieldWorks)) { ?>
<div class="resume_section_header"><?=$sectionName['field_works']?></div>
<ul>
	<? foreach ($fieldWorks as $fw) { ?>
		<li><?= $html->link($fw, $fw, array('target' => '_blank'))?></li>
	<? } ?>
</ul>
<? } ?>