<?php

class Doctors_model extends CI_Model {
    
    function get_doctors_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_doctors.language_id) as language_name FROM `tbl_doctors` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_doctors_list_by_status() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_doctors.language_id) as language_name FROM `tbl_doctors` WHERE status = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_doctors_active_list() {
    	$q = $this->db->query("SELECT * FROM `tbl_doctors` WHERE `status` = '1' ORDER BY `id` ASC");
        return $q->result();
    }

    function get_doctors_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_doctors` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }  
}

?>
