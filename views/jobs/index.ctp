<h2 class="textheader">Jobs Listing</h2>

<div class="blue_region">
	<ul class="item_list">
		<? 
		foreach($jobs as $j) {
			echo $this->element('job_item', array('job' => $j, 'type' => 'job_item'));
		}
		?>
	</ul>
</div>