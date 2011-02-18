<li class="white_region">
	<div class="inner">
		<div class="left">
			<?=$html->link($result['SavedSearchResult']['name'], $result['SavedSearchResult']['url'])?>
		</div>
		<div class="options">
			<?=$html->image('Basic_set_PNG/delete_16.png', array('alt' => 'Remove search result', 'title' => 'Remove search result',
			'rel' => $result['SavedSearchResult']['id'], 'class' => 'remove_search_result', 'type' => $type))?>
		</div>
	</div>
</li>