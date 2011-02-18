<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title><?= $title_for_layout ?></title>
	
	<?php 
	if (!empty($meta_description)) {
		echo $this->Html->meta('description', $meta_description);
	}
	if (!empty($meta_keywords)) {
		echo $this->Html->meta('keywords', $meta_keywords);
	}
	?>
	
	<?php

		echo $this->Html->css('master');
		
		echo $scripts_for_layout;
	?>
</head>
<body>
	
	<?php echo $content_for_layout; ?>
	
	<?php //$this->element('sql_dump'); ?>
</body>
</html>