<div class="section_wrapper">
	
	<div class="header_tag orange_tab_left">
		<div class="orange_tab_middle">
			<?=$sectionName['work_experience']?>
		</div>
		<div class="orange_tab_right"></div>
		<div class="clearfloat"></div>
	</div>
	
	<div class="section_details_right">
		<? foreach ($resume['ResumeWorkExperience'] as $exp) { ?>
			<h3 class="organization_name"><?= $exp['organization_name'] ?></h3>
			<h4 class="position_title"><?= $exp['title'] ?>, <?= $exp['begin_date'] ?> - <?= $exp['end_date'] ? $exp['end_date'] : 'present' ?></h4>
			<div class="work_position_details">
				<?= Markdown($exp['details']) ?>
			</div>
		<? } ?>
	</div>
	
	<div class="clearfloat"></div>
	
</div>