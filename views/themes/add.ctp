<div class="themes form">
<?php echo $this->Form->create('Theme');?>
	<fieldset>
 		<legend><?php __('Add Theme'); ?></legend>
	<?php
		echo $this->Form->input('theme');
		echo $this->Form->input('slug');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Themes', true), array('action' => 'index'));?></li>
	</ul>
</div>