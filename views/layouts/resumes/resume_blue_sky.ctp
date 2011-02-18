<?=$this->element('resume_head')?>
<body>
	
	<div id="master_wrapper">
		<?=$this->element('resume_top_bar')?>
		<div id="header" class="align_center">
			<h1><?=$resume['Resume']['title']?></h1>
		</div>		
		<div id="middle_wrapper">
			<div id="middle_content_top"></div>
			<div id="middle_content_body">
				<div id="middle_content_detail">
					<? 
						foreach (explode('/', $resume['ResumeSectionOrder']['section_orders']) as $s) {
							if (!in_array($s, $disabledSection)) {
								echo $this->element('resume/view/'.$theme_slug.'/'.$s);
							}
						} 
					?>
				</div>
			</div>
			<div id="middle_content_bottom"></div>
		</div>

		<div id="footer">
			<p id="copyright_statement">Copyright &copy; <?=date("Y")?></p>
		</div>
	</div>
</body>
</html>