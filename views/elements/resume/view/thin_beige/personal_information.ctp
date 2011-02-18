<div id="personal_info">
	<? $personal_info = $resume['ResumePersonalInformation'] ?>

	<h1 id="resume_full_name">
		<?=$personal_info['full_name']?>
	</h1>
	<? if (!$resume['ResumeSetting']['hide_personal_info']) { ?>
		<ul>
			<? if ($personal_info['address']) { ?>
				<li>
					<?=$personal_info['address']?>, 
					<?=$personal_info['city']?>, <?=$personal_info['state']?>, <?=$personal_info['postal_code']?>
				</li>
			<? } ?>
			<? if ($personal_info['email']) { ?>
				<li><?=$this->EmailProtect->obfuscate_email($personal_info['email'])?></li>
			<? } ?>
			<? if ($personal_info['fax_number']) { ?>
				<li><?=$personal_info['fax_number']?></li>
			<? } ?>
			<? if ($personal_info['website']) { ?>
				<li><a href="<?=$personal_info['website']?>" target="_blank"><?=$personal_info['website']?></a></li>
			<? } ?>
		</ul>
	<? } ?>
</div>