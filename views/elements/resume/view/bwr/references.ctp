<div class="section_wrapper">
	<h2 class="section_header"><?=$sectionName['references']?></h2>
	<div id="references_section" class="section_content">
		<ul class="item_list">
			<? foreach($resume['ResumeReference'] as $r) { ?>
			<li>
				<span class="title"><?=$r['name']?></span>
				<p class="role"><?=$r['title']?>, <?=$r['organization']?></p>
				<p><?=$this->EmailProtect->obfuscate_email($r['email'])?></p>
			</li>
			<? } ?>
		</ul>
	</div>
	<div class="section_bottom"></div>
</div>