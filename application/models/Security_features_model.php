<?php

class Security_features_model extends CI_Model {
    
    function get_features_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_security_features.language_id) as language_name FROM `tbl_security_features` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_feature_list_by_status() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_security_features.language_id) as language_name FROM `tbl_security_features` WHERE status = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_feature_active_list() {
    	$q = $this->db->query("SELECT * FROM `tbl_security_features` WHERE `status` = '1' ORDER BY `id` ASC");
        return $q->result();
    }

    function get_feature_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_security_features` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }  
}

?>
