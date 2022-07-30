<?php

class Speciality_model extends CI_Model {
    
    
    function get_speciality_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_speciality.language_id) as name FROM `tbl_speciality` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_speciality_active_list($id) {
    	$q = $this->db->query("SELECT * FROM `tbl_speciality` WHERE `status` = '1' AND language_id = '".$id."' ORDER BY `id` ASC");
        return $q->result();
    }

    function get_speciality_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_speciality` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }  
}

?>