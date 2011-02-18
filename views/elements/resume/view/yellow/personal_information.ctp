<? $personalInfo = $resume['ResumePersonalInformation'] ?>

<div class="section_wrapper">
	<div id="personal_info_left">
		<h1><?= $personalInfo['full_name'] ?></h1>
	</div>

	<? if ($resume['ResumeSetting']['hide_personal_info'] == 0) { ?>

	<ul id="personal_info_right">
		<? if ($personalInfo['email']) { ?>
			<li>
				e: <?=$this->EmailProtect->obfuscate_email($personalInfo['email'])?>
			</li>
		<? } ?>
		<? if ($personalInfo['website']) { ?>
			<li>
			w: <?= $html->link($personalInfo['website'], $personalInfo['website'], array('target' => '_blank')) ?>
			</li>
		<? } ?>
		<? if ($personalInfo['address'] || $personalInfo['city'] || $personalInfo['state'] || $personalInfo['postal_code']) { ?>
			<li>
			a: <?= $personalInfo['address']?>, <?= $personalInfo['city'] ?>, <?= $personalInfo['state'] ?>, <?= $personalInfo['postal_code']?>
			</li>
		<? } ?>
		<? if ($personalInfo['phone_number']) { ?>
			<li>
				p: <?= $personalInfo['phone_number'] ?>
			</li>
		<? } ?>
		<? if ($personalInfo['fax_number']) { ?>
			<li>
				f: <?= $personal_info['fax_number'] ?>
			</li>
		<? } ?>
	</ul>

	<? } ?>
	<div class="clearfloat"></div>
</div>