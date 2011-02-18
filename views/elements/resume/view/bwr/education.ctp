<div class="section_wrapper">
	<h2 class="section_header"><?=$sectionName['education']?></h2>
	<div class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeEducation'] as $e) { ?>
			<li>
				<div class="left">
					<span class="title"><?=$e['institution']?></span>
					<p class="degree"><?=$e['degree']?>, <?=$e['field_of_study']?></p>
				</div>
				<div class="period">
					<div class="period_inner">
					<span class="begin"><?=$e['begin_date']?></span>
					<span class="end"><?=$e['end_date']?></span>
					</div>
				</div>
				<div class="clearfloat"></div>
			</li>
			<? } ?>
		</ul>
	</div>
	<div class="section_bottom"></div>
</div>