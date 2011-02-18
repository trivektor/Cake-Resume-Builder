<div class="feedback_type">
<? $type = $feedback['Feedback']['type'] ?> 
<? 
if ($type == 'praise') {
	echo $html->image('resume/thumb_16.png', array('alt' => 'Praise', 'class' => 'feedback_type_icon'));
	echo '<span>praised by </span>';
} else if ($type == 'idea') {
	echo $html->image('resume/bulb_16.png', array('alt' => 'Idea', 'class' => 'feedback_type_icon'));
	echo '<span>idea suggested by </span>';
} else if ($type == 'question') {
	echo $html->image('resume/question_16.png', array('alt' => 'Question', 'class' => 'feedback_type_icon'));
	echo '<span>asked by </span>';
} else if ($type == 'bug') {
	echo $html->image('resume/bug_16.png', array('alt' => 'Bug', 'class' => 'feedback_type_icon'));
	echo '<span>bug reported by </span>';
} else if ($type == 'assistance_request') {
	echo $html->image('Basic_set_PNG/help_16.png', array('alt' => 'Assistance Request', 'class' => 'feedback_type_icon'));
	echo '<span>help requested by </span>';
}
?>
<span class="timestamp">
	<?= $html->link($feedback_poster['first_name'].' '.$feedback_poster['last_name'], array('controller' => 'profiles', 'action' => 'view', 
	$feedback_poster['user_id']))?> 
	on <?=$timestamp->toDate($feedback['Feedback']['stamp'])?>
</span>
</div>