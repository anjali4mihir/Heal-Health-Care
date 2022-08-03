<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Testimonials extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("Testimonials_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Testimonials List';
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        // if($role == 1 && $admin_id >= 1) {
            if(in_array('0',$this->modules) || in_array('1',$this->modules)){

                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);
                       
                        $this->db->query("DELETE FROM `tbl_testimonials` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("testimonials");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("testimonials");
                        exit;
                    }
                }
                // delete all end

            $data["testimonials"] = $this->Testimonials_model->get_testimonials_list();
            $this->load->template('admin/testimonials/testimonials_list', $data);
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
        $data['page_title'] = "Testimonials Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST))
            {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Testimonial Name', 'trim|required');                   
                    $this->form_validation->set_rules('details', 'Testimonial Details', 'trim|required');
                    $this->form_validation->set_rules('position', 'position', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ddata=array();
                        $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                        $ddata['position'] = $this->input->post("position") ? $this->input->post("position") : '';
                        $ddata['details'] = $this->input->post("details") ? $this->input->post("details") : '';
                        
                        $ddata['country'] =  $this->input->post("country") ? $this->input->post("country") : '';
                        $ddata['state'] =  $this->input->post("state") ? $this->input->post("state") : '';
                        $ddata['city'] =  $this->input->post("city") ? $this->input->post("city") : '';
                        $ddata['address'] =  $this->input->post("address") ? $this->input->post("address") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        if ($_FILES["file"]["size"] > 0) 
                        {
                            $config['upload_path'] = './uploads/banner/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('banner_images_path');
                            $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                            $ddata['file'] = $file_name;   
                        }
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_testimonials", $ddata, TRUE);

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Testimonials added successfully
                                        </div>');
                        redirect("testimonials");
                        exit;
                    }
                }
                $this->load->model("World_wide_model");
                $data['country'] = $this->World_wide_model->fetch_country();
                $this->load->template('admin/testimonials/testimonials_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Testimonials Edit";
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        $this->load->model("Testimonials_model");
        $testimonials_records = $this->Testimonials_model->get_testimonials_list_by_id($id);
        $data["testimonials_records"] = $testimonials_records;

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
                        $ddata['file'] = $testimonials_records->file;
                    }
                    $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                    $ddata['position'] = $this->input->post("position") ? $this->input->post("position") : '';
                    
                    $ddata['details'] = $this->input->post("details") ? $this->input->post("details") : '';
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                    $ddata['country'] =  $this->input->post("country") ? $this->input->post("country") : '';
                    $ddata['state'] =  $this->input->post("state") ? $this->input->post("state") : '';
                    $ddata['city'] =  $this->input->post("city") ? $this->input->post("city") : '';
                    $ddata['address'] =  $this->input->post("address") ? $this->input->post("address") : '';
                    
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_testimonials", $ddata, array("id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Testimonial Updated successfully
                                    </div>');
                    redirect("testimonials");
                    exit;
                }
            }
            $this->load->model("World_wide_model");
            $coyntryname = '';
            $statename = '';
            $cityname = '';
            
            if($this->World_wide_model->get_country_list_by_id($data['testimonials_records']->country) != '')
            {
                
                $country = $this->World_wide_model->get_country_list_by_id($data['testimonials_records']->country);
                $countryname = $country->name;
            }
            if($this->World_wide_model->get_state_list_by_id($data['testimonials_records']->state) != '')
            {
                $state = $this->World_wide_model->get_state_list_by_id($data['testimonials_records']->state);
                $statename = $state->name;
            }
            if($this->World_wide_model->get_city_list_by_id($data['testimonials_records']->city) != '')
            {
                $city =  $this->World_wide_model->get_city_list_by_id($data['testimonials_records']->city);
                $cityname = $city->name;
            }
            $data['countryname'] = $coyntryname;
            $data['statename'] = $statename;
            $data['cityname']  = $cityname;
            $data['country'] = $this->World_wide_model->fetch_country();
            $this->load->template('admin/testimonials/testimonials_edit', $data);
        } else {
            redirect('login');
        }       
    }
    public function delete($id) {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("Testimonials_model");
            $category = $this->Testimonials_model->get_testimonials_list_by_id($id);
            if ($category) {
                $this->db->query("DELETE FROM `tbl_testimonials` WHERE `id` = '" . $category->id . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> testimonials deleted successfully
                              </div>');
                redirect("testimonials");
                exit;
            }
        } else {
            redirect('login');
        }
    } 
    
}
?>