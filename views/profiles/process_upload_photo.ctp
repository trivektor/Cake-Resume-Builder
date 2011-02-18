<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?=$this->Html->css(array('master', 'imgareaselect-default'))?>
<?=$this->Html->script(array('jquery-1.4.2.min.js', 'jquery.imgareaselect.js'))?>
</head>
<body style="background:none">

	<?= $form->create('Profile', array('action' => '/crop_photo', 'enctype' => 'multipart/form-data'))?>
		
	<?
	
	echo $form->input('id');
	echo $form->hidden('name');
	echo $cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],151,151); 
	echo $cropimage->createForm($uploaded["imagePath"], 151, 151);
	
	?>
	
	<br />

	<input type="image" alt="Crop" id="save_thumb" src="/img/resume/cropPhotoBtn.png" />

	<?=$this->Html->image('resume/cancelUploadBtn.png', array('id' => 'cancel'))?>

	<?= $form->end() ?>

	<script>
	window.onload = function() {
		document.getElementById("cancel").onclick = function(event){
			event.preventDefault();
			top.cancel_photo_upload();
		}
	}
	</script>


</body>

</html>