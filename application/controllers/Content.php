<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Content extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("Content_model");
        $this->load->model('common_model');
    }
    public function index()
    {
        $data["error"] = "";
        $data["title"] = 'Content List';
        $data['con_list'] = $this->Content_model->get_con_list();
        $this->load->template('admin/content/content_list', $data);
    }


    public function edit_content($id)
    {
        $data["error"] = "";
        $data["title"] = 'Content Edit';
        $data['con_list'] = $this->Content_model->get_con_list_by_id($id);
        if (isset($_REQUEST)) {
                $this->load->library('form_validation');        
                if($id!='5'){           
                $this->form_validation->set_rules('heading_1', 'Heading-1', 'trim|required'); 
                $this->form_validation->set_rules('heading_2', 'Heading-2', 'trim|required');
                if($id=='1'){
                $this->form_validation->set_rules('heading_3', 'Heading-3', 'trim|required');
                }
                }
                $this->form_validation->set_rules('description_1', 'Description-1', 'trim|required');
                $this->form_validation->set_rules('description_2', 'Description-2', 'trim|required');
                if($id=='1'||$id=='5'){
                $this->form_validation->set_rules('description_3', 'Description-3', 'trim|required');
                }
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                   if ($_FILES["main_image"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/content/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["main_image"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('content_images_path');
                        $file_name = newuploadusingcompress($_FILES["main_image"], $uploadpath);
                        $main_image= $file_name; 
                    }else{
                        $main_image=$data['con_list']['main_image'];
                    }
                    
                    for ($i=0; $i <count($_FILES['image_1']['name']);$i++) { 
                        if ($_FILES["image_1"]["size"][$i] > 0) {
                            $idatad['name'] = $_FILES["image_1"]["name"][$i];
                            $idatad['type'] = $_FILES["image_1"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["image_1"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["image_1"]["error"][$i];
                            $idatad['size'] = $_FILES["image_1"]["size"][$i];
                            $config['upload_path'] = './uploads/content/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $uploadpath = $this->config->item('content_images_path');
                            $file_name = newuploadusingcompress($idatad, $uploadpath);
                            $ddata1[] = $file_name;
                            $j = 1;
                            for($i = 0; $i<count($ddata1); $i++){
                            $arr1['image_'.$j.''] = $ddata1[$i];
                            $j++;
                            }
                            $ddata['image_1'] = json_encode($arr1);
                        }else{
                            $ddata['image_1']=$data['con_list']['image_1'];
                        }   
                    }
                    
                   
                    
                    for ($i=0; $i <count($_FILES['image_2']['name']);$i++) { 
                        if ($_FILES["image_2"]["size"][$i] > 0) {
                            $idatad['name'] = $_FILES["image_2"]["name"][$i];
                            $idatad['type'] = $_FILES["image_2"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["image_2"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["image_2"]["error"][$i];
                            $idatad['size'] = $_FILES["image_2"]["size"][$i];
                            $config['upload_path'] = './uploads/content/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $uploadpath = $this->config->item('content_images_path');
                            $file_name = newuploadusingcompress($idatad, $uploadpath);
                            $ddata2[] = $file_name;
                            $j = 1;
                            for($i = 0; $i<count($ddata2); $i++){
                                $arr2['image_'.$j.''] = $ddata2[$i];
                                $j++;
                            }
                            $ddata['image_2'] = json_encode($arr2);
                        }else{
                            $ddata['image_2']=$data['con_list']['image_2'];
                        }   
                    }
                    
                   
                   

                    for ($i=0; $i <count($_FILES['image_3']['name']);$i++) { 
                        if ($_FILES["image_3"]["size"][$i] > 0) {
                            $idatad['name'] = $_FILES["image_3"]["name"][$i];
                            $idatad['type'] = $_FILES["image_3"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["image_3"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["image_3"]["error"][$i];
                            $idatad['size'] = $_FILES["image_3"]["size"][$i];
                            $config['upload_path'] = './uploads/content/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $uploadpath = $this->config->item('content_images_path');
                            $file_name = newuploadusingcompress($idatad, $uploadpath);
                            $ddata3[] = $file_name;
                            $j = 1;
                            for($i = 0; $i<count($ddata3); $i++){
                                $arr3['image_'.$j.''] = $ddata3[$i];
                                $j++;
                            }
                                $ddata['image_3'] = json_encode($arr3);
                        }else{
                            $ddata['image_3']=$data['con_list']['image_3'];
                        }   
                    }
                    
                    
                    
                   $ddata['main_image'] = $main_image;     
                   
                   $ddata['heading_1'] = $this->input->post("heading_1") ? $this->input->post("heading_1") : '';
                    $ddata['description_1'] = $this->input->post("description_1") ? $this->input->post("description_1") : '';
                    $ddata['heading_2'] = $this->input->post("heading_2") ? $this->input->post("heading_2") : '';
                    $ddata['description_2'] = $this->input->post("description_2") ? $this->input->post("description_2") : '';
                    $ddata['heading_3'] = $this->input->post("heading_3") ? $this->input->post("heading_3") : '';
                    $ddata['description_3'] = $this->input->post("description_3") ? $this->input->post("description_3") : '';
                    
                    
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    
                    $this->common_model->data_update("tbl_content", $ddata, array("id" => $id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Content Updated successfully
                                    </div>');
                    redirect("content");
                    exit;
                }
            }
        $this->load->template('admin/content/content_edit', $data);
    }
        
}
?>