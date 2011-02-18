<!-- <div id="footer_cta">
	<?=$this->Html->image('main/tryItOut.png', array('alt' => 'Try It Out'))?>
</div> -->
<div id="footer">
	<div id="footer_inner">
		<div class="footer_left">
			<h3><?=$this->Html->link('Killer Resume Builder', array('controller' => 'home', 'action' => 'index')) ?></h3>
		</div>
		<div class="footer_right">
			<a id="footer_facebook" class="footer_social" href="#">
				<?=$this->Html->image('export/facebook_32.png')?>
				<span>Follow us on Facebook</span>
			</a>
			<a id="footer_twitter" class="footer_social" href="#">
				<?=$this->Html->image('export/twitter_32.png')?>
				<span>Follow us on Twitter</span>
			</a>
		</div>
		<div class="clearfloat"></div>
		<div id="footer_nav_wrapper">
			<div class="footer_left">
				<ul id="footer_nav">
					<li><?=$this->Html->link('Home', array('controller' => 'home', 'action' => 'index')) ?></li>
					<li><?=$this->Html->link('Help', array('controller' => 'pages', 'action' => 'help'))?></li>
					<li><?=$this->Html->link('Feedback', array('controller' => 'pages', 'action' => 'tour'))?></li>
					<li><?=$this->Html->link('Blog', array('controller' => 'blog', 'action' => 'index'))?></li>
					<? if (!$this->Session->read('Auth.User.id')) { ?>
					<li><?=$this->Html->link('Signup', array('controller' => 'users', 'action' => 'signup'))?></li>
					<? } ?>
					<li><a style="border:0" href="#">Back to top</a></li>
				</ul>
			</div>
			<div class="footer_right">
				<p id="copyright_statement">&copy; Killer Resume Builder, <?=date("Y")?>. All rights reserved.</p>
			</div>
			<div class="clearfloat"></div>
		</div>
	</div>
</div>