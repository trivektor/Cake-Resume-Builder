<? $this->set('title_for_layout', 'Feedback') ?>

<div class="blue_region">
	
<?= $this->element('feedback_header') ?>

<div id="feedback_search" class="white_region">
	<?= $form->create('Feedback') ?>
	<label>Search</span>
	<?= $form->input('keywords', array('class' => 'textbox', 'div' => false, 'label' => false)) ?>
	<?= $form->end() ?>
</div>

<div class="clearfloat"></div>

<div style="float:left; width:200px">
<? 
if ($this->Session->read('Auth.User.id')) {
	echo $html->link($html->image('resume/giveFeedback.png', array('alt' => 'Give Feedback')), array('controller' => 'feedbacks', 'action' => 'create'),
	array('escape' => false));
} else {
?>
	<p>Login to give feedback</p>
<?
}
?>
</div>

<div class="clearfloat"></div>

	<ul id="feedbacks_list" class="item_list">
		<? foreach ($feedbacks as $fb) { ?>
			<li class="white_region">
				<div class="left">
					<?=$html->link($fb['Feedback']['title'], array('controller' => 'feedbacks', 'action' => 'view', 
					$fb['Feedback']['slug']), array('class' => 'feedback_title'))?>
					<?
					echo $this->element('feedback_type', array('feedback' => $fb, 'feedback_poster' => $feedback_posters[$fb['Feedback']['user_id']]));
					?>
					<div class="feedback_num_replies">
					<?=count($fb['FeedbackComment'])?> replies / <?=$fb['Feedback']['views'] ?> views
					</div>
				</div>
				<div class="feedback_num_votes_wrapper">
					<?= 
					$html->link($html->image('resume/feedback_star.png', array('class' => 'star', 'alt' => 'Vote')), 
					array('controller' => 'feedbacks', 'action' => 'like', $fb['Feedback']['id']),
					array('escape' => false))
					?>
					<span class="feedback_num_likes"><?= $fb['Feedback']['likes'] ?></span>
					<div class="clearfloat"></div>
				</div>
				<div class="clearfloat"></div>
			</li>
		<? } ?>
	</ul>
	
	<div id="feedback_right" class="white_region">
		<p style="margin-bottom:10px">This is the helping forum for Killer Resume Builder. Our staff will answer questions posted here.</p>
		<div style="margin-bottom:10px"><strong>Feedback Statistics</strong></div>
		<ul class="item_list">
			<li>Total feedbacks: <?=count($feedbacks)?></li>
			<li>Total replies: <?=count($feedback_count)?></li>
		</ul>
	</div>
	
	<div class="clearfloat"></div>


</div>