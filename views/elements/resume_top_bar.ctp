<div id="resume_top_bar">
	<div id="resume_top_bar_inner">
		<? if ($resume['ResumeSetting']['show_last_updated']) { ?>
			<div id="last_updated_on">
				Last updated on: <?= date("M d, Y", strtotime($resume['Resume']['last_updated']))?>
			</div>
		<? } ?>
		<div id="resume_top_bar_options">
			<?= $this->ResumeTask->generateLikeButton($resume['Resume']['id']) ?>
			<span>Like</span>
			<!-- <?= $html->image('export/facebook_16.png', array('alt' => 'Facebook')) ?>
			<span>Share on Facebook</span>
			<?= $html->image('export/twitter_16.png', array('alt' => 'Twitter')) ?>
			<span>Share on Twitter</span>
			<?= $html->image('export/linkedin_16.png', array('alt' => 'LinkedIn')) ?>
			<span>Share on LinkedIn</span>
			<?= $html->image('Basic_set_PNG/flag_16.png', array('alt' => 'Report')) ?>
			<span>Report</span> -->
			<span class="st_sharethis_button" displayText="ShareThis"></span>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'4a0c43d2-5677-465e-9248-76e29a332fca'});</script>
		</div>
	</div>
</div>