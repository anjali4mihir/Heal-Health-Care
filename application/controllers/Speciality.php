<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Kolkata');

class Speciality extends CI_Controller {

    public function __construct()
    {	
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("speciality_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function index()
    {
    	$data["error"] = "";
        $data['title'] = "Speciality List";
       
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        // if($role == 1 && $admin_id >= 1) {
            if(in_array('0',$this->modules) || in_array('1',$this->modules)){

                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);
                        
                        $this->db->query("DELETE FROM `tbl_speciality` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("speciality");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("speciality");
                        exit;
                    }
                }
                // delete all end
            $data["speciality"] = $this->speciality_model->get_speciality_list();
            $this->load->template('admin/speciality/speciality_list', $data);
            }else{
                $this->load->template("admin/not_access");
            }
        // }else{
        //     redirect('admin/login');
        // }
    }
    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Speciality Add";
        $data['action'] = "Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('details', 'Details', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    $ddata=array();
                    $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                    //$ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                    $ddata['details'] = $this->input->post("details") ? $this->input->post("details") : '';
                
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    
                    
                    $this->load->model("common_model");
                    $ddata['created_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_insert("tbl_speciality", $ddata, TRUE);

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Speciality added successfully
                            </div>');
                    redirect("speciality");
                    exit;
                }
            }
            //$this->load->model("language_model");
            //$data['language'] = $this->language_model->get_language_list();
            $this->load->template('admin/speciality/speciality_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    { 
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($role == 1 && $admin_id >= 1) {
            $data["error"] = "";
            
            $data["page_title"] = 'Edit Feature';
            $this->load->model("language_model");
            $data['language'] = $this->language_model->get_language_list();
            $data['speciality_records']=$this->speciality_model->get_speciality_list_by_id($id);
            if(isset($_REQUEST))
            {
                $this->load->library('form_validation');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('details', 'Details', 'trim|required');
                if($this->form_validation->run() == FALSE) {

                    $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>Warning !</strong> '. $this->form_validation->error_string() . '</div>';
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning !</strong> '. $this->form_validation->error_string() . '</div>');

                }
                else
                {
                    
                    $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                    //$ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                    $ddata['details'] = $this->input->post("details") ? $this->input->post("details") : '';
                
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    $ddata['created_at']=date('Y-m-d H:i:s');
                    
                    $this->load->model('common_model');
                    $where=array('id'=>$id);
                    $banneradd=$this->common_model->data_update_new('tbl_speciality',$ddata,$where);
                        if($banneradd){
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Speciality updated succesfully</div>');
                            redirect('speciality');
                        }
                }
            }
            $data['action'] = "Edit";
            $this->load->template('admin/speciality/speciality_edit',$data);
        }
    }
    public function delete($id)
    {
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            
            $category = $this->speciality_model->get_speciality_list_by_id($id);
            if ($category) {
                $this->db->query("DELETE FROM `tbl_speciality` WHERE `id` = '" . $category->id . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong>Speciality deleted successfully
                              </div>');
                redirect("speciality");
                exit;
            }
        } else {
            redirect('login');
        }
    }

}
?>