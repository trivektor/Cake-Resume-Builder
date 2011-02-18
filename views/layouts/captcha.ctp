<div id="captchaID">  
   <?php echo $html->image('users/captcha', array('style'=>'border:1px #ccc solid','vspace'=>2)); ?>  
   <?php echo $ajax->link('Can not read this code?','re-generate captcha',array('url'=>'users/captcha','update'=>'captchaID','loading'=>'do this','loaded'=>'do that')); ?>  
</div>