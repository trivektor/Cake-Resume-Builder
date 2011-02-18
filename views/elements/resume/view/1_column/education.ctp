<div id="education_section" class="section_wrapper">
	
<h2 class="section_title_left">
	<span><?=$sectionName['education']?></span>
</h2>
<div class="section_details_right">
	<? foreach ($resume['ResumeEducation'] as $edu) { ?>
		<h3><?= $edu['institution'] ?></h3>
		<h4><?= $edu['degree'] ?>, <?= $edu['field_of_study'] ?>, <?= $edu['begin_date'] ?> - <?= $edu['end_date'] ? $edu['end_date'] : 'present' ?></h4>
	<? } ?>
</div>

<div class="clearfloat"></div>

</div>