<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('admin_id'))
        {
          redirect(base_url().'admin/dashboard');
        }
        else{
            $data['title'] = 'Login';
            $this->load->view('admin/login',$data);
        }  
    }
    public function check_login()
    {
        $user = $this->db->get_where('tbl_admin',['username' => $this->input->post('username')])->result_array();

        if($user){
            if($user[0]['password'] === md5($this->input->post("password")) && $user[0]['activestatus'] == 'Y')
            {
                $this->session->set_userdata('is_manage_modules',$user[0]['is_manage_modules']);
                $this->session->set_userdata('admin_id',$user[0]['admin_id']);
                $this->session->set_userdata('conatctno',$user[0]['contactno']);
                $this->session->set_userdata('role',$user[0]['role']);
                echo "Successfully";
            }else{
                echo "Your Password is Wrong Please Try Again..";
            }
        }else{
            echo "Plese Enter Valid Username Id..";
        }
        //print_r($this->session->userdata('is_manage_modules'));die;

    }
    public function dashboard()
    {
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model("common_model");

        // $partners = $this->admin_model->get_all_partners_data();
        // if(count($partners)>0){
        //     foreach($partners as $p=>$v) {
              
        //         $id = $v->id;
        //         $address = $v->address;
        //         $country_id = $v->country;
        //         $state_id = $v->state;
        //         $city_id = $v->city;
        //         $pincode = $v->pincode;
              
        //         $ddata = array();
        //         if(!empty($city_id) && isset($city_id)) {
        //             // get city details 
        //             $city_details = $this->World_wide_model->get_city_list_by_id($city_id);
        //             if(isset($city_details) && !empty($city_details)) {
        //                 $city_name = $city_details->name;
        //                 $ddata['city'] = $city_name;
        //             }
        //         }

        //         if(!empty($state_id) && isset($state_id)) {
        //             // get state details 
        //             $state_details = $this->World_wide_model->get_state_list_by_id($state_id);
        //             if(isset($state_details) && !empty($state_details)) {
        //                 $state_name = $state_details->name;                       
        //                 $ddata['state'] = $state_name;
        //             }
        //         }

        //         if(!empty($country_id) && isset($country_id)) {
        //             // get country details 
        //             $country_details = $this->World_wide_model->get_country_list_by_id($country_id);
        //             if(isset($country_details) && !empty($country_details)) {
        //                 $country_name = $country_details->name;
        //                 $ddata['country'] = $country_name;
        //             }
        //         }

        //         if(isset($ddata) && count($ddata)>0){
        //             $this->common_model->data_update("tbl_partners", $ddata,array("id" => $id));
        //             echo $this->db->last_query();
        //         }
        //      }
        // }

  
        $data['countPending'] = $this->admin_model->count_pending_partners();
        $data['countPharmcy'] = $this->admin_model->count_register_partners(1);
        $data['countPathology'] = $this->admin_model->count_register_partners(2);
        $data['countRadiology'] = $this->admin_model->count_register_partners(3);
        $data['countDoctors'] = $this->admin_model->count_register_partners(4);
        $data['countAnimal'] = $this->admin_model->count_register_partners(5);
        $data['countNurse'] = $this->admin_model->count_register_partners(6);
        $data['countPhysio'] = $this->admin_model->count_register_partners(7);
        $data['countPatient'] = $this->admin_model->count_register_patient(8);
        $test_data = array();
        for($i = 0; $i <= 12; $i++)
        {
            $data1 = $this->admin_model->get_monthly_count(1,$i,date("Y")).",";
            $data2 = $this->admin_model->get_monthly_count(2,$i,date("Y")).",";
            $data3 = $this->admin_model->get_monthly_count(3,$i,date("Y")).",";
            $data4 = $this->admin_model->get_monthly_count(4,$i,date("Y")).",";
            $data5 = $this->admin_model->get_monthly_count(5,$i,date("Y")).",";
            $data6 = $this->admin_model->get_monthly_count(6,$i,date("Y")).",";
            $data7 = $this->admin_model->get_monthly_count(7,$i,date("Y")).",";
            $data8 = $this->admin_model->get_monthly_count(8,$i,date("Y")).",";
            $test_data[] = $data1;
            $test_data1[] = $data2;
            $test_data2[] = $data3;
            $test_data3[] = $data4;
            $test_data4[] = $data5;
            $test_data5[] = $data6;
            $test_data6[] = $data7;
            $test_data7[] = $data8;
            $data['value'] = $test_data;
            $data['value1'] = $test_data1;
            $data['value2'] = $test_data2;
            $data['value3'] = $test_data3;
            $data['value4'] = $test_data4;
            $data['value5'] = $test_data5;
            $data['value6'] = $test_data6;
            $data['value7'] = $test_data7;
            $data['not_access'] = '';
        } 
        $this->load->template('admin/dashboard',$data);
    }
    
    public function change_status() {
        $table = $this->input->post("table");
        $id = $this->input->post("id");
        $on_off = $this->input->post("on_off");
        $id_field = $this->input->post("id_field");
        $status = $this->input->post("status");
        $this->load->model("common_model");
        $this->common_model->data_update($table, array("$status" => $on_off), array("$id_field" => $id));
        echo $_POST['on_off'];

    }
    public function forgot_password()
    {
        $data['page_title'] = 'Forgot Password';
        $data["error"] = '';
        if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button'])){
            //print_r(1);die;
            $this->load->library('form_validation');                   
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                $where = array("email" => $this->input->post("email"),"activestatus"=>"Y");
                $this->db->select('*');
                $this->db->from('tbl_admin');
                $this->db->where($where);
                $q = $this->db->get()->row();
                //print_r($q);die;
                if(!empty($q)) {
                    if($q->activestatus == "Y") {
                        send_mail($q['email'],$q['org_password'],$q['name']);
                        
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
        $this->load->view('admin/forgotpassword',$data);
        
    }
    public function site()
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($admin_id >= 1) {
            $data = array();
            $data["error"] = "";
            $data["page_title"] = "Site Settings";
            $this->load->model("admin_model");
            $data['site_setting']=$this->admin_model->get_sitesetting();
            //print_r($data['site_setting']);die;

            $this->load->template('admin/setting/sitesetting',$data);
        }else{
            redirect(base_url().'login');    
            exit;
        }
        
    }

    public function saveSetting()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');                   
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('contact_mobile', 'Conatct No', 'trim|required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required|valid_email');     

        $this->form_validation->set_rules('main_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('address', 'Full Address', 'trim|required');
        $this->form_validation->set_rules('work_hours', 'Work Hours', 'trim|required');
                
               
        $ddata=array();
        $ddata['header_email'] = $this->input->post("email") ? $this->input->post("email") : '';
        $ddata['help_line'] = $this->input->post("mobile") ? $this->input->post("mobile") : '';
        
        $ddata['site_description'] =  $this->input->post("description") ? $this->input->post("description") : '';
        //print_r($ddata['site_description']);die;
        $ddata['contact_no'] = $this->input->post("contact_mobile") ? $this->input->post("contact_mobile") : '';
        $ddata['contact_email'] = $this->input->post("contact_email") ? $this->input->post("contact_email") : '';
        $ddata['main_address'] = $this->input->post("main_address") ? $this->input->post("main_address") : '';
        $ddata['address'] = $this->input->post("address") ? $this->input->post("address") : '';
        $ddata['city'] = $this->input->post("city") ? $this->input->post("city") : '';
        $ddata['brand_offices'] = $this->input->post("brand_offices") ? $this->input->post("brand_offices") : '';
        $ddata['work_hours'] = $this->input->post("work_hours") ? $this->input->post("work_hours") : '';

        $latlong=$this->getlatlng($ddata['address'],$ddata['city']);
        $ddata['latitude']= $latlong['latitude'];
        $ddata['longitude']=  $latlong['longitude'];
                    
        if ($_FILES["headerlogo"]["size"] > 0) 
        {
            $config['upload_path'] = './uploads/siteimg/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $temp = explode(".", $_FILES["headerlogo"]["name"]);
            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
            $uploadpath = $this->config->item('site_images_path');
            $ddata['header_logo'] = newuploadusingcompress($_FILES["headerlogo"], $uploadpath);
        }
                    
        $this->load->model("common_model");
        $ddata['modified_at'] = date('Y-m-d H:i:s');
        $this->common_model->data_update("tbl_site_setting", $ddata,array("id" => 1));
        redirect(base_url()."Admin/site");
        exit;
    }
    public function profile()
    {
        $data['title'] = 'View Profile';
        $data['data'] =$this->db->get_where('tbl_admin',["admin_id"=>$_SESSION['admin_id']])->row_array();
        $this->load->template('admin/setting/profile',$data);
    }
    public function editProfile()
    {
        $this->load->model('admin_model');
        $output = '';
        $data = $this->admin_model->get_admin_by_id($this->input->post('userId'));
        $category = '';
        if(empty($data) || $data == '')
        {
            $output = array(
                "Status"       => 1,
                "Message"      =>"No Data Found!",
            );
        }else{
            $image = base_url().'uploads/users/'.$data->image;
            $output = array(
                "Status"        => 200,
                "fullname"      => $data->name,
                "username"      => $data->username,
                "password"      => $data->org_password,
                "email"         => $data->email,
                "contactno"     => $data->contactno,
                "image"         => $image,
                "status"        => $data->activestatus
            );
        }
        echo json_encode($output);
    }
    public function saveProfile()
    {
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email Id','trim|valid_email|required');
        $this->form_validation->set_rules('username','User Name','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('mobile','Mobile No','trim|required|min_length[10]|max_length[15]');
        
        if($this->form_validation->run()==FALSE)
        {
            $response = array(
                'error'         => true,
                'name_error'    => form_error('name'),
                'email_error'   => form_error('email'),
                'username_error'=> form_error('username'),
                'password_error'=> form_error('password'),
                'mobile_error'  => form_error('mobile'),
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
                $this->load->model('admin_model');
                $data_old = $this->admin_model->get_admin_by_id($this->input->post('userId'));
                if($data_old->image != 'no-image.png')
                {
                    if(file_exists(FCPATH."./uploads/".$data_old->image))
                    {
                        unlink(FCPATH."./uploads/".$data_old->image);    
                    }
                }

                $data = [
                    'image'         => $imageName
                ];
                $this->db->where('admin_id',$this->input->post('userId'));
                $this->db->update('tbl_admin',$data);
            }
            $data = [
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'contactno'     => $this->input->post('mobile'),
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'org_password'  => $this->input->post('password'),
                'activestatus'  => $this->input->post("status"),
                'role'          => $this->input->post("role"),
                'datetime'      => date('Y-m-d h:i:s')
            ];
            $this->db->where('admin_id',$this->input->post('userId'));
            $this->db->update('tbl_admin',$data);
            $response = array(
                'success' => 'Admin User Saved Successfully'
            );
        }
        echo json_encode($response);
    }
    public function app_setting()
    {
        $admin_id = $this->session->userdata('admin_id');
        $role =  $this->session->userdata('role');
        if($admin_id >= 1) {
            $data = array();
            $data["error"] = "";
            $data["page_title"] = "App Settings";
            $this->load->model("admin_model");
            $data['app_setting']=$this->admin_model->get_appsetting();
            if (isset($_REQUEST)) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('pharmcy_tds_amt', 'TDS For Pharmcy', 'trim|required');
                $this->form_validation->set_rules('pharmcy_service_charge', 'Charges For Pharmcy', 'trim|required');
                $this->form_validation->set_rules('pathology_tds_amt', 'TDS For Doctor', 'trim|required');
                $this->form_validation->set_rules('pathology_service_charge', 'Charges For pathology', 'trim|required');
                $this->form_validation->set_rules('radiology_tds_amt', 'TDS For pathology', 'trim|required');
                $this->form_validation->set_rules('radiology_service_charge', 'Charges For radiology', 'trim|required');
                $this->form_validation->set_rules('doctor_tds_amt', 'TDS For radiology', 'trim|required');
                $this->form_validation->set_rules('doctor_service_charge', 'Charges For Doctor', 'trim|required');                   
                $this->form_validation->set_rules('animal_tds_amt', 'TDS For Animal Doctor', 'trim|required');
                $this->form_validation->set_rules('animal_service_charge', 'Charges For Animal Doctor', 'trim|required');
                $this->form_validation->set_rules('nurse_tds_amt', 'TDS For Nurse', 'trim|required');
                $this->form_validation->set_rules('nurse_service_charge', 'Charges For Nurse', 'trim|required');                   
                $this->form_validation->set_rules('physio_tds_amt', 'TDS For Physiotherapist', 'trim|required');
                $this->form_validation->set_rules('physio_service_charge', 'Charges For Physiotherapist', 'trim|required');
                $this->form_validation->set_rules('test_key', 'test_key', 'trim|required');                   
                $this->form_validation->set_rules('test_secrate_key', 'test_secrate_key', 'trim|required');
                $this->form_validation->set_rules('live_key', 'live_key', 'trim|required');
                $this->form_validation->set_rules('live_secrate_key', 'live_secrate_key', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                } else {
                    $ddata=array();
                    $ddata['pharmcy_tds_amt'] = $this->input->post("pharmcy_tds_amt") ? $this->input->post("pharmcy_tds_amt") : '';
                    $ddata['pharmcy_service_charge'] = $this->input->post("pharmcy_service_charge") ? $this->input->post("pharmcy_service_charge") : '';
                    $ddata['pathology_tds_amt'] = $this->input->post("pathology_tds_amt") ? $this->input->post("pathology_tds_amt") : '';
                    $ddata['pathology_service_charge'] = $this->input->post("pathology_service_charge") ? $this->input->post("pathology_service_charge") : '';
                    $ddata['radiology_tds_amt'] = $this->input->post("radiology_tds_amt") ? $this->input->post("radiology_tds_amt") : '';
                    $ddata['radiology_service_charge'] = $this->input->post("radiology_service_charge") ? $this->input->post("radiology_service_charge") : '';
                    $ddata['doctor_tds_amt'] = $this->input->post("doctor_tds_amt") ? $this->input->post("doctor_tds_amt") : '';
                    $ddata['doctor_service_charge'] = $this->input->post("doctor_service_charge") ? $this->input->post("doctor_service_charge") : '';
                    $ddata['animal_tds_amt'] = $this->input->post("animal_tds_amt") ? $this->input->post("animal_tds_amt") : '';
                    $ddata['animal_service_charge'] = $this->input->post("animal_service_charge") ? $this->input->post("animal_service_charge") : '';
                    $ddata['nurse_tds_amt'] = $this->input->post("nurse_tds_amt") ? $this->input->post("nurse_tds_amt") : '';
                    $ddata['nurse_service_charge'] = $this->input->post("nurse_service_charge") ? $this->input->post("nurse_service_charge") : '';
                    $ddata['physio_tds_amt'] = $this->input->post("physio_tds_amt") ? $this->input->post("physio_tds_amt") : '';
                    $ddata['physio_service_charge'] = $this->input->post("physio_service_charge") ? $this->input->post("physio_service_charge") : '';
                    $ddata['test_key'] = $this->input->post("test_key") ? $this->input->post("test_key") : '';
                    $ddata['test_secrate_key'] = $this->input->post("test_secrate_key") ? $this->input->post("test_secrate_key") : '';
                    $ddata['live_key'] = $this->input->post("live_key") ? $this->input->post("live_key") : '';
                    $ddata['live_secrate_key'] = $this->input->post("live_secrate_key") ? $this->input->post("live_secrate_key") : '';
                    $ddata['payment_mode'] = $this->input->post("radio_btn");
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $this->common_model->data_update("tbl_app_setting", $ddata,array("id" => 1));
                    $title = "Admin changed Service Charge";
                    if($data['app_setting']['doctor_service_charge'] != $ddata['doctor_service_charge'])
                    {
                        $message = 'AtHeal has changed'.$ddata['doctor_service_charge'];
                        $this->notification(4,$message );   
                    }
                    if($data['app_setting']['nurse_service_charge'] != $ddata['nurse_service_charge'])
                    {
                        $message = 'AtHeal has changed'.$ddata['nurse_service_charge'];
                        $this->notification(6,$message );   
                    }
                    if($data['app_setting']['physio_service_charge'] != $ddata['physio_service_charge'])
                    {
                        $message = 'AtHeal has changed'.$ddata['physio_service_charge'];
                        $this->notification(7,$message);   
                    }
                    if($data['app_setting']['animal_service_charge'] != $ddata['animal_service_charge'])
                    {
                        $message = 'AtHeal has changed'.$ddata['animal_service_charge'];
                        $this->notification(5,$message);   
                    }
                    
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success ! </strong> App Setting Updated Successfully
                            </div>');
                    redirect("app-setting");
                    exit;
                }
            }
            $this->load->template('admin/setting/appsetting',$data);
        }else{
            redirect(base_url().'admin');    
            exit;
        }
    }
    public function notification($category,$message)
    {
        $deviceids = $this->admin_model->get_all_deviceid($category);
        $data = array();
        
        
        if ($receiverid != $userid)
        {
            $this->load->helper('notifications');
            $notification_message = array();
            $notification_message['title'] = "Admin changed Service Charge";
            $notification_message['body'] = $message;
            for ($i=0; $i < count($deviceids) ; $i++) { 
                $data["partener_id"] = $deviceid[$i]["partner_id"];
                $data["category"] = $deviceid[$i]["category_type"];
                $data["notification_type"] = 'S';
                $data["title"] = "Admin changed Service Charge";
                $data["description"] = $message;
                $data["status"] = 1;
                $data["created_at"] = date("Y-m-d H:i:s");
                $this->db->insert("tbl_notification", $data);
                push_notification_android($deviceid[$i]['device_token'], $notification_message); 

            }
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
    public function logout()
    {
        $session = $this->session->all_userdata();
        $this->session->unset_userdata($session['admin_id']);
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }
    public function refund()
    {

        $receipt = "Atheal Refund Receipt No." . rand(00, 99999);
        $this->load->model('admin_model');
        $order_data = $this->admin_model->get_order_data($this->input->post('OrderId'));
        $razorpaykeys = $this->admin_model->get_appsetting();
     

        $array = array('speed' => "optimum", "receipt" => $receipt);
        $curl = curl_init();
        $is_live =  $razorpaykeys['payment_mode'];
        
        if($is_live == '1' || $is_live == 1)
        {
            $username = $razorpaykeys['live_key'];
            $password = $razorpaykeys['live_secrate_key'];
        }
        else
        {
            $username = $razorpaykeys['test_key'];
            $password = $razorpaykeys['test_secrate_key'];
        }


        $api_url = "https://api.razorpay.com/v1/payments/".$order_data['payment_id']."/refund";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $username . ':' . $password,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($array),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $cdata = json_decode($response, true);
        echo "<pre>";
        print_r($cdata);

        if(isset($cdata['error']) && !empty($cdata['error'])){
            if(isset($cdata['error']['code']) && !empty($cdata['error']['code'])){
                $message = $cdata['error']['description'];
            }
        } else {
            if($cdata) {
                $ddata['refund_id'] = $cdata['id'];
                $tdata['is_refund'] = '1';
                $this->load->model("common_model");
                $this->common_model->data_update('tbl_payment_history',$ddata,array("order_id" =>$this->input->post('OrderId')));
                $this->common_model->data_update('tbl_order',$tdata,array("id" =>$this->input->post('OrderId'))); 
                $message = $cdata['id'];  
            }
        }
        echo $message;
    }

    public function payment()
    {
        $this->load->model('admin_model');
        $order_data = $this->admin_model->get_order_data($this->input->post('OrderId'));
        $razorpaykeys = $this->admin_model->get_appsetting();
        
        if($order_data['account_no']){
            $array = array('account' => $order_data['account_no'], "amount" => $order_data['final_receiving_amt'],"currency"=>"INR");
            dd($array);
            exit;
            
            $curl = curl_init();
            $is_live =  $razorpaykeys['payment_mode'];
            if($is_live == '1' || $is_live == 1)
            {
                $username = $razorpaykeys['live_key'];
                $password = $razorpaykeys['live_secrate_key'];
            }
            else
            {
                $username = $razorpaykeys['test_key'];
                $password = $razorpaykeys['test_secrate_key'];
            }

            $api_url = "https://api.razorpay.com/v1/transfers";
            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_USERPWD => $username . ':' . $password,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($array),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $cdata = json_decode($response, true);
            if($cdata['error']['code']){
                $message = $cdata['error']['description'];
            }
            else{   
                if($cdata)
                $ddata['transfer_id'] = $cdata['id'];
                $tdata['is_transfer'] = '1';
                $this->load->model("common_model");
                $this->common_model->data_update('tbl_payment_history',$ddata,array("order_id" =>$this->input->post('OrderId')));
                $this->common_model->data_update('tbl_order',$tdata,array("id" =>$this->input->post('OrderId'))); 
                $message = $cdata['status'];  
            }
            echo $cdata['status'];        
        }else{
            echo 'account_no is not correct';
        }
    }
    
    public function createBeneficiary(){
        $id = $this->input->post('vendorId');
        
        $this->load->model('Vendor_model');
        $this->load->model('admin_model');
        $this->load->model('common_model');
        $vendor_details = $this->Vendor_model->get_vendor_by_id($id);
    
        $data = array();
        $data['name'] = $vendor_details['store_name'];
        $data['email'] = $vendor_details['email'];
        $data['contact'] = $vendor_details['contact_no'];
        $data['type'] = 'vendor';
        $data['reference_id'] = $vendor_details['id'];

        $razorpaykeys = $this->admin_model->get_appsetting();
            
            $curl = curl_init();
            $is_live =  $razorpaykeys['payment_mode'];
            if($is_live == '1' || $is_live == 1)
            {
                $username = $razorpaykeys['live_key'];
                $password = $razorpaykeys['live_secrate_key'];
            }
            else
            {
                $username = $razorpaykeys['test_key'];
                $password = $razorpaykeys['test_secrate_key'];
            }

            $api_url = "https://api.razorpay.com/v1/contacts";

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_USERPWD => $username . ':' . $password,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
            $cdata = json_decode($response, true);

            if(isset($cdata['id']) && !empty($cdata['id'])) {
                $tdata = array();
                $tdata['razorpay_vendor_id'] = $cdata['id'];
                $this->common_model->data_update('tbl_partners',$tdata,array("id" =>$id)); 
                echo "1";
            } else {
                echo "2";
            }
    }
}
?>