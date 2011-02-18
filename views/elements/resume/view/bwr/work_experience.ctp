<div class="section_wrapper">
	<h2 class="section_header"><?=$sectionName['work_experience']?></h2>
	<div class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeWorkExperience'] as $e) { ?>
			<li>
				<div class="left">
					<span class="title"><?=$e['organization_name']?></span>
					<p class="position"><?=$e['title']?></p>
				</div>
				<div class="period">
					<div class="period_inner">
						<span class="begin"><?=$e['begin_date']?></span>
						<span class="end"><?=$e['end_date']?></span>
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
	<div class="section_bottom"></div>
</div>