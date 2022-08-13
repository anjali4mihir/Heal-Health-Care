<?php

class Notification_model extends CI_Model {
	public function get_unread_notification($partnerId)
	{
		$q = $this->db->query("SELECT * FROM `tbl_notification` WHERE `is_admin_view` = '0' AND `status` = '1' AND `partener_id` = '".$partnerId."' ORDER BY `id` DESC limit 2");
	    return $q->result();
	}
	public function get_notification_list($partnerId)
	{
		$q = $this->db->query("SELECT * FROM `tbl_notification` WHERE `is_admin_view` = '0' AND `partener_id` = '".$partnerId."' ORDER BY `id` DESC");
	    return $q->result_array();
	}
	
}
?>