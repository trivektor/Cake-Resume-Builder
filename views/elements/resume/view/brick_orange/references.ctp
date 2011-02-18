<div id="references" class="section">
	<h2><?=$sectionName['references']?></h2>
	<? foreach ($resume['ResumeReference'] as $ref) { ?>
	<ul class="reference">
		<li class="reference_name"><?=$ref['name']?></li>
		<li><?=$ref['title']?>, <?=$ref['organization']?></li>
		<? if ($ref['email']) { ?>
			<li><a href="mailto:<?=$ref['email']?>"><?=$ref['email']?></a></li>
		<? } ?>
		<? if ($ref['website']) { ?>
			<li><a target="_blank" href="<?=$ref['website']?>"><?=$ref['website']?></a></li>
		<? } ?>
	</ul>
	<? } ?>
</div>