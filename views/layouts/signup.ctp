<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
	
<title>Resume Builder - Signup</title>
	
<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('master'));
		
	echo $this->Html->script(array(
		'jquery-1.4.2.min', 
		'jquery-ui-1.8.5.custom.min'
	));
	
?>
<script>
$(function(){
	
	$("#login").click(function(){
		$("#overlayLoginForm").show("bounce", {}, 150, function(){})
		$("#overlay").show();
	})
	
	$("#overlayLoginFormClose, #cancelLoginForm").click(function(){
		$("#overlayLoginForm").fadeOut(function(){
			$("#overlay").fadeOut();
		})
	})
})
	
</script>
</head>
<body id="signup">
	
	<div id="container">
	
		<div id="signup_form">
			<div id="header_wrapper">
				<div id="header">
					<h1 id="app_logo"><?=$html->link('Killer Resume Builder', array('controller' => 'home', 'action' => 'index'))?></h1>
					<div id="login_link_wrapper">
						<span>Already have an account?</span>
						<?=$html->image('resume/login.png', array('id' => 'login'))?>
					</div>
					<div class="clearfloat"></div>
				</div>
				<div id="header_nav_wrapper"></div>
			</div>
			<div id="signup_form_fields_wrapper">
				
				<div id="signup_form_fields">
					<h2><?=$this->Html->image('resume/joinUsHeader.png', array('alt' => 'Join Us'))?></h2>
					<?=$form->create('User', array('autocomplete' => 'off'))?>
						<div class="form_row">
							<?=$form->input('username', array('class' => 'textbox', 'div' => false))?>
						</div>
						<div class="form_row">
							<?=$form->input('email', array('class' => 'textbox', 'div' => false))?>
						</div>
						<div class="form_row">
							<label>Password</label>
							<?=$form->input('passwd', array('type' => 'password', 'class' => 'textbox', 'label' => false))?>
						</div>
						<div class="form_row">
							<?=$form->input('first_name', array('class' => 'textbox', 'div' => false))?>
						</div>
						<div class="form_row">
							<?=$form->input('last_name', array('class' => 'textbox', 'div' => false))?>
						</div>
						<div class="form_row">
							<label>Can you read the letters and numbers in the image below?</label>
							<?=$form->input('captcha', array('class' => 'textbox', 'label' => false))?>
							<div style="margin-top:10px">
								<?=$this->Html->image($html->url('captcha', true), array('style' => '', 'vspace' => 2))?>
							</div>
						</div>
						<div style="text-align:right">
						<input type="image" src="/img/resume/alrightLetsGoBtn.png" alt="Submit" />
						</div>
					<?=$form->end()?>
				</div>
			</div>
		</div>
		
	</div>
	
	<div id="overlay" style="display:none"></div>
	<?=$this->element('overlayLoginForm')?>
</body>
</html>