<? $this->set('title_for_layout', 'Reply to "'.$feedback['Feedback']['title'].'" - Feedback') ?>

<div class="feedback_bubble blue_region">
	
	<?= $this->element('feedback_header') ?>
	
	<?= $this->element('user_image', array('photo' => '')) ?>
	
	<div class="feedback_bubble_right">
		<div class="white_region">
			
			<h2>Reply to: <?=$html->link($feedback['Feedback']['title'], array('controller' => 'feedbacks', 'action' => 'view', $feedback['Feedback']['slug']))?></h2>
	
			<?= $this->element('feedback_type', array('feedback' => $feedback)) ?>
	
			<p id="feedback_body" class="blue_region"><?=$feedback['Feedback']['body']?></p>
	
		</div>
	
		<div class="white_region">
			<?= $form->create('FeedbackComment', array('action' => 'reply/'.$feedback['Feedback']['slug'], 'id' => 'feedback_reply_form')) ?>
			<div class="form_row">
				<?= $form->input('full_name', array('class' => 'textbox')) ?>
			</div>
			<div class="form_row">
				<?= $form->input('email', array('class' => 'textbox')) ?>
			</div>
			<div class="form_row">
				<?= $form->input('comment', array('type' => 'textarea')) ?>
			</div>
			<?= $form->hidden('slug', array('value' => $feedback['Feedback']['slug'])) ?>
			<?= $form->hidden('feedback_id', array('value' => $feedback['Feedback']['id'])) ?>
			<input type="image" src="/img/resume/addReply.png" alt="Add Reply" />
			<?= $form->end() ?>
		</div>
	</div>
	<div class="clearfloat"></div>
	
</div>