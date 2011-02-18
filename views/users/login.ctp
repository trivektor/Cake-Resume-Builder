<?= $session->flash('auth') ?>

<div id="login_form" class="form">
	
<h2>Login</h2>

<?= $form->create('User', array('action' => 'login', 'autocomplete'=>'off')) ?>


	<div class="form_row">
		<?= $form->input('email', array('id' => 'email', 'class' => 'textbox')) ?>
	</div>

	<div class="form_row">
		<?= $form->input('password', array('id' => 'password', 'class' => 'textbox')) ?>
	</div>

	<input type="submit" value="Login" style="margin-right:10px" />
	
	<?= $html->link('Create account', '/users/register', array('style' => 'margin-left:10px')) ?>
	<small>|</small>
	<?= $html->link('Forgot Password', '/users/forgot_password') ?>

</form>

</div>