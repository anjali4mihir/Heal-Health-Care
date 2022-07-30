<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Message_languages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("Language_message_model");
    }
    public function index()
    {
        $data["error"] = "";
        $data['title'] = "Languages Messages List";
       
        $data["messageList"] = $this->Language_message_model->get_languages_message_list();
        // print_r('<pre>');
        // print_r($data["messageList"]);die;
        $this->load->template('admin/message_languages/list_message', $data);
    }

    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data["pageTitle"] = "Add Message";
        $data['admin'] = "Admin";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Add Message";
        $data['action'] = "Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('message','message', 'trim|required');                   
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    $ddata=array();
                    $ddata['title'] = $this->input->post("message") ? $this->input->post("message") : '';
                    $ddata['message_key'] = $this->input->post("message_key") ? $this->input->post("message_key") : '';
                    $this->load->model("common_model");
                    $ddata['created_at'] = date('Y-m-d H:i:s');
                    $ddata['language_id'] = 1;
                    //$ddata['language'] = "english";
                    $this->common_model->data_insert("tbl_message", $ddata, TRUE);
                    $ddata1['parent_id'] = $this->db->insert_id();
                    $ddata1['title'] = $this->input->post("message") ? $this->input->post("message") : '';
                    $ddata1['message_key'] = $this->input->post("message_key") ? $this->input->post("message_key") : '';

                     $ddata1['created_at'] = date('Y-m-d H:i:s');
                    $ddata1['language_id'] = 2;
                    //$ddata['language'] = "hindi";
                    $this->common_model->data_insert("tbl_message", $ddata1, TRUE);
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong>Lable Added Successfully
                            </div>');
                    redirect("message_languages");
                    exit;
                }
            }
            $this->load->template('admin/message_languages/add_message', $data);
        }else{
            redirect('login');
        } 
    }
    public function Register_message()
    {
        if (array_key_exists('message_key',$_POST))
        {
            $message=$_POST["message_key"];
           $this->Language_message_model->verifylableExist($message);
            if($this->Language_message_model->verifylableExist($message) == TRUE)
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
    public function Register_message_edit()
    {
        if (array_key_exists('message_key',$_POST))
        {
            $message=$_POST["message_key"];
            $this->Language_message_model->verifylableExist($message);
            if($this->Language_message_model->verifylableExist($message) == TRUE)
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
    public function edit_hindi($id)
    {
        
            $data = array();
            $data["error"] = "";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Edit Hindi Message";
            $data['action'] = "Edit";

            $admin_id = $this->session->userdata('admin_id');
            $role =  $this->session->userdata('role');

            $data["hindi_records"] = $this->Language_message_model->get_hindi_message_by_id($id);

            if($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');                   
                    $this->form_validation->set_rules('message', 'message', 'trim|required');
                    if($this->form_validation->run() == FALSE) 
                    {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    }
                    else 
                    { 
                        $ddata['title'] = $this->input->post("message") ? $this->input->post("message") : '';
                       
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_message", $ddata, array("id" => $id));
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Hindi Message Updated successfully
                            </div>');
                        redirect("message_languages");
                        exit;
                    }
                }
                $this->load->template('admin/message_languages/edit_message', $data);
            } else {
                redirect('login');
            }       
        
    }
    public function edit_english($id)
    {
        $data = array();
        $data["error"] = "";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Edit English Message";
        $data['action'] = "Edit";
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

       $data["hindi_records"] = $this->Language_message_model->get_hindi_message_by_id($id);
        //print_r($data["hindi_records"]);die;
        if($role == 1 && $admin_id >= 1) {
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');                   
                $this->form_validation->set_rules('message', 'message', 'trim|required');
                if($this->form_validation->run() == FALSE) 
                {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                }
                else 
                { 
                    $ddata['title'] = $this->input->post("message") ? $this->input->post("message") : '';
                    $ddata['message_key'] = $this->input->post("message_key") ? $this->input->post("message_key") : '';
                    $sdata['message_key'] = $this->input->post("message_key") ? $this->input->post("message_key") : '';
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->load->model("common_model");
                    $this->common_model->data_update("tbl_message", $ddata, array("id" => $id));

                    $this->common_model->data_update("tbl_message", $sdata, array("parent_id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success ! </strong> Lable Updated successfully
                        </div>');
                    redirect("message_languages");
                    exit;
                }
            }
            $this->load->template('admin/message_languages/edit_message', $data);
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

            $this->db->query("DELETE FROM `tbl_message` WHERE `id` = '" .$id. "'");
            $this->db->query("DELETE FROM `tbl_message` WHERE `id` = '".$this->input->get('hid'). "'");
            
                $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Message  deleted successfully
                              </div>');
                redirect("message_languages");
                exit;
            }
         else {
            redirect('login');
        }
    }
   
}
?>