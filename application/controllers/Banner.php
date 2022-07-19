<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Banner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->load->model("Banner_model");
    }
    public function index()
    {
        $data["error"] = "";
        $data['title'] = "Banner List";
       
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($role == 1 && $admin_id >= 1) {
            $data["banner"] = $this->Banner_model->get_banner_list();
            $this->load->template('admin/banner/banner_list', $data);
        }else{
            //print_r(2);die;
            redirect('login');
        }
    }

    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data["pageTitle"] = "Admin Banner";
        $data['admin'] = "Admin";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Banner Add";
        $data['action'] = "Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('tag', 'Tag', 'trim|required');                   
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                $this->form_validation->set_rules('url', 'Url', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    $ddata=array();
                    
                    $ddata['tag'] = $this->input->post("tag") ? $this->input->post("tag") : '';
                    $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                    $ddata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $ddata['url'] = $this->input->post("url") ? $this->input->post("url") : '';
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
                        $file=$uploadpath.$file_name;
                        $image= imagecreatefromjpeg($file);
                        ob_start();
                        imagejpeg($image,NULL,100);
                        $cont = ob_get_contents();
                        ob_end_clean();
                        imagedestroy($image);
                        $content =  imagecreatefromstring($cont);
                        $webpfilename = time() .'_'.rand(0000,9999).'.webp';
                        imagewebp($content,$uploadpath.$webpfilename);
                        imagedestroy($content);
                        $ddata['file'] =$webpfilename;   
                    }
                    $this->load->model("common_model");
                    $ddata['created_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_insert("tbl_banner", $ddata, TRUE);

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Banner added successfully
                            </div>');
                    redirect("banner");
                    exit;
                }
            }
            $this->load->model("language_model");
            $data['language'] = $this->language_model->get_language_list();
            $this->load->template('admin/banner/banner_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    {
            $data = array();
            $data["error"] = "";
            $data["title"] = PROJECT_NAME;
            $data['page_title'] = "Edit Banner";
            $data['action'] = "Edit";

            $admin_id = $this->session->userdata('admin_id');
            $role =  $this->session->userdata('role');

            $this->load->model("Banner_model");
            $banner_records = $this->Banner_model->get_banner_list_by_id($id);
            $data["banner_records"] = $banner_records;

            if($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');                   
                    $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
                    $this->form_validation->set_rules('title', 'Title', 'trim|required');
                    $this->form_validation->set_rules('description', 'Description', 'trim|required');
                    $this->form_validation->set_rules('url', 'Url', 'trim|required');
                    if($this->form_validation->run() == FALSE) 
                    {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    }
                    else 
                    {
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
                            $file=$uploadpath.$file_name;
                            
                            $image= imagecreatefromjpeg($file);
                            ob_start();
                            imagejpeg($image,NULL,100);
                            $cont = ob_get_contents();
                            ob_end_clean();
                            imagedestroy($image);
                            $content =  imagecreatefromstring($cont);
                            $webpfilename = time() .'_'.rand(0000,9999).'.webp';
                            imagewebp($content,$uploadpath.$webpfilename);
                            imagedestroy($content);
                            $ddata['file'] =$webpfilename;
                        }
                        
                        else
                        {
                            $ddata['file'] = $banner_records->file;
                        }
                        
                        $ddata['tag'] = $this->input->post("tag") ? $this->input->post("tag") : '';
                        //$ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                        $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                        // $ddata['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ddata['title'])));
                        // $this->load->model('banner_model');
                        // $checkslug = $this->banner_model->check_slug($ddata['slug']);
                        // if(!empty($checkslug->newscount)){
                        //     $newsl=$checkslug->newscount+1;
                        //     $ddata['slug'] = $ddata['slug'].'-'.$newsl;
                        // }
                        $ddata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                        $ddata['url'] = $this->input->post("url") ? $this->input->post("url") : '';
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        
                        $this->load->model("common_model");
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_update("tbl_banner", $ddata, array("id" => $id));

                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Banner Updated successfully
                            </div>');
                        redirect("banner");
                        exit;
                    }
                }
                $this->load->model("language_model");
                $data['language'] = $this->language_model->get_language_list();
                $this->load->template('admin/banner/banner_edit', $data);
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
            $this->load->model("banner_model");
            $category = $this->banner_model->get_banner_list_by_id($id);
            if ($category) {
                $this->db->query("DELETE FROM `tbl_banner` WHERE `id` = '" . $category->id . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Banner deleted successfully
                              </div>');
                redirect("banner");
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