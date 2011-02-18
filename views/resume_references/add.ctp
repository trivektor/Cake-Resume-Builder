<? $this->set('title_for_layout', 'Add Reference') ?>

<div class="blue_region">
	
<div class="box_top"></div>

<div class="box">
<h2>Add Reference</h2>

<?= $form->create('ResumeReference', array('action' => '/add/'.$this->params['pass'][0]))?>

<? foreach (array('name', 'title', 'organization', 'department', 'address', 'city', 'state', 'postal_code', 'country', 'phone_number', 
'fax_number', 'email', 'website') as $f) {?>
<div class="form_row">
	<? $label = ucwords(str_replace('_', ' ', $f)) ?>
	<label for="ResumeReference.<?=$label?>"><?=$label?></label>
	<?= $form->input('ResumeReference.'.$f, array('div' => false, 'label' => false, 'class' => ($f != 'country' ? 'textbox' : '')))?>
</div>
<? } ?>

<div class="form_row">
	<?= $form->input('details', array('class' => 'markitup')) ?>
	<div class="clearfloat"></div>
</div>

<input type="image" src="/img/resume/addItNowBtn.png" alt="Add It Now" />

<?= $form->end()?>

</div>
<div class="box_bottom"></div>

</div>