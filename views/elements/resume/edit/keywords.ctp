<div class="box_top"></div>
<div class="box">
	<h2>Keywords</h2>
	<p>Enter your desire keywords. These keywords will be used as meta keywords for your resume.</p>
	<div id="keywordsMessage">
		<span id="keywordsLeft">
		<? if (count($this->data['ResumeKeyword'])) { ?>
		<?=20 - count($this->data['ResumeKeyword'])?> keywords left.
		<? } else { ?>
		You have 20 keywords to go for. Choose wisely.
		<? } ?>
		</span>
	</div>
	<div id="keywordsListWrapper">
			<div id="keywordsList">
				<? foreach($this->data['ResumeKeyword'] as $kw) { ?>
					<div class="keyword_wrapper">
						<div class="keyword"><?=$kw['keywords']?></div>
						<div class="keyword_remove" rel="<?=$kw['id']?>">x</div>
					</div>
				<? } ?>
			</div>
			<input type="text" id="keywordsInput" />
			<div class="clearfloat"></div>
	</div>
	
</div>
<div class="box_bottom"></div>