<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Radiologyservices extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_partnersession();
        $this->load->model('Radiology_model');
    }
    
    // public function modality()
    // {
    //     $data["error"] = "";
    //     $data["title"] = 'Test Modality/Group';
       
    //     $partner_id = $this->session->userdata('userid');
        
    //     if($partner_id >= 1){
    //         $data["category"] = $this->Radiology_model->get_group_list($_SESSION['userid']);
    //         $this->load->ptemplate('partner/radilogymodality/group_list', $data);
    //     }else{
    //         redirect('partners/login');
    //     }
    // }
    // public function add_modality()
    // {
    //     $data = array();
    //     $data["error"] = "";
    //     $data['page_title'] = "Test Modality/Group Add";
    //     $data['action'] = "Add";
    //     $partner_id = $this->session->userdata('userid');
        
    //     if($partner_id >= 1){
    //         if (isset($_REQUEST)) {

    //                 $this->load->library('form_validation');
                                      
    //                 $this->form_validation->set_rules('name', 'Category Name', 'trim|required|callback_check_test_category_name_lab_wise');                   
    //                 if($this->form_validation->run() == FALSE) {
    //                     $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
    //                 } else {
    //                     $testId = '';
                        
    //                     if($this->check_test_category_name() == 0)
    //                     {
                           
    //                         $adata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
    //                         $adata['name_hn'] = $this->google_translate($adata['name']); 
                           
    //                         $adata['created_at'] = date('Y-m-d H:i:s');
    //                         $this->load->model('common_model');
    //                         $Id = $this->common_model->data_insert("tbl_group_radiology", $adata, TRUE);
                            
    //                         $testId =  $Id;
    //                     }else{
                            
    //                         $testId = $this->db->get_where('tbl_group_radiology',['name' => strtolower($this->input->post("name"))])->row()->id;
    //                     }
    //                     $ddata=array();
    //                     $ddata['partner_id'] = $_SESSION['userid'];
    //                     $ddata['group_id'] = $testId;
    //                     $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
    //                     $ddata['name_hn'] = $this->google_translate($ddata['name']); 
                        
    //                     $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        
    //                     $this->load->model("common_model");
    //                     $ddata['created_at'] = date('Y-m-d H:i:s');
    //                     $this->common_model->data_insert("tbl_group_radiology_wise", $ddata, TRUE);
                        
    //                     $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
    //                         <i class="fa fa-check"></i>
    //                         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    //                         <strong>Success ! </strong> Category/Group added successfully
    //                                     </div>');
    //                     redirect("test-modality");

    //                     exit;
    //                 }
    //             }
    //             $this->load->model("language_model");
    //             $data['language'] = $this->language_model->get_language_list();
    //             $this->load->ptemplate('partner/radilogymodality/group_add', $data);
    //     }else{
    //         redirect('partners/login');
    //     } 
    // }
    // public function edit_modality($id)
    // {
    //     $data = array();
    //     $data["error"] = "";
    //     $data['page_title'] = "Modality/Group Edit";
    //     $data['action'] = "Edit";
        
    //     $partner_id = $this->session->userdata('userid');
    //     $data["service_records"] = $this->Radiology_model->get_modality_by_id($id,$partner_id);
        
    //     if($partner_id >= 1) {
    //         if (isset($_REQUEST)) {
    //             $this->form_validation->set_rules('name', 'Service Name', 'trim|required|callback_check_edit_test_name_lab_wise');                   
                
    //             if ($this->form_validation->run() == FALSE) {
    //                 $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
    //             } else {
                    
    //                     $testId = '';
                        
    //                     if($this->check_test_category_name() == 0)
    //                     {
    //                        $adata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
                           
    //                         $adata['name_hn'] = $this->google_translate($adata['name']); 
                            
    //                         $adata['created_at'] = date('Y-m-d H:i:s');
    //                         $this->load->model('common_model');
    //                         $Id = $this->common_model->data_insert("tbl_group_radiology", $adata, TRUE);
                            
    //                         $testId =  $Id;
    //                     }else{
                            
    //                         $testId = $this->db->get_where('tbl_group_radiology',['name' => strtolower($this->input->post("name"))])->row()->id;
    //                     }
    //                     $ddata=array();
    //                     $ddata['partner_id'] = $_SESSION['userid'];
                        
    //                     $ddata['group_id'] = $testId;
    //                     $ddata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : '';
    //                     $ddata['name_hn'] = $this->google_translate($ddata['name']); 

    //                     $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    
    //                 $this->load->model("common_model");
    //                 $ddata['updated_at'] = date('Y-m-d H:i:s');
    //                 $this->common_model->data_update("tbl_group_radiology_wise", $ddata, array("id" => $id));

    //                 $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
    //                                     <i class="fa fa-check"></i>
    //                                   <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    //                                   <strong>Success ! </strong> Modality Updated successfully
    //                                 </div>');
    //                 redirect("test-modality");
    //                 exit;
    //             }
    //         }
    //         $this->load->model("language_model");
    //         $data['language'] = $this->language_model->get_language_list();
    //         $this->load->ptemplate('partner/radilogymodality/group_edit', $data);
    //     } else {
    //         redirect('partners/login');
    //     }       
    // }
    // public function delete_modality($id)
    // {
    //     $partner_id = $this->session->userdata('userid');
        
    //     if($partner_id >= 1) {
    //         $data = array();
    //         $service = $this->Radiology_model->get_modality_by_id($id,$_SESSION['userid']);
            
    //         if ($service) {
    //             $this->db->query("DELETE FROM `tbl_group_radiology_wise` WHERE `id` = '" . $service->id . "' AND `partner_id` = '" .$service->partner_id. "'");
    //                 $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
    //                                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    //                                 <strong>Success ! </strong> Modality deleted successfully
    //                               </div>');
    //                 redirect("test-modality");

    //                 exit;
               
    //         }
    //     } else {
    //         redirect('partners/login');
    //     }
    // }
    public function test()
    {
        $data["error"] = "";
        $data["title"] = 'Test List';
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1){
                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {

                    if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);

                        $this->db->query("DELETE FROM `tbl_report_radiology_wise` WHERE `partner_id` = '" .$partner_id. "' AND `id` IN ($selectedIDs)");

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("radiologyservices/test");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("radiologyservices/test");
                        exit;
                    }
                }
                // delete all end

            $data["services"] = $this->Radiology_model->get_test_list($_SESSION['userid']);
            
            $this->load->ptemplate('partner/radilogytest/test_list', $data);
        }else{
            redirect('partners/login');
        }
    }
    public function add_test()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Test Add";
        $data['action'] = "Add";
        
        $partner_id = $this->session->userdata('userid');
        //$data['modality'] = $this->Radiology_model->get_active_group_list($partner_id);
        //print_r($data['modality']);die;
        if($partner_id >= 1){
            if (isset($_REQUEST)) {

                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Service Name', 'trim|required|callback_check_test_name_lab_wise');
                    //$this->form_validation->set_rules('category', 'category', 'trim|required');
                    $this->form_validation->set_rules('mrp', 'MRP', 'trim|required');                   
                    $this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|required');
                    $this->form_validation->set_rules('gst', 'GST', 'trim|required');                   
                    $this->form_validation->set_rules('description', ' Details', 'trim|required');
                    
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $testId = '';
                        
                        if($this->check_test_name() == 0)
                        {
                            $adata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
                            $adata['name_hn'] = $this->google_translate($adata['name']); 
                            $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                            $adata['description_hn'] = $this->google_translate($adata['description']); 
                            //$adata['category'] = $this->input->post("category") ? $this->input->post("category") : '';
                            //$adata['category_hn'] = $this->google_translate($adata['category']); 
                            $adata['created_at'] = date('Y-m-d H:i:s');
                            $this->load->model('common_model');
                            $Id = $this->common_model->data_insert("tbl_report_radiology", $adata, TRUE);
                            
                            $testId =  $Id;
                        }else{
                            
                            $testId = $this->db->get_where('tbl_report_radiology',['name' => $this->input->post("name")])->row()->id;
                        }
                        $ddata=array();
                        $ddata['partner_id'] = $_SESSION['userid'];
                        $ddata['test_id'] = $testId;
                        $ddata['gst'] = $this->input->post("gst_amt") ? $this->input->post("gst_amt") : ''; 
                        $ddata['gst_per'] = $this->input->post("gst") ? $this->input->post("gst") : ''; 
                        $ddata['mrp'] = $this->input->post("mrp") ? $this->input->post("mrp") : '';
                        $ddata['sale_price'] = $this->input->post("sale_price") ? $this->input->post("sale_price") : '';
                        $ddata['discount'] = $this->input->post("discount") ? $this->input->post("discount") : '';

                        $ddata['discount_per'] = $this->input->post("discount_per") ? $this->input->post("discount_per") : '';
                        $ddata['total'] = $this->input->post("total") ? $this->input->post("total") : '';
                        //$ddata['group_id'] = $this->input->post("modality") ? $this->input->post("modality") : '';
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['name_hn'] = $this->google_translate($ddata['name']); 

                        $ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_report_radiology_wise", $ddata, TRUE);
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Service added successfully
                                        </div>');
                        redirect("radiologyservices/test");
                        exit;
                    }
                }
                $this->load->ptemplate('partner/radilogytest/test_add', $data);
        }else{
            redirect('partners/login');
        } 
    }
    public function csv_structure_download($type)
    {
        if($type=='4' || $type==4)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array("NAME OF TEST", "DESCRIPTION", "AMOUNT", "GST (%)", "DISCOUNT  (%)","TAXABLE AMOUNT");
            array_push($export_arr, $title);
            $arr=array('Blood Alcohol','DEscription about report','1008','12','10','1000');
            $arr2=array('Kala Azar','DEscription about report','1008','12','10','1000');
            $arr3=array('Sputum Culture AFB','DEscription about report','1008','12','10','1000');
            array_push($export_arr, $arr);
            array_push($export_arr, $arr2);
            array_push($export_arr, $arr3);
            $data1 = convert_to_csv($export_arr, 'Radio Diagnosis' . date('F d Y') . '.csv', ',');
        }
    }
    public function edit_test($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Test Edit";
        $data['action'] = "Edit";
        
        $partner_id = $this->session->userdata('userid');
        $data["service_records"] = $this->Radiology_model->get_test_by_id($id,$partner_id);
        //$data['modality'] = $this->Radiology_model->get_active_group_list($partner_id);
        if($partner_id >= 1) {
            if (isset($_REQUEST)) {
                                
                $this->form_validation->set_rules('name', 'Service Name', 'trim|required');
                $this->form_validation->set_rules('gst', 'GST', 'trim|required');                   
                $this->form_validation->set_rules('mrp', 'MRP', 'trim|required');                   
                $this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|required');                      
                $this->form_validation->set_rules('description', ' Details', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    
                        
                        $ddata=array();
                       
                        $ddata['mrp'] = $this->input->post("mrp") ? $this->input->post("mrp") : '';
                        $ddata['sale_price'] = $this->input->post("sale_price") ? $this->input->post("sale_price") : '';
                        $ddata['gst'] = $this->input->post("gst_amt") ? $this->input->post("gst_amt") : ''; 
                        $ddata['gst_per'] = $this->input->post("gst") ? $this->input->post("gst") : ''; 
                        $ddata['discount'] = $this->input->post("discount") ? $this->input->post("discount") : '';
                        $ddata['discount_per'] = $this->input->post("discount_per") ? $this->input->post("discount_per") : '';
                        $ddata['total'] = $this->input->post("total") ? $this->input->post("total") : '';
                        $ddata['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ddata['name'])));
                        
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_report_radiology_wise", $ddata, array("id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Service Updated successfully
                                    </div>');
                    redirect("radiologyservices/test");
                    
                    exit;
                }
            }
            $this->load->model("language_model");
            $data['language'] = $this->language_model->get_language_list();
            $this->load->ptemplate('partner/radilogytest/test_edit', $data);
        } else {
            redirect('partners/login');
        }       
    }
    public function delete_test()
    {
        $id = $this->input->post('id');
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1) {

            $data = array();
            $service = $this->Radiology_model->get_test_by_id($id,$_SESSION['userid']);
            
            if ($service) {
                $this->db->query("DELETE FROM `tbl_report_radiology_wise` WHERE `id` = '" . $service->id . "' AND `partner_id` = '" .$service->partner_id. "'");
                 $output = array(
                    'Status'  => 200,
                    'message' => 'Deleted Successfully!'
                );
        } }else {
             $output = array(
                    'Status'  => 100,
                );
        }
        echo json_encode($output);
    }
    public function fetch_testList()
    {
        $responsedata = $this->Radiology_model->get_all_test_list_by_search($this->input->post('search'));
        //print_r($responsedata);die;
        $output = '';
        $output = array(
                    
                    'TestList' => $responsedata
                );
        //print_r($output);die;
        echo json_encode($output);    
    }
    // public function fetch_testcategoryList()
    // {
    //     $responsedata = $this->Radiology_model->get_all_test_category_list_by_search($this->input->post('search'));
    //     //print_r($responsedata);die;
    //     $output = '';
    //     $output = array(
                    
    //                 'TestList' => $responsedata
    //             );
        
    //     echo json_encode($output);    
    // }
    public function importdata()
    { 
        
        $partner_id = $this->session->userdata('userid');
        if($partner_id > 0)
        {
            if(isset($_REQUEST['records']) && !empty($_REQUEST['records']))
            {
                $this->load->model('common_model');
                $final=array();
                log_message('info','Radiology');
                $i=1;
                foreach($_REQUEST['records'] as $row)
                {
                    
                    //name
                    $data['name']=iconv(mb_detect_encoding($row['NAME OF TEST'], mb_detect_order(), true), "UTF-8",$row['NAME OF TEST']);
                    $data['name']=strtolower($data['name']);

                    //description
                    $data['description']=iconv(mb_detect_encoding($row['DESCRIPTION'], mb_detect_order(), true), "UTF-8",$row['DESCRIPTION']);
                    $data['description']=strtolower($data['description']);

                    $data['created_at']=date('Y-m-d H:i:s');
                    $data['transate_state'] = '1';

                    $this->db->select('id');
                    $this->db->from('tbl_report_radiology');
                    $this->db->where('name',$data['name']);
                    $check_pathology_test_exist=$this->db->get()->row_array();

                    if(isset($check_pathology_test_exist) && !empty($check_pathology_test_exist) && !empty($check_pathology_test_exist['id']))
                    {
                        $testId=$check_pathology_test_exist['id'];
                    }
                    else
                    {
                        $Id = $this->common_model->data_insert("tbl_report_radiology",$data, TRUE);
                        $testId =  $Id;
                    }
                    
                    $ddata['mrp'] = $row['AMOUNT'];
                    $ddata['gst_per'] = $row['GST (%)'];
                    $ddata['gst_per']=0;
                    //sale price
                    if (is_numeric($ddata['mrp']) && is_numeric($ddata['gst_per']))
                    {
                        $ddata['gst'] = number_format(($ddata['mrp'] * $ddata['gst_per'] / 100), 2, '.', '');
                        $ddata['sale_price'] = $ddata['mrp'] + $ddata['gst'];
                    }
                    else
                    {
                        $ddata['gst'] = 0;
                        $ddata['sale_price'] = 0;
                    }

                    //Discount
                    $ddata['discount_per'] = $row['DISCOUNT  (%)'];
                    if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount_per']))
                    {
                        $ddata['discount'] = number_format(($ddata['sale_price'] * $ddata['discount_per'] / 100), 2, '.', '');
                    }
                    else
                    {
                        $ddata['discount'] = 0;
                    }

                    //total
                    if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount']))
                    {
                        $ddata['total'] = $ddata['sale_price'] - $ddata['discount'];
                    }
                    else
                    {
                        $ddata['total'] = 0;
                    }

                    $ddata['partner_id'] = $_SESSION['userid'];
                    $ddata['test_id'] = $testId;
                    $ddata['name'] = $data['name'];
                    $ddata['status'] = '1';
                    
                    
                    $this->db->select('id');
                    $this->db->from('tbl_report_radiology_wise');
                    $this->db->where('partner_id',$ddata['partner_id']);
                    $this->db->where('test_id',$testId);
                    $recordexists=$this->db->get()->row_array();
                    if(isset($recordexists) && !empty($recordexists) && !empty($recordexists['id']))
                    {
                        $ddata['updated_at']=date('Y-m-d H:i:s');
                        @unlink($ddata['partner_id']);
                        $this->db->update('tbl_report_radiology_wise',$ddata,array('id'=>$recordexists['id']));
                        log_message('info','Update'.$i);
                        $i++;
                    }
                    else
                    {
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_report_radiology_wise", $ddata, TRUE);   
                        log_message('info','Insert'.$i);
                        $i++;
                    }

                }
            }            
        }
    }
    public function importdata_old()
    { 
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1)
        {
            $path = $this->config->item("inventory_path");
            $config['upload_path'] = './uploads/inventory/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $filename = $this->file_upload($_FILES["file"],$path);
            $returnpath = $this->config->item('inventory_path_uploaded_path');

            $file   = $returnpath.$filename;
            //$file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $c = 0;
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                $testId = '';
                if($c<>0){
                    
                if($filesop[0] != '') {
                    
                    $check_test_exist = $this->Radiology_model->check_test_exist_name(strtoupper($filesop[0]),strtoupper($filesop[1]));
                    
                    if($check_test_exist == 0){
                        
                        $sdata['name'] = iconv(mb_detect_encoding($filesop[0], mb_detect_order(), true), "UTF-8",$filesop[0]); 
                        
                        $sdata['name_hn'] = $this->google_translate($sdata['name']);
                        //$sdata['category'] = $filesop[1]; 
                        
                        //$sdata['category_hn'] = $this->google_translate($sdata['category']);
                        $sdata['description'] = $filesop[1];
                        $sdata['description_hn'] = $this->google_translate($sdata['description']);
                        $sdata['created_at'] = date('Y-m-d H:i:s');
                        $this->load->model('common_model');
                        $Id = $this->common_model->data_insert("tbl_report_radiology",$sdata, TRUE);
                        $testId =  $Id;
                          
                        } else {
                             
                          $testId = $this->db->get_where('tbl_report_radiology',['name' => strtolower($filesop[0])])->row()->id;   
                        }
                    }
                    // if($this->Radiology_model->check_modality_exist_name($filesop[1]) == 0)
                    // {
                    //     $mdata['name'] = $filesop[1];   
                    //     $mdata['name_hn'] = $this->google_translate($mdata['name']);
                    //     $this->load->model('common_model');
                    //     $modalityID = $this->common_model->data_insert("tbl_group_radiology", $mdata, TRUE);
                        
                    // }else{
                    //    $modalityID = $this->db->get_where('tbl_group_radiology',['name' => strtolower($filesop[1])])->row()->id;  
                    // }

                    // if($this->Radiology_model->check_test_category_exist_or_not($filesop[1],$_SESSION['userid']) == 0)
                    // {
                    //     $rdata['partner_id'] = $_SESSION['userid'];   
                    //     $rdata['group_id'] = $modalityID;   
                    //     $rdata['name'] = $filesop[1];   
                    //     $rdata['name_hn'] = $this->google_translate($mdata['name']);
                    //     $this->load->model('common_model');
                    //     $this->common_model->data_insert("tbl_group_radiology_wise",$rdata, TRUE);
                    // }
                }
                
                $ddata['partner_id'] = $_SESSION['userid'];
                $ddata['test_id'] = $testId;
                //$ddata['group_id'] = $modalityID;
                $ddata['name'] = iconv(mb_detect_encoding($filesop[0], mb_detect_order(), true), "UTF-8", $filesop[0]);;
                $ddata['mrp'] = $filesop[2];
                $ddata['gst_per'] = $filesop[3];

                if (is_numeric($ddata['mrp']) && is_numeric($ddata['gst_per'])) {
                    $ddata['gst'] = number_format(($ddata['mrp'] * $ddata['gst_per'] / 100), 2, '.', '');
                    $ddata['sale_price'] = $ddata['mrp'] + $ddata['gst'];
                }else{
                    $ddata['gst'] = 0;
                    $ddata['sale_price'] = 0;
                }
                $ddata['discount_per'] = $filesop[5];

                if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount_per'])) {
                    $ddata['discount'] = number_format(($ddata['sale_price'] * $ddata['discount_per'] / 100), 2, '.', '');
                }else{
                    $ddata['discount'] = 0;
                }

                if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount'])) {
                    $ddata['total'] = $ddata['sale_price'] - $ddata['discount'];
                }else{
                    $ddata['total'] = 0;
                }
                $ddata['status'] = '1';
                $ddata['created_at'] = date('Y-m-d H:i:s');
                
                if($c<>0){                  /* SKIP THE FIRST ROW */
                    if(!empty($ddata['name'])) {
                    $check_medicine_exist = $this->Radiology_model->check_test_exist_or_not($ddata['name'],$_SESSION['userid']);
                        if($check_medicine_exist <= 0){
                        $ddata['name_hn'] = $this->google_translate($ddata['name']);
                        //print_r($medicineId);die;
                        if($testId > 0)
                        {
                            $this->load->model('common_model');
                            $this->common_model->data_insert("tbl_report_radiology_wise", $ddata, TRUE);    
                        }
                        else{
                            redirect("radiologyservices/test");
                            exit;
                        }
                        } 
                    }
                }
                $c = $c + 1;
            }
            redirect("radiologyservices/test");
            exit;   
        }
    }
    public function check_test_name()
    {
        $name = $this->input->post("name");
        $category = $this->input->post("category");
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_test_exist_name($name,$category);
            if($check_medicine_exist > 0){
                 return $check_medicine_exist;
            } else {
                 return 0;
                 
            }
        }
    }
    public function check_test_category_name()
    {
        $name = strtolower($this->input->post("name"));
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_test_category_exist_name($name);
            //print_r($check_medicine_exist);die;
            if($check_medicine_exist > 0){
                 return $check_medicine_exist;
                 
            } else {
                 return 0;
                 
            }
        }
    }
    
    public function check_report_exist_or_not()
    {
        $name = strtoupper($this->input->post("name"));
        //$category = strtoupper($this->input->post("category"));
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_test_exist_or_not($name,$_SESSION['userid']);
            if($check_medicine_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_category_exist_or_not()
    {
        $name = strtoupper($this->input->post("name"));
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_test_category_exist_or_not($name,$_SESSION['userid']);

            if($check_medicine_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_edit_category_exist_or_not()
    {
        $name = strtolower($this->input->post("name"));
        $id = $this->input->post("id");
        //print_r($id);die;
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_edit_category_exist_or_not($name,$_SESSION['userid'],$id);
            //print_r($check_medicine_exist);die;
            if($check_medicine_exist > 0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_edit_report_exist_or_not()
    {
        $name = strtolower($this->input->post("name"));
        $id = $this->input->post("id");
        //print_r($id);die;
        if(!empty($name)) {
            $check_medicine_exist = $this->Radiology_model->check_edit_labservice_exist_or_not($name,$_SESSION['userid'],$id);
            //print_r($check_medicine_exist);die;
            if($check_medicine_exist > 0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_test_name_lab_wise()
    {
        $this->db->select('*');
        $this->db->from('tbl_report_radiology_wise');
        $this->db->where('tbl_report_radiology_wise.name',$this->input->post('name'));
        //$this->db->where('tbl_report_radiology.category',$this->input->post('category'));
        $this->db->where('partner_id',$this->session->userdata('userid'));
        $this->db->join('tbl_report_radiology', 'tbl_report_radiology.id = tbl_report_radiology_wise.test_id');
        if($this->db->get()->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
           
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_test_category_name_lab_wise()
    {
        $this->db->select('*');
        $this->db->where('name',strtolower($this->input->post('name')));
        $this->db->where('partner_id',$this->session->userdata('userid'));
        if($this->db->get('tbl_group_radiology_wise')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Category/Group is Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function check_edit_test_name_lab_wise()
    {
        //print_r($this->input->post('medicineId'));die;
        $this->db->select('*');
        $this->db->where('name',strtolower($this->input->post('name')));
        $this->db->where('partner_id',$this->session->userdata('userid'));
        $this->db->where('id !=',$this->input->post('serviceId'));
        if($this->db->get('tbl_report_radiology_wise')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_saleprice()
    {
        if($this->input->post('sale_price') > $this->input->post('mrp')){
            $this->form_validation->set_message(__FUNCTION__, 'Sale Price Must Lessthan of MRP');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function google_translate($text)
    {
        $apiKey = 'AIzaSyDddBlYNsxZtN6VkZ3tOautTVN5qGYlk8A';
        
        $url = 'https://www.googleapis.com/language/translate/v2?key='.$apiKey.'&q=' . rawurlencode($text) .'&source=en&target=hi';

        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);                 
        $responseDecoded = json_decode($response, true);
        
        curl_close($handle);
        if($responseDecoded['error']['code'] == 400){
            return $text;
        }else{
          return $responseDecoded['data']['translations'][0]['translatedText'];  
        }
        
    }
    private function file_upload($arr, $path) {
        set_time_limit(0);
        if ($arr['error'] == 0) {

            $temp = explode(".", $arr["name"]);
            $random_number = $this->get_random_number(10);
            $file_name = time() .'_'.$random_number.'.' . end($temp);
            $file_path = $path . $file_name;
            if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                $ret = $file_name;
            }
            else {
                $ret = "";
            }
        }
        return $ret;
    }
    private function get_random_number($length = 10, $sting = "") {
        if (empty($sting)) {
            $alphabet = "012345678901234567890123456789";
        }
        else {
            $alphabet = $sting;
        }
        $token = "";
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0;$i < $length;$i++) {
            $n = rand(0, $alphaLength);
            $token .= $alphabet[$n];
        }
        return $token;
    }

    public function show_all_test()
    {
        if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
        {
        $fetch_data = $this->Radiology_model->make_test_datatables($_SESSION['userid']);
       
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $edit_url = base_url() . 'radiologyservices/edit_test/'.$row['id']; 
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = strtoupper($row['name']);
            $sub_array[] = number_format((float)$row['mrp'], 2, '.', '');
            $sub_array[] = number_format((float)$row['gst'], 2, '.', '');
            $sub_array[] = number_format((float)$row['discount'], 2, '.', '');
            $sub_array[] = number_format((float)$row['total'], 2, '.', '');
            // $sub_array[] = number_format((float)$row['sale_price'], 2, '.', '');
            $sub_array[] = '<input type="checkbox" class="js-switch tgl_checkbox" data-status="status" data-table="tbl_report_radiology_wise" data-idfield="id" data-id="'.$row['id'].'" id=cb_'.$row['id'].'  '.(($row['status'] == "1") ? 'checked' : "").' >';
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string .= '<a href="javascript:void(0);" onclick="deletedata('.$row['id'].');" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';

            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;

        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Radiology_model->get_all_test_data(),
            "recordsFiltered" => $this->Radiology_model->get_test_filtered_data($_SESSION['userid']),
            "data" => $data,
            "status" => 200,
        );
        }else{
            $output = array(
            "status" => 100
        );
        }
        echo json_encode($output);
    }
    
}
?>