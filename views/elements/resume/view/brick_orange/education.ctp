<div id="education" class="section">
	<h2><?=$sectionName['education']?></h2>
	<? foreach ($resume['ResumeEducation'] as $edu) { ?>
	<div class="education">
		<h3><?=$edu['institution']?></h3>
		<p><?=$edu['degree']?>, <?=$edu['field_of_study']?>, <?=$edu['begin_date']?> - <?=$edu['end_date'] ? $edu['end_date'] : 'present' ?></p>
	</div>
	<? } ?>
</div>