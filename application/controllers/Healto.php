<?php


defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Asia/Kolkata');

class Healto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $language_id = 1;
        $this->load->model('banner_model');
        $this->load->model('testimonials_model');
        $this->load->model('doctors_model');
        $this->load->model('features_model');
        $this->load->model('speciality_model');
        $this->load->model('admin_model');
        $this->load->model('social_media_model');
        $this->load->model('services_model');
        $this->load->model('Doctors_model');
        $this->load->model('video_model');
        $this->load->model('cmspages_model');

        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['banner'] = $this->banner_model->get_banner_active_list($language_id);
        $data['testimonials'] = $this->testimonials_model->get_testimonials_active_list($language_id);
        $data['doctors'] = $this->doctors_model->get_doctors_active_list($language_id);
        $data['features'] = $this->features_model->get_features_active_list($language_id);
        $data['speciality'] = $this->speciality_model->get_speciality_active_list($language_id);
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['youtube_video'] = $this->video_model->get_active_video_list();
        $data['about_us'] = $this->cmspages_model->get_cms_page_by_id(1);
        $this->load->view('front/index', $data);
    }
    public function register()
    {
        $data = array();
        $data["error"] = '';

        if ($this->session->userdata('registerdata')) {
            $this->session->unset_userdata('registerdata');
        }
        if (isset($_REQUEST)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'User Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_check_email');
            $this->form_validation->set_rules('type_category', 'Category', 'trim|required');
            $this->form_validation->set_rules('number', 'number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirmpwd', 'Confirm password', 'trim|required|matches[pwd]');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                $ddata = array();
                $ddata['name'] = $this->input->post("name") ? $this->input->post("name") : '';
                $ddata['email'] = $this->input->post("email") ? $this->input->post("email") : '';
                $ddata['category'] = $this->input->post("type_category") ? $this->input->post("type_category") : '';
                $ddata['contact_no'] = $this->input->post("number") ? $this->input->post("number") : '';
                $ddata['country_code'] = $this->input->post("country_code") ? $this->input->post("country_code") : '';
                $ddata['password'] = md5($this->input->post("pwd"));
                $ddata['org_password'] = $this->input->post("pwd") ? $this->input->post("pwd") : '';
                $ddata['otp'] = rand(1111, 9999);
                //print_r($ddata['otp']);die;
                $twillio = array('mobile_number' => $ddata['country_code'] . $ddata['contact_no'], 'body' => 'Your OTP to register/access AtHeal is: ' . $ddata['otp'] . ' It will be valid for 3 minutes.-AtHeal');
                $this->load->helper('twilio_helper');
                $mbcheck = $this->mobilenumbercheck($ddata['country_code'] . $ddata['contact_no']);

                if ($mbcheck != '1' || $mbcheck != true) {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Mobile Number is Not Valid</div>';
                }
                sleep(5);
                $message = send_message($twillio);
                if (!empty($message)) {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> OTP Not Send</div>';
                }

                $this->load->model("common_model");
                $ddata['created_at'] = date('Y-m-d H:i:s');


                $this->session->set_userdata('registerdata', $ddata);
                //$lastinsertID = $this->common_model->data_insert("tbl_partners", $ddata, true);

                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success ! </strong> User added successfully
                                </div>');
                redirect(base_url() . 'otp-check');
                exit;
            }
        }
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $this->load->model('Content_model');

        $language_id = 1;
        $data['content'] = $this->Content_model->get_con_list();
        $data['con_id'] = $this->Content_model->get_con_list_by_id(1);
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['country'] = $this->World_wide_model->fetch_country();
        $data['parent_services'] = $this->services_model->get_parent_service_list();
        // print_r('<pre>');
        // print_r($data['parent_services']);die;
        $this->load->view('front/register', $data);
    }
    public function registration_success($id)
    {
        $data["page_title"] = 'Successfully';
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $this->load->model('vendor_model');
        $language_id = 1;
        $data['record'] = $this->vendor_model->get_partner_profile_by_id($id);
        //print_r($data['record']);die;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $this->load->view('front/registration_success', $data);
    }
    public function mobilenumbercheck($mobile)
    {
        $this->load->helper('twilio_helper');
        return checkmobilenumber($mobile);
    }
    public function resend_otp()
    {

        $data = $this->db->get_where('tbl_partners', ["id" => $this->input->post('id')])->row_array();

        $ddata['otp'] = rand(1111, 9999);
        $country_code = $this->session->userdata['registerdata']['country_code'];
        $contact_no = $this->session->userdata['registerdata']['contact_no'];
        $idata["error"] = '';
        $error_msg = '';
        //print_r($country_code);
        //print_r($contact_no);die;
        $twillio = array('mobile_number' => $country_code . $contact_no, 'body' => 'Your OTP to register/access AtHeal is: ' . $ddata['otp'] . ' It will be valid for 3 minutes.-AtHeal');

        $this->load->helper('twilio_helper');
        $mbcheck = $this->mobilenumbercheck($country_code . $contact_no);

        if ($mbcheck != '1' || $mbcheck != true) {
            $error_msg = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Mobile Number is Not Valid</div>';
        }
        sleep(5);
        $message = send_message($twillio);
        //print_r($message);die;
        if (!empty($message)) {
            $error_msg = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> OTP Not Send</div>';
        } else {
            $_SESSION['registerdata']['otp'] = $ddata['otp'];
        }
        echo $error_msg;
    }
    public function otp_check()
    {
        //print_r($this->session->userdata('registerdata'));die;
        $data = array();
        $data["error"] = '';
        if (isset($_REQUEST)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('otp', 'OTP', 'trim|required|min_length[4]|max_length[4]');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                // $where = array("otp" => $this->input->post("otp"), "status" => "1", "id" => $id);
                // $this->db->select('*');
                // $this->db->from('tbl_partners');
                // $this->db->where($where);
                // $q = $this->db->get()->row();

                // if (!empty($q) || $q != '') {

                if ($this->session->userdata('registerdata')) {

                    if ($this->session->userdata['registerdata']['otp'] == $this->input->post("otp")) {

                        $ddata = $this->session->userdata['registerdata'];

                        $quickblox_name = $this->get_random_string(8);
                        $ddata['is_verifyotp'] = 1;
                        $ddata['quickblox_name'] = $quickblox_name;
                        $this->load->model("common_model");

                        $lastinsertID = $this->common_model->data_insert("tbl_partners", $ddata, true);
                        $this->session->unset_userdata('registerdata');
                        //print_r($lastinsertID);die;

                        $this->session->set_flashdata('login_message', '<div class="alert background-success alert-dismissible" id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> successfully.</div>');

                        $this->db->select('*');
                        $this->db->from('tbl_partners');
                        $this->db->where('id', $lastinsertID);
                        $row = $this->db->get()->row();
                        $this->session->set_userdata('ProfileData', $row);
                        if ($row->is_fill_profile != 0) {
                            redirect(base_url());
                        } else {
                            // if($row->category == 1 || $row->category == 2 || $row->category == 3)
                            // {
                            //     redirect(base_url().'storeprofile-setting/'.$q->id);

                            // }else{
                            //   redirect(base_url().'profile-setting/'.$q->id);
                            // }
                            redirect(base_url() . 'registration-success/' . $lastinsertID);
                        }
                        exit;
                    } else {
                        $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Please Enter Valid OTP </div>';
                    }
                } else {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Some Errors occur so Please Again Register</div>';
                }
            }
        }
        $this->load->model('social_media_model');
        $this->load->model('admin_model');
        $this->load->model('World_wide_model');
        $this->load->model('services_model');
        $language_id = 1;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['country'] = $this->World_wide_model->fetch_country();
        if ($this->session->userdata('registerdata')) {
            $data['id'] = $this->session->userdata['registerdata']['otp'];
        } else {
            $data['id'] = '';
        }
        //print_r($data['id']);die;
        $this->load->view('front/otp', $data);
    }

    private function get_random_string($length = 10, $sting = "")
    {
        if (empty($sting) || $sting == '') {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        } else {
            $alphabet = $sting;
        }
        $token = "";
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $token .= $alphabet[$n];
        }
        return $token;
    }

    public function check_email()
    {
        $this->db->select('*');
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('category', $this->input->post('type_category'));
        if ($this->db->get('tbl_partners')->num_rows() > 0) {
            $this->form_validation->set_message(__FUNCTION__, 'Email_id Already Exists');
            return false;
        } else {
            return true;
        }
    }

    public function logout()
    {
        $session = $this->session->all_userdata();
        unset($_SESSION['useremail']);
        redirect(base_url());
    }

    public function get_state()
    {
        $country = $_REQUEST["id"];
        $this->load->model("World_wide_model");
        $country = $this->World_wide_model->fetch_state_list($country);
        $html = "";
        if (count($country) > 0) {
            $html .= "<option value=''>----Select State----</option>";
            foreach ($country as $row) {
                $html .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        echo $html;
    }

    public function get_query()
    {
        $id = $_REQUEST["id"];
        $this->load->model("Content_model");
        $query = $this->Content_model->get_con_list_by_id($id);
        $output = array(
            "main_image" => $query['main_image'],
            "main_heading" => $query['main_heading'],
            "image_1" => json_decode($query['image_1']),
            "high_1" => json_decode($query['highlighted_image_1']),
            "heading_1" => $query['heading_1'],
            "description_1" => $query['description_1'],
            "image_2" => json_decode($query['image_2']),
            "high_2" => json_decode($query['highlighted_image_2']),
            "heading_2" => $query['heading_2'],
            "description_2" => $query['description_2'],
            "image_3" => json_decode($query['image_3']),
            "high_3" => json_decode($query['highlighted_image_3']),
            "heading_3" => $query['heading_3'],
            "description_3" => $query['description_3'],
        );
        echo json_encode($output);
    }


    public function get_city()
    {
        $state = $_REQUEST["id"];
        $this->load->model("World_wide_model");
        $country = $this->World_wide_model->fetch_city_list($state);
        $html = "";
        if (count($country) > 0) {
            $html .= "<option value=''>----Select City----</option>";
            foreach ($country as $row) {
                $html .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        echo $html;
    }
    public function services()
    {
        $language_id = 1;
        $this->load->model('testimonials_model');
        $this->load->model('services_model');
        $this->load->model('speciality_model');
        $this->load->model('social_media_model');
        $this->load->model('admin_model');

        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['speciality'] = $this->speciality_model->get_speciality_active_list($language_id);
        $data['testimonials'] = $this->testimonials_model->get_testimonials_active_list($language_id);
        $data['services_list'] = $this->services_model->get_parent_service_list($language_id);
        $data['services'] = $this->services_model->get_services_active_list($language_id);

        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        //print_r($data['site_details']);die;

        $this->load->view('front/services', $data);
    }
    public function sub_services($slug)
    {
        $language_id = 1;
        $id = $this->db->get_where('tbl_services', ['slug' => $slug])->row()->id;

        $this->load->model('testimonials_model');
        $this->load->model('services_model');
        $this->load->model('speciality_model');
        $this->load->model('social_media_model');
        $this->load->model('admin_model');

        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['speciality'] = $this->speciality_model->get_speciality_active_list($language_id);
        $data['testimonials'] = $this->testimonials_model->get_testimonials_active_list($language_id);
        $data['services_list'] = $this->services_model->get_sub_service_list($id);
        //print_r($data['services_list']);die;
        $data['services'] = $this->services_model->get_services_active_list($language_id);

        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        //print_r($data['site_details']);die;

        $this->load->view('front/services', $data);
    }

    public function securities()
    {
        $this->load->model('social_media_model');
        $this->load->model('services_model');
        $language_id = 1;
        $data['services'] = $this->services_model->get_services_active_list($language_id);

        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $this->load->model("cmspages_model");
        $data['page_data'] = $this->cmspages_model->get_cms_page_by_id(1);
        //print_r($data['page_data']);die;
        $this->load->model('admin_model');
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data["cms_page"] = $this->cmspages_model->get_security_page();
        $data["cms_page_images"] = explode(",", $data["cms_page"]->security_images);
        $this->load->model("Security_features_model");

        $data["security_features"] = $this->Security_features_model->get_feature_active_list();
        $this->load->view('front/securities', $data);
    }

    public function services_deatils($slug)
    {
		$language_id = 1;
		$id = $this->db->get_where('tbl_services', ['slug' => $slug])->row()->id;
		// print_r($id);die;
		$this->load->model('services_model');
		$this->load->model('social_media_model');
		$this->load->model('admin_model');
		$this->load->model('testimonials_model');
		$this->load->model('speciality_model');
		$data['testimonials'] = $this->testimonials_model->get_testimonials_active_list($language_id);

		$data['social_media'] = $this->social_media_model->get_active_social_list();

		$data['services_deatils'] = $this->services_model->get_service_list_by_id($slug);

		$data['servicesImage'] = $this->services_model->get_services_image_by_id($id);
		$data['speciality'] = $this->speciality_model->get_speciality_active_list($language_id);
		$data['services'] = $this->services_model->get_services_active_list($language_id);
		// print_r($data['services_deatils']->subcount);die;
		$data['site_details'] = $this->admin_model->get_sitesetting(1);
		
		if($slug == 'find-store' || $slug == 'find-lab' || $slug == 'find-diagnostics' || $slug == 'doctors' || $slug == 'nurses' || $slug == 'physiotherapist' || $slug == 'animal-doctors'){
			$this->load->view('front/'.$slug, $data);
		}
		elseif ($data['services_deatils']->subcount > 0) {
			$data['services_list'] = $this->services_model->get_sub_service_list($id);
			$this->load->view('front/services', $data);
		} else {
			$data['service_list'] = $this->services_model->get_all_services($language_id);
			$this->load->view('front/services_deatils', $data);
		}
    }
    public function about_us()
    {
        $this->load->model('social_media_model');
        $this->load->model('services_model');
        $language_id = 1;
        $data['services'] = $this->services_model->get_services_active_list($language_id);

        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $this->load->model("cmspages_model");
        $data['page_data'] = $this->cmspages_model->get_cms_page_by_id(1);
        //print_r($data['page_data']);die;
        $this->load->model('admin_model');
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $this->load->view('front/about_us', $data);
    }
    public function contact_us()
    {
        $this->load->model('social_media_model');
        $this->load->model('services_model');
        $this->load->model('admin_model');

        $language_id = 1;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        if (isset($_REQUEST)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('con_email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('con_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('con_message', 'Message', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
                $ddata = array();
                $ddata['email'] = $this->input->post("con_email") ? $this->input->post("con_email") : '';
                $ddata['name'] = $this->input->post("con_name") ? $this->input->post("con_name") : '';
                $ddata['message'] = $this->input->post("con_message") ? $this->input->post("con_message") : '';
                $ddata['subject'] = $this->input->post("con_subject") ? $this->input->post("con_subject") : '';


                $this->load->model("common_model");
                $ddata['created_at'] = date('Y-m-d H:i:s');
                $this->common_model->data_insert("tbl_feedback", $ddata, true);
                $email = $ddata['email'];
                $from_email = strtolower($email);
                $to_email = "info@atheal.in";
                $email_message = "Hello NEw Email Recieve";

                $header = "From:$from_email\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
                $subjects = "New Inquiry from AtHeal";
                if (!empty($ddata['subject'])) {
                    $subjects = $ddata['subject'];
                }
                require $_SERVER['DOCUMENT_ROOT'] . '/phpmailer/vendor/autoload.php';
                $mail = new PHPMailer(true);

                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();
                $mail->Host       = 'smtpout.secureserver.net';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'support@atheal.in';
                $mail->Password   = 'atheal8928565643';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       =  465;
                //Recipients
                $mail->setFrom($from_email, $ddata['name']);
                //print_r($email);die;
                $mail->addAddress($to_email, $name);
                $mail->isHTML(true);
                $mail->Subject = $subjects;
                $mail->Body    = $ddata['message'];
                $mail->send();

                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong> Your inquery saved successfully.</div>');
                redirect("contact-us");
                exit;
            }
        }
        $this->load->view('front/contact_us', $data);
    }
    public function getlatlng($address, $city, $state = null, $country = null)
    {

        $GOOGLE_MAP_API_KEY = "AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc";
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address . $city . $state . $country) . '&sensor=false&key=' . $GOOGLE_MAP_API_KEY);

        $geo = json_decode($geo, true);
        if ($geo['status'] == 'OK') {
            $data['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
            $data['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
        } else {
            $data['latitude'] = "0.00";
            $data['longitude'] = "0.00";
        }

        return $data;
    }

    public function term_condition()
    {
        $this->load->model('social_media_model');
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $this->load->model('admin_model');
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $this->load->model("cmspages_model");
        $data['page_data'] = $this->cmspages_model->get_cms_page_by_id(2);
        $this->load->model('services_model');

        $language_id = 1;

        $data['services'] = $this->services_model->get_services_active_list($language_id);

        $this->load->view('front/term_condition', $data);
    }
    public function privacy_policy()
    {
        $this->load->model('social_media_model');
        $data['social_media'] = $this->social_media_model->get_active_social_list();
        $this->load->model('admin_model');
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $this->load->model("cmspages_model");
        $data['page_data'] = $this->cmspages_model->get_cms_page_by_id(3);
        $this->load->model('services_model');
        $language_id = 1;
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $this->load->view('front/privacy_policy', $data);
    }
    public function get_slider()
    {
        $this->load->model('banner_model');
        $language_id = 1;
        $data['banner'] = $this->banner_model->get_banner_active_list($language_id);
        $banner = array();
        foreach ($data['banner'] as $key => $value) {
            $returnpath = $this->config->item('banner_images_uploaded_path');
            $txt_class_p = "";
            $txt_class_h2 = "";
            if ($key % 2 == 0) {
                $txt_class_p = "text-odd";
                $txt_class_h2 = "text-even";
            } else {
                $txt_class_p = "text-even";
                $txt_class_h2 = "text-odd";
            }
            $inner = [
                'imageurl'    => $returnpath . $value->file,
                'txt_class_p' => $txt_class_p,
                'txt_class_h2' => $txt_class_h2,
                'title'       => $value->title
            ];
            $banner[] = $inner;
        }
        $output = [
            'bannerList'  => $banner,
        ];
        echo json_encode($output);
    }

    // for patient view

    public function patient()
    {
        $this->load->model('admin_model');
        $this->load->model('services_model');
        $this->load->model('social_media_model');

        $language_id = 1;
        $data['site_details'] = $this->admin_model->get_sitesetting(1);
        $data['services'] = $this->services_model->get_services_active_list($language_id);
        $data['social_media'] = $this->social_media_model->get_active_social_list();

        $this->load->view('front/patient_view', $data);
    }
}
