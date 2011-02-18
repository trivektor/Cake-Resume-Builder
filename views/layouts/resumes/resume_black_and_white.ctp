<?=$this->element('resume_head')?>

<body>
	<div id="resume_sheet">
	
	<?= $this->element('resume/view/black_and_white/personal_information') ?>
		
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