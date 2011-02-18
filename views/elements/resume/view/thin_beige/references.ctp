<div class="section_wrapper">
	<div class="section_tag">
		<div class="section_tag_end">
			<h2 class="section_tag_middle"><?=$sectionName['references']?></h2>
		</div>
	</div>
	<div class="clearfloat"></div>
	<div id="references_section" class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeReference'] as $r) { ?>
			<li>
				<span class="reference_name"><?=$r['name']?></span>
				<p class="role"><?=$r['title']?>, <?=$r['organization']?></p>
				<p><?=$this->EmailProtect->obfuscate_email($r['email'])?></p>
			</li>
			<? } ?>
		</ul>
	</div>
</div>