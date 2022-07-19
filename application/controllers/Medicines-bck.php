<?php
defined('BASEPATH') OR exit('No direct script access allowed');
set_time_limit(0);
date_default_timezone_set('Asia/Kolkata');

class Medicines extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_partnersession();
        $this->load->model('Medicine_model');
        $this->load->model('common_model');

    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Medicines List';
        
        $partner_id = $this->session->userdata('userid');
        
        if($partner_id >= 1){
            $data["medicines"] = $this->Medicine_model->get_medicines_list($_SESSION['userid']);
            $this->load->ptemplate('partner/medicines/medicine_list', $data);
        }else{
            redirect('partners/login');
        }
    }
    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Medicine Add";
        $data['action'] = "Add";
        
        $partner_id = $this->session->userdata('userid');
         
        if($partner_id >= 1){
            if (isset($_REQUEST)) {
                    //print_r($this->input->post('name'));die;
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');

                    $this->form_validation->set_rules('name', 'Medicine Name', 'trim|required|callback_check_medicine_name_store_wise');
                    //$this->form_validation->set_rules('name', 'Medicine Name', 'trim|required');
                    $this->form_validation->set_rules('mrp', 'Medicine MRP', 'trim|required');                   
                    $this->form_validation->set_rules('sale_price', 'Medicine Sale Price', 'trim|required');
                    $this->form_validation->set_rules('gst', 'GST', 'trim|required');
                    //$this->form_validation->set_rules('description', 'Medicine Details', 'trim|required');
                    $this->form_validation->set_rules('stock', 'Stock Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('no_of_tablets', 'NO Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('batch_no', 'Batch No', 'trim|required');
                    $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'trim|required');
                    //$this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                    $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {

                        $medicineId = '';
                        $sdata['name'] = $this->input->post("name") ? $this->input->post("name") : ''; 
                        $sdata['name']=iconv(mb_detect_encoding($sdata['name'], mb_detect_order(), true), "UTF-8",$sdata['name']);
                        $sdata['name'] = strtolower($sdata['name']);
                        $sdata['name_hn'] = null;
                        $sdata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : ''; 
                        $sdata['company_name'] = strtolower($sdata['company_name']);
                        $sdata['company_name_hn'] = null; 
                        $sdata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : ''; 
                        $sdata['generic_name'] = strtolower($sdata['generic_name']);
                        $sdata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : ''; 
                        $sdata['no_of_tablets'] = strtolower($sdata['no_of_tablets']);
                        $sdata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : ''; 
                        $sdata['form_of_package'] = strtolower($sdata['form_of_package']);
                        $sdata['created_at'] = date('Y-m-d H:i:s');
                        $this->db->select('*');
                        $this->db->from('tbl_medicine');
                        $this->db->where('LOWER(name)',$sdata['name']);
                        $this->db->where('LOWER(company_name)',$sdata['company_name']);
                        $this->db->where('LOWER(generic_name)',$sdata['generic_name']);
                        $this->db->where('LOWER(no_of_tablets)',$sdata['no_of_tablets']);
                        $medi=$this->db->get()->row_array();
                        if(isset($medi) && isset($medi['id']) && !empty($medi['id']))
                        {
                            $medicineId =  $medi['id'];
                        }
                        else
                        {
                            $Id = $this->common_model->data_insert("tbl_medicine", $sdata, TRUE);
                            $medicineId =  $Id;
                        }
                        // if($this->check_medicine_name() == 0)
                        // {

                        //     $sdata['name'] = $this->input->post("name") ? $this->input->post("name") : ''; 
                        //     $sdata['name']=iconv(mb_detect_encoding($sdata['name'], mb_detect_order(), true), "UTF-8",$sdata['name']);
                        //     $sdata['name'] = strtolower($sdata['name']);
                        //     $sdata['name_hn'] = null;
                        //     $sdata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : ''; 
                        //     $sdata['company_name'] = strtolower($sdata['company_name']);
                        //     $sdata['company_name_hn'] = null; 
                        //     $sdata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : ''; 
                        //     $sdata['generic_name'] = strtolower($sdata['generic_name']);
                        //     $sdata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : ''; 
                        //     $sdata['no_of_tablets'] = strtolower($sdata['no_of_tablets']);
                        //     $sdata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : ''; 
                        //     $sdata['form_of_package'] = strtolower($sdata['form_of_package']);
                        //     $sdata['created_at'] = date('Y-m-d H:i:s');
                        //     $Id = $this->common_model->data_insert("tbl_medicine", $sdata, TRUE);
                        //     $medicineId =  $Id;
                        // }else{
                            
                        //     $medicineId = $this->db->get_where('tbl_medicine',['name' => strtolower($this->input->post("name"))])->row()->id;
                        // }
                        
                        $this->db->select('*');
                        $this->db->from('tbl_medicine');
                        $this->db->where('id',$medicineId);
                        $MediData=$this->db->get()->row_array();

                        $ddata=array();
                        $ddata['partner_id'] = $_SESSION['userid'];
                        $ddata['medicine_id'] = $MediData['id'];
                        $ddata['name'] = $MediData['name'];
                        $ddata['name_hn'] = NULL;
                        $ddata['batch_no'] = $this->input->post("batch_no") ? $this->input->post("batch_no") : ''; 
                        $ddata['expiry_date'] = $this->input->post("expiry_date") ? $this->input->post("expiry_date") : ''; 

                        $ddata['gst'] = $this->input->post("gst_amt") ? $this->input->post("gst_amt") : ''; 
                        $ddata['gst_per'] = $this->input->post("gst") ? $this->input->post("gst") : ''; 
                        $ddata['mrp'] = $this->input->post("mrp") ? $this->input->post("mrp") : '';
                        $ddata['sale_price'] = $this->input->post("sale_price") ? $this->input->post("sale_price") : '';
                        $ddata['discount'] = $this->input->post("discount") ? $this->input->post("discount") : '';
                        $ddata['discount_per'] = $this->input->post("discount_per") ? $this->input->post("discount_per") : '';
                        $ddata['total'] = $this->input->post("total") ? $this->input->post("total") : '';
                        $ddata['stock'] = $this->input->post("stock") ? $this->input->post("stock") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        $ddata['is_homesample'] = $this->db->get_where('tbl_partners',["id" => $_SESSION['userid']])->row_array()['is_homesample'];
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_store_wise_medicines", $ddata, TRUE);

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Medicine added successfully
                                        </div>');
                        redirect("medicines");
                        exit;
                    }
                }
                $this->load->ptemplate('partner/medicines/medicine_add', $data);
        }else{
            redirect('partners/login');
        } 
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Medicine Edit";
        $data['action'] = "Edit";
        $partner_id = $this->session->userdata('userid');
        $data["medicine_records"] = $this->Medicine_model->get_medicine_list_by_id($id,$partner_id);
        
        $data["medicine_record_id"] = $id;
        
        if($partner_id >= 1) {
            if (isset($_REQUEST)) {
                    $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');                   
                    $this->form_validation->set_rules('name', 'Medicine Name', 'trim|required|callback_check_edit_medicine_name_store_wise');
                    $this->form_validation->set_rules('gst', 'GST', 'trim|required');                   
                    $this->form_validation->set_rules('mrp', 'Medicine MRP', 'trim|required');                   
                    $this->form_validation->set_rules('sale_price', 'Medicine Sale Price', 'trim|required');
                    //$this->form_validation->set_rules('description', 'Medicine Details', 'trim|required');
                    $this->form_validation->set_rules('stock', 'Stock Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('no_of_tablets', 'No Of Tablets', 'trim|required');
                    $this->form_validation->set_rules('batch_no', 'Batch No', 'trim|required');
                    $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'trim|required');
                    //$this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                    $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {

                    $medicineId = '';
                    //print_r($this->input->post("company_name"));die;
                    // print_r($this->check_medicine_name());die;
                    // if($this->check_medicine_name() == 0)
                    // {
                    //    $sdata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : ''; 
                    //    $sdata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : '';
                    //     $sdata['name_hn'] = $this->google_translate($sdata['name']); 
                    //     $sdata['company_name_hn'] = $this->google_translate($sdata['company_name']);  
                    //     $sdata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : ''; 
                    //     $sdata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : ''; 
                    //     $sdata['generic_name_hn'] = $this->google_translate($sdata['generic_name']); 
                         
                    //     $sdata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : ''; 
                        
                    //     $sdata['created_at'] = date('Y-m-d H:i:s');
                    //     $Id = $this->common_model->data_insert("tbl_medicine", $sdata, TRUE);
                    //     $medicineId =  $Id;
                    // }else{
                        
                    //     $medicineId = $this->db->get_where('tbl_medicine',['name' => strtolower($this->input->post("name"))])->row()->id;
                    // }
                    $ddata=array();
                    //print_r($_FILES["file"]);die;
                    // if ($_FILES["file"]["size"] > 0) 
                    //     {
                    //         $config['upload_path'] = './uploads/medicine/';
                    //         $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                    //         $this->upload->initialize($config);
                    //         $this->load->library('upload', $config);
                    //         $temp = explode(".", $_FILES["file"]["name"]);
                    //         $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                    //         $uploadpath = $this->config->item('medicine_images_path');
                    //         $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                    //         $ddata['image'] = $file_name;   
                    //     }
                        //print_r($ddata['image'] );die;
                        //print_r($medicineId);die;
                        //$ddata['partner_id'] = $_SESSION['userid'];
                        //$ddata['medicine_id'] = $medicineId;
                        //$ddata['name'] = $this->input->post("name") ? strtolower($this->input->post("name")) : '';
                        //$ddata['name_hn'] = $this->google_translate($ddata['name']); 
                        
                        $ddata['mrp'] = $this->input->post("mrp") ? $this->input->post("mrp") : '';
                        $ddata['sale_price'] = $this->input->post("sale_price") ? $this->input->post("sale_price") : '';
                        $ddata['gst'] = $this->input->post("gst_amt") ? $this->input->post("gst_amt") : ''; 
                        $ddata['gst_per'] = $this->input->post("gst") ? $this->input->post("gst") : ''; 
                        $ddata['discount'] = $this->input->post("discount") ? $this->input->post("discount") : '';
                        $ddata['discount_per'] = $this->input->post("discount_per") ? $this->input->post("discount_per") : '';
                        $ddata['stock'] = $this->input->post("stock") ? $this->input->post("stock") : '';
                        $ddata['total'] = $this->input->post("total") ? $this->input->post("total") : '';
                        $ddata['batch_no'] = $this->input->post("batch_no") ? $this->input->post("batch_no") : '';
                        $ddata['expiry_date'] = $this->input->post("expiry_date") ? $this->input->post("expiry_date") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');

                    $this->common_model->data_update("tbl_store_wise_medicines", $ddata, array("id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Medicine Updated successfully
                                    </div>');
                    redirect("medicines");
                    exit;
                }
            }
            $this->load->ptemplate('partner/medicines/medicine_edit', $data);
        } else {
            redirect('partners/login');
        }       
    }
    public function csv_structure_download($type)
    {
        if($type=='1' || $type==1)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array(
                "NAME OF MEDICINE",
                "GENERIC NAME",
                "MANUFACTURER",
                "QUANTITY PER PACK",
                "FORM OF PACKAGE",
                "EXPIRAY DATE",
                "BATCH NO",
                "STOCK",
                "AMOUNT",
                "GST (%)",
                "DISCOUNT  (%)",
                "TAXABLE AMOUNT"
            );
            $importsample=array();
            $importsample1=array(
                'Ascoril D Plus Syrup Sugar Free',
                'Phenylephrine (5mg) + Chlorpheniramine Maleate (2mg) + Dextromethorphan Hydrobromide (10mg)',
                'Glenmark Pharmaceuticals Ltd',
                'bottle of 100 ml',
                'tablets',
                '23-11-2023',
                '1',
                '10',
                '15',
                '12',
                '10',
                '15'
            );
            $importsample2=array(
            'Augmentin 625 Duo Tablet',
            'Amoxycillin (500mg) + Clavulanic Acid (125mg)',
            'Glaxo SmithKline Pharmaceuticals Ltd',
            'strip of 10 tablets',
            'tablets',
            '24-11-2023',
            '2',
            '11',
            '16',
            '12',
            '10',
            '16',
            );
            array_push($export_arr, $title);
            array_push($export_arr, $importsample1);
            array_push($export_arr, $importsample2);
            $data1 = convert_to_csv($export_arr, 'Medicines-' . date('F d Y') . '.csv', ',');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1) {
            $data = array();
            $medicine = $this->Medicine_model->get_medicine_list_by_id($id,$_SESSION['userid']);
            if ($medicine) {
                $this->db->query("DELETE FROM `tbl_store_wise_medicines` WHERE `id` = '" . $medicine->id . "' AND `partner_id` = '" .$medicine->partner_id. "'");
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
    public function alldelete()
    {
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1) {
            $data = array();
            
            $this->db->query("DELETE FROM `tbl_store_wise_medicines` WHERE  `partner_id` = '" .$partner_id. "'");
            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Medicine deleted successfully
                          </div>');
            redirect("medicines");
            exit;
           
        } else {
            redirect('partners/login');
        }
    }
    public function importdata()
    {
        $partner_id = $this->session->userdata('userid');
        if($partner_id > 0)
        {
            if(isset($_REQUEST['records']) && !empty($_REQUEST['records']))
            {
                foreach($_REQUEST['records'] as $row)
                {
                    $sdata=array();
                    $sdata['name']=iconv(mb_detect_encoding($row['NAME OF MEDICINE'], mb_detect_order(), true), "UTF-8",$row['NAME OF MEDICINE']);
                    $sdata['name']=strtolower($sdata['name']); 
                    $sdata['generic_name'] = strtolower($row['GENERIC NAME']); 
                    $sdata['company_name'] = strtolower($row['MANUFACTURER']);
                    $sdata['no_of_tablets'] = strtolower($row['QUANTITY PER PACK']);
                    $sdata['form_of_package'] = strtolower($row['FORM OF PACKAGE']);
                    $sdata['created_at'] = date('Y-m-d H:i:s');
                    
                    $this->db->select('id');
                    $this->db->from('tbl_medicine');
                    $this->db->where('LOWER(`name`)',$sdata['name']);
                    $this->db->where('LOWER(`company_name`)',$sdata['company_name']);
                    $this->db->where('LOWER(`no_of_tablets`)',$sdata['no_of_tablets']);
                    $this->db->where('LOWER(`generic_name`)',$sdata['generic_name']);
                    $checkdata=$this->db->get()->row_array();
                    if(isset($checkdata['id']) && !empty($checkdata['id']))
                    {
                        $medicineId=$checkdata['id'];
                    }
                    else
                    {
                        $Id = $this->common_model->data_insert("tbl_medicine",$sdata, TRUE);
                        $medicineId =  $Id;
                    }

                    $ddata['partner_id'] = $_SESSION['userid'];
                    $ddata['medicine_id'] = $medicineId;
                    $ddata['name']=$sdata['name'];
                    $sdata['expiray_date'] = $row['EXPIRAY DATE'];
                    $sdata['batch_no'] = $row['BATCH NO'];
                    $ddata['stock'] = $row['STOCK'];
                    $ddata['mrp'] = $row['AMOUNT'];
                    $ddata['gst_per'] = $row['GST (%)'];
                    
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

                    $ddata['discount_per'] = $row['DISCOUNT  (%)'];

                    if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount_per']))
                    {
                        $ddata['discount'] = number_format(($ddata['sale_price'] * $ddata['discount_per'] / 100), 2, '.', '');
                    }
                    else
                    {
                        $ddata['discount'] = 0;
                    }

                    if (is_numeric($ddata['sale_price']) && is_numeric($ddata['discount']))
                    {
                        $ddata['total'] = $ddata['sale_price'] - $ddata['discount'];
                    }
                    else
                    {
                        $ddata['total'] = 0;
                    }
                    
                    $ddata['status'] = '1';
                    
                    $this->db->select('id,medicine_id');
                    $this->db->from('tbl_store_wise_medicines');
                    $this->db->where('medicine_id',$medicineId);
                    $this->db->where('partner_id',$ddata['partner_id']);
                    $checkdata=$this->db->get()->row_array();
                    if(isset($checkdata) && !empty($checkdata) && !empty($checkdata['id']))
                    {
                        @unlink($ddata['partner_id']);
                        $ddata['updated_at']=date('Y-m-d H:i:s');
                        $this->db->update('tbl_store_wise_medicines',$ddata,array('id'=>$checkdata['id']));
                    }
                    else
                    {
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->db->insert('tbl_store_wise_medicines',$ddata);
                    }
                }
            }
        }
    }
    public function importdata_OLD()
    { 
        set_time_limit(0);
        $partner_id = $this->session->userdata('userid');
        if($partner_id >= 1)
        {
            $path = $this->config->item("inventory_path");
            $config['upload_path'] = './uploads/inventory/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            //$filename = $this->file_upload($_FILES["file"],$path);
            //$returnpath = $this->config->item('inventory_path_uploaded_path');

            //$file   = $returnpath.$filename;
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $c = 0;
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                echo "<pre>";
                print_r($filesop);
                $medicineId = '';
                if($c<>0){
                    //print_r($filesop);die;
                if($filesop[0] != '') {
                    
                    $check_medicine_exist = $this->Medicine_model->check_medicine_exist_name(strtolower($filesop[0]),strtolower($filesop[2]),strtolower($filesop[3]),strtolower($filesop[1]));
                    
                    if($check_medicine_exist == 0){
                        
                        $sdata['name'] = iconv(mb_detect_encoding($filesop[0], mb_detect_order(), true), "UTF-8",$filesop[0]); 
                        $sdata['generic_name'] = $filesop[1]; 
                        $sdata['company_name'] = $filesop[2]; 
                        $sdata['no_of_tablets'] = $filesop[3]; 
                        $sdata['form_of_package'] = $filesop[4];
                        $sdata['created_at'] = date('Y-m-d H:i:s');
                        $sdata['name_hn'] = $this->google_translate($sdata['name']);
                        $sdata['company_name_hn'] = $this->google_translate($sdata['company_name']); 
                        $Id = $this->common_model->data_insert("tbl_medicine",$sdata, TRUE);
                        $medicineId =  $Id;
                          
                        } else {
                             
                          $medicineId = $this->db->get_where('tbl_medicine',['name' => strtolower($filesop[0]),'no_of_tablets' => strtolower($filesop[3]),'generic_name' => strtolower($filesop[1]),'company_name' => strtolower($filesop[2])])->row()->id;   
                        }
                    }
                }
                
                $ddata['partner_id'] = $_SESSION['userid'];
                $ddata['medicine_id'] = $medicineId;
                $ddata['name'] = iconv(mb_detect_encoding($filesop[0], mb_detect_order(), true), "UTF-8",$filesop[0]);
                $sdata['expiray_date'] = $filesop[5]; 
                $sdata['batch_no'] = $filesop[6]; 
                $ddata['mrp'] = $filesop[7];
                $ddata['gst_per'] = $filesop[8];

                if (is_numeric($ddata['mrp']) && is_numeric($ddata['gst_per'])) {
                    $ddata['gst'] = number_format(($ddata['mrp'] * $ddata['gst_per'] / 100), 2, '.', '');
                    $ddata['sale_price'] = $ddata['mrp'] + $ddata['gst'];
                }else{
                    $ddata['gst'] = 0;
                    $ddata['sale_price'] = 0;
                }
                $ddata['discount_per'] = $filesop[9];

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
                $ddata['stock'] = $filesop[10];
                $ddata['status'] = '1';
                $ddata['created_at'] = date('Y-m-d H:i:s');
                
                if($c<>0){                  /* SKIP THE FIRST ROW */
                    if(!empty($filesop[0]) & !empty($filesop[1])) {

                    $check_medicine_exist = $this->Medicine_model->check_medicine_exist_or_not(strtolower($filesop[0]),$_SESSION['userid'],strtolower($filesop[2]),strtolower($filesop[3]),strtolower($filesop[1]));
                        //print_r($check_medicine_exist);die;
                        if($check_medicine_exist <= 0){
                        $ddata['name_hn'] = $this->google_translate($ddata['name']);
                        
                        //$ddata['details_hn'] = $this->google_translate($ddata['details']);
                        //print_r($medicineId);die;
                        if($medicineId > 0)
                        {
                            $this->common_model->data_insert("tbl_store_wise_medicines", $ddata, TRUE);    
                        }
                        else{
                            redirect("medicines");
                            exit;
                        }
                        } 
                    }
                }
                $c = $c + 1;
            }
            redirect("medicines");
            exit;   
        }
    }
        
    public function check_medicine_exist_or_not()
    {
        $name = strtolower($this->input->post("name"));
        $name= iconv(mb_detect_encoding($name, mb_detect_order(), true), "UTF-8",$name );
        $company_name = strtolower($this->input->post("company_name"));
        $company_name= iconv(mb_detect_encoding($company_name, mb_detect_order(), true), "UTF-8",$company_name );
        $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
        $no_of_tablets= iconv(mb_detect_encoding($no_of_tablets, mb_detect_order(), true), "UTF-8",$no_of_tablets );
        $generic_name = strtolower($this->input->post("generic_name"));
        $generic_name= iconv(mb_detect_encoding($generic_name, mb_detect_order(), true), "UTF-8",$generic_name );
        if(!empty($name) && !empty($company_name)) {
            $check_medicine_exist = $this->Medicine_model->check_medicine_exist_or_not($name,$_SESSION['userid'],$company_name,$no_of_tablets,$generic_name);
            
            $this->db->select('*');
            $this->db->from('tbl_store_wise_medicines');
            $this->db->join('tbl_medicine','tbl_medicine.id=tbl_store_wise_medicines.medicine_id','left');
            $this->db->where('tbl_store_wise_medicines.partner_id',$_SESSION['userid']);
            $this->db->where('LOWER(tbl_medicine.name)',$name);
            if(!empty($company_name))
            {
                $this->db->where('LOWER(tbl_medicine.company_name)',$company_name);
            }
            if(!empty($generic_name))
            {
                $this->db->where('LOWER(tbl_medicine.generic_name)',$generic_name);
            }
            $check_medicine_exist=$this->db->get()->num_rows();
            // echo $this->db->last_query();
            // exit;
            //print_r($check_medicine_exist);die;
            if($check_medicine_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_medicine_name()
    {
        
        $name = strtolower($this->input->post("name"));
        $company_name = strtolower($this->input->post("company_name"));
        $generic_name = strtolower($this->input->post("generic_name"));
        $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
        if(!empty($name)) {
            $check_medicine_exist = $this->Medicine_model->check_medicine_exist_name($name,$company_name,$generic_name,$no_of_tablets);
            
            if($check_medicine_exist > 0){
                 return $check_medicine_exist;
                 
            } else {
                 return 0;
            }
        }
    }
    public function check_edit_medicine_exist_or_not()
    {
        $name = strtolower($this->input->post("name"));
        $id = $this->input->post("id");
        //print_r(1);die;
        if(!empty($name)) {
            $check_medicine_exist = $this->Medicine_model->check_edit_medicine_exist_or_not($name,$_SESSION['userid'],$id);
            //print_r($check_medicine_exist);die;
            if($check_medicine_exist > 0){
                 echo "false";
                
            } else {
                  echo "true";
                
            }
        }
    }

    public function check_medicine_name_store_wise()
    {
        $this->db->select('*');
        $this->db->from('tbl_store_wise_medicines');
        $this->db->where('tbl_store_wise_medicines.name',strtolower($this->input->post('name')));
        $this->db->where('company_name',strtolower($this->input->post('company_name')));
        $this->db->where('generic_name',strtolower($this->input->post('generic_name')));
        $this->db->where('no_of_tablets',strtolower($this->input->post('no_of_tablets')));
        $this->db->where('partner_id',$this->session->userdata('userid'));
        $this->db->join('tbl_medicine', 'tbl_medicine.id = tbl_store_wise_medicines.medicine_id');
        if($this->db->get()->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Medicine is Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    } 
    public function check_edit_medicine_name_store_wise()
    {
        
        $this->db->select('*');
        $this->db->from('tbl_store_wise_medicines');
        $this->db->where('tbl_store_wise_medicines.name',strtolower($this->input->post('name')));
        $this->db->where('company_name',strtolower($this->input->post('company_name')));
        $this->db->where('partner_id',$this->session->userdata('userid'));
        $this->db->where('generic_name',strtolower($this->input->post('generic_name')));
        $this->db->where('no_of_tablets',strtolower($this->input->post('no_of_tablets')));
        $this->db->where('tbl_store_wise_medicines.id !=',$this->input->post('medicineId'));
        $this->db->join('tbl_medicine', 'tbl_medicine.id = tbl_store_wise_medicines.medicine_id');
        if($this->db->get()->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Medicine is Already Exists');
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
            $this->form_validation->set_message(__FUNCTION__, 'SalePrice Must Lessthan of MRP');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function fetch_medicineList()
    {
       $responsedata = $this->Medicine_model->get_all_medicines_list_by_search($this->input->post('search'));

        $output = array(
                    
                    'MedicineList' => $responsedata
                );
        echo json_encode($output);    
    }
    public function fetch_medicinecompany()
    {
       $responsedata = $this->Medicine_model->get_company_by_medicine($this->input->post('medicineId'));
       //print_r($responsedata);die;
        $output = array(
                    'Name'          => $responsedata['UCASE(name)'],
                    'Company'       => $responsedata['company_name'],
                    'Tablets'       => $responsedata['no_of_tablets'],
                    'GenericName'  => $responsedata['generic_name'],
                    'Formofpackage' => $responsedata['form_of_package'],
                );
        echo json_encode($output);    
    }
    public function google_translate($text)
    {
        $apiKey = 'AIzaSyAxUkgip_16Wwqo_lMI2TEjxP5oavzjgCA';
        $url = 'https://www.googleapis.com/language/translate/v2?key='.$apiKey.'&q=' . rawurlencode($text) .'&source=en&target=hi';
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);                 
        $responseDecoded = json_decode($response, true);
        curl_close($handle);
        if(isset($responseDecoded['error']['code']))
        {
            if(($responseDecoded['error']['code'] == 400)){
                return $text;
            }
            
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

    public function show_all_medicines()
    {
        if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
        {
        $fetch_data = $this->Medicine_model->make_medicine_datatables($_SESSION['userid']);
       
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $edit_url = base_url() . 'medicines/edit/'.$row['id'];
            $delete_url = base_url() . 'medicines/delete/'.$row['id'];   
            $sub_array = array();
            $sub_array[] = $rowno;
            $sub_array[] = strtoupper($row['name']);
            $sub_array[] = strtoupper($row['company_name']);
            $sub_array[] = number_format((float)$row['mrp'], 2, '.', '');
            $sub_array[] = number_format((float)$row['sale_price'], 2, '.', '');
            $sub_array[] = number_format((float)$row['discount'], 2, '.', '');
            $sub_array[] = number_format((float)$row['gst'], 2, '.', '');
            $sub_array[] = number_format((float)$row['total'], 2, '.', '');
            $sub_array[] = $row['expiry_date'];
            $sub_array[] = $row['stock'];
            $sub_array[] = '<input type="checkbox" class="js-switch tgl_checkbox" data-status="status" data-table="tbl_store_wise_medicines" data-idfield="id" data-id="'.$row['id'].'" id=cb_'.$row['id'].'  '.(($row['status'] == "1") ? 'checked' : "").' >';
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string .= '<a href="javascript:void(0);" onclick="deletedata('.$row['id'].');" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';

            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;

        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Medicine_model->get_all_medicine_data(),
            "recordsFiltered" => $this->Medicine_model->get_medicine_filtered_data($_SESSION['userid']),
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