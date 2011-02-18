<div id="work_experience" class="section">
	<h2><?=$sectionName['work_experience']?></h2>
	<? foreach ($resume['ResumeWorkExperience'] as $exp) { ?>
	<div class="experience">
		<h3><?=$exp['organization_name']?></h3>
		<div class="title_date">
			<span class="title"><?= $exp['title'] ?></span> 
			<span class="date"><?=$exp['begin_date']?> - <?=$exp['end_date'] ? $exp['end_date'] : 'present' ?></span>
		</div>
		<div class="experience_description">
			<?=Markdown($exp['details'])?>
		</div>
	</div>
	<? } ?>
</div>