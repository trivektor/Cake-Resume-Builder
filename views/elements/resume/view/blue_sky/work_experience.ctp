<h2 class="section_header"><?=$sectionName['work_experience']?></h2>

<div id="resume_work_experience" class="section_wrapper">
	<ul>
		<? foreach ($resume['ResumeWorkExperience'] as $e) { ?>
			<li>
				<div class="organization_name"><?=$e['organization_name']?></div>
				<p class="position_title"><?=$e['title']?>, <?=$e['begin_date']?> - <?=$e['end_date'] ? $e['end_date'] : 'present' ?></p>
				<div class="position_details">
					<?=Markdown($e['details'])?>
				</div>
			</li>
		<? } ?>
	</ul>
</div>