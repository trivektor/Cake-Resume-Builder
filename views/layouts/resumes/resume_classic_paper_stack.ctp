<?=$this->element('resume_head')?>
<body>
	
	<?= $this->element('resume_top_bar') ?>

	<div id="paper_stack_top"></div>
	<div id="paper_stack_body_wrapper">
		<div id="name_tag_wrapper">
			<div id="name_tag_right_end">
				<div id="name_tag"><?=$resume['ResumePersonalInformation']['full_name']?></div>
			</div>
		</div>
		
		<?= $this->element('resume/view/classic_paper_stack/personal_information') ?>
		
		<div class="clearfloat"></div>
		
		<? 
			foreach (explode('/', $resume['ResumeSectionOrder']['section_orders']) as $s) {
				if (!in_array($s, $disabledSection) && $s != 'personal_information') {
					echo $this->element('resume/view/'.$theme_slug.'/'.$s);
				}
			} 
		?>
		
	</div>
	
</body>
</html>