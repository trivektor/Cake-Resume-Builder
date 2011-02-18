<div class="box_top"></div>
<div class="box">
	
<?=$this->element('section_name_editor', array('sectionName' => $sectionName, 'sectionId' => $sectionId, 'sectionSlug' => 'personal_information'))?>

<div class="clearfloat"></div>

<div class="form_row">
	<label for="ResumePersonalInformationFullName">Full Name</label>
	<div class="eg">(e.g. John Smith)</div>
	<?= $form->input('ResumePersonalInformation.full_name', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationAddress">Address</label>
	<div class="eg">(e.g. 22 Baker St)</div>
	<?= $form->input('ResumePersonalInformation.address', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationCity">City</label>
	<div class="eg">(e.g. Toronto)</div>
	<?= $form->input('ResumePersonalInformation.city', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationState">State/Province</label>
	<div class="eg">(e.g. Ontario)</div>
	<?= $form->input('ResumePersonalInformation.state', array('label' => false, 'div' => false, 'class' => 'textbox'))?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationPhoneNumber">Phone Number</label>
	<div class="eg">(e.g. xxx xxx-xxxx)</div>
	<?= $form->input('ResumePersonalInformation.phone_number', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationFaxNumber">Fax Number</label>
	<div class="eg">(e.g. xxx-xxx-xxx)</div>
	<?= $form->input('ResumePersonalInformation.fax_number', array('label' => false, 'div' => false, 'class' => 'textbox'))?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationEmail">Email</label>
	<div class="eg">(e.g. email@abc.com)</div>
	<?= $form->input('ResumePersonalInformation.email', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationWebsite">Website</label>
	<div class="eg">(e.g. http://www.somewebsite.com)</div>
	<?= $form->input('ResumePersonalInformation.website', array('label' => false, 'div' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label>Bio / Summary</label>
	<?= $form->input('ResumePersonalInformation.bio', array('label' => false, 'class' => 'markitup')) ?>
	<div class="clearfloat"></div>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationFacebook">Facebook</label>
	<div class="eg">(e.g. http://www.facebook.com/#!/trivuong)</div>
	<?= $form->input('ResumePersonalInformation.facebook', array('label' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationTwitter">Twitter</label>
	<div class="eg">(e.g. @twitter)</div>
	<?= $form->input('ResumePersonalInformation.twitter', array('label' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationFlickr">Flickr</label>
	<div class="eg">(e.g. http://www.flickr.com/)</div>
	<?= $form->input('ResumePersonalInformation.flickr', array('label' => false, 'class' => 'textbox')) ?>
</div>

<div class="form_row">
	<label for="ResumePersonalInformationLinkedin">Linkedin</label>
	<div class="eg">(e.g. http://www.linkedin.com/in/johnsmith)</div>
	<?= $form->input('ResumePersonalInformation.linkedin', array('label' => false, 'class' => 'textbox')) ?>
</div>

<div class="clearfloat"></div>
</div>
<div class="box_bottom"></div>
