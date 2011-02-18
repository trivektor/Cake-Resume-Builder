<div class="section_wrapper">
	<h2 class="section_title_left"><?=$sectionName['references']?></h2>
	<div class="section_details_right">
		<? if ($resume['ResumeReference']) { ?>
			<ul>
				<? foreach ($resume['ResumeReference'] as $r) { ?>
					<li>
						<div class="reference_name"><?=$r['name']?></div>
						<p><?=$r['title']?>, <?=$r['organization']?></p>
						<? if ($r['email']) { ?>
						<a href="mailto:<?=$r['email']?>"><?=$r['email']?></a>
						<? } ?>
					</li>
				<? } ?>
			</ul>
		<? } else { ?>
		<p>Available upon request</p>
		<? } ?>
	</div>
</div>