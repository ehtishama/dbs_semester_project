<?php 
function m_fetch_admin_notifications()
{
	$ci =& get_instance();
	$ci -> load -> model("notifications_model");
	return $ci -> notifications_model -> fetch_admin_notifications();
}