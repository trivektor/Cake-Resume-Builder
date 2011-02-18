<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?=$this->Html->css(array('master'))?>
</head>
<body style="background:none">

<h2>Upload Photo</h2>

<?= $form->create('Profile', array('action' => '/process_upload_photo', 'enctype' => 'multipart/form-data'))?>
<?= $form->input('image', array('type' => 'file', 'label' => false)) ?>

<br />
<input type="image" src="/img/resume/uploadPhotoBtn.png" src="Upload Photo" />
<?= $this->Html->image('resume/cancelUploadBtn.png', array('id' => 'cancel_upload_photo', 'alt' => 'Cancel Upload')) ?>

</form>
<script>
window.onload = function() {
	document.getElementById("cancel_upload_photo").onclick = function(event) {
		event.preventDefault();
		top.cancel_photo_upload();
	}
}
</script>

</body>

</html>