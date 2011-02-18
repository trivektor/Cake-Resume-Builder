<div class="blog_post_shadow">
	<div class="blog_post">
		<?=$this->element('blog_post_date', array('blog_post_stamp' => strtotime($blog['Blog']['stamp'])))?>
		<div class="blog_post_content">
			<h3><?=$html->link($blog['Blog']['title'], array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['slug']))?></h3>
	
			<? if ($blog['Blog']['author']) { ?>
				<div class="blog_post_author">
				<?=
				$html->link(
					$blog['Blog']['author'], 
					array(
						'controller' => 'blogs', 
						'action' => 'authors', 
						$slug->enslug($blog['Blog']['author'])
					)
				)?></div>
			<? } ?>

			<div class="blog_post_summary"><?=$blog['Blog']['summary']?></div>
	
			<?=$html->link($html->image('resume/readMoreBtn.png'), array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['slug']), array('escape' => false))?>
	
			<ul class="blog_post_options">
				<li class="blog_num_comments"><strong><?=number_format(count($blog['BlogComment']))?> comments</strong></li>
				<li class="blog_tags"><strong>Tags:</strong> <?=$blog['Blog']['tags']?></li>
			</ul>
		</div>
		<div class="clearfloat"></div>
	</div>
</div>
