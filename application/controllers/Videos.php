<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Videos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("Video_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Video List';
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        // if($role == 1 && $admin_id >= 1) {
            if(in_array('0',$this->modules) || in_array('1',$this->modules)){

                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);
                        
                        $this->db->query("DELETE FROM `tbl_video` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("videos");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("videos");
                        exit;
                    }
                }
                // delete all end
                
            $data["video_records"] = $this->Video_model->video_list();
            $this->load->template('admin/video/video_list', $data);
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
        $data['page_title'] = "Video Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST))
            {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');                   
                    $this->form_validation->set_rules('link', 'Link', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['link'] = $this->input->post("link") ? $this->input->post("link") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_video", $ddata, TRUE);
                         $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Video added successfully
                                        </div>');
                        redirect("videos");
                        exit;
                    }
                }
                $this->load->template('admin/video/video_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Video Edit";
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        $this->load->model("Video_model");
        $data["video_records"] = $this->Video_model->get_single_Youtube_details($id);
        if($role == 1 && $admin_id >= 1) {
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');                   
                $this->form_validation->set_rules('name', 'Name', 'trim|required');                   
                $this->form_validation->set_rules('link', 'Link', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    
                    $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                    $ddata['link'] = $this->input->post("link") ? $this->input->post("link") : '';
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_video", $ddata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Video Updated successfully
                                    </div>');
                    redirect("videos");
                    exit;
                }
            }
            
            $this->load->template('admin/video/video_edit', $data);
        } else {
            redirect('login');
        }       
    }
    public function delete($id) {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("Video_model");
            $category = $this->Video_model->get_single_Youtube_details($id);
            if ($category) {
                $this->db->query("DELETE FROM `tbl_video` WHERE `id` = '" . $category['id'] . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong>video deleted successfully
                              </div>');
                redirect("videos");
                exit;
            }
        } else {
            redirect('login');
        }
    } 
    
}
?>