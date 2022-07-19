<?php
/*if($_SESSION)
{
    session_destroy();
}*/

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Partners extends CI_Controller {

    
    public function __construct(){
		parent::__construct();
        $this->load->model('Vendor_model');
	}
	public function index()
    {

        if($this->session->userdata('username'))
        {
          redirect(base_url().'Partners/dashboard');
        }
        else{
            redirect(base_url().'Partners/login');
        }  
    }
    public function login()
    {
        $data["error"] = '';
        $data["page_title"] = 'Login';
        if($this->session->userdata('registerdata'))
        {
            $this->session->unset_userdata('registerdata');
        }
        if(isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button'])){
        
            $this->load->library('form_validation');                   
            $this->form_validation->set_rules('type_category', 'Category', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                
                $where = array("email" => $this->input->post("email"), "password" => md5($this->input->post("password")),"status"=>"1");
                $this->db->select('*');
                $this->db->from('tbl_partners');
                $this->db->where($where);
                $q = $this->db->get()->row();
                //print_r($q);die;
                //$this->session->sess_destroy();
                if (!empty($q)) {
                    if($q->category == $this->input->post("type_category"))
                    {
                        if($q->is_verifyotp == 1)
                        {
                        	if($q->is_fill_profile == 1)
                            {
                                if($q->status_by_admin == '1'){
                            		if($q->status == "1") {
                                        // session_start();
                                        //echo "hiii";
                                        //session_destroy();
                                        //exit;
                                        
                                        $userdata = array(
                                            'username' => $q->name,
                                            'useremail' => $q->email,
                                            'userid'    => $q->id,
                                            'userstatus' => $q->status,
                                            'usercategory' => $q->category,

                                        );
                                        
                                        //print_r($userdata);die;
                                        $this->session->set_userdata($userdata);
                                        $data = $this->session->userdata;
                                        $this->session->set_flashdata('login_message', '<div class="alert background-success alert-dismissible" id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>User login successfully.</div>');
                                        
                                            redirect(base_url().'my-dashboard');
                                        exit;

                                    } else {
                                        $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> You Are User. </div>';
                                    }

                            	}else{
                            		$data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error ! </strong> Your account is not approval. Please contact to admin. </div>';
                            	}
                            }
                            else{
                                if($q->category == 1 || $q->category == 2 || $q->category == 3){
                                    redirect(base_url().'storeprofile-setting/'.$q->id);
                                }else{
                                  redirect(base_url().'profile-setting/'.$q->id);  
                                }
                            }
                        }else{
                            $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error ! </strong> Your OTP is not Verify. Please Verify OTP. </div>';
                            redirect(base_url().'otp-check/'.$q->id);
                            exit;
                        }
                    }
                    else{
                        $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Please Select Valid Category</div>';
                    }
                    
                } else {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Invalid Username and password </div>';
                }
            }

        }
        $this->load->model('services_model');
        $data['parent_services'] = $this->services_model->get_parent_service_list();
        $this->load->view('front/login',$data);
    }
    public function my_dashboard()
    {
        
        if($this->session->userdata('username'))
        {
            $this->load->model('admin_model');
            if($_SESSION['usercategory'] == 1)
            {
                $data['countMedicines'] = $this->admin_model->count_active_medicine($_SESSION['userid']); 
                $data['countPending'] = $this->admin_model->count_orders($_SESSION['usercategory'],$_SESSION['userid'],1);
                $data['countComplete'] = $this->admin_model->count_orders($_SESSION['usercategory'],$_SESSION['userid'],4);
                $data['countCancel'] = $this->admin_model->count_orders($_SESSION['usercategory'],$_SESSION['userid'],5);
                $data['countReject'] = $this->admin_model->count_orders($_SESSION['usercategory'],$_SESSION['userid'],6);   
            }
            else
            {
                $data['countPending'] = $this->admin_model->count_appoitment($_SESSION['usercategory'],$_SESSION['userid'],1);
                $data['countComplete'] = $this->admin_model->count_appoitment($_SESSION['usercategory'],$_SESSION['userid'],4);
                $data['countCancel'] = $this->admin_model->count_appoitment($_SESSION['usercategory'],$_SESSION['userid'],5);
                $data['countReject'] = $this->admin_model->count_appoitment($_SESSION['usercategory'],$_SESSION['userid'],6);
                if($_SESSION['usercategory'] == 2)
                {
                    $data['countTestpathology'] = $this->admin_model->count_active_pathologytest($_SESSION['userid']);
                }
                else if($_SESSION['usercategory'] == 3)
                {
                    $data['countTestradiology'] = $this->admin_model->count_active_radiologytest($_SESSION['userid']);
                }
            }
            $this->load->ptemplate('partner/dashboard',$data);
        }else{
        	redirect(base_url().'Partners/login');
        }
        
    }

    public function profile()
    {
        $data['title'] = 'View Profile';
        $data['data'] = $this->Vendor_model->get_vendor_by_id($_SESSION['userid']);
        // $data["partner_work_exp"] = $this->Vendor_model->get_partner_work_exp_by_id($_SESSION['userid']);
        $this->load->model('World_wide_model');

        $data['countryname'] = $this->World_wide_model->get_country_list_by_id($data['data']['country']);
        $data['statename'] = $this->World_wide_model->get_state_list_by_id($data['data']['state']);
        $data['cityname']  = $this->World_wide_model->get_city_list_by_id($data['data']['city']);
        $data['storedata'] = $this->Vendor_model->get_partner_profile_by_id($_SESSION['userid']);
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($data["storedata"]->id);
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
        if($data['storedata']->category != 1 || $data['storedata'] ->category != 2 || $data['storedata'] ->category != 3)
        {
            $data["partner_work_exp"] =json_decode($data["storedata"]->work_exp);
        }
        $this->load->ptemplate('partner/profile',$data);
    }
    
    public function editProfile()
    {
        $output = '';
        $data = $this->Vendor_model->get_vendor_by_id($this->input->post('userId'));
        $this->load->model('World_wide_model');

        if(empty($data) || $data == '')
        {
            $output = array(
                "Status"       => 1,
                "Message"      =>"No Data Found!",
            );
        }else{
            $image = base_url().'uploads/'.$data['profile'];
            $dataCountry = $this->db->get('tbl_countries')->result();
            $dataState = $this->db->get('tbl_states')->result();
            $dataCity = $this->db->get('tbl_cities')->result();
            //print_r($dataCountry);die;
            $country = "";
            $state = "";
            $city = "";
            foreach($dataCountry as $row)
            {
                $country .= "<option value='".($row->id)."' ".(($row->id == $data['country']) ? "selected" : "").">".$row->name."</option>";
            }
            foreach($dataState as $row)
            {
                $state .= "<option value='".($row->id)."' ".(($row->id == $data['state']) ? "selected" : "").">".$row->name."</option>";
            }
            foreach($dataCity as $row)
            {
                $city .= "<option value='".($row->id)."' ".(($row->id == $data['city']) ? "selected" : "").">".$row->name."</option>";
            }
            

            $output = array(
                "Status"        => 200,
                "name"          => $data['name'],
                "categoryname"  => $data['category_name'],
                "password"      => $data['org_password'],
                "email"         => $data['email'],
                "contactno"     => $data['contact_no'],
                "image"         => $image,
                "location"      => $data['location'],
                "city"          => $city,
                "state"         => $state,
                "country"       => $country
            );
        }
        echo json_encode($output);

    }
    public function saveProfile()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email Id','trim|valid_email|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('mobile','Mobile No','trim|required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('location','Location','trim|required');
        $this->form_validation->set_rules('country','Country','trim|required');
        $this->form_validation->set_rules('state','State','trim|required');
        $this->form_validation->set_rules('city','City','trim|required');

        
        if($this->form_validation->run()==FALSE)
        {
            $response = array(
                'error'           => true,
                'name_error'      => form_error('name'),
                'email_error'     => form_error('email'),
                'username_error'  => form_error('username'),
                'password_error'  => form_error('password'),
                'mobile_error'    => form_error('mobile'),
                'location_error'  => form_error('location'),
                'country_error'   => form_error('country'),
                'state_error'     => form_error('state'),
                'city_error'      => form_error('city')
            );
        }
        else
        {
            if($this->input->post('image_base64') != '')
            {
                $croped_image = $this->input->post('image_base64');

                list($type, $croped_image) = explode(';', $croped_image);
                list(, $croped_image)      = explode(',', $croped_image);
                $croped_image = base64_decode($croped_image);

                $imageName = md5(microtime(true)).'.jpg';

                file_put_contents('./uploads/'.$imageName, $croped_image);
                $this->load->model('vendor_model');
                $data_old = $this->vendor_model->get_vendor_by_id($this->input->post('userId'));
                if($data_old['profile'] != 'no-image.png')
                {
                    if(file_exists(FCPATH."./uploads/".$data_old['profile']))
                    {
                        unlink(FCPATH."./uploads/".$data_old['profile']);    
                    }
                }

                $data = [
                    'profile'         => $imageName
                ];
                $this->db->where('id',$this->input->post('userId'));
                $this->db->update('tbl_partners',$data);
            }
            $latlong=$this->getlatlng($this->input->post('location'),$this->input->post('city'));
            $data = [
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'contact_no'     => $this->input->post('mobile'),
                'password'      => md5($this->input->post('password')),
                'org_password'  => $this->input->post('password'),
                'location'      => $this->input->post('location'),
                'city'          => $this->input->post('city'),
                'state'         => $this->input->post('state'),
                'country'       => $this->input->post('country'),
                "latitude"      => $latlong['latitude'],
                "longitude"     => $latlong['longitude'],
            ];
            $this->db->where('id',$this->input->post('userId'));
            $this->db->update('tbl_partners',$data);
            $response = array(
                'success' => 'User Saved Successfully'
            );
        }
        echo json_encode($response);
    }
    public function forgot_password()
    {
        $data['page_title'] = 'Forgot Password';
        $data["error"] = '';
        if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button'])){
            $this->load->library('form_validation');                   
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('type_category', 'Category', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                $where = array("email" => $this->input->post("email"),"status"=>"1","category" => $this->input->post("type_category"));
                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where($where);
                $q = $this->db->get()->row();
                if(!empty($q)) {
                    if($q->status == "1") {
                        $this->load->config('email');
                        $this->load->library('email');
                        $from = $this->config->item('smtp_user');

                        $subject = "Forgot Password";
                        $domainname=base_url();
                        $message = 'Your Password :'.$q->org_password;
                        $this->email->set_newline("\r\n");
                        $this->email->from($from);
                        $this->email->to($q->email);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        $this->email->send();
                        redirect(base_url('login'));
                        exit;
                    } else {
                        $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Error!</strong> You Not Are User. </div>';
                    }
                }else {
                    $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Error!</strong> Invalid email id </div>';
                }
            }

        } 
        $this->load->model('services_model');
        $data['parent_services'] = $this->services_model->get_parent_service_list();
        $this->load->view('front/forgotpassword',$data);
        
    }
    
    
    public function store_profile($id)
    {
        $data["error"] = '';
        $data["page_title"] = 'Profile Setting'; 
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('id',$id);
        $data['rowd']= $this->db->get()->row();
         if(isset($_REQUEST) && !empty($_REQUEST['save_button'])){
            $this->load->library('form_validation'); 
            //$this->form_validation->set_rules('storename', 'Store Name', 'trim|required|callback_check_store_name');
            // if($this->input->post('chooseID') == '2'){
                $this->form_validation->set_rules('pan', 'PAN', 'trim|required|min_length[10]|max_length[10]');

            // }else if($this->input->post('chooseID') == '1'){
            // $this->form_validation->set_rules('adharcard_no', 'Aadharcard no', 'trim|required|min_length[12]|max_length[12]');

            // }
            $this->form_validation->set_rules('location', 'Location', 'trim|required');
            // if($this->input->post('optradio') == 1)
            // {
            // }
            // if($this->input->post('optradio') == 2)
            // {
            //     $this->form_validation->set_rules('manuallylocation', 'Location', 'trim|required');
            // }
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('state', 'State', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');  
            
            //$this->form_validation->set_rules('gstin', 'GSTIN', 'trim|required|min_length[15]|max_length[15]|callback_check_gstin');
            if($data['rowd']->category == 1)
            {
                $this->form_validation->set_rules('licence_no', 'Licence No', 'trim|required');
                $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
            }
            else{
                $this->form_validation->set_rules('UG_uni', 'UG Univercity', 'trim|required');
                $this->form_validation->set_rules('UG_year', 'Passing Year', 'trim|required');
            }
            
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            
            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            }else {
                    
                    $ddata=array();
                    
                    $this->load->model("World_wide_model");
                    $latitude = '';
                    $longitude = '';
                    $location = '';
                    
                    $location = $this->input->post('location');
                    $latitude = $this->input->post('g_lat');
                    $longitude = $this->input->post('g_lng');
                   

                    if($this->input->post('opttiming') == 1)
                    {
                        $open_timing = '24/7';
                    }else{
                        // $open_timing = implode(",",$this->input->post('check')); 
                        $open_timing = "Custom"; 
                    }
                    if($data['rowd']->category == 2){
                        if($this->input->post("is_homesample") == 1 || $this->input->post("is_homesample") == '1')
                        {
                            $is_homesample = '1';
                        }else{
                            $is_homesample = '0';
                        }
                        
                    }else{
                        $is_homesample = '0';
                    }

                    $location = $this->input->post('location');
                    
                    $flat_block = $this->input->post('flat_block');
                    
                    $address = $flat_block ." ". $location;

                    $ddata = [
                        'store_name'    => $this->input->post('storename'),
                        'address'       => $address,
                        'country'       => $this->input->post('country'),
                        'state'         => $this->input->post('state'),
                        'city'          => $this->input->post('city'),
                        'pincode'       => $this->input->post('pincode'),
                        'map_link'      => $this->input->post('map_link'),
                        'latitude'      => $latitude,
                        'longitude'     => $longitude,
                        'is_homesample' => $is_homesample,
                        'charges'       => $this->input->post("charges") ? $this->input->post("charges") : '',
                        'description'   => $this->input->post('comment'),
                        'pan'           => $this->input->post('pan'),
                        'adharcard_no'  => $this->input->post('adharcard_no'),
                        'gstin'         => $this->input->post('gstin'),
                        'licence_no'    => $this->input->post('licence_no'),
                        'registration_no'=> $this->input->post('store_no'),
                        'gender'        => $this->input->post('gender'),
                        'open_timing'   => $this->input->post('time_schedule'),
                        'qualification' => $this->input->post('qualification'),
                        'ug_uni'        => $this->input->post('UG_uni'),
                        'ug_year'       => $this->input->post('UG_year'),
                        'ug_mci'        => $this->input->post('UG_MCI'),
                        'ug_reg_no'     => $this->input->post('UG_reg_no'),
                        'ug_mci_year'  => $this->input->post('UG_MCI_year'),
                        'amount'       => $this->input->post('amount'),
                        'owner_name'=> $this->input->post("name") ? $this->input->post("name") : '',
                        'is_fill_profile' => 1
                    ];

                  
                    if ($_FILES["profile"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["profile"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('profile_images_path');
                        $ddata['profile'] = newuploadusingcompress($_FILES["profile"], $uploadpath);
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
                        $ddata['pancard'] = newuploadusingcompress($_FILES["pancard"], $uploadpath);
                    }
                    
                    if ($_FILES["sign_board"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/sign_board';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["sign_board"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('sign_board_images_path');
                        $ddata['sign_board'] = newuploadusingcompress($_FILES["sign_board"], $uploadpath);
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
                        $ddata['gstin_certificate'] = newuploadusingcompress($_FILES["gstin_certificate"], $uploadpath);
                    }
                    if($data['rowd']->category == 1)
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
                        $ddata['bpharm_licence'] =newuploadusingcompress($_FILES["bpharm_lience"], $uploadpath);
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
                        $ddata['degree_certificate'] = newuploadusingcompress($_FILES["degree_certi"], $uploadpath);
                    }
                    }else{
                        if ($_FILES["UG_certificate"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/UG_PG_certi';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["UG_certificate"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('ug_pg_images_path');
                        $ddata['ug_certificate'] = newuploadusingcompress($_FILES["UG_certificate"], $uploadpath);
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
                        $ddata['ug_mci_certificate'] = newuploadusingcompress($_FILES["UG_MCI_certificate"], $uploadpath);
                    }   
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
                        $ddata['corporation'] = newuploadusingcompress($_FILES["corporation"], $uploadpath);
                    }

                    if ($_FILES["stamp"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/stamp';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["stamp"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('stamp_images_path');
                        $ddata['stamp'] = newuploadusingcompress($_FILES["stamp"], $uploadpath);
                    }


                    if ($_FILES["symbol"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/symbol';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["symbol"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('symbol_images_path');
                        $ddata['symbol'] = newuploadusingcompress($_FILES["symbol"], $uploadpath);
                    }

                    $this->load->model("common_model");
                    $ddata['created_at'] = date('Y-m-d H:i:s');
                    $update = $this->common_model->data_update("tbl_partners", $ddata, array("id" => $id));
                   
                  

                    $vdata= array();
                    $vdata = [
                        'partner_id' => $id
                    ];
                    $this->common_model->data_insert("tbl_documents_status", $vdata); 
                    
                    if (isset($id) && !empty($id)){ 
                        for ($i=0; $i < count($_FILES["store_image"]["name"]) ; $i++) { 
                                if ($_FILES["store_image"]["size"][$i] > 0) 
                                {
                                    $idatad['name'] = $_FILES["store_image"]["name"][$i];
                                    $idatad['type'] = $_FILES["store_image"]["type"][$i];
                                    $idatad['tmp_name'] = $_FILES["store_image"]["tmp_name"][$i];
                                    $idatad['error'] = $_FILES["store_image"]["error"][$i];
                                    $idatad['size'] = $_FILES["store_image"]["size"][$i];
                                    $config['upload_path'] = './uploads/profile_setting/store_image';
                                    
                                    $this->upload->initialize($config);
                                    $this->load->library('upload', $config);
                                    $temp = explode(".", $_FILES["store_image"]["name"][$i]);
                                    $newfilename = time() . '.' . end($temp);
                                    $uploadpath = $this->config->item('store_images_path');
                                    $file_name = newuploadusingcompress($idatad, $uploadpath);
                                    $idata['store_id'] = $id;
                                    $idata['images'] = $file_name; 
                                   
                                    $this->load->model("common_model");  
                                    $this->common_model->data_insert("tbl_store_images", $idata); 
                                } 
                        }
                }
                redirect(base_url().'partners/profilefill-successfully');
                exit;
                }
         } 
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $language_id = 1 ;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['country'] = $this->World_wide_model->fetch_country();
        $data['state'] = $this->World_wide_model->fetch_all_india_state();
        $this->load->view('front/profile_setting',$data);

    }
    
    
    public function success_registration()
    {
        $data["page_title"] = 'Successfully'; 
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $language_id = 1 ;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $this->load->view('front/profile_setting_success',$data);
    }
    public function store_profile_edit()
    {
        $data = array();
        $data["error"] = "";
        $data["title"] = PROJECT_NAME;
        $data['page_title'] = "Edit Profile";
        $data['action'] = "Edit";
        $partner_id = $this->session->userdata('userid');
        $this->load->model("Vendor_model");
        $data["profile_records"] = $this->Vendor_model->get_partner_profile_by_id($partner_id);
        if($data["profile_records"]->open_timing=="24/7")
        {
           $data['time_id'] = '1'; 
           $data['storetiming'] = $data["profile_records"]->open_timing;
        }
        else
        {
            $data['time_id'] = '2';
            $data['storetiming'] = json_decode($data["profile_records"]->open_timing);
        }
        $data["store_images"] = $this->Vendor_model->get_partner_store_images_by_id($data["profile_records"]->id);
        if($partner_id >= 1)
        {
            if (isset($_REQUEST))
            {
                // echo "<pre>";
                // print_r($_REQUEST);
                // exit;
                $this->load->library('form_validation');                      
                
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                
                if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                }else {
                    $ddata=array();
                        $dob = NULL;
                        if($this->input->post('dob') && !empty($this->input->post('dob'))) {
                            $dob = $this->input->post('dob');
                        } 
                   
                    $open_timing=null;
                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                     {
                         if($this->input->post('opttiming') == 1)
                         {
                             $open_timing = '24/7';
                         }else{
                             $open_timing = $this->input->post('time_schedule');
                         }
                     }
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

                    if ($_FILES["symbol"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/symbol';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["symbol"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('symbol_images_path');
                        $symbol = newuploadusingcompress($_FILES["symbol"], $uploadpath);
                    }else{
                        $symbol = $data["profile_records"]->symbol;
                    }

                    if ($_FILES["stamp"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/stamp';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["stamp"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('stamp_images_path');
                        $stamp = newuploadusingcompress($_FILES["stamp"], $uploadpath);
                    }else{
                        $stamp = $data["profile_records"]->stamp;
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
                    //     $adharcard = newuploadusingcompress($_FILES["adharcard"], $uploadpath);
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
                    //     $adharcard_back = newuploadusingcompress($_FILES["adharcard_back"], $uploadpath);
                    // }else{
                    //     $adharcard_back = $data["profile_records"]->adharcard_back;
                    // }
                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                    {
                        $ddata = [
                            // 'service'       => $this->input->post('services'),
                            // 'charges'       => $this->input->post('charges'),
                            // 'delivery_from' => $this->input->post('delivery_from'),
                            // 'delivery_to'   => $this->input->post('delivery_to'),
                            'description'   => $this->input->post('comment'),
                            'open_timing'   =>$open_timing,
                            'name'          => $this->input->post('name'),
                            'contact_no'          => $this->input->post('contact_no'),
                            'gender'        => $this->input->post('gender'),
                            'password'      => md5($this->input->post('password')),
                            'org_password'  => $this->input->post('password'),
                            'profile'       => $profile,
                            'pancard'       => $pancard,
                            'account_no'    => $this->input->post('account_no'),
                            'account_name'  => $this->input->post('account_name'),
                            'ifsc_code'  => $this->input->post('ifsc_code'),
                            'stamp'  => $stamp,
                            'symbol'  => $symbol
                        ];
                    }else{
                    $mdata = [
                        'name'    => $this->input->post('name'),
                        'age'     => $age,
                        'gender'  => $this->input->post('gender'),
                        'password'=> md5($this->input->post('password')),
                        'org_password'  => $this->input->post('password'),
                        'profile' => $profile,
                        'pancard' => $pancard,
                        'account_no'    => $this->input->post('account_no'),
                        'contact_no'    => $this->input->post('contact_no'),
                        'account_name'  => $this->input->post('account_name'),
                        'ifsc_code'  => $this->input->post('ifsc_code'),
                        'open_timing'   =>$open_timing,
                    ];
                    }

                    $this->load->model("common_model");
                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                    {
                        $finaldata = $ddata;
                    }else{
                        $finaldata = $mdata;
                    }

                    $finaldata['dob'] = $dob;

                    $this->common_model->data_update("tbl_partners",$finaldata, array("id" => $partner_id));
                    if($data["profile_records"]->category == 1 || $data["profile_records"]->category == 2 || $data["profile_records"]->category == 3 )
                    {
                    for ($i=0; $i < count($_FILES["store_image"]["name"]) ; $i++) 
                    { 
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
                    redirect("partners/profile");
                    exit;
                }
            }
            $this->load->ptemplate('partner/profile_setting_edit', $data);
        }
        else
        {
            redirect('partners/login');
        } 
    }
    public function my_profile($id)
    {
        $data["error"] = '';
        $data["page_title"] = 'Profile Setting';
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('id',$id);
        $data['rowd']= $this->db->get()->row();
        $this->load->model('services_model');
        $data['speciality_list'] = $this->services_model->get_sub_service_list($data['rowd']->category);
        if(isset($_REQUEST) && !empty($_REQUEST['save_button'])){
            $this->load->library('form_validation');                   
            $this->form_validation->set_rules('dob', 'DOB', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('country', 'Country', 'trim');
            $this->form_validation->set_rules('state', 'State', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('pincode', 'Pincode', 'trim|min_length[6]|max_length[6]');
            $this->form_validation->set_rules('UG_college', 'College', 'trim|required');
            if($data['rowd']->category == 4)
            {
                $this->form_validation->set_rules('UG_speciality', ' Speciality', 'trim|required');
            }
                $this->form_validation->set_rules('UG_course', 'Course', 'trim|required');
            
            $this->form_validation->set_rules('UG_uni', 'Univercity', 'trim|required');
            $this->form_validation->set_rules('UG_year', 'Passing Year', 'trim|required');
            if($this->input->post('chooseID') == '2'){
                $this->form_validation->set_rules('pan', 'PAN', 'trim|required|min_length[10]|max_length[10]');

            }else if($this->input->post('chooseID') == '1'){
            $this->form_validation->set_rules('adharcard_no', 'Aadharcard no', 'trim|min_length[12]|max_length[12]');
            }

            if(count($data['speciality_list']) > 0)
            {
                $this->form_validation->set_rules('speciality', 'Speciality', 'trim|required');
            }
            if($this->input->post('optradio') == 1)
            {
                $this->form_validation->set_rules('location', 'Location', 'trim|required');
            }
            if($this->input->post('optradio') == 2)
            {
                $this->form_validation->set_rules('manuallylocation', 'Location', 'trim|required');
            }
            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            }else {
                    $ddata=array();
                    $this->load->model("World_wide_model");
                    $latitude = '';
                    $longitude = '';
                    $location = '';
                    if($this->input->post('optradio') == 1)
                    {
                        
                        $latitude = $this->input->post('g_lat');
                        $longitude = $this->input->post('g_lng');
                    } else {
                        $location = $this->input->post('manuallylocation');
                        $latlong=$this->getlatlng($location,$this->input->post('city'));
                        $latitude = $latlong['latitude'];
                        $longitude = $latlong['longitude'];
                    }

                    $location = $this->input->post('location');
                    
                    $flat_block = $this->input->post('flat_block');
                    
                    $address = $flat_block ." ". $location;

                    $this->load->model("common_model");
                    
                    $ddata = [
                        'gender'   => $this->input->post('gender'),
                        'dob'      => date("Y-m-d", strtotime($this->input->post('dob'))),
                        'address'  => $address,
                        'country'  => $this->input->post('country'),
                        'state'    => $this->input->post('state'),
                        'city'     => $this->input->post('city'),
                        'pincode'  => $this->input->post('pincode'),
                        'latitude' => $latitude,
                        'longitude'=> $longitude,
                        'ug_college'=> $this->input->post('UG_college'),
                        'pan'       => $this->input->post('pan'),
                        'adharcard_no'=> $this->input->post('adharcard_no'),
                        'ug_uni'    => $this->input->post('UG_uni'),
                        'ug_course' => $this->input->post('UG_course'),
                        'ug_speciality' => $this->input->post('UG_speciality'),
                        'ug_uni'    => $this->input->post('UG_uni'),
                        'ug_year'   => $this->input->post('UG_year'),
                        'work_exp'  => $this->input->post('TAbleDataArray'),
                        'ug_mci'   => $this->input->post('UG_MCI'),
                        'ug_reg_no'=> $this->input->post('UG_reg_no'),
                        'ug_mci_year'=> $this->input->post('UG_MCI_year'),
                        'speciality'=> $this->input->post('speciality'),
                        'is_homevisit'=> $this->input->post('is_homevisit'),
                        'is_online'=> $this->input->post('is_online'),
                        'is_fill_profile' => 1
                    ];
                    if ($_FILES["profile"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["profile"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('profile_images_path');
                        $ddata['profile'] = newuploadusingcompress($_FILES["profile"], $uploadpath);
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
                        $ddata['pancard'] = newuploadusingcompress($_FILES["pancard"], $uploadpath);
                    }
                   
                    if ($_FILES["UG_certificate"]["size"] > 0)
                    {
                        $config['upload_path'] = './uploads/profile_setting/UG_PG_certi';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $temp = explode(".", $_FILES["UG_certificate"]["name"]);
                        $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                        $uploadpath = $this->config->item('ug_pg_images_path');
                        $ddata['ug_certificate'] = newuploadusingcompress($_FILES["UG_certificate"], $uploadpath);
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
                        $ddata['ug_mci_certificate'] = newuploadusingcompress($_FILES["UG_MCI_certificate"], $uploadpath);
                    }
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    
                 
                    $this->common_model->data_update("tbl_partners", $ddata, array("id" => $id));
                    $vdata= array();
                    $vdata = [
                        'partner_id' => $id
                    ];
                    $this->common_model->data_insert("tbl_documents_status", $vdata);
                    redirect(base_url().'partners/profilefill-successfully');
                    exit;
                }
         } 
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $language_id = 1 ;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['country'] = $this->World_wide_model->fetch_country();
        $data['state'] = $this->World_wide_model->fetch_all_india_state();
        $this->load->view('front/myprofile_setting',$data);

    }
    public function app_setting()
    {
        $partner_id = $this->session->userdata('userid');
        if($partner_id > 1) {
            $data = array();
            $data["error"] = "";
            $data["page_title"] = "App Settings";
            $this->load->model("admin_model");
            $data['app_setting']=$this->admin_model->get_partner_appsetting($partner_id);
            
            if(isset($_REQUEST)){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('delivery_charge', 'Charge', 'trim|required');                   
                $this->form_validation->set_rules('return_policy', 'Policy','trim|required');                   
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                }else{
                    $ddata=array();
                    $ddata['delivery_charge'] = $this->input->post("delivery_charge") ? $this->input->post("delivery_charge") : '';
                    $ddata['return_policy'] = $this->input->post("return_policy") ? $this->input->post("return_policy") : '';
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_partners", $ddata,array("id" => $partner_id));
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> App Setting Updated Successfully
                            </div>');
                    redirect("partners/app-setting");
                    exit;
                }
            }
            $this->load->ptemplate('partner/setting/appsetting',$data);
        }else{
            redirect(base_url().'partners');    
            exit;
        }
    }
    
    public function check_email()
    {
        $this->db->select('*');
        $this->db->where('email',$this->input->post('email'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Email_id Already Exists');
            return false;
        }
        else
        {
            return true;
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
    public function check_store_reg_no()
    {
        $this->db->select('*');
        $this->db->where('registration_no',$this->input->post('store_no'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Registration No is Already Exists');
            return false;
        }
        else
        {
            return true;
        }
    } 
    
    public function check_store_name()
    {
        $this->db->select('*');
        $this->db->where('store_name',$this->input->post('storename'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Store Name is Already Exists');
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
        $this->db->where('id !=',$this->session->userdata('userid'));
        if($this->db->get('tbl_partners')->num_rows() > 0){
            $this->form_validation->set_message(__FUNCTION__, 'Store Name is Already Exists');
            return false;
        }
        else
        {
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
        }
        else
        {
            $data['latitude']="0.00";
            $data['longitude']="0.00";
        }

        return $data;   
    }
    public function check_become_partners_email_exist_or_not() {
        $email = $this->input->post("email");
        $category = $this->input->post('category');
        //print_r($email);die;
        if(!empty($email) && !empty($category)) {
            $this->load->model("vendor_model");
            $check_email_exist = $this->vendor_model->check_become_partners_email_exist_or_not($email,$category);
            if($check_email_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_become_partners_pancard_exist_or_not() {
        $pan = $this->input->post("pan");
        if(!empty($pan)) {
            $this->load->model("vendor_model");
            $check_pan_exist = $this->vendor_model->check_become_partners_pancard_exist_or_not($pan);
            if($check_pan_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_become_partners_adharcard_exist_or_not() {
        $adharcard_no = $this->input->post("adharcard_no");
        if(!empty($adharcard_no)) {
            $this->load->model("vendor_model");
            $check_adharcard_exist = $this->vendor_model->check_become_partners_adharcard_exist_or_not($adharcard_no);
            if($check_adharcard_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_store_email_exist_or_not() {
        $email = $this->input->post("email");
        if(!empty($email)) {
            $this->load->model("vendor_model");
            $check_email_exist = $this->vendor_model->check_store_email_exist_or_not($email,$this->session->userdata('userid'));
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
            $check_gstin_exist = $this->vendor_model->check_store_gstin_exist_or_not($gstin,$this->session->userdata('userid'));
            if($check_gstin_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_store_mobile_exist_or_not() {
        $contact_no = $this->input->post("contact_no");

        if(!empty($contact_no)) {
            $this->load->model("vendor_model");
            $check_contact_no_exist = $this->vendor_model->check_store_mobile_exist_or_not($contact_no,$this->session->userdata('userid'));
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
        //print_r($storename);die;
        if(!empty($storename)) {
            $this->load->model("vendor_model");
            $check_storename_exist = $this->vendor_model->check_store_name_exist_or_not($storename,$this->session->userdata('userid'));
            if($check_storename_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }
    public function check_become_partners_mobile_exist_or_not() {
        $phone = $this->input->post("number");
        $category = $this->input->post('category');
        if(!empty($phone)) {
            $this->load->model("vendor_model");
            $check_email_exist = $this->vendor_model->check_become_partners_mobile_exist_or_not($phone,$category);
            if($check_email_exist>0){
                 echo "false";
                 exit;
            } else {
                 echo "true";
                 exit;
            }
        }
    }

    public function logout()
    {
        $session = $this->session->all_userdata();
        unset($_SESSION['useremail']);
        redirect(base_url());
    }
}
?>