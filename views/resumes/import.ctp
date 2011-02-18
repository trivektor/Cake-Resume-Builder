<? $this->set('title_for_layout', 'Import Your Resume') ?>

<h2>Import your resume</h2>

<div class="blue_region">
	<?
	echo $form->create('Resume', array('type' => 'file'));
	echo $form->file('file');
	echo $form->end('Submit');
	?>
</div>