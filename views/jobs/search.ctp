<? $this->set('title_for_layout', 'Advanced Job Search') ?>

<?= $form->create('Job') ?>

<? $input_options = array('div' => false, 'class' => 'textbox') ?>

<h2><?=$html->image('resume/searchJobHeader.png', array('alt' => 'Search Jobs'))?></h2>

	<? $input_options = array('class' => 'textbox', 'div' => false) ?>
	
	<div class="blue_region search_criteria">
		
		<div class="white_region">
			<div class="form_row">
				<label>Keywords</label>
				<?=$form->input('Job.keywords', array('id' => 'job_keywords', 'class' => 'textbox', 'type' => 'text', 'label' => false, 'div' => false))?>
				<div class="clearfloat"></div>
			</div>
		
			<div class="form_row">
				<?=$form->input('Job.title', $input_options)?>
				<label>Company</label>
				<?=$form->input('Job.company_name', array('class' => 'textbox', 'div' => false, 'label' => false))?>
				<div class="clearfloat"></div>
			</div>
			<div class="form_row">
				<?=$form->input('Job.location', $input_options)?>
				<?=$form->input('Job.postal_code', $input_options)?>
				<div class="clearfloat"></div>
			</div>
			<div class="form_row">
				<?=$form->input('Job.country', array('options' => $countries, 'empty' => '----'))?>
				<label>Functions</label>
				<?=$form->input('Job.job_category_id', array('options' => $job_categories, 'div' => false, 'label' => false, 'empty' => '----'))?>
				<div class="clearfloat"></div>
			</div>
			<div class="form_row">
				<?=$form->input('Job.type', array('options' => $job_types, 'div' => false, 'empty' => '----'))?>
				<label>Experience</label>
				<?=$form->input('Job.job_experience_level', array('options' => $job_experience_levels, 'div' => false, 'label' => false, 'empty' => '----'))?>
				<div class="clearfloat"></div>
			</div>
			
			<input type="image" src="/resume/img/resume/searchBtn.png" alt="Search" />
		</div>
		
		
	</div>

<?= $form->end() ?>