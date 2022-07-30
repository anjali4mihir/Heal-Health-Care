<?php

class Features_model extends CI_Model {
    
    
    function get_features_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_features.language_id) as name FROM `tbl_features` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_features_active_list($id) {
    	$q = $this->db->query("SELECT * FROM `tbl_features` WHERE `status` = '1' AND language_id = '".$id."' ORDER BY `position` ASC");
        return $q->result();
    }

    function get_features_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_features` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }  
}

?>