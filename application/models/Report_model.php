<?php

class Report_model extends CI_Model {
    
    public function report_query1($id)
    {
        $this->db->select('tbl_order.*,tbl_partners.name as p_name,tbl_partners.id as p_id,tbl_partners.email,tbl_partners.profile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners','tbl_order.partner_id = tbl_partners.id');
        $this->db->where('tbl_order.category',$id);
        if($this->session->userdata('userid'))
        {
            $this->db->where('tbl_order.partner_id',$this->session->userdata('userid'));
        }
        $this->db->order_by('tbl_order.id','DESC');
        return $this->db->get()->result_array();
    }
    public function report_query($id)
    {
        $this->db->select('tbl_order.*,tbl_partners.name as p_name,tbl_partners.id as p_id,tbl_partners.email,tbl_partners.profile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners','tbl_order.partner_id = tbl_partners.id');
        $this->db->where('tbl_order.category',$id);
        $this->db->order_by('tbl_order.id','DESC');
        return $this->db->get()->result_array();
    }

    public function get_report_by_id($c_id,$id)
    {
    	$this->db->select('tbl_order.*,tbl_partners.name as p_name,tbl_partners.id as p_id,tbl_partners.email,tbl_partners.profile,tbl_category.name as c_name,home_visit_main_amt,home_visite_admin_amt,online_visit_main_amt,online_visite_admin_amt,online_visit_tds_fees,home_visit_tds_fees,total_homevist_amt,total_onlinevist_amt,animal_name, animal_category,animal_caretaker,service_charges,tds,final_receiving_amt');
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners','tbl_order.partner_id = tbl_partners.id');
        $this->db->join('tbl_category','tbl_order.category = tbl_category.id');
        $this->db->where('tbl_order.category',$c_id);
        $this->db->where('tbl_order.id',$id);
        return $this->db->get()->row_array();
    }

    /*public function get_report_by_id($c_id,$id)
    {
        $this->db->select('tbl_order.*,tbl_partners.name as p_name,tbl_partners.id as p_id,tbl_partners.email,tbl_partners.profile,tbl_category.name as c_name');
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners','tbl_order.partner_id = tbl_partners.id');
        $this->db->join('tbl_category','tbl_order.category = tbl_category.id');
        $this->db->where('tbl_order.category',$c_id);
        $this->db->where('tbl_order.id',$id);
        return $this->db->get()->row_array();
    }*/

    public function get_m_report_by_id($c_id,$id,$p_id)
    {
        $this->db->select('*'); 
        if($c_id=='1'){  
        $this->db->select('tbl_store_wise_medicines.*,tbl_pharmcy_order_items.*,tbl_order.*');
        $this->db->from('tbl_pharmcy_order_items');
        $this->db->join('tbl_order','tbl_order.id=tbl_pharmcy_order_items.order_no'); 
        $this->db->join('tbl_store_wise_medicines','tbl_pharmcy_order_items.medicine_id=tbl_store_wise_medicines.medicine_id');
        $this->db->join('tbl_medicine','tbl_medicine.id = tbl_store_wise_medicines .medicine_id');
        $this->db->where('tbl_store_wise_medicines.partner_id',$p_id);
        }
        if($c_id=='2') {
        $this->db->from('tbl_pathology_order_items');
        $this->db->join('tbl_order','tbl_order.id=tbl_pathology_order_items.order_no');
        $this->db->join('tbl_test_pathology_wise','tbl_pathology_order_items.test_id=tbl_test_pathology_wise.test_id');
        $this->db->where('tbl_test_pathology_wise.partner_id',$p_id);
        }if($c_id=='3'){
        $this->db->from('tbl_radiology_order_items');    
        $this->db->join('tbl_order','tbl_order.id=tbl_radiology_order_items.order_no');
        $this->db->join('tbl_report_radiology_wise','tbl_radiology_order_items.test_id=tbl_report_radiology_wise.test_id');
        $this->db->where('tbl_report_radiology_wise.partner_id',$p_id);  
        }
        $this->db->where('tbl_order.id',$id);
        return $this->db->get()->result_array(); 
    }

}
?>