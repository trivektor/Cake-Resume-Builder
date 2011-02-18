<?= $this->Html->script(array('jquery.autoheight'), false) ?>

<script>
$(document).ready(function(){
	$("#theme_dropdown").change(function(){
		$.post(
			"/ajax/update_resume_theme",
			{id: $("#ResumeThemeId").val(), theme_id: $(this).val(), resume_id: $("#ResumeId").val()},
			function() {
				var r = $("#resume_preview");
				r.attr("src", r.attr("src"));
			}
		)
	})
	
	var themeListContainer = $("#theme_list_container");
	
	var themeListTrigger = $("#theme_list_trigger");
	
	themeListTrigger.click(function(){
		$(this).hide(function(){
			themeListContainer.slideDown();
		})
	})
	
	$("#closeThemeSelector").click(function(){
		themeListContainer.fadeOut(function(){
			themeListTrigger.show();
		})
	})
	
})
</script>

<div id="theme_list_container">
	<div id="theme_list">
	<span>Pick a theme</span>
	<?=$form->input('ResumeTheme.theme', array('id' => 'theme_dropdown', 'type' => 'select', 'label' => false, 'div' => false, 'options' => $themeList, 'selected' => $this->data['ResumeTheme']['theme']))?>
	</div>
	<?=$this->Html->image('resume/closeThemeSelector.png', array('id' => 'closeThemeSelector', 'alt' => 'Close Theme Selector'))?>
</div>

<div id="theme_list_trigger" style="display:none">Show themes</div>

<iframe id="resume_preview" class="autoHeight" width="100%" scrolling="no" src="/resumes/view/<?=$this->data['Resume']['url']?>" border="0"></iframe>

<?= $form->input('Resume.id', array('type' => 'hidden')) ?>
<?= $form->input('ResumeTheme.id', array('type' => 'hidden')) ?>