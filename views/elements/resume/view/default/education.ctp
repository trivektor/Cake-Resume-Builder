<div class="resume_section_header"><?=$sectionName['education']?></div>
<? $education = $resume['ResumeEducation'] ?>
<? if (count($education) > 0) { ?>

<? foreach ($education as $edu) { ?>
<ul>
	<li>
	<?= $edu['degree'] ?>, <strong><?= $edu['field_of_study'] ?></strong>, <?= $edu['institution'] ?> 
	(<?= $edu['begin_date'] ?> - <?= $edu['end_date'] ? $edu['end_date'] : 'present' ?>)
	</li>
</ul>
<? } ?>

<? } ?>
