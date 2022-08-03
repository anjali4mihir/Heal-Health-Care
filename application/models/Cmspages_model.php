<?php

class Cmspages_model extends CI_Model {
   
    public function get_cms_page_by_id($id){
        $q = $this->db->query("SELECT * FROM `tbl_cms` WHERE id = '" . $id . "' limit 1");
        return $q->row();
    }
    public function get_security_page(){
        $q = $this->db->query("SELECT * FROM `tbl_security` WHERE id = '1' limit 1");
        return $q->row();
    }
}

?>