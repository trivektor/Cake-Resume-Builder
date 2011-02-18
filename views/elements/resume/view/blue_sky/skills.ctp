<h2 class="section_header"><?=$sectionName['skills']?></h2>

<div id="resume_skills" class="section_wrapper">
	<? 
	if ($resume['ResumeSkill']) {
		echo Markdown($resume['ResumeSkill']['skills']);
	}
	?>
</div>