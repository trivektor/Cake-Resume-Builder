<? $this->set('title_for_layout', 'Search results for "'.$this->data['Job']['keywords'].'"') ?>

<? if (!empty($this->params['named']['keywords'])) { ?>
<h2>Search Results For "<?=$this->params['named']['keywords']?>"</h2>
<? } ?>

<? if ($results) { ?>
	<p class="num_search_results"><?=count($results)?> jobs found</p>
	<div class="blue_region">
		<ul class="search_results_list">
			<? 
			foreach($results as $r) {
				echo $this->element('job_item', array('job' => $r, 'type' => 'job_item'));
			} 
			?>
		</ul>
		<?=$html->image('resume/saveResultsBtn.png', array(
			'alt' => 'Save Search Results', 
			'class' => 'save_search_results_trigger'
		))?>
	</div>
<? } else { ?>
	<p>No jobs found</p>
<? } ?>

<?=$this->element('save_search_results_overlay')?>