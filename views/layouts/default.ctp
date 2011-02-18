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
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title><?= $title_for_layout ?> - Resume Builder</title>
	
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			'master',
			'imgareaselect-default',
			'markitup',
			'markitupset',
			'jquery-ui-1.8.5.custom'
		));
		
		echo $this->Html->script(array(
			'jquery-1.4.2.min', 
			'jquery-ui-1.8.5.custom.min', 
			'jquery.ui.datepicker',
			'jquery.markitup',
			'jquery.markitupset',
			'jquery.hoverIntent',
			'master.js'
		));
	
		echo $scripts_for_layout;
	?>
	<script src="http://connect.facebook.net/en_US/all.js"></script>
</head>
<body id="<?=strtolower($this->name)?>">
	<div id="container">
		
		<?= $this->element('header')?>
		
		<?= $this->element('main_nav') ?>
		
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		
		<?= $this->element('footer') ?>
		
	</div>
	<div id="overlay" style="display:none"></div>
	
	<? 
	if (!$this->Session->read('Auth.User.id')) {
		echo $this->element('overlayLoginForm');
		echo $this->element('forgotPasswordOverlay');
	} else {
		echo $this->element('profile_overlay');
		echo $this->element('account_settings_overlay');
	}
	?>
	
	<? if ($_SERVER['SERVER_NAME'] != 'resumebuilder.localhost') { ?>
	<!-- begin olark code --> <script type='text/javascript'>/*<![CDATA[*/ window.olark||(function(k){var g=window,j=document,a=g.location.protocol=="https:"?"https:":"http:",i=k.name,b="load",h="addEventListener";(function(){g[i]=function(){(c.s=c.s||[]).push(arguments)};var c=g[i]._={},f=k.methods.length;while(f--){(function(l){g[i][l]=function(){g[i]("call",l,arguments)}})(k.methods[f])}c.l=k.loader;c.i=arguments.callee;c.p={0:+new Date};c.P=function(l){c.p[l]=new Date-c.p[0]};function e(){c.P(b);g[i](b)}g[h]?g[h](b,e,false):g.attachEvent("on"+b,e);c.P(1);var d=j.createElement("script");m=document.getElementsByTagName("script")[0];d.type="text/javascript";d.async=true;d.src=a+"//"+c.l;m.parentNode.insertBefore(d,m);c.P(2)})()})({loader:(function(a){return "static.olark.com/jsclient/loader1.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]}); olark.identify('6944-503-10-9712');/*]]>*/</script> <!-- end olark code -->
	<? } ?>
	
	<script type="text/javascript">
		$(function(){
			FB.init({
			    appId  : '143972068990839',
			    status : true, // check login status
			    cookie : true, // enable cookies to allow the server to access the session
			    xfbml  : true  // parse XFBML
			  });
			<? if (!$this->Session->read('Auth.User.id')) { ?>
				FB.getLoginStatus(function(response){
					if (response.session) {
						location.href = 'users/fb_auth';
					} else {
						
					}
				});
				FB.Event.subscribe('auth.login', function(response) {
					$("#overlayLoginForm").hide();
					$("#authenticateMessageContent").text("Please wait while we're logging you in");
					$("#authenticatingMessage").show();
					location.href = 'users/fb_auth';
				});
			<? } else { ?>
				FB.Event.subscribe('auth.logout', function(response) {
					location.href = '/logout'
				})
			<? } ?>
		})
	</script>
</body>
</html>