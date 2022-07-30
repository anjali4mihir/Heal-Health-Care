<?php

class Language_model extends CI_Model {
    function get_language_list() {
        $q = $this->db->query("SELECT * FROM `tbl_language` ORDER BY `id` ASC");
        return $q->result();
    }

    function get_language_active_list() {
        $q = $this->db->query("SELECT * FROM `tbl_language` where status = '1' ORDER BY `id` ASC");
        return $q->result();
    }

    function get_language_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_language` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }

}

?>
