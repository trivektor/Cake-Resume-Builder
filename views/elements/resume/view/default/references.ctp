<div class="resume_section_header"><?=$sectionName['references']?></div>
<? $references = $resume['ResumeReference'] ?>
<? if (count($references) > 0) { ?>

<ul>
<? foreach ($references as $ref) { ?>
	<li>
		<div><?= $ref['name'] ?>, <?= $ref['title'] ?></div>
		<div><?= $ref['organization'] ?></div>
		<a href="mailto:<?=$ref['email']?>"><bdo dir="rtl"><?= strrev($ref['email']) ?></bdo></a>
	</li>
<? } ?>
</ul>

<? } ?>
