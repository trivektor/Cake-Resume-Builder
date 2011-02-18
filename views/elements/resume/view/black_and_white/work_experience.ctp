<div class="section_wrapper">
	
	<h2 class="section_title_left"><span><?=$sectionName['work_experience']?></span></h2>
	
	<div class="section_details_right">
		<? foreach ($resume['ResumeWorkExperience'] as $exp) { ?>
			<h3><?= $exp['organization_name'] ?></h3>
			<h4><?= $exp['title'] ?>, <?= $exp['begin_date'] ?> - <?= $exp['end_date'] ? $exp['end_date'] : 'present' ?></h4>
			<div class="work_position_details">
				<?= Markdown($exp['details']) ?>
			</div>
		<? } ?>
	</div>
	
	<div class="clearfloat"></div>
	
</div>