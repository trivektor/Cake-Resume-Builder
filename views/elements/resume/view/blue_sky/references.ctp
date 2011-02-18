<h2 class="section_header"><?=$sectionName['references']?></h2>

<div id="references_section" class="section_wrapper">
	<? if ($resume['ResumeReference']) { ?>
		<ul id="references_list">
			<? foreach ($resume['ResumeReference'] as $r) { ?>
			<li>
				<div class="reference_name"><?=$r['name']?></div>
				<div class="reference_title"><?=$r['title']?>, <?=$r['organization']?></div>
				<? if ($r['email']) { ?>
					<div class="reference_email">
						<!-- <a href=""><?=$this->EmailProtect->string_to_ascii($r['email'])?></a> -->
						<?=$this->EmailProtect->obfuscate_email($r['email'])?>
					</div>
				<? } ?>
				<? if ($r['phone_number']) { ?>
					<div class="reference_phone_number"><?=$r['phone_number']?></div>
				<? } ?>
			</li>
			<? } ?>
		</ul>
	<? } else { ?>
		<p>Available upon request</p>
	<? } ?>
</div>