<?php

class Order_model extends CI_Model {
    
    public function get_order_report($category,$partnerId,$order_status){
    	$q=$this->db->query("SELECT tbo.*,tbo.created_at as order_datetime FROM tbl_order as tbo  WHERE tbo.category='".$category."' AND tbo.partner_id='".$partnerId."'AND tbo.order_status='".$order_status."'");
    	return $q->result_array();
    }
    public function get_order_by_id($category,$orderno){
        $q=$this->db->query("SELECT tbo.*,tph.order_id,tph.invoice_id,tph.amount FROM tbl_order as tbo LEFT JOIN tbl_payment_history as tph ON tbo.id=tph.order_no WHERE tbo.category='".$category."' AND tbo.id='".$orderno."' ");
        return $q->row_array();
    }
    public function get_items_by_order_no($partnerId,$orderno){
        $q=$this->db->query("SELECT * FROM tbl_pharmcy_order_items  WHERE order_no ='".$orderno."' ");
        return $q->result_array();  
    }
    // public function get_items_by_order_no($partnerId,$orderno){
    //     $q=$this->db->query("SELECT tpo.*,tsm.name,tsm.mrp,tsm.sale_price,tsm.discount,tsm.discount_per,tsm.gst,tsm.total,tsm.expiry_date,tbo.main_amount,tbo.discount_amount,tbo.final_amount,tbo.delivery_type,tbl_medicine.company_name,tsm.gst_per,tbl_medicine.batch_no FROM tbl_pharmcy_order_items as tpo LEFT JOIN tbl_store_wise_medicines as tsm ON tpo.medicine_id=tsm.medicine_id LEFT JOIN tbl_medicine ON tbl_medicine.id=tsm.medicine_id LEFT JOIN tbl_order as tbo ON tpo.id=tpo.order_no WHERE tpo.order_no ='".$orderno."' ");    
    //     return $q->result_array();
    // }
    public function get_test_by_order_no($partnerId,$orderno){
        // $q=$this->db->query("SELECT tpo.*,tsm.name,tsm.mrp,tsm.sale_price,tsm.discount,tsm.discount_per,tsm.gst,tsm.total,tsm.gst_per,tbo.main_amount,tbo.discount_amount,tbo.final_amount,tbo.delivery_type FROM tbl_pathology_order_items as tpo LEFT JOIN tbl_test_pathology_wise as tsm ON tpo.test_id=tsm.test_id LEFT JOIN tbl_order as tbo ON tpo.id=tpo.order_no WHERE tpo.order_no ='".$orderno."' AND tsm.partner_id='".$partnerId."' ");

        $q=$this->db->query("SELECT tpo.*,tsm.name,tsm.mrp,tsm.sale_price,tsm.discount,tsm.discount_per,tsm.gst,tsm.total,tsm.gst_per,tbo.main_amount,tbo.discount_amount,tbo.final_amount,tbo.delivery_type FROM tbl_pathology_order_items as tpo LEFT JOIN tbl_test_pathology_wise as tsm ON tpo.test_id=tsm.test_id LEFT JOIN tbl_order as tbo ON tpo.id=tpo.order_no WHERE tpo.order_no ='".$orderno."' AND tsm.partner_id='".$partnerId."' ");
        
        return $q->result_array();
    }

    public function get_radiotest_by_order_no($partnerId,$orderno){
        $q=$this->db->query("SELECT tpo.*,tsm.name,tsm.mrp,tsm.sale_price,tsm.discount,tsm.discount_per,tsm.gst,tsm.total,tsm.gst_per,tbo.main_amount,tbo.discount_amount,tbo.final_amount,tbo.delivery_type FROM tbl_radiology_order_items as tpo LEFT JOIN tbl_report_radiology_wise as tsm ON tpo.test_id=tsm.test_id LEFT JOIN tbl_order as tbo ON tpo.id=tpo.order_no WHERE tpo.order_no ='".$orderno."' AND tsm.partner_id='".$partnerId."' ");
        return $q->result_array();
    }
    public function get_amount_by_order_no($partnerId,$orderno){
        $q=$this->db->query("SELECT * FROM tbl_order WHERE id ='".$orderno."' AND partner_id='".$partnerId."' ");
        return $q->row_array();
    }
    public function get_store_by_id($category,$partnerId){
        $q=$this->db->query("SELECT id,address,city,state,country_code,country,pincode,store_name,sign_board,contact_no,gstin,licence_no,delivery_charge,return_policy,symbol,stamp,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name FROM tbl_partners WHERE category ='".$category."' AND id='".$partnerId."' ");
        return $q->row_array();
    }
    public function get_order_prescription($orderno){
        $q=$this->db->query("SELECT * FROM tbl_patient_prescriptions WHERE order_no ='".$orderno."' ");
        return $q->result_array();
    }
    function get_prescription_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_patient_prescriptions` WHERE `id` = '" . $id . "' ");
        return $q->row_array();
    }

    function get_prescription_file_by_order_id($order_id) {
        $q = $this->db->query("SELECT * FROM `tbl_prescriptions` WHERE `order_no` = '" . $order_id . "' ");
        return $q->row_array();
    }

    function get_prescription_file_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_prescriptions` WHERE `id` = '" . $id . "' ");
        return $q->row_array();
    }

}
?>