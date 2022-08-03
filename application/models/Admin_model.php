
<?php

class Admin_model extends CI_Model {
    
    public function get_sitesetting(){
        $q="SELECT * FROM tbl_site_setting WHERE id='1'";
        $result=$this->db->query($q)->row();
        return $result;
    }
    public function get_appsetting(){
        $q="SELECT * FROM tbl_app_setting WHERE id='1'";
        return $this->db->query($q)->row_array();
       
    }
    public function get_admin_by_id($id)
    {
        $this->db->where('admin_id',$id);
        return $this->db->get('tbl_admin')->row();
    }

    public function get_all_partners_data() {

        $q = $this->db->query("SELECT * FROM `tbl_partners` ORDER by `id` ASC");
        return $q->result();
    }


    public function count_pending_partners(){
        $q=$this->db->query("SELECT id FROM `tbl_partners` WHERE `status_by_admin` = '0'");
        return $q->num_rows();
        
    }
     public function count_register_partners($category){
        $q=$this->db->query("SELECT id FROM `tbl_partners` WHERE `status_by_admin` = '1' AND `category` = '".$category."' ");
        return $q->num_rows();
        
    }
    public function count_register_patient($category){
        $q=$this->db->query("SELECT id FROM `tbl_partners` WHERE `status_by_admin` = '1' AND `category` = '".$category."' ");
        return $q->num_rows();
    }
    public function count_active_services(){
        $q=$this->db->query("SELECT * FROM `tbl_services` WHERE `status` = '1'");
        return $q->num_rows();
    }
    public function count_active_medicine($partner_id){
        $q=$this->db->query("SELECT id FROM `tbl_store_wise_medicines` WHERE `status` = '1' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function count_active_pathologytest($partner_id){
        $q=$this->db->query("SELECT id FROM `tbl_test_pathology_wise` WHERE `status` = '1' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function count_active_radiologytest($partner_id){
        $q=$this->db->query("SELECT id FROM `tbl_report_radiology_wise` WHERE `status` = '1' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function count_pending_orders($category,$partner_id){
        $q=$this->db->query("SELECT id FROM `tbl_order` WHERE `order_status` = '1' AND category = '".$category."' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function count_complete_orders($category,$partner_id){
        $q=$this->db->query("SELECT id FROM `tbl_order` WHERE `order_status` = '4' AND category = '".$category."' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function count_active_features(){
        $q=$this->db->query("SELECT * FROM `tbl_features` WHERE `status` = '1'");
        return $q->num_rows();
        
    }
    public function get_partner_appsetting($id){
        $q=$this->db->query("SELECT id,is_homesample,delivery_charge,category,return_policy FROM `tbl_partners` WHERE `id` = '".$id."'");
        return $q->row_array();
    }
    public function get_followup_days(){
        $q = $this->db->query("UPDATE `tbl_order` SET `is_followup` = '0' WHERE appoitment_start_date <= (DATE(NOW()) + INTERVAL -7 DAY)");
        return $this->db->affected_rows();
    }
    public function get_monthly_count($category,$month,$year){
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('YEAR(created_at)',$year);
        $this->db->where('MONTH(created_at)',$month);
        $this->db->where('category',$category);
        $this->db->where('status_by_admin','1');
        return $this->db->get()->num_rows();
    }

    public function count_orders($category,$partner_id,$order_status){
        $q=$this->db->query("SELECT id FROM `tbl_order` WHERE `order_status` = '".$order_status."' AND category = '".$category."' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
     public function count_appoitment($category,$partner_id,$order_status){
        $q=$this->db->query("SELECT id FROM `tbl_order` WHERE `appointment_status` = '".$order_status."' AND category = '".$category."' AND partner_id = '".$partner_id."'");
        return $q->num_rows();
    }
    public function get_all_deviceid($category)
    {
        $q=$this->db->query("SELECT * FROM `tbl_partner_device` WHERE `category_type` = '".$category."' ");
        return $q->result_array();   
    }
    public function get_order_data($order_id)
    {
        $q=$this->db->query("SELECT *,(SELECT account_no FROM tbl_partners WHERE id=tbl_order.partner_id) as account_no FROM `tbl_order` WHERE `id` = '".$order_id."' ");
        return $q->row_array();  
    }
    public function get_staff_list() {
        $q = $this->db->query("SELECT * FROM `tbl_admin` ");
        return $q->result();
    }
    
    
} 
?>