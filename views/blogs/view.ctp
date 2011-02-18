<? $this->set('title_for_layout', $blog['Blog']['title']) ?>

<div id="blog_post_list" class="blue_region">
<div class="blog_post_shadow">
<div class="blog_post">
	<div class="blog_left_col">
		<?=$this->element('blog_post_date', array('blog_post_stamp' => strtotime($blog['Blog']['stamp'])))?>
		<ul class="social_share">
			<li><?=$html->image('export/facebook_16.png')?></li>
			<li><?=$html->image('export/twitter_16.png')?></li>
			<li><?=$html->image('export/linkedin_16.png')?></li>
			<li><?=$html->image('export/reddit_16.png')?></li>
		</ul>
	</div>
	<div class="blog_post_content">
		<h3><a><?=$blog['Blog']['title']?></a></h3>
		
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
		
		<div class="blog_post_summary">
			<?=$blog['Blog']['summary']?>
		</div>	
		
		<div class="blog_post_body">
			<?=$blog['Blog']['body']?>
		</div>
		
		<p style="margin-bottom:40px">Like this post? <span id="recommend_post" rel="<?=$blog['Blog']['id']?>">Recommend it</span></p>
		
		<!-- Comment list starts -->
		<? if (count($blog['BlogComment'])) { ?>
			<h2>Comments (<?=number_format(count($blog['BlogComment']))?>)</h2>
			<ul class="blog_comments_list">
				<? foreach ($blog['BlogComment'] as $c) { ?>
					<li>
						<span class="blog_commentator"><?=$c['name']?></span>
						<span class="blog_comment_date"><?=date("M d, Y", strtotime($c['stamp']))?></span>
						<p class="blog_comment"><?=$c['comment']?></p>
					</li>
				<? } ?>
			</ul>
		<? } ?>
		<!-- Comment list ends -->
		
		<!-- Comment textbox starts -->
		<? if ($errors = $this->Session->read('errors')) { ?>
			<?$this->Session->delete('errors')?>
			
			<div class="result_error">
				<? foreach ($errors as $key=>$value) { ?>
					<p><?=$value?></p>
				<? } ?>
			</div>
		<? } ?>
		<div class="comment_form">
			<h2>Leave A Comment</h2>
			<?=$this->Form->create('BlogComment', array('action' => 'insert'))?>
				<div class="form_row">
					<?=$this->Form->input('name', array('class' => 'textbox', 'div' => false))?>
					<div class="clearfloat"></div>
				</div>
				<div class="form_row">
					<?=$this->Form->input('website', array('class' => 'textbox', 'div' => false))?>
					<div class="clearfloat"></div>
				</div>
				<div class="form_row">
					<?=$this->Form->input('comment', array('type' => 'textarea', 'id' => 'comment_textarea', 'div' => false))?>
					<div class="clearfloat"></div>
				</div>
				<?=$form->hidden('BlogComment.blog_id', array('value' => $blog['Blog']['id']))?>
				<div style="margin-top:10px;text-align:right">
					<input type="image" src="/img/resume/postCommentBtn.png" alt="Post Comment" />
				</div>
			<?=$form->end()?>
		</div>
		<!-- Comment textbox ends -->
	</div>
	<div class="clearfloat"></div>
</div>
</div>
</div>
<div class="clearfloat"></div>