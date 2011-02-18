<? $this->set('title_for_layout', 'Blogs by '.$author) ?>

<? if ($blogs) { ?>
	
	<h2>Blog posts by <?=$author?></h2>
	
	<? foreach ($blogs as $b) { ?>
		<div class="blue_region">
			<div class="white_region">
				<div class="inner">
					<div class="blog_post_date">
						<div class="blog_post_month">
							<?=date("M", strtotime($b['Blog']['stamp']))?>
						</div>
						<div class="blog_post_day">
							<?=date("d", strtotime($b['Blog']['stamp']))?>
						</div>
					</div>
					<div class="blog_post_content">
						<h3><?=$this->Html->link($b['Blog']['title'], array('controller' => 'blogs', 'action' => 'view', $b['Blog']['slug']))?></h3>
						<div class="blog_post_content">
							<?=Markdown($b['Blog']['body'])?>
						</div>
						<span class="green_btn"><?=count($b['BlogComment'])?> comments</span>
						<?=$this->Html->link('read more', array('controller' => 'blogs', 'action' => 'view', $b['Blog']['slug']),
						array('class' => 'blue_btn'))?>
					</div>
				</div>
			</div>
		</div>
	<? } ?>
<? } else { ?>
<p><?=$author?> has yet written any post</p>
<? } ?>