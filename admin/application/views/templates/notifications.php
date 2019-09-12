<?php
	 $data = m_fetch_admin_notifications();
	 $notifications = $data['notifications'];
	 $not_seen = $data['not_seen'];
 ?>
<?php if($not_seen): ?>
<span class="counter"><?php echo $not_seen ?></span>
<?php endif; ?>

<div id="navigation-dropdown" class="notifications absolute p-2 bg-white w-64 rounded my-1 right-0 text-sm border">
	<ul>
		<?php foreach ($notifications as $notification): ?>
		<li class="text-gray-700 p-2 border-l hover:bg-gray-300 mb-1">
			<img src="assets/avatar.jpeg" class="rounded-full h-8 w-8 mr-2 inline">
			<span><?php echo $notification['notification_text'] ?></span>
		</li>
		<?php endforeach ?>						
	</ul>
</div>