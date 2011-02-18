<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>Resume Builder - <?= $resume['Resume']['title'] ?></title>
	
	<?php 
	if (!empty($meta_description)) {
		echo $this->Html->meta('description', $meta_description);
	}
	if (!empty($meta_keywords)) {
		echo $this->Html->meta('keywords', $meta_keywords);
	}
	?>
	
	<?php

		echo $this->Html->css(array('resume'));
		
		echo $this->Html->script('jquery-1.4.2.min');
		
		echo $scripts_for_layout;
	?>
</head>
<body>
	
</body>
</html>