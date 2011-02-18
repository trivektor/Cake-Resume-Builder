<? $personalInfo = $resume['ResumePersonalInformation'] ?>

<div id="personal_info_wrapper">

<?= $this->element('user_image') ?>	
	
<div id="personal_info">
	<h1 id="resume_name"><?= $personalInfo['full_name'] ?></h1>
	
	<? if (!$resume['ResumeSetting']['hide_personal_info']) { ?>
	
		<ul>
			<? if ($personalInfo['email']) { ?>
				<li><strong>Email:</strong> <a href="mailto:<?=$personalInfo['email']?>"><?=$personalInfo['email']?></a></li>
			<? } ?>
			<? if ($personalInfo['website']) { ?>
				<li><strong>Website:</strong> <a href="<?=$personalInfo['website']?>" target="_blank"><?=$personalInfo['website']?></a></li>
			<? } ?>
			<? if ($personalInfo['phone_number']) { ?>
				<li><strong>Phone:</strong> <a><?= $personalInfo['phone_number'] ?></a></li>
			<? } ?>
			<? if ($personalInfo['fax_number']) { ?>
				<li><strong>Fax:</strong> <a><?= $personalInfo['fax_number'] ?></a></li>
			<? } ?>
		</ul>
		
		<? if ($personalInfo['bio']) { ?>
		<div id="personal_info_bio">
			<?=Markdown($personalInfo['bio'])?>
		</div>
		<? } ?>
	
	
	<? } ?>
	
</div>



<div class="clearfloat"></div>
</div>
