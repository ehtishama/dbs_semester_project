<?php 
function m_fetch_admin_notifications()
{
	$ci =& get_instance();
	$ci -> load -> model("notifications_model");
	$notifications = $ci -> notifications_model -> fetch_admin_notifications();
	$not_seen = 0;
	foreach ($notifications as $notification) {
		if($notification['is_viewed'] == 0)
			$not_seen ++;
	}

	return array("notifications" => $notifications, "not_seen" => $not_seen);
}