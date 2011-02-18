<div id="name_tag_wrapper">
	<h1 id="name_tag"><?=$resume['ResumePersonalInformation']['full_name']?></h1>
	
	<? $personal_info = $resume['ResumePersonalInformation'] ?>

	<? if (!$resume['ResumeSetting']['hide_personal_info']) { ?>
		<ul id="personal_info">
			
			<li><?=$personal_info['address']?>, <?=$personal_info['city']?>, <?=$personal_info['state']?>, <?=$personal_info['postal_code']?></li>
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
		
		<ul id="social_networks">
			<li><a href="<?=$personal_info['linkedin']?>" target="_blank"><?=$html->image('export/linkedin_16.png', array('title' => 'LinkedIn'))?></a></li>
			<li><a href="<?=$personal_info['flickr']?>" target="_blank"><?=$html->image('export/flickr_16.png', array('title' => 'Flickr'))?></a></li>
			<li><a href="<?=$personal_info['twitter']?>" target="_blank"><?=$html->image('export/twitter_16.png', array('title' => 'Twitter'))?></a></li>
			<li><a href="<?=$personal_info['facebook']?>" target="_blank"><?=$html->image('export/facebook_16.png', array('title' => 'Facebook'))?></a></li>
		</ul>
		
	<? } ?>
	
</div>

