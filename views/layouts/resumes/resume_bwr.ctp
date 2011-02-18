<?=$this->element('resume_head')?>
<body>
	
	<?=$this->element('resume_top_bar')?>

		<?= $this->element('resume/view/bwr/personal_information') ?>
		
		<div class="clearfloat"></div>
		
		<? 
			foreach (explode('/', $resume['ResumeSectionOrder']['section_orders']) as $s) {
				if (!in_array($s, $disabledSection) && $s != 'personal_information') {
					echo $this->element('resume/view/'.$theme_slug.'/'.$s);
				}
			} 
		?>
		
	
	
</body>
</html>