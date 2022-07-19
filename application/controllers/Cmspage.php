<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Cmspage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("Cmspages_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function pages($id) {
        $data = array();
        $data["error"] = "";
        $data["page_title"] ='Page Edit';
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        $this->load->model("cmspages_model");
        $data["cms_page"] = $this->cmspages_model->get_cms_page_by_id($id);
        if($admin_id >= 1) {
            if(in_array(0,$this->modules) || in_array(2,$this->modules)){  
                if(isset($_REQUEST))  {

                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('description', 'description', 'trim|required');
                    $this->form_validation->set_rules('description_hn', 'description', 'trim|required');
                    if($data["cms_page"]->id == 1)
                    {
                        $this->form_validation->set_rules('description_app', 'description', 'trim|required');   
                        $this->form_validation->set_rules('our_goal', 'our goal', 'trim|required');   
                        $this->form_validation->set_rules('our_goal_app', 'our goal for app', 'trim|required');   
                        $this->form_validation->set_rules('our_goal_hn', 'our goal in hindi', 'trim|required');   
                        $this->form_validation->set_rules('our_mission', 'our mission', 'trim|required');   
                        $this->form_validation->set_rules('our_mission_app', 'our mission for app', 'trim|required');   
                        $this->form_validation->set_rules('our_mission_hn', 'our mission in hindi', 'trim|required');   
                        $this->form_validation->set_rules('our_vision', 'our vision', 'trim|required');   
                        $this->form_validation->set_rules('our_vision_app', 'our vision for app', 'trim|required');   
                        $this->form_validation->set_rules('our_vision_hn', 'our vision in hindi', 'trim|required');   
                    }
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ct = date('Y-m-d H:i:s');
                        if($id == 1)
                        {
                            $ddata['desc_app'] =$this->input->post("description_app") ? $this->input->post("description_app") : '';
                            $ddata['short_desc'] =$this->input->post("short_desc") ? $this->input->post("short_desc") : '';
                            $ddata['our_goal'] =$this->input->post("our_goal") ? $this->input->post("our_goal") : '';
                            $ddata['our_goal_hn'] =$this->input->post("our_goal_hn") ? $this->input->post("our_goal_hn") : '';
                            $ddata['our_goal_app'] =$this->input->post("our_goal_app") ? $this->input->post("our_goal_app") : '';
                            $ddata['our_mission_hn'] =$this->input->post("our_mission_hn") ? $this->input->post("our_mission_hn") : '';
                            $ddata['our_mission'] =$this->input->post("our_mission") ? $this->input->post("our_mission") : '';
                            $ddata['our_mission_app'] =$this->input->post("our_mission_app") ? $this->input->post("our_mission_app") : '';
                            $ddata['our_vision'] =$this->input->post("our_vision") ? $this->input->post("our_vision") : '';
                            $ddata['our_vision_hn'] =$this->input->post("our_vision_hn") ? $this->input->post("our_vision_hn") : '';
                            $ddata['our_vision_app'] =$this->input->post("our_vision_app") ? $this->input->post("our_vision_app") : '';
                            
                            if ($_FILES["file"]["size"] > 0)
                            {
                                $config['upload_path'] = './uploads/siteimg/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["file"]["name"]);
                                $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                                $uploadpath = $this->config->item('site_images_path');
                                //print_r($uploadpath);die;
                                $file_name = newuploadusingcompress($_FILES["file"], $uploadpath);
                                //print_r($file_name);die;
                                $ddata['file'] = $file_name;   
                            }  
                        }
                        
                        $ddata['desc_web'] =$_POST['description'];
                        $ddata['desc_hn'] =$_POST['description_hn'];
                        $ddata['updated_at'] = $ct;
                        
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_cms", $ddata, array("id" => $id)
                        );
                        
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> CMS Page updated successfully
                                    </div>');
                        redirect("cmspage/pages/$id");
                        exit;
    				}
                }
                $this->load->template('admin/cmspage/page', $data);
            } else{
                $this->load->template("admin/not_access");
            }
        }
    }
    
    public function security()
    {
       

        $data = array();
        $data["error"] = "";
        $data["page_title"] ='Security Page Edit';
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        $this->load->model("cmspages_model");
        $data["cms_page"] = $this->cmspages_model->get_security_page();

        $data["cms_page_images"] = explode(",",$data["cms_page"]->security_images); 
        // print_r($data["cms_page_images"]);die;

        if($admin_id >= 1) {
            // dd($this->modules);
            // exit;
            // if(in_array(2,$this->modules)){  
                if(isset($_REQUEST))  {
                    //print_r(1);die;
                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
                    $this->form_validation->set_rules('security_points', 'Security description', 'trim|required');
                    $this->form_validation->set_rules('ISO_title', 'ISO Title', 'trim|required');
                    $this->form_validation->set_rules('ISO_description', 'ISO Description', 'trim|required');
                    $this->form_validation->set_rules('security_patients', 'security_for_patients', 'trim|required');
                    $this->form_validation->set_rules('security_medical', 'security_for_medical', 'trim|required');
                    //print_r($this->input->post('ISO_title'));die;
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                        //print_r(1);die;

                    } else {
                        //print_r(2);die;
                        $ddata=array();
                        //print_r($_FILES["banner"]);die;
                        if ($_FILES["banner"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/security/';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["banner"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('security_images_path');
                            //print_r($uploadpath);die;
                            $file_name = newuploadusingcompress($_FILES["banner"], $uploadpath);
                            //print_r($file_name);die;
                            $banner= $file_name; 
                            //print_r($ddata);die;  
                        }else{
                            $banner= $data["cms_page"]->banner;
                        }
                         
                        if ($_FILES["ISO_logo"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/security/';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["ISO_logo"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('security_images_path');
                            //print_r($uploadpath);die;
                            $file_name = newuploadusingcompress($_FILES["ISO_logo"], $uploadpath);
                            //print_r($file_name);die;
                            $ISO_logo= $file_name; 
                            //print_r($ddata['ISO_logo']);die;  
                        }else{
                            $ISO_logo=$data["cms_page"]->ISO_logo;
                        }
                        $security_logo = array();
                        for ($i=0; $i < count($_FILES["security_logo"]["name"]) ; $i++){ 
                            if ($_FILES["security_logo"]["size"][$i] > 0) 
                            {
                                $idatad['name'] = $_FILES["security_logo"]["name"][$i];
                                $idatad['type'] = $_FILES["security_logo"]["type"][$i];
                                $idatad['tmp_name'] = $_FILES["security_logo"]["tmp_name"][$i];
                                $idatad['error'] = $_FILES["security_logo"]["error"][$i];
                                $idatad['size'] = $_FILES["security_logo"]["size"][$i];
                                $config['upload_path'] = './uploads/security/';
                                $config['allowed_types'] = 'jpg|png|jpeg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["security_logo"]["name"][$i]);
                                $newfilename = time() . '.' . end($temp);
                                $uploadpath = $this->config->item('security_images_path');
                                $file_name = newuploadusingcompress($idatad, $uploadpath);
                                array_push($security_logo,$file_name);
                            } 
                        }
                        if(!empty($security_logo))
                        {
                            $security_images=implode(",",$security_logo);
                            //print_r( $ddata['security_images']);die;
                        }else{
                            $security_images = $data["cms_page"]->security_images;
                        }
                        
                        $ddata = [
                            'page_title'      => $this->input->post('page_title'),
                            'banner'          => $banner,
                            'security_title' =>$this->input->post('security_title'),
                            'security_points' =>$this->input->post('security_points'),
                            'ISO_title'        =>$this->input->post('ISO_title'),
                            'ISO_logo'          => $ISO_logo,
                            'security_images'  => $security_images,
                            'ISO_description'   =>$this->input->post('ISO_description'),
                            'security_patients' =>$this->input->post('security_patients'),
                            'security_medical'  =>$this->input->post('security_medical'),
                            'updated_at'        =>date('Y-m-d H:i:s')
                        ];
                        //print_r($ddata);die;
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_security", $ddata, array("id" => 1));
                        //print_r($ddata);die;
                        //$this->common_model->data_insert("tbl_security", $ddata);
                        
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> CMS Page updated successfully
                                    </div>');
                        redirect("cmspage/security");
                        exit;
                    }
                }
                
                $this->load->template('admin/cmspage/security', $data);
            // }
        } 
    }

   private function file_upload($arr, $path)
   {
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
    private function get_random_number($length = 10, $sting = "")
    {
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