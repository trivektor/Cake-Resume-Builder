<h2>Messages</h2>

<table class="message_list" cellspacing="0" cellpadding="0">
	
	<? foreach ($messages as $m) { ?>
	<tr class="<?=$m['Message']['status']?>">
		<td><input type="checkbox" value="<?=$m['Message']['id']?>" /></td>
		<td style="text-align:center">
			<a href="/resume/profile/<?=$m['User']['username']?>">
			<? 
			$photo = $profilePhoto[$m['Message']['sender_id']];
			
			if ($photo == 'male.png' || $photo == 'female.png') {
				echo $this->Html->image('/img/resume/'.$photo, array('width' => 30));
			} else {
				echo $this->Html->image('/userphoto/'.$photo, array('width' => 30));
			}
			
			?>
			<span style="display:block"><?=$m['User']['username']?></span>
			</a>
		</td>
		<td>
			<?=$this->Html->link($m['Message']['subject'], array('controller' => 'messages', 'action' => 'view', $m['Message']['id']))?>
			<p class="message_preview"><?=$this->Text->truncate($m['Message']['body'], 50, array('ending' => '...', 'exact' => TRUE, 'html' => FALSE))?></p>
		</td>
		<td><?=$m['Message']['stamp']?></td>
		<td><span class="delete_message" rel="<?=$m['Message']['id']?>">x</span></td>
	</tr>
	<? } ?>
</table>