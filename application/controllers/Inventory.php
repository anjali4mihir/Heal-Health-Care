<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
error_reporting(0);
set_time_limit(0);
class Inventory extends CI_Controller {

    public function __construct() {
            parent::__construct();  
            $this->auth->check_session();
            //$this->load->library('csvimport');
            $this->load->model("Inventory_model");
            $this->load->model("Medicine_model");
            $this->load->model('common_model');
            $this->modules = json_decode($this->session->userdata('is_manage_modules'));
            ini_set('memory_limit', '-1');
    }

    public function index() {
        if(in_array('0',$this->modules) || in_array('6',$this->modules)){
            $data["title"] = 'Inventory List';
            $data['inventory_type'] = 'pharmacy';

            // delete all start
            if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All" && isset($_POST['inv_type']) && !empty($_POST['inv_type']) && $_POST['inv_type'] == "medicine" ) {
   
                if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                    $selectedIDs = implode(',',$_POST['chk_id']);
                  
                    $this->db->query("DELETE FROM `tbl_medicine` WHERE `id` IN ($selectedIDs)");

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                    redirect("inventory");
                    exit;
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                    redirect("inventory");
                    exit;
                }
            }
            // delete all end

            $data['medicines_list']=$this->Inventory_model->get_all_medicine_data();
            $data['pathology_test_list']=$this->Inventory_model->get_all_pathology_data();
            $data['radiology_test_list']=$this->Inventory_model->get_all_radiology_data();
            $data['provisional_test_list']=$this->Inventory_model->get_all_provisional_data();
            $data['drug_medicines_list']=$this->Inventory_model->get_all_drug_medicine_data();
            
            $this->load->template('admin/inventory/inventory_list', $data);
        }else{
            $this->load->template("admin/not_access");
        }
    }

    public function drugmedicine() {
        if(in_array('0',$this->modules) || in_array('6',$this->modules)){
            $data["title"] = 'Inventory List';
            $data['inventory_type'] = 'drugmedicine';

            // delete all start
            if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All" && isset($_POST['inv_type']) && !empty($_POST['inv_type']) && $_POST['inv_type'] == "medicine" ) {
   
                if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                    $selectedIDs = implode(',',$_POST['chk_id']);
                  
                    $this->db->query("DELETE FROM `tbl_medicine` WHERE `id` IN ($selectedIDs)");

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                    redirect("inventory");
                    exit;
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                    redirect("inventory");
                    exit;
                }
            }
            // delete all end

            $data['medicines_list']=$this->Inventory_model->get_all_medicine_data();
            $data['pathology_test_list']=$this->Inventory_model->get_all_pathology_data();
            $data['radiology_test_list']=$this->Inventory_model->get_all_radiology_data();
            $data['provisional_test_list']=$this->Inventory_model->get_all_provisional_data();
            $data['drug_medicines_list']=$this->Inventory_model->get_all_drug_medicine_data();

            $this->load->template('admin/inventory/inventory_list', $data);
        }else{
            $this->load->template("admin/not_access");
        }
    }

    public function pathology()
    {
            $data["title"] = 'Inventory List';
            $data['inventory_type'] = 'pathology';

            // delete all start
            if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All" && isset($_POST['inv_type']) && !empty($_POST['inv_type']) && $_POST['inv_type'] == "pathology" ) {

                if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                    $selectedIDs = implode(',',$_POST['chk_id']);
                  
                    $this->db->query("DELETE FROM `tbl_test_pathology` WHERE `id` IN ($selectedIDs)");

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                    redirect("inventory/pathology");
                    exit;
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                    redirect("inventory/pathology");
                    exit;
                }
            }
            // delete all end

            $data['medicines_list']=$this->Inventory_model->get_all_medicine_data();
            $data['pathology_test_list']=$this->Inventory_model->get_all_pathology_data();
            $data['radiology_test_list']=$this->Inventory_model->get_all_radiology_data();
            $data['provisional_test_list']=$this->Inventory_model->get_all_provisional_data();
            $data['drug_medicines_list']=$this->Inventory_model->get_all_drug_medicine_data();
            $this->load->template('admin/inventory/inventory_list', $data);
    }

    public function radiology()
    {
            $data["title"] = 'Inventory List';
            $data['inventory_type'] = 'radiology';

            // delete all start
            if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All" && isset($_POST['inv_type']) && !empty($_POST['inv_type']) && $_POST['inv_type'] == "radiology" ) {

                if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                    $selectedIDs = implode(',',$_POST['chk_id']);
                  
                    $this->db->query("DELETE FROM `tbl_report_radiology` WHERE `id` IN ($selectedIDs)");

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                    redirect("inventory/radiology");
                    exit;
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                    redirect("inventory/radiology");
                    exit;
                }
            }
            // delete all end

            $data['medicines_list']=$this->Inventory_model->get_all_medicine_data();
            $data['pathology_test_list']=$this->Inventory_model->get_all_pathology_data();
            $data['radiology_test_list']=$this->Inventory_model->get_all_radiology_data();
            $data['provisional_test_list']=$this->Inventory_model->get_all_provisional_data();
            $data['drug_medicines_list']=$this->Inventory_model->get_all_drug_medicine_data();
            $this->load->template('admin/inventory/inventory_list', $data);
    }

    public function provisional()
    {
            $data["title"] = 'Inventory List';
            $data['inventory_type'] = 'provisional';

            // delete all start
            if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All" && isset($_POST['inv_type']) && !empty($_POST['inv_type']) && $_POST['inv_type'] == "provisional" ) {

                if(isset($_POST['chk_id']) && !empty($_POST['chk_id']) && count($_POST['chk_id'])>0) {
                    $selectedIDs = implode(',',$_POST['chk_id']);
                  
                    $this->db->query("DELETE FROM `tbl_provisional_test` WHERE `id` IN ($selectedIDs)");

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                    redirect("inventory/provisional");
                    exit;
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                    redirect("inventory/provisional");
                    exit;
                }
            }
            // delete all end

            $data['medicines_list']=$this->Inventory_model->get_all_medicine_data();
            $data['pathology_test_list']=$this->Inventory_model->get_all_pathology_data();
            $data['radiology_test_list']=$this->Inventory_model->get_all_radiology_data();
            $data['provisional_test_list']=$this->Inventory_model->get_all_provisional_data();
            $data['drug_medicines_list']=$this->Inventory_model->get_all_drug_medicine_data();
            $this->load->template('admin/inventory/inventory_list', $data);
    }

    public function inventory_medicines()
    {
        ini_set('memory_limit', '-1');
        $fetch_data = $this->Inventory_model->make_medicine_datatables();
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = strtoupper($row['name']);
            $sub_array[] = strtoupper($row['generic_name']);
            $sub_array[] = strtoupper($row['company_name']);
            $sub_array[] = strtoupper($row['no_of_tablets']);
            $sub_array[] = strtoupper($row['form_of_package']);
            
            $edit_url = base_url() . 'inventory/edit_medicine/' . $row['id'];
            $delete_url = base_url() . 'inventory/delete_medicine/' . $row['id'];
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string .= '<a href="'.$delete_url.'" onclick="confirm_delete('.$delete_url.')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';
            /*$action_string .= '<a href="javascript:void(0);" onclick="deletedata('.$row['id'].');" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';*/
            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Inventory_model->get_all_medicine_data(),
            "recordsFiltered" => $this->Inventory_model->get_medicine_filtered_data(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function inventory_drug_medicines()
    {
        ini_set('memory_limit', '-1');
        $fetch_data = $this->Inventory_model->make_drug_medicine_datatables();
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = strtoupper($row['name']);
            $sub_array[] = strtoupper($row['generic_name']);
            $sub_array[] = strtoupper($row['company_name']);
            $sub_array[] = strtoupper($row['no_of_tablets']);
            $sub_array[] = strtoupper($row['form_of_package']);
            
            // $edit_url = base_url() . 'inventory/edit_medicine/' . $row['id'];
            $delete_url = base_url() . 'inventory/delete_drug_medicine/' . $row['id'];
            // $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string = "";
            $action_string .= '<a href="'.$delete_url.'" onclick="confirm_delete('.$delete_url.')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';
            /*$action_string .= '<a href="javascript:void(0);" onclick="deletedata('.$row['id'].');" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';*/
            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Inventory_model->get_all_drug_medicine_data(),
            "recordsFiltered" => $this->Inventory_model->get_drug_medicine_filtered_data(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function inventory_pathology()
    {
        $fetch_data = $this->Inventory_model->make_pathology_datatables();
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = $row['name'];
            $edit_url = base_url() . 'inventory/edit_pathologytest/' . $row['id'];
            $delete_url = base_url() . 'inventory/delete_pathologytest/' . $row['id'];
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string .= '<a href="'.$delete_url.'" onclick="confirm_delete('.$delete_url.')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';
            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Inventory_model->get_all_pathology_data(),
            "recordsFiltered" => $this->Inventory_model->get_pathology_filtered_data(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function inventory_radiology()
    {
        $fetch_data = $this->Inventory_model->make_radiology_datatables();
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = $row['name'];
            $edit_url = base_url() . 'inventory/edit_radiologytest/' . $row['id'];
            $delete_url = base_url() . 'inventory/delete_radiologytest/' . $row['id'];
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
            $action_string .= '<a href="'.$delete_url.'" onclick="confirm_delete('.$delete_url.')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';
            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Inventory_model->get_all_radiology_data(),
            "recordsFiltered" => $this->Inventory_model->get_radiology_filtered_data(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function inventory_provisional()
    {
        $fetch_data = $this->Inventory_model->make_provisional_datatables();
        $rowno = 1;
        if ($this->input->post('start')) {
            $rowno = $this->input->post('start') + 1;
        }
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = '<input name="chk_id[]" type="checkbox" class="custBox" value='.$row['id'].'>';
            $sub_array[] = $rowno;
            $sub_array[] = $row['name'];
            $sub_array[] = $row['description'];
            $edit_url = base_url() . 'inventory/edit_provisionaltest/' . $row['id'];
            $delete_url = base_url() . 'inventory/delete_provisionaltest/' . $row['id'];
            $action_string = '<a href="'.$edit_url.'" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>';
           $action_string .= '<a href="'.$delete_url.'" onclick="confirm_delete('.$delete_url.')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>';
            $sub_array[] = $action_string;
            $data[] = $sub_array;
            $rowno++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Inventory_model->get_all_provisional_data(),
            "recordsFiltered" => $this->Inventory_model->get_provisional_filtered_data(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function add_drug_medicine(){
        $data = array();
        $data["error"] = "";
        $data["pageTitle"] = "Admin Medicine";
        $data['admin'] = "Admin";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Drug Medicine Add";
        $data['action'] = "Add";
        $admin_id = $this->session->userdata('admin_id');
        $role = $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');                
                $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
                $this->form_validation->set_rules('name', 'Medicine Name', 'trim|required');
                $this->form_validation->set_rules('no_of_tablets', 'NO Of Tablets', 'trim|required');
                //$this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
            
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } 
                else {

                    $id = $this->input->post('MedicineCode') ?  $this->input->post('MedicineCode') : NULL;

                    if(isset($id) && !empty($id)) {
                        $ddata['is_medicine_drug'] = '2';
                        $this->common_model->data_update("tbl_medicine", $ddata, array("id" => $id));
                    }
                   ;
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success ! </strong>Drug Medicine added successfully
                        </div>');
                    redirect(base_url().'inventory/drugmedicine');
                    exit;
                }
            }

            $data['medicine_lists'] = $this->Inventory_model->get_all_medicine_list();

            $this->load->template('admin/inventory/drug_medicine_add', $data);
        } else {
            redirect('login');
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
                    //$this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
                    $this->form_validation->set_rules('generic_name', 'Generic Name', 'trim|required');
                
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } 
                    else {
                        $ddata=array();
                    
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['name']=strtolower($ddata['name']);
                        $ddata['name_hn'] = NULL;
                        $ddata['company_name'] = $this->input->post("company_name") ? $this->input->post("company_name") : '';
                        $ddata['company_name']=strtolower($ddata['company_name']);
                        $ddata['company_name_hn'] = NULL;
                        $ddata['no_of_tablets'] = $this->input->post("no_of_tablets") ? $this->input->post("no_of_tablets") : '';
                        $ddata['no_of_tablets']=strtolower($ddata['no_of_tablets']);
                        $ddata['form_of_package'] = $this->input->post("form_of_package") ? $this->input->post("form_of_package") : '';
                        $ddata['form_of_package']=strtolower($ddata['form_of_package']);
                        $ddata['generic_name'] = $this->input->post("generic_name") ? $this->input->post("generic_name") : '';
                        $ddata['generic_name']=strtolower($ddata['generic_name']);
                        $ddata['generic_name_hn'] = NULL;
                        $ddata['created_at'] = date('Y-m-d H:i:s');

                        $this->db->select('id');
                        $this->db->from('tbl_medicine');
                        $this->db->where('name',$ddata['name']);
                        $this->db->where('company_name',$ddata['company_name']);
                        $this->db->where('no_of_tablets',$ddata['no_of_tablets']);
                        $this->db->where('generic_name',$ddata['generic_name']);
                        $MediData=$this->db->get()->row_array();
                        if(!isset($MediData['id']) && empty($MediData['id']))
                        {
                            $this->common_model->data_insert("tbl_medicine", $ddata, TRUE);
                        }
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Medicine added successfully
                            </div>');
                        redirect(base_url().'inventory');
                        exit;
                    }
                }
                $this->load->template('admin/inventory/medicine_add', $data);
            } else {
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
                    //$this->form_validation->set_rules('form_of_package', 'Form of Package', 'trim|required');
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
                        redirect(base_url().'inventory');
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
                    redirect(base_url().'inventory');
                    exit;
            }
    }

     public function delete_drug_medicine($id) {
            $data = array();
            $service = $this->Inventory_model->get_medicine_by_id($id);

            if($service) {
                $ddata = array();
                $ddata['is_medicine_drug'] = '1';
                $this->common_model->data_update("tbl_medicine", $ddata, array("id" => $id));
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Drug Medicine deleted successfully</div>');
                    redirect(base_url().'inventory/drugmedicine');
                    exit;
            }
    }


    public function admin_delete_all_inventory1()
    {
        $type = $this->input->post('type');
        if($type=='1' || $type==1)
        {
            $this->db->query("DELETE FROM `tbl_medicine`");
        }
        if($type=='2' || $type==2)
        {
            $this->db->query("DELETE FROM `tbl_test_pathology`");
        }
        if($type=='3' || $type==3)
        {
            $this->db->query("DELETE FROM `tbl_report_radiology`");
        }
        if($type=='4' || $type==4)
        {
            $this->db->query("DELETE FROM `tbl_provisional_test`");
        }
        return "Deleted successfully";
    }

    public function admin_csv_structure_download1($type)
    {
        if($type=='1' || $type==1)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array("NAME OF MEDICINE", "GENERIC NAME", "MANUFACTURER", "QUANTITY PER PACK","FORM OF PACKAGE","EXPIRAY DATE","BATCH NO","TAXABLE AMOUNT","GST (%)","DISCOUNT  (%)","STOCK");
            $data = array_push($export_arr, $title);
            $data1 = convert_to_csv($export_arr, 'Medicines-' . date('F d Y') . '.csv', ',');
        }
        if($type=='2' || $type==2)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array("NAME OF TEST","DESCRIPTION","AMOUNT","GST (%)","DISCOUNT  (%)","TAXABLE AMOUNT");
            $data = array_push($export_arr, $title);
            $data1 = convert_to_csv($export_arr, 'Laboratory Tests' . date('F d Y') . '.csv', ',');
        }
        if($type=='3' || $type==3)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array("NAME OF TEST", "DESCRIPTION", "AMOUNT", "GST (%)", "DISCOUNT  (%)","TAXABLE AMOUNT");
            $data = array_push($export_arr, $title);
            $data1 = convert_to_csv($export_arr, 'Provisional Diagnosis' . date('F d Y') . '.csv', ',');
        }
        if($type=='4' || $type==4)
        {
            $this->load->helper('csv');
            $export_arr = array();
            $title = array("NAME OF TEST", "DESCRIPTION", "AMOUNT", "GST (%)", "DISCOUNT  (%)","TAXABLE AMOUNT");
            $data = array_push($export_arr, $title);
            $data1 = convert_to_csv($export_arr, 'Radio Diagnosis' . date('F d Y') . '.csv', ',');
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
                    redirect(base_url().'inventory/pathology');
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
                    redirect(base_url().'inventory/pathology');
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
                redirect(base_url().'inventory/pathology');
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
                    redirect(base_url().'inventory/radiology');
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
                    redirect(base_url().'inventory/radiology');
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
                redirect(base_url().'inventory/radiology');
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
                    redirect(base_url().'inventory/provisional');
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
                    redirect(base_url().'inventory/provisional');
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
                redirect(base_url().'inventory/provisional');
                    exit;
            }
    }
 
    public function import_medicine() {
            //$path = FCPATH . "uploads/";
            $path = $this->config->item("inventory_path");
            $config['upload_path'] = './uploads/inventory/';
            //$config['upload_path'] = $path;
            $config['allowed_types'] = 'csv';
            $config['max_size'] = 1024000;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
 
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect("users");
                //echo $error['error'];
            } 
            else {
                $file_data = $this->upload->data();
                $file_path = base_url() . "uploads/" . $file_data['file_name'];
                $csv_data = $this->mycsv->parse_file($file_path);
                //Add created and modified date if not include
                $date = date("Y-m-d H:i:s");
 
                if ($csv_data) {
                    foreach ($csv_data as $row) {
                        $insert_data[] = array(
                            'name' => iconv(mb_detect_encoding($row['NAME OF MEDICINE'],mb_detect_order(), true), "UTF-8",$row['NAME OF MEDICINE']),
                            'generic_name' => $row['GENERIC NAME'],
                            'company_name' => $row['MANUFACTURER'],
                            'no_of_tablets' => $row['QUANTITY PER PACK'],
                            'form_of_package' => $row['FORM OF PACKAGE'],
                            'generic_name_hn' => $this->google_translate($row['GENERIC NAME']),
                            'name_hn' => $this->google_translate($row['NAME OF MEDICINE']),
                            'company_name_hn' => $this->google_translate($row['MANUFACTURER']),
                            'is_medicine_drug' => '2',
                            'created_at' => $date,
                        );
                    }                   
                    $this->Inventory_model->insert_medicine($insert_data);
                    $this->session->set_flashdata('success', "Csv imported successfully");
                    //redirect("users");
                    $redirect = 'medicines';
                    redirect(base_url().'inventory'.'?inventory='.$redirect);
                    exit;
                } 
                else {
                    $data['error'] = "Error occured";
                    $this->session->set_flashdata('error', $data['error']);
                    $redirect = 'medicines';
                    redirect(base_url().'inventory'.'?inventory='.$redirect);
                    exit;
                }
            }
    }
    
    public function importdata() {
            // "<br/>Hello---"; exit; 
            set_time_limit(0);
            ini_set('max_execution_time', '0');
            $path = $this->config->item("inventory_path");
            $config['upload_path'] = './uploads/inventory/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            $batch_cnt = 500;
            $file = '';
            $z = '';
            $tot_csv_rec_cnt = 0;

            $returnpath = $this->config->item('inventory_path_uploaded_path');
            //log_message('debug',print_r($_POST,true));
            //log_message('debug',print_r($_FILES,true));
            if(isset($_FILES["file"]) && !empty($_FILES["file"]['tmp_name'])) {
                $filename = $this->file_upload($_FILES["file"],$path);
                $file = $returnpath.$filename;
            }
                                   
                       
            if($this->input->post('type') == 'pharmacy') { 
                $data_ss = array();
                $handle = fopen($file, "r"); 
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                    $num = count($filesop);
                    $data_ss[$tot_csv_rec_cnt] = $filesop;
                    $tot_csv_rec_cnt++;
                } 
                
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
            }
            else if($this->input->post('type') == 'pathology') { 
                $data_ss = array();
                $handle = fopen($file, "r"); 
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                    $num = count($filesop);
                    $data_ss[$tot_csv_rec_cnt] = $filesop;
                    $tot_csv_rec_cnt++;
                } 
                
                for($op=0; $op<$tot_csv_rec_cnt; $op+=$batch_cnt) {
                    log_message('debug', "Function Calling pathology ----op---".$op);
                    $sw = (int) $op + 1;
                    if($sw < $tot_csv_rec_cnt){
                        $z=$this->import_csv_pathology($tot_csv_rec_cnt, $data_ss, $batch_cnt, $op);
                    }
                    else {
                        $redirect = 'pathology-test';
                        redirect(base_url().'inventory'.'?inventory='.$redirect);
                        exit;
                    }
                }                
                log_message('debug', "Main Redirect");
            }
            else if($this->input->post('type') == 'radiology') { 
                $data_ss = array();
                $handle = fopen($file, "r"); 
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                    $num = count($filesop);
                    $data_ss[$tot_csv_rec_cnt] = $filesop;
                    $tot_csv_rec_cnt++;
                } 
                
                for($op=0; $op<$tot_csv_rec_cnt; $op+=$batch_cnt) {
                    log_message('debug', "Function Calling radiology ----op---".$op);
                    $sw = (int) $op + 1;
                    if($sw < $tot_csv_rec_cnt){
                        $z=$this->import_csv_radiology($tot_csv_rec_cnt, $data_ss, $batch_cnt, $op);
                    }
                    else {
                        $redirect = 'radiology-test';
                        redirect(base_url().'inventory'.'?inventory='.$redirect);
                        exit;
                    }
                }                
                log_message('debug', "Main Redirect");
            }
            else if($this->input->post('type') == 'provisional') { 
                $data_ss = array();
                $handle = fopen($file, "r"); 
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                    $num = count($filesop);
                    $data_ss[$tot_csv_rec_cnt] = $filesop;
                    $tot_csv_rec_cnt++;
                } 
                
                for($op=0; $op<$tot_csv_rec_cnt; $op+=$batch_cnt) {
                    log_message('debug', "Function Calling provisional ----op---".$op);
                    $sw = (int) $op + 1;
                    if($sw < $tot_csv_rec_cnt){
                        $z=$this->import_csv_provisional($tot_csv_rec_cnt, $data_ss, $batch_cnt, $op);
                    }
                    else {
                        $redirect = 'provisional-test';
                        redirect(base_url().'inventory'.'?inventory='.$redirect);
                        exit;
                    }
                }                
                log_message('debug', "Main Redirect");
            }    
    }

    // public function import_csv_medicine($tot_rec_num, $data, $loop_counter, $loop_no) {
    //         $tot_batch = (int) $loop_counter + (int) $loop_no;
    //         log_message('debug', "In import_csv_medicine----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);
    
    //         for($j=$loop_no; $j<$tot_batch; $j++) {
    //             if($j>0) {
    //                 if($data[$j][0]!='' && $data[$j][1]!='' && $data[$j][2]!='' && $data[$j][3]!='') {
    //                     //log_message('debug', "In import_csv_medicine----data--".print_r($data[$j]));
    //                     $check_medicine_exist = $this->Inventory_model->check_medicine_exist_or_not(strtolower($data[$j][0]), strtolower($data[$j][2]), strtolower($data[$j][03]),strtolower($data[$j][1]));
    //                     if($check_medicine_exist <= 0) {
    //                         $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
    //                         $sdata['generic_name'] = $data[$j][1]; 
    //                         $sdata['company_name'] = $data[$j][2];
    //                         $sdata['no_of_tablets'] = $data[$j][3]; 
    //                         $sdata['form_of_package'] = $data[$j][4];
    //                         $sdata['created_at'] = date('Y-m-d H:i:s');
    //                         $sdata['transate_state'] = '1';
    //                         $Id = $this->db->insert('tbl_medicine',$sdata);
    //                     }  
    //                 }
    //             }    
    //         }
    //         return true;
    // }

    public function import_csv_pathology($tot_rec_num, $data, $loop_counter, $loop_no) {
            $tot_batch = (int) $loop_counter + (int) $loop_no;
            log_message('debug', "In import_csv_pathology----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);

            for($j=$loop_no; $j<$tot_batch; $j++) {
                if($j>0) {
                    if($data[$j][0]!='') {
                        //log_message('debug', "In import_csv_pathology----data--".print_r($data[$j]));
                        $check_pathology_test_exist = $this->Inventory_model->check_test_exist_or_not(strtolower($data[$j][0]));
                        if($check_pathology_test_exist <= 0) {
                            $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
                            $sdata['description'] = $data[$j][1]; 
                            $sdata['name_hn'] = $sdata['name'];
                            $sdata['description_hn'] = $sdata['description'];
                            $sdata['created_at'] = date('Y-m-d H:i:s');
                            $sdata['transate_state'] = '1';
                            $Id = $this->db->insert('tbl_test_pathology', $sdata);
                        } 
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

    public function check_edit_test_exist_or_not_master() {
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

    public function check_radio_edit_test_exist_or_not_master() {
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

    // public function check_provisional_test_exist_or_not_master(){
    //     $name = strtolower($this->input->post("name"));
    //     $company_name = strtolower($this->input->post("company_name"));
    //     $id = $this->input->post("id");
    //     $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
    //     $generic_name = strtolower($this->input->post("generic_name"));
    //     //print_r($generic_name);die;
    //     if(!empty($name) & !empty($company_name)) {
    //         $check_medicine_exist = $this->Inventory_model->check_edit_medicine_exist_or_not($name,$company_name,$id,$no_of_tablets,$generic_name);
    //         //print_r($check_medicine_exist);die;
    //         if($check_medicine_exist>0){
    //             echo "false";
    //             exit;
    //         } 
    //         else {
    //             echo "true";
    //             exit;
    //         }
    //     }
    // }
    
    // public function check_provisional_edit_test_exist_or_not_master() {
    //     $name = strtolower($this->input->post("name"));
    //     $company_name = strtolower($this->input->post("company_name"));
    //     $id = $this->input->post("id");
    //     $no_of_tablets = strtolower($this->input->post("no_of_tablets"));
    //     $generic_name = strtolower($this->input->post("generic_name"));
    //     //print_r($generic_name);die;
    //     if(!empty($name) & !empty($company_name)) {
    //         $check_medicine_exist = $this->Inventory_model->check_edit_medicine_exist_or_not($name,$company_name,$id,$no_of_tablets,$generic_name);
    //         //print_r($check_medicine_exist);die;
    //         if($check_medicine_exist>0){
    //             echo "false";
    //             exit;
    //         } 
    //         else {
    //             echo "true";
    //             exit;
    //         }
    //     }
    // }
    

    
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

     public function check_pathology_test_exist_or_not_master() {
            $name = strtoupper($this->input->post("name"));
            //$category = strtoupper($this->input->post("category"));
            //print_r($category);die;
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_pathology_test_exist_or_not_master($name);
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

    public function check_edit_pathology_test_exist_or_not_master() {
            $name = strtoupper($this->input->post("name"));
            //$category = strtoupper($this->input->post("category"));
            $id = strtoupper($this->input->post("id"));
            //print_r($category);die;
            if(!empty($name)) {
                $check_medicine_exist = $this->Inventory_model->check_edit_pathology_test_exist_or_not_master($name,$id);
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
    public function ImportusingPapaparser()
    {
        $type=$this->input->get('type');
        if(empty($type))
        {
            $type="nothig";
        }
        if($type=="pharmacy")
        {

            if(isset($_REQUEST['records']) && !empty($_REQUEST['records']))
            {
                $final=array();
                foreach($_REQUEST['records'] as $row)
                {
                    //name
                    $data['name']=iconv(mb_detect_encoding($row['NAME OF MEDICINE'], mb_detect_order(), true), "UTF-8",$row['NAME OF MEDICINE']);
                    $data['name']=strtolower($data['name']); 
                    //generic_name
                    $data['generic_name']=iconv(mb_detect_encoding($row['GENERIC NAME'], mb_detect_order(), true), "UTF-8",$row['GENERIC NAME']);
                    $data['generic_name']=strtolower($data['generic_name']); 
                    
                    //company_name
                    $data['company_name']=iconv(mb_detect_encoding($row['MANUFACTURER'], mb_detect_order(), true), "UTF-8",$row['MANUFACTURER']);
                    $data['company_name']=strtolower($data['company_name']);

                    //no_of_tablets
                    $data['no_of_tablets']=iconv(mb_detect_encoding($row['QUANTITY PER PACK'], mb_detect_order(), true), "UTF-8",$row['QUANTITY PER PACK']);
                    $data['no_of_tablets']=strtolower($data['no_of_tablets']);

                    //form_of_package
                    $data['form_of_package']=iconv(mb_detect_encoding($row['FORM OF PACKAGE'], mb_detect_order(), true), "UTF-8",$row['FORM OF PACKAGE']);
                    $data['form_of_package']=strtolower($data['form_of_package']);
                    
                    $data['created_at']=date('Y-m-d H:i:s');
                    $data['transate_state'] = '1';
                    
                    $this->db->select('id');
                    $this->db->from('tbl_medicine');
                    $this->db->where('name',$data['name']);
                    $this->db->where('company_name',$data['company_name']);
                    $this->db->where('no_of_tablets',$data['no_of_tablets']);
                    $this->db->where('generic_name',$data['generic_name']);
                    $check_medicine_exist=$this->db->get()->row_array();
                    if(!isset($check_medicine_exist) && empty($check_medicine_exist) && empty($check_medicine_exist['id']))
                    {
                        $this->db->insert('tbl_medicine', $data); 
                    }
                    
                }
                echo json_encode(1);
            }
        }
        else if($type == 'pathology') { 
                    // echo "<pre>";
                    // print_r($_REQUEST['records']);
                    // exit;
                $final=array();
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
                    $this->db->from('tbl_test_pathology');
                    $this->db->where('name',$data['name']);
                    $check_pathology_test_exist=$this->db->get()->row_array();
                    if(!isset($check_pathology_test_exist) && empty($check_pathology_test_exist) && !isset($check_pathology_test_exist['id']))
                    {
                        $this->db->insert('tbl_test_pathology', $data);    
                    }
                }
                echo json_encode(1);            
            }
            else if($type == 'radiology')
            { 
                $final=array();
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

                    if(!isset($check_pathology_test_exist) && empty($check_pathology_test_exist) && !isset($check_pathology_test_exist['id']))
                    {
                        $this->db->insert('tbl_report_radiology', $data);  
                    }
                }
                echo json_encode(1);            
            }
            else if($type == 'provisional')
            { 
                $final=array();
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
                    $this->db->from('tbl_provisional_test');
                    $this->db->where('name',$data['name']);
                    $check_pathology_test_exist=$this->db->get()->row_array();
                    if(!isset($check_pathology_test_exist) && empty($check_pathology_test_exist) && !isset($check_pathology_test_exist['id']))
                    {
                        $this->db->insert('tbl_provisional_test', $data); 
                    }
                }
                echo json_encode(1);            
            }
    }


    public function import_csv_provisional($tot_rec_num, $data, $loop_counter, $loop_no) {
            $tot_batch = (int) $loop_counter + (int) $loop_no;
            log_message('debug', "In import_csv_provisional----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);

            for($j=$loop_no; $j<$tot_batch; $j++) {
                if($j>0) {
                    if($data[$j][0]!='') {
                        //log_message('debug', "In import_csv_provisional----data--".print_r($data[$j]));
                        $check_pathology_test_exist = $this->Inventory_model->check_provisional_test_exist_or_not(strtoupper($data[$j][0]));
                        if($check_pathology_test_exist <= 0) {
                            $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
                            $sdata['description'] = $data[$j][1]; 
                            $sdata['name_hn'] = $sdata['name'];
                            $sdata['description_hn'] = $sdata['description'];
                            $sdata['created_at'] = date('Y-m-d H:i:s');
                            $sdata['transate_state'] = '1';
                            $Id = $this->db->insert('tbl_provisional_test',$sdata);
                        }   
                    }
                }    
            }
            return true;
    }

    public function import_csv_radiology($tot_rec_num, $data, $loop_counter, $loop_no) {
            $tot_batch = (int) $loop_counter + (int) $loop_no;
            log_message('debug', "In import_csv_radiology----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);

            for($j=$loop_no; $j<$tot_batch; $j++) {
                if($j>0) {
                    if($data[$j][0]!='') {
                        //log_message('debug', "In import_csv_pathology----data--".print_r($data[$j]));
                        $check_pathology_test_exist = $this->Inventory_model->check_radio_test_exist_or_not(strtoupper($data[$j][0]),strtoupper($data[$j][1]));
                        if($check_pathology_test_exist <= 0) {
                            $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
                            $sdata['description'] = $data[$j][1]; 
                            $sdata['name_hn'] = $sdata['name'];
                            $sdata['description_hn'] = $sdata['description'];
                            $sdata['created_at'] = date('Y-m-d H:i:s');
                            $sdata['transate_state'] = '1';
                            $Id = $this->db->insert('tbl_report_radiology',$sdata);
                        }  
                    }
                }    
            }
            return true;
    }
    // public function import_csv_pathology($tot_rec_num, $data, $loop_counter, $loop_no) {
    //         $tot_batch = (int) $loop_counter + (int) $loop_no;
    //         for($j=$loop_no; $j<$tot_batch; $j++) {
    //             if($j>0) {
    //                 if($data[$j][0]!='') {
    //                     //log_message('debug', "In import_csv_pathology----data--".print_r($data[$j]));
    //                     $check_pathology_test_exist = $this->Inventory_model->check_test_exist_or_not(strtolower($data[$j][0]));
    //                     if($check_pathology_test_exist <= 0) {
    //                         $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
    //                         $sdata['description'] = $data[$j][1]; 
    //                         $sdata['name_hn'] = $sdata['name'];
    //                         $sdata['description_hn'] = $sdata['description'];
    //                         $sdata['created_at'] = date('Y-m-d H:i:s');
    //                         $sdata['transate_state'] = '1';
    //                         $Id = $this->db->insert('tbl_test_pathology', $sdata);
    //                     } 
    //                 }
    //             }
                
    //         }
    //         return true;
    // }

    public function import_csv_medicine($tot_rec_num, $data, $loop_counter, $loop_no) {
            $tot_batch = (int) $loop_counter + (int) $loop_no;
            log_message('debug', "In import_csv_medicine----tot_rec_num---".$tot_rec_num."---loop_counter---".$loop_counter."---loop_no---".$loop_no);
    
            for($j=$loop_no; $j<$tot_batch; $j++) {
                if($j>0) {
                    if($data[$j][0]!='' && $data[$j][1]!='' && $data[$j][2]!='' && $data[$j][3]!='') {
                        //log_message('debug', "In import_csv_medicine----data--".print_r($data[$j]));
                        $check_medicine_exist = $this->Inventory_model->check_medicine_exist_or_not(strtolower($data[$j][0]), strtolower($data[$j][2]), strtolower($data[$j][03]),strtolower($data[$j][1]));
                        if($check_medicine_exist <= 0) {
                            $sdata['name'] = iconv(mb_detect_encoding($data[$j][0], mb_detect_order(), true), "UTF-8",$data[$j][0]); 
                            $sdata['generic_name'] = $data[$j][1]; 
                            $sdata['company_name'] = $data[$j][2];
                            $sdata['no_of_tablets'] = $data[$j][3]; 
                            $sdata['form_of_package'] = $data[$j][4];
                            $sdata['created_at'] = date('Y-m-d H:i:s');
                            $sdata['transate_state'] = '1';
                            $Id = $this->db->insert('tbl_medicine',$sdata);
                        }  
                    }
                }    
            }
            return true;
    }
}
?>