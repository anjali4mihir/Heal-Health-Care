<?php

class Radiology_model extends CI_Model {

	function get_test_list($partnerId) {
        //$q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_report_radiology_wise.language_id) as language_name ,(SELECT name FROM tbl_group_radiology WHERE id=tbl_report_radiology_wise.group_id) as modality FROM `tbl_report_radiology_wise` WHERE `partner_id` = '" . $partnerId . "'  ORDER BY `id` DESC");
        $q = $this->db->query("SELECT *,(SELECT category FROM tbl_report_radiology WHERE id=tbl_report_radiology_wise.test_id) as category  FROM `tbl_report_radiology_wise` WHERE `partner_id` = '" . $partnerId . "'  ORDER BY `id` DESC");
        return $q->result();
    }


    private $table_test = "tbl_report_radiology_wise";
    
    public function make_test_query($partnerId)
    {
        $this->db->select("tbl_report_radiology_wise.*");
        $this->db->select('(SELECT category FROM tbl_report_radiology WHERE id=tbl_report_radiology_wise.test_id) as category',FALSE);
        $this->db->where('tbl_report_radiology_wise.partner_id',$partnerId);
        $this->db->from($this->table_test);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("tbl_report_radiology_wise.name", $_POST["search"]["value"]);
            $this->db->or_like("tbl_report_radiology_wise.mrp", $_POST["search"]["value"]);
            $this->db->or_like("tbl_report_radiology_wise.sale_price", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        $this->db->order_by('tbl_report_radiology_wise.id', 'DESC');
    }
    public function make_test_datatables($partnerId)
    {
        $this->make_test_query($partnerId);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_test_filtered_data($partnerId)
    {
        $this->make_test_query($partnerId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_test_data()
    {
        $this->db->select("tbl_report_radiology_wise.id");
        $this->db->from($this->table_test);
        return $this->db->count_all_results();
    }



    function get_group_list($partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `partner_id` = '" . $partnerId . "' ORDER BY `id` DESC");
        return $q->result();
    }
    function get_active_group_list($partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `partner_id` = '" . $partnerId . "'  AND `status` = '1' ORDER BY `id` DESC");
        return $q->result();
    }
    function get_subtest_list($id,$partnerId) {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_report_radiology_wise.language_id) as language_name FROM `tbl_report_radiology_wise` WHERE `partner_id` = '" . $partnerId . "' AND `parent_id` = '" . $id . "'  ORDER BY `id` DESC");
        return $q->result();
    }
    function check_test_exist_name($name) {
        $q = $this->db->query('SELECT CONVERT(name USING utf8),category FROM `tbl_report_radiology` WHERE `name` = "'. $name .'" ');
        return $q->num_rows();
        //return $count = count($data);
    }
    function check_test_category_exist_name($name) {
        $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `name` = '" . $name . "' ");
        $data =  $q->result();
        return $count = count($data);
    }
    
    function check_test_exist_or_not($name,$partnerId) {
        $q = $this->db->query('SELECT tbl_report_radiology_wise.name,tbl_report_radiology_wise.partner_id,tbl_report_radiology.category FROM `tbl_report_radiology_wise` LEFT JOIN tbl_report_radiology ON tbl_report_radiology.id=tbl_report_radiology_wise.test_id WHERE UCASE(tbl_report_radiology_wise.name) = "' . $name . '" AND `partner_id` = "'. $partnerId .'" ');
        $data =  $q->result();
        return $count = count($data);
    }
    function check_test_category_exist_or_not($name,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `name` = '" . $name . "' AND `partner_id` = '" . $partnerId . "'");
        $data =  $q->result();
        return $count = count($data);
    }
    
    function check_edit_category_exist_or_not($name,$partnerId,$id) {
        $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `name` = '" . $name . "' AND `partner_id` = '" .$partnerId . "' AND `id` != '" .$id. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_slug($slug,$partnerId){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_report_radiology_wise` WHERE slug='".$slug."' AND partner_id='".$partnerId."'";
        $result=$this->db->query($q)->row();
        return $result;
	}
    function check_slug_edit($slug,$partnerId,$id){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_report_radiology_wise` WHERE slug='".$slug."' AND partner_id='".$partnerId."' AND `id` != '" .$id. "' " ;
        $result=$this->db->query($q)->row();
        return $result;

	}
    function get_test_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT *,(SELECT category FROM tbl_report_radiology WHERE id=tbl_report_radiology_wise.test_id) as category,(SELECT description FROM tbl_report_radiology WHERE id=tbl_report_radiology_wise.test_id) as description FROM `tbl_report_radiology_wise` WHERE `id` = '" . $id . "'AND `partner_id` = '" . $partnerId . "' limit 1");
        return $q->row();
    } 
    // function get_modality_by_id($id,$partnerId) {
    //     $q = $this->db->query("SELECT * FROM `tbl_group_radiology_wise` WHERE `id` = '" . $id . "'AND `partner_id` = '" . $partnerId . "' limit 1");
    //     return $q->row();
    // } 
    function get_all_test_list_by_search($search) {
        
            $q = $this->db->query("SELECT CONCAT(id,',',description) as  value,name as label FROM `tbl_report_radiology` WHERE `name` like'".$search."%' ORDER BY `id` ASC");
        
        
        return $q->result();
    }
    function get_all_test_category_list_by_search($search) {
        $q = $this->db->query("SELECT id as value,UCASE(name) as label FROM `tbl_group_radiology` WHERE `name` like'".$search."%' ORDER BY `id` ASC");    
        return $q->result();
    }

}
?>