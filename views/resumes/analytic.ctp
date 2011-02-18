<?

$visitorInfo = $this->data['views'];
$dayBreakdown = array();
$totalViews = count($this->data['views']);

foreach ($visitorInfo as $vif) {
	$day = date("D", strtotime($vif['VisitorInfo']['stamp']));
	if (array_key_exists($day, $dayBreakdown)) {
		$dayBreakdown[$day] += 1;
	} else {
		$dayBreakdown[$day] = 1;
	}
	
}

$days = $analytic->getDays(date("Y-m-d", strtotime("6 days ago")), date("Y-m-d"));

foreach ($days as $d) {
	if (!array_key_exists($d, $dayBreakdown)) {
		$dayBreakdown[$d] = 0;
	}
}

?>

<div class="graph_wrapper">
	<h2><?= $resume_title ?> view stats</h2>
	<div class="graph">
		<? $left = 50 ?>
		<? foreach ($days as $d) { ?>
			<? $percentage = $dayBreakdown[$d] == 0 ? 0 : $dayBreakdown[$d]/$totalViews ?>
			<? if ($percentage) { ?>
				<div class="graph_column" style="height:<?=$percentage*170?>px;left:<?=$left?>px">
					<span><?=$dayBreakdown[$d]?></span>
				</div>
			<? } ?>
			<? $left += 50 ?>
		<? } ?>
	</div>
	<? $left = 50 ?>
	<? foreach ($days as $d) { ?>
		<span class="graph_date" style="left:<?=$left?>px"><?=$d?></span>
		<? $left += 50 ?>
	<? } ?>
</div>

<?
$browserPlatform = $this->data['browsers_platforms'];
$totalBrowserPlatform = count($this->data['browsers_platforms']);
$browserBreakdown = $platformBreakdown = array();

foreach ($browserPlatform as $bp) {
	
	$browser = $bp['VisitorInfo']['browser'].' '.$bp['VisitorInfo']['version'];
	
	if (array_key_exists($browser, $browserBreakdown)) {
		$browserBreakdown[$browser] += 1;
	} else {
		$browserBreakdown[$browser] = 0;
	}
	
	$platform = $bp['VisitorInfo']['platform'];
	
	if (array_key_exists($platform, $platformBreakdown)) {
		$platformBreakdown[$platform] += 1;
	} else {
		$platformBreakdown[$platform] = 0;
	}
	
	
}

//debug($browserBreakdown);
//debug($platformBreakdown);
$totalExclusiveBrowsers = array_sum(array_values($browserBreakdown));
$totalExclusivePlatforms = array_sum(array_values($platformBreakdown));
?>

<div class="graph_wrapper">
	<h2>Browser Distribution (<?=Configure::read('browser_distribution_ago')?> days)</h2>
	<div class="graph">
		<? $left = 50 ?>
		<? foreach ($browserBreakdown as $br => $n) { ?>
			<? $percentage = $n == 0 ? 0 : $n/$totalExclusiveBrowsers ?>
			<div class="graph_column" style="height:<?=$percentage*170?>px;left:<?=$left?>px">
				<span><?=$br?> (<?=$n?>)</span>
			</div>
			<? $left += 50 ?>
		<? } ?>
	</div>
</div>

<div class="graph_wrapper">
	<h2>Operating System Distribution (<?=Configure::read('browser_distribution_ago')?> days)</h2>
	<div class="graph">
		<? $left = 50 ?>
		<? foreach ($platformBreakdown as $br => $n) { ?>
			<? $percentage = $n == 0 ? 0 : $n/$totalExclusivePlatforms ?>
			<div class="graph_column" style="height:<?=$percentage*170?>px;left:<?=$left?>px">
				<span><?=$br?> (<?=$n?>)</span>
			</div>
			<? $left += 50 ?>
		<? } ?>
	</div>
</div>

