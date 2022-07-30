<?php

class Medicine_model extends CI_Model {


    private $table_medicine = "tbl_store_wise_medicines";
    
    public function make_medicine_query($partnerId)
    {
        $this->db->select("tbl_store_wise_medicines.*");
        //$this->db->select('(select expiray_date FROM tbl_store_wise_medicines WHERE id=tbl_store_wise_medicines.medicine_id) as expiray_date',FALSE);
        //$this->db->select('(select expiray_date FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as expiray_date',FALSE);
        $this->db->select('(select company_name FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as company_name',FALSE);
        $this->db->select('(select generic_name FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as generic_name',FALSE);
        $this->db->select('(SELECT form_of_package FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as form_of_package',FALSE);
        $this->db->where('tbl_store_wise_medicines.partner_id',$partnerId);
        $this->db->from($this->table_medicine);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->or_like("tbl_store_wise_medicines.name", $_POST["search"]["value"]);
            $this->db->or_like("tbl_store_wise_medicines.mrp", $_POST["search"]["value"]);
            // $this->db->or_like("tbl_store_wise_medicines.sale_price", $_POST["search"]["value"]);
            $this->db->or_like("tbl_store_wise_medicines.discount", $_POST["search"]["value"]);
            $this->db->or_like("tbl_store_wise_medicines.gst", $_POST["search"]["value"]);
            $this->db->or_like("tbl_store_wise_medicines.total", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        $this->db->order_by('tbl_store_wise_medicines.id', 'DESC');
    }
    public function make_medicine_datatables($partnerId)
    {
        $this->make_medicine_query($partnerId);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_medicine_filtered_data($partnerId)
    {
        $this->make_medicine_query($partnerId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_medicine_data()
    {
        $this->db->select("tbl_store_wise_medicines.id");
        $this->db->from($this->table_medicine);
        return $this->db->count_all_results();
    }



	function get_medicines_list($partnerId) {
        $q = $this->db->query("SELECT *,(SELECT expiray_date FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as expiray_date,(SELECT company_name FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as company_name , (SELECT generic_name FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as generic_name ,(SELECT form_of_package FROM tbl_medicine WHERE id=tbl_store_wise_medicines.medicine_id) as form_of_package FROM `tbl_store_wise_medicines`  WHERE `partner_id` = '" . $partnerId . "'  ORDER BY id DESC");
        return $q->result();
    }
	function check_medicine_exist_or_not($name,$partnerId,$company,$no_of_tablets,$generic_name) {
        //print_r($no_of_tablets);die;
        //$q = $this->db->query('SELECT LCASE(tbl_store_wise_medicines.name),tbl_store_wise_medicines.partner_id,LCASE(tbl_medicine.company_name),LCASE(tbl_medicine.no_of_tablets),LCASE(tbl_medicine.generic_name) FROM `tbl_store_wise_medicines` LEFT JOIN tbl_medicine ON tbl_medicine.id=tbl_store_wise_medicines.medicine_id WHERE tbl_store_wise_medicines.name = "' . $name . '" AND `partner_id` = "'. $partnerId .'"  AND `company_name` = "'. $company. '" AND `no_of_tablets` = "' . $no_of_tablets.'" AND `generic_name` = "'. $generic_name.'" ');
        //echo ('SELECT LCASE(tbl_store_wise_medicines.name),tbl_store_wise_medicines.partner_id,LCASE(tbl_medicine.company_name),LCASE(tbl_medicine.no_of_tablets),LCASE(tbl_medicine.generic_name) FROM `tbl_store_wise_medicines` LEFT JOIN tbl_medicine ON tbl_medicine.id=tbl_store_wise_medicines.medicine_id WHERE tbl_store_wise_medicines.name = "' . $name . '" AND `partner_id` = "'. $partnerId .'"  AND `company_name` = "'. $company. '" AND `no_of_tablets` = "' . $no_of_tablets.'" AND `generic_name` = "'. $generic_name.'" ');exit;
        $q = $this->db->query('SELECT LCASE(tbl_store_wise_medicines.name),LCASE(company_name),LCASE(generic_name),LCASE(no_of_tablets),partner_id FROM `tbl_store_wise_medicines`  LEFT JOIN tbl_medicine ON tbl_medicine.id=tbl_store_wise_medicines.medicine_id WHERE tbl_medicine.name = "'. $name .'" AND  `company_name` = "' . $company.'" AND  `generic_name` = "'. $generic_name.'" AND tbl_medicine.no_of_tablets = "' . $no_of_tablets.'"');
        // echo $q ;exit;
        return $q->num_rows();
        //return $count = count($data);
    }
    function check_medicine_exist_name($name,$company,$no_of_tablets,$generic_name) {
        $q = $this->db->query('SELECT LCASE(name),LCASE(company_name),LCASE(generic_name),LCASE(no_of_tablets) FROM `tbl_medicine`  WHERE name = "'. $name .'"  AND  `company_name` = "' . $company.'"  AND  `no_of_tablets` = "' . $no_of_tablets.'" AND  `generic_name` = "'. $generic_name.'" ');

        
        $data =  $q->result();
       
        return $count = count($data);
    }
    function check_edit_medicine_exist_or_not($name,$partnerId,$id) {
        $q = $this->db->query("SELECT * FROM `tbl_store_wise_medicines` WHERE `name` = '" . $name . "' AND `partner_id` = '" .$partnerId . "' AND `id` != '" .$id. "'");
        $data =  $q->result();
        return $count = count($data);
    }
    function check_slug($slug,$partnerId){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_medicine` WHERE slug='".$slug."' AND partner_id='".$partnerId."'";
        $result=$this->db->query($q)->row();
        return $result;

    }
    function check_slug_edit($slug,$partnerId,$id){
        $q="SELECT COUNT(slug) as newscount FROM `tbl_medicine` WHERE slug='".$slug."' AND partner_id='".$partnerId."' AND `id` != '" .$id. "' " ;
        $result=$this->db->query($q)->row();
        return $result;

    } 
    function get_medicine_list_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT tbl_store_wise_medicines.*,tbl_store_wise_medicines.expiry_date,tbl_medicine.company_name,tbl_medicine.generic_name,tbl_medicine.form_of_package,tbl_store_wise_medicines.batch_no,tbl_medicine.no_of_tablets FROM `tbl_store_wise_medicines` LEFT JOIN tbl_medicine ON tbl_medicine.id=tbl_store_wise_medicines.medicine_id  WHERE tbl_store_wise_medicines.id = '" . $id . "'AND tbl_store_wise_medicines.partner_id = '" . $partnerId . "' limit 1");
        return $q->row();
    }
    function get_all_medicines_list_by_search($search) {
        $q = $this->db->query("SELECT id as value,CONCAT(UCASE(name),' - ',company_name) as label FROM `tbl_medicine` WHERE `name` like'".$search."%' ORDER BY `id` ASC");
        return $q->result();
    }
    function get_company_by_medicine($medicineId) {
        $q = $this->db->query("SELECT id,company_name ,no_of_tablets,UCASE(name),generic_name,form_of_package FROM `tbl_medicine` WHERE `id`='".$medicineId."' limit 1");
        return $q->row_array();
    }
}
?>