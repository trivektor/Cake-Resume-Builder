<?=$this->element('resume_head')?>
<body>
	<div id="resume_sheet">
		<div id="header">
			<?= $this->element('user_image', array('photo' => $profile['Profile']['photo'])) ?>
			<?= $this->element('resume/view/'.$theme_slug.'/personal_information') ?>
			<div class="clearfloat"></div>
		</div>
		
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