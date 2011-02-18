<? //$this->Html->css(array('ajaxupload'), 'stylesheet', array('media' => 'all', 'inline' => false)) ?>
<? $this->Html->script(array('ajaxupload', 'jcrop'), false) ?>

<script type="text/javascript">
$(function(){
	
	$("#upload-photo").click(function(){
		$("#photo-uploader").show();
	})

})
</script>

<div class="blue_region">

<h2>Edit Profile</h2>

<?= $form->create('Profile', array('action' => 'edit', 'enctype' => 'multipart/form-data')) ?>

<div class="form_row">
<?= $this->data['Profile']['photo'] ? $this->Html->image('/userphoto/'.$this->data['Profile']['photo']) : '' ?>
<span id="upload_photo">Upload Photo</span>
</div>

<div class="form_row">
<?= $form->input('first_name') ?>
</div>

<div class="form_row">
<?= $form->input('last_name') ?>
</div>

<div class="form_row">
<?= $form->input('city') ?>
</div>

<div class="form_row">
<?= $form->input('postal_code') ?>
</div>

<div class="form_row">
<?=$form->input('country_id', array('type'=>'select', 'options'=>$countryList, 'empty'=>'Select your country'))?>
</div>

<div class="form_row">
<?= $form->input('job_category', array('type'=>'select', 'options'=>$jobCategoryList, 'empty'=>'Select your job category'))?>
</div>

<div class="form_row">
<?= $form->input('job_title')?>
</div>




<input type="hidden" id="x1" value="" />
<input type="hidden" id="y1" value="" />
<input type="hidden" id="w" value="" />
<input type="hidden" id="h" value="" />
<input type="hidden" id="temp-profile-image" value="" />
<div id="profile-image-preview-overlay" style="display:none">
	<div id="profile-image-preview"></div>
	<span id="crop-image-button" class="blue_btn">Crop</span>
	<span id="cancel-cropping" class="blue_btn">Cancel</span>
</div>

<div id="photo-uploader" style="">
	<h2>Upload Photo</h2>
	<iframe id="photouploadiframe" src="/resume/profile/upload_photo" frameBorder="0" width="100%" height="400" style="border:0" scrolling="no"></iframe>
</div>




<?= $form->input('user_id', array('type' => 'hidden'))?>
<?= $form->input('id', array('type' => 'hidden'))?>

<?= $form->end('Submit') ?>

</div>
