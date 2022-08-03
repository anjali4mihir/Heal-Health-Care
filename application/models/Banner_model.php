<?php

class Banner_model extends CI_Model {
    
    
    function get_banner_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_banner.language_id) as language_name FROM `tbl_banner` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_banner_active_list($id) {
    	$q = $this->db->query("SELECT * FROM `tbl_banner` WHERE `status` = '1' AND language_id = '".$id."' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_banner_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_banner` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    } 
    function check_slug($slug){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_banner` WHERE slug='".$slug."'";
        $result=$this->db->query($q)->row();
        return $result;

    } 
}

?>