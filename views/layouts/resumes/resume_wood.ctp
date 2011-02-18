<?=$this->element('resume_head')?>
<body>
	<?=$this->element('resume_top_bar')?>
	<div class="bottomShadow">
	<div style="width:970px; margin:0 auto">
	<div class="leftShadow">
		<div class="rightShadow">
			<div id="resume_sheet">
				<div class="paper">
					<div class="left_col">

						<?=$this->element('user_image', array('photo' => $profile['Profile']['photo']))?>

						<? if ($profile['Profile']['first_name'] && $profile['Profile']['last_name']) { ?>
							<div id="name"><?=$profile['Profile']['first_name']?> <?=$profile['Profile']['last_name']?></div>
						<? } ?>

						<? if (!$resume['ResumeSetting']['hide_personal_info']) { ?>
							<? $personalInfo = $resume['ResumePersonalInformation'] ?>
							<ul id="personal_information">
								<? if ($personalInfo['address']) { ?>
								<li><?=$personalInfo['address']?></li>
								<? } ?>
								<li><?=$personalInfo['city']?>, <?=$personalInfo['state']?>, <?=$personalInfo['postal_code']?></li>
								<? if ($personalInfo['phone_number']) { ?>
									<li><?=$personalInfo['phone_number']?></li>
								<? } ?>
								<? if ($personalInfo['email']) { ?>
									<li><a href="mailto:<?=$personalInfo['email']?>"><bdo dir="rtl"><?=strrev($personalInfo['email'])?></bdo></a></li>
								<? } ?>
								<? if ($personalInfo['website']) { ?>
									<li><?=$this->Html->link($personalInfo['website'], $personalInfo['website'], array('target' => '_blank'))?></li>
								<? } ?>
							</ul>

							<? if ($personalInfo['facebook'] || $personalInfo['twitter'] || $personalInfo['flickr'] || $personalInfo['linkedin']) { ?>
							<div id="social_networks">
								<? if ($personalInfo['facebook']) { ?>
									<a href="<?=$personalInfo['facebook']?>" target="_blank">
										<?=$this->Html->image('export/facebook_16.png', array('alt' => 'Facebook', 'title' => 'Facebook'))?>
									</a>
								<? } ?>
								<? if ($personalInfo['twitter']) { ?>
									<a href="<?=$personalInfo['twitter']?>" target="_blank">
										<?=$this->Html->image('export/twitter_16.png', array('alt' => 'Twitter', 'title' => 'Twitter'))?>
									</a>
								<? } ?>
								<? if ($personalInfo['flickr']) { ?>
									<a href="<?=$personalInfo['flickr']?>" target="_blank">
										<?=$this->Html->image('export/flickr_16.png', array('alt' => 'Flickr', 'title' => 'Flickr'))?>
									</a>
								<? } ?>
								<? if ($personalInfo['linkedin']) { ?>
									<a href="<?=$personalInfo['linkedin']?>" target="_blank">
										<?=$this->Html->image('export/linkedin_16.png', array('alt' => 'LinkedIn', 'title' => 'LinkedIn'))?>
									</a>
								<? } ?>
							</div>
							<? } ?>

						<? } ?>

					</div>
					<div class="right_col">

						<? 
							foreach (explode('/', $resume['ResumeSectionOrder']['section_orders']) as $s) {
								if (!in_array($s, $disabledSection)) {
									echo $this->element('resume/view/'.$theme_slug.'/'.$s);
								}
							} 
						?>

					</div>
					<div class="clearfloat"></div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	
</body>
</html>