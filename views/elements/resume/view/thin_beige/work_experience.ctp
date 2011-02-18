<div class="section_wrapper">
	<div class="section_tag">
		<div class="section_tag_end">
			<h2 class="section_tag_middle"><?=$sectionName['work_experience']?></h2>
		</div>
	</div>
	<div class="clearfloat"></div>

	<div id="work_experience_section" class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeWorkExperience'] as $e) { ?>
			<li>
				<div class="left">
					<span class="organization_name"><?=$e['organization_name']?></span>
					<p class="position_title"><?=$e['title']?></p>
				</div>
				<div class="period">
					<div class="period_inner">
						<span class="month"><?=date("m", strtotime($e['begin_date']))?></span>
						<span class="year"><?=date("y", strtotime($e['begin_date']))?></span>
						<span class="month"><?=date("m", strtotime($e['end_date']))?></span>
						<span class="year"><?=date("y", strtotime($e['end_date']))?></span>
					</div>
				</div>
				<div class="clearfloat"></div>
				<div class="position_details">
					<?=Markdown($e['details'])?>
				</div>
			</li>
			<? } ?>
		</ul>
	</div>
</div>