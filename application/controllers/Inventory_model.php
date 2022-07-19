<?php

class Inventory_model extends CI_Model {
    
    
    function get_medicine_list() {
        $q = $this->db->query("SELECT * FROM `tbl_medicine` ORDER BY `id` DESC");
        return $q->result();
    }
    function get_pathology_test_list() {
        $q = $this->db->query("SELECT * FROM `tbl_test_pathology` ORDER BY `id` DESC");
        return $q->result();
    }
    function get_radiology_test_list() {
        $q = $this->db->query("SELECT * FROM `tbl_report_radiology` ORDER BY `id` DESC");
        return $q->result();
    }
    function get_medicine_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_medicine` WHERE `id` = '" . $id . "' limit 1");
        return $q->row_array();
    }
    function get_pathology_test_by_id($id)
    {
        $q = $this->db->query("SELECT * FROM `tbl_test_pathology` WHERE `id` = '" . $id . "' limit 1");
        return $q->row_array();
    }
    function check_medicine_exist_or_not($name,$company,$no_of_tablets,$generic_name) {
        $q = $this->db->query("SELECT LCASE(name),LCASE(company_name) FROM `tbl_medicine`  WHERE name = '" . $name . "' AND  `company_name` = '" . $company. "' AND  `no_of_tablets` = '" . $no_of_tablets. "' AND  `generic_name` = '" . $generic_name. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_edit_medicine_exist_or_not($name,$company,$id,$no_of_tablets,$generic_name) {
        $q = $this->db->query("SELECT LCASE(name),LCASE(company_name),id FROM `tbl_medicine`  WHERE name = '" . $name . "' AND  `company_name` = '" . $company. "' AND  `no_of_tablets` = '" . $no_of_tablets. "' AND  `generic_name` = '" . $generic_name. "' AND  `id` != '" .$id. "'");
        $data =  $q->result();
        return $count = count($data);
    }

    function check_test_exist_or_not($name)
    {
        $q = $this->db->query("SELECT LCASE(name) FROM `tbl_test_pathology`  WHERE name = '" . $name . "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_edit_test_exist_or_not($name,$id)
    {
        $q = $this->db->query("SELECT LCASE(name),id FROM `tbl_test_pathology`  WHERE name = '" . $name . "' AND  `id` != '" .$id. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    

    
}

?>