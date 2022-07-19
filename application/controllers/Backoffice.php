<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Backoffice extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("admin_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Backoffice Staff List';
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        
        if(in_array('0',$this->modules) && $admin_id >= 1) {

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

            $data["staff"] = $this->admin_model->get_staff_list();
            $this->load->template('admin/backoffice/backoffice_list', $data);
        }else{
            
            $this->load->template("admin/not_access");
        }
    }
    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Staff Add";
        
        if(in_array('0',$this->modules)){
            if (isset($_REQUEST)) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');         
                    $this->form_validation->set_rules('username', 'User Name', 'trim|required');          
                    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');                   
                    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');                   
                    $this->form_validation->set_rules('password', 'Password', 'trim|required');                   
                                    
                    
                    
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        //print_r($this->input->post('modules_list'));die;

                        $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['username'] = $this->input->post("username") ? $this->input->post("username") : '';
                        $ddata['email'] = $this->input->post("email") ? $this->input->post("email") : '';
                        
                        
                        $ddata['org_password'] = $this->input->post("password") ? $this->input->post("password") : '';
                        $ddata['password'] = md5($ddata['org_password']);
                        $ddata['contactno'] = $this->input->post("mobile") ? $this->input->post("mobile") : '';
                         $ddata['role'] = '0';
                        //$ddata['activestatus'] = ($this->input->post("status") == "on") ? 'Y' : 'N';
                        
                            $modules=$this->input->post('modules_list');
                        
                        //print_r($modules);die;
                        $ddata['is_manage_modules'] = $modules;
                        if ($_FILES["file"]["size"] > 0) 
                        {
                            $config['upload_path'] = './uploads/profile_setting/';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('profile_images_path');
                            $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                            $ddata['image'] = $file_name;   
                        }
                        //print_r($file_name);die;
                        $this->load->model("common_model");
                        $ddata['datetime'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_admin", $ddata, TRUE);

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Staff added successfully</div>');
                        redirect("backoffice");
                        exit;
                    }
                }
                $this->load->template('admin/backoffice/backoffice_add', $data);
        }else{
            $this->load->template("admin/not_access");
        } 
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Backoffice Edit";
        
        $this->load->model("admin_model");
        $data["records"] = $this->admin_model->get_admin_by_id($id);
        $data["module_array"] = json_decode($data["records"]->is_manage_modules);
        
        if(in_array('0',$this->modules)) {
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');                   
                $this->form_validation->set_rules('name', 'Name', 'trim|required');                   
                $this->form_validation->set_rules('username', 'User Name', 'trim|required');                   
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');                   
                $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');                   
                $this->form_validation->set_rules('password', 'Password', 'trim|required');    
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['username'] = $this->input->post("username") ? $this->input->post("username") : '';
                        $ddata['email'] = $this->input->post("email") ? $this->input->post("email") : '';
                        
                        
                        $ddata['org_password'] = $this->input->post("password") ? $this->input->post("password") : '';
                        $ddata['password'] = md5($ddata['org_password']);
                        $ddata['contactno'] = $this->input->post("mobile") ? $this->input->post("mobile") : '';
                       

                        //$ddata['activestatus'] = ($this->input->post("status") == "on") ? 'Y' : 'N';
                        
                            $modules=$this->input->post('modules_list');
                        
                        //print_r($modules);die;
                        $ddata['is_manage_modules'] = $modules;
                        if ($_FILES["file"]["size"] > 0) 
                        {
                            $config['upload_path'] = './uploads/profile_setting/';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('profile_images_path');
                            $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                            $ddata['image'] = $file_name;   
                        }
                        //print_r($file_name);die;
                       
                    
                    $this->load->model("common_model");
                    
                    $this->common_model->data_update("tbl_admin", $ddata, array("admin_id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Doctors Updated successfully
                                    </div>');
                    redirect("backoffice");
                    exit;
                }
            }
            $this->load->model("language_model");
            $data['language'] = $this->language_model->get_language_list();
            $this->load->template('admin/backoffice/backoffice_edit', $data);
        } else {
            $this->load->template("admin/not_access");
        }       
    }
    public function delete($id) {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if(in_array('0',$this->modules)) {
            $data = array();
            $this->load->model("admin_model");
            $category = $this->admin_model->get_admin_by_id($id);
            //print_r($id);die;
            if ($category) {
                $this->db->query("DELETE FROM `tbl_admin` WHERE `admin_id` = '" .$id. "'");
                //print_r($this->db->last_query());die;

                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Member deleted successfully
                              </div>');
                redirect("backoffice");
                exit;
            }
        } else {
           $this->load->template("admin/not_access");
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