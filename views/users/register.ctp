<? $this->set('title_for_layout', 'Signup') ?>

<?= $form->create('User', array('action'=>'register', 'autocomplete'=>'off')) ?>

<div id="registration_form" class="form">
	
<h2>Create An Account</h2>

<div class="form_row">
<?= $form->input('username', array('id' => 'username', 'class' => 'textbox')) ?>
</div>

<div class="form_row">
<?= $form->input('email', array('id' => 'email', 'class' => 'textbox')) ?>
</div>

<div class="form_row">
<?= $form->input('passwd', array('id' => 'password', 'class' => 'textbox', 'label'=>'Password')) ?>
</div>

<div class="form_row">
<?= $form->input('passwd_confirm', array('id' => 'password', 'class' => 'textbox', 'type'=>'password', 'label'=>'Confirm Password')) ?>
</div>

<input type="image" src="/img/resume/alrightLetsGoBtn.png" alt="Join Now" />

<?= $form->end() ?>

</div>