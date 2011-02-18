<?= $this->Html->script(array('resume'), false) ?>
<? $this->Html->css(array('/css/themes/'.$theme_slug), 'stylesheet', array('media' => 'all', 'inline' => false)) ?>

<? 
$this->set(
	array(
		'title_for_layout' => $resume['Resume']['title'],
		'meta_description' => $resume['Resume']['title']
	)
);

if (count($resume['ResumeKeyword'])) {
	$keywords = array();
	foreach ($resume['ResumeKeyword'] as $kw) {
		$keywords[] = $kw['keywords'];
	}
	$this->set('meta_keywords', implode(", ", $keywords));
}

?>

<?= $this->element('last_updated_on') ?>

<?= $this->ResumeTask->generateLikeButton($resume['Resume']['id']) ?>


<div id="resume_sheet">

	<div class="paper">
		
	<? if ($resume['ResumeSetting']['allow_direct_contact'] && $this->Session->read('Auth.User.id')) { ?>
	<div id="direct_contact">
		Contact <?=$resume['ResumePersonalInformation']['full_name']?>
	</div>
	<? } ?>
		
	<? 
		foreach (explode('/', $resume['ResumeSectionOrder']['section_orders']) as $s) {
			if (!in_array($s, $disabledSection)) {
				echo $this->element('resume/view/'.$theme_slug.'/'.$s);
			}
		} 
	?>

	</div>
	
	<div style="display:none" id="overlay"></div>
	
	<div id="direct_message_box" class="overlay_box" style="display:none">
		<h2>Send Message</h2>
		<ul class="direct_message_form">
			<li>
				<label>Subject:</label>
				<input type="text" id="subject" />
			</li>
			<li>
				<label>Message:</label>
				<textarea id="body"></textarea>
			</li>
		</ul>
		<div style="text-align:right">
			<input type="button" id="send_direct_message" class="blue_btn" value="Send" />
			<input type="button" id="cancel_direct_message" class="green_btn" value="Cancel" />
		</div>
		
	</div>

</div>

<div id="updated_status" style="display:none"></div>

