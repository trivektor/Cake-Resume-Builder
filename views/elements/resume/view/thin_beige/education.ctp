<div class="section_wrapper">
	<div class="section_tag">
		<div class="section_tag_end">
			<h2 class="section_tag_middle">
				<?= $sectionName['education'] ?>
			</h2>
		</div>
	</div>
	
	<div class="clearfloat"></div>
	<div class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeEducation'] as $e) { ?>
			<li>
				<div class="left">
					<span class="institution_name"><?=$e['institution']?></span>
					<p class="degree"><?=$e['degree']?>, <?=$e['field_of_study']?></p>
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
			</li>
			<? } ?>
		</ul>
	</div>
</div>
