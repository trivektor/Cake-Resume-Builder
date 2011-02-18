<? $personalInfo = $resume['ResumePersonalInformation'] ?>
<h1><?= $personalInfo['full_name'] ?></h1>

<? if ($resume['ResumeSetting']['hide_personal_info'] == 0) { ?>
	
<div id="resume_email"><bdo dir="rtl"><?= strrev($personalInfo['email']) ?></bdo></div>
<? if ($personalInfo['address'] || $personalInfo['city'] || $personalInfo['state'] || $personalInfo['postal_code']) { ?>
<div id="resume_address"><?= $personalInfo['address']?>, <?= $personalInfo['city'] ?>, <?= $personalInfo['state'] ?>, <?= $personalInfo['postal_code']?></div>
<? } ?>
<? if ($personalInfo['phone_number']) { ?>
<div id="resume_phone"><?= $personalInfo['phone_number'] ?></div>
<? } ?>
<? if ($personalInfo['website']) { ?>
<div id="resume_website"><?= $html->link($personalInfo['website'], $personalInfo['website'], array('target' => '_blank')) ?></div>
<? } ?>

<? } ?>
