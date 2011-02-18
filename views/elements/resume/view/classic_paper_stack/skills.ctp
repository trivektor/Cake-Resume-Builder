<div class="section_header_wrapper">
	<div class="section_header_right_end">
		<h2 class="section_header">
			<?=$sectionName['skills']?>
		</h2>
	</div>
</div>


<div id="resume_skills" class="section_details_wrapper">
	<? 
	if ($resume['ResumeSkill']) {
		echo Markdown($resume['ResumeSkill']['skills']);
	}
	?>
</div>