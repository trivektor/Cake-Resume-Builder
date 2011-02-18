<h2><?=$message['Message']['subject']?></h2>

<div class="message_wrapper">
<? 
$senderPhoto = $senderProfile['Profile']['photo'];
if ($senderPhoto == 'male.png' || $senderPhoto == 'female.png') {
	echo $this->Html->image('/img/resume/'.$senderPhoto, array('class' => 'message_sender_photo'));
} else {
	echo $this->Html->image('/userphoto/'.$senderProfile['Profile']['photo'], array('class' => 'message_sender_photo'));
}  
?>
<div id="message_body">
	<?$senderUsername = $senderProfile['User']['username'] ?>
	<a href="/resume/profile/<?=$senderUsername?>"><?=$senderUsername?></a> 
	on 
	<span><?=date("l F d, Y", strtotime($message['Message']['stamp']))?></span>
	<p><?=$message['Message']['body']?></p>
	<div class="message_action">
		<a class="reply_message">Reply</a> - 
		<a class="report_message">Report</a>
	</div>
	
	<div id="reply">
		<>
	</div>
	
</div>

<div class="clearfloat"></div>
</div>