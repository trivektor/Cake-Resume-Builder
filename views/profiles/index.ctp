<? 
if ($user_profile['Profile']['first_name'] && $user_profile['Profile']['last_name'])  {
	$this->set('title_for_layout', $user_profile['Profile']['first_name'] .' '. $user_profile['Profile']['last_name']. "'s profile");
} else {
	$this->set('title_for_layout', $user['User']['username']."'s profile");
}
?>

<div id="profile_display">

	<!-- Profile header starts -->
	<div id="profile_header" class="blue_region">
		<?=$this->element('user_image', array('photo' => $user_profile['Profile']['photo']))?>
		<div class="white_region">
			<div id="profile_header_info">
				<h2 id="profile_name">
					<? 
					if ($user_profile['Profile']['first_name'] && $user_profile['Profile']['last_name'])  {
						echo $user_profile['Profile']['first_name'] .' '. $user_profile['Profile']['last_name'];
					} else {
						echo $user['User']['username'];
					}
					?>
						
				</h2>
				<div>
				<?= $user_profile['Profile']['job_title'] ?> <?= $jobCategory['JobCategory']['category_name'] ?>
				<?= $user_profile['Profile']['city'] ? ', '.$user_profile['Profile']['city'] : '' ?>
				<?= $user_profile['Profile']['country_id'] ? ', '.$countries[$user_profile['Profile']['country_id']] : '' ?>
				</div>
				<? 
				if ($this->Session->read('Auth.User.id') == $user_profile['Profile']['user_id']) {
					echo $html->link($html->image('Basic_set_PNG/pencil_16.png', array('title' => 'Edit your profile')),
					array('controller' => 'profiles', 'action' => 'edit', $user_profile['Profile']['id']),
					array('escape' => false, 'id' => 'edit_profile', 'class' => 'edit_profile_btn'));
				} 
				?>
			</div>
			<div class="clearfloat"></div>
		</div>
		<div class="clearfloat"></div>
	</div>
	<!-- Profile header ends -->
	
	<!-- Resume lists starts -->
	<div id="profile_left_col">
		
		<!-- Recently heard starts -->
		<h2>Recently heard</h2>
		<div class="thought_list blue_region">
		<? if ($thoughts) { ?>
			<ul>
				<? foreach($thoughts as $t) { ?>
					<li class="white_region">
						<div class="inner">
							<div class="thought"><?= $t['Thought']['thought']?></div>
							<p class="timestamp"><?= $timestamp->toDate($t['Thought']['stamp'])?> at <?=$timestamp->toHour($t['Thought']['stamp'])?></p>
						</div>
					</li>
				<? } ?>
			</ul>
		<? } else { ?>
			<div class="white_region">
				<div class="inner">
					This user has yet shared any thoughts
				</div>
			</div>
		<? } ?>
		</div>
		<!-- Recently heard ends -->
		
		<!-- Shouts starts -->
		<h2>Shouts</h2>
		<div class="blue_region">
			<? if ($this->Session->read('Auth.User.id')) { ?>
			<div id="shoutbox_wrapper" class="white_region">
				<?=$form->create('UserThread', array('action' => 'shout'))?>
					<?=$form->input('content', array('type' => 'textarea', 'id' => 'shout_box', 'label' => false))?>
					<div id="shout_options">
						<?=$form->input('private', array('type' => 'checkbox', 'label' => false, 'div' => false	))?>
						<?=$form->input('type', array('type' => 'hidden', 'value' => 'profile'))?>
						<?=$form->input('target_id', array('type' => 'hidden', 'value' => $user_profile['Profile']['user_id']))?>
						<span>Mark as private (only you and this person can see it)</span>
						<input id="send_shout" type="image" src="/img/resume/shoutItOutBtn.png" alt="Shout It Out" />
						<div class="clearfloat"></div>
					</div>
				</form>
			</div>
			<? } ?>
			<ul id="shouts_list" class="item_list">
				<? if ($shouts) { ?>
					<? $user_id = $this->Session->read('Auth.User.id') ?>
					<? foreach ($shouts as $s) { ?>
						
						<? 
						$canSeeMessage =
						//If user is logged in and this message is not private
						($user_id && $s['UserThread']['private'] == 0)
						||
						//If user is not logged in and this message is not private
						(!$user_id && $s['UserThread']['private'] == 0)
						||
						//If user is logged in and this is a shout they submitted
						($user_id && $s['UserThread']['user_id'] == $user_id)
						|| 
						//If user is logged in and this is a shout to them
						($user_id && $s['UserThread']['target_id'] == $user_id)
						?>
						<? if ($canSeeMessage) { ?>
						<li id="comment_<?=$s['UserThread']['id']?>">
							<?= $this->element('user_image', array('photo' => $shouters[$s['UserThread']['user_id']]['photo'])) ?>
							<div class="white_region">
								<p class="shout_message"><?=$s['UserThread']['content']?></p>
								<p class="timestamp">by <?=$html->link($shouters[$s['User']['id']]['first_name'].' '.$shouters[$s['User']['id']]['last_name'], array('controller' => 'profiles', 'action' => 'index', $s['User']['username']))?>
									on <?=$timestamp->toDate($s['UserThread']['stamp'])?> at <?=$timestamp->toHour($s['UserThread']['stamp'])?>
								</p>
								<div class="options">
									<span class="remove_comment" title="Delete this comment" rel="<?=$s['UserThread']['id']?>"></span>
									<? if ($s['UserThread']['reported']) { ?>
									<span class="comment_reported" title="This comment has been reported"></span>
									<? } else { ?>
									<span class="report_comment" title="Report this comment" rel="<?=$s['UserThread']['id']?>"></span>
									<? } ?>
								</div>
							</div>
							<div class="clearfloat"></div>
						</li>
						<? } ?>
					<? } ?>
				<? } ?>
			</ul>
		</div>
		<!-- Shouts ends -->
		
	</div>
	<!-- Resume lists ends -->
	
	<!-- Right col starts -->
	<div id="profile_right_col">
		<h2>Resumes</h2>
		<div class="resume_list blue_region">
			<? if ($resumeList) { ?>
				<ul>
				<? foreach($resumeList as $r) { ?>
					<li class="white_region">
						<div class="inner">
							<?=$this->Html->link($r['Resume']['title'], array('controller' => 'resumes', 'action' => 'view', $r['Resume']['url']), array('class' => 'resume_title'))?>
							<?=$this->Html->link('View Live', array('controller' => 'resumes', 'action' => 'view', $r['Resume']['url']), array('class' => 'view_live'))?>
						</div>
					</li>
				<? } ?>
				</ul>
			<? } else { ?>
				<div class="white_region">
					<div class="inner">
						This user has yet created any resumes
					</div>
				</div>
			<? } ?>
		</div>
	</div>
	<!-- Right col ends -->
	
	<div class="clearfloat"></div>

</div>
