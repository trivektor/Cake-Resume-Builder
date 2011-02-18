<? $experience = $resume['ResumeWorkExperience'] ?>
<? if (count($experience) > 0) { ?>

<div class="resume_section_header"><?=$sectionName['work_experience']?></div>

<? foreach ($experience as $exp) { ?>

<div class="organization_name">
<?=$exp['organization_name']?>, <?=$exp['title']?> 
(<?= $exp['begin_date']?> - <?= $exp['end_date'] ? $exp['end_date'] : 'present' ?>)
</div>
	
<ul id="work_experience_list">
	<li>
		<?= Markdown($exp['details']) ?>
	</li>
</ul>
<? } ?>
	
<? } ?>