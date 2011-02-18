<div class="section_header_wrapper">
	<div class="section_header_right_end">
		<h2 class="section_header">
			<?=$sectionName['work_experience']?>
		</h2>
	</div>
</div>


<div id="resume_work_experience" class="section_details_wrapper">
	<ul>
		<? foreach ($resume['ResumeWorkExperience'] as $e) { ?>
			<li class="work_experience_item">
				<div class="left">
					<div class="organization_name"><?=$e['organization_name']?></div>
					<p class="position_title"><?=$e['title']?></p>
				</div>
				<p class="period">
					<?=$e['begin_date']?> - <?=$e['end_date'] ? $e['end_date'] : 'present' ?>
				</p>
				<div class="clearfloat"></div>
				<div class="position_details">
					<?=Markdown($e['details'])?>
				</div>
			</li>
		<? } ?>
	</ul>
</div>