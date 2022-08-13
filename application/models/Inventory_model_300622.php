<?php

class Inventory_model extends CI_Model {
    
    private $table_medicine = "tbl_medicine";
    private $select_column_medicine = array("name", "generic_name", "company_name", "no_of_tablets", "form_of_package","id");
    private $order_column_medicine = array(null, "name", "generic_name", "no_of_tablets");

    private $table_pathology = "tbl_test_pathology";
    private $select_column_pathology = array("name","id");
    private $order_column_pathology = array(null, "name","id");

    private $table_radiology = "tbl_report_radiology";
    private $select_column_radiology = array("name","id");
    private $order_column_radiology = array(null, "name","id");

    private $table_provisional = "tbl_provisional_test";
    private $select_column_provisional = array("name","description","id");
    private $order_column_provisional = array(null, "name","id");
    
    
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

    function get_provisional_test_list() {
            $q = $this->db->query("SELECT * FROM `tbl_provisional_test` ORDER BY `id` DESC");
            return $q->result();
    } 

   

    public function make_medicine_query()
    {
        $this->db->select($this->select_column_medicine);
        $this->db->from($this->table_medicine);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->or_like("generic_name", $_POST["search"]["value"]);
            $this->db->or_like("company_name", $_POST["search"]["value"]);
            $this->db->or_like("no_of_tablets", $_POST["search"]["value"]);
            $this->db->or_like("form_of_package", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column_medicine[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }
    public function make_medicine_datatables()
    {
        $this->make_medicine_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_medicine_filtered_data()
    {
        $this->make_medicine_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_medicine_data()
    {
        $this->db->select("id");
        $this->db->from($this->table_medicine);
        return $this->db->count_all_results();
    }



    public function make_pathology_query()
    {
        $this->db->select($this->select_column_pathology);
        $this->db->from($this->table_pathology);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column_pathology[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("id", 'DESC');
        }
    }

    public function make_pathology_datatables()
    {
        $this->make_pathology_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_pathology_filtered_data()
    {
        $this->make_pathology_query();
        $query = $this->db->get();
        return $query->num_rows();
    }



    public function get_all_pathology_data()
    {
        $this->db->select("id");
        $this->db->from($this->table_pathology);
        return $this->db->count_all_results();
    }

    public function make_radiology_query()
    {
        $this->db->select($this->select_column_radiology);
        $this->db->from($this->table_radiology);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column_pathology[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("id", 'DESC');
        }
    }

    public function make_radiology_datatables()
    {
        $this->make_radiology_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_radiology_filtered_data()
    {
        $this->make_radiology_query();
        $query = $this->db->get();
        return $query->num_rows();
    }



    public function get_all_radiology_data()
    {
        $this->db->select("id");
        $this->db->from($this->table_radiology);
        return $this->db->count_all_results();
    }

    public function make_provisional_query()
    {
        $this->db->select($this->select_column_provisional);
        $this->db->from($this->table_provisional);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column_pathology[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("id", 'DESC');
        }
    }

    public function make_provisional_datatables()
    {
        $this->make_provisional_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_provisional_filtered_data()
    {
        $this->make_provisional_query();
        $query = $this->db->get();
        return $query->num_rows();
    }



    public function get_all_provisional_data()
    {
        $this->db->select("id");
        $this->db->from($this->table_provisional);
        return $this->db->count_all_results();
    }




    function get_medicine_by_id($id) {
            $q = $this->db->query("SELECT * FROM `tbl_medicine` WHERE `id` = '" . $id . "' limit 1");
            return $q->row_array();
    }

    function get_pathology_test_by_id($id) {
            $q = $this->db->query("SELECT * FROM `tbl_test_pathology` WHERE `id` = '" . $id . "' limit 1");
            return $q->row_array();
    }

    function get_radiology_test_by_id($id) {
            $q = $this->db->query("SELECT * FROM `tbl_report_radiology` WHERE `id` = '" . $id . "' limit 1");
            return $q->row_array();
    }

    function get_provisional_test_by_id($id) {
            $q = $this->db->query("SELECT * FROM `tbl_provisional_test` WHERE `id` = '" . $id . "' limit 1");
            return $q->row_array();
    }
   
    function check_medicine_exist_or_not($name,$company,$no_of_tablets,$generic_name) {
            /*$q = $this->db->query('SELECT LCASE(name),LCASE(company_name),LCASE(generic_name),LCASE(no_of_tablets) FROM `tbl_medicine`  WHERE name = "'. $name .'"  AND  `company_name` = "' . $company.'"  AND  `no_of_tablets` = "' . $no_of_tablets.'" AND  `generic_name` = "'. $generic_name.'" ');
            $data =  $q->result();
            return $count = count($data);*/

            $query='SELECT LCASE(`name`),LCASE(`company_name`),LCASE(`generic_name`),LCASE(`no_of_tablets`) FROM `tbl_medicine` WHERE `name` = "'.$name.'" AND `company_name` = "'. $company.'" AND `no_of_tablets` = "'.$no_of_tablets.'" AND `generic_name` = "'.$generic_name.'"';
                $count=$this->db->query($query)->num_rows();
                return $count;
    }
    
    function check_edit_medicine_exist_or_not($name,$company,$id,$no_of_tablets,$generic_name) {
            /*$q = $this->db->query("SELECT LCASE(name),LCASE(company_name),id FROM `tbl_medicine`  WHERE name = '" . $name . "' AND  `company_name` = '" . $company. "' AND  `no_of_tablets` = '" . $no_of_tablets. "' AND  `generic_name` = '" . $generic_name. "' AND  `id` != '" .$id. "'");
            $data =  $q->result();
            return $count = count($data);*/

            $query="SELECT LCASE(name),LCASE(company_name),id FROM `tbl_medicine`  WHERE name = '" . $name . "' AND  `company_name` = '" . $company. "' AND `no_of_tablets` = '" . $no_of_tablets. "' AND  `generic_name` = '" . $generic_name. "' AND `id` != '" .$id. "'";
                $count=$this->db->query($query)->num_rows();
                return $count;
    }

    function check_pathology_test_exist_or_not_master($name) {
            $q = $this->db->query('SELECT LCASE(name) FROM `tbl_test_pathology`  WHERE name = "'.$name.'"');
            return $q->num_rows();
            //return $count = count($data);
    }

    function check_edit_pathology_test_exist_or_not_master($name,$id) {
            $q = $this->db->query("SELECT LCASE(name),id FROM `tbl_test_pathology`  WHERE name = '" . $name . "' AND  `id` != '" .$id. "'");
            $data =  $q->result();
            return $count = count($data);
    }

    function check_test_exist_or_not($name) {
            $q = $this->db->query('SELECT LCASE(name) FROM `tbl_test_pathology`  WHERE name = "'.$name.'"');
            return $q->num_rows();
            //return $count = count($data);
    }

    function check_edit_test_exist_or_not($name,$id) {
            $q = $this->db->query("SELECT LCASE(name),id FROM `tbl_test_pathology`  WHERE name = '" . $name . "' AND  `id` != '" .$id. "'");
            $data =  $q->result();
            return $count = count($data);
    }

    function check_radio_test_exist_or_not($name) {
            $q = $this->db->query('SELECT UCASE(name) FROM `tbl_report_radiology`  WHERE name = "'. $name .'" ');
            return $q->num_rows();
    }

    function check_radio_edit_test_exist_or_not($name,$id) {
            $q = $this->db->query("SELECT UCASE(name),id FROM `tbl_report_radiology`  WHERE name = '" . $name . "' AND  `id` != '" .$id. "' ");
            $data =  $q->result();
            return $count = count($data);
    }

    function check_provisional_test_exist_or_not($name) {
            $q = $this->db->query('SELECT UCASE(name) FROM `tbl_provisional_test`  WHERE name = "'.$name.'"');
            $data =  $q->result();
            return $count = count($data);
    }

    function check_edit_provisional_test_exist_or_not($name,$id) {
            $q = $this->db->query("SELECT UCASE(name),id FROM `tbl_provisional_test`  WHERE name = '" . $name . "' AND  `id` != '" .$id. "'");
            $data =  $q->result();
            return $count = count($data);
    }

    function insert_medicine($data) {
        $this->db->insert_batch('tbl_medicine', $data);
    }

    function get_imported_medicines() {
            $q = $this->db->query("SELECT `id`,`name`,`company_name`,`generic_name`,`description`,`transate_state` FROM `tbl_medicine` WHERE `transate_state` = '1' ORDER BY `id` DESC LIMIT 0, 500");
            return $q->result();
    }

    function get_imported_pethology_medicines() {
            $q = $this->db->query("SELECT `id`,`name`,`description`,`transate_state` FROM `tbl_test_pathology` WHERE `transate_state` = '1' ORDER BY `id` DESC LIMIT 0, 500");
            return $q->result();
    }

    function get_imported_radiology_medicines() {
            $q = $this->db->query("SELECT `id`,`name`,`category`,`description`,`transate_state` FROM `tbl_report_radiology` WHERE `transate_state` = '1' ORDER BY `id` DESC LIMIT 0, 500");
            return $q->result();
    }

    function get_imported_provisional_medicines() {
            $q = $this->db->query("SELECT `id`,`name`,`description`,`transate_state` FROM `tbl_provisional_test` WHERE `transate_state` = '1' ORDER BY `id` DESC LIMIT 0, 500");
            return $q->result();
    }
}

?>