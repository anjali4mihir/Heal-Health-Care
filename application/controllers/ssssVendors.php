<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Vendors extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->load->model("Vendor_model");
        $this->modules = json_decode($this->session->userdata('is_manage_modules'));
    }
    public function list($status)
    {
        $data["error"] = "";
        $data['title'] = "";
        $statusId = "";
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        $data["vendor"] = '';
       
        // if($role == 1 && $admin_id >= 1)
        // {
            if(in_array('0',$this->modules) || in_array('3',$this->modules) || in_array('4',$this->modules)){
                if($status == 'pending')
                {
                    $statusId = 0;
                    $data['title'] = "Partners Pending Approve List";
                    $data["vendor"] = $this->Vendor_model->get_vendor_list($statusId);
                    $data['status'] = 04;

                }
                
                else if($status == 'rejected')
                {
                    $statusId = 2;
                    $data['title'] = "Partners Rejected List";
                    $data["vendor"] = $this->Vendor_model->get_vendor_list($statusId);
                    
                }
                else
                {
                    $statusId = 1;
                    $partnerId = $status;
                    if($status == 1){
                        $data['title'] = "Pharmacy Stores";
                    }else if($status == 2){
                        $data['title'] = "Pathology Labs";
                    }else if($status == 3){
                        $data['title'] = "Radiodiagnostic Centers";
                    }else if($status == 4){
                        $data['title'] = "Doctors";
                    }else if($status == 5){
                        $data['title'] = "Veterinary Doctors";
                    }else if($status == 6){
                        $data['title'] = "Nurse";
                    }else if($status == 7){
                        $data['title'] = "Physiotherapist";
                    }else if($status == 8){
                        $data['title'] = "Patients";
                    }
                    $data["vendor"] = $this->Vendor_model->get_list_by_vendor($statusId,$partnerId);
                    $data['status'] = $status;
                }

                // delete all start
                if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == "Delete All") {
                    if(count($_POST['chk_id'])>0) {

                        $id = $_POST['chk_id'][0];
                        $this->load->model("Vendor_model");
                        $vendor = $this->Vendor_model->get_vendor_list_by_id($id);

                        $status_by_admin = $vendor->status_by_admin;
                        $category_id = $vendor->category;
                       
                        $selectedIDs = implode(',',$_POST['chk_id']);
                       
                        $this->db->query("DELETE FROM `tbl_partners` WHERE `id` IN ($selectedIDs)");
                        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Seleted records deleted successfully</div>');
                        
                            if($status_by_admin == 1 || $status_by_admin == '1') {
                                if($category_id == 1){
                                    redirect("vendors/pharmacy-stores");
                                } else if($category_id == 2){
                                    redirect("vendors/pathology-labs");
                                } else if($category_id == 3){
                                    redirect("vendors/radiodiagnostic-centers");
                                } else if($category_id == 4){
                                    redirect("vendors/register-doctors");
                                } else if($category_id == 5){
                                    redirect("vendors/veterinary-doctors");
                                } else if($category_id == 6){
                                    redirect("vendors/nurse");
                                } else if($category_id == 7){
                                    redirect("vendors/physiotherapist");
                                } else {
                                    redirect("vendors/pending-approve");
                                } 
                            } else if($status_by_admin == 0 || $status_by_admin == '0') {
                                redirect("vendors/pending-approve");
                            }
                            exit;
                    } else {
                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning ! </strong> Atleast select one record.</div>');
                        redirect("testimonials");
                        exit;
                    }
                }
                // delete all end

                $data['statusId'] = $statusId;
                
                $this->load->template('admin/vendor/vendor_list', $data);
            }else{
                $this->load->template("admin/not_access");
            }
        // }else{
        //     redirect('admin/login');
        // }
    }
    public function view($id)
    {
        

        $data['data'] =$this->Vendor_model->get_vendor_by_id($id);

        if($data['data']['category'] == 8) {
            $data['title'] = 'Patients Details';
        } else {
            $data['title'] = "Vendors Details";
        }

        $data['storedata'] = $this->Vendor_model->get_partner_profile_by_id($id);
        $data['documents_status'] = $this->Vendor_model->get_partner_documents_status_by_id($id);
        $data['storetiming']=array();
        if($data['storedata']->category == 1 || $data['storedata'] ->category == 2 || $data['storedata'] ->category == 3)
        {
            if($data['storedata']->open_timing=="24/7")
            {
               $data['time_id'] = '1'; 
               $data['storetiming'] = $data['storedata']->open_timing;
            }
            else
            {
                $data['time_id'] = '2';
                $data['storetiming'] = json_decode($data['storedata']->open_timing);
            }   
        }
        if($data['storedata']->category != 1 || $data['storedata'] ->category != 2 || $data['storedata'] ->category != 3)
        {
            $data["partner_work_exp"] =json_decode($data["storedata"]->work_exp);
        }
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($data["storedata"]->id);
        $this->load->model('World_wide_model');
        $coyntryname = '';
        $statename = '';
        $cityname = '';
        if($this->World_wide_model->get_country_list_by_id($data['data']['country']) != '')
        {
            
            $coyntry = $this->World_wide_model->get_country_list_by_id($data['data']['country']);
            $coyntryname = $coyntry->name;
        }
        if($this->World_wide_model->get_state_list_by_id($data['data']['state']) != '')
        {
            $state = $this->World_wide_model->get_state_list_by_id($data['data']['state']);
            $statename = $state->name;
        }
        if($this->World_wide_model->get_city_list_by_id($data['data']['city']) != '')
        {
            $city =  $this->World_wide_model->get_city_list_by_id($data['data']['city']);
            $cityname = $city->name;
        }
        
        $data['countryname'] = $coyntryname;
        $data['statename'] = $statename;
        $data['cityname']  = $cityname;
        
        // echo "<pre>";
        // print_r($data);
        // exit;
        
        $this->load->template('admin/vendor/vendor_view',$data);
    }
    public function changeStatus()
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("vendor_model");
            
            $id = $this->uri->segment(3);
            $category = $this->vendor_model->get_vendor_list_by_id($id);
            $ddata['status_by_admin'] = $this->input->get("status");
            if ($category) {
                $this->load->model("common_model");
                $this->common_model->data_update("tbl_partners", $ddata, array("id" => $id));
                if($this->input->get("status") == 2)
                {
                    redirect("vendors/list/rejected");
                }else{
                    redirect("vendors/list/pending");

                }
                exit;
            }
        } else {
            redirect('login');
        }
    }
    public function delete($id) {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');

        if($role == 1 && $admin_id >= 1) {
            $data = array();
            $this->load->model("Vendor_model");
            $vendor = $this->Vendor_model->get_vendor_list_by_id($id);

            $status_by_admin = $vendor->status_by_admin;
            $category_id = $vendor->category;


            if ($vendor) {
                $this->db->query("DELETE FROM `tbl_partners` WHERE `id` = '" . $vendor->id . "'");
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Success ! </strong> Partner deleted successfully
                              </div>');
                
                if($status_by_admin == 1 || $status_by_admin == '1') {
                    if($category_id == 1){
                        redirect("vendors/pharmacy-stores");
                    } else if($category_id == 2){
                        redirect("vendors/pathology-labs");
                    } else if($category_id == 3){
                        redirect("vendors/radiodiagnostic-centers");
                    } else if($category_id == 4){
                        redirect("vendors/register-doctors");
                    } else if($category_id == 5){
                        redirect("vendors/veterinary-doctors");
                    } else if($category_id == 6){
                        redirect("vendors/nurse");
                    } else if($category_id == 7){
                        redirect("vendors/physiotherapist");
                    } else {
                        redirect("vendors/pending-approve");
                    } 
                } else if($status_by_admin == 0 || $status_by_admin == '0') {
                    redirect("vendors/pending-approve");
                }
               
                exit;
            }
        } else {
            redirect('login');
        }
    }
    public function edit($id)
    {
        $data = array();
        $data["error"] = "";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Edit Profile";
        $data['action'] = "Edit";
        $data['partnerId'] = $id;
        $admin_id = $this->session->userdata('admin_id');
        $this->load->model("Vendor_model");
        $this->load->model("services_model");
        $data["profile_records"] = $this->Vendor_model->get_partner_profile_by_id($id);
        $categoryID = $data["profile_records"]->category;
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($data["profile_records"]->id);
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('id',$id);
        $data['rowd']= $this->db->get()->row();
        $data['speciality_list'] = $this->services_model->get_sub_service_list($data['rowd']->category);
            $coyntryname = '';
            $statename = '';
            $cityname = '';
            $this->load->model('World_wide_model');
            if($this->World_wide_model->get_country_list_by_id($data['profile_records']->country) != '')
            {
                $country = $this->World_wide_model->get_country_list_by_id($data['profile_records']->country);
                $countryname = $country->name;
            }
            if($this->World_wide_model->get_state_list_by_id($data['profile_records']->state) != '')
            {
                $state = $this->World_wide_model->get_state_list_by_id($data['profile_records']->state);
                $statename = $state->name;
            }
            if($this->World_wide_model->get_city_list_by_id($data['profile_records']->city) != '')
            {
                $city =  $this->World_wide_model->get_city_list_by_id($data['profile_records']->city);
                $cityname = $city->name;
            }
            $data['countryname'] = $coyntryname;
            $data['statename'] = $statename;
            $data['cityname']  = $cityname;
        $this->load->model("World_wide_model");

        $data['country'] = $this->World_wide_model->fetch_country();

        if($admin_id >= 1)
        {
            if (isset($_REQUEST))
            {
                $this->load->library('form_validation');

                if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                {
                    $this->form_validation->set_rules('storename', 'Store Name', 'trim|required|callback_check_edit_store_name');
                    // $this->form_validation->set_rules('gstin', 'GSTIN', 'trim|required|min_length[15]|max_length[15]|callback_check_edit_gstin');
                    if($data["profile_records"]->category == 1)
                    {
                        $this->form_validation->set_rules('licence_no', 'Licence No', 'trim|required');

                        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
                    }else{
                        $this->form_validation->set_rules('UG_uni', 'UG Univercity', 'trim|required');
                        $this->form_validation->set_rules('UG_year', 'Passing Year', 'trim|required');
                    }
                }else{
                    $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|min_length[6]|max_length[6]');
                    if(count($data['speciality_list']) > 0)
                    {
                        $this->form_validation->set_rules('speciality', 'Speciality', 'trim|required');
                    }
                    $this->form_validation->set_rules('UG_college', 'UG College', 'trim|required');
                    if($data['rowd']->category == 4)
                    {
                        $this->form_validation->set_rules('UG_speciality', 'UG Speciality', 'trim|required');
                        $this->form_validation->set_rules('UG_course', 'UG Course', 'trim|required');
                    }
                    $this->form_validation->set_rules('UG_uni', 'UG Univercity', 'trim|required');
                    $this->form_validation->set_rules('UG_year', 'Passing Year', 'trim|required');
                }

                $this->form_validation->set_rules('location', 'Location', 'trim|required');
                // if($this->input->post('optradio') == 1)
                // {
                // }
                // if($this->input->post('optradio') == 2)
                // {
                //     $this->form_validation->set_rules('manuallylocation', 'Location', 'trim|required');
                // }
                // if($data["profile_records"]->adharcard_no != '')
                // {
                //    $this->form_validation->set_rules('adharcard_no', 'Aadharcard no', 'trim|required|min_length[12]|max_length[12]'); 
                // }
                // else 

                if($data["profile_records"]->pan != ''){
                    $this->form_validation->set_rules('pan', 'PAN', 'trim|required|min_length[10]|max_length[10]'); 
                }
                
                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('email', 'Email Id', 'trim|required');
                $this->form_validation->set_rules('contact_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]');
                $this->form_validation->set_rules('dob', 'DOB', 'trim|required');
                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                $this->form_validation->set_rules('state', 'State', 'trim|required');
                $this->form_validation->set_rules('city', 'City', 'trim|required'); 
                if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                }else {
                    $ddata=array();
                    if ($_FILES["profile"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["profile"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('profile_images_path');
                        $profile = newuploadusingcompress($_FILES["profile"], $uploadpath);
                        
                    }else{
                        $profile = $data["profile_records"]->profile;
                    }
                    if ($_FILES["pancard"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/pancard';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["pancard"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('pancard_images_path');
                        $pancard = newuploadusingcompress($_FILES["pancard"], $uploadpath);
                        
                    }else{
                        $pancard = $data["profile_records"]->pancard;
                    }
                    // if ($_FILES["adharcard"]["size"] > 0)
                    // {
                    //     $config['upload_path'] = './uploads/profile_setting/adharcard';
                    //     $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                    //     $this->upload->initialize($config);
                    //     $this->load->library('upload', $config);
                    //     $temp = explode(".", $_FILES["adharcard"]["name"]);
                    //     $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                    //     $uploadpath = $this->config->item('adharcard_images_path');
                    //     $adharcard  = newuploadusingcompress($_FILES["adharcard"], $uploadpath);
                    // }else{
                    //     $adharcard = $data["profile_records"]->adharcard;
                    // }
                    // if ($_FILES["adharcard_back"]["size"] > 0)
                    // {
                    //     $config['upload_path'] = './uploads/profile_setting/adharcard';
                    //     $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                    //     $this->upload->initialize($config);
                    //     $this->load->library('upload', $config);
                    //     $temp = explode(".", $_FILES["adharcard_back"]["name"]);
                    //     $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                    //     $uploadpath = $this->config->item('adharcard_images_path');
                    //     $adharcard_back  = newuploadusingcompress($_FILES["adharcard_back"], $uploadpath);
                    // }else{
                    //     $adharcard_back = $data["profile_records"]->adharcard_back;
                    // }

                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                    {
                        if ($_FILES["sign_board"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/sign_board';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["sign_board"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('sign_board_images_path');
                            $sign_board = newuploadusingcompress($_FILES["sign_board"], $uploadpath);
                        }else{
                            $sign_board = $data["profile_records"]->sign_board;
                        }
                        
                        if ($_FILES["gstin_certificate"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/gstin';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["gstin_certificate"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('gst_certificate_images_path');
                            $gstin_certificate = newuploadusingcompress($_FILES["gstin_certificate"], $uploadpath);
                        }else{
                            $gstin_certificate = $data["profile_records"]->gstin_certificate;
                        }
                        if ($_FILES["corporation"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/corporation';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["corporation"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('corporation_images_path');
                            $corporation = newuploadusingcompress($_FILES["corporation"], $uploadpath);
                        }else{
                                $corporation = $data["profile_records"]->corporation;
                            }
                    }
                    if($data["profile_records"]->category == 1)
                    {


                        if ($_FILES["bpharm_lience"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/bpharm_lience';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["bpharm_lience"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('bpharm_lience_images_path');
                            $bpharm_licence = newuploadusingcompress($_FILES["bpharm_lience"], $uploadpath);
                        }else{
                            $bpharm_licence = $data["profile_records"]->bpharm_licence;
                        }
                        if ($_FILES["degree_certi"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/degree_certi';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["degree_certi"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('degree_certi_images_path');
                            $degree_certi = newuploadusingcompress($_FILES["degree_certi"], $uploadpath);
                        }else{
                            $degree_certi = $data["profile_records"]->degree_certi;
                        }
                    }
                    else
                    {
                        if ($_FILES["UG_certificate"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/UG_PG_certi';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["UG_certificate"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('ug_pg_images_path');
                            $ug_certificate = newuploadusingcompress($_FILES["UG_certificate"], $uploadpath);
                        }else{
                            $ug_certificate = $data["profile_records"]->ug_certificate;
                        }

                        if ($_FILES["UG_MCI_certificate"]["size"] > 0)
                        {
                            $config['upload_path'] = './uploads/profile_setting/UG_PG_certi';
                            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["UG_MCI_certificate"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('ug_pg_images_path');
                            $ug_mci_certificate = newuploadusingcompress($_FILES["UG_MCI_certificate"], $uploadpath);
                        }else{
                            $ug_mci_certificate = $data["profile_records"]->ug_mci_certificate;
                        }
                    }
                   
                
                    $latitude = $this->input->post('g_lat');
                    $longitude = $this->input->post('g_lng');
                
                    $location = $this->input->post('location');
                    
                    $flat_block = $this->input->post('flat_block');
                    
                    $address = $flat_block ." ". $location;

                        $ddata = [
                            'store_name'    => $this->input->post('storename'),
                            'address'       => $address,
                            'country'       => $this->input->post('country'),
                            'state'         => $this->input->post('state'),
                            'city'          => $this->input->post('city'),
                            'latitude'      => $latitude,
                            'longitude'     => $longitude,
                            'pincode'       => $this->input->post('pincode'),
                            'map_link'      => $this->input->post('map_link'),
                            'charges'       => $this->input->post('charges'),
                            'amount'        => $this->input->post('amount'),
                            'description'   => $this->input->post('comment'),
                            'gstin'         => $this->input->post('gstin'),
                            'licence_no'    => $this->input->post('licence_no'),
                            'registration_no'=> $this->input->post('store_no'),
                            'name'           => $this->input->post('name'),
                            'contact_no'     => $this->input->post('contact_no'),
                            'email'          => $this->input->post('email'),
                            'password'       => md5($this->input->post('password')),
                            'org_password'   => $this->input->post('password'),
                            'dob'            => $this->input->post('dob'),
                            'gender'         => $this->input->post('gender'),
                            'qualification'  => $this->input->post('qualification'),
                            'ug_college'     => $this->input->post('UG_college'),
                            'pan'            => $this->input->post('pan'),
                            'adharcard_no'   => $this->input->post('adharcard_no'),
                            'ug_uni'         => $this->input->post('UG_uni'),
                            'ug_course'      => $this->input->post('UG_course'),
                            'ug_speciality'  => $this->input->post('UG_speciality'),
                            'ug_uni'         => $this->input->post('UG_uni'),
                            'ug_year'        => $this->input->post('UG_year'),
                            'ug_mci'         => $this->input->post('UG_MCI'),
                            'ug_reg_no'      => $this->input->post('UG_reg_no'),
                            'ug_mci_year'    => $this->input->post('UG_MCI_year'),
                            'speciality'     => $this->input->post('speciality'),
                            'is_fill_profile'=> 1,
                            'profile'        =>  $profile,
                            'pancard'        =>  $pancard,
                            
                            'sign_board'     => (($categoryID == 1 || $categoryID == 2 || $categoryID == 3 ) ? $sign_board : ''),
                            'gstin_certificate'=> (($categoryID == 1 || $categoryID == 2 || $categoryID == 3 ) ? $gstin_certificate : ''),
                            'bpharm_licence'   => (($categoryID == 1) ? $bpharm_licence : ''),
                            'degree_certificate'=> (($categoryID == 1) ? $degree_certi : ''),
                            'ug_certificate'    => (($categoryID != 1) ? $ug_certificate : ''),
                            'ug_mci_certificate'=> (($categoryID != 1 ) ? $ug_mci_certificate : ''),
                            'corporation'   => (($categoryID == 1 || $categoryID == 2 || $categoryID == 3 ) ? $corporation : ''),
                        ];
                        
                    $this->load->model("common_model");
                    $this->common_model->data_update("tbl_partners", $ddata, array("id" => $id));
                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                    {
                    for ($i=0; $i < count($_FILES["store_image"]["name"]) ; $i++) { 
                            if ($_FILES["store_image"]["size"][$i] > 0) 
                                {
                                    $idatad['name'] = $_FILES["store_image"]["name"][$i];
                                    $idatad['type'] = $_FILES["store_image"]["type"][$i];
                                    $idatad['tmp_name'] = $_FILES["store_image"]["tmp_name"][$i];
                                    $idatad['error'] = $_FILES["store_image"]["error"][$i];
                                    $idatad['size'] = $_FILES["store_image"]["size"][$i];
                                    $config['upload_path'] = './uploads/profile_setting/store_image';
                                    $config['allowed_types'] = 'jpg|png|jpeg';
                                    $this->upload->initialize($config);
                                    $this->load->library('upload', $config);
                                    $temp = explode(".", $_FILES["store_image"]["name"][$i]);
                                    $newfilename = time() . '.' . end($temp);
                                    $uploadpath = $this->config->item('store_images_path');
                                    $file_name = newuploadusingcompress($idatad, $uploadpath);
                                    $idata['store_id'] = $data["profile_records"]->id;
                                    $idata['images'] = $file_name; 
                                    $this->load->model("common_model");  
                                    $this->common_model->data_insert("tbl_store_images", $idata); 
                                } 
                        }
                    }
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> Profile Updated successfully
                            </div>');
                    redirect("vendors/view/".$id);
                    exit;
                }
            }
            $this->load->template('admin/vendor/vendor_edit',$data);
        }else{
            redirect('login');
        } 
    }
    public function download($id)
    {
        if(!empty($id)){
            $this->load->helper('download');
            $filename = $this->input->get('name');
            $fileInfo = $this->db->get_where('tbl_partners',["id"=> $id])->row_array();
            $filepath = '';
            if($filename == 'profile'){
                $filepath = 'uploads/profile_setting/';
            }else if($filename == 'pancard' || $filename == 'adharcard' || $filename == 'sign_board' || $filename == 'corporation'){
                $filepath = 'uploads/profile_setting/'.$filename.'/';
            }else if($filename == 'adharcard_back'){
                $filepath = 'uploads/profile_setting/adharcard/';
            }else if($filename == 'gstin_certificate'){
                $filepath = 'uploads/profile_setting/gstin/';
            }else if($filename == 'bpharm_licence'){
                $filepath = 'uploads/profile_setting/bpharm_lience/';
            }else if($filename == 'degree_certificate'){
                $filepath = 'uploads/profile_setting/degree_certi/';
            }else if($filename == 'ug_certificate' || $filename == 'pg_certificate' || $filename == 'ug_mci_certificate' || $filename == 'pg_mci_certificate'){
                $filepath = 'uploads/profile_setting/UG_PG_certi/';
            }
            $file = FCPATH.$filepath.$fileInfo[$filename];
            $fname = explode(".", $fileInfo[$filename]);
            $extension = end($fname);
            $name = $fileInfo['name'].'-'.$filename.'.'.$extension;
            $data = file_get_contents($file);
            force_download($name,$data);
        }
    }
    function storeimagedownload($id)
    {
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($id);
        if($data["store_images"])
        {
            $this->load->library('zip');
            foreach($data["store_images"] as $image)
            {
                $this->zip->read_file($image->images);
            }
            $this->zip->download(''.time().'.zip');
        }
    }
    public function printView($id)
    {
        $data["profile_records"] = $this->Vendor_model->get_partner_profile_by_id($id);
        $data['data'] =$this->Vendor_model->get_vendor_by_id($id);
        $data['storedata'] = $this->Vendor_model->get_partner_profile_by_id($id);
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($data["storedata"]->id);
        $this->load->model('World_wide_model');
        $coyntryname = '';
        $statename = '';
        $cityname = '';
        if($this->World_wide_model->get_country_list_by_id($data['data']['country']) != '')
        {
            
            $coyntry = $this->World_wide_model->get_country_list_by_id($data['data']['country']);
            $coyntryname = $coyntry->name;
        }
        if($this->World_wide_model->get_state_list_by_id($data['data']['state']) != '')
        {
            $state = $this->World_wide_model->get_state_list_by_id($data['data']['state']);
            $statename = $state->name;
        }
        if($this->World_wide_model->get_city_list_by_id($data['data']['city']) != '')
        {
            $city =  $this->World_wide_model->get_city_list_by_id($data['data']['city']);
            $cityname = $city->name;
        }
        $data['countryname'] = $coyntryname;
        $data['statename'] = $statename;
        $data['cityname']  = $cityname; 
        $data['storetiming']=array();
        if($data['storedata']->category == 1 || $data['storedata'] ->category == 2 || $data['storedata'] ->category == 3)
        {
            $outerArray = explode(',',$data['storedata']->open_timing);
            if(count($outerArray) > 0)
            {
                
                for($i=0;$i<count($outerArray);$i++)
                {
                    $innerArray=explode('#',$outerArray[$i]);
                    if(count($innerArray) > 2)
                    {
                        //print_r(1);die;
                        $main=array();
                        $main = [
                            'day'           =>$innerArray[0],
                            'str_time'      =>$innerArray[1],
                            'end_time'      =>$innerArray[2]
                        ];
                        //print_r($main);die;
                        array_push($data['storetiming'],$main);
                    }
                }
            }   
        }
        if($data['storedata']->category != 1 || $data['storedata'] ->category != 2 || $data['storedata'] ->category != 3)
        {
            $data["partner_work_exp"] =json_decode($data["storedata"]->work_exp);
        }
        $this->load->view('admin/vendor/vendor_print',$data); 
    }
    public function verified_document()
    {
        $data[$this->input->post('name')] = 1;
        $this->load->model('common_model');
        $this->common_model->data_update("tbl_documents_status",$data, array("partner_id" => $this->input->post('id')));
        $output = array(
                    "Status" => 200,
               );
        echo json_encode($output);
    }
    public function verification()
    {
        $api_url = '';
        $data = [
            "id_number" => $this->input->post('number') 
            ];
        $postdata = json_encode($data);
        if($this->input->post('name') == 'pancard')
        {
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/pan/pan';
        }else if($this->input->post('name') == 'adharcard'){
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/aadhaar-validation/aadhaar-validation';
        }else if($this->input->post('name') == 'gstin'){
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/corporate/gstin';
        }else if($this->input->post('name') == 'licence'){
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/driving-license/driving-license';
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL            => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => $postdata,
        CURLOPT_HTTPHEADER     => array(
        'Content-Type: application/json',
        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjAzMTIwMzgsIm5iZiI6MTYyMDMxMjAzOCwianRpIjoiNjg0NTU2NzYtNjA5NS00N2M4LWJjZGYtOGE5ZTc0ZWFiMzg2IiwiZXhwIjoxOTM1NjcyMDM4LCJpZGVudGl0eSI6ImRldi5zYW1qYWluQGFhZGhhYXJhcGkuaW8iLCJmcmVzaCI6ZmFsc2UsInR5cGUiOiJhY2Nlc3MiLCJ1c2VyX2NsYWltcyI6eyJzY29wZXMiOlsicmVhZCJdfX0.uai_cGobdpqlheF0D0jJEZAp7orW_f7Bx45V0hxLVMI'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        $output = '';
        if(empty($response))
        {
            $output = array(
                "status"    => 1,
                "message"   => 'Server Response Error. Data not received.'
            );
        }
        else if($response->status_code != 200)
        {
            $output = array(
                "status"       => $response->status_code,
                "message"      => $response->message
            );
        }
        else if($response->status_code == 200)
        {
            $output = array(
                "status"      => 200,
                "message"     => $response->message
            );
            if($this->input->post('name') == 'pancard')
            {
                $vdata['is_valid_pan'] = 1;
            }else if($this->input->post('name') == 'adharcard'){
                $vdata['is_valid_aadhar_no'] = 1;
            }else if($this->input->post('name') == 'gstin'){
                $vdata['is_valid_gstin'] = 1;
            }else if($this->input->post('name') == 'licence'){
                $vdata['is_valid_licence'] = 1;
            }
            $this->load->model('common_model');
            $this->common_model->data_update("tbl_partners",$vdata, array("id" => $this->input->post('id')));
        }
        echo json_encode($output);
    }
    public function check_store_email_exist_or_not() 
    {
        $email = $this->input->post("email");
        if(!empty($email)) {
            $this->load->model("vendor_model");
            $check_email_exist = $this->vendor_model->check_store_email_exist_or_not($email,$this->input->post('partnerid'),$this->input->post('categoryid'));
            if($check_email_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_store_gstin_exist_or_not() {
        $gstin = $this->input->post("gstin");
        if(!empty($gstin)) {
            $this->load->model("vendor_model");
            $check_gstin_exist = $this->vendor_model->check_store_gstin_exist_or_not($gstin,$this->input->post('partnerid'));
            if($check_gstin_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_gstin()
    {
        $this->db->select('*');
        $this->db->where('gstin',$this->input->post('gstin'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'GSTIN Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_store_mobile_exist_or_not() {

        $contact_no = $this->input->post("contact_no");
        //print_r($this->input->post('partnerid'));die;
        if(!empty($contact_no)) {
            $this->load->model("vendor_model");
            $check_contact_no_exist = $this->vendor_model->check_store_mobile_exist_or_not($contact_no,$this->input->post('partnerid'),$this->input->post('categoryid'));
            //print_r($check_contact_no_exist);die;
            if($check_contact_no_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_store_name_exist_or_not() {
        $storename = $this->input->post("storename");
        if(!empty($storename)) {
            $this->load->model("vendor_model");
            $check_storename_exist = $this->vendor_model->check_store_name_exist_or_not($storename,$this->input->post('partnerid'));
            if($check_storename_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_edit_email()
    {
        $this->db->select('*');
        $this->db->where('email',$this->input->post('email'));
        $this->db->where('id !=',$this->input->post('partnerid'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Email_id Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_edit_gstin()
    {
        $this->db->select('*');
        $this->db->where('gstin',$this->input->post('gstin'));
        $this->db->where('id !=',$this->input->post('partnerid'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'GSTIN Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_edit_store_reg_no()
    {
        $this->db->select('*');
        $this->db->where('registration_no',$this->input->post('store_no'));
        $this->db->where('id !=',$this->input->post('partnerid'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Registration No is Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_edit_store_name()
    {
        $this->db->select('*');
        $this->db->where('store_name',$this->input->post('storename'));
        $this->db->where('id !=',$this->input->post('partnerid'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Store Name is Already Exists');
            return false;
        }else{
            return true;
        }
    }
    public function getlatlng($address,$city,$state=NULL,$country=NULL)
    {
        $GOOGLE_MAP_API_KEY = "AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc";
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address.$city.$state.$country).'&sensor=false&key='.$GOOGLE_MAP_API_KEY);
        
        $geo = json_decode($geo, true);
        if ($geo['status'] == 'OK') {
            $data['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
            $data['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
        }else{
            $data['latitude']="0.00";
            $data['longitude']="0.00";
        }
        return $data;   
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
            }else{
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