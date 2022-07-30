<?php

class Vendor_model extends CI_Model {
    
    function get_vendor_list($statusId) {
        $q = $this->db->query("SELECT *,(SELECT name FROM tbl_category WHERE id=tbl_partners.category) as category_name,(SELECT title FROM tbl_services WHERE `id`=tbl_partners.speciality) as speciality_name FROM `tbl_partners` WHERE status_by_admin = '".$statusId."' ORDER BY `id` DESC");
        return $q->result();
    }
    function get_list_by_vendor($statusId,$partnerId) {
        $q = $this->db->query("SELECT *,(SELECT name FROM tbl_category WHERE id=tbl_partners.category) as category_name, (SELECT title FROM tbl_services WHERE `id`=tbl_partners.speciality) as speciality_name FROM `tbl_partners` WHERE status_by_admin = '".$statusId."' AND category = '".$partnerId."' ORDER BY `id` DESC");
        return $q->result();
    }
    
    
    function get_vendor_by_id($id) {
        $q = $this->db->query("SELECT *,(SELECT name FROM tbl_category WHERE `id`=tbl_partners.category) as category_name,(SELECT title FROM tbl_services WHERE `id`=tbl_partners.speciality) as speciality_name FROM `tbl_partners` WHERE `id` = '" . $id . "' limit 1");
        return $q->row_array();
    }
    function get_vendor_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }
    function check_become_partners_email_exist_or_not($email,$category) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `email` = '" . $email . "' AND `category` = '".$category."' ");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_become_partners_pancard_exist_or_not($pan) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `pan` = '" . $pan . "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_become_partners_adharcard_exist_or_not($adharcard_no) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `adharcard_no` = '" . $adharcard_no . "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_store_email_exist_or_not($email,$partnerId,$categorytype="") {
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('email',$email);
        $this->db->where('id !=',$partnerId);
        if(!empty($categorytype))
        {
            $this->db->where('category',$categorytype);
        }
        $data = $this->db->get()->num_rows();
        return $data;
        // $this->db->where('id !=',$partnerId);
        // $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `email` = '" . $email . "' AND `id` != '" .$partnerId. "'");
        // $data =  $q->result();
        // return $count = count($data);
    }
    function check_store_mobile_exist_or_not($mobile,$partnerId,$categorytype="") {
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('contact_no',$mobile);
        $this->db->where('id !=',$partnerId);
        if(!empty($categorytype))
        {
            $this->db->where('category',$categorytype);
        }
        $data = $this->db->get()->num_rows();
        return $data;
        
        // $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `contact_no` = '" . $mobile . "' AND `id` != '" .$partnerId. "'");
        // $data =  $q->result();
        // return $count = count($data);
    }
    function check_store_name_exist_or_not($name,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `store_name` = '" . $name . "' AND `id` != '" .$partnerId. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_store_gstin_exist_or_not($gstin,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `gstin` = '" . $gstin . "' AND `id` != '" .$partnerId. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_become_partners_mobile_exist_or_not($mobile,$category) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `contact_no` = '" .$mobile."' AND `category` = '".$category."' ");
        $data =  $q->result();
        return $count = count($data);
    } 
    function get_partner_profile_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_partners` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();

    }
    function get_partner_documents_status_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_documents_status` WHERE `partner_id` = '" . $id . "' limit 1");
        return $q->row();

    }
    function get_partner_store_images_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_store_images` WHERE `store_id` = '" . $id . "' ORDER BY `id` DESC limit 5");
        return $q->result();
    }
    
}
?>