<script type="text/javascript">

function getScrollTop() {
		var scrollTop = 0;
	
		if (window.pageYOffset) {
			scrollTop = window.pageYOffset;
		} else if (document.documentElement) {
			scrollTop = document.documentElement.scrollTop;
		} else if (document.body) {
			scrollTop = document.body.scrollTop;
		}
		var windowHeight = jQuery(window).height();
		
		if (windowHeight < 500) {
			return scrollTop + 85;
		} else {
			return scrollTop + (windowHeight - 400)/2 - 5;
		}
		//return scrollTop + 90;
	}


$(function(){
	var socialNetworks = $("#social_networks");
	$(window).scroll(function(){
		socialNetworks.css("top", getScrollTop()-40);
	});
})
</script>

<? $personalInfo = $resume['ResumePersonalInformation'] ?>
<div id="name_header">
	<h1><?=$personalInfo['full_name']?></h1>
	<? if ($personalInfo['bio']) { ?>
		<h2><?=$personalInfo['bio']?></h2>
	<? } ?>
</div>

<div id="personal_information" class="section">
	<h2><?=$sectionName['personal_information']?></h2>
	<div id="mugshot">
		<? if ($profile['Profile']['photo']) {
			echo $this->Html->image('/userphoto/'.$profile['Profile']['photo'], array('alt' => $personalInfo['full_name'], 'id' => 'user_photo'));
		} else {
			echo $this->Html->image('/resume/male.png', array('alt' => $personalInfo['full_name'], 'id' => 'user_photo'));
		} ?>
	</div>
	<div id="personal_details">
		<ul>
			<? if ($personalInfo['address']) { ?>
				<li><span>Address:</span> <?=$personalInfo['address']?></li>
			<? } ?>
			<? if ($personalInfo['email']) { ?>
				<li><span>Email:</span> <bdo dir="rtl"><?=strrev($personalInfo['email'])?></bdo></li>
			<? } ?>
			<? if ($personalInfo['phone_number']) { ?>
				<li><span>Phone:</span> <?=$personalInfo['phone_number']?></li>
			<? } ?>
			<? if ($personalInfo['fax_number']) { ?>
				<li><span>Fax:</span> <?=$personalInfo['fax_number']?></li>
			<? } ?>
			<? if ($personalInfo['website']) { ?>
				<li><span>Website:</span> <?=$personalInfo['website']?></li>
			<? } ?>
		</ul>
	</div>
	<div class="clearfloat"></div>
	
	<div id="social_networks">
		<? foreach(array('facebook', 'twitter', 'linkedin', 'flickr') as $n) { ?>
			<? if ($personalInfo[$n]) { ?>
				<a target="_blank" href="<?=Configure::read('SocialNetworks.'.$n.'_url')?>/<?=$personalInfo[$n]?>"><img src="/resume/img/resume/export/<?=$n?>_32.png" alt="<?=ucfirst($n)?>" /></a>
			<? } ?>
		<? } ?>
	</div>
	
</div>

