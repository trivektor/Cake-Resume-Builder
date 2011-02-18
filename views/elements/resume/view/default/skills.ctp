<div class="resume_section_header"><?=$sectionName['skills']?></div>

<? if ($resume['ResumeSkill']['skills']) { ?>
<div>
<?= $markdown->parse($resume['ResumeSkill']['skills']) ?>
</div>
<? } ?>