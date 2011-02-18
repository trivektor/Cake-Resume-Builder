
<h2 class="section_header"><?=$sectionName['education']?></h2>

<div id="resume_education" class="section_wrapper">	
	<ul>
		<? foreach ($resume['ResumeEducation'] as $e) { ?>
			<li>
				<div class="insitution_name"><?=$e['institution']?></div>
				<p class="degree"><?=$e['degree']?>, <?=$e['field_of_study']?></p>
				<p class="period"><?=$e['begin_date']?> - <?=$e['end_date'] ? $e['end_date'] : 'present' ?></p>
			</li>
		<? } ?>
	</ul>
	
</div>