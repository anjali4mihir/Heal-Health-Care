<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Reports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        
        if($this->session->userdata('role')=='1' || $this->session->userdata('role')=="0")
        {
            $this->auth->check_session();
        }else{
            $this->auth->check_partnersession();
        }   
        
        $this->modules = json_decode($this->session->userdata('is_manage_modules')); 
        $this->load->model("Report_model");
        $this->load->model("Order_model");
        $this->load->model("Services_model");
    }
    
    public function admin_report($id){
    
    	$currentURL = current_url();
        $url = explode('/',$currentURL);
        if($id=='1')
        {
            $data['title'] = 'Pharmacy-report'; 
        }
        elseif($id=='2')
        {
            $data['title'] = 'Pathologylab-report';
        }
        elseif($id=='3')
        {
            $data['title'] = 'Radiology-report';
        }
        elseif($id=='4')
        {
            $data['title'] = 'Doctors-report';
        }
        elseif($id=='5')
        {
            $data['title'] = 'Veterinardoctors-report';
        }
        elseif($id=='6')
        {
            $data['title'] = 'Nurse-report';
        }
        elseif($id=='7')
        {
            $data['title'] = 'Physiotherapist-report';
        }
        if(isset($_POST['btn_submit']))
        {

            $status = isset($_POST['status_select']) ? $_POST['status_select'] : "";
           	if(isset($status) && ($status==0 || $status=='0'))
           	{
           			$status=="ON";
           	}
            $date_from = isset($_POST['date_from']) ? $_POST['date_from'] : "";
            $date_to = isset($_POST['date_to']) ? $_POST['date_to'] : "";
            $this->db->select('tbl_order.*,tbl_partners.name as p_name,tbl_partners.id as p_id,tbl_partners.email,tbl_partners.profile');
            $this->db->from('tbl_order');
            $this->db->join('tbl_partners','tbl_order.partner_id = tbl_partners.id');
            $this->db->where('tbl_order.category',$id);
            if(!empty($this->session->userdata('role')) && $this->session->userdata('userid'))
            {
                if($url[3]=='report-1')
                {
                    if($this->session->userdata('userid'))
            		{
                      $this->db->where('tbl_order.partner_id',$this->session->userdata('userid'));
            		}
                }  
            }
            else if($this->session->userdata('userid')) {
            	if($url[3]=='report-1')
                {
                    if($this->session->userdata('userid'))
            		{
                      $this->db->where('tbl_order.partner_id',$this->session->userdata('userid'));
            		}
                }
            }
            if($status!="")
            {
            	if($status=="ON")
            		{
            		  $status = 0;
            	    }
            	    
                if($id=='1'||$id=='2'|| $id=='3'){
                    $this->db->where('tbl_order.order_status',$status);
                }elseif($id=='4'||$id=='5'|| $id=='6'|| $id=='7'){
                    $this->db->where('tbl_order.appointment_status',$status);
            } 
        }
        if(!empty($date_from) && !empty($date_to))
        {
            $this->db->where("date(tbl_order.created_at)>=",$date_from);
            $this->db->where("date(tbl_order.created_at)<=",$date_to);    
        }
        else if(!empty($date_from))
        {
                $this->db->where("date(tbl_order.created_at)>=",$date_from);
        }
        else if(!empty($date_to))
        {
                $this->db->where("date(tbl_order.created_at)<=",$date_to);
        }
            $data['fetch_data'] = $this->db->get()->result_array();
            
            //print_r($data['fetch_data']);die;
            $data['c_id'] = $id; 
            $data['status'] = $status;
            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;  
        } else {
           

            if($this->session->userdata('role')=='1' || $this->session->userdata('role')=='0' && $this->session->userdata('userid'))
        	{
            	if($url[3]=='report-1')
            	{
                	if($this->session->userdata('userid'))
        			{
                  	  $data['fetch_data'] = $this->Report_model->report_query1($id);
        			}  
            	}else{
                   $data['fetch_data'] = $this->Report_model->report_query($id);
                }
            }
        	else if($url[3]=='report-1')
            {
            	if($this->session->userdata('userid')) {
                 	$data['fetch_data'] = $this->Report_model->report_query1($id);
        			}
            }
            else if(($url[3]=='report')){
            	$data['fetch_data'] = $this->Report_model->report_query($id);
            }

            $data['c_id'] = $id;
        }
           
        if($this->session->userdata('role')=='1' || $this->session->userdata('role')=='0' && $this->session->userdata('userid')){
            if($url[3]=='report-1')
            {
                $data['role'] = 'partner';
                $this->load->ptemplate('admin/reports/all_report',$data);
            }else{
                if(in_array(0,$this->modules) || in_array(5,$this->modules))
                {
                    $data['role'] = 'admin';
                    $this->load->template('admin/reports/all_report',$data); 
                }
                else
                {
                    $this->load->template("admin/not_access");
                }  
            }    
        } elseif($this->session->userdata('role')=='1' || $this->session->userdata('role')=='0'){
        	if($url[3]=='report')
            {
                if(in_array(0,$this->modules) || in_array(5,$this->modules))
                {
                    $data['role'] = 'admin';
                    $this->load->template('admin/reports/all_report',$data);
                }
                else
                {
                    $this->load->template("admin/not_access");
                }
            }
        } elseif($this->session->userdata('userid')) {
        	if($url[3]=='report-1')
            {
                $data['role'] = 'partner';
                $this->load->ptemplate('admin/reports/all_report',$data);
            }
        }
    } 

    public function view($c_id,$id){
    	$currentURL = current_url();
        $url = explode('/',$currentURL);
        $c_id = $url[5];
        $id = $url[6];
        $data['title'] = 'Report-Details';
        $data['r_data'] = $this->Report_model->get_report_by_id($c_id,$id);

        $healthcare_sub_id = $data['r_data']['healthcare_sub_id'];
        $healthcare_details = $this->Services_model->service_by_id($healthcare_sub_id);
        $data['healthcare_details'] = $healthcare_details;

        $this->load->model('admin_model');
        $data['app_setting'] = $this->admin_model->get_appsetting($c_id,$id);
        
        $p_id = $data['r_data']['partner_id'];
      

        if($c_id=='1'||$c_id=='2'||$c_id=='3'){
            $data['medicines']= $this->Report_model->get_m_report_by_id($c_id,$id,$p_id);
            $data["prescription"] = $this->Order_model->get_order_prescription($id);
        } else if($c_id == "4"){
            $data["prescription"] = $this->Order_model->get_prescription_file_by_order_id($id);
        } else {
            $data["prescription"] = array();
        }
        $data['c_id'] = $c_id;

    
        if($this->session->userdata('role') && $this->session->userdata('userid'))
        {
            if($url[3]=='report-1')
            {    
            	$this->load->ptemplate('admin/reports/all_report_view',$data);
            }else{
            	if(in_array(0,$this->modules) || in_array(5,$this->modules))
                {

            	   $this->load->template('admin/reports/all_report_view',$data); 
                }
                else
                {
                    $this->load->template("admin/not_access");
                } 
            }    
        }elseif($this->session->userdata('role')) {
        	if($url[3]=='report')
            {
            	if(in_array(0,$this->modules) || in_array(5,$this->modules))
                {
                   $this->load->template('admin/reports/all_report_view',$data);
                }
                else
                {
                   $this->load->template("admin/not_access"); 
                }
            }
        }elseif($this->session->userdata('userid')) {
        	if($url[3]=='report-1')
            {
                 $this->load->ptemplate('admin/reports/all_report_view',$data);
            }
        }
        
    }

    public function genrate_invoice($c_id,$OrderNO)
    {

        $data["page_title"] = 'Invoice';
        $data["reportdata"] = $this->Order_model->get_order_by_id($c_id,$OrderNO);
        $data["pharmcydata"] = $this->Order_model->get_store_by_id($c_id,$data["reportdata"]['partner_id']);

        $partner_id = $data['reportdata']['partner_id'];

        $data["items"] = '';
      
        if($c_id == 1) //Pharmcy
        {
            $data["items"] = $this->Order_model->get_items_by_order_no($partner_id,$OrderNO);  
        }
        else if($c_id == 2) // Pathology
        {
            $data["items"] = $this->Order_model->get_test_by_order_no($partner_id,$OrderNO);
        }
        else if($c_id == 3) // Radiology
        {
            $data["items"] = $this->Order_model->get_radiotest_by_order_no($partner_id,$OrderNO);
        }
        
        $data["final_amount"] = $this->Order_model->get_amount_by_order_no($data["reportdata"]['partner_id'],$OrderNO);
 
        $random_no = rand(1111111111,9999999999).$OrderNO;
        $invoice_name = substr($random_no,-10);

        $data['category_id'] = $c_id;
        $html = $this->load->view('admin/reports/invoice', $data, true);
        echo $html;
        exit;

        $pdfFilePath = "invoice-".$OrderNO.".pdf";
        
        $this->load->library('Pdf');
        $this->pdf->pdf->AddPage('P');
        $this->pdf->pdf->WriteHTML($html);
        $this->load->model("common_model");
        $this->pdf->pdf->Output($pdfFilePath, "D");
    }

}
?>