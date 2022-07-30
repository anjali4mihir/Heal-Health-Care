<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Kolkata');

class Services extends CI_Controller {

    public function __construct()
    {	
        parent::__construct();  
        $this->auth->check_session();
        $this->load->model("services_model");
        $this->load->model("common_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));

    }
    public function index()
    {
    	$data["error"] = "";
        $data['title'] = "Services List";
       
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if(in_array('0',$this->modules) || in_array('1',$this->modules)){
            if($role == 1 && $admin_id >= 1) {
                
                 // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {
                        $selectedIDs = implode(',',$_POST['chk_id']);
                        
                        $this->db->query("DELETE FROM `tbl_services` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        redirect("services_list");
                        exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("services_list");
                        exit;
                    }
                }
                // delete all end
                
                $data["services"] = $this->services_model->get_service_list();
                $this->load->template('admin/service/service_list', $data);
                
            }else{
                redirect('admin/login');
            }
        }else{
                $this->load->template("admin/not_access");
            }
    }
    public function add()
    {
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Service Add";
        $data['action'] = "Add";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1){
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Title', 'trim|required');
                $this->form_validation->set_rules('type', 'type', 'trim|required');
                if($this->input->post("type") == 0)
                {
                  $this->form_validation->set_rules('services', 'Service', 'trim|required');  
                }
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    
                    $ddata=array();

                    $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                    $ddata['is_parent'] = $this->input->post("type") ? $this->input->post("type") : 0;
                    $ddata['is_possiotion'] = $this->input->post("possition") ? $this->input->post("possition") : 0;
                    $ddata['parent_id'] = $this->input->post("services") ? $this->input->post("services") : 0;
                    //$ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                    $ddata['short_desc'] = $this->input->post("short_desc") ? $this->input->post("short_desc") : '';
                    $ddata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                    $ddata['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ddata['title'])));
                        $this->load->model('services_model');
                        $checkslug = $this->services_model->check_slug($ddata['slug']);
                        if(!empty($checkslug->newscount)){
                            $newsl=$checkslug->newscount+1;
                            $ddata['slug'] = $ddata['slug'].'-'.$newsl;
                        }
                    $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                  
                    // $tdata['mon'] = $this->input->post("mon_str_time").'-'.$this->input->post("mon_end_time");
                    // $tdata['tue'] = $this->input->post("tue_str_time").'-'.$this->input->post("tue_end_time");
                    // $tdata['wed'] = $this->input->post("wed_str_time").'-'.$this->input->post("wed_end_time");
                    // $tdata['thru'] = $this->input->post("thru_str_time").'-'.$this->input->post("thru_end_time");
                    // $tdata['fri'] = $this->input->post("fri_str_time").'-'.$this->input->post("fri_end_time");
                    // $tdata['sat'] = $this->input->post("sat_str_time").'-'.$this->input->post("sat_end_time");
                    // $tdata['sun'] = $this->input->post("sun_str_time").'-'.$this->input->post("sun_end_time");
                    // $tdata['service_id'] = $last_id;
                    // $this->common_model->data_insert("tbl_work_hours", $tdata,TRUE);
                    
                    $uploadpath = $this->config->item('service_images_path');
                    
                    // image english
                    if ($_FILES["iconfile"]["size"] > 0) {
                        $config['upload_path'] = './uploads/services/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["iconfile"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $icon= newuploadusingcompress($_FILES["iconfile"], $uploadpath);
                        $ddata['iconimg'] = $icon;   
                    }
                  

                    // image hindi
                    if ($_FILES["file_hindi"]["size"] > 0) {
                        $config['upload_path'] = './uploads/services/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["file_hindi"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);

                        $icon= newuploadusingcompress($_FILES["file_hindi"], $uploadpath);
                        $ddata['image_hindi'] = $icon;   
                    }

                    //print_r($ddata['iconimg']);die;
                    $this->load->model("common_model");
                    $ddata['created_at'] = date('Y-m-d H:i:s');
                  
                    
                    $last_id=$this->common_model->data_insert("tbl_services", $ddata,TRUE);
                    
                    $subcount = "";
                    $totalsubcount = 0;

                    if($this->input->post("type") == 0)
                    {
                       $subcount = $this->services_model->get_service_name_by_id($this->input->post("services")); 
                       $totalsubcount = $subcount->subcount + 1;
                    }

                    $sdata['subcount'] = $totalsubcount;
                    $this->common_model->data_update("tbl_services", $sdata, array("id" =>$last_id));
                   
                    if (isset($last_id) && !empty($last_id)){ 
                            // image 1
                            for ($i=0; $i < count($_FILES["file"]["name"]) ; $i++) { 
                                if ($_FILES["file"]["size"][$i] > 0) 
                                {
                                    $idatad['name'] = $_FILES["file"]["name"][$i];
                                    $idatad['type'] = $_FILES["file"]["type"][$i];
                                    $idatad['tmp_name'] = $_FILES["file"]["tmp_name"][$i];
                                    $idatad['error'] = $_FILES["file"]["error"][$i];
                                    $idatad['size'] = $_FILES["file"]["size"][$i];
                                    $config['upload_path'] = './uploads/services/';
                                    $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|webp';
                                    $this->upload->initialize($config);
                                    $this->load->library('upload', $config);
                                    $temp = explode(".", $_FILES["file"]["name"][$i]);
                                    $newfilename = time() . '.' . end($temp);
                                    $uploadpath = $this->config->item('service_images_path');
                                    $file_name = newuploadusingcompress($idatad, $uploadpath);
                                    $idata['service_id'] = $last_id;
                                    $idata['image_url'] = $file_name; 
                                    $idata['created_at'] = date('Y-m-d h:i:s');
                                    $this->load->model("common_model");  
                                    $this->common_model->data_insert("tbl_services_images", $idata); 
                                } 
                            }

                            // if ($_FILES["file_hindi"]["size"] > 0) {
                            //     $config['upload_path'] = './uploads/services/';
                            //     $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            //     $this->upload->initialize($config);
                            //     $this->load->library('upload', $config);
                            //     $temp = explode(".", $_FILES["file_hindi"]["name"]);
                            //     $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);

                            //     $icon= newuploadusingcompress($_FILES["file_hindi"], $uploadpath);
                            //     $idata1['service_id'] = $last_id;
                            //     $idata1['image_url_hindi'] = $icon;   
                            //     $idata1['created_at'] = date('Y-m-d h:i:s');
                            //     $this->load->model("common_model");  

                            //     $this->common_model->data_insert("tbl_service_hindi_images", $idata1); 
                            // }


                        // for ($i=0; $i < count($_FILES["file_hindi"]["name"]) ; $i++) { 
                        //     echo "KEKEKE";
                        //     exit;

                        //         if ($_FILES["file_hindi"]["size"][$i] > 0) 
                        //         {
                        //             $idatad['name'] = $_FILES["file_hindi"]["name"][$i];
                        //             $idatad['type'] = $_FILES["file_hindi"]["type"][$i];
                        //             $idatad['tmp_name'] = $_FILES["file_hindi"]["tmp_name"][$i];
                        //             $idatad['error'] = $_FILES["file_hindi"]["error"][$i];
                        //             $idatad['size'] = $_FILES["file_hindi"]["size"][$i];
                        //             $config['upload_path'] = './uploads/services/';
                        //             $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|webp';
                        //             $this->upload->initialize($config);
                        //             $this->load->library('upload', $config);
                        //             $temp = explode(".", $_FILES["file_hindi"]["name"][$i]);
                        //             $newfilename = time() . '.' . end($temp);
                        //             $uploadpath = $this->config->item('service_images_path');
                        //             $file_name = newuploadusingcompress($idatad, $uploadpath);
                                    
                        //         } 
                        // }
                }

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Service added successfully
                            </div>');
                    redirect("services_list");
                    exit;
                }
            }
            $this->load->model("language_model");
            //$data['language'] = $this->language_model->get_language_list();
            $data["services"] = $this->services_model->get_service_list();
            $this->load->template('admin/service/service_add', $data);
        }else{
            redirect('login');
        } 
    }
    public function edit($id)
    {
        //print_r($this->input->post("thru_str_time").'-'.$this->input->post("thru_end_time"));die;
        $data = array();
        $data["error"] = "";
        $data['page_title'] = "Edit Service";
        $data['action'] = "Edit";
        
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        $data["services_records"] = $this->services_model->service_by_id($id);
        
        $data["service_images"] = $this->services_model->get_services_image_by_id($id);

        $data["service_images_hindi"] = $this->services_model->get_services_image_hindi_by_id($id);
        // dd($data);
        // exit;
        // print_r($data["services_records"]);die;
        $data["work_hours_records"] = $this->services_model->get_work_hours_by_id($id);
        
		if($role == 1 && $admin_id >= 1) {

            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Name', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                }
                else 
                {   
                            // image 1
                            if ($_FILES["iconfile"]["size"] > 0) {
                                $config['upload_path'] = './uploads/services/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["iconfile"]["name"]);
                                $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                                $uploadpath = $this->config->item('service_images_path');
                                $icon= newuploadusingcompress($_FILES["iconfile"], $uploadpath);
                                $ddata['iconimg'] = $icon;   
                            }

                              // file_hindi
                            $uploadpath = $this->config->item('service_images_path');
                            if ($_FILES["file_hindi"]["size"] > 0) {
                                $config['upload_path'] = './uploads/services/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["file_hindi"]["name"]);
                                $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);

                                $icon= newuploadusingcompress($_FILES["file_hindi"], $uploadpath);
                                // $idata1['service_id'] = $id;
                                $ddata['image_hindi'] = $icon;   
                            }

                            // multiple image
                            for ($i=0; $i < count($_FILES["file"]["name"]) ; $i++) { 
                                if ($_FILES["file"]["size"][$i] > 0) {
                                    $idatad['name'] = $_FILES["file"]["name"][$i];
                                    $idatad['type'] = $_FILES["file"]["type"][$i];
                                    $idatad['tmp_name'] = $_FILES["file"]["tmp_name"][$i];
                                    $idatad['error'] = $_FILES["file"]["error"][$i];
                                    $idatad['size'] = $_FILES["file"]["size"][$i];
                                    $config['upload_path'] = './uploads/services/';
                                    $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                    $this->upload->initialize($config);
                                    $this->load->library('upload', $config);
                                    $temp = explode(".", $_FILES["file"]["name"][$i]);
                                    $newfilename = time() . '.' . end($temp);
                                    $uploadpath = $this->config->item('service_images_path');
                                    $file_name = newuploadusingcompress($idatad, $uploadpath);
                                    $idata['service_id'] = $id;
                                    $idata['image_url'] = $file_name; 
                                    $idata['created_at'] = date('Y-m-d h:i:s'); 
                                    $this->load->model("common_model"); 
                                    $this->common_model->data_insert("tbl_services_images", $idata); 
                                }   
                            }

                            $ddata['title'] = $this->input->post("title") ? $this->input->post("title") : '';
                            $ddata['is_possiotion'] = $this->input->post("possition") ? $this->input->post("possition") : 0;
                            $ddata['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ddata['title'])));
                                $this->load->model('services_model');
                                $checkslug = $this->services_model->check_slug_edit($ddata['slug'],$id);
                                if(!empty($checkslug->newscount)){
                                    $newsl=$checkslug->newscount+1;
                                    $ddata['slug'] = $ddata['slug'].'-'.$newsl;
                                }
                                // $ddata['is_parent'] = $this->input->post("type") ? $this->input->post("type") : 0;
                                // if ($this->input->post("type") == 1)
                                // {
                                //     $parent_id = 0;
                                // }else{
                                //     $parent_id = $this->input->post("services");
                                // }
                                // $ddata['parent_id'] = $parent_id;
                                //$ddata['language_id'] = $this->input->post("language") ? $this->input->post("language") : '';
                                $ddata['short_desc'] = $this->input->post("short_desc") ? $this->input->post("short_desc") : '';
                                $ddata['description'] = $this->input->post("description") ? $this->input->post("description") : '';
                                $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';

                                // $tdata['mon'] = $this->input->post("mon_str_time").'-'.$this->input->post("mon_end_time");
                                // $tdata['tue'] = $this->input->post("tue_str_time").'-'.$this->input->post("tue_end_time");
                                // $tdata['wed'] = $this->input->post("wed_str_time").'-'.$this->input->post("wed_end_time");
                                // $tdata['thru'] = $this->input->post("thru_str_time").'-'.$this->input->post("thru_end_time");
                                // //print_r($tdata['thru']);die;
                                // $tdata['fri'] = $this->input->post("fri_str_time").'-'.$this->input->post("fri_end_time");
                                // $tdata['sat'] = $this->input->post("sat_str_time").'-'.$this->input->post("sat_end_time");
                                // $tdata['sun'] = $this->input->post("sun_str_time").'-'.$this->input->post("sun_end_time");
                                // $tdata['service_id'] = $id;
                                // $this->common_model->data_update("tbl_work_hours", $tdata,array("service_id" => $id));
                                
                                $this->load->model("common_model");
                                $ddata['updated_at'] = date('Y-m-d H:i:s');

                                $this->common_model->data_update("tbl_services", $ddata, array("id" => $id));
                    //$totalsubcount = 0;
                    //$subcount = $this->services_model->get_service_name_by_id($this->input->post("services")); 
                    //print_r($subcount->subcount);die;
                    //print_r($subcount->id);die;
                    //print_r($this->input->post("services"));die;
                    //if ($this->input->post("type") == 0){

                       // if($this->input->post("services")==$subcount->id)
                       // {
                       //      $totalsubcount = $subcount->subcount;
                       // }else{
                            
                            //$totalsubcount = $subcount->subcount + 1 ;
                       // }
                       
                    // }else{
                    //     $totalsubcount = $subcount->subcount - 1;
                    // }
                    // $sdata['subcount'] = $totalsubcount;
                    // $this->common_model->data_update("tbl_services", $sdata, array("id" =>$subcount->id));

                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success ! </strong> Service Updated successfully
                        </div>');
                    redirect("services_list");
                    exit;
                }
            }
            //$this->load->model("language_model");
            //$data['language'] = $this->language_model->get_language_list();
            $data["services"] = $this->services_model->get_service_list();
            $data["service_name"] = '';
            
            if($data["services_records"]->parent_id > 0)
            {
              $data["service_name"] = $this->services_model->get_service_name_by_id($data["services_records"]->parent_id);  
            }else{
                $data["service_name"] = '';
            }
            
            //print_r($data["service_name"]->title);die;
            $this->load->template('admin/service/service_edit', $data);
        } else {
            redirect('login');
        }       
    }
    public function delete($id)
    {
        
        //print_r(1);die;
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            
            $category = $this->services_model->service_by_id($id);
            //print_r($category);die;
            if ($category) {
                $this->db->query("DELETE FROM `tbl_services` WHERE `id` = '" . $category->id . "'");
                //print_r('hii');die;
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible" role="alert" id="error">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> Service deleted successfully
                              </div>');
                redirect('services_list');
                exit;
            }
        } else {
            redirect('login');
        }
    }
    public function service_image($id)
    {
        $category = $this->services_model->get_services_image_imgid($id);
        $sid = $category->service_id;
        $this->db->query("DELETE FROM `tbl_services_images` WHERE `id` = '" . $id. "'");
         redirect("services/edit/".$category->service_id);   
    }

    public function service_image_hindi($id)
    {
        $category = $this->services_model->get_services_image_imgid_hindi($id);
        $sid = $category->service_id;
        $this->db->query("DELETE FROM `tbl_service_hindi_images` WHERE `id` = '" . $id. "'");
        redirect("services/edit/".$category->service_id);   
    }
    public function check_possion_exist_or_not() {
        if(!empty($this->input->post("possition"))) {
            $this->load->model("services_model");
            $check_possion_exist = $this->services_model->check_possion_exist_or_not($this->input->post("possition"),$this->input->post("type"));
            //print_r($check_possion_exist);die;
            if($check_possion_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    
    

}
?>