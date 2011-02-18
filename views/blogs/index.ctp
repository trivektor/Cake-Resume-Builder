<? $this->set('title_for_layout', 'Blog') ?>

<? $archive = $author = array() ?>


<div id="blog_post_list" class="blue_region">
	
<? foreach ($blogs as $b) { ?>

<? 
$d = date("F Y", strtotime($b['Blog']['stamp']));
$a = $b['Blog']['author'];
if (!array_key_exists($d, $archive)) {
	$archive[$d] = 1;
} else {
	$archive[$d] += 1;
}

if ($a) {
	if (!array_key_exists($a, $author)) {
		$author[$a] = 1;
	} else {
		$author[$a] += 1;
	}
}

echo $this->element('blog_post_item', array('blog' => $b));

?>
<? } ?>
</div>

<div id="blog_sidebar">
	
	<? if (count($author)) { ?>
		<h2>Authors</h2>
		<ul class="blog_archive">
			<? foreach($author as $m => $n) { ?>
				<li><?=$this->Html->link($m, array('controller' => 'blogs', 'action' => 'authors', $slug->enslug($m)))?></li>
			<? } ?>
		</ul>
	<? } ?>
	
	<? if (count($archive)) { ?>
		<h2>Archives</h2>
		<ul class="blog_archive">
			<? foreach($archive as $m => $n) { ?>
				
				<? $parts = explode(' ', $m) ?>
				<li><?= $this->Html->link($m, array('controller' => 'blogs', 'action' => 'archives', strtolower($parts[0]), $parts[1])) ?></li>
			<? } ?>
		</ul>
	<? } ?>
</div>

<div class="clearfloat"></div>