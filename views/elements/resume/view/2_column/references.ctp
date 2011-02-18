<div class="section_wrapper">
	
	<div class="header_tag orange_tab_left">
		<div class="orange_tab_middle">
			<?=$sectionName['references']?>
		</div>
		<div class="orange_tab_right"></div>
		<div class="clearfloat"></div>
	</div>
	
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