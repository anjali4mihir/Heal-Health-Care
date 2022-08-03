<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Inventory extends CI_Controller {

    public function __construct() {
            parent::__construct();  
            $this->auth->check_session();
            $this->load->model("Inventory_model");
            $this->load->model('common_model');
    }

    public function index() {
            $data["error"] = "";
            $data["title"] = 'Inventory List';
            $data['medicines_list'] = $this->Inventory_model->get_medicine_list();
            if(isset($_GET['inventory'])) {
                if($this->input->get('inventory') == 'medicines') {
                    $data['inventory_type'] = 'pharmacy';
                }
                else if($this->input->get('inventory') == 'pathology-test') {
                    $data['inventory_type'] = 'pathology';
                }
                else if($this->input->get('inventory') == 'radiology-test') {
                    $data['inventory_type'] = 'radiology';
                }
                else if($this->input->get('inventory') == 'provisional-test') {
                    $data['inventory_type'] = 'provisional';
                }
            }
            else{
                $data['inventory_type'] = 'pharmacy';
            }
            $data['medicines_list']=$this->Inventory_model->get_medicine_list();
            $data['pathology_test_list']=$this->Inventory_model->get_pathology_test_list();
            $data['radiology_test_list']=$this->Inventory_model->get_radiology_test_list();
            $data['provisional_test_list']=$this->Inventory_model->get_provisional_test_list();
            //print_r( $data['radiology_test_list']);die;
            $this->load->template('admin/inventory/inventory_list', $data);
    }

    public function add_medicine() {
            $data = array();
            $data["error"] = "";
            $data["pageTitle"] = "Admin Medicine";
            $data['admin'] = "Admin";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Medicine Add";
            $data['action'] = "Add";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');

            if($role == 1 && $admin_id >= 1){
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');                
                    $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
                    $this->form_validation->set_rules('name', 'Medicine Name', 'trim|required|callback_check_medicine_name_in_master');
                    $this->form_validation->set_rules('no_of_tablets', 'NO Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                    $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
                
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } 
                    else {
                        $ddata=array();
                    
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['name_hn'] = $this->google_translate($ddata['name']);
                        $ddata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : '';
                        $ddata['company_name_hn'] = $this->google_translate($ddata['company_name']);
                        $ddata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : '';
                        $ddata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : '';
                        $ddata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : '';
                        $ddata['generic_name_hn'] = $this->google_translate($ddata['generic_name']);
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_medicine", $ddata, TRUE);

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Medicine added successfully
                            </div>');
                        redirect(base_url().'inventory'.'?inventory='.'medicines');
                        exit;
                    }
                }
                $this->load->template('admin/inventory/medicine_add', $data);
            }
            else{
                redirect('login');
            }    
    }
    
    public function edit_medicine($id) {
            $data = array();
            $data["error"] = "";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Edit Medicine";
            $data['action'] = "Edit";

            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            $data["medicine_records"] = $this->Inventory_model->get_medicine_by_id($id);
            if($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST)) {
                    $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
                    $this->form_validation->set_rules('name', 'Medicine Name', 'trim|required|callback_check_edit_medicine_name_in_master');
                    $this->form_validation->set_rules('no_of_tablets', 'NO Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                    $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
                    if($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    }
                    else  {
                        $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['name_hn'] = $this->google_translate($ddata['name']);
                        $ddata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : '';
                        $ddata['company_name_hn'] = $this->google_translate($ddata['company_name']);
                        $ddata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : '';
                        $ddata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : '';
                        $ddata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : '';
                        $ddata['generic_name_hn'] = $this->google_translate($ddata['generic_name']);
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_update("tbl_medicine", $ddata, array("id" => $id));
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Medicine added successfully
                            </div>');
                        redirect(base_url().'inventory'.'?inventory='.'medicines');
                        exit;   
                    }
                }
                $this->load->template('admin/inventory/medicine_edit', $data);
            } 
            else {
                redirect('login');
            }       
    }

    public function delete_medicine($id) {
            $data = array();
            $service = $this->Inventory_model->get_medicine_by_id($id);
        
            if($service) {
                $this->db->query("DELETE FROM `tbl_medicine` WHERE `id` = '" . $service['id'] . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Medicine deleted successfully
                              </div>');
                redirect(base_url().'inventory'.'?inventory='.'medicines');
                exit;
            }
    }

    public function add_pathologytest() {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Add";
            $data['action'] = "Add";
        
            if (isset($_REQUEST)){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_check_test_name');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $adata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']);
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $Id = $this->common_model->data_insert("tbl_test_pathology", $adata, TRUE);
                
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Test added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'pathology-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/pathology_test_add', $data);
    }

    public function edit_pathologytest($id) {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Edit";
            $data['action'] = "Edit";
            $data["test_records"]=$this->Inventory_model->get_pathology_test_by_id($id);
        
            if (isset($_REQUEST)){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_check_edit_test_name');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $adata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']);
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $this->common_model->data_update("tbl_test_pathology", $adata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Test added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'pathology-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/pathology_test_edit', $data);
    }

    public function delete_pathologytest($id) {
            $data = array();
            $service = $this->Inventory_model->get_pathology_test_by_id($id);
        
            if($service) {
                $this->db->query("DELETE FROM `tbl_test_pathology` WHERE `id` = '" . $service['id'] . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Test deleted successfully
                              </div>');
                redirect(base_url().'inventory'.'?inventory='.'pathology-test');
                exit;
            }
    }

    public function add_radiology_test() {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Add";
            $data['action'] = "Add";
        
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Service Name', 'trim|required|callback_check_radio_test_name');
                $this->form_validation->set_rules('description', ' Details', 'trim|required');
                //$this->form_validation->set_rules('category', ' Category', 'trim|required');
                //print_r($this->form_validation->run());die;
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $testId = '';
                    $adata['name'] = $this->input->post("name") ? $this->input->post("name") : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']); 
                    //$adata['category'] = $this->input->post("category") ? $this->input->post("category") : '';
                    //$adata['category_hn'] = $this->google_translate($adata['category']); 
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $Id = $this->common_model->data_insert("tbl_report_radiology", $adata, TRUE);
               
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Service added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'radiology-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/radio_test_add', $data);
    }

    public function edit_radiologytest($id) {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Edit";
            $data['action'] = "Edit";
            $data["test_records"]=$this->Inventory_model->get_radiology_test_by_id($id);
        
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Service Name', 'trim|required');
                $this->form_validation->set_rules('description', ' Details', 'trim|required');
                //$this->form_validation->set_rules('category', ' Category', 'trim|required');
                //print_r($this->form_validation->run());die;
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $testId = '';
                    $adata['name'] = $this->input->post("name") ? $this->input->post("name") : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']); 
                    //$adata['category'] = $this->input->post("category") ? $this->input->post("category") : '';
                    //$adata['category_hn'] = $this->google_translate($adata['category']); 
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $this->common_model->data_update("tbl_report_radiology", $adata, array("id" => $id));
                
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Service added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'radiology-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/radio_test_edit', $data);
    }

    public function delete_radiologytest($id) {
            $data = array();
            $service = $this->Inventory_model->get_radiology_test_by_id($id);
        
            if($service) {
                $this->db->query("DELETE FROM `tbl_report_radiology` WHERE `id` = '" . $service['id'] . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Test deleted successfully
                              </div>');
                redirect(base_url().'inventory'.'?inventory='.'radiology-test');
                exit;
            }
    }

    public function add_provisionaltest() {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Add";
            $data['action'] = "Add";
        
            if (isset($_REQUEST)){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_check_provisionaltest_name');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
            
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $adata['name'] = $this->input->post("name") ? $this->input->post("name") : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']);
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $Id = $this->common_model->data_insert("tbl_provisional_test", $adata, TRUE);
                
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Test added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'provisional-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/provisional_test_add', $data);
    }

    public function edit_provisionaltest($id) {
            $data = array();
            $data["error"] = "";
            $data['page_title'] = "Test Edit";
            $data['action'] = "Edit";
            $data["test_records"]=$this->Inventory_model->get_provisional_test_by_id($id);

            if (isset($_REQUEST)){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_check_edit_test_name');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {
                    $adata['name'] = $this->input->post("name") ?$this->input->post("name") : ''; 
                    $adata['name_hn'] = $this->google_translate($adata['name']); 
                    $adata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $adata['description_hn'] = $this->google_translate($adata['description']);
                    $adata['created_at'] = date('Y-m-d H:i:s');
                    $this->load->model('common_model');
                    $this->common_model->data_update("tbl_provisional_test", $adata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Test added successfully
                                </div>');
                    redirect(base_url().'inventory'.'?inventory='.'provisional-test');
                    exit;
                }
            }
            $this->load->template('admin/inventory/provisional_test_edit', $data);
    }

    public function delete_provisionaltest($id) {
            $data = array();
            $service = $this->Inventory_model->get_provisional_test_by_id($id);
        
            if($service) {
                $this->db->query("DELETE FROM `tbl_provisional_test` WHERE `id` = '" . $service['id'] . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Test deleted successfully
                              </div>');
                redirect(base_url().'inventory'.'?inventory='.'provisional-test');
                exit;
            }
    }
   
    
    public function importdata() { 
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $path = $this->config->item("inventory_path");
            $config['upload_path'] = './uploads/inventory/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            $batch_cnt = 50;
            $file = '';
            $z = '';
            $tot_csv_rec_cnt = 0;

            $returnpath = $this->config->item('inventory_path_uploaded_path');
            log_message('debug',print_r($_POST,true));
            log_message('debug',print_r($_FILES,true));
            if(isset($_FILES["file"]) && !empty($_FILES["file"]['tmp_name'])) {
                $filename = $this->file_upload($_FILES["file"],$path);
                $file = $returnpath.$filename;
            }
            else if(isset($_POST['fl_nm']) && ($_POST['fl_nm']!='')) {
                $filename = $_POST['fl_nm'];
                $file = $filename;
            }
                       
            $handle = fopen($file, "r");
            $c = 0;
            
            $str_frm ='';
            $str_imp_type = '';
            if($this->input->post('type') == 'pharmacy') {
                $str_imp_type = 'pharmacy';
            }
            if($this->input->post('type') == 'pathology') {
                $str_imp_type = 'pathology';
            }
            if($this->input->post('type') == 'radiology') {
                $str_imp_type = 'radiology';
            }
            if($this->input->post('type') == 'provisional') {
                $str_imp_type = 'provisional';
            }

            $str_frm = '<html><head><title>Import Data</title></head>
                    <body>
                    <form name="frm_import" id="frm_import" enctype="multipart/form-data" method="post" action="'.base_url("inventory/importdata").'">
                        <input type="hidden" name="Import1" value="import csv to database" />
                        <input type="hidden" name="fl_nm" id="fl_nm" value="'.$file.'" />
                        <input type="hidden" name="tot_csv_rec" id="tot_csv_rec" value="0" />
                        <input type="hidden" name="row_num" id="row_num" value="0" />
                        <input type="hidden" name="type" id="type" value="'.$str_imp_type.'">
                    </form>';

                                            
            $b = 0;
            if(isset($_POST['row_num']) && ($_POST['row_num'] > 0)) {
                $row = $_POST['row_num'];
            }
            else {
                $row = 1;
            }
            
            if($this->input->post('type') == 'pharmacy') {
                $data_ss = array();
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                    $num = count($filesop);
                    /*for($cj=0; $cj < $num; $cj++) {
                        echo $filesop[$cj]."  ".time()."<br/>\n";
                    }*/

                    $data_ss[$tot_csv_rec_cnt] = $filesop;
                    $tot_csv_rec_cnt++;
                } 

                $str_v1 = $str_frm.'<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script type="text/javascript">
                        $("#tot_csv_rec").val("'.$tot_csv_rec_cnt.'");
                        alert($("#tot_csv_rec").val());
                    </script>';

                    $str_v2 = $str_v1."</body></html>";
                    echo $str_v2;

                /*echo "<br/>csv_data---<pre>";
                print_r($data_ss);
                exit; */

                for($op=0; $op<$tot_csv_rec_cnt; $op+=$batch_cnt) {
                    log_message('debug', "Function Calling----op---".$op);
                    $sw = (int) $op + 1;
                    if($sw < $tot_csv_rec_cnt){
                        $z=$this->import_csv_medicine($tot_csv_rec_cnt, $data_ss, $batch_cnt, $op);
                    }
                    else {
                        $redirect = 'medicines';
                        redirect(base_url().'inventory'.'?inventory='.$redirect);
                        exit;
                    }
                }
                
                log_message('debug', "Main Redirect"); 
                ?><script type="text/javascript">$("#frm_import").submit();</script><?php
            }
        
            //exit;
            /*if($this->input->post('type') == 'pharmacy'){
                $redirect = 'medicines';
            }
            else if($this->input->post('type') == 'pathology'){
                $redirect = 'pathology-test';
            }
            else if($this->input->post('type') == 'radiology'){
                $redirect = 'radiology-test';
            }
            else if($this->input->post('type') == 'provisional'){
                $redirect = 'provisional-test';
            }
            redirect(base_url().'inventory'.'?inventory='.$redirect);
            exit; */ 
    }

    public function import_csv_medicine($tot_rec_num, $data, $loop_counter, $loop_no) {
            $tot_batch = (int) $loop_counter + (int) $loop_no;

            log_message('debug', "In import_csv_medicine----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);

            for($j=$loop_no; $j<$tot_batch; $j++) {
                if($data[$j][0]!='' && $data[$j][1]!='' && $data[$j][2]!='' && $data[$j][3]!='') {

                    log_message('debug', "In import_csv_medicine----data--".print_r($data[$j]));

                    $check_medicine_exist = $this->Inventory_model->check_medicine_exist_or_not(strtolower($data[$j][0]), strtolower($data[$j][2]), strtolower($data[$j][03]),strtolower($data[$j][1]));

                    if($check_medicine_exist <= 0) {
                        $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
                        $sdata['generic_name'] = $data[$j][1]; 
                        $sdata['company_name'] = $data[$j][2];
                        $sdata['no_of_tablets'] = $data[$j][3]; 
                        $sdata['form_of_package'] = $data[$j][4];
                        //$sdata['generic_name_hn'] = $this->google_translate($sdata['generic_name']); 
                        //$sdata['name_hn']=$this->google_translate($sdata['name']);
                        //$sdata['company_name_hn'] = $this->google_translate($sdata['company_name']);  
                        $sdata['created_at'] = date('Y-m-d H:i:s');
                        $Id = $this->db->insert('tbl_medicine',$sdata);
                    }  
                }
            }
            return true;
            
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

    public function check_medicine_exist_or_not() {
            $name = strtolower($this->input->post("name"));
            $company_name = strtolower($this->input->post("company_name"));
            $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
            $generic_name = strtolower($this->input->post("generic_name"));
            //print_r($generic_name);die;
            if(!empty($name) & !empty($company_name)) {
                $check_medicine_exist = $this->Inventory_model->check_medicine_exist_or_not($name,$company_name,$no_of_tablets,$generic_name);
                //print_r($check_medicine_exist);die;
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }

    public function check_edit_medicine_exist_or_not() {
            $name = strtolower($this->input->post("name"));
            $company_name = strtolower($this->input->post("company_name"));
            $id = $this->input->post("id");
            $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
            $generic_name = strtolower($this->input->post("generic_name"));
            //print_r($generic_name);die;
            if(!empty($name) & !empty($company_name)) {
                $check_medicine_exist = $this->Inventory_model->check_edit_medicine_exist_or_not($name,$company_name,$id,$no_of_tablets,$generic_name);
                //print_r($check_medicine_exist);die;
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }
    
    public function check_medicine_name_in_master() {
            $this->db->select('*');
            $this->db->from('tbl_medicine');
            $this->db->where('name',strtolower($this->input->post('name')));
            $this->db->where('company_name',strtolower($this->input->post('company_name')));
            $this->db->where('generic_name',strtolower($this->input->post('generic_name')));
            $this->db->where('no_of_tablets',strtolower($this->input->post('no_of_tablets')));
            if($this->db->get()->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Medicine is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }

    public function check_edit_medicine_name_in_master() {
            $this->db->select('*');
            $this->db->from('tbl_medicine');
            $this->db->where('name',strtolower($this->input->post('name')));
            $this->db->where('company_name',strtolower($this->input->post('company_name')));
            $this->db->where('generic_name',strtolower($this->input->post('generic_name')));
            $this->db->where('no_of_tablets',strtolower($this->input->post('no_of_tablets')));
            $this->db->where('id !=',$this->input->post('medicineId'));
            if($this->db->get()->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Medicine is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }

    public function check_test_exist_or_not() {
            $name = strtolower($this->input->post("name"));
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_test_exist_or_not($name);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }

    public function check_edit_test_exist_or_not() {
            $name = strtolower($this->input->post("name"));
            $id = $this->input->post("id");
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_edit_test_exist_or_not($name,$id);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }

    public function check_provisional_test_exist_or_not() {
            $name = strtoupper($this->input->post("name"));
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_provisional_test_exist_or_not($name);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }

    public function check_provisional_edit_test_exist_or_not() {
            $name = strtoupper($this->input->post("name"));
            $id = $this->input->post("id");
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_edit_provisional_test_exist_or_not($name,$id);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }
   
    public function check_test_name() {
            $this->db->select('*');
            $this->db->where('name',strtolower($this->input->post('name')));
            if($this->db->get('tbl_test_pathology')->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }

    public function check_provisionaltest_name() {
            $this->db->select('*');
            $this->db->where('name',strtoupper($this->input->post('name')));
            if($this->db->get('tbl_provisional_test')->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }
    
    public function check_edit_test_name() {
            $this->db->select('*');
            $this->db->where('name',strtolower($this->input->post('name')));
            $this->db->where('id !=',$this->input->post('testId'));
            if($this->db->get('tbl_test_pathology')->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }

    public function check_radio_test_exist_or_not() {
            $name = strtoupper($this->input->post("name"));
            //$category = strtoupper($this->input->post("category"));
            //print_r($category);die;
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_radio_test_exist_or_not($name);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }

    public function check_radio_edit_test_exist_or_not() {
            $name = strtoupper($this->input->post("name"));
            //$category = strtoupper($this->input->post("category"));
            $id = strtoupper($this->input->post("id"));
            //print_r($category);die;
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_radio_edit_test_exist_or_not($name,$id);
                if($check_medicine_exist>0){
                    echo "false";
                    exit;
                } 
                else {
                    echo "true";
                    exit;
                }
            }
    }
    
    public function check_radio_test_name() {
            $this->db->select('*');
            $this->db->where('name',$this->input->post('name'));
            //$this->db->where('category',$this->input->post('category'));
            if($this->db->get('tbl_report_radiology')->num_rows() > 0){
                $this->form_validation->set_message(__FUNCTION__, 'Test is Already Exists');
                return false;
            }
            else {
                return true;
            }
    }

    public function google_translate($text) {
            $apiKey = 'AIzaSyAxUkgip_16Wwqo_lMI2TEjxP5oavzjgCA';
            $url = 'https://www.googleapis.com/language/translate/v2?key='.$apiKey.'&q=' . rawurlencode($text) .'&source=en&target=hi';
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);                 
            $responseDecoded = json_decode($response, true);
            curl_close($handle);
            if(isset($responseDecoded['error']['code'])) {
                if(($responseDecoded['error']['code'] == 400)){
                    return $text;
                }
            }
            else{
                return $responseDecoded['data']['translations'][0]['translatedText'];
            }
    }
}
?>