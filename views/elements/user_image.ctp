<? 
if ($photo == 'male.png' || $photo == 'female.png') {
	echo $html->image('resume/'.$photo, array('class' => 'user_image'));
} else if ($photo == '') {
	echo $html->image('resume/male.png', array('class' => 'user_image'));
} else {
	echo $this->Html->image('/userphoto/'.$photo, array('class' => 'user_image'));
}
?>