<div class="section_header_wrapper">
	<div class="section_header_right_end">
		<h2 class="section_header">
			<?=$sectionName['education']?>
		</h2>
	</div>
</div>

<div id="resume_education" class="section_details_wrapper">	
	<ul>
		<? foreach ($resume['ResumeEducation'] as $e) { ?>
			<li>
				<div class="left">
					<div class="institution_name"><?=$e['institution']?></div>
					<p class="degree"><?=$e['degree']?>, <?=$e['field_of_study']?></p>
				</div>
				<p class="period"><?=$e['begin_date']?> - <?=$e['end_date'] ? $e['end_date'] : 'present' ?></p>
				<div class="clearfloat"></div>
			</li>	
		<? } ?>
	</ul>
	
</div>