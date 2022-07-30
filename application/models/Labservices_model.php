<?php

class Labservices_model extends CI_Model {

	function get_services_list($partnerId) {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_labservices.language_id) as language_name FROM `tbl_labservices` WHERE `partner_id` = '" . $partnerId . "' AND `parent_id` = '0'  ORDER BY `id` DESC");
        return $q->result();
    }
    function get_subservices_list($id,$partnerId) {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_labservices.language_id) as language_name FROM `tbl_labservices` WHERE `partner_id` = '" . $partnerId . "' AND `parent_id` = '" . $id . "'  ORDER BY `id` DESC");
        return $q->result();
    }
    function check_service_exist_or_not($name,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_labservices` WHERE `name` = '" . $name . "' AND `partner_id` = '" . $partnerId . "'");
        $data =  $q->result();
        return $count = count($data);
    }
    
    function check_edit_labservice_exist_or_not($name,$partnerId,$id) {
        $q = $this->db->query("SELECT * FROM `tbl_labservices` WHERE `name` = '" . $name . "' AND `partner_id` = '" .$partnerId . "' AND `id` != '" .$id. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_slug($slug,$partnerId){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_labservices` WHERE slug='".$slug."' AND partner_id='".$partnerId."'";
        $result=$this->db->query($q)->row();
        return $result;
	}
    function check_slug_edit($slug,$partnerId,$id){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_labservices` WHERE slug='".$slug."' AND partner_id='".$partnerId."' AND `id` != '" .$id. "' " ;
        $result=$this->db->query($q)->row();
        return $result;
	}
    function get_service_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_labservices` WHERE `id` = '" . $id . "'AND `partner_id` = '" . $partnerId . "' limit 1");
        return $q->row();
    } 

}
?>