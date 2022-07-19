<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Orders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_partnersession();
        $this->load->model("Order_model");
        $this->partner_id = $_SESSION['userid'];
        $this->category = $_SESSION['usercategory'];
    }
    public function order($id)
    {
        if($id == 1)
        {
            if($this->category == 1)
            {
                $Title = 'Pending Order';    
            }else if($this->category == 2){
                $Title = 'Pending Request';
            }else if($this->category == 3){
                $Title = 'Pending Appoitment';
            }
            
        }else if($id == 2){
            if($this->category == 1)
            {
                $Title = 'Approved Order';    
            }else if($this->category == 2){
                $Title = 'Accepted Request';
            }else if($this->category == 3){
                $Title = 'Accepted Request';
            }
             
        }else if($id == 3){
            if($this->category == 1)
            {
                $Title = 'Dispatched Order';    
            }else if($this->category == 2){
                $Title = 'Sample Collected';
            }else if($this->category == 3){
                $Title = 'Completed Appointment';
            }
            
        }else if($id == 4){
            if($this->category == 1)
            {
                $Title = 'Deliverd Order';    
            }else if($this->category == 2){
                $Title = 'Deliverd Report';
            }else if($this->category == 3){
                $Title = 'Deliverd Report';
            }
            
        }else if($id == 5){
            if($this->category == 1)
            {
                $Title = 'Cancelled Order';    
            }else if($this->category == 2){
                $Title = 'Cancelled Request';
            }else if($this->category == 3){
                $Title = 'Cancelled Request';
            }
             
        }else if($id == 6){
            if($this->category == 1)
            {
                $Title = 'Rejected Order';    
            }else if($this->category == 2){
                $Title = 'Rejected Request';
            }else if($this->category == 3){
                $Title = 'Rejected Request';
            }
            
        }
        else if($id == 7){
            if($this->category == 2){
                $Title = 'Pending Sample Collect';
            }else if($this->category == 3){
                $Title = 'Booking Appointment';
            }
        }
        else if($id == 8){
            if($this->category == 2){
                $Title = 'Pending Report';
            }else if($this->category == 3){
                $Title = 'Pending Report';
            }
            
        }
        $data["error"] = "";
        $data["title"] = $Title;
        
        if($this->partner_id >= 1){
            $data["reportdata"] = $this->Order_model->get_order_report($this->category,$this->partner_id,$id);
            //print_r($data["reportdata"]);die;
            $this->load->ptemplate('partner/order/order_list', $data);
        }else{
            redirect('partners/login');
        }
    }
    public function view($id)
    {
        $data["error"] = "";
        if($this->category == 1)
        {
            $Title = 'View Order';    
        }else if($this->category == 2){
            $Title = 'View Request';
        }else if($this->category == 3){
            $Title = 'View Appoitment';
        }
        $data["title"] = $Title;
        
        if($this->partner_id >= 1){
            $data["reportdata"] = $this->Order_model->get_order_by_id($this->category,$id);
            $data["prescription"] = $this->Order_model->get_order_prescription($id);
            $data["items"] = '';

            if($this->category == 1) //Pharmcy
            {
                $data["items"] = $this->Order_model->get_items_by_order_no($this->partner_id,$id); 
                    // print_r('<pre>');
                    // print_r(unserialize($data["items"][1]['medicine_serialize']));die; 
            }
            else if($this->category == 2) //Pathology
            {
                $data["items"] = $this->Order_model->get_test_by_order_no($this->partner_id,$id);
            }
            else if($this->category == 3) //Radiology
            {
                $data["items"] = $this->Order_model->get_radiotest_by_order_no($this->partner_id,$id);
            }

            $ddata['is_admin_view'] = '1';
            $this->load->model('common_model');
            $this->common_model->data_update("tbl_notification", $ddata, array("order_no" => $id,'partener_id' =>$this->partner_id));
            //print_r($data["reportdata"]);die;
            $this->load->ptemplate('partner/order/order_view', $data);
        }else{
            redirect('partners/login');
        }
    }

    public function changeStatus()
    {
        if($this->partner_id >= 1) {
            $id = $this->uri->segment(3);
            $category = $this->Order_model->get_order_by_id($this->category,$id);
            $ddata['order_status'] = $this->input->get('status');
            //print_r(json_decode($category['change_status_datetime'],true));die;
            
            $change_status_datetime = json_decode($category['change_status_datetime'],true);
            $index = count($change_status_datetime);
            $orderStatus['id'] = $this->input->get('status');
            $orderStatus['date'] = date('Y-m-d H:i:s');
            
            $change_status_datetime[$index] = $orderStatus;
            $ddata['change_status_datetime'] = json_encode($change_status_datetime);
            //print_r($ddata['change_status_datetime']);die;
            if($this->category == 3 && $ddata['order_status'] == 7)
            {
                $ddata['appoitment_date'] = $this->input->post('date');
                $ddata['appoitment_time'] = $this->input->post('time');    
            }
            if(($this->category == 3 || $this->category == 2) && $ddata['order_status'] == 4){
                $report_array = array();
                for ($i=0; $i <count($_FILES['report_pdf']['name']);$i++) { 
                        if ($_FILES["report_pdf"]["size"][$i] > 0) {
                            //print_r($_FILES["report_pdf"]["name"][$i]);die;
                            $idatad['name'] = $_FILES["report_pdf"]["name"][$i];
                            $idatad['type'] = $_FILES["report_pdf"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["report_pdf"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["report_pdf"]["error"][$i];
                            $idatad['size'] = $_FILES["report_pdf"]["size"][$i];
                            $config['upload_path'] = './uploads/reports/';
                            $config['allowed_types'] = 'pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["report_pdf"]["name"][$i]);
                            $filename = rand(0000, 9999) .time().'.'.end($temp);
                            $uploadpath = $this->config->item('attach_reports_path');

                            move_uploaded_file($_FILES["report_pdf"]["tmp_name"][$i], $uploadpath . $filename);
                            //$ddata1[] = $file_name;
                            array_push($report_array,$filename);
                            // $j = 1;
                            // for($i = 0; $i<count($ddata1); $i++){
                            //     $arr1['image_'.$j.''] = $ddata1[$i];
                            //     $j++;
                            // }
                            
                        }  
                    }
            $ddata['attached_reports'] = json_encode($report_array); 
            }
            if($category) {
                $this->load->model("common_model");
                $this->load->model('Api_model');
                $this->common_model->data_update("tbl_order", $ddata, array("id" => $id));
                if($ddata['order_status'] == 4){
                    $data["page_title"] = 'Invoice';
                    $data["reportdata"] = $this->Order_model->get_order_by_id($this->session->userdata('usercategory'),$id);
                    $data["pharmcydata"] = $this->Order_model->get_store_by_id($this->session->userdata('usercategory'),$data["reportdata"]['partner_id']);
                    $data["items"] = $this->Order_model->get_items_by_order_no($data["reportdata"]['partner_id'],$id);
                        
                    $data["final_amount"] = $this->Order_model->get_amount_by_order_no($data["reportdata"]['partner_id'],$id);
                        //print_r($data["final_amount"]);die;
                        $random_no = rand(1111111111,9999999999).$id;
                        $invoice_name = substr($random_no,-10);
                        $html = $this->load->view('partner/order/invoice', $data, true);
                        $pdfFilename = "invoice-".$invoice_name.".pdf";
                        $pdfsavePath = $this->config->item('invoice_path').$pdfFilename;
                        $this->load->library('Pdf');
                        $this->pdf->pdf->AddPage('P');
                        $this->pdf->pdf->WriteHTML($html);
                        $this->load->model("common_model");
                        if($data["reportdata"]['is_saved_invoice'] == '0' || $data["reportdata"]['is_saved_invoice'] == 0)
                        {
                            $sdata['is_saved_invoice'] = '1';
                            $sdata['invoice'] = $pdfFilename;
                            $this->common_model->data_update("tbl_order", $sdata, array("id" => $id));
                            $this->pdf->pdf->Output($pdfsavePath,'F');  
                        }
                }
                $appoitmentRecord=$this->Api_model->getusername($id);
                if ($ddata['order_status'] == 1) {
                    if($this->category == 1 ){
                        $message = 'Your Order Now been Created. View Order Details'; 
                        $title = 'Medicine Order Created'; 
                    }else{
                        $message = 'You’re Booking Now been Created. View Order Details';
                        $title = 'Lab Test Booking Created'; 
                    }
                } else if ($ddata['order_status'] == 2) {
                    if($this->category == 1 ){
                        $message = 'Your Medicine  Order -'.$category['customorder_id'].' Has Been Confirmed';
                        $title = 'Order Status'; 
                    }else{
                        $message = 'Your Booking For Lab Test- '.$category['customorder_id'].' Has Been Confirmed';
                        $title = 'New Lab Test Booking'; 
                    }
                } else if ($ddata['order_status'] == 3) {
                   if($this->category == 1 ){
                        $message = 'Your Order -'.$category['customorder_id'].' Has Been Dispatched';
                        $title = 'Order Status'; 

                    }else{
                        $message = 'Your Booking For Lab Test '.$category['customorder_id'].' Has Been Sample Collected ';
                        $title = 'Booking Status'; 

                    }
                } else if ($ddata['order_status'] == 4) {
                    if($this->category == 1 ){
                        $message = 'Your Order -'.$category['customorder_id'].' Has Been Delivered';
                        $title = 'Order Status'; 

                    }else{
                        $message = 'Your Booking For Lab Test '.$category['customorder_id'].' Has Been Delivered ';
                        $title = 'Booking Status'; 

                    }
                } else if ($ddata['order_status'] == 5) {
                    if($this->category == 1 ){
                        $message = 'Your Order -'.$category['customorder_id'].' Has Been Cancelled';
                        $title = 'Medicine Order Cancelled'; 

                    }else{
                        $message = 'Lab Test Report Cancelled';
                        $title = 'Your Lab Test Report Now been Cancelled. View Order Details'; 

                    }
                    
                }else if ($ddata['order_status'] == 6) {
                    if($this->category == 1 ){
                        $message = 'Your Order -'.$category['customorder_id'].' Has Been Rejected';
                        $title = 'Order Status'; 

                    }else{
                        $message = 'Lab Test Report Rejected';
                        $title = 'Your Lab Test Report Now been Rejected. View Order Details'; 
                }
            }else if ($ddata['order_status'] == 7) {
                    $message = 'Your Lab Test Sample Now been Collecte. View Order Details';
                    $title = 'Booking Status'; 

                }
                else if ($ddata['order_status'] == 8) {
                    $message = 'Your Booking For Lab Test '.$category['customorder_id'].' Has Been Sample Collected';
                    $title = "Booking Status"; 

                }
                $notification_insert = array();
                $notification_insert = [
                    "notification_type"=> "U",
                    "partener_id"   => $this->partner_id,
                    "category"      => $this->category,
                    "patient_id"    => $appoitmentRecord->patient_id,
                    "order_no"      => $id,
                    "title"         => $title,
                    "description"   => $message,
                    "status"        => 1,
                    "created_at"    => date("Y-m-d H:i:s")
                ];
                $this->db->insert("tbl_notification",$notification_insert);
                $device_token = $this->Api_model->get_user_profile_setting($appoitmentRecord->patient_id);

                if($notification_insert)
                {
                    $notification_message = array();
                    $notification_message['title'] = $title;
                    $notification_message['body'] = $message;
                    $notification_message['appoitment_id'] = $id;
                    $notification_message['consultation_type'] = $appoitmentRecord->consulation_type;
                    $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
                    $notification_message['is_followup'] = $appoitmentRecord->is_followup;
                    $this->load->helper('notifications_helper');
                    push_notification_android($device_token['registration_ids'],$notification_message);
                }
                
                $redirect_url = "";
                if($this->category == 1){
                    if($ddata['order_status']== 1){
                        $redirect_url = 'orders/pending-order';
                    }else if($ddata['order_status'] == 2){
                        $redirect_url = 'orders/approved-order';
                    }else if($ddata['order_status'] == 3){
                        $redirect_url = 'orders/dispatch-order';
                    }else if($ddata['order_status'] == 4){
                        
                        $redirect_url = 'orders/delivered-order';
                    }else if($ddata['order_status'] == 5){
                        $redirect_url = 'orders/cancelled-order';
                    }else if($ddata['order_status'] == 6){
                        $redirect_url = 'orders/rejected-order';
                    }
                }else if($this->category == 2){
                    if($ddata['order_status'] == 1){
                        $redirect_url = 'requests/pending-request';
                    }else if($ddata['order_status'] == 2){
                        $redirect_url = 'requests/accepted-request';
                    }else if($ddata['order_status'] == 3){
                        $redirect_url = 'requests/sample-collected';
                    }else if($ddata['order_status'] == 4){
                        $redirect_url = 'requests/deliverd-report';
                    }else if($ddata['order_status'] == 5){
                        $redirect_url = 'requests/requests/cancelled-request';
                    }else if($ddata['order_status'] == 6){
                        $redirect_url = 'requests/requests/rejected-request';
                    }else if($ddata['order_status'] == 7){
                        $redirect_url = 'requests/pending-sample-collect';
                    }else if($ddata['order_status'] == 8){

                        $redirect_url = 'requests/pending-report';
                    }
                }else if($this->category == 3){
                    if($ddata['order_status'] == 1){
                        $redirect_url = 'requests/pending-request';
                    }else if($ddata['order_status'] == 2){
                        $redirect_url = 'requests/accepted-request';
                    }else if($ddata['order_status'] == 3){
                        $redirect_url = 'requests/appointment-completed';
                    }else if($ddata['order_status'] == 4){
                        $redirect_url = 'requests/deliverd-report';
                    }else if($ddata['order_status'] == 5){
                        $redirect_url = 'requests/cancelled-request';
                    }else if($ddata['order_status'] == 6){
                        $redirect_url = 'requests/rejected-request';
                    }else if($ddata['order_status'] == 7){
                        $redirect_url = 'requests/pending-appointment';
                    }else if($ddata['order_status'] == 8){
                        $redirect_url = 'requests/pending-report';
                    }
                }
                redirect(base_url().$redirect_url);
                exit;
            }
        } else {
            redirect('partners/login');
        }
    }
    public function prescription_download($id)
    {
        $this->load->helper('download');
        $data["store_images"] = $this->Order_model->get_prescription_by_id($id);
        $filename = "prescription-".rand(111111,999999);
        $filepath = 'uploads/prescription/';
        $file = FCPATH.$filepath.$data["store_images"]['filename'];

        $fname = explode(".",$data["store_images"]['filename']);
        $extension = end($fname);
        
        $name = $filename.'.'.$extension;
        $data = file_get_contents($file);
        force_download($name,$data);
    }
    public function genrate_invoice($OrderNO)
    {
        $data["page_title"] = 'Invoice';
        $data["reportdata"] = $this->Order_model->get_order_by_id($this->session->userdata('usercategory'),$OrderNO);
        $data["pharmcydata"] = $this->Order_model->get_store_by_id($this->session->userdata('usercategory'),$data["reportdata"]['partner_id']);
        $data["items"] = '';
        if($this->category == 1) //Pharmcy
        {
            $data["items"] = $this->Order_model->get_items_by_order_no($this->partner_id,$OrderNO);   
        }
        else if($this->category == 2) // Pathology
        {
            $data["items"] = $this->Order_model->get_test_by_order_no($this->partner_id,$OrderNO);
        }
        else if($this->category == 3) // Radiology
        {
            $data["items"] = $this->Order_model->get_radiotest_by_order_no($this->partner_id,$OrderNO);
        }
        $data["final_amount"] = $this->Order_model->get_amount_by_order_no($data["reportdata"]['partner_id'],$OrderNO);
        
        $random_no = rand(1111111111,9999999999).$OrderNO;
        $invoice_name = substr($random_no,-10);
        $html = $this->load->view('partner/order/invoice', $data, true);
        $pdfFilePath = "invoice-".$OrderNO.".pdf";
        
        $this->load->library('Pdf');
        $this->pdf->pdf->AddPage('P');
        $this->pdf->pdf->WriteHTML($html);
        $this->load->model("common_model");
        
        $this->pdf->pdf->Output($pdfFilePath, "D");
    }   
}
?>