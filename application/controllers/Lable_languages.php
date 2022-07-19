<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Lable_languages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->load->model("language_lable_model");
    }
    public function index()
    {
        $data["error"] = "";
        $data['title'] = "Languages Messages List";
       
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        $data["labelList"] = $this->language_lable_model->get_languages_label_list();
        if($role == 1 && $admin_id >= 1) {
            
            $this->load->template('admin/lable_languages/label_list', $data);
        }else{
            //print_r(2);die;
            redirect('login');
        }
    }

    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data["pageTitle"] = "Add Lable";
        $data['admin'] = "Admin";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Add Lable";
        $data['action'] = "Add";
        
        if (isset($_REQUEST)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('lable', 'lable', 'trim|required');                   
            $this->form_validation->set_rules('lable_key', 'lable_key', 'trim|required');                   
            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                $ddata=array();
                $ddata['title'] = $this->input->post("lable") ? $this->input->post("lable") : '';
                $ddata['label_key'] = $this->input->post("lable_key") ? $this->input->post("lable_key") : '';
                $this->load->model("common_model");
                $ddata['created_at'] = date('Y-m-d H:i:s');
                $ddata['language_id'] = 1;
                
                $this->common_model->data_insert("tbl_lable", $ddata, TRUE);
                $ddata1['parent_id'] = $this->db->insert_id();
                $ddata1['title'] = $this->input->post("lable") ? $this->input->post("lable") : '';
                $ddata1['label_key'] = $ddata['label_key'];
                $ddata1['created_at'] = date('Y-m-d H:i:s');
                $ddata1['language_id'] = 2;
               
                $this->common_model->data_insert("tbl_lable", $ddata1, TRUE);
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success ! </strong>Lable Added Successfully
                        </div>');
                redirect("lable_languages");
                exit;
            }
        }
        $this->load->template('admin/lable_languages/add_lable', $data);
    }
    public function Register_lable()
    {
        
        $name = $this->input->post("lable_key");
        if(!empty($name)) {
            $this->language_lable_model->verifylableExist($lable);
            if($this->language_lable_model->verifylableExist($lable) == TRUE)
            {
            echo "false";
                 exit;
            }
            else
            {
            echo "true";
                 exit;
            }
        }
    }
    public function edit($id)
    {
        
            $data = array();
            $data["error"] = "";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Edit Hindi Lable";
            $data['action'] = "Edit";

            $admin_id = $this->session->userdata('admin_id');
            $role =  $this->session->userdata('role');

            $this->load->model("language_lable_model");
           
            $data["hindi_records"] = $this->language_lable_model->get_hindi_lable_by_id($id);

            if($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');                   
                    $this->form_validation->set_rules('lable', 'lable', 'trim|required');
                    if($this->form_validation->run() == FALSE) 
                    {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    }
                    else 
                    { 
                        $ddata['title'] = $this->input->post("lable") ? $this->input->post("lable") : '';
                        
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_lable", $ddata, array("id" => $id));
                        
                        
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Lable Updated successfully
                            </div>');
                        redirect("lable_languages");
                        exit;
                    }
                }
                $this->load->template('admin/lable_languages/edit_lable', $data);
            } else {
                redirect('login');
            }       
        
    }
    public function edit_english($id)
    {
        
            $data = array();
            $data["error"] = "";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Edit English Lable";
            $data['action'] = "Edit";

            $admin_id = $this->session->userdata('admin_id');
            $role =  $this->session->userdata('role');

            $this->load->model("language_lable_model");
           
            $data["hindi_records"] = $this->language_lable_model->get_hindi_lable_by_id($id);

            if($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');                   
                    $this->form_validation->set_rules('lable', 'lable', 'trim|required');
                    $this->form_validation->set_rules('lable_key', 'lable Key', 'trim|required');
                    if($this->form_validation->run() == FALSE) 
                    {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    }
                    else 
                    { 
                        $ddata['title'] = $this->input->post("lable") ? $this->input->post("lable") : '';
                        $ddata['label_key'] = $this->input->post("lable_key") ? $this->input->post("lable_key") : '';
                        $sdata['label_key'] = $this->input->post("lable_key") ? $this->input->post("lable_key") : '';
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_lable", $ddata, array("id" => $id));
                        $this->common_model->data_update("tbl_lable", $sdata, array("parent_id" => $id));
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Lable Updated successfully
                            </div>');
                        redirect("lable_languages");
                        exit;
                    }
                }
                $this->load->template('admin/lable_languages/edit_lable', $data);
            } else {
                redirect('login');
            }       
        
    }
    public function delete($id)
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("common_model");
            $this->db->query("DELETE FROM `tbl_lable` WHERE `id` = '".$id. "'");
            $this->db->query("DELETE FROM `tbl_lable` WHERE `id` = '".$this->input->get('hid'). "'");
            
                $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> lable deleted successfully
                              </div>');
                redirect("lable_languages");
                exit;
            }
         else {
            redirect('admin');
        }
    }
}
?>