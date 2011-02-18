<? $this->set('title_for_layout', $feedback['Feedback']['title']. ' - Feedback') ?>

<div class="feedback_bubble blue_region">
	
	<?= $this->element('feedback_header') ?>
	
	<?= $this->element('user_image', array('photo' => '')) ?>
	
	<div class="feedback_bubble_right">
		<div class="white_region">
			
			<h2><?=$html->link($feedback['Feedback']['title'], array('controller' => 'feedbacks', 'action' => 'view', $feedback['Feedback']['slug']))?></h2>
		
			<?= $this->element('feedback_type', array('feedback' => $feedback, 'feedback_poster' => $feedback_poster)) ?>
		
			<p id="feedback_body" class="blue_region"><?=$feedback['Feedback']['body']?></p>
		
			<?= $html->link('Reply', array('controller' => 'feedback_comments', 'action' => 'reply', $feedback['Feedback']['slug']),
			array('class' => 'feedback_reply')) ?>
		
			<div class="feedback_me_too blue_btn">
				<? 
				$type = $feedback['Feedback']['type']; 
				$feedback_string = '';
				if ($type == 'idea') {
					$feedback_string = 'I like this idea';
				} else if ($type == 'question') {
					$feedback_string = 'I have the same question too';
				} else if ($type == 'bug') {
					$feedback_string = 'I have this problem too';
				} else if ($type == 'praise') {
					$feedback_string = 'I want to praise too';
				} else if ($type == 'assistance_request') {
					$feedback_string = 'I need help with this too';
				}
				
				if (!$this->Session->read('Auth.User.id')) $feedback_string = 'Login to vote';
				?> 
				<?
				if ($this->Session->read('Auth.User.id')) {
					echo $html->link($feedback_string, array('controller' => 'feedbacks', 'action' => 'me_too', $feedback['Feedback']['id']));
				} else {
					echo $feedback_string;
				}
				
				?>
			</div>
		
			<div class="clearfloat"></div>
		
		</div>
		
		<h2>Comments</h2>
		
		<? if ($feedback['FeedbackComment']) { ?>
			<ul id="feedback_reply_list" class="item_list">
				<? foreach ($feedback['FeedbackComment'] as $comment) { ?>
					<li>
						<?= $this->element('user_image', array('photo' => '')) ?>
						<div class="white_region">
							<p class="shout_message"><?=$comment['comment']?></p>
							<p class="timestamp">by <a><?=$comment['full_name']?></a	> on <?=$timestamp->toDate($comment['stamp'])?> at <?=$timestamp->toHour($comment['stamp'])?></p>
						</div>
					</li>
				<? } ?>
			</ul>
		<? } else { ?>
		<div class="white_region">
			<p>No reply found for this feedback</p>
		</div>
		<? } ?>
		
	</div>
	<div class="clearfloat"></div>
</div>