<?php

class Services_model extends CI_Model {
    
    
    function get_service_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_services.language_id) as name FROM `tbl_services` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_services_active_list($id) {
    	$q = $this->db->query("SELECT * FROM `tbl_services` WHERE `status` = '1' AND language_id = '".$id."' AND `is_parent` = '1' AND `parent_id`='0' ORDER BY `is_possiotion` ASC");
        return $q->result();
    }
    function get_services($id) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `status` = '1' AND `parent_id`='0' AND language_id = '".$id."' ORDER BY `is_possiotion` ASC");
        return $q->result();
    }
    function get_all_services($id) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `status` = '1' AND language_id = '".$id."' ORDER BY `is_possiotion` ASC");
        return $q->result();
    }
    function get_parent_service_list() {
        $q = $this->db->query("SELECT *,(SELECT name FROM tbl_category WHERE id=tbl_services.id) as name FROM `tbl_services`  WHERE `is_parent` = '1' AND `parent_id`='0' ORDER BY `is_possiotion` ASC");
        return $q->result();
    }
    // function get_parent_category_list() {
    //     $q = $this->db->query("SELECT * FROM `tbl_services`  WHERE `is_parent` = '1' AND `parent_id`='0' ORDER BY `is_possiotion` ASC");
    //     return $q->result();
    // }
    
    function get_sub_service_list($id) {
        $q = $this->db->query("SELECT * FROM `tbl_services`  WHERE `parent_id` = '".$id."' AND `status` = '1' ORDER BY `is_possiotion` ASC");
        return $q->result();
    }

    function get_service_list_by_id($slug) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `slug` = '" . $slug . "' limit 1");
        return $q->row();
    } 
    function service_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    } 
    function get_work_hours_by_service($id) {
        $q = $this->db->query("SELECT * FROM `tbl_work_hours` WHERE `service_id` = '" . $id . "' limit 1");
        return $q->row();
    } 
    function get_work_hours_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_work_hours` WHERE `service_id` = '" . $id . "' limit 1");
        return $q->row();
    } 
    function get_services_image_by_id($id) {
        $q = $this->db->query("SELECT image_url,id,service_id FROM `tbl_services_images` WHERE `service_id` = '" .$id."'");
       
        return $q->result();
    }
    function get_services_image_hindi_by_id($id) {
        $q = $this->db->query("SELECT image_url_hindi,id,service_id FROM `tbl_service_hindi_images` WHERE `service_id` = '" .$id."'");
       
        return $q->result();
    }
    function get_service_name_by_id($parentid) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `id` = '" .$parentid."'");
       
        return $q->row();
    }
    function check_slug($slug){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_services` WHERE slug='".$slug."'";
        $result=$this->db->query($q)->row();
        return $result;

    }
    function check_slug_edit($slug,$id){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_services` WHERE slug='".$slug."' AND `id` != '" .$id. "' " ;
        $result=$this->db->query($q)->row();
        return $result;

    } 
    function check_possion_exist_or_not($possition,$type) {
        $q = $this->db->query("SELECT * FROM `tbl_services` WHERE `is_possiotion` = '" . $possition . "' AND `is_parent` = '" .$type. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function get_services_image_imgid($id) {

        $q = $this->db->query("SELECT * FROM `tbl_services_images` WHERE `id` = '" . $id . "'");

        return $q->row();

    }

    function get_services_image_imgid_hindi($id) {

        $q = $this->db->query("SELECT * FROM `tbl_service_hindi_images` WHERE `id` = '" . $id . "'");

        return $q->row();
    }
}

?>