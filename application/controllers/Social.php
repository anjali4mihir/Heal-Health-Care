<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Social extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->load->model("social_media_model");
    }
    public function index()
    {
        $data["error"] = "";
        $data['title'] = "Social Media List";
       
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        
        if($role == 1 && $admin_id >= 1) {
            ///print_r(1);die;

                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);
                        
                        $this->db->query("DELETE FROM `tbl_social_media` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("social");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("social");
                        exit;
                    }
                }
                // delete all end

            $data["banner"] = $this->social_media_model->get_social_media();
            $this->load->template('admin/social/social_list', $data);
        }else{
            //print_r(2);die;
            redirect('login');
        }
    }
    public function add()
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        //print_r(1);die;
        if($role == 1 && $admin_id >= 1)
        {
            
            
            $data["error"] = "";
            $data['page_title'] = "Add";
            
            if(isset($_REQUEST))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name','name','trim|required');
                $this->form_validation->set_rules('link','link','trim|required');
                $this->form_validation->set_rules('icon_class','Icon Class','trim|required');
                if($this->form_validation->run() == FALSE) {

                        $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                        </div>';

                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                        </div>');

                        // $data["error"] = $this->form_validation->error_string();
                    } else {
                        $pdata=array();
                        $pdata['name']=$this->input->post("name");
                        $pdata['link']=$this->input->post("link");
                        $pdata['icon_class']=$this->input->post("icon_class");
                        $pdata['created_at']=date('Y-m-d H:i:s');
                        
                        $this->load->model('common_model');
                        $banneradd=$this->common_model->data_insert('tbl_social_media',$pdata);
                        if($banneradd){
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Success ! </strong>Social Media saved successfully</div>');
                            redirect('social');
                        }
                }
            }
            $this->load->template('admin/social/social_add',$data);
        }
        else
        {
            redirect('login');
        }
    }

    public function edit($id)
    { 
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($role == 1 && $admin_id >= 1) {
            $data["error"] = "";
            
            $data["page_title"] = 'Edit';
            
            $data['social']=$this->social_media_model->get_single_social_details($id);
            if(isset($_REQUEST))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('link', 'link', 'trim|required');
                $this->form_validation->set_rules('icon_class','Icon Class','trim|required');
                if($this->form_validation->run() == FALSE) {

                    $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>Warning !</strong> '. $this->form_validation->error_string() . '</div>';
                    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning !</strong> '. $this->form_validation->error_string() . '</div>');

                }
                else
                {
                    $pdata=array();
                    $pdata['name']=$this->input->post("name");
                    $pdata['link']=$this->input->post("link");
                    $pdata['icon_class']=$this->input->post("icon_class");
                    $pdata['created_at']=date('Y-m-d H:i:s');
                    $status=$this->input->post("status");
                    $this->load->model('common_model');
                    $where=array('id'=>$id);
                    $banneradd=$this->common_model->data_update_new('tbl_social_media',$pdata,$where);
                        if($banneradd){
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Social Media updated succesfully</div>');
                            redirect('social');
                        }
                }
            }
            $this->load->template('admin/social/social_edit',$data);
        }
    }

    public function delete($id)
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        
        if($role == 1 && $admin_id >= 1) {
            $this->load->model('common_model');
            $where = array('id' => $id);
            $this->common_model->data_remove('tbl_social_media ',$where);
            
                $this->session->set_flashdata("message",'<div class="alert alert-success" role="alert">
                    <button class="close" data-dismiss="alert"></button><strong>Success ! </strong>social media deleted Successfully.</div>'); 
                redirect('social');
            
        } else{
            redirect('login');    
        }
    }
}
?>