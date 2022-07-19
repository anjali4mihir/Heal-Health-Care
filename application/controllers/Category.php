<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("category_model");
    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Category List';
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data["doctors"] = $this->Doctors_model->get_doctors_list();
            $this->load->template('admin/category/category_list', $data);
        }else{
            redirect('login');
        }
    }
    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Category Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Category Name', 'trim|required');                   
                    
                    
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                        $ddata['name'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ddata['title'])));
                        $this->load->model('category_model');
                        $checkslug = $this->category_model->check_slug($ddata['slug']);
                        if(!empty($checkslug->newscount)){
                            $newsl=$checkslug->newscount+1;
                            $ddata['slug'] = $ddata['slug'].'-'.$newsl;
                        }
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_category", $ddata, TRUE);

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Category added successfully
                                        </div>');
                        redirect("category");
                        exit;
                    }
                }
                $this->load->model("language_model");
                $data['language'] = $this->language_model->get_language_list();
                $this->load->template('admin/category/category_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Doctors Edit";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        $this->load->model("Doctors_model");
        $data["doctors_records"] = $this->Doctors_model->get_doctors_list_by_id($id);
        
        if($role == 1 && $admin_id >= 1) {
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');                   
                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('details', 'Details', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    if ($_FILES["file"]["size"] > 0) {
                        $config['upload_path'] = './uploads/banner/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["file"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('banner_images_path');
                        $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                        $ddata['file'] = $file_name;
                    } else {
                        $ddata['file'] = $data["doctors_records"] ->file;
                    }
                   $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                    $ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                    $ddata['position'] = $this->input->post("position") ? $this->input->post("position") : '';
                    $ddata['details'] = $this->input->post("details") ? $this->input->post("details") : '';
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_doctors", $ddata, array("id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Doctors Updated successfully
                                    </div>');
                    redirect("doctors");
                    exit;
                }
            }
            $this->load->model("language_model");
            $data['language'] = $this->language_model->get_language_list();
            $this->load->template('admin/doctors/doctors_edit', $data);
        } else {
            redirect('login');
        }       
    }
    public function delete($id) {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("Doctors_model");
            $category = $this->Doctors_model->get_doctors_list_by_id($id);
            if ($category) {
                $this->db->query("DELETE FROM `tbl_doctors` WHERE `id` = '" . $category->id . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Doctors deleted successfully
                              </div>');
                redirect("doctors");
                exit;
            }
        } else {
            redirect('login');
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
                //print_r($file_name);die;
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
    
}
?>