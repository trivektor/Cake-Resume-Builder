<? $this->set('title_for_layout', 'Give Feedbacks') ?>

<div id="feedback_form" class="blue_region">
	
<?= $this->element('feedback_header') ?>

<!-- Feedback form starts -->

	<?= $form->create('Feedback', array('action' => 'create')) ?>

	<div class="form_row white_region">
		<label>Give your topic a name</label>
		<?= $form->input('Feedback.title', array('class' => 'textbox', 'div' => false, 'label' => false)) ?>
	</div>

	<div class="form_row white_region">
		<label>Your topic</label>
		<?= $form->input('Feedback.body', array('div' => false, 'label' => false)) ?>
	</div>
		
	<div class="form_row white_region">
		<label>Feedback type</label>
		<div class="textbox" style="margin:0; padding:10px">
			<ul id="feedback_type">
				<li><input type="radio" class="radio" name="data[Feedback][type]" value="idea" /></li>
				<li class="white_region"><span id="feedback_idea">Suggest Idea</span></li>
				<li><input type="radio" class="radio" name="data[Feedback][type]" value="question" /></li>
				<li class="white_region"><span id="feedback_question">Question</span></li>
				<li><input type="radio" class="radio" name="data[Feedback][type]" value="bug" /></li>
				<li class="white_region"><span id="feedback_bug">Bug Report</span></li>
				<li><input type="radio" class="radio" name="data[Feedback][type]" value="praise" /></li>
				<li class="white_region"><span id="feedback_praise">Praise</span></li>
				<li><input type="radio" class="radio" name="data[Feedback][type]" value="assistance_request"></li>
				<li class="white_region"><span id="feedback_assistance_request">Assistance Request</span></li>
			</ul>
		</div>
	</div>
	
	<div class="form_row white_region">
		<?=$form->input('Feedback.tags', array('div' => false, 'class' => 'textbox'))?>
	</div>
	
	<input type="image" src="/img/resume/submitFeedback.png" alt="Submit Feedback" />

	<?= $form->end() ?>
	
<!-- Feedback form ends -->


</div>