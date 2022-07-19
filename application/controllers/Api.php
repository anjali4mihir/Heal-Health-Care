<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
set_time_limit(0);
date_default_timezone_set('Asia/Kolkata');
error_reporting(0);
ini_set('memory_limit', '-1');
use Tdely\Luhn\Luhn;

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Common_model');
        $this->razorpaykeys = $this->Api_model->get_appsetting();
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            $this->isAuthenticated($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
        }
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");        
        // $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
    }
    /* All Basic Functions */
    public function isAuthenticated($user,$password)
    {
        if ($user == "admin" && $password == "admin") {
            return true;
        } else {
            $status_code = 0;
            $this->sendErrorResponse("Your_API_authentication_is_wrong");
            exit;
        }
    }
    public function replace_null_with_empty_string($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->replace_null_with_empty_string($value);
            } else {
                if (is_null($value)) {
                   $array[$key] = "";
                }
            }
        }
        return $array;
    }

    public function sendNullResponse($response, $message, $status = "1")
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        if (!empty($response)) {
            $response           = (array) $response;
            $array              =  json_decode(json_encode($response), true);
            $result['data']     = $array;
            $result['message']  = $message;
            echo json_encode($this->replace_null_with_empty_string($result));
        } else {
            $response           = $response;
            $result['data']     = (object)$response;
            $result['message']  = $message;
            echo json_encode($result);
        }
    }

    public function sendResponse($response, $message, $status = "1")
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        if (!empty($response)) {
            $response           = (array) $response;
            $array              =  json_decode(json_encode($response), true);
            $result['data']     = $array;
            $result['message']  = $message;
            echo json_encode($this->replace_null_with_empty_string($result));
        } else {
            $response           = $response;
            $result['data']     = $response;
            $result['message']  = $message;
            echo json_encode($result);
        }
    }
   
    public function sendResponsenullobject($response, $message, $status = "1")
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        if (!empty($response)) {
            $result['data'] = $response;
            $result['message'] = $message;
            echo json_encode($this->replace_null_with_empty_string($result));
        } else {
            $response = $response;
            $result['data'] = $response;
            $result['message'] = $message;
            echo json_encode($result);
        }
    }
    public function sendErrorResponse($message)
    {
        $result = array();
        $result['code'] = "401";
        $result['status'] = "0";
        $result['message'] = $message;
        echo json_encode($result);
        die;
    }
    public function sendSuccesResponse($message)
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = "1";
        $result['message'] = $message;
        echo json_encode($result);
        die;
    }
    public function sendErrorResponseUserNotFound($message)
    {
        $result = array();
        $result['code'] = "402";
        $result['status'] = "0";
        $result['message'] = $message;
        echo json_encode($result);
        die;
    }
    public function sendSuccessErrorResponse($message, $status = "0")
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        $result['message'] = $message;
        echo json_encode($result);
        die;
    }
    public function sendSuccessErrorResponseWithData($message, $status = "0", $data = array())
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        $result['message'] = $message;
        $result['data'] = $data;
        echo json_encode($result);
        die;
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
    private function file_upload($arr, $path)
    {
        set_time_limit(0);
        if ($arr['error'] == 0) {
            $temp = explode(".", $arr["name"]);
            $file_name = uniqid() . time() . '.' . end($temp);
            $file_path = $path . $file_name;
            if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                $ret = $file_name;
            } else {
                $ret = "";
            }
        }
        return $ret;
    }
    public function generate_auth_token()
    {
        $token = openssl_random_pseudo_bytes(32);
        $token = bin2hex($token);
        return $token;
    }
    public function sendResponse_emptydata($message, $status = "1")
    {
        $result = array();
        $result['code'] = "200";
        $result['status'] = $status;
        $response = [];
        $result['data'] = array();
        $result['message'] = $message;
        echo json_encode($result, JSON_FORCE_OBJECT);
    }
    public function checkemptyvalue($key, $message = "Field is required")
    {
        if (empty($key) && $key == "") {
            return $this->sendErrorResponse($message);
            exit;
        }
    }
    public function category_wise_key($category)
    {
        if($category == 4 || $category == '4' || $category == 5 ||$category == '5'){
            $Key = 'Consultation';
        }else{
            $Key = 'Service';
        }
        return $Key;
    }
    
    public function get_message_value_from_key($languageid, $key)
    {
        $query = "SELECT title FROM `tbl_message` WHERE `language_id`='" . $languageid . "' AND  `message_key`='" . $key . "'";
        $res = $this->db->query($query)->row();
        if (!empty($res->title)) {
            return $res->title;
        } else {
            return $key;
        }
    }
    public function language_label_list()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';

        $this->checkemptyvalue($language_id, "language_id is required");

        $final_data = array();
        $final_data = $this->Api_model->get_all_laungage_labels_by_id($language_id);
        if ($final_data) {
            if (count($final_data) > 0) {
                $numItems = count($final_data);
                $i = 0;
                $tmp_final_data = array();
                foreach ($final_data as $key => $value) {
                    $tmp_final_data[$value->label_key] = $value->title;
                }
            }
            $tmp_final_data = (object) $tmp_final_data;
            return $this->sendResponse($tmp_final_data, "label list found successfully");
        } else {
            return $this->sendSuccessErrorResponse($final_data, "label list not found");
        }
    }
    public function language_message_list()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $this->checkemptyvalue($language_id, "language_id is required");
        $final_data = array();
        $final_data = $this->Api_model->get_all_laungage_message_by_id($language_id);
        if ($final_data) {
            if (count($final_data) > 0) {
                $numItems = count($final_data);
                $i = 0;
                $tmp_final_data = array();
                foreach ($final_data as $key => $value) {
                    $tmp_final_data[$value->message_key] = $value->title;
                }
            }
            $tmp_final_data = (object) $tmp_final_data;
            return $this->sendResponse($tmp_final_data, "Message list found successfully");
        } else {
            return $this->sendSuccessErrorResponse($final_data, "message list not found");
        }
    }
    public function newuploadusingcompress($filearray, $path)
    {

        $temp = explode(".", $filearray['name']);
        $filename = rand(0000, 9999) . time() . '.' . end($temp);
        $valid_ext = array('png', 'jpeg', 'jpg');
        $location = $path . $filename;
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if (in_array($file_extension, $valid_ext)) {
            $upload = $this->compressImage($filearray['tmp_name'], $location, 60);
            if ($upload == 1) {
                return $filename;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function compressImage($source, $destination, $quality)
    {

        $info = getimagesize($source);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }
        return imagejpeg($image, $destination, $quality);
    }
    public function get_setting()
    {
        $data['app_setting'] = $this->Api_model->get_appsetting();
        $imagepath = array(
            'profile_image'             => $this->config->item('profile_images_uploaded_path'),
            'address_proof_image'       => $this->config->item('address_proof_images_uploaded_path'),
            'speciality_images'         => $this->config->item('service_images_uploaded_path'),
            'pancard_images'            => $this->config->item('pancard_images_uploaded_path'),
            'aadharcard_images'         => $this->config->item('adharcard_images_uploaded_path'),
            'degree_image'              => $this->config->item('degree_certi_images_uploaded_path'),
            'registration_image'        => $this->config->item('ug_pg_images_uploaded_path'),
            'cms_images'                => $this->config->item('cms_images_uploaded_path'),
            'invoice_path'              => $this->config->item('invoice_pathuploaded_path'),
            'prescription_path'         => $this->config->item('prescription_uploaded_path'),
            'signature_path'            => $this->config->item('signature_images_uploaded_path'),
            'medical_certificate_path'  => $this->config->item('medical_certificate_uploaded_path'),
            'attached_reports_path'     => $this->config->item('attach_reports_uploaded_path'),
            'chat_file_path'            => $this->config->item('chat_image_uploaded_path'),
        );

        $is_live =  $data['app_setting']['payment_mode'];
        if($is_live == '1' || $is_live == 1)
        {
            $username = $data['app_setting']['live_key'];
            $password = $data['app_setting']['live_secrate_key'];
        }
        else
        {
            $username = $data['app_setting']['test_key'];
            $password = $data['app_setting']['test_secrate_key'];
        }
        
        $appsetting = array(
            "doctor_tds_amt"        =>$data['app_setting']['doctor_tds_amt'],
            "doctor_service_charge" =>$data['app_setting']['doctor_service_charge'],
            "animal_tds_amt"        =>$data['app_setting']['animal_tds_amt'],
            "animal_service_charge" =>$data['app_setting']['animal_service_charge'],
            "nurse_tds_amt"         =>$data['app_setting']['nurse_tds_amt'],
            "nurse_service_charge"  =>$data['app_setting']['nurse_service_charge'],
            "physio_tds_amt"        =>$data['app_setting']['physio_tds_amt'],
            "physio_service_charge" =>$data['app_setting']['physio_service_charge'],
            "rozarpay_keyID"            => $username,
        );
        $finalarray = array(
            "imagepath" => $imagepath,
            "appsetting" => $appsetting,
        );
        return $this->sendResponse($finalarray, "All Setting Details");
    }
    /*Api Start*/
    public function index()
    {
        echo "welcome";
        exit;
    }
    public function get_all_customers_data($category_type, $id, $currentdevicetoken)
    {
        $customerdata = $this->Api_model->get_all_data_partners($category_type, $id);
        if ($category_type == 4) {
            unset($customerdata->address_proof);
        }
        $getactivedevicetoken = $this->Api_model->current_device_token($id, $currentdevicetoken);
        $amountdata = $this->Api_model->get_all_data_partners_visit($category_type, $id);
        $customerdata->online_visit_main_amt = $amountdata['online_visit_main_amt'];
        $customerdata->home_visit_main_amt = $amountdata['home_visit_main_amt'];
        $customerdata->currendeviceid = (string) $currentdevicetoken;
        $customerdata->device_type = $getactivedevicetoken->device_type;
        $customerdata->device_token = $getactivedevicetoken->device_token;
        $customerdata->authtoken = $getactivedevicetoken->authtoken;
        return $customerdata;
    }
    public function userexists($id, $currendeviceid, $authtoken, $language_id)
    {
        $user = $this->Api_model->checkexistsuser($id, $currendeviceid, $authtoken);
        if ($user == 0) {
            $this->sendErrorResponseUserNotFound($this->get_message_value_from_key($language_id, 'authntication-failed'));
        }
    }
    public function checkuser($id, $category_type,$language_id)
    {
        $user = $this->Api_model->checkuser($id, $category_type);
        if ($user == 0) {
            $this->sendErrorResponseUserNotFound($this->get_message_value_from_key($language_id, 'user_is_not_exist'));
        }
    }
    public function notification_entery($noticationarray)
    {
        $data = array();
        $data["partener_id"]        = $noticationarray["partener_id"];
        $data["category"]           = $noticationarray["category"];
        $data["patient_id"]         = $noticationarray["patient_id"];
        $data["notification_type"]  = $noticationarray["notification_type"];
        $data["order_id"]           = $noticationarray["order_id"];
        $data["order_no"]           = $noticationarray["order_no"];
        $data["title"]              = $noticationarray["title"];
        $data["description"]        = $noticationarray["description"];
        $data["request_id"]         = $noticationarray["request_id"];
        $data["status"]             = 1;
        //$data['temp_appointment_data'] = $noticationarray["temp_appointment_data"];

        if(isset($noticationarray["temp_appointment_data"]) && ($noticationarray["temp_appointment_data"] !='')){
            $data['temp_appointment_data'] = $noticationarray["temp_appointment_data"];
        } 

        $data["created_at"]         = date("Y-m-d H:i:s");
        return $this->db->insert("tbl_notification", $data);
    }
    public function get_all_countries()
    {
        $mini = $this->Api_model->get_all_countries();
        if (!empty($mini) && count($mini)) {
            return $this->sendResponse($mini, "All Country List");
        } else {
            return $this->sendSuccessErrorResponseWithData("No country found");
        }
    }

    public function get_state_list()
    {
        $country_id = isset($_REQUEST['country_id']) ? $_REQUEST['country_id'] : "";
        $this->checkemptyvalue($country_id, "Country id is required");
        $mini = $this->Api_model->get_all_states($country_id);
        if (!empty($mini) && count($mini) > 0) {
            return $this->sendResponse($mini, "All State List");
        } else {
            return $this->sendSuccessErrorResponseWithData("No state found");
        }
    }

    public function get_city_list()
    {
        $state_id = isset($_REQUEST['state_id']) ? $_REQUEST['state_id'] : "";
        $this->checkemptyvalue($state_id, "state id is required");
        $mini = $this->Api_model->get_all_cities($state_id);
        if (!empty($mini) && count($mini) > 0) {
            return $this->sendResponse($mini, "All City List");
        } else {
            return $this->sendSuccessErrorResponseWithData("No city found");
        }
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
    public function register()
    {
        /* ALL */
        $language_id = isset($_REQUEST['language']) ? $_REQUEST['language'] : "";
        $register_type = isset($_REQUEST['register_type']) ? $_REQUEST['register_type'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $term_condition = isset($_REQUEST['term_condition']) ? 1 : "";
        $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : "A";
        $device_token = isset($_REQUEST['device_token']) ? $_REQUEST['device_token'] : "";
        /* Normal */
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
        $otp = isset($_REQUEST['otp']) ? $_REQUEST['otp'] : "";
        $profile_image = isset($_FILES['profile_image']) ? $_FILES['profile_image'] : "";
        if ($category_type == 8) {
            $status_admin = '1';
        } else {
            $status_admin = '0';
        }
        /*Social */
        $social_id = isset($_REQUEST['social_id']) ? $_REQUEST['social_id'] : "";
        $checksocial = array();
        $this->checkemptyvalue($language_id, "Language is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($register_type, $this->get_message_value_from_key($language_id, 'register_type_is_required'));
        $this->checkemptyvalue($device_type, $this->get_message_value_from_key($language_id, 'device_type_is_required'));
        $this->checkemptyvalue($device_token, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($term_condition, $this->get_message_value_from_key($language_id, 'please_accept_terms_conditions'));
        if (strtoupper($register_type) == "NORMAL") {
            //$this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
            $this->checkemptyvalue($phonecode, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
            $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
            $this->checkemptyvalue($email, $this->get_message_value_from_key($language_id, 'email_address_is_required'));
            $this->checkemptyvalue($password, $this->get_message_value_from_key($language_id, 'password_is_required'));
            $this->checkemptyvalue($otp, $this->get_message_value_from_key($language_id, 'otp_is_required'));
            //$this->checkemptyvalue($profile_image, $this->get_message_value_from_key($language_id, 'profile_image_required'));
            if (!empty($email)) {
            $checkmail = $this->Api_model->check_partner_email_exist($email,$category_type);
                if($checkmail > 0) {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_is_already_exists'));
                    exit;
                }
            }
            if (!empty($phonecode) && !empty($mobile_no)) {
                $checkmobile = $this->Api_model->check_partner_mobile_exists($phonecode, $mobile_no, $category_type);

                if (count($checkmobile) > 0) {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_already_exists'));
                    exit;
                }
            }
            if(isset($_FILES["profile_image"]) && !empty($_FILES["profile_image"]["name"]) && $_FILES["profile_image"]["size"] > 0) {
                    $path = $this->config->item("profile_images_path");
                    $image = newuploadusingcompress($_FILES["profile_image"], $path);
                    if (!empty($image)) {
                        $profile_pic = $image;
                    }
                } else {
                    $profile_pic = '';
                }
                if($category_type== 8){
                    $is_fill_profile = 1;
                }else{
                    $is_fill_profile = 0;
                }
                $insert = array(
                    'category'      => $category_type,
                    'name'          => $name,
                    'country_code'  => $phonecode,
                    'contact_no'    => $mobile_no,
                    'email'         => $email,
                    'profile'       => $profile_pic,
                    'password'      => md5($password),
                    'register_type' => $register_type,
                    'quickblox_name'=>$this->get_random_string(8),
                    'status_by_admin'=> $status_admin,
                    'org_password'   => $password,
                    'otp'            => $otp,
                    'is_verifyotp'   => 1,
                    'is_fill_profile'=> $is_fill_profile,
                    'created_at'     => date('Y-m-d H:i:s'),
                );
                
                $userid = $this->Common_model->data_insert('tbl_partners', $insert);
        } else if (strtoupper($register_type) == 'APPLE' || strtoupper($register_type) == 'GOOGLE') {
            $this->checkemptyvalue($social_id, $this->get_message_value_from_key($language_id, 'social_token_is_required'));
            $checksocial = $this->Api_model->check_partner_social_id_exists($social_id,$category_type);
            //print_r($checksocial);die; 
            if(count($checksocial) == 0) {
                if (isset($_FILES["profile_image"]) && !empty($_FILES["profile_image"]["name"]) && $_FILES["profile_image"]["size"] > 0) {
                    $path = $this->config->item("profile_images_path");
                    $image = newuploadusingcompress($_FILES["profile_image"], $path);
                    if (!empty($image)) {
                        $profile_pic = $image;

                    }
                } else {
                    $profile_pic = '';
                }
                if (!empty($email)) {
                $checkmail = $this->Api_model->check_partner_email_exist($email,$category_type);
                    if($checkmail > 0) {
                        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_is_already_exists'));
                        exit;
                    }
                }
                if (!empty($phonecode) && !empty($mobile_no)) {
                    $checkmobile = $this->Api_model->check_partner_mobile_exists($phonecode, $mobile_no, $category_type);

                    if (count($checkmobile) > 0) {
                        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_already_exists'));
                        exit;
                    }
                }
                if($category_type== 8){
                    $is_fill_profile = 1;
                }else{
                    $is_fill_profile = 0;
                }
                $insert = array(
                    'category'      => $category_type,
                    'name'          => $name,
                    'country_code'  => $phonecode,
                    'contact_no'    => $mobile_no,
                    'email'         => $email,
                    'profile'       => $profile_pic,
                    'password'      => md5($password),
                    'register_type' => $register_type,
                    'quickblox_name'=>$this->get_random_string(8),
                    'social_id'     => $social_id,
                    'status_by_admin'=> $status_admin,
                    'org_password'   => $password,
                    'is_verifyotp'   => 1,
                    'is_fill_profile'=> $is_fill_profile,
                    'created_at'    => date('Y-m-d H:i:s'),
                );
                $userid = $this->Common_model->data_insert('tbl_partners', $insert);
            } else {
                $userid = $checksocial[0]['id'];
            }
        } else {
            return $this->sendSuccessErrorResponse("Invalid register type");
            exit;
        }

       
        if (!empty($userid)) {
            $insertlocation = [
                'partner_id' => $userid,
                'category_type' => $category_type,
                'device_type' => $device_type,
                'device_token' => $device_token,
                'authtoken' => $this->generate_auth_token(),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $devicetokenid = $this->Common_model->data_insert('tbl_partner_device', $insertlocation);

        $customers = $this->get_all_customers_data($category_type, $userid, $devicetokenid);

        return $this->sendResponse($customers, $this->get_message_value_from_key($language_id, 'registration-successfully'));
        exit;
    }
    public function sendotp()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $otp = rand(1111, 9999);

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($phonecode, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));

        $twillio = array('mobile_number' => $phonecode . $mobile_no, 'body' => 'Your OTP to register/access AtHeal is: ' . $otp . ' It will be valid for 3 minutes.');
        // print_r($twillio);die;
        $this->load->helper('twilio_helper');
        $mbcheck = $this->mobilenumbercheck($phonecode . $mobile_no);
        if ($mbcheck != '1' || $mbcheck != true) {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_not_valid'));
        }
        sleep(5);
        $message = send_message($twillio);
        if (!empty($message)) {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'otp-not-send'));
            exit;

        } else {

            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'otp-send'), '1', $otp);

            exit;
        }
    }
    public function getprofile()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($id, $category_type, $language_id);
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);
        $customers = $this->get_all_customers_data($category_type, $id, $currendeviceid);
        return $this->sendResponse($customers,$this->get_message_value_from_key($language_id, 'user_profile'));
    }
    public function login()
    {
        //log_message('info','LOGIN_API');
        //log_message('info',print_r($_REQUEST,true));
        
        $language_id = isset($_REQUEST['language']) ? $_REQUEST['language'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "8";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
        /* tbl_customer_device */
        $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : "";
        $device_token = isset($_REQUEST['device_token']) ? $_REQUEST['device_token'] : "";
        $this->checkemptyvalue($language_id, "Language is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));

        $this->checkemptyvalue($email, $this->get_message_value_from_key($language_id, 'email_address_is_required'));
        $this->checkemptyvalue($password, $this->get_message_value_from_key($language_id, 'password_is_required'));
        /* Devicetoken */
        $this->checkemptyvalue($device_type, $this->get_message_value_from_key($language_id, 'device_type_is_required'));
        $this->checkemptyvalue($device_token, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $data = $this->Api_model->partner_login_with_email($category_type, $email, md5($password));
        if (!empty($data) && isset($data['id']) && !empty($data['id'])) {
            
            if($data['status']=='1')
            {
                $deletequery = "DELETE FROM tbl_partner_device WHERE partner_id='".$data['id']."' AND category_type= '".$category_type."'";
                $this->db->query($deletequery);
                $devicetoken_insert = array(
                    'partner_id'    => $data['id'],
                    'device_type'   => $device_type,
                    'category_type' => $category_type,
                    'device_token'  => $device_token,
                    'authtoken'     => $this->generate_auth_token(),
                    'created_at'    => date('Y-m-d H:i:s'),
                );
                $devicetokenid = $this->Common_model->data_insert('tbl_partner_device', $devicetoken_insert);
                $response = $this->get_all_customers_data($category_type, $data['id'], $devicetokenid);
                return $this->sendResponse($response, $this->get_message_value_from_key($language_id, 'user_login'));
            }
            else
            {
                return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'your_account_is_not_approval'));
                exit;
            }
            
            
            
            
        } else {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_address_and_password_is_not_match'));
            exit;
        }
    }
    public function logout()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);

        $deletequery = "DELETE FROM tbl_partner_device WHERE id='" . $currendeviceid . "'";
        $this->db->query($deletequery);
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'logout_successful'), '1');
    }
    public function change_password()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        //$category_type=isset($_REQUEST['category_type']) ? $_REQUEST['category_type']:"8";

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $oldpassword = isset($_REQUEST['oldpassword']) ? $_REQUEST['oldpassword'] : "";
        $newpassword = isset($_REQUEST['newpassword']) ? $_REQUEST['newpassword'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        //$this->checkemptyvalue($category_type,"Category Type is required");
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($oldpassword, $this->get_message_value_from_key($language_id, 'old_password_is_required'));

        $this->userexists($id, $currendeviceid, $authtoken, $language_id);

        $oldpasswordmatch = $this->Api_model->check_partner_password_match($id, $oldpassword);
        //print_r($oldpasswordmatch);die;
        if ($oldpasswordmatch == 0) {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'old_password_and_new_password_not_same'));
            exit;
        }
        $this->checkemptyvalue($newpassword, $this->get_message_value_from_key($language_id, 'new_password_is_required'));
        $updatepassword = array(
            'password'    => md5($newpassword),
            'org_password'=> $newpassword,
            'updated_at'  => date('Y-m-d H:i:s'),
        );
        $this->Common_model->data_update('tbl_partners', $updatepassword, array('id' => $id));
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'password_change_successfully'), '1');
    }
    public function cms_pages()
    {
        $pageid = isset($_REQUEST['pageid']) ? $_REQUEST['pageid'] : "";
        $this->checkemptyvalue($pageid, "pageid is required");
        $data = $this->Api_model->get_cms_pages_by_id($pageid);
        //print_r($data);die;
        if (!empty($data) && count($data) > 0 && isset($data['id'])) {
            $this->sendResponse($data,'page_found');
            exit;
        } else {
            return $this->sendSuccessErrorResponse('No-page-found', '1');
        }
    }
    public function contact_us()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_contact_us();
        if (!empty($data) && count($data) > 0 && isset($data['id'])) {
            $this->sendResponse($data, "Contact Us Data");
            exit;
        }
    }
    public function mobilenumbercheck($mobile)
    {
        $this->load->helper('twilio_helper');
        return checkmobilenumber($mobile);
    }
    public function forgot_password()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $flag = isset($_REQUEST['flag']) ? $_REQUEST['flag'] : "";

        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        //$phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($flag, "flag is required");
        if (strtoupper($flag) == 'E') {
            $this->checkemptyvalue($email, $this->get_message_value_from_key($language_id, 'email_address_is_required'));
        } else {
            $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
            //$this->checkemptyvalue($phonecode, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        }

        if (strtoupper($flag) == 'E' && $email != '') {
            $this->db->select('id,org_password,email,contact_no,name');
            $this->db->from('tbl_partners');
            $this->db->where("email", $email);
            $this->db->where("category", $category_type);
            $q = $this->db->get()->row_array();
            //print_r($q);die;
            if (!empty($q)) {

                $this->load->helper('phpmailer_helper');
                
                $message = send_mail($q['email'], $q['org_password'], $q['name']);

                return $this->sendSuccessErrorResponse($message);
                exit;

            } else {
                return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_is_not_valid'));
                exit;
            }

        } else if (strtoupper($flag) == 'M' && $mobile_no != '' ) {
            $this->db->select('id,org_password,email,contact_no');
            $this->db->from('tbl_partners');
            $this->db->where("contact_no", $mobile_no);
            //$this->db->where("country_code", $phonecode);
            $this->db->where("category", $category_type);
            $q = $this->db->get()->row_array();
            
            if (!empty($q)) {
                $phonecode = "+91";
                $twillio = array('mobile_number' => $phonecode . $mobile_no, 'body' => 'Your Password is : ' . $q['org_password']);
                
                //print_r($twillio);die;
                $this->load->helper('twilio_helper');
                $mbcheck = $this->mobilenumbercheck($phonecode . $mobile_no);
                if ($mbcheck != '1' || $mbcheck != true) {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_not_valid'));
                }

                sleep(5);
                $message = send_message($twillio);
                if (!empty($message)) {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'password_is_not_send'));
                } else {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'password_send_succesfully'));
                }
            } else {
                return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'this_user_is_not_exits'));
                exit;
            }
        }

    }
    public function check_emailormobile()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($phonecode, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($email, $this->get_message_value_from_key($language_id, 'email_address_is_required'));

        $checkmobile = $this->Api_model->check_partner_mobile_exists($phonecode, $mobile_no, $category_type);
        //print_r($checkmobile);die;
        if (count($checkmobile) > 0) {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_already_exists'));
            exit;
        }

        $checkmail = $this->Api_model->check_partner_email_exist($email, $category_type);
        //print_r($checkmail);die;

        if ($checkmail > 0) {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_is_already_exists'));
            exit;
        }

        if (count($checkmobile) == 0 && $checkmail == 0) {
            return $this->sendSuccessErrorResponse("Mobile No & Email Id is Not exists", "1");
            exit;
        }

    }
    public function update_emailormobile()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($phonecode,$this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($id,$this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($mobile_no,$this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($email,$this->get_message_value_from_key($language_id, 'email_address_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($id, $category_type, $language_id);
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);
        $checkmobile = $this->Api_model->check_partner_mobile_exists_withid($phonecode, $mobile_no, $id, $category_type);
        $response = $this->get_all_customers_data($category_type, $id, $currendeviceid);
        if ($checkmobile > 0) {
            return $this->sendSuccessErrorResponse("Mobile No is already exists");
            exit;
        } else {
            $ddata['contact_no'] = $mobile_no;
        }

        $checkmail = $this->Api_model->check_partner_email_exists_withid($email, $id, $category_type);

        if ($checkmail > 0) {
            return $this->sendSuccessErrorResponse("Email Id already exists");
            exit;
        } else {
            $ddata['email'] = $email;
        }

        if ($name != '') {
            $ddata['name'] = $name;
        }

     
        
        $this->Common_model->data_update("tbl_partners", $ddata, array("id" => $id));

        // $customers=$this->get_all_customers_data($category_type,$id,$devicetokenid);
        $customerdata = $this->Api_model->get_all_data_partners($category_type, $id);
        

        return $this->sendResponse($response, "Profile Update Successful");

        exit;
    }
    public function speciality_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));

        $speciality_list = $this->Api_model->get_sub_service_list($category_type);
        if (count($speciality_list) > 0) {
            foreach($speciality_list as $k=>$v) {
                $id = $v['id'];
                $query = "SELECT * FROM `tbl_services` WHERE `id`='" . $id."' LIMIT 0,1";
                $result = $this->db->query($query)->row();
                if($language_id == 1) {
                    $speciality_list[$k]['iconimg'] = $result->iconimg;
                } else if($language_id == 2){
                    $speciality_list[$k]['iconimg'] = $result->image_hindi;
                }
            }
            $data['speciality_list'] = $speciality_list;
            return $this->sendResponse($data['speciality_list'], "Speciality List");
            exit;
        } else {
            return $this->sendSuccessErrorResponseWithData("Speciality is Not exists");
            exit;
        }
    }
    public function update_profile()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
        $phonecode = isset($_REQUEST['phonecode']) ? $_REQUEST['phonecode'] : "";
        $phone_number = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : "";
        $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
        $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : "";
        $pincode = isset($_REQUEST['pincode']) ? $_REQUEST['pincode'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : "";
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : "";

        $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : "";
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
        $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : "";
        $qualification_name = isset($_REQUEST['qualification_name']) ? $_REQUEST['qualification_name'] : "";
        $qualification_specility = isset($_REQUEST['qualification_specility']) ? $_REQUEST['qualification_specility'] : "";
        $qualification_clg_name = isset($_REQUEST['qualification_clg_name']) ? $_REQUEST['qualification_clg_name'] : "";
        $qualification_uni_name = isset($_REQUEST['qualification_uni_name']) ? $_REQUEST['qualification_uni_name'] : "";
        $qualification_year = isset($_REQUEST['qualification_year']) ? $_REQUEST['qualification_year'] : "";
        $registration_name = isset($_REQUEST['registration_name']) ? $_REQUEST['registration_name'] : "";
        $registration_no = isset($_REQUEST['registration_no']) ? $_REQUEST['registration_no'] : "";
        $registration_year = isset($_REQUEST['registration_year']) ? $_REQUEST['registration_year'] : "";
        $work_exp = isset($_REQUEST['work_exp']) ? $_REQUEST['work_exp'] : '[{"Rowno":"1","Companyname":"","Designation":"","Exp_Year":""}]';
        $IDProof_type = isset($_REQUEST['IDProof_type']) ? $_REQUEST['IDProof_type'] : "";
        $IDProof_no = isset($_REQUEST['IDProof_no']) ? $_REQUEST['IDProof_no'] : "";
        $old_image = isset($_FILES['old_image']) ? $_FILES['old_image'] : "";
        $address_proof = isset($_FILES['address_proof']) ? $_FILES['address_proof'] : "";
        $qualification_image = isset($_FILES['qualification_image']) ? $_FILES['qualification_image'] : "";
        $registration_image = isset($_FILES['registration_image']) ? $_FILES['registration_image'] : "";
        $IDProof_image = isset($_FILES['IDProof_image']) ? $_FILES['IDProof_image'] : "";
        $is_speciality = isset($_REQUEST['is_speciality']) ? $_REQUEST['is_speciality'] : "";
        $speciality_id = isset($_REQUEST['speciality_id']) ? $_REQUEST['speciality_id'] : "";
        $is_homevisit = isset($_REQUEST['is_homevisit']) ? $_REQUEST['is_homevisit'] : "";
        $is_online = isset($_REQUEST['is_online']) ? $_REQUEST['is_online'] : "";
        $is_old_image= isset($_REQUEST['is_old_image']) ? $_REQUEST['is_old_image'] : "";
        $is_address_proof = isset($_REQUEST['is_address_proof']) ? $_REQUEST['is_address_proof'] : "";
        $is_IDProof_image = isset($_REQUEST['is_IDProof_image']) ? $_REQUEST['is_IDProof_image'] : "";
        $is_qualification_image= isset($_REQUEST['is_qualification_image']) ? $_REQUEST['is_qualification_image'] : "";
        $is_registration_image = isset($_REQUEST['is_registration_image']) ? $_REQUEST['is_registration_image'] : "";
        //print_r($is_registration_image);die;
        $data = array();
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        $this->checkemptyvalue($email, $this->get_message_value_from_key($language_id, 'email_address_is_required'));
        $this->checkemptyvalue($phonecode, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($phone_number, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($country, $this->get_message_value_from_key($language_id, 'country_is_required'));
        $this->checkemptyvalue($state, $this->get_message_value_from_key($language_id, 'state_is_required'));
        $this->checkemptyvalue($city, $this->get_message_value_from_key($language_id, 'city_is_required'));
        $this->checkemptyvalue($pincode, $this->get_message_value_from_key($language_id, 'pincode_is_required'));
        $this->checkemptyvalue($dob, $this->get_message_value_from_key($language_id, 'dob-is-required'));
        $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
        $allimage_data = $this->db->get_where('tbl_partners',["id" => $id])->row_array();
        if($allimage_data['profile'] == ''){
            $this->checkemptyvalue($old_image,"Profile Image is required");
        }else{
            $this->checkemptyvalue($is_old_image,"is_old_image is required");
            if($is_old_image == 1){
                $this->checkemptyvalue($old_image,"Profile Image is required");
            }
        }
        if ($category_type == 4 || $category_type == '4' || $category_type == 5 || $category_type == '5' || $category_type == 6 || $category_type == '6' || $category_type == 7 || $category_type == '7') {
            $this->checkemptyvalue($dob, $this->get_message_value_from_key($language_id, 'dob-is-required'));
            $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
            if ($category_type == 4 || $category_type == '4') {
                $this->checkemptyvalue($is_speciality, "is_speciality is required");
                $this->checkemptyvalue($is_online, "is_online is required");
                $this->checkemptyvalue($is_homevisit, "is_homevisit is required");
                //$this->checkemptyvalue($description, $this->get_message_value_from_key($language_id, 'description-is-required'));
                if ($is_speciality == '1' || $is_speciality == 1) {
                    $this->checkemptyvalue($speciality_id, $this->get_message_value_from_key($language_id, 'speciality-is-required'));
                    $this->checkemptyvalue($qualification_specility, $this->get_message_value_from_key($language_id, 'qualification-of-speciality-is-required'));
                }
            }
            $this->checkemptyvalue($qualification_name, $this->get_message_value_from_key($language_id, 'qualification-is-required'));

            $this->checkemptyvalue($qualification_clg_name, $this->get_message_value_from_key($language_id, 'college-name-is-required'));
            $this->checkemptyvalue($qualification_uni_name, $this->get_message_value_from_key($language_id, 'univertsity-name-is-required'));
            $this->checkemptyvalue($qualification_year, $this->get_message_value_from_key($language_id, 'passing-year-is-required'));
            if ($category_type == 4 || $category_type == '4' || $category_type == 5 || $category_type == '5') {
                $this->checkemptyvalue($registration_name, $this->get_message_value_from_key($language_id, 'mci-is-required'));
                $this->checkemptyvalue($registration_no, $this->get_message_value_from_key($language_id, 'registration-no-required'));
                $this->checkemptyvalue($registration_year, $this->get_message_value_from_key($language_id, 'registarion-year-required'));
                if($allimage_data['ug_mci_certificate'] == ''){
                    //print_r(123);die;
                    $this->checkemptyvalue($registration_image,"registration_image is required");
                }else{
                    
                    $this->checkemptyvalue($is_registration_image,"is_registration_image is required");
                    if($is_registration_image == 1){
                       $this->checkemptyvalue($registration_image,"registration_image is required");
                    }
                }
            }

            $this->checkemptyvalue($IDProof_type, $this->get_message_value_from_key($language_id, 'Id-proof-type required'));
            $this->checkemptyvalue($IDProof_no, $this->get_message_value_from_key($language_id, 'ID-proof-no-is-required'));
            if($allimage_data['ug_certificate'] == ''){
                $this->checkemptyvalue($qualification_image,"qualification_image is required");
            }else{
                $this->checkemptyvalue($is_qualification_image,"is_qualification_image is required");
                if($is_qualification_image == 1){
                   $this->checkemptyvalue($qualification_image,"qualification_image is required");
                }
            }

            if($allimage_data['pancard'] == ''){
                $this->checkemptyvalue($IDProof_image,"ID_proof is required");
            }else{
                $this->checkemptyvalue($is_IDProof_image,"is_IDProof_image is required");
                if($is_IDProof_image == 1){
                   $this->checkemptyvalue($IDProof_image,"ID_proof is required");
                }
            }
        }else{
            if($allimage_data['address_proof'] == ''){
            $this->checkemptyvalue($address_proof,"AddressProof Image is required");
            }else{
                $this->checkemptyvalue($is_address_proof,"is_address_proof Image is required");
                if($is_address_proof == 1){
                    $this->checkemptyvalue($address_proof,"AddressProof Image is required");
                }
            }
        }
        
        $field = 'adharcard_no';
        if ($IDProof_type == 1) {
            $this->adharcard_no_check($IDProof_no);
            $field = 'adharcard_no';
        } else if ($IDProof_type == 2) {
            $this->pancard_no_check($IDProof_no);
            $field = 'pan';
        }

        $this->userexists($id, $currendeviceid, $authtoken, $language_id);
        $this->checkuser($id, $category_type, $language_id);

        // $latlong = $this->getlatlng($address, $city, null, $country);
        // $latitude = $latlong['latitude'];
        // $longtitude = $latlong['longitude'];
        
        if (!empty($email)) {
            $checkmail = $this->Api_model->check_partner_email_exists_withid($email, $id, $category_type);
            if ($checkmail > 0) {
                return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'email_is_already_exists'));
                exit;
            }
        }
        if (!empty($phonecode) && !empty($phone_number)) {
            $checkmobilenumberexists = $this->Api_model->check_partner_mobile_exists_withid($phonecode, $phone_number, $id, $category_type);
            if ($checkmobilenumberexists > 0) {
                return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'mobile_number_is_already_exists'));
                exit;
            }
        }
        //$profile_pic = $old_image;
        $this->load->helper('genral_helper');
        if($is_old_image==1 || $is_old_image=='1')
        {
            if (isset($_FILES["old_image"]) && !empty($_FILES["old_image"]["name"]) && $_FILES["old_image"]["size"] > 0) {
                $path = $this->config->item("profile_images_path");
                $image = newuploadusingcompress($_FILES["old_image"], $path);
                if (!empty($image)) {
                    $profile_pic = $image;
                }
            }
        }else{
            $profile_pic = $allimage_data['profile'];
        }
         
        if ($category_type == 8 || $category_type == '8') {
            if($is_address_proof==1 || $is_address_proof=='1')
            {
                if (isset($_FILES["address_proof"]) && !empty($_FILES["address_proof"]["name"]) && $_FILES["address_proof"]["size"] > 0) {
                    $path = $this->config->item("address_proof_images_path");
                    $temp = explode(".", $_FILES["address_proof"]["name"]);
                    $filename = rand(0000, 9999) . time() . '.' . end($temp);
                    $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                    $fileExt = strtolower($fileExt);
                    if ($fileExt == 'pdf') {
        
                        $config['upload_path'] = './uploads/profile_setting/addressproof/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
        
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $uploadpath = $path;
                        move_uploaded_file($_FILES["address_proof"]["tmp_name"], $uploadpath . $filename);
                        $proof_img = $filename;
                    } else {
                        //print_r(12);die;
                        $proof_img = $this->newuploadusingcompress($_FILES["address_proof"], $path);
                    }
                }
            }
            else{
                $proof_img = $allimage_data['address_proof'];
            }
        }else{
            $proof_img = '';
        }
        

        if ($category_type == 4 || $category_type == '4' || $category_type == 5 || $category_type == '5' || $category_type == 6 || $category_type == '6' || $category_type == 7 || $category_type == '7') {
            
            if($is_qualification_image==1 || $is_qualification_image=='1')
            {
                if (isset($_FILES["qualification_image"]) && !empty($_FILES["qualification_image"]["name"]) && $_FILES["qualification_image"]["size"] > 0) {
                    $path = $this->config->item("ug_pg_images_path");
                    $temp = explode(".", $_FILES["qualification_image"]["name"]);
                    $filename = rand(0000, 9999) . time() . '.' . end($temp);
                    $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                    $fileExt = strtolower($fileExt);
    
                    if ($fileExt == 'pdf') {
    
                        $config['upload_path'] = './uploads/profile_setting/UG_PG_certi/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
    
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $uploadpath = $path;
                        move_uploaded_file($_FILES["qualification_image"]["tmp_name"], $uploadpath . $filename);
                        $qualification_image = $filename;
                    } else {
                        $qualification_image = $this->newuploadusingcompress($_FILES["qualification_image"], $path);
                    }
    
                } else {
                    $this->sendSuccessErrorResponse("Qulification Certificate is required");
                }
            }else{
                $qualification_image = $allimage_data['ug_certificate'];
            }
            //print_r($is_registration_image);die;
            if($is_registration_image == 1 || $is_registration_image == '1')
            {
                //print_r('hi');die;
                if ($category_type == 4 || $category_type == '4' || $category_type == 5 || $category_type == '5') {
                    if (isset($_FILES["registration_image"]) && !empty($_FILES["registration_image"]["name"]) && $_FILES["registration_image"]["size"] > 0) {
                        $path = $this->config->item("ug_pg_images_path");
                        $temp = explode(".", $_FILES["registration_image"]["name"]);
                        $filename = rand(0000, 9999) . time() . '.' . end($temp);
                        $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                        $fileExt = strtolower($fileExt);
    
                        if ($fileExt == 'pdf') {
    
                            $config['upload_path'] = './uploads/profile_setting/UG_PG_certi/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
    
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $uploadpath = $path;
                            move_uploaded_file($_FILES["registration_image"]["tmp_name"], $uploadpath . $filename);
                            $registration_image = $filename;
                        } else {
                            $registration_image = $this->newuploadusingcompress($_FILES["registration_image"], $path);
                        }
                        //print_r($registration_image);die;
                    } else {
    
                        $this->sendSuccessErrorResponse("Registration Certificate is required");
                    }
                }
                
            }else{
                $registration_image = $allimage_data['ug_mci_certificate'];
            }
            
            if($is_IDProof_image == 1 || $is_IDProof_image == '1')
            {
                if (isset($_FILES["IDProof_image"]) && !empty($_FILES["IDProof_image"]["name"]) && $_FILES["IDProof_image"]["size"] > 0) {
                    $path = $this->config->item("pancard_images_path");
                    $temp = explode(".", $_FILES["IDProof_image"]["name"]);
                    $filename = rand(0000, 9999) . time() . '.' . end($temp);
                    $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                    $fileExt = strtolower($fileExt);
    
                    if ($fileExt == 'pdf') {
    
                        $config['upload_path'] = './uploads/profile_setting/pancard/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
    
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $uploadpath = $path;
                        move_uploaded_file($_FILES["IDProof_image"]["tmp_name"], $uploadpath . $filename);
                        $IDProof_image = $filename;
                    } else {
                        $IDProof_image = $this->newuploadusingcompress($_FILES["IDProof_image"], $path);
                    }
                } else {
                    $this->sendSuccessErrorResponse("Documnet Of ID Proof is required");
                }
            }else{
                $IDProof_image = $allimage_data['pancard'];
            }
            
        }
        //print_r($work_exp);die;
        $data = [
            'name'              => $name,
            'email'             => $email,
            'country_code'      => $phonecode,
            'contact_no'        => $phone_number,
            'address'           => $address,
            'country'           => $country,
            'state'             => $state,
            'city'              => $city,
            'pincode'           => $pincode,
            'latitude'          => $latitude,
            'longitude'         => $longitude,
            'pincode'           => $pincode,
            'profile'           => $profile_pic,
            'pancard'           => $IDProof_image,
            'ug_certificate'    => $qualification_image,
            'ug_mci_certificate'=> $registration_image,
            'address_proof'     => $proof_img,
            'gender'            => $gender,
            'dob'               => date("Y-m-d", strtotime($dob)),
            'description'       => $description,
            $field              => $IDProof_no,
            'work_exp'          => $work_exp,
            'ug_college'        => $qualification_clg_name,
            'ug_uni'            => $qualification_uni_name,
            'ug_course'         => $qualification_name,
            'ug_speciality'     => $qualification_specility,
            'ug_year'           => $qualification_year,
            'ug_mci'            => $registration_name,
            'ug_reg_no'         => $registration_no,
            'ug_mci_year'       => $registration_year,
            'speciality'        => $speciality_id,
            'is_homevisit'      => $is_homevisit,
            'is_online'         => $is_online,
            'is_fill_profile'   => 1,
            'updated_at'        => date('Y-m-d H:i:s'),
        ];
        

        $this->Common_model->data_update('tbl_partners', $data, array('id' => $id));
        $vdata = array();
        $vdata = [
            'partner_id' => $id,
        ];
        $this->Common_model->data_insert("tbl_documents_status", $vdata);

        $customers = $this->get_all_customers_data($category_type, $id, $currendeviceid);
        return $this->sendResponse($customers, "Profile Update Successful");
    }
        
    public function patient_consult()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $healthcare_id = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";
        $healthcare_subid = isset($_REQUEST['healthcare_sub_id']) ? $_REQUEST['healthcare_sub_id'] : "";
        $consultation_type = isset($_REQUEST['consultation_type']) ? $_REQUEST['consultation_type'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $symptoms = isset($_REQUEST['symptoms']) ? $_REQUEST['symptoms'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $temp_appointment_data = isset($_REQUEST['temp_appointment_data']) ? $_REQUEST['temp_appointment_data'] : "";

        // $appointment_date = isset($_REQUEST['appointment_date']) ? $_REQUEST['appointment_date'] : "";
        // $appointment_time = isset($_REQUEST['appointment_time']) ? $_REQUEST['appointment_time'] : "";
        // $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";

        $appointment_date=NULL;
        $appointment_time=NULL;
        $clinic_id=NULL;

        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($healthcare_id, $this->get_message_value_from_key($language_id, 'healthcare-id-is-required'));
        if ($healthcare_id == 4) {
            $this->checkemptyvalue($healthcare_subid, $this->get_message_value_from_key($language_id, 'healthcare_subid-is-required'));
        }
        $this->checkemptyvalue($consultation_type, $this->get_message_value_from_key($language_id, 'consultation-mode-is-required'));

        // if ($consultation_type == 0) {
        //     $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
        //     $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
        // } else if($consultation_type == 2) {
        //     $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
        //     $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
        //     $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id-is-required'));
        // }

        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($symptoms, $this->get_message_value_from_key($language_id, 'symptoms_is_required'));
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        if ($consultation_type == 1 || $consultation_type == '1') {
            $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
            $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        }

        $data = $this->Api_model->get_nearest_doctors_list($consultation_type, $latitude, $longitude, $healthcare_id, $healthcare_subid);

        // echo $this->db->last_query();
        // exit;
        
        // $message = 'test push notification';
        // $this->load->helper('notifications_helper');
        // for($i=0;$i < count($data);$i++){
        //     $healthcare_devicedata = $this->db->get_where('tbl_partner_device',["partner_id" => $data[$i]['id'], "category_type" => $data[$i]['category']])->row_array();
        //     push_notification_android($healthcare_devicedata['device_token'],$message);

        // }
        //print_r($data);die;
        $tempdata = $this->Api_model->get_nearest_partner_devicetokens($consultation_type, $latitude, $longitude, $healthcare_id, $healthcare_subid);


        $tempdataIOS = $this->Api_model->get_nearest_partner_devicetokensIOS($consultation_type, $latitude, $longitude, $healthcare_id, $healthcare_subid);


        $senderRecord = $this->Api_model->check_partners_details_by_id($userid);
        $symptoms_array = json_decode($symptoms);
        $symptoms_string = '';
        for ($i=0; $i < count($symptoms_array); $i++) { 
           $symptoms_string .= ",".$symptoms_array[$i]->SymptomsName; 
        }
        $symptoms_string = substr($symptoms_string, 1);

        if(count($data) > 0) {
            $random_no = rand(1111111111,9999999999);
            for ($i=0; $i < count($data); $i++) { 
                $count = $this->Api_model->check_partner_device_exit($data[$i]['id']);
                if($data[$i]['category'] == 4 || $data[$i]['category'] == 5){
                    $NotificationTitle = "New Consultation Request";
                    $NotificationMessage = "You Have Recieved New Consultation Request By ".$name." For ".$symptoms_string.". View Details.";
                }else if($data[$i]['category'] == 6 || $data[$i]['category'] == 7){
                    $NotificationTitle = "New Service Request";
                    $NotificationMessage = "You Have Recieved New Service  Request By ".$name." For ".$symptoms_string.". View Details.";
                }

                if(count($count) > 0)
                {
                    $notification_insert = [
                        "notification_type" => "N",
                        "partener_id"       => $data[$i]['id'],
                        "category"          => $data[$i]['category'],
                        "patient_id"        => $userid,
                        "order_id"          => "",
                        "order_no"          => "",
                        "title"             => $NotificationTitle,
                        "description"       => $NotificationMessage,
                        "temp_appointment_data"=>$temp_appointment_data,
                        "request_id"        => $random_no,
                        "created_at"        => date('Y-m-d H:i:s')
                    ];
                    
                    $this->Common_model->data_insert('tbl_notification', $notification_insert);
                    

                    // if(strlen((string)$data[$i]['id']) > 4){
                    //     $reqId = $data[$i]['id'].$data[$i]['category'];
                    // }else if(strlen((string)$data[$i]['id']) == 4){
                    //     $reqId = $data[$i]['id'].$data[$i]['category'];
                    // }else{
                    //     $reqId = sprintf('%04u',$data[$i]['id']).$data[$i]['category'];
                    // }
                    // $partner_insert = [
                    //     "partner_id"    => $data[$i]['id'],
                    //     "category"      => $data[$i]['category'],
                    //     "patient_id"    => $userid,
                    //     "request_id"    => $random_no
                    // ];
                    // $this->Common_model->data_insert('tbl_patient_consult', $partner_insert);   
                }
            }

            if($data[0]['category'] = 4){
               $categoryLabel = 'Doctors';
               $patientNotificationTitle = 'Pending Consultation';
            }else if($data[0]['category'] = 5){
               $categoryLabel = 'Animal Doctors';
               $patientNotificationTitle = 'Pending Consultation';
            }else if($data[0]['category'] = 6){
               $categoryLabel = 'Nurses';
               $patientNotificationTitle = 'Pending Service';
            }else if($data[0]['category'] = 7){
               $categoryLabel = 'Physiotherapists';
               $patientNotificationTitle = 'Pending Service';
            }
            
            $patientnotification_insert = [
                "notification_type" => "NP",
                "partener_id"       => $userid,
                "category"          => $data[0]['category'],
                "patient_id"        => $userid,
                "order_id"          => "",
                "order_no"          => "",
                "title"             => $patientNotificationTitle,
                "description"       => "View Details.",
                "temp_appointment_data"=>$temp_appointment_data,
                "request_id"        => $random_no,
                "created_at"        => date('Y-m-d H:i:s')
            ];

            $this->Common_model->data_insert('tbl_notification', $patientnotification_insert);

            $device_token_patient = $this->Api_model->get_user_profile_setting($userid);
            $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($userid);
            $patientnotification_message = array();
            $patientnotification_message['type'] = "Pending Consultation";
            $patientnotification_message['title'] = $patientNotificationTitle;
            $patientnotification_message['body'] = "View Details.";
            $patientnotification_message['sound'] = "consultationsound.wav";
            $patientnotification_message['request_id'] = $random_no;
            $patientnotification_message['patient_id'] = $userid;
            $this->load->helper('notifications_helper');
            if(!empty($device_token_patient))
            {
                push_notification_android($device_token_patient['registration_ids'],$patientnotification_message);
            }
            if(!empty($device_token_IOS_patient))
            {
                push_notification_IOS($device_token_IOS_patient['registration_ids'],$patientnotification_message);
            }

            $device_token = $tempdata;
            $notification_message = array();
            $notification_message['type'] = "Pending Consultation";
            $notification_message['title'] = $NotificationTitle;
            $notification_message['body'] = $NotificationMessage;
            $notification_message['sound'] = "consultationsound.wav";
            $notification_message['request_id'] = $random_no;
            $notification_message['patient_id'] = $userid;

         

            $this->load->helper('notifications_helper');
            if(!empty($device_token) && !empty($device_token['registration_ids']))
            {
                push_notification_android($device_token['registration_ids'],$notification_message);
            }
            if(!empty($tempdataIOS) && !empty($tempdataIOS['registration_ids']))
            {
                push_notification_IOS($tempdataIOS['registration_ids'],$notification_message);
            }
                
            $responcedata = array();
            $responcedata['notification_type'] = 'new_appointment';
            $responcedata['request_id'] = $random_no;
            $this->sendResponse($responcedata,$this->get_message_value_from_key($language_id,'All Online HealthCare List'));
            exit;
            
        } else {
            $return_data = array();
            return $this->sendNullResponse($return_data,"Sorry For Your Inconvenience, Currently No Services Can Be Found In Your Area. We Will Reach You Shortly");
        }
    }
    
    public function patient_consult_online_clinic()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $healthcare_id = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";
        $healthcare_subid = isset($_REQUEST['healthcare_sub_id']) ? $_REQUEST['healthcare_sub_id'] : "";
        $consultation_type = isset($_REQUEST['consultation_type']) ? $_REQUEST['consultation_type'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $symptoms = isset($_REQUEST['symptoms']) ? $_REQUEST['symptoms'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $temp_appointment_data = isset($_REQUEST['temp_appointment_data']) ? $_REQUEST['temp_appointment_data'] : "";

        $appointment_date=NULL;
        $appointment_time=NULL;
        $clinic_id=NULL;

        $appointment_date = isset($_REQUEST['appointment_date']) ? $_REQUEST['appointment_date'] : "";
        $appointment_time = isset($_REQUEST['appointment_time']) ? $_REQUEST['appointment_time'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";


        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($healthcare_id, $this->get_message_value_from_key($language_id, 'healthcare-id-is-required'));
        if ($healthcare_id == 4) {
            $this->checkemptyvalue($healthcare_subid, $this->get_message_value_from_key($language_id, 'healthcare_subid-is-required'));
        }
        $this->checkemptyvalue($consultation_type, $this->get_message_value_from_key($language_id, 'consultation-mode-is-required'));

        if ($consultation_type == 0) {
            $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
            $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
        } else if($consultation_type == 2) {
            $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
            $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
            // $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id-is-required'));
        }

        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($symptoms, $this->get_message_value_from_key($language_id, 'symptoms_is_required'));
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        if ($consultation_type == 0) {
            $latitude=0;
            $longitude=0;
        } else if($consultation_type == 2) {
            $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
            $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        }


        $current_date_time = date('Y-m-d H:i:s');
        $current_str_date_time = strtotime($current_date_time);
        
        if(isset($appointment_time) && !empty($appointment_time)) {
            $appointment_ti = str_pad($appointment_time, 2, '0', STR_PAD_LEFT);
            $appointment_times = $appointment_ti.":00:00";
        }
        
        $appo_date_time = $appointment_date. " ".$appointment_times;
        
        $appo_str_date_time = strtotime($appo_date_time);
       
        if($appo_str_date_time >= $current_str_date_time) {

            if($healthcare_id != 4) {
                $healthcare_subid = NULL;
            }

            $data = $this->Api_model->get_nearest_doctors_list_kunj_new($consultation_type, $latitude, $longitude, $healthcare_id, $healthcare_subid,$appointment_date,$appointment_time,$clinic_id);
           
            
            // if(count($data)>0) {
            //     $tmp_array = array();
            //     $tmp_array['doctors'] = $data;
            //     $this->sendResponse($tmp_array,$this->get_message_value_from_key($language_id,'All Online HealthCare List'));
            //     exit;
            // } else {
            //    $return_data = array();
            //     return $this->sendNullResponse($return_data,"Sorry For Your Inconvenience, Currently No Services Can Be Found In Your Area. We Will Reach You Shortly");
            // }

            /* */ 
            $symptoms_array = json_decode($symptoms);
            $symptoms_string = '';
            for ($i=0; $i < count($symptoms_array); $i++) { 
               $symptoms_string .= ",".$symptoms_array[$i]->SymptomsName; 
            }
            $symptoms_string = substr($symptoms_string, 1);

            $return_data = array();
            if(count($data)>0) {

                $tmp_array = array();
                $tmp_array['notification_type'] = '';
                $appointment_type = $consultation_type;

                $random_no = rand(1111111111,9999999999);

                $tmp_array['request_id'] = $random_no;

                foreach ($data as $key => $value) {
                    if ($consultation_type == 0) {
                        if($value['online_visit_main_amt'] > 0) {

                            $category_type = $value['category'];
                            $clinic_id = $value['clinic_id'];

                            if($key == 0) {
                                $data[$key]['request_id'] = $random_no;
                            } else {
                                $random_no = rand(1111111111,9999999999);
                                $data[$key]['request_id'] = $random_no;
                            }


                            if($data[$key]['category'] == 4 || $data[$key]['category'] == 5){
                                $NotificationTitle = "New Consultation Request";
                                $NotificationMessage = "You Have Recieved New Consultation Request By ".$name." For ".$symptoms_string.". View Details.";
                            } else if($data[$key]['category'] == 6 || $data[$key]['category'] == 7){
                                $NotificationTitle = "New Service Request";
                                $NotificationMessage = "You Have Recieved New Service  Request By ".$name." For ".$symptoms_string.". View Details.";
                            }

                            $notification_insert = [
                                "notification_type" => "N",
                                "partener_id"       => $data[$key]['id'],
                                "category"          => $data[$key]['category'],
                                "patient_id"        => $userid,
                                "order_id"          => "",
                                "order_no"          => "",
                                "title"             => $NotificationTitle,
                                "description"       => $NotificationMessage,
                                "temp_appointment_data"=>$temp_appointment_data,
                                "request_id"        => $random_no,
                                "appointment_type"  => $appointment_type,
                                "appointment_date"  => $appointment_date,
                                "appointment_time"  => $appointment_time,
                                "clinic_id"         => $clinic_id,
                                "created_at"        => date('Y-m-d H:i:s')
                            ];

                            // dd($notification_insert);
                            // exit;
                            $this->Common_model->data_insert('tbl_notification', $notification_insert);


                            if($data[0]['category'] = 4){
                               $categoryLabel = 'Doctors';
                               $patientNotificationTitle = 'Pending Consultation';
                            }else if($data[0]['category'] = 5){
                               $categoryLabel = 'Animal Doctors';
                               $patientNotificationTitle = 'Pending Consultation';
                            }else if($data[0]['category'] = 6){
                               $categoryLabel = 'Nurses';
                               $patientNotificationTitle = 'Pending Service';
                            }else if($data[0]['category'] = 7){
                               $categoryLabel = 'Physiotherapists';
                               $patientNotificationTitle = 'Pending Service';
                            }

                            $patientnotification_insert = [
                                "notification_type" => "NP",
                                "partener_id"       => $userid,
                                // "category"          => $data[0]['category'],
                                "category"          => $healthcare_id,
                                "patient_id"        => $userid,
                                "order_id"          => "",
                                "order_no"          => "",
                                "title"             => $patientNotificationTitle,
                                "description"       => "View Details.",
                                "temp_appointment_data"=>$temp_appointment_data,
                                "request_id"        => $random_no,
                                "req_status"        => '1',
                                "appointment_type"  => $appointment_type,
                                "appointment_date"  => $appointment_date,
                                "appointment_time"  => $appointment_time,
                                "clinic_id"        => $clinic_id,
                                "is_admin_view"        => '1',
                                "created_at"        => date('Y-m-d H:i:s')
                            ];

                            // dd($patientnotification_insert);
                            $this->Common_model->data_insert('tbl_notification', $patientnotification_insert);


                            // auto accept

                            $UserId = '';  
                            $PatientId ='';
                           
                            $UserId = $userid;  
                            $PatientId =$userid;
                           
                            $status = "1";

                            // $update_data['req_status'] = $status;
                            // $update_data['is_admin_view'] = '1';
                            
                            // $this->Common_model->data_update('tbl_notification', $update_data, array('request_id' =>$request_id,'patient_id'=>$PatientId,'partener_id'=>$UserId));
                            // e
                            $senderRecord=$this->Api_model->check_partners_details_by_id($userid);

                            //$appoitmentRecord=$this->Api_model->getusername($order_no);

                            $KeyWord_Appoitment = 'New';    
                           
                            if($consultation_type == '0'){
                                $ConsultationType = 'Online';
                            }else{
                                $ConsultationType = 'Clinic';
                            }

                            
                            if($status == '1' || $status == 1){
                                $category_type = 4;
                                $Keyvalue = $this->category_wise_key($category_type);
                                if($category_type == 4 || $category_type == 5){
                                    if($is_reinitate == 1){
                                        $Title =  "Confirmed Re-Consultation";
                                    }else{
                                        $Title =  "Confirmed Consultation";
                                    }
                                    $Message = "Your '".$ConsultationType."' Consultation With Dr. ".$senderRecord->name." Has Been Confirmed"; 
                                }else{
                                   
                                        $Title =  "Accepted Service Request";
                                    
                                    $Message = "Your ".$ConsultationType." Visit Service With ".$senderRecord->name." Has Been Confirmed. Consult Now"; 
                                }
                                
                                $notification_type = 'RA';
                            }

                            $order_id =  '';
                            $order_no = 0;

                            if($status == '1' || $status == 1){
                                $notification_insert = [
                                    "notification_type"=> $notification_type,
                                    "partener_id"   => $userid,
                                    "category"      => $healthcare_id,
                                    "patient_id"    => $userid,
                                    "order_id"      => $order_id,
                                    "order_no"      => $order_no,
                                    "title"         => $Title,
                                    "description"   => $Message,
                                    "request_id"    => $random_no,
                                    "appointment_type"  => $appointment_type,
                                    "appointment_date"  => $appointment_date,
                                    "appointment_time"  => $appointment_time,
                                    "clinic_id"        => $clinic_id,
                                    "temp_appointment_data" => $temp_appointment_data,
                                ];

                                $this->Common_model->data_insert('tbl_notification', $notification_insert);
                                
                            }

                            $return_data[] = $value;
                        }
                    } else if($consultation_type == 2) {
                        if($value['clinic_visit_main_amt'] > 0) {

                            $category_type = $value['category'];
                            $clinic_id = $value['clinic_id'];

                            if($key == 0) {
                                $data[$key]['request_id'] = $random_no;
                            } else {
                                $random_no = rand(1111111111,9999999999);
                                $data[$key]['request_id'] = $random_no;
                            }


                            if($data[$key]['category'] == 4 || $data[$key]['category'] == 5){
                                $NotificationTitle = "New Consultation Request";
                                $NotificationMessage = "You Have Recieved New Consultation Request By ".$name." For ".$symptoms_string.". View Details.";
                            } else if($data[$key]['category'] == 6 || $data[$key]['category'] == 7){
                                $NotificationTitle = "New Service Request";
                                $NotificationMessage = "You Have Recieved New Service  Request By ".$name." For ".$symptoms_string.". View Details.";
                            }

                            $notification_insert = [
                                "notification_type" => "N",
                                "partener_id"       => $data[$key]['id'],
                                "category"          => $data[$key]['category'],
                                "patient_id"        => $userid,
                                "order_id"          => "",
                                "order_no"          => "",
                                "title"             => $NotificationTitle,
                                "description"       => $NotificationMessage,
                                "temp_appointment_data"=>$temp_appointment_data,
                                "request_id"        => $random_no,
                                "appointment_type"  => $appointment_type,
                                "appointment_date"  => $appointment_date,
                                "appointment_time"  => $appointment_time,
                                "clinic_id"         => $clinic_id,
                                "created_at"        => date('Y-m-d H:i:s')
                            ];

                            // dd($notification_insert);
                            // exit;
                            $this->Common_model->data_insert('tbl_notification', $notification_insert);


                            if($data[0]['category'] = 4){
                               $categoryLabel = 'Doctors';
                               $patientNotificationTitle = 'Pending Consultation';
                            }else if($data[0]['category'] = 5){
                               $categoryLabel = 'Animal Doctors';
                               $patientNotificationTitle = 'Pending Consultation';
                            }else if($data[0]['category'] = 6){
                               $categoryLabel = 'Nurses';
                               $patientNotificationTitle = 'Pending Service';
                            }else if($data[0]['category'] = 7){
                               $categoryLabel = 'Physiotherapists';
                               $patientNotificationTitle = 'Pending Service';
                            }

                            $patientnotification_insert = [
                                "notification_type" => "NP",
                                "partener_id"       => $userid,
                                "category"          => $healthcare_id,
                                "patient_id"        => $userid,
                                "order_id"          => "",
                                "order_no"          => "",
                                "title"             => $patientNotificationTitle,
                                "description"       => "View Details.",
                                "temp_appointment_data"=>$temp_appointment_data,
                                "request_id"        => $random_no,
                                "req_status"        => '1',
                                "appointment_type"  => $appointment_type,
                                "appointment_date"  => $appointment_date,
                                "appointment_time"  => $appointment_time,
                                "clinic_id"        => $clinic_id,
                                "is_admin_view"        => '1',
                                "created_at"        => date('Y-m-d H:i:s')
                            ];

                            // dd($patientnotification_insert);
                            $this->Common_model->data_insert('tbl_notification', $patientnotification_insert);


                            // auto accept

                            $UserId = '';  
                            $PatientId ='';
                           
                            $UserId = $userid;  
                            $PatientId =$userid;
                           
                            $status = "1";

                            // $update_data['req_status'] = $status;
                            // $update_data['is_admin_view'] = '1';
                            
                            // $this->Common_model->data_update('tbl_notification', $update_data, array('request_id' =>$request_id,'patient_id'=>$PatientId,'partener_id'=>$UserId));
                            // e
                            $senderRecord=$this->Api_model->check_partners_details_by_id($userid);

                            //$appoitmentRecord=$this->Api_model->getusername($order_no);

                            $KeyWord_Appoitment = 'New';    
                           
                            if($consultation_type == '0'){
                                $ConsultationType = 'Online';
                            }else{
                                $ConsultationType = 'Clinic';
                            }

                            
                            if($status == '1' || $status == 1){
                                $category_type = 4;
                                $Keyvalue = $this->category_wise_key($category_type);
                                if($category_type == 4 || $category_type == 5){
                                    if($is_reinitate == 1){
                                        $Title =  "Confirmed Re-Consultation";
                                    }else{
                                        $Title =  "Confirmed Consultation";
                                    }
                                    $Message = "Your '".$ConsultationType."' Consultation With Dr. ".$senderRecord->name." Has Been Confirmed"; 
                                }else{
                                   
                                        $Title =  "Accepted Service Request";
                                    
                                    $Message = "Your ".$ConsultationType." Visit Service With ".$senderRecord->name." Has Been Confirmed. Consult Now"; 
                                }
                                
                                $notification_type = 'RA';
                            }

                            $order_id =  '';
                            $order_no = 0;

                            if($status == '1' || $status == 1){
                                $notification_insert = [
                                    "notification_type"=> $notification_type,
                                    "partener_id"   => $userid,
                                    "category"      => $healthcare_id,
                                    "patient_id"    => $userid,
                                    "order_id"      => $order_id,
                                    "order_no"      => $order_no,
                                    "title"         => $Title,
                                    "description"   => $Message,
                                    "request_id"    => $random_no,
                                    "appointment_type"  => $appointment_type,
                                    "appointment_date"  => $appointment_date,
                                    "appointment_time"  => $appointment_time,
                                    "clinic_id"        => $clinic_id,
                                    "temp_appointment_data" => $temp_appointment_data,
                                ];

                                $this->Common_model->data_insert('tbl_notification', $notification_insert);
                                
                            }

                            $return_data[] = $value;
                        }
                    }
                }
                
                if(count($return_data)>0) {
                    $tmp_array['doctors'] = $return_data;
                    $this->sendResponse($tmp_array,$this->get_message_value_from_key($language_id,'All Online HealthCare List'));
                    exit;
                } else {
                    $return_data = array();
                    return $this->sendNullResponse($return_data,"Sorry For Your Inconvenience, Currently No Services Can Be Found In Your Area. We Will Reach You Shortly");    
                }
                
            } else {
                $return_data = array();
                return $this->sendNullResponse($return_data,"Sorry For Your Inconvenience, Currently No Services Can Be Found In Your Area. We Will Reach You Shortly");
            }  
        } else {
            $return_data = array();
            return $this->sendNullResponse($return_data,'you can not book appointment for previous date time');
            exit;     
        }


    }

    public function reinitiate_consult()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $temp_appointment_data = isset($_REQUEST['temp_appointment_data']) ? $_REQUEST['temp_appointment_data'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($order_no, "order_no is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid,$currendeviceid, $authtoken, $language_id);
        $appoitmentRecord=$this->Api_model->getusername($order_no);
        $symptoms_array = json_decode($appoitmentRecord->symptoms);
        $symptoms_string = '';
        for ($i=0; $i < count($symptoms_array); $i++) { 
            $symptoms_string .= ",".$symptoms_array[$i]->SymptomsName; 
        }
        $symptoms_string = substr($symptoms_string, 1);
        $tempdata = $this->Api_model->get_reinitiate_partner_devicetokensAnroid($userid,$appoitmentRecord->partner_id);
        $tempdataIOS = $this->Api_model->get_reinitiate_partner_devicetokensIOS($userid,$appoitmentRecord->partner_id);
        $senderRecord = $this->Api_model->check_partners_details_by_id($userid);
        $OrderData = $this->Api_model->all_order_data($order_no);
        $ordercurrentdattime = array();
        $orderStatus = array();
        $orderStatus['id'] = '1';
        $orderStatus['date'] = date('Y-m-d H:i:s');
        $ordercurrentdattime[0] = $orderStatus;
        if($OrderData['consulation_type'] == 0){
           $appointment_status = '1'; 
        }else{
            $appointment_status = '0'; 
        }
        $customorder_id = rand(1111111111, 9999999999);
        $doctor = [
            'patient_realative'         => $OrderData['patient_realative'],
            'partner_id'                => $OrderData['partner_id'],
            'healthcare_sub_id'         => $OrderData['healthcare_sub_id'],
            'category'                  => $OrderData['category'],
            'patient_id'                => $userid,
            'name'                      => $OrderData['name'],
            'animal_name'               => $OrderData['animal_name'],
            'animal_category'           => $OrderData['animal_category'],
            'animal_caretaker'          => $OrderData['animal_caretaker'],
            'gender'                    => $OrderData['gender'],
            'age'                       => $OrderData['age'],
            'height'                    => $OrderData['height'],
            'weight'                    => $OrderData['weight'],
            'address'                   => $OrderData['address'],
            'latitude'                  => $OrderData['latitude'],
            'longitude'                 => $OrderData['longitude'],
            'symptoms'                  => $OrderData['symptoms'],
            'main_amount'               => 0,
            'treatment_hours'           => $OrderData['treatment_hours'],
            'treatment_per_hours'           => $OrderData['treatment_per_hours'],
            'treatment_days'           => $OrderData['treatment_days'],
            'treatment_start_date'      => $OrderData['treatment_start_date'],
            'treatment_end_date'        => $OrderData['treatment_end_date'],
            'partner_serialize_array'   => $OrderData['partner_serialize_array'],
            'patient_serialize_array'   => $OrderData['patient_serialize_array'],
            'payment_id'                => '',
            'appointment_status'        => $appointment_status,
            'customorder_id'            => $customorder_id,
            'service_charges'           => 0,
            'tds'                       => 0,
            'final_receiving_amt'       => 0,
            'change_status_datetime'    => json_encode($ordercurrentdattime),
            'consulation_type'          => $OrderData['consulation_type'],
            'is_reinitiate'             => '1',
            'reinitiate_date'           => date('Y-m-d H:i:s'),
            'created_at'                => date('Y-m-d H:i:s'),
        ];
        $lastinsertID = $this->Common_model->data_insert('tbl_order', $doctor);

        $random_no = rand(1111111111,9999999999);

        if($appoitmentRecord->category == 4 || $appoitmentRecord->category == 5){
            $PartnerNotificationTitle = "New Re-Consulatation Request";
            $PartnerNotificationMessage = "You Have Recieved New Re-Consulatation Request By ".$senderRecord->name." For ".$symptoms_string.". View Details.";
        }else{
            $PartnerNotificationTitle = "New Re-Service Request";
            $PartnerNotificationMessage = "You Have Recieved New Re-Service Request By ".$senderRecord->name." For ".$symptoms_string.". View Details.";
        }
        $notification_insert = [
                "notification_type"=> "RI",
                "partener_id"   => $appoitmentRecord->partner_id,
                "category"      => $appoitmentRecord->category,
                "patient_id"    => $userid,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => $PartnerNotificationTitle,
                "description"   => $PartnerNotificationMessage,
                "request_id"    => $random_no,
                "temp_appointment_data" => $temp_appointment_data
            ];
        $this->notification_entery($notification_insert);
        $device_token = $tempdata;
        $notification_message = array();
            $notification_message['type'] = "ReInitiate Appointment Request";
            $notification_message['title'] = $PartnerNotificationTitle;
            $notification_message['body'] = $PartnerNotificationMessage;
            $notification_message['sound'] = "consultationsound.wav";
            $notification_message['request_id'] = $random_no;
            $notification_message['patient_id'] = $userid;
                
            $this->load->helper('notifications_helper');
            if(!empty($device_token) && !empty($device_token['registration_ids']))
            {
                push_notification_android($device_token['registration_ids'],$notification_message);
            }
            if(!empty($tempdataIOS) && !empty($tempdataIOS['registration_ids']))
            {
                push_notification_IOS($tempdataIOS['registration_ids'],$notification_message);
            }
                
            $responcedata = array();
            $responcedata['notification_type'] = 'reinitiate_appointment';
            $responcedata['request_id'] = $random_no;
            
            $this->sendResponse($responcedata,$this->get_message_value_from_key($language_id,'Requset Send Successfully'));
            exit;
    }

    public function accept_or_reject_reqest(){ 
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";
        $is_reinitate = isset($_REQUEST['is_reinitate']) ? $_REQUEST['is_reinitate'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";

        //$temp_appointment_data = isset($_REQUEST['temp_appointment_data']) ? $_REQUEST['temp_appointment_data'] : "";
        $temp_appointment_data = isset($_REQUEST['temp_appointment_data']) ? $_REQUEST['temp_appointment_data'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'patient_id-is-required'));
        $this->checkemptyvalue($request_id, $this->get_message_value_from_key($language_id, 'request_id-is-required'));
        $this->checkemptyvalue($status, $this->get_message_value_from_key($language_id, 'status-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($is_reinitate, $this->get_message_value_from_key($language_id, 'is_reinitate_is_required'));
        $order_id = '';
        
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        
        $UserId = '';  
        $PatientId ='';
        if($category_type == '8' || $category_type == 8)
        {
            $UserId = $patient_id ; 
            $PatientId = $userid;  
        }else{
            $UserId = $userid;  
            $PatientId =$patient_id;
        }
        $update_data['req_status'] = $status;
        $update_data['is_admin_view'] = '1';
        
        $this->Common_model->data_update('tbl_notification', $update_data, array('request_id' =>$request_id,'patient_id'=>$PatientId,'partener_id'=>$UserId));
        $senderRecord=$this->Api_model->check_partners_details_by_id($userid);
        $appoitmentRecord=$this->Api_model->getusername($order_no);

        if($is_reinitate == 0){
            $KeyWord_Appoitment = 'New';    
        }else{
            $KeyWord_Appoitment = 'ReInitiated';    
        }

        if($appoitmentRecord->consulation_type == '0'){
            $ConsultationType = 'Online';
        }else{
            $ConsultationType = 'Home';
        }

        if($status == '1' || $status == 1){
            if($is_reinitate == 1){
                $this->db->query("UPDATE tbl_order SET is_reinitiate = '0' WHERE `id` = '".$order_no."'");
            }
            $Keyvalue = $this->category_wise_key($category_type);
            if($category_type == 4 || $category_type == 5){
                if($is_reinitate == 1){
                    $Title =  "Confirmed Re-Consultation";
                }else{
                    $Title =  "Confirmed Consultation";
                }
                $Message = "Your '".$ConsultationType."' Consultation With Dr. ".$senderRecord->name." Has Been Confirmed"; 
            }else{
                if($is_reinitate == 1){
                    $Title =  "Accepted Re-Service Request";
                }else{
                    $Title =  "Accepted Service Request";
                }
                $Message = "Your Home Visit Service With ".$senderRecord->name." Has Been Confirmed. Consult Now"; 
            }
            
            $notification_type = 'RA';
        }elseif($status == '2' || $status == 2){
            if($is_reinitate == 1 || $is_reinitate == 0){
                $exitOrder = $this->Api_model->all_order_data($order_no);
                if($exitOrder > 0){
                    $this->db->query("DELETE FROM `tbl_order`  WHERE `id` = '" .$order_no. "'");   
                }
            }
            if($category_type == 8){
                $this->db->query("DELETE FROM `tbl_notification` WHERE `request_id` = '" .$request_id. "'");
            }else{
                $this->db->query("DELETE FROM `tbl_notification` WHERE `request_id` = '" .$request_id. "' AND `req_status` = '2'");   
            }
            

            // $Title =  $KeyWord_Appoitment." ".$Keyvalue. " Request Rejected";
            // $notification_type = 'RR';

            // $Message = $senderRecord->name." has rejected your " .strtolower($KeyWord_Appoitment). " request";;
        }

        if($status == '1' || $status == 1){
            //$temp_appointment_data= $this->db->get_where('tbl_notification', ["request_id" => $request_id])->row_array();

            $notification_insert = [
                "notification_type"=> $notification_type,
                "partener_id"   => $patient_id,
                "category"      => $category_type,
                "patient_id"    => $patient_id,
                "order_id"      => $order_id,
                "order_no"      => $order_no,
                "title"         => $Title,
                "description"   => $Message,
                "request_id"    => $request_id,
                "temp_appointment_data" => $temp_appointment_data,
            ];
           
        $this->notification_entery($notification_insert);
        $device_token = $this->Api_model->get_user_profile_setting($patient_id);
        $device_token_IOS = $this->Api_model->get_user_profile_IOS($patient_id);
        if($notification_insert)
        {
            
            $notification_message = array();
            $notification_message['type'] = "Accept/Reject" .$Keyvalue. " Request";
            $notification_message['title'] = $Title;
            $notification_message['body'] = $Message;
            $notification_message['sound'] = "accept_rejectsound.wav";
            $notification_message['request_id'] = '';
            $notification_message['patient_id'] = '';
            $this->load->helper('notifications_helper');
            if(!empty($device_token) && !empty($device_token['registration_ids']))
            {
                push_notification_android($device_token['registration_ids'],$notification_message);
            }
            if(!empty($device_token_IOS) && !empty($device_token_IOS['registration_ids']))
            {
                push_notification_IOS($device_token['registration_ids'],$notification_message);
            }
            //push_notification_android($device_token['registration_ids'],$notification_message);
            //$this->sendResponse(arra(),$this->get_message_value_from_key($language_id,'notification_send_succes'));
            $this->sendSuccesResponse($this->get_message_value_from_key($language_id,'notification_send_succes'));
            exit;
        }
        else
        {
            $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
            exit;
        }
    }else{
            $this->sendSuccesResponse($this->get_message_value_from_key($language_id,'appoitment rejected successfully'));
            exit;
        }
    }


    public function get_accpted_doctor_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($request_id, $this->get_message_value_from_key($language_id, 'request_id_is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $data = $this->Api_model->get_accpted_home_doctor_list($request_id);
        
        if(count($data) > 0)
        {
            $this->sendResponse($data,"Doctor Details");
            exit;
        }
        else
        {
            $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
            exit;
        }
    }
    
    public function get_accpted_doctor_list_kunj()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($request_id, $this->get_message_value_from_key($language_id, 'request_id_is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        if(isset($request_id) && !empty($request_id)) {
            $data = $this->Api_model->get_accpted_doctor_list($request_id);
            

            $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N");

            if(count($data) > 0)
            {
                if(count($data_notification)>0) {
                    $data[0]['partener_id'] = $data_notification[0]['partener_id'];
                    $data[0]['name'] = $data_notification[0]['name'];
                    $data[0]['address'] = $data_notification[0]['address'];
                    $data[0]['pincode'] = $data_notification[0]['pincode'];
                    $data[0]['city'] = $data_notification[0]['city'];
                    $data[0]['state'] = $data_notification[0]['state'];
                    $data[0]['country'] = $data_notification[0]['country'];
                    $data[0]['latitude'] = $data_notification[0]['latitude'];
                    $data[0]['longitude'] = $data_notification[0]['longitude'];
                    $data[0]['home_visit_main_amt'] = $data_notification[0]['home_visit_main_amt'];
                    $data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                    $data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                    $data[0]['clinic_visit_main_amt'] = $data_notification[0]['clinic_visit_main_amt'];
                    $data[0]['ug_course'] = $data_notification[0]['ug_course'];
                    $data[0]['profile'] = $data_notification[0]['profile'];
                    $data[0]['country_name'] = $data_notification[0]['country_name'];
                    $data[0]['state_name'] = $data_notification[0]['state_name'];
                    $data[0]['city_name'] = $data_notification[0]['city_name'];
                    $data[0]['avg_rate'] = $data_notification[0]['avg_rate'];
                    $data[0]['temp_appointment_data'] = $data_notification[0]['temp_appointment_data'];
                    $data[0]['c_date'] = $data_notification[0]['c_date'];
                    $data[0]['c_hour'] = $data_notification[0]['c_hour'];
                    $data[0]['clinic_id'] = $data_notification[0]['clinic_id'];
                    $data[0]['clinic_name'] = $data_notification[0]['clinic_name'];
                }

                $this->sendResponse($data,"Doctor Details");
                exit;
            } else {
                $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
                exit;
            }
        }

    }   

    public function get_accpted_online_doctor_listssssss()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";

        $appointment_date = isset($_REQUEST['appointment_date']) ? $_REQUEST['appointment_date'] : "";
        $appointment_time = isset($_REQUEST['appointment_time']) ? $_REQUEST['appointment_time'] : "";
        $healthcare_id = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";

        $appointment_type = isset($_REQUEST['appointment_type']) ? $_REQUEST['appointment_type'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($request_id, $this->get_message_value_from_key($language_id, 'request_id_is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($appointment_type, $this->get_message_value_from_key($language_id, 'appointment_type_is_required'));
        $this->checkemptyvalue($healthcare_id, $this->get_message_value_from_key($language_id, 'healthcare_id_is_required'));

        $current_date_time = date('Y-m-d H:i:s');
        $current_str_date_time = strtotime($current_date_time);
        
        if(isset($appointment_time) && !empty($appointment_time)) {
            $appointment_ti = str_pad($appointment_time, 2, '0', STR_PAD_LEFT);
            $appointment_times = $appointment_ti.":00:00";
        }
        
        $appo_date_time = $appointment_date. " ".$appointment_times;
        
        $appo_str_date_time = strtotime($appo_date_time);
       
        if($appo_str_date_time >= $current_str_date_time) {

            if($appointment_type == 0 || $appointment_type == "0") {

                $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment_date_is_required'));
                $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment_time_is_required'));
                $request_id = 0;
            } else if($appointment_type == 2 || $appointment_type == "2") {
                // $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
            }

            $this->checkuser($userid, $category_type, $language_id);
            $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

            if(isset($request_id) && !empty($request_id) && $request_id != 0) {
        
                $data = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,$clinic_id,$healthcare_id,$appointment_type);
            
                $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="NP",NULL,NULL,NULL,$healthcare_id,$appointment_type);

                if(count($data) > 0) {
                    if(count($data_notification)>0) {
                        $new_data = array();
                        $new_data[0]['nid'] = $data_notification[0]['nid'];
                        $new_data[0]['partener_id'] = $data_notification[0]['partener_id'];
                        $new_data[0]['name'] = $data_notification[0]['name'];
                        $new_data[0]['address'] = $data_notification[0]['address'];
                        $new_data[0]['pincode'] = $data_notification[0]['pincode'];
                        $new_data[0]['city'] = $data_notification[0]['city'];
                        $new_data[0]['state'] = $data_notification[0]['state'];
                        $new_data[0]['country'] = $data_notification[0]['country'];
                        $new_data[0]['latitude'] = $data_notification[0]['latitude'];
                        $new_data[0]['longitude'] = $data_notification[0]['longitude'];
                        $new_data[0]['home_visit_main_amt'] = $data_notification[0]['home_visit_main_amt'];
                        $new_data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                        $new_data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                        $new_data[0]['clinic_visit_main_amt'] = $data_notification[0]['clinic_visit_main_amt'];
                        $new_data[0]['ug_course'] = $data_notification[0]['ug_course'];
                        $new_data[0]['profile'] = $data_notification[0]['profile'];
                        $new_data[0]['country_name'] = $data_notification[0]['country_name'];
                        $new_data[0]['state_name'] = $data_notification[0]['state_name'];
                        $new_data[0]['city_name'] = $data_notification[0]['city_name'];
                        $new_data[0]['avg_rate'] = $data_notification[0]['avg_rate'];
                        $new_data[0]['temp_appointment_data'] = $data_notification[0]['temp_appointment_data'];
                        $new_data[0]['c_date'] = $data_notification[0]['c_date'];
                        $new_data[0]['c_hour'] = $data_notification[0]['c_hour'];
                        $new_data[0]['clinic_id'] = $data_notification[0]['clinic_id'];
                        $new_data[0]['clinic_name'] = $data_notification[0]['clinic_name'];
                        $new_data[0]['clinic_address'] = $data_notification[0]['clinic_address'];
                        $new_data[0]['clinic_country'] = $data_notification[0]['clinic_country'];
                        $new_data[0]['clinic_state'] = $data_notification[0]['clinic_state'];
                        $new_data[0]['clinic_city'] = $data_notification[0]['clinic_city'];
                        $new_data[0]['clinic_pincode'] = $data_notification[0]['clinic_pincode'];
                    }

                    $this->sendResponse($new_data,"Doctor Details");
                    exit;
                } else {
                    $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
                    exit;
                }
            } else {
                $latest_data = array();
                $data = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);
                
                if($appointment_type == 0 || $appointment_type == '0') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);

                } if($appointment_type == 2 || $appointment_type == '2') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);
                    
                }

                if(count($data) > 0) {
                    foreach($data as $k=>$v) {
                        if($appointment_type == 0 || $appointment_type == '0') {
                            $data[$k]['nid'] = $data[$k]['nid'];
                            $data[$k]['partener_id'] = $data[$k]['partener_id'];
                            $data[$k]['name'] = $data[$k]['name'];
                            $data[$k]['address'] = $data[$k]['address'];
                            $data[$k]['pincode'] = $data[$k]['pincode'];
                            $data[$k]['city'] = $data[$k]['city'];
                            $data[$k]['state'] = $data[$k]['state'];
                            $data[$k]['country'] = $data[$k]['country'];
                            $data[$k]['latitude'] = $data[$k]['latitude'];
                            $data[$k]['longitude'] = $data[$k]['longitude'];
                            $data[$k]['home_visit_main_amt'] = $data[$k]['home_visit_main_amt'];
                            $data[$k]['online_visit_main_amt'] = $data[$k]['online_visit_main_amt'];
                            $data[$k]['clinic_visit_main_amt'] = $data[$k]['clinic_visit_main_amt'];
                            $data[$k]['ug_course'] = $data[$k]['ug_course'];
                            $data[$k]['profile'] = $data[$k]['profile'];
                            $data[$k]['country_name'] = $data[$k]['country_name'];
                            $data[$k]['state_name'] = $data[$k]['state_name'];
                            $data[$k]['city_name'] = $data[$k]['city_name'];
                            $data[$k]['avg_rate'] = $data[$k]['avg_rate'];
                            $data[$k]['temp_appointment_data'] = $data[$k]['temp_appointment_data'];
                            $data[$k]['c_date'] = $data[$k]['c_date'];
                            $data[$k]['c_hour'] = $data[$k]['c_hour'];
                            $data[$k]['clinic_id'] = $data[$k]['clinic_id'];
                            $data[$k]['clinic_name'] = $data[$k]['clinic_name'];
                            $data[$k]['clinic_address'] = $data[$k]['clinic_address'];
                            $data[$k]['clinic_phone_no'] = $data[$k]['clinic_phone_no'];
                            $data[$k]['clinic_latitude'] = $data[$k]['clinic_latitude'];
                            $data[$k]['clinic_country'] = $data[$k]['clinic_country'];
                            $data[$k]['clinic_state'] = $data[$k]['clinic_state'];
                            $data[$k]['clinic_city'] = $data[$k]['clinic_city'];
                            $data[$k]['clinic_pincode'] = $data[$k]['clinic_pincode'];

                        } else if($appointment_type == 2 || $appointment_type == '2') {

                            if(empty($v['clinic_id']) || empty($v['clinic_name']) || empty($v['clinic_phone_no']) ) {

                                $partner_id = $v['partener_id'];
                                $appoitment_date = $appointment_date;
                                $appoitment_date = $appointment_date;

                                $clinic_data = $this->Api_model->check_my_avaiblity_exit_or_not($partner_id,$appoitment_date,$appointment_time,$appointment_type);

                                if(isset($clinic_data) && !empty($clinic_data) && count($clinic_data)>0) {
                                   
                                    $clinic_detail = $clinic_data[0];
                                    $clinic_id = $clinic_detail->clinic_id;
                                    $clinic_details = $this->Api_model->get_address_by_id($clinic_id);
                                    
                                    if(isset($clinic_details) && !empty($clinic_details) && count($clinic_details)>0) {
                                        $clinic_id = $clinic_details[0]['id'];
                                        $clinic_name = $clinic_details[0]['clinic_name'];                                       
                                        $clinic_address = $clinic_details[0]['clinic_address'];
                                        $clinic_phone_no = $clinic_details[0]['clinic_phone_no'];
                                        $clinic_latitude = $clinic_details[0]['latitude'];                                       
                                        $clinic_longitude = $clinic_details[0]['longitude'];
                                        $clinic_country = $clinic_details[0]['country'];                                       
                                        $clinic_state = $clinic_details[0]['state'];                                       
                                        $clinic_city = $clinic_details[0]['city'];                                       
                                        $clinic_pincode = $clinic_details[0]['pincode'];                                       
                                    }
                                }   
                            }

                            $data[$k]['nid'] = $data[$k]['nid'];
                            $data[$k]['partener_id'] = $data_notification[$k]['partener_id'];
                            $data[$k]['name'] = $data[$k]['name'];
                            $data[$k]['address'] = $data[$k]['address'];
                            $data[$k]['pincode'] = $data[$k]['pincode'];
                            $data[$k]['city'] = $data[$k]['city'];
                            $data[$k]['state'] = $data[$k]['state'];
                            $data[$k]['country'] = $data[$k]['country'];
                            $data[$k]['latitude'] = $data[$k]['latitude'];
                            $data[$k]['longitude'] = $data[$k]['longitude'];
                            $data[$k]['home_visit_main_amt'] = $data[$k]['home_visit_main_amt'];
                            $data[$k]['online_visit_main_amt'] = $data[$k]['online_visit_main_amt'];
                            $data[$k]['clinic_visit_main_amt'] = $data[$k]['clinic_visit_main_amt'];
                            $data[$k]['ug_course'] = $data[$k]['ug_course'];
                            $data[$k]['profile'] = $data[$k]['profile'];
                            $data[$k]['country_name'] = $data[$k]['country_name'];
                            $data[$k]['state_name'] = $data[$k]['state_name'];
                            $data[$k]['city_name'] = $data[$k]['city_name'];
                            $data[$k]['avg_rate'] = $data[$k]['avg_rate'];
                            $data[$k]['temp_appointment_data'] = $data[$k]['temp_appointment_data'];
                            $data[$k]['c_date'] = $data[$k]['c_date'];
                            $data[$k]['c_hour'] = $data[$k]['c_hour'];

                            if(isset($data[$k]['clinic_id']) && !empty($data[$k]['clinic_id'])) {
                                $data[$k]['clinic_id'] = $data[$k]['clinic_id'];
                            } else {
                                $data[$k]['clinic_id'] = $clinic_id;
                            }

                            if(isset($data[$k]['clinic_name']) && !empty($data[$k]['clinic_name'])) {
                                $data[$k]['clinic_name'] = $data[$k]['clinic_name'];
                            } else {
                                $data[$k]['clinic_name'] = $clinic_name;
                            }

                            if(isset($data[$k]['clinic_address']) && !empty($data[$k]['clinic_address'])) {
                                $data[$k]['clinic_address'] = $data[$k]['clinic_address'];
                            } else {
                                $data[$k]['clinic_address'] = $clinic_address;
                            }

                            if(isset($data[$k]['clinic_phone_no']) && !empty($data[$k]['clinic_phone_no'])) {
                                $data[$k]['clinic_phone_no'] = $data[$k]['clinic_phone_no'];
                            } else {
                                $data[$k]['clinic_phone_no'] = $clinic_phone_no;
                            }

                            if(isset($data[$k]['clinic_latitude']) && !empty($data[$k]['clinic_latitude'])) {
                                $data[$k]['clinic_latitude'] = $data[$k]['clinic_latitude'];
                            } else {
                                $data[$k]['clinic_latitude'] = $clinic_latitude;
                            }

                            if(isset($data[$k]['clinic_longitude']) && !empty($data[$k]['clinic_longitude'])) {
                                $data[$k]['clinic_longitude'] = $data[$k]['clinic_longitude'];
                            } else {
                                $data[$k]['clinic_longitude'] = $clinic_longitude;
                            }

                            if(isset($data[$k]['clinic_country']) && !empty($data[$k]['clinic_country'])) {
                                $data[$k]['clinic_country'] = $data[$k]['clinic_country'];
                            } else {
                                $data[$k]['clinic_country'] = $clinic_country;
                            }

                            if(isset($data[$k]['clinic_state']) && !empty($data[$k]['clinic_state'])) {
                                $data[$k]['clinic_state'] = $data[$k]['clinic_state'];
                            } else {
                                $data[$k]['clinic_state'] = $clinic_state;
                            }

                            if(isset($data[$k]['clinic_city']) && !empty($data[$k]['clinic_city'])) {
                                $data[$k]['clinic_city'] = $data[$k]['clinic_city'];
                            } else {
                                $data[$k]['clinic_city'] = $clinic_city;
                            }

                            if(isset($data[$k]['clinic_pincode']) && !empty($data[$k]['clinic_pincode'])) {
                                $data[$k]['clinic_pincode'] = $data[$k]['clinic_pincode'];
                            } else {
                                $data[$k]['clinic_pincode'] = $clinic_pincode;
                            }

                        }
                    }
                }

                $tmp_data = array();
                if(count($data) > 0) {
                    foreach($data as $kk=>$vv) {
                        $partener_id = $vv['partener_id'];
                        $tmp_data[$partener_id] = $vv; 
                    }   
                }

             

                if(count($tmp_data) > 0) {
                    foreach($tmp_data as $k=>$v) {
                        if($appointment_type == 0 || $appointment_type == '0') {
                            if($v['online_visit_main_amt'] > 0) {
                                $latest_data[] = $v;
                            }
                        } else if($appointment_type == 2 || $appointment_type == '2') {
                            if($v['clinic_visit_main_amt'] > 0) {
                                $latest_data[] = $v;
                            }
                        }
                    }

                    $this->sendResponse($latest_data,"Doctor Details");
                    exit;
                } else {
                    $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
                    exit;
                }
            }
        } else {
            $return_data = array();
            return $this->sendNullResponse($return_data,'you can not book appointment for previous date time');
            exit;     
        }
    }

    public function get_accpted_online_doctor_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";

        $appointment_date = isset($_REQUEST['appointment_date']) ? $_REQUEST['appointment_date'] : "";
        $appointment_time = isset($_REQUEST['appointment_time']) ? $_REQUEST['appointment_time'] : "";
        $healthcare_id = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";

        $appointment_type = isset($_REQUEST['appointment_type']) ? $_REQUEST['appointment_type'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($request_id, $this->get_message_value_from_key($language_id, 'request_id_is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($appointment_type, $this->get_message_value_from_key($language_id, 'appointment_type_is_required'));
        $this->checkemptyvalue($healthcare_id, $this->get_message_value_from_key($language_id, 'healthcare_id_is_required'));

        $current_date_time = date('Y-m-d H:i:s');
        $current_str_date_time = strtotime($current_date_time);
        
        if(isset($appointment_time) && !empty($appointment_time)) {
            $appointment_ti = str_pad($appointment_time, 2, '0', STR_PAD_LEFT);
            $appointment_times = $appointment_ti.":00:00";
        }
        
        $appo_date_time = $appointment_date. " ".$appointment_times;
        
        $appo_str_date_time = strtotime($appo_date_time);
       
        if($appo_str_date_time >= $current_str_date_time) {

            if($appointment_type == 0 || $appointment_type == "0") {

                $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment_date_is_required'));
                $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment_time_is_required'));
                $request_id = 0;
            } else if($appointment_type == 2 || $appointment_type == "2") {
                // $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
            }

            $this->checkuser($userid, $category_type, $language_id);
            $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

            if(isset($request_id) && !empty($request_id) && $request_id != 0) {
        
                $data = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,$clinic_id,$healthcare_id,$appointment_type);

             

                // $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="NP",NULL,NULL,NULL,$healthcare_id,$appointment_type);
              
                if($appointment_type == 0 || $appointment_type == '0') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);

                } if($appointment_type == 2 || $appointment_type == '2') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);
                }

                if(count($data) > 0) {
                    if(count($data_notification)>0) {
                        $new_data = array();
                        $new_data[0]['nid'] = $data_notification[0]['nid'];
                        $new_data[0]['partener_id'] = $data_notification[0]['partener_id'];
                        $new_data[0]['name'] = $data_notification[0]['name'];
                        $new_data[0]['address'] = $data_notification[0]['address'];
                        $new_data[0]['pincode'] = $data_notification[0]['pincode'];
                        $new_data[0]['city'] = $data_notification[0]['city'];
                        $new_data[0]['state'] = $data_notification[0]['state'];
                        $new_data[0]['country'] = $data_notification[0]['country'];
                        $new_data[0]['latitude'] = $data_notification[0]['latitude'];
                        $new_data[0]['longitude'] = $data_notification[0]['longitude'];
                        $new_data[0]['home_visit_main_amt'] = $data_notification[0]['home_visit_main_amt'];
                        $new_data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                        $new_data[0]['online_visit_main_amt'] = $data_notification[0]['online_visit_main_amt'];
                        $new_data[0]['clinic_visit_main_amt'] = $data_notification[0]['clinic_visit_main_amt'];
                        $new_data[0]['ug_course'] = $data_notification[0]['ug_course'];
                        $new_data[0]['speciality_name'] = $data_notification[0]['speciality_name'];
                        $new_data[0]['profile'] = $data_notification[0]['profile'];
                        $new_data[0]['country_name'] = $data_notification[0]['country_name'];
                        $new_data[0]['state_name'] = $data_notification[0]['state_name'];
                        $new_data[0]['city_name'] = $data_notification[0]['city_name'];
                        $new_data[0]['avg_rate'] = $data_notification[0]['avg_rate'];
                        $new_data[0]['temp_appointment_data'] = $data_notification[0]['temp_appointment_data'];
                        $new_data[0]['c_date'] = $data_notification[0]['c_date'];
                        $new_data[0]['c_hour'] = $data_notification[0]['c_hour'];
                        $new_data[0]['clinic_id'] = $data_notification[0]['clinic_id'];
                        $new_data[0]['clinic_name'] = $data_notification[0]['clinic_name'];
                        $new_data[0]['clinic_address'] = $data_notification[0]['clinic_address'];
                        $new_data[0]['clinic_country'] = $data_notification[0]['clinic_country'];
                        $new_data[0]['clinic_state'] = $data_notification[0]['clinic_state'];
                        $new_data[0]['clinic_city'] = $data_notification[0]['clinic_city'];
                        $new_data[0]['clinic_pincode'] = $data_notification[0]['clinic_pincode'];
                    }


                    $this->sendResponse($new_data,"Doctor Details");
                    exit;
                } else {
                    $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
                    exit;
                }
            } else {
                $latest_data = array();
                $data = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);
                
                if($appointment_type == 0 || $appointment_type == '0') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);

                } if($appointment_type == 2 || $appointment_type == '2') {
                    $data_notification = $this->Api_model->get_accpted_doctor_list($request_id,$notification_type="N",$appointment_date,$appointment_time,NULL,$healthcare_id,$appointment_type);
                }

                if(count($data) > 0) {
                    foreach($data as $k=>$v) {
                        if($appointment_type == 0 || $appointment_type == '0') {
                            $data[$k]['nid'] = $data[$k]['nid'];
                            $data[$k]['partener_id'] = $data[$k]['partener_id'];
                            $data[$k]['name'] = $data[$k]['name'];
                            $data[$k]['address'] = $data[$k]['address'];
                            $data[$k]['pincode'] = $data[$k]['pincode'];
                            $data[$k]['city'] = $data[$k]['city'];
                            $data[$k]['state'] = $data[$k]['state'];
                            $data[$k]['country'] = $data[$k]['country'];
                            $data[$k]['latitude'] = $data[$k]['latitude'];
                            $data[$k]['longitude'] = $data[$k]['longitude'];
                            $data[$k]['home_visit_main_amt'] = $data[$k]['home_visit_main_amt'];
                            $data[$k]['online_visit_main_amt'] = $data[$k]['online_visit_main_amt'];
                            $data[$k]['clinic_visit_main_amt'] = $data[$k]['clinic_visit_main_amt'];
                            $data[$k]['ug_course'] = $data[$k]['ug_course'];
                            $data[$k]['speciality_name'] = $data[$k]['speciality_name'];
                            $data[$k]['profile'] = $data[$k]['profile'];
                            $data[$k]['country_name'] = $data[$k]['country_name'];
                            $data[$k]['state_name'] = $data[$k]['state_name'];
                            $data[$k]['city_name'] = $data[$k]['city_name'];
                            $data[$k]['avg_rate'] = $data[$k]['avg_rate'];
                            $data[$k]['temp_appointment_data'] = $data[$k]['temp_appointment_data'];
                            $data[$k]['c_date'] = $data[$k]['c_date'];
                            $data[$k]['c_hour'] = $data[$k]['c_hour'];
                            $data[$k]['clinic_id'] = $data[$k]['clinic_id'];
                            $data[$k]['clinic_name'] = $data[$k]['clinic_name'];
                            $data[$k]['clinic_address'] = $data[$k]['clinic_address'];
                            $data[$k]['clinic_phone_no'] = $data[$k]['clinic_phone_no'];
                            $data[$k]['clinic_latitude'] = $data[$k]['clinic_latitude'];
                            $data[$k]['clinic_country'] = $data[$k]['clinic_country'];
                            $data[$k]['clinic_state'] = $data[$k]['clinic_state'];
                            $data[$k]['clinic_city'] = $data[$k]['clinic_city'];
                            $data[$k]['clinic_pincode'] = $data[$k]['clinic_pincode'];

                        } else if($appointment_type == 2 || $appointment_type == '2') {

                            if(empty($v['clinic_id']) || empty($v['clinic_name']) || empty($v['clinic_phone_no']) ) {

                                $partner_id = $v['partener_id'];
                                $appoitment_date = $appointment_date;
                                $appoitment_date = $appointment_date;

                                $clinic_data = $this->Api_model->check_my_avaiblity_exit_or_not($partner_id,$appoitment_date,$appointment_time,$appointment_type);

                                if(isset($clinic_data) && !empty($clinic_data) && count($clinic_data)>0) {
                                   
                                    $clinic_detail = $clinic_data[0];
                                    $clinic_id = $clinic_detail->clinic_id;
                                    $clinic_details = $this->Api_model->get_address_by_id($clinic_id);
                                    
                                    if(isset($clinic_details) && !empty($clinic_details) && count($clinic_details)>0) {
                                        $clinic_id = $clinic_details[0]['id'];
                                        $clinic_name = $clinic_details[0]['clinic_name'];                                       
                                        $clinic_address = $clinic_details[0]['clinic_address'];
                                        $clinic_phone_no = $clinic_details[0]['clinic_phone_no'];
                                        $clinic_latitude = $clinic_details[0]['latitude'];                                       
                                        $clinic_longitude = $clinic_details[0]['longitude'];
                                        $clinic_country = $clinic_details[0]['country'];                                       
                                        $clinic_state = $clinic_details[0]['state'];                                       
                                        $clinic_city = $clinic_details[0]['city'];                                       
                                        $clinic_pincode = $clinic_details[0]['pincode'];                                       
                                    }
                                }   
                            }

                            $data[$k]['nid'] = $data[$k]['nid'];
                            $data[$k]['partener_id'] = $data_notification[$k]['partener_id'];
                            $data[$k]['name'] = $data[$k]['name'];
                            $data[$k]['address'] = $data[$k]['address'];
                            $data[$k]['pincode'] = $data[$k]['pincode'];
                            $data[$k]['city'] = $data[$k]['city'];
                            $data[$k]['state'] = $data[$k]['state'];
                            $data[$k]['country'] = $data[$k]['country'];
                            $data[$k]['latitude'] = $data[$k]['latitude'];
                            $data[$k]['longitude'] = $data[$k]['longitude'];
                            $data[$k]['home_visit_main_amt'] = $data[$k]['home_visit_main_amt'];
                            $data[$k]['online_visit_main_amt'] = $data[$k]['online_visit_main_amt'];
                            $data[$k]['clinic_visit_main_amt'] = $data[$k]['clinic_visit_main_amt'];
                            $data[$k]['ug_course'] = $data[$k]['ug_course'];
                            $data[$k]['speciality_name'] = $data[$k]['speciality_name'];
                            $data[$k]['profile'] = $data[$k]['profile'];
                            $data[$k]['country_name'] = $data[$k]['country_name'];
                            $data[$k]['state_name'] = $data[$k]['state_name'];
                            $data[$k]['city_name'] = $data[$k]['city_name'];
                            $data[$k]['avg_rate'] = $data[$k]['avg_rate'];
                            $data[$k]['temp_appointment_data'] = $data[$k]['temp_appointment_data'];
                            $data[$k]['c_date'] = $data[$k]['c_date'];
                            $data[$k]['c_hour'] = $data[$k]['c_hour'];

                            if(isset($data[$k]['clinic_id']) && !empty($data[$k]['clinic_id'])) {
                                $data[$k]['clinic_id'] = $data[$k]['clinic_id'];
                            } else {
                                $data[$k]['clinic_id'] = $clinic_id;
                            }

                            if(isset($data[$k]['clinic_name']) && !empty($data[$k]['clinic_name'])) {
                                $data[$k]['clinic_name'] = $data[$k]['clinic_name'];
                            } else {
                                $data[$k]['clinic_name'] = $clinic_name;
                            }

                            if(isset($data[$k]['clinic_address']) && !empty($data[$k]['clinic_address'])) {
                                $data[$k]['clinic_address'] = $data[$k]['clinic_address'];
                            } else {
                                $data[$k]['clinic_address'] = $clinic_address;
                            }

                            if(isset($data[$k]['clinic_phone_no']) && !empty($data[$k]['clinic_phone_no'])) {
                                $data[$k]['clinic_phone_no'] = $data[$k]['clinic_phone_no'];
                            } else {
                                $data[$k]['clinic_phone_no'] = $clinic_phone_no;
                            }

                            if(isset($data[$k]['clinic_latitude']) && !empty($data[$k]['clinic_latitude'])) {
                                $data[$k]['clinic_latitude'] = $data[$k]['clinic_latitude'];
                            } else {
                                $data[$k]['clinic_latitude'] = $clinic_latitude;
                            }

                            if(isset($data[$k]['clinic_longitude']) && !empty($data[$k]['clinic_longitude'])) {
                                $data[$k]['clinic_longitude'] = $data[$k]['clinic_longitude'];
                            } else {
                                $data[$k]['clinic_longitude'] = $clinic_longitude;
                            }

                            if(isset($data[$k]['clinic_country']) && !empty($data[$k]['clinic_country'])) {
                                $data[$k]['clinic_country'] = $data[$k]['clinic_country'];
                            } else {
                                $data[$k]['clinic_country'] = $clinic_country;
                            }

                            if(isset($data[$k]['clinic_state']) && !empty($data[$k]['clinic_state'])) {
                                $data[$k]['clinic_state'] = $data[$k]['clinic_state'];
                            } else {
                                $data[$k]['clinic_state'] = $clinic_state;
                            }

                            if(isset($data[$k]['clinic_city']) && !empty($data[$k]['clinic_city'])) {
                                $data[$k]['clinic_city'] = $data[$k]['clinic_city'];
                            } else {
                                $data[$k]['clinic_city'] = $clinic_city;
                            }

                            if(isset($data[$k]['clinic_pincode']) && !empty($data[$k]['clinic_pincode'])) {
                                $data[$k]['clinic_pincode'] = $data[$k]['clinic_pincode'];
                            } else {
                                $data[$k]['clinic_pincode'] = $clinic_pincode;
                            }

                        }
                    }
                }

                $tmp_data = array();
                if(count($data) > 0) {
                    foreach($data as $kk=>$vv) {
                        $partener_id = $vv['partener_id'];
                        $tmp_data[$partener_id] = $vv; 
                    }   
                }

                if(count($tmp_data) > 0) {
                    foreach($tmp_data as $k=>$v) {
                        if($appointment_type == 0 || $appointment_type == '0') {
                            if($v['online_visit_main_amt'] > 0) {
                                $latest_data[] = $v;
                            }
                        } else if($appointment_type == 2 || $appointment_type == '2') {
                            if($v['clinic_visit_main_amt'] > 0) {
                                $latest_data[] = $v;
                            }
                        }
                    }

                    $this->sendResponse($latest_data,"Doctor Details");
                    exit;
                } else {
                    $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'no_doctor_found'));
                    exit;
                }
            }
        } else {
            $return_data = array();
            return $this->sendNullResponse($return_data,'you can not book appointment for previous date time');
            exit;     
        }
    }
    
    
    public function doctor_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";

        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $partner_id = isset($_REQUEST['doctor_id']) ? $_REQUEST['doctor_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $consultation_type = isset($_REQUEST['consultation_type']) ? $_REQUEST['consultation_type'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, $this->get_message_value_from_key($language_id, 'doctor-id-is-required'));
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'patient-id-is-required'));
        $this->checkemptyvalue($consultation_type, $this->get_message_value_from_key($language_id, 'consultation-mode-is-required'));
        if ($consultation_type == 1 || $consultation_type == '1') {
            $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
            $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        }
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $total_exp_year = 0;
        $customerdata = $this->Api_model->get_details_by_doctor($consultation_type, $partner_id, $latitude, $longitude);

        if($customerdata['work_exp'] != '')
        {
           $work_exp = json_decode($customerdata['work_exp']);
            if(!empty($work_exp)){
                if ($work_exp[0]->Exp_Year != '' && $work_exp[0]->Companyname != '' && $work_exp[0]->Designation != '') {
                    for ($i = 0; $i < count($work_exp); $i++) {
                        if ($work_exp[$i]->Exp_Year != '' && $work_exp[$i]->Companyname != '' && $work_exp[$i]->Designation != '') {
                            $total_exp_year = $total_exp_year + $work_exp[$i]->Exp_Year;
                            }
                        }
                }
            }else{
                $total_exp_year = '';
            }
               
        }
        else
        {
            $total_exp_year = '';
        }
        
        if ($consultation_type == 1)
        {
            $time = $this->GetDrivingDistance($customerdata['latitude'], $latitude, $customerdata['longitude'], $longitude);
            $customerdata['time'] = $time['time'];
            $customerdata['distance_in_km'] = $time['distance'];
        } 

        $customerdata['total_exp_year'] = $total_exp_year;
        $this->db->select('tbl_rate.*,tbl_partners.name,tbl_partners.profile');
        $this->db->from('tbl_rate');
        $this->db->join('tbl_partners','tbl_rate.patient_id=tbl_partners.id','left');
        $this->db->where('partner_id',$partner_id);
        $doctorratting=$this->db->get()->result_array();
        $customerdata['total_patient_rating'] = count($doctorratting);
        $customerdata['rating'] = $doctorratting;
        //patient_count
        $this->db->select('COUNT(*) AS patient_count',false);
        $this->db->from('tbl_order');
        $this->db->where('partner_id',$partner_id);
        $this->db->where('appointment_status','2');
        $patient_count=$this->db->get()->result_array();
        $customerdata['total_patient_count']=$patient_count['patient_count'];
        unset($customerdata['work_exp']);

        $clinic_details = array();
        if(isset($clinic_id) && !empty($clinic_id)) {
            $clinic_details = $this->Api_model->get_address_by_id($clinic_id);
        }

        if(isset($clinic_details) && !empty($clinic_details)) {
            $clinic_detail = $clinic_details[0];
            if($consultation_type == 2) {
                $time = $this->GetDrivingDistance($clinic_detail['latitude'], $latitude, $clinic_detail['longitude'], $longitude);
                $customerdata['time'] = $time['time'];
                $customerdata['distance_in_km'] = $time['distance'];
            } 
            $customerdata['clinic_detail'] = $clinic_details;
        } else {
            $clinic_details = array();

            if ($consultation_type == 1)
            {
                $time = $this->GetDrivingDistance($customerdata['latitude'], $latitude, $customerdata['longitude'], $longitude);
                $customerdata['time'] = $time['time'];
                $customerdata['distance_in_km'] = $time['distance'];
            } else if ($consultation_type == 2){
                $time = $this->GetDrivingDistance($clinic_detail['latitude'], $latitude, $clinic_detail['longitude'], $longitude);
                $customerdata['time'] = $time['time'];
                $customerdata['distance_in_km'] = $time['distance'];
            }

            $customerdata['clinic_detail'] = $clinic_details;
        }

        return $this->sendResponse($customerdata, "Doctor Details");
    }


    public function update_fees()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        
        $home_visit_fees = isset($_REQUEST['home_visit_fees']) ? $_REQUEST['home_visit_fees'] : "";
        $home_visit_admin_fees = isset($_REQUEST['home_visit_admin_fees']) ? $_REQUEST['home_visit_admin_fees'] : "";
        
        $online_visit_fees = isset($_REQUEST['online_visit_fees']) ? $_REQUEST['online_visit_fees'] : "";
        $online_visit_admin_fees = isset($_REQUEST['online_visit_admin_fees']) ? $_REQUEST['online_visit_admin_fees'] : "";

        $clinic_visit_fees = isset($_REQUEST['clinic_visit_fees']) ? $_REQUEST['clinic_visit_fees'] : "";
        $clinic_visit_admin_fees = isset($_REQUEST['clinic_visit_admin_fees']) ? $_REQUEST['clinic_visit_admin_fees'] : "";
        
        $home_visit_tds_fees =isset($_REQUEST['home_visit_tds_fees']) ? $_REQUEST['home_visit_tds_fees'] : "";
        $online_visit_tds_fees=isset($_REQUEST['online_visit_tds_fees']) ? $_REQUEST['online_visit_tds_fees'] : "";
        $clinic_visit_tds_fees=isset($_REQUEST['clinic_visit_tds_fees']) ? $_REQUEST['clinic_visit_tds_fees'] : "";

        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
       
        $this->checkemptyvalue($home_visit_fees, $this->get_message_value_from_key($language_id, 'home-consultation-fees-is-required'));
        $this->checkemptyvalue($home_visit_admin_fees, $this->get_message_value_from_key($language_id, 'home-consultation-admin-fees-is-required'));

        $this->checkemptyvalue($online_visit_fees, $this->get_message_value_from_key($language_id, 'online-consultation-fees-is-required'));
        $this->checkemptyvalue($online_visit_admin_fees, $this->get_message_value_from_key($language_id, 'online-consultation-admin-fees-required'));

        $this->checkemptyvalue($clinic_visit_fees, $this->get_message_value_from_key($language_id, 'clinic-visit-fees-is-required'));
        $this->checkemptyvalue($clinic_visit_admin_fees, $this->get_message_value_from_key($language_id, 'clinic-visit-admin-fees-required'));


        $this->checkemptyvalue($home_visit_tds_fees, $this->get_message_value_from_key($language_id, 'home-consultation-tds-fees-required'));
        $this->checkemptyvalue($online_visit_tds_fees, $this->get_message_value_from_key($language_id, 'online-consultation-tds-fees-required'));
        $this->checkemptyvalue($clinic_visit_tds_fees, $this->get_message_value_from_key($language_id, 'clinic-visit-tds-fees-required'));

        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($id, $category_type, $language_id);
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);

        $total_homevist_amt = $home_visit_fees - $home_visit_admin_fees - $home_visit_tds_fees;

        $total_onlinevist_amt = $online_visit_fees - $online_visit_admin_fees -$online_visit_tds_fees;

        $total_clinicvist_amt = $clinic_visit_fees - $clinic_visit_admin_fees -$clinic_visit_tds_fees;

        $update = array(
            'home_visit_main_amt'   => number_format($home_visit_fees, 2, '.', ''),
            'online_visit_main_amt' => number_format($online_visit_fees, 2, '.', ''),
            'clinic_visit_main_amt' => number_format($clinic_visit_fees, 2, '.', ''),

            'home_visite_admin_amt' => number_format($home_visit_admin_fees, 2, '.', ''),
            'online_visite_admin_amt'=> number_format($online_visit_admin_fees, 2, '.', ''),
            'clinic_visit_admin_amt'=> number_format($clinic_visit_admin_fees, 2, '.', ''),

            'home_visit_tds_fees'   => number_format($home_visit_tds_fees, 2, '.', ''),
            'online_visit_tds_fees' => number_format($online_visit_tds_fees, 2, '.', ''),
            'clinic_visit_tds_fees' => number_format($clinic_visit_tds_fees, 2, '.', ''),

            'total_homevist_amt'    => number_format($total_homevist_amt, 2, '.', ''),
            'total_onlinevist_amt'  => number_format($total_onlinevist_amt, 2, '.', ''),
            'total_clinicvist_amt'  => number_format($total_clinicvist_amt, 2, '.', ''),

            'is_update_fees'        => 1,
            'updated_at'            => date('Y-m-d H:i:s'),
        );

        // dd($update);

        $this->Common_model->data_update('tbl_partners', $update, array('id' => $id, 'category' => $category_type));
       
        
        $customerdata = $this->Api_model->get_all_data_partners_visit($category_type, $id);
        return $this->sendResponse($customerdata, "Consultation details Update Successfully");
        exit;
    }
    public function get_fees()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->checkuser($id, $category_type, $language_id);
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);

        $user = $this->Api_model->checkuser($id, $category_type);
        if ($user == 0) {
            return $this->sendErrorResponseUserNotFound("User is Not exists");
            exit;
        }
        $customerdata = $this->Api_model->get_all_data_partners_visit($category_type, $id);

        return $this->sendResponse($customerdata, "Consultation details");
        exit;
    }

    public function update_visit_status()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

        $home_visit_status = isset($_REQUEST['home_visit_status']) ? $_REQUEST['home_visit_status'] : "";
        $online_visit_status = isset($_REQUEST['online_visit_status']) ? $_REQUEST['online_visit_status'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $clinic_visit_status = isset($_REQUEST['clinic_visit_status']) ? $_REQUEST['clinic_visit_status'] : "0";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($home_visit_status, "Home Visit Status is required");
        if ($category_type != 6) {
            $this->checkemptyvalue($online_visit_status, "Online Visit Status is required");
        }

        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($id, $category_type, $language_id);
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);

        $update = [
            'is_homevisit' => $home_visit_status,
            'is_online' => $online_visit_status,
            'is_clinic' => $clinic_visit_status,
        ];
        //print_r($update);die;
        $this->Common_model->data_update('tbl_partners', $update, array('id' => $id, 'category' => $category_type));
       
        $customerdata = $this->get_all_customers_data($category_type, $id, $currendeviceid);
       
        return $this->sendResponse($customerdata, "Consultation Status are Update Successfully");
        exit;

    }

    public function get_address()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $customerdata = $this->Api_model->get_all_address_by_partner($userid, $category_type);
        if(count($customerdata) > 0){
            return $this->sendResponse($customerdata, "All address List");
            exit;
        }else{
            return $this->sendSuccessErrorResponseWithData("No data found",1);
            exit;
        }
        
    }

    public function get_clinic_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";

        $healthcare_id = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";
        $healthcare_subid = isset($_REQUEST['healthcare_sub_id']) ? $_REQUEST['healthcare_sub_id'] : "";

        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        
        $this->checkemptyvalue($healthcare_id, $this->get_message_value_from_key($language_id, 'healthcare_id_is_required'));
        
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        if($healthcare_id != 4) {
            $healthcare_subid = NULL;
        }

        $customerdata = $this->Api_model->get_all_clinic_by_partner($healthcare_id,$healthcare_subid);
        if(count($customerdata) > 0){
            return $this->sendResponse($customerdata, "Clinic List Found");
            exit;
        }else{
            return $this->sendSuccessErrorResponseWithData("Clinic list not found",1);
            exit;
        }
    }

    public function add_address()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $clinic_name = isset($_REQUEST['clinic_name']) ? $_REQUEST['clinic_name'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : "";
        $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
        $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : "";
        $pincode = isset($_REQUEST['pincode']) ? $_REQUEST['pincode'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $clinic_phone_no = isset($_REQUEST['clinic_phone_no']) ? $_REQUEST['clinic_phone_no'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : "";
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($country, $this->get_message_value_from_key($language_id, 'country_is_required'));
        $this->checkemptyvalue($state, $this->get_message_value_from_key($language_id, 'state_is_required'));
        $this->checkemptyvalue($city, $this->get_message_value_from_key($language_id, 'city_is_required'));
        $this->checkemptyvalue($pincode, $this->get_message_value_from_key($language_id, 'pincode_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        
        //print_r($address);die;
        // $latlong = $this->getlatlng($address, $city, null, $country);
        // $latitude = $latlong['latitude'];
        // $longitude = $latlong['longitude'];
        // //print_r($latlong['longitude']);die;
        // if($latitude == "0.00"){
        //    return $this->sendSuccesResponse("Please Enter Valid Address"); 
        //    exit;
        // }
        // if($longitude == "0.00"){
        //     return $this->sendSuccesResponse("Please Enter Valid Address"); 
        //    exit;
        // }

        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data = [
            'partner_id' => $userid,
            'category' => $category_type,
            'clinic_name' => $clinic_name,
            'clinic_phone_no' => $clinic_phone_no,
            'address' => $address,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'pincode' => $pincode,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $last_address_id = $this->Common_model->data_insert('tbl_partners_address', $data);

        $clinic_details = $this->Api_model->get_address_by_id($last_address_id);

        return $this->sendResponse($clinic_details,"Address Add Successfully");
        exit;

    }
    public function update_address()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";

        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : "";
        $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
        $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : "";
        $pincode = isset($_REQUEST['pincode']) ? $_REQUEST['pincode'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : "";
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : "";
        $clinic_phone_no = isset($_REQUEST['clinic_phone_no']) ? $_REQUEST['clinic_phone_no'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($country, $this->get_message_value_from_key($language_id, 'country_is_required'));
        $this->checkemptyvalue($state, $this->get_message_value_from_key($language_id, 'state_is_required'));
        $this->checkemptyvalue($city, $this->get_message_value_from_key($language_id, 'city_is_required'));
        $this->checkemptyvalue($pincode, $this->get_message_value_from_key($language_id, 'pincode_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        // $latlong = $this->getlatlng($address, $city, null, $country);
        // $latitude = $latlong['latitude'];
        // $longitude = $latlong['longitude'];

        $data = [
            'address' => $address,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'pincode' => $pincode,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'clinic_phone_no' => $clinic_phone_no,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->Common_model->data_update('tbl_partners_address', $data, array('id' => $id, 'partner_id' => $userid, 'category' => $category_type));
        $customerdata = $this->Api_model->get_all_address_by_partner($userid, $category_type);
        return $this->sendResponse($customerdata, "Address Updated Successfully");
        exit;
    }
    public function delete_address()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid, $category_type, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $this->db->query("DELETE FROM `tbl_partners_address` WHERE `id` = '" . $id . "' AND `partner_id` = '" . $userid . "' AND `category` = '" . $category_type . "' ");
        return $this->sendSuccesResponse($this->get_message_value_from_key($language_id, 'address_removed_successfully'));
        exit;
    }
    public function adharcard_no_check($num)
    {
        if (strlen($num) > 12 || strlen($num) < 12) {
            $this->sendErrorResponseUserNotFound("Aadhar Number number must be 12 digit");
        }
    }
    public function pancard_no_check($num)
    {
        if (strlen($num) > 10 || strlen($num) < 10) {

            $this->sendErrorResponseUserNotFound("PAN Number lenght must be 10");
        }
        if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $num)) {
            $this->sendErrorResponseUserNotFound("PAN Number Not Valid");
        }
    }
    /* ----- Start Pharmcy Store API ----- */

    public function medical_list()
    {
        //log_message('debug','medical_list');
        //log_message('debug',print_r($_REQUEST,true));
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $medicines_id = isset($_REQUEST['medicines_id']) ? $_REQUEST['medicines_id'] : "";
        $medicines_qty = isset($_REQUEST['medicines_qty']) ? $_REQUEST['medicines_qty'] : "";
        $is_homesample = isset($_REQUEST['is_homedelivery']) ? $_REQUEST['is_homedelivery'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($medicines_id, "Medicine Id is required");
        $this->checkemptyvalue($medicines_qty, "Medicine Qty is required");
        $this->checkemptyvalue($is_homesample, "Home Delivery flag is required");
        $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
        $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($userid,8, $language_id);
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $Medicine = explode(",", $medicines_id);
        $MedicineQty = explode(",", $medicines_qty);

        $tabledata = $this->Api_model->check_table_empty(1);
        if($tabledata > 0)
        {
            $timing_wiseCount = $this->get_timing_wise_store(1);

            if($timing_wiseCount > 0){
                $timing_wiseString = implode(",",$timing_wiseCount);
               
                $countStore = $this->Api_model->get_pharmcy_store($Medicine,$MedicineQty,$latitude,$longitude,$is_homesample,$timing_wiseString);
                
                //$countStore = $this->Api_model->get_pharmcy_store($Medicine,$MedicineQty,$latitude,$longitude,$is_homesample,$timing_wiseCount);

                for($i = 0; $i < count($countStore); $i++) {
                $temp_saleprice = 0.00;
                $temp_taxable_amount = 0.00;
                $temp_discount_amount = 0.00;
                $temp_gst_amount = 0.00;
                $temp_final_amount = 0.00;
            
                for($j = 0; $j < count($Medicine); $j++) {
                    $amount_value= $this->db->get_where('tbl_store_wise_medicines', ["medicine_id" => $Medicine[$j], "partner_id" => $countStore[$i]['id']])->row_array(); 
                    $sale_price = (($MedicineQty[$j])*($amount_value['sale_price'])); 
                    $taxable_amount = (($MedicineQty[$j])*($amount_value['mrp'])); 
                    $discount_amount = (($MedicineQty[$j])*($amount_value['discount'])); 
                    $gst_amount = (($MedicineQty[$j])*($amount_value['gst'])); 
                    $final_amount = (($MedicineQty[$j])*($amount_value['total'])); 
                    
                    $temp_saleprice = $temp_saleprice+ $sale_price;
                    $temp_taxable_amount = $temp_taxable_amount+ $taxable_amount;
                    $temp_discount_amount = $temp_discount_amount+ $discount_amount;
                    $temp_gst_amount = $temp_gst_amount+ $gst_amount;
                    $temp_final_amount = $temp_final_amount+ $final_amount;
                }
                $countStore[$i]['total_saleprice']=$temp_saleprice ;
                $countStore[$i]['total_taxable_amount'] = $temp_taxable_amount;
                $countStore[$i]['total_discount_amount'] = $temp_discount_amount;
                $countStore[$i]['total_gst_amount'] = $temp_gst_amount;
                $countStore[$i]['total_final_amount'] = $temp_final_amount;
                //print_r($countStore[$i]['total_saleprice']);die; 
                
                }

                if(count($countStore) > 0) {
                    return $this->sendResponse($countStore, "All Medical List");
                } else {
                    return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
                }   
            }else{
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
            }
            
        }else {
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
            }
    }

    public function medicine_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $data = $this->Api_model->get_medicine_list($language_id);
        if (count($data) > 0) {
            return $this->sendResponse($data, "All Medicine List");

        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function medicine_order()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "";
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
        $who = isset($_REQUEST['who']) ? $_REQUEST['who'] : "";
        $country_code = isset($_REQUEST['country_code']) ? $_REQUEST['country_code'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $medicines_id = isset($_REQUEST['medicines_id']) ? $_REQUEST['medicines_id'] : "";
        $medicines_qty = isset($_REQUEST['medicines_qty']) ? $_REQUEST['medicines_qty'] : "";
        $order_type = isset($_REQUEST['order_type']) ? $_REQUEST['order_type'] : "";
        $main_amount = isset($_REQUEST['main_amount']) ? $_REQUEST['main_amount'] : "";
        $gst_amount = isset($_REQUEST['gst_amount']) ? $_REQUEST['gst_amount'] : "";
        $discount_amount = isset($_REQUEST['discount_amount']) ? $_REQUEST['discount_amount'] : "";
        $final_amount = isset($_REQUEST['final_amount']) ? $_REQUEST['final_amount'] : "";
        $medical_id = isset($_REQUEST['medical_id']) ? $_REQUEST['medical_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $delivery_type = isset($_REQUEST['delivery_type']) ? $_REQUEST['delivery_type'] : "";
        $delivery_charge = isset($_REQUEST['delivery_charge']) ? $_REQUEST['delivery_charge'] : "";
        $doctor_name = isset($_REQUEST['doctor_name']) ? $_REQUEST['doctor_name'] : "";
        $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : '';
        $customorder_id = rand(1111111111, 9999999999);
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : 0.00;
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : 0.00;

        $this->checkemptyvalue($language_id, "language Id is required");
        //$this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($medical_id, "Medical ID is required");
        $this->checkemptyvalue($medicines_id, "Medicines is required");
        $this->checkemptyvalue($medicines_qty, "Medicines Qty is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($who,'patient_realative flag is required');
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        $this->checkemptyvalue($age, $this->get_message_value_from_key($language_id, 'age-is-required'));
        $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
        
        $this->checkemptyvalue($country_code, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($main_amount, $this->get_message_value_from_key($language_id, 'amount-is-required'));
        $this->checkemptyvalue($gst_amount, $this->get_message_value_from_key($language_id, 'gst-amount-is-required'));
        $this->checkemptyvalue($discount_amount, $this->get_message_value_from_key($language_id, 'discount-amount-is-required'));
        $this->checkemptyvalue($final_amount, $this->get_message_value_from_key($language_id, 'total-amount-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($delivery_type, "Delivery Type is required");

        if ($delivery_type == 2) {
            $this->checkemptyvalue($delivery_charge, "Delivery Charge is required");
        }

        // $this->checkemptyvalue($payment_id, "Payment_id is required");
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        
        // $api_url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
        // $is_live =  $this->razorpaykeys['payment_mode'];
        // if($is_live == '1' || $is_live == 1)
        // {
        //     $username = $this->razorpaykeys['live_key'];
        //     $password = $this->razorpaykeys['live_secrate_key'];
        // }
        // else
        // {
        //     $username = $this->razorpaykeys['test_key'];
        //     $password = $this->razorpaykeys['test_secrate_key'];
        // }
        // $curl = curl_init();
        // curl_setopt_array($curl, array(

        //     CURLOPT_URL => $api_url,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        //     CURLOPT_USERPWD => $username . ':' . $password,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $response = json_decode($response);
        
        // if (strtoupper($response->status) == 'CAPTURED' || strtoupper($response->status) == 'AUTHORIZED') {

            $partner_data = [
                'partner_id'    => $medical_id,
                'category'      => 1,
            ];
            $patient_data = [
                'patient_id'    => $patient_id,
                'name'          => $name,
                'gender'        => $gender,
                'age'           => $age,
                'country_code'  => $country_code,
                'mobile_no'     => $mobile_no,
                'address'       => $address,
            ];
            $appsetting = $this->Api_model->get_appsetting();
            $categorywiseCharge = $appsetting['pharmcy_service_charge'];
            $categorywiseTDS = $appsetting['pharmcy_tds_amt'];
            $service_charges = $final_amount * ($categorywiseCharge/100);
            $tds = $service_charges * ($categorywiseTDS/100);
            $final_receiving_amt = $final_amount - $service_charges - $tds;

            $ordercurrentdattime = array();
            $orderStatus = array();
            
            $orderStatus['id'] = '1';
            $orderStatus['date'] = date('Y-m-d H:i:s');

            $ordercurrentdattime[0] = $orderStatus;
            $pharmacy = [
                'partner_id'                => $medical_id,
                'category'                  => 1,
                'patient_id'                => $patient_id,
                'patient_realative'         => $who,
                'name'                      => $name,
                'gender'                    => $gender,
                'age'                       => $age,
                'country_code'              => $country_code,
                'mobile_no'                 => $mobile_no,
                'address'                   => $address,
                'reference_doctor'          => $doctor_name,
                'main_amount'               => $main_amount,
                'gst_amount'                => $gst_amount,
                'discount_amount'           => $discount_amount,
                'final_amount'              => $final_amount,
                'delivery_type'             => "$delivery_type",
                'delivery_charge'           => $delivery_charge,
                'payment_id'                => $payment_id,
                'customorder_id'            => $customorder_id,
                'order_status'              => '1',
                'service_charges'           => $service_charges,
                'tds'                       => $tds,
                'final_receiving_amt'       => $final_receiving_amt,
                'change_status_datetime'    => json_encode($ordercurrentdattime),
                'partner_serialize_array'   => serialize($partner_data),
                'patient_serialize_array'   => serialize($patient_data),
                'created_at'                => date('Y-m-d H:i:s'),
            ];

            // echo "<pre>";
            // print_r($pharmacy);
            // exit;

            $lastinsertID = $this->Common_model->data_insert('tbl_order', $pharmacy);
            
            if (isset($_FILES['prescription']['size'][0]) && $_FILES['prescription']['size'][0] > 0 && !empty($_FILES['prescription']['name'][0])) {
                //print_r(1);die;
                $images = isset($_FILES['prescription']) ? $_FILES['prescription'] : '';
                //print_r($images);die;
                $total_images = count($images['name']);
                if ($total_images > 0) {
                    $uploadpath = $this->config->item('prescription_images_path');

                    for ($i = 0; $i < $total_images; $i++) {
                        $temp = explode(".", $_FILES["prescription"]["name"][$i]);
                        $newfilename = time() . '.' . end($temp);
                        $fileExt = pathinfo($newfilename, PATHINFO_EXTENSION);
                        $fileExt = strtolower($fileExt);
                        if ($fileExt == 'pdf') {
                            $idatad['name'] = $_FILES["prescription"]["name"][$i];
                            $idatad['type'] = $_FILES["prescription"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["prescription"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["prescription"]["error"][$i];
                            $idatad['size'] = $_FILES["prescription"]["size"][$i];
                            $config['upload_path'] = './uploads/prescription/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);

                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            //$temp = explode(".", $_FILES["address_proof"]["name"]);
                            //$newfilename = time() . '_' . rand(11111, 99999) . '.' . $temp[1];

                            move_uploaded_file($_FILES["prescription"]["tmp_name"][$i], $uploadpath . $newfilename);
                            $data = $newfilename;
                        } else {
                            $tmp_images_array = array();
                            // print_r($tmp_images_array['name'] = $images['name'][$i]);
                            $tmp_images_array['name'] = $images['name'][$i];
                            $tmp_images_array['type'] = $images['type'][$i];
                            $tmp_images_array['tmp_name'] = $images['tmp_name'][$i];
                            $tmp_images_array['error'] = $images['error'][$i];
                            $tmp_images_array['size'] = $images['size'][$i];
                            $data = newuploadusingcompress($tmp_images_array, $uploadpath);
                        }

                        // $data=$this->file_upload($tmp_images_array,$uploadpath);
                        if ($data != '' && !empty($data)) {
                            $userimagearray['filename'] = $data;
                            $userimagearray['patient_id'] = $patient_id;
                            $userimagearray['category'] = 1;
                            $userimagearray['order_no'] = $lastinsertID;
                            $userimagearray['created_at'] = date('Y-m-d h:i:s');
                            $this->load->model("common_model");
                            $this->common_model->data_insert("tbl_patient_prescriptions", $userimagearray);
                        }
                    }
                }
            }
            //exit;
            $Medicine = explode(",", $medicines_id);
            $MedicineQty = explode(",", $medicines_qty);
            if (count($Medicine) > 0) {
                for ($i = 0; $i < count($Medicine); $i++) {
                    $medicine_records = $this->Api_model->get_medicine_by_id($Medicine[$i], $medical_id);

                    $medicine_array = [
                        "medicine_id"   => $Medicine[$i],
                        "name"          => $medicine_records['name'],
                        "manufacture_name" => $medicine_records['company_name'],
                        "batch_no"      => $medicine_records['store_batch_no'],
                        "no_of_tablets" => $medicine_records['no_of_tablets'],
                        "generic_name"  => $medicine_records['generic_name'],
                        "form_of_package"=> $medicine_records['form_of_package'],
                        "expiray_date"  => $medicine_records['expiry_date'],
                        "medicine_qty"  => $MedicineQty[$i],
                        "mrp"           => $medicine_records['mrp'],
                        "sale_price"    => $medicine_records['sale_price'],
                        "discount"      => $medicine_records['discount'],
                        "discount_per"  => $medicine_records['discount_per'],
                        "gst"           => $medicine_records['gst'],
                        "total"         => $medicine_records['total'],
                        "gst_per"       => $medicine_records['gst_per'],
                        "pharmcy_id"    => $medical_id,
                        "order_no"      => $lastinsertID,
                    ];

                    $items = [
                        "medicine_id" => $Medicine[$i],
                        "medicine_qty"=> $MedicineQty[$i],
                        "pharmcy_id" => $medical_id,
                        "patient_id" => $patient_id,
                        "payment_id" => $payment_id,
                        "order_no"   => $lastinsertID,
                        "medicine_serialize" => serialize($medicine_array),
                    ];
                    $this->load->model('common_model');
                    $data = $this->Common_model->data_insert('tbl_pharmcy_order_items', $items);
                }

                for ($i = 0; $i < count($Medicine); $i++) {
                    $beforeStock = $this->db->get_where('tbl_store_wise_medicines', ["medicine_id" => $Medicine[$i], "partner_id" => $medical_id])->row_array();

                    $afterStock = $beforeStock['stock'] - $MedicineQty[$i];
                    $dataOrder = [
                        "stock" => $afterStock,
                    ];

                    $updatestockarray = array("medicine_id" => $Medicine[$i], "partner_id" => $medical_id);

                    $this->load->model('common_model');
                    $this->common_model->data_update("tbl_store_wise_medicines", $dataOrder, $updatestockarray);
                }
            }

            // $paymentdata = [
            //     'order_no'          => $lastinsertID,
            //     'payment_id'        => $payment_id,
            //     'amount'            => $response->amount,
            //     'payment_status'    => $response->status,
            //     'bank'              => $response->bank,
            //     'order_id'          => $response->order_id,
            //     'invoice_id'        => $response->invoice_id,
            //     'card_id'           => $response->card_id,
            //     'method'            => $response->method,
            //     'amount_refunded'   => $response->amount_refunded,
            //     'refund_status'     => $response->refund_status,
            //     'bank'              => $response->bank,
            //     'full_data'         => serialize($response),
            //     'created_at'        => date('Y-m-d H:i:s'),
            // ];
            // $this->Common_model->data_insert('tbl_payment_history', $paymentdata);
            $PartnerData = $this->Api_model->check_partners_details_by_id($medical_id);

            $notification_insert = [
                "notification_type"=> "OB",
                "partener_id"   => $medical_id,
                "category"      => 1,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "Accepted Order",
                "description"   => "Your Medicine Order with ".$customorder_id." has been accepted by".$PartnerData->name,
                "request_id"    => "",
            ];
            $this->notification_entery($notification_insert);
            $PartnerData = $this->Api_model->check_partners_details_by_id($medical_id);
            $location = "https://maps.google.com/?q=".$latitude.",".$longitude;

            if($delivery_type == 2) {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Invoice Created. Kindly track order location below link : '.$location);
            } else {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Invoice Created');
            }
            
            $this->load->helper('twilio_helper');
            $mbcheck = $this->mobilenumbercheck($PartnerData->country_code . $PartnerData->contact_no);
            if ($mbcheck == '1' || $mbcheck == true) {
                sleep(5);
                send_message($twillio);
            }
           
            $patient_notification_insert = [
                "notification_type"=> "OB",
                "partener_id"   => $patient_id,
                "category"      => 1,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "New Order For Medicines",
                "description"   => "Your Medicine Order with ".$customorder_id." has been confirmed",
                "request_id"    => "",
            ];
            $this->notification_entery($patient_notification_insert);
            $device_token_patient = $this->Api_model->get_user_profile_setting($patient_id);
            $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($patient_id);

            if($notification_insert)
            {
                $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
                $orderRecord=$this->Api_model->getusername($lastinsertID);
                $notification_patient_message = array();
                $notification_patient_message['type'] = "New Order";
                $notification_patient_message['title'] = "New Order For Medicines";
                $notification_patient_message['body'] = "Your Medicine Order with ".$customorder_id." hase been confirmed";
                $notification_patient_message['sound'] = "confirmordersound.wav";
                $notification_patient_message['order_id'] = $lastinsertID;
                $notification_patient_message['order_status'] = $orderRecord->order_status;
                $notification_patient_message['request_id'] = '';
                $notification_patient_message['patient_id'] = $patient_id;

                $this->load->helper('notifications_helper');
                if(!empty($device_token_patient) && $device_token_patient['registration_ids'])
                {
                    push_notification_android($device_token_patient['registration_ids'],$notification_patient_message);
                }
                if(!empty($device_token_IOS_patient) && $device_token_IOS_patient['registration_ids'])
                {
                    push_notification_IOS($device_token_IOS_patient['registration_ids'],$notification_patient_message);
                }

                // $notification_message = array();
                // $device_token_partner = $this->Api_model->get_user_profile_setting($medical_id);
                // $device_token_IOS_partner = $this->Api_model->get_user_profile_IOS($medical_id);

                // $notification_message['type'] = "New Order";
                // $notification_message['title'] = "New Order For Medicines";
                // $notification_message['body'] = "Your Medicine Order-".$customorder_id." Has Been Confirmed";
                // $notification_message['sound'] = "confirmordersound";
                // $notification_message['order_id'] = $lastinsertID;
                // $notification_message['order_status'] = $orderRecord->order_status;
                // $notification_message['request_id'] = '';
                // $notification_message['patient_id'] = $patient_id;

                // $this->load->helper('notifications_helper');
                // if(!empty($device_token_partner) && $device_token_partner['registration_ids'])
                // {
                //     push_notification_android($device_token_partner['registration_ids'],$notification_message);
                // }
                // if(!empty($device_token_IOS_partner) && $device_token_IOS_partner['registration_ids'])
                // {
                //     push_notification_IOS($device_token_IOS_partner['registration_ids'],$notification_message);
                // }
                $responsedata = [
                    'order_id' => $customorder_id,
                    'order_no' => $lastinsertID,
                ];
                if (!empty($lastinsertID)) {
                    return $this->sendResponse($responsedata, $this->get_message_value_from_key($language_id, 'pharmacy_order_created_successfully'));
                    exit;
                } else {
                    return $this->sendSuccessErrorResponse("Try again");
                    exit;
                }
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
        // } else {
        //     return $this->sendSuccessErrorResponse("Payment Failed");
        //     exit;
        // }
    }
    /* ----- End Pharmcy Store API ----- */

    /* ----- Start Pathology API ----- */
    public function test_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_test_list($language_id);
        if (count($data) > 0) {
            return $this->sendResponse($data, "All Test List");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function pathology_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $test_id = isset($_REQUEST['test_id']) ? $_REQUEST['test_id'] : "";
        $is_homesample = isset($_REQUEST['is_homesample']) ? $_REQUEST['is_homesample'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($test_id, "Test is required");
        $this->checkemptyvalue($is_homesample, "Homesample flag is required");
        $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
        $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);

        $Test = explode(",", $test_id);

        // if (count($Test) > 0) {
        //     for ($i = 0; $i < count($Test); $i++) {

        //         $data = [
        //             'is_trigger' => rand(1111, 9999),
        //         ];

        //         $this->db->where('test_id', $Test[$i]);
        //         $this->db->where("status", '1');
        //         if ($is_homesample == 1 || $is_homesample == '1') {
        //             $this->db->where("is_homesample", '1');
        //         }
        //         $this->db->update('tbl_test_pathology_wise', $data);
        //     }
        //     $countStore = $this->Api_model->get_count_lab_pathology(count($Test), $latitude, $longitude);
        //     //print_r($countStore[0]['partner_id']);die;
        //     $this->db->truncate('tbl_temp_test_store');

        // }
        $tabledata= $this->Api_model->check_table_empty(2);
       

        if($tabledata > 0)
        {
            $timing_wiseCount = $this->get_timing_wise_store(2);
            if($timing_wiseCount > 0){
                $timing_wiseString = implode(",",$timing_wiseCount);
                $countStore = $this->Api_model->get_pathology($Test,$latitude,$longitude,$is_homesample,$timing_wiseString);
                if (count($countStore) > 0) {
                    return $this->sendResponse($countStore, "All Pathology List");

                } else {
                    return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'),1);
                }    
            }else{
                 return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);   
            }
                
        }
        else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    
    }
    public function pathology_order()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        //$category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";

        $who = isset($_REQUEST['who']) ? $_REQUEST['who'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "";
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
        $country_code = isset($_REQUEST['country_code']) ? $_REQUEST['country_code'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $test_id = isset($_REQUEST['test_id']) ? $_REQUEST['test_id'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : 0.00;
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : 0.00;

        $order_type = isset($_REQUEST['order_type']) ? $_REQUEST['order_type'] : "";
        $main_amount = isset($_REQUEST['main_amount']) ? $_REQUEST['main_amount'] : "";
        $discount_amount = isset($_REQUEST['discount_amount']) ? $_REQUEST['discount_amount'] : "";
        $final_amount = isset($_REQUEST['final_amount']) ? $_REQUEST['final_amount'] : "";
        $gst_amount = isset($_REQUEST['gst_amount']) ? $_REQUEST['gst_amount'] : "";
        $pathology_id = isset($_REQUEST['pathology_id']) ? $_REQUEST['pathology_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $delivery_type = isset($_REQUEST['delivery_type']) ? $_REQUEST['delivery_type'] : "";
        $delivery_charge = isset($_REQUEST['delivery_charge']) ? $_REQUEST['delivery_charge'] : "";
        $doctor_name = isset($_REQUEST['doctor_name']) ? $_REQUEST['doctor_name'] : "";
        $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : '';
        $customorder_id = rand(1111111111, 9999999999);
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        //$this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));

        $this->checkemptyvalue($pathology_id, "Pathology ID is required");
        $this->checkemptyvalue($test_id, "Test ID is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($who,'patient_realative flag is required');
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        $this->checkemptyvalue($age, $this->get_message_value_from_key($language_id, 'age-is-required'));
        $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
        $this->checkemptyvalue($country_code, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($main_amount, $this->get_message_value_from_key($language_id, 'amount-is-required'));
        $this->checkemptyvalue($discount_amount, $this->get_message_value_from_key($language_id, 'discount-amount-is-required'));
        $this->checkemptyvalue($gst_amount, $this->get_message_value_from_key($language_id, 'gst-amount-is-required'));
        $this->checkemptyvalue($final_amount, $this->get_message_value_from_key($language_id, 'amount-is-required'));

        $this->checkemptyvalue($delivery_type, "Delivery Type is required");
        if ($delivery_type == 2) {
            $this->checkemptyvalue($delivery_charge, "Delivery Charge is required");
        }
        // $this->checkemptyvalue($payment_id, "Payment_id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

     

        // $api_url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
        // $is_live =  $this->razorpaykeys['payment_mode'];
        // if($is_live == '1' || $is_live == 1)
        // {
        //     $username = $this->razorpaykeys['live_key'];
        //     $password = $this->razorpaykeys['live_secrate_key'];
        // }
        // else
        // {
        //     $username = $this->razorpaykeys['test_key'];
        //     $password = $this->razorpaykeys['test_secrate_key'];
        // }
        // $curl = curl_init();
        // //print_r($api_url);die;

        // curl_setopt_array($curl, array(

        //     CURLOPT_URL => $api_url,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        //     CURLOPT_USERPWD => $username . ':' . $password,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $response = json_decode($response);

        // if (strtoupper($response->status) == 'CAPTURED' || strtoupper($response->status) == 'AUTHORIZED') {
            $partner_data = [
                'partner_id' => $pathology_id,
                'category' => 2,
            ];
            $patient_data = [
                'patient_id'    => $patient_id,
                'name'          => $name,
                'gender'        => $gender,
                'age'           => $age,
                'country_code'  => $country_code,
                'mobile_no'     => $mobile_no,
                'address'       => $address
            ];

            $appsetting = $this->Api_model->get_appsetting();
            $categorywiseCharge = $appsetting['pathology_service_charge'];
            $categorywiseTDS = $appsetting['pathology_tds_amt'];
            $service_charges = $final_amount * ($categorywiseCharge/100);
            $tds = $service_charges * ($categorywiseTDS/100);
            $final_receiving_amt = $final_amount - $service_charges - $tds;

            $ordercurrentdattime = array();
            $orderStatus = array();
            $orderStatus['id'] = '1';
            $orderStatus['date'] = date('Y-m-d H:i:s');
            $ordercurrentdattime[0] = $orderStatus;

            $pathology = [
                'partner_id'            => $pathology_id,
                'category'              => 2,
                'pathology_test_id'     => $test_id,
                'reference_doctor'      => $doctor_name,
                'patient_id'            => $patient_id,
                'patient_realative'     => $who,
                'name'                  => $name,
                'gender'                => $gender,
                'age'                   => $age,
                'country_code'          => $country_code,
                'mobile_no'             => $mobile_no,
                'address'               => $address,
                'main_amount'           => $main_amount,
                'discount_amount'       => $discount_amount,
                'gst_amount'            => $gst_amount,
                'final_amount'          => $final_amount,
                'delivery_type'         => $delivery_type,
                'delivery_charge'       => $delivery_charge,
                'payment_id'            => $payment_id,
                'service_charges'       => $service_charges,
                'tds'                   => $tds,
                'final_receiving_amt'   => $final_receiving_amt,
                'change_status_datetime' => json_encode($ordercurrentdattime),
                'partner_serialize_array' => serialize($partner_data),
                'patient_serialize_array' => serialize($patient_data),
                'customorder_id'          => $customorder_id,
                'order_status'            => '1',
                'created_at'              => date('Y-m-d H:i:s'),
            ];


            $lastinsertID = $this->Common_model->data_insert('tbl_order', $pathology);
            if (isset($_FILES['prescription']['size'][0]) && $_FILES['prescription']['size'][0] > 0 && !empty($_FILES['prescription']['name'][0])) {
                //print_r(1);die;
                $images = isset($_FILES['prescription']) ? $_FILES['prescription'] : '';
                //print_r($images);die;
                $total_images = count($images['name']);
                if ($total_images > 0) {

                    $uploadpath = $this->config->item('prescription_images_path');
                    for ($i = 0; $i < $total_images; $i++) {
                        $temp = explode(".", $_FILES["prescription"]["name"][$i]);
                        $newfilename = time() . '.' . end($temp);
                        $fileExt = pathinfo($newfilename, PATHINFO_EXTENSION);
                        $fileExt = strtolower($fileExt);

                        if ($fileExt == 'pdf') {
                            $idatad['name'] = $_FILES["prescription"]["name"][$i];
                            $idatad['type'] = $_FILES["prescription"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["prescription"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["prescription"]["error"][$i];
                            $idatad['size'] = $_FILES["prescription"]["size"][$i];
                            $config['upload_path'] = './uploads/prescription/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);

                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            //$temp = explode(".", $_FILES["address_proof"]["name"]);
                            //$newfilename = time() . '_' . rand(11111, 99999) . '.' . $temp[1];

                            move_uploaded_file($_FILES["prescription"]["tmp_name"][$i], $uploadpath . $newfilename);
                            $data = $newfilename;
                        } else {
                            $tmp_images_array = array();
                            // print_r($tmp_images_array['name'] = $images['name'][$i]);
                            $tmp_images_array['name'] = $images['name'][$i];
                            $tmp_images_array['type'] = $images['type'][$i];
                            $tmp_images_array['tmp_name'] = $images['tmp_name'][$i];
                            $tmp_images_array['error'] = $images['error'][$i];
                            $tmp_images_array['size'] = $images['size'][$i];
                            $data = newuploadusingcompress($tmp_images_array, $uploadpath);
                        }
                        if ($data != '' && !empty($data)) {
                            $userimagearray['filename'] = $data;
                            $userimagearray['patient_id'] = $patient_id;
                            $userimagearray['category'] = 2;
                            $userimagearray['order_no'] = $lastinsertID;
                            $userimagearray['created_at'] = date('Y-m-d h:i:s');
                            $this->load->model("common_model");
                            $this->common_model->data_insert("tbl_patient_prescriptions", $userimagearray);
                        }
                    }
                }
            }
            $Test = explode(",", $test_id);

            if (count($Test) > 0) {
                for ($i = 0; $i < count($Test); $i++) {
                    $test_records = $this->Api_model->get_pathologytest_by_id($Test[$i], $pathology_id);
                    $test_array = [
                        "test_id" => $Test[$i],
                        "name" => $test_records['name'],
                        "pathology_id" => $pathology_id,
                        "patient_id" => $patient_id,
                        "order_no" => $lastinsertID,
                    ];

                    $items = [
                        "test_id" => $Test[$i],
                        "order_no" => $lastinsertID,
                        "pathology_id" => $pathology_id,
                        "patient_id" => $patient_id,
                        "payment_id" => $payment_id,
                        "test_serialize" => serialize($test_array),

                    ];

                    $this->load->model('common_model');
                    $data = $this->Common_model->data_insert('tbl_pathology_order_items', $items);
                }
            }

            // $paymentdata = [
            //     'payment_id' => $payment_id,
            //     'order_no' => $lastinsertID,
            //     'amount' => $response->amount,
            //     'payment_status' => $response->status,
            //     'bank' => $response->bank,
            //     'order_id' => $response->order_id,
            //     'invoice_id' => $response->invoice_id,
            //     'card_id' => $response->card_id,
            //     'method' => $response->method,
            //     'amount_refunded' => $response->amount_refunded,
            //     'refund_status' => $response->refund_status,
            //     'bank' => $response->bank,
            //     'full_data' => serialize($response),
            //     'created_at' => date('Y-m-d H:i:s'),
            // ];
            // $this->Common_model->data_insert('tbl_payment_history', $paymentdata);
            $responsedata = [
                'order_id' => $customorder_id,
                'order_no' => $lastinsertID,

            ];
            $notification_insert = [
                "notification_type" => "OB",
                "partener_id"   => $pathology_id,
                "category"      => 2,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "New Request",
                // "description"   => "Add From Patient " . $name . " AND Request id is ".$response->order_id." ",
                "description"   => "Add From Patient " . $name . " AND Request id is ",
                "request_id"         => "",
            ];

            $this->notification_entery($notification_insert);
            $PartnerData = $this->Api_model->check_partners_details_by_id($pathology_id);
            // $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created');
            $location = "https://maps.google.com/?q=".$latitude.",".$longitude;
            // $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created. Kindly track order location below link : '.$location);
            
            if($delivery_type == 2) {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created. Kindly track order location below link : '.$location);
            } else {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created');
            }

            $this->load->helper('twilio_helper');
            $mbcheck = $this->mobilenumbercheck($PartnerData->country_code . $PartnerData->contact_no);
            if ($mbcheck == '1' || $mbcheck == true) {
                sleep(5);
                send_message($twillio);
            }

            $patient_notification_insert = [
                "notification_type" => "OB",
                "partener_id"   => $patient_id,
                "category"      => 2,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "New Lab Test Booking",
                "description"   => "Your Booking For Lab Test-".$customorder_id." Has Been Confirmed",
                "request_id"    => "",
            ];
            $this->notification_entery($patient_notification_insert);
            

            $device_token_patient = $this->Api_model->get_user_profile_setting($patient_id);
            $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($patient_id);

            if($notification_insert)
            {
                $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
                $orderRecord=$this->Api_model->getusername($lastinsertID);
                $notification_patient_message = array();
                $notification_patient_message['type'] = "New Order";
                $notification_patient_message['title'] = "New Lab Test Booking";
                $notification_patient_message['body'] = "Your Booking For Lab Test-".$customorder_id." Has Been Confirmed";
                $notification_patient_message['sound'] = "confirmordersound.wav";
                $notification_patient_message['order_id'] = $lastinsertID;
                $notification_patient_message['order_status'] = $orderRecord->order_status;
                $notification_patient_message['request_id'] = '';
                $notification_patient_message['patient_id'] = $patient_id;

                $this->load->helper('notifications_helper');
                if(!empty($device_token_patient) && $device_token_patient['registration_ids'])
                {
                    push_notification_android($device_token_patient['registration_ids'],$notification_patient_message);
                }
                if(!empty($device_token_IOS_patient) && $device_token_IOS_patient['registration_ids'])
                {
                    push_notification_IOS($device_token_IOS_patient['registration_ids'],$notification_patient_message);
                }

                // $notification_message = array();
                // $notification_message['type'] = "New Order";
                // $notification_message['title'] = "New Lab Test Booking";
                // $notification_message['body'] = "Your Booking For Lab Test-".$customorder_id." Has Been Confirmed";
                // $notification_message['sound'] = "confirmordersound";
                // $notification_message['order_id'] = $lastinsertID;
                // $notification_message['order_status'] = $orderRecord->order_status;
                // $notification_message['request_id'] = '';
                // $notification_message['patient_id'] = $patient_id;

                // $device_token_partner = $this->Api_model->get_user_profile_setting($pathology_id);
                // $device_token_IOS_partner = $this->Api_model->get_user_profile_IOS($pathology_id);
                // if(!empty($device_token_partner) && $device_token_partner['registration_ids'])
                // {
                //     push_notification_android($device_token_partner['registration_ids'],$notification_message);
                // }
                // if(!empty($device_token_IOS_partner) && $device_token_IOS_partner['registration_ids'])
                // {
                //     push_notification_IOS($device_token_IOS_partner['registration_ids'],$notification_message);
                // }

                if (!empty($lastinsertID)) {
                    return $this->sendResponse($responsedata, "Pathology Order is Successfully");
                    exit;
                } else {
                    return $this->sendSuccessErrorResponse("Try again");
                    exit;
                }
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
            
        // } else {
        //     return $this->sendSuccessErrorResponse("Payment Failed");
        //     exit;
        // }
    }
    public function my_test_history()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $data = $this->Api_model->get_history_by_patient($patient_id, 2);
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

        if (count($data) > 0) {
            return $this->sendResponse($data, "Test history");
        } else {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }

    }
    public function provisional_test_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_provisional_test_list($language_id);
        if (count($data) > 0) {
            return $this->sendResponse($data, "All Test List");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function diagnostics_test_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_diagnostics_test_list($language_id);
        if (count($data) > 0) {
            return $this->sendResponse($data, "All Test List");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }    
    }
    public function get_total_amount()
    {
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : '';
        $test_id = isset($_REQUEST['test_id']) ? $_REQUEST['test_id'] : '';
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : '';
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($test_id, "test id is required");
        $this->checkemptyvalue($partner_id, "partner id is required");
        $Test = explode(",", $test_id);
        if ($category_type == 2) {

            if (count($Test) > 0) {
                $total_gst = 0;
                $total = 0;
                for ($i = 0; $i < count($Test); $i++) {
                    $data = $this->db->get_where('tbl_test_pathology_wise', ['partner_id' => $partner_id, 'test_id' => $Test[$i]])->row_array();
                    $total_gst = $data['gst'] + $total_gst;
                    $total = $data['total'] + $total;
                }
            }
            $responseData['total_gst'] = $total_gst;
            $responseData['total_final_amount'] = $total;
        } else if ($category_type == 2) {
            if (count($Test) > 0) {
                $total_gst = 0;
                $total = 0;
                for ($i = 0; $i < count($Test); $i++) {
                    $data = $this->db->get_where('tbl_report_radiology_wise', ['partner_id' => $partner_id, 'test_id' => $Test[$i]])->row_array();
                    $total_gst = $data['gst'] + $total_gst;
                    $total = $data['total'] + $total;
                }
            }
            $responseData['total_gst'] = $total_gst;
            $responseData['total_final_amount'] = $total;
        } else {
            return $this->sendErrorResponse("valid Category Id");
        }

        if (count($responseData) > 0) {
            return $this->sendResponse($responseData, "Total amount");
        } else {

            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    /* ----- End Pathology API ----- */
    /* ----- Start Radiology API ----- */
    public function radiology_test_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_radiology_test_list($language_id);

        if (count($data) > 0) {
            return $this->sendResponse($data, "All Test List");

        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function radiology_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $test_id = isset($_REQUEST['test_id']) ? $_REQUEST['test_id'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));

        $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($test_id, "Test is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $Test = explode(",", $test_id);

        // if (count($Test) > 0) {
        //     for ($i = 0; $i < count($Test); $i++) {
        //         $data = [
        //             'is_trigger' => rand(1111, 9999),
        //         ];

        //         $this->db->where('test_id', $Test[$i]);
        //         $this->db->where("status", '1');
        //         $this->db->update('tbl_report_radiology_wise', $data);
        //     }
        //     $countStore = $this->Api_model->get_count_lab_radiology(count($Test), $latitude, $longitude);

        //     $this->db->truncate('tbl_temp_radiology_store');
        // }
        $tabledata= $this->Api_model->check_table_empty(3);

        if($tabledata > 0)
        {
            $timing_wiseCount = $this->get_timing_wise_store(3);
       
       
            if($timing_wiseCount > 0){
                $timing_wiseString = implode(",",$timing_wiseCount);
                $countStore = $this->Api_model->get_radiology($Test,$latitude,$longitude,$timing_wiseString);

                if (count($countStore) > 0) {
                    return $this->sendResponse($countStore, "All Radiology List");

                } else {
                    return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
                }  
            }else{
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
            }
        }
        else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    
        
    }
    public function radiology_order()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        //$category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $who = isset($_REQUEST['who']) ? $_REQUEST['who'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "";
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
        $country_code = isset($_REQUEST['country_code']) ? $_REQUEST['country_code'] : "";
        $mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $test_id = isset($_REQUEST['test_id']) ? $_REQUEST['test_id'] : "";

        $latitude = isset($_REQUEST['c_latitude']) ? $_REQUEST['c_latitude'] : 0.00;
        $longitude = isset($_REQUEST['c_longitude']) ? $_REQUEST['c_longitude'] : 0.00;

        $order_type = isset($_REQUEST['order_type']) ? $_REQUEST['order_type'] : "";
        $main_amount = isset($_REQUEST['main_amount']) ? $_REQUEST['main_amount'] : "";
        $discount_amount = isset($_REQUEST['discount_amount']) ? $_REQUEST['discount_amount'] : "";
        $final_amount = isset($_REQUEST['final_amount']) ? $_REQUEST['final_amount'] : "";
        $gst_amount = isset($_REQUEST['gst_amount']) ? $_REQUEST['gst_amount'] : "";

        $radiology_id = isset($_REQUEST['radiology_id']) ? $_REQUEST['radiology_id'] : "";
        $doctor_name = isset($_REQUEST['doctor_name']) ? $_REQUEST['doctor_name'] : "";
        $customorder_id = rand(1111111111, 9999999999);

        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $delivery_type = isset($_REQUEST['delivery_type']) ? $_REQUEST['delivery_type'] : "1";
        $delivery_charge = isset($_REQUEST['delivery_charge']) ? $_REQUEST['delivery_charge'] : "0.00";

        $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : '';
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        //$this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($radiology_id, "Radiology ID is required");
        $this->checkemptyvalue($test_id, "Test ID is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($who,'patient_realative flag is required');
        $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
        $this->checkemptyvalue($age, $this->get_message_value_from_key($language_id, 'age-is-required'));
        $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
        $this->checkemptyvalue($country_code, $this->get_message_value_from_key($language_id, 'country_code_is_required'));
        $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id, 'mobile_no_is_required'));
        $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
        $this->checkemptyvalue($main_amount, $this->get_message_value_from_key($language_id, 'amount-is-required'));
        $this->checkemptyvalue($discount_amount, $this->get_message_value_from_key($language_id, 'discount-amount-is-required'));
        $this->checkemptyvalue($final_amount, $this->get_message_value_from_key($language_id, 'total-amount-is-required'));
        // $this->checkemptyvalue($delivery_type, "Delivery Type is required");
        // if($delivery_type == 2)
        // {
        //     $this->checkemptyvalue($delivery_charge, "Delivery Charge is required");
        // }
        // $this->checkemptyvalue($payment_id, "Payment_id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

        // $api_url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
        // $is_live =  $this->razorpaykeys['payment_mode'];
        // if($is_live == '1' || $is_live == 1)
        // {
        //     $username = $this->razorpaykeys['live_key'];
        //     $password = $this->razorpaykeys['live_secrate_key'];
        // }
        // else
        // {
        //     $username = $this->razorpaykeys['test_key'];
        //     $password = $this->razorpaykeys['test_secrate_key'];
        // }
        // $curl = curl_init();
        
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => $api_url,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        //     CURLOPT_USERPWD => $username . ':' . $password,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $response = json_decode($response);
        // if (strtoupper($response->status) == 'CAPTURED' || strtoupper($response->status) == 'AUTHORIZED') {

            $partner_data = [
                'partner_id' => $radiology_id,
                'category' => '3',
            ];
            $patient_data = [
                'patient_id' => $patient_id,
                'name' => $name,
                'gender' => $gender,
                'age' => $age,
                'country_code' => $country_code,
                'mobile_no' => $mobile_no,
                'address' => $address,
            ];
            $appsetting = $this->Api_model->get_appsetting();
            $categorywiseCharge = $appsetting['radiology_service_charge'];
            $categorywiseTDS = $appsetting['radiology_tds_amt'];
            
            $service_charges = $final_amount * ($categorywiseCharge/100);
            $tds = $service_charges * ($categorywiseTDS/100);
            $final_receiving_amt = $final_amount - $service_charges - $tds;
            $ordercurrentdattime = array();
            $orderStatus = array();
            
            $orderStatus['id'] = '1';
            $orderStatus['date'] = date('Y-m-d H:i:s');
            $ordercurrentdattime[0] = $orderStatus;

            $radiology = [
                'partner_id' => $radiology_id,
                'category' => '3',
                'radiology_test_id' => $test_id,
                'patient_id' => $patient_id,
                'patient_realative' => $who,
                'name' => $name,
                'gender' => $gender,
                'age' => $age,
                'country_code' => $country_code,
                'mobile_no' => $mobile_no,
                'address' => $address,
                'main_amount' => $main_amount,
                'discount_amount' => $discount_amount,
                'customorder_id' => $customorder_id,
                'final_amount' => $final_amount,
                'delivery_type' => $delivery_type,
                'delivery_charge' => $delivery_charge,
                'reference_doctor' => $doctor_name,
                'gst_amount' => $gst_amount,
                'service_charges' => $service_charges,
                'tds' => $tds,
                'final_receiving_amt' => $final_receiving_amt,
                'change_status_datetime'    => json_encode($ordercurrentdattime),
                'partner_serialize_array' => serialize($partner_data),
                'patient_serialize_array' => serialize($patient_data),
                'payment_id' => $payment_id,
                'order_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $lastinsertID = $this->Common_model->data_insert('tbl_order', $radiology);
            if (isset($_FILES['prescription']['size'][0]) && $_FILES['prescription']['size'][0] > 0 && !empty($_FILES['prescription']['name'][0])) {
                $images = isset($_FILES['prescription']) ? $_FILES['prescription'] : '';
                $total_images = count($images['name']);
                if ($total_images > 0) {
                    $uploadpath = $this->config->item('prescription_images_path');
                    for ($i = 0; $i < $total_images; $i++) {
                        $temp = explode(".", $_FILES["prescription"]["name"][$i]);
                        $newfilename = time() . '.' . end($temp);
                        $fileExt = pathinfo($newfilename, PATHINFO_EXTENSION);
                        $fileExt = strtolower($fileExt);

                        if ($fileExt == 'pdf') {
                            $idatad['name'] = $_FILES["prescription"]["name"][$i];
                            $idatad['type'] = $_FILES["prescription"]["type"][$i];
                            $idatad['tmp_name'] = $_FILES["prescription"]["tmp_name"][$i];
                            $idatad['error'] = $_FILES["prescription"]["error"][$i];
                            $idatad['size'] = $_FILES["prescription"]["size"][$i];
                            $config['upload_path'] = './uploads/prescription/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);

                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            //$temp = explode(".", $_FILES["address_proof"]["name"]);
                            //$newfilename = time() . '_' . rand(11111, 99999) . '.' . $temp[1];

                            move_uploaded_file($_FILES["prescription"]["tmp_name"][$i], $uploadpath . $newfilename);
                            $data = $newfilename;
                        } else {
                            $tmp_images_array = array();
                            // print_r($tmp_images_array['name'] = $images['name'][$i]);
                            $tmp_images_array['name'] = $images['name'][$i];
                            $tmp_images_array['type'] = $images['type'][$i];
                            $tmp_images_array['tmp_name'] = $images['tmp_name'][$i];
                            $tmp_images_array['error'] = $images['error'][$i];
                            $tmp_images_array['size'] = $images['size'][$i];
                            $data = newuploadusingcompress($tmp_images_array, $uploadpath);
                        }
                        if ($data != '' && !empty($data)) {
                            $userimagearray['filename'] = $data;
                            $userimagearray['patient_id'] = $patient_id;
                            $userimagearray['category'] = 1;
                            $userimagearray['order_no'] = $lastinsertID;
                            $userimagearray['created_at'] = date('Y-m-d h:i:s');
                            $this->load->model("common_model");
                            $this->common_model->data_insert("tbl_patient_prescriptions", $userimagearray);
                        }
                    }
                }
            }
            $Test = explode(",", $test_id);
           // print_r($Test);die;
             //print_r(count($Test));die;
            if (count($Test) > 0) {
                for ($i = 0; $i < count($Test); $i++) {
                    
                    $test_records = $this->Api_model->get_radiotest_by_id($Test[$i], $radiology_id);
                   
                    if(!empty($test_records)){
                        $test_array = [
                        "test_id"       => $Test[$i],
                        "name"          => $test_records['name'],
                        "category"      => $test_records['category'],
                        "radiology_id"  => $radiology_id,
                        "patient_id"    => $patient_id,
                        "order_no"      => $lastinsertID,
                        ];
                        $items = [
                            "test_id"       => $Test[$i],
                            "radiology_id"  => $radiology_id,
                            "patient_id"    => $patient_id,
                            "payment_id"    => $payment_id,
                            "order_no"      => $lastinsertID,
                            "test_serialize"=> serialize($test_array),

                        ];
                        $this->load->model('common_model');
                        $data = $this->Common_model->data_insert('tbl_radiology_order_items', $items);   
                    }else{

                    }
                }
            }
            // $paymentdata = [
            //     'order_no' => $lastinsertID,
            //     'payment_id' => $payment_id,
            //     'amount' => $response->amount,
            //     'payment_status' => $response->status,
            //     'bank' => $response->bank,
            //     'order_id' => $response->order_id,
            //     'invoice_id' => $response->invoice_id,
            //     'card_id' => $response->card_id,
            //     'method' => $response->method,
            //     'amount_refunded' => $response->amount_refunded,
            //     'refund_status' => $response->refund_status,
            //     'bank' => $response->bank,
            //     'full_data' => serialize($response),
            //     'created_at' => date('Y-m-d H:i:s'),
            // ];
            // $this->Common_model->data_insert('tbl_payment_history', $paymentdata);
            $responsedata = [
                'order_id' => $customorder_id,
                'order_no' => $lastinsertID,

            ];
            $notification_insert = [
                "notification_type"=> "OB",
                "partener_id"   => $radiology_id,
                "category"      => 3,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "Lab Test Booking Created",
                "description"   => "You’re Booking Now been Created. View Order Details",
                "request_id"         => "",
            ];
            $this->notification_entery($notification_insert);
            $PartnerData = $this->Api_model->check_partners_details_by_id($radiology_id);
            // $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created');
            $location = "https://maps.google.com/?q=".$latitude.",".$longitude;
            // $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created. Kindly track order location below link : '.$location);
            
            if($delivery_type == 2) {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created. Kindly track order location below link : '.$location);
            } else {
                $twillio = array('mobile_number' => $PartnerData->country_code . $PartnerData->contact_no, 'body' => 'New Order Created');
            }

            $this->load->helper('twilio_helper');
            $mbcheck = $this->mobilenumbercheck($PartnerData->country_code . $PartnerData->contact_no);
            if ($mbcheck == '1' || $mbcheck == true) {
                sleep(5);
                send_message($twillio);
            }
            
            $patient_notification_insert = [
                "notification_type"=> "OB",
                "partener_id"   => $patient_id,
                "category"      => 3,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "New Radiodiagnostics Booking",
                "description"   => "Your Booking For Radiodiagnostic-".$customorder_id."  Has Been Confirmed",
                "request_id"         => "",
            ];
            $this->notification_entery($patient_notification_insert);
            $device_token_patient = $this->Api_model->get_user_profile_setting($patient_id);
            $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($patient_id);

            //$device_token_partner = $this->Api_model->get_user_profile_setting($radiology_id);
            //$device_token_IOS_partner = $this->Api_model->get_user_profile_IOS($radiology_id);

            if($notification_insert)
            {
                $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
                $orderRecord=$this->Api_model->getusername($lastinsertID);
                $notification_message = array();
                $notification_message['type'] = "New Order";
                $notification_message['title'] = "New Radiodiagnostics Booking";
                $notification_message['body'] = "Your Booking For Radiodiagnostic-".$customorder_id."  Has Been Confirmed";
                $notification_message['sound'] = "confirmordersound.wav";
                $notification_message['order_id'] = $lastinsertID;
                $notification_message['order_status'] = $orderRecord->order_status;
                $notification_message['request_id'] = '';
                $notification_message['patient_id'] = $patient_id;

                $this->load->helper('notifications_helper');
                if(!empty($device_token_patient) && $device_token_patient['registration_ids'])
                {
                    push_notification_android($device_token_patient['registration_ids'],$notification_message);
                }
                if(!empty($device_token_IOS_patient) && $device_token_IOS_patient['registration_ids'])
                {
                    push_notification_IOS($device_token_IOS_patient['registration_ids'],$notification_message);
                }

                // $notification_partner_message = array();
                // $notification_partner_message['type'] = "New Order";
                // $notification_partner_message['title'] = "New Radiodiagnostics Booking";
                // $notification_partner_message['body'] = "Your Booking For Radiodiagnostic-".$customorder_id."  Has Been Confirmed";
                // $notification_partner_message['sound'] = "confirmordersound";
                // $notification_partner_message['order_id'] = $lastinsertID;
                // $notification_partner_message['order_status'] = $orderRecord->order_status;
                // $notification_partner_message['request_id'] = '';
                // $notification_partner_message['patient_id'] = $patient_id;
                // if(!empty($device_token_partner) && $device_token_partner['registration_ids'])
                // {
                //     push_notification_android($device_token_partner['registration_ids'],$notification_message);
                // }
                // if(!empty($device_token_IOS_partner) && $device_token_IOS_partner['registration_ids'])
                // {
                //     push_notification_IOS($device_token_IOS_partner['registration_ids'],$notification_message);
                // }
                if (!empty($lastinsertID)) {
                    return $this->sendResponse($responsedata, "Radiology Order is Successfully");
                    exit;
                } else {
                    return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'try_again'));
                    exit;
                }
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
            
        // } else {
        //     return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'payment_failed'));
        //     exit;
        // }
    }
    public function my_report_history()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

        $data = $this->Api_model->get_history_by_patient($patient_id, 3);
        if (count($data) > 0) {
            return $this->sendResponse($data, "Report history");

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    /* ----- End Radiology API ----- */
    /* ----- Start Common Order API ----- */
    public function my_order_history()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $order_status = isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($order_status, 'Order Status is required');
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_history_by_patient($patient_id, $category_type, $order_status);
        if (count($data) > 0) {
            if ($category_type == 1) {
                $message = "Orderd Medicines history";
            } else if ($category_type == 2) {
                $message = "Appointments Report history";
            } else if ($category_type == 3) {
                $message = "Requested test history";
            }
            return $this->sendResponse($data, $message);

        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    }
    public function order_history_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($order_no, $this->get_message_value_from_key($language_id, 'order-no-is-required'));
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->get_history_by_order_no($order_no, $category_type);
        if ($data != '') {
            if ($category_type == 1) {
                $varname = "medicine";
                $serialize = "medicine_serialize";
            } else if ($category_type == 2) {
                $varname = "test";
                $serialize = "test_serialize";
            } else if ($category_type == 3) {
                $varname = "test";
                $serialize = "test_serialize";
            }
            $data[$varname] = array();
            $temp = $this->Api_model->get_history_details_by_order_no($order_no, $category_type);

            for ($i = 0; $i < count($temp); $i++) {
                $medicinelist = unserialize($temp[$i][$serialize]);
                unset($medicinelist['mrp']);
                unset($medicinelist['sale_price']);
                unset($medicinelist['discount']);
                unset($medicinelist['discount_per']);
                unset($medicinelist['gst']);
                unset($medicinelist['total']);
                unset($medicinelist['gst_per']);
                unset($medicinelist['pharmcy_id']);
                unset($medicinelist['order_no']);
                array_push($data[$varname], $medicinelist);
            }
            $data['prescriptions'] = $this->db->get_where('tbl_patient_prescriptions', ['order_no' => $order_no])->result_array();
            $tempreports = $this->db->get_where('tbl_order', ['id' => $order_no])->row_array();
            if(isset($tempreports) && !empty($tempreports))
            {
                 $rep=json_decode($tempreports['attached_reports']);
                 if(isset($rep) && !empty($rep))
                 {
                    $data['reports_pdf']=$rep;
                 }
                 else
                 {
                    $data['reports_pdf']=array();
                 }

            }
            else
            {
                $data['reports_pdf']=array();
            }
            

            if (count($data) > 0) {
                $this->db->select('*');
                $this->db->from('tbl_rate');
                $this->db->where('order_review_id',$order_no);
                $checkratting=$this->db->get()->num_rows();
                $data['is_given_review']=0;
                if($checkratting > 0)
                {
                    $data['is_given_review']=1;
                }
                return $this->sendResponse($data, "All Details");
            } else {
                return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
            }
        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function get_order_status()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($order_no, "Order no is required");
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $count = $this->Api_model->get_order_status($patient_id, $order_no);
        //print_r($count);die;
        $count['change_status_datetime'] = json_decode($count['change_status_datetime'],true);
        if(count($count) > 0) {
            return $this->sendResponse($count, "Order Status");

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }

    public function cancel_order()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";
        $reason = isset($_REQUEST['reason']) ? $_REQUEST['reason'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'user-id-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($order_no, "Order no is required");
        $this->checkemptyvalue($reason, "Reason is required");
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

        $current_status = $this->db->get_where('tbl_order', ["id" => $order_no,'patient_id' => $patient_id])->row_array()['order_status'];
        if($current_status == 1){
            $update = [
                'order_status' => '5',
            ];
            $this->Common_model->data_update('tbl_order', $update, array('id' => $order_no, 'patient_id' => $patient_id));
            $appoitmentRecord=$this->Api_model->getusername($order_no);
            $senderRecord = $this->Api_model->check_partners_details_by_id($appoitmentRecord->partner_id);
            if($appoitmentRecord->category == 1){
                $title = "Medicine Order Cancelled";
                $message = "Medicine Order-".$appoitmentRecord->appointment_id." Will Be Cancelled By  ".$senderRecord->name." For ".$reason.".";
            }else if($appoitmentRecord->category == 2){
                $title = "Lab Test Booking Cancelled";
                $message = "Lab Test Booking-".$appoitmentRecord->appointment_id." Will Be Cancelled ".$senderRecord->name." For ".$reason.".";
            }else if($appoitmentRecord->category == 3){
                $title = "Radiodiagnostics Booking Cancelled";
                $message = "Radiodiagnostic Booking-".$appoitmentRecord->appointment_id." Will Be Cancelled ".$senderRecord->name." For ".$reason.".";
            }
            $notification_insert = [
                    "notification_type" => "U",
                    "partener_id"       => $appoitmentRecord->partner_id,
                    "category"          => $appoitmentRecord->category,
                    "patient_id"        => $patient_id,
                    "order_id"          => $appoitmentRecord->appointment_id,
                    "order_no"          => $order_no,
                    "reason"            => $reason,
                    "title"             => $title,
                    "description"       => $message,
                    "request_id"        => "",
                ];
                $this->notification_entery($notification_insert);
                return $this->sendSuccesResponse($this->get_message_value_from_key($language_id, 'order_cancel_successfully'));
                exit;
        }else{
            return $this->sendSuccesResponse($this->get_message_value_from_key($language_id, 'You can not cancel this order'));
            exit;   
        }
    }
    public function history_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $appointment_status = isset($_REQUEST['appointment_status']) ? $_REQUEST['appointment_status'] : "";
        $is_followup = isset($_REQUEST['is_followup']) ? $_REQUEST['is_followup'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($appointment_status, $this->get_message_value_from_key($language_id, 'appointment_status_is_required'));
        $this->checkemptyvalue($is_followup, $this->get_message_value_from_key($language_id, 'is_followup_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $countAppoitments = $this->Api_model->get_history_list_by_category($category_type, $patient_id,$appointment_status,$is_followup);
        
        //$countAppoitments = $this->Api_model->get_consultation($category_type, $partner_id, $consultation_type, $appointment_status,$is_followup);
        if ($category_type == 4) {
            $message = "Doctor History List";
        } else if ($category_type == 5) {
            $message = "Veterinary Doctor History List";
        } else if ($category_type == 6) {
            $message = "Nurse History List";
        } else if ($category_type == 7) {
            $message = "Physiotherapist History List";
        }
        if (count($countAppoitments) > 0) {
            
            foreach($countAppoitments as $k=>$vv) {
                if(isset($vv['appoitment_date']) && !empty($vv['appoitment_date']) && isset($vv['appoitment_time']) && !empty($vv['appoitment_time'])) {
                    $new_date = $vv['appoitment_date']." ".$vv['appoitment_time'];
                    $countAppoitments[$k]['created_at'] = $new_date;
                }
            }

            return $this->sendResponse($countAppoitments, $message);

        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    }
    public function history_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $appointment_id = isset($_REQUEST['appointment_id']) ? $_REQUEST['appointment_id'] : "";
        $consulation_type = isset($_REQUEST['consulation_type']) ? $_REQUEST['consulation_type'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($id,$this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $countAppoitments = $this->Api_model->get_history_details_by_id($id, $patient_id,$consulation_type);
        
        // echo $this->db->last_query();
        
        // dd($countAppoitments);

        if(isset($countAppoitments['appoitment_date']) && !empty($countAppoitments['appoitment_date']) && isset($countAppoitments['appoitment_time']) && !empty($countAppoitments['appoitment_time'])) {
            $new_date = $countAppoitments['appoitment_date']." ".$countAppoitments['appoitment_time'];
            $countAppoitments['created_at'] = $new_date;
        }


        $countAppoitments['prescription'] = $this->Api_model->get_prescription_by_id($id);
        $countAppoitments['certificate'] = $this->Api_model->get_certificate_by_id($id);
        $this->db->select('*');
        $this->db->from('tbl_rate');
        $this->db->where('order_review_id',$appointment_id);
        $checkratting=$this->db->get()->num_rows();
        $countAppoitments['is_given_review']=0;
        if($checkratting > 0)
        {
            $countAppoitments['is_given_review']=1;
        }
        if ($countAppoitments['category'] == 4) {
            $message = "Doctor History Details";
        } else if ($countAppoitments['category'] == 5) {
            $message = "Veterinary Doctor History Details";
        } else if ($countAppoitments['category'] == 6) {
            $message = "Nurse History Details";
        } else if ($countAppoitments['category'] == 7) {
            $message = "Physiotherapist History Details";
        }

        if (count($countAppoitments) > 0) {
    
            if(isset($countAppoitments['clinic_id']) && !empty($countAppoitments['clinic_id']) && $countAppoitments['clinic_id'] != "") {
                $clinic_id = $countAppoitments['clinic_id'];
                $clinic_details = $this->Api_model->get_address_by_id($clinic_id);

                if(isset($clinic_details) && !empty($clinic_details) && count($clinic_details)>0) {
                    $countAppoitments['clinic_name'] = $clinic_details[0]['clinic_name'];
                    $countAppoitments['clinic_address'] = $clinic_details[0]['address'];
                    $countAppoitments['clinic_phone_no'] = $clinic_details[0]['clinic_phone_no'];
                    $countAppoitments['clinic_latitude'] = $clinic_details[0]['latitude'];
                    $countAppoitments['clinic_longitude'] = $clinic_details[0]['longitude'];

                    $countAppoitments['clinic_country']  = $clinic_details[0]['country'];                                       
                    $countAppoitments['clinic_state']  = $clinic_details[0]['state'];                                       
                    $countAppoitments['clinic_city']  = $clinic_details[0]['city'];                                       
                    $countAppoitments['clinic_pincode']  = $clinic_details[0]['pincode'];  

                }

            } else {

                if(isset($countAppoitments['partner_id']) && isset($countAppoitments['appoitment_date']) && isset($countAppoitments['appoitment_time']) ){
                    $partner_id = $countAppoitments['partner_id'];
                    $appoitment_date = $countAppoitments['appoitment_date'];
                    $appoitment_time = $countAppoitments['appoitment_time'];
                    $appoitment_time = explode(":",$appoitment_time);
                    $appoitment = (int)$appoitment_time[0];
                    $consulation_type = $countAppoitments['consulation_type'];
                    
                    $clinic_data = $this->Api_model->check_my_avaiblity_exit_or_not($partner_id,$appoitment_date,$appoitment,$consulation_type);

                    if(isset($clinic_data) && !empty($clinic_data) && count($clinic_data)>0) {
                       
                        $clinic_detail = $clinic_data[0];
                        $clinic_id = $clinic_detail->clinic_id;
                        $clinic_details = $this->Api_model->get_address_by_id($clinic_id);
                        
                        if(isset($clinic_details) && !empty($clinic_details) && count($clinic_details)>0) {
                            $countAppoitments['clinic_name'] = $clinic_details[0]['clinic_name'];
                            $countAppoitments['clinic_address'] = $clinic_details[0]['address'];
                            $countAppoitments['clinic_phone_no'] = $clinic_details[0]['clinic_phone_no'];
                            $countAppoitments['clinic_latitude'] = $clinic_details[0]['latitude'];
                            $countAppoitments['clinic_longitude'] = $clinic_details[0]['longitude'];
                            $countAppoitments['clinic_country']  = $clinic_details[0]['country']; 
                            $countAppoitments['clinic_state']  = $clinic_details[0]['state'];
                            $countAppoitments['clinic_city']  = $clinic_details[0]['city'];
                            $countAppoitments['clinic_pincode']  = $clinic_details[0]['pincode'];  
                        }
                    }
                }
            }

            return $this->sendResponse($countAppoitments, $message);

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function add_rate()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $rate = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : "";
        $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $order_review_id = isset($_REQUEST['order_review_id']) ? $_REQUEST['order_review_id'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        $this->checkemptyvalue($rate, $this->get_message_value_from_key($language_id, 'rate_is_required'));
        $this->checkemptyvalue($description, $this->get_message_value_from_key($language_id, 'description_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($order_review_id, $this->get_message_value_from_key($language_id, 'order_review_id_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $ddata = [
            'partner_id' => $partner_id,
            'patient_id' => $patient_id,
            'rate' => $rate,
            'order_review_id' => $order_review_id,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->Common_model->data_insert('tbl_rate', $ddata);
        $totalrate = $this->Api_model->get_avg_rate_id($patient_id, $partner_id);
        $countpartners = $this->db->get_where('tbl_rate', ["partner_id" => $partner_id])->result_array();
        $avg_rate = $totalrate['total_rate'] / count($countpartners);
        $adata['avg_rate'] = $avg_rate;
        $this->Common_model->data_update('tbl_partners', $adata, array('id' => $partner_id));
        return $this->sendSuccesResponse("Rate Add Successfully");
        exit;
    }
    public function rate_list()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";

        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($partner_id, "Partner Id is required");

        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $countRates = $this->Api_model->get_rate_list_by_id($patient_id, $partner_id);
        if (count($countRates) > 0) {
            return $this->sendResponse($countRates, "Rating List");

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function payment_history()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";

        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");

        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));

        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $countData = $this->Api_model->get_payment_history_by_patient($patient_id);
        if (count($countData) > 0) {
            return $this->sendResponse($countData, "Payment History List");

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function document_verify()
    {
        $document_type = isset($_REQUEST['document_type']) ? $_REQUEST['document_type'] : "";
        $document_no = isset($_REQUEST['document_no']) ? $_REQUEST['document_no'] : "";
        $this->checkemptyvalue($document_type, "document_type is required");
        $this->checkemptyvalue($document_no, "document_no is required");
        $api_url = '';

        $data = [
            "id_number" => $this->input->post('number'),
        ];
        $postdata = json_encode($data);
        if ($document_type == 1) {
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/pan/pan';
        } else if ($document_type == 0) {
            $api_url = 'https://kyc-api.aadhaarkyc.io/api/v1/aadhaar-validation/aadhaar-validation';
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postdata,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MjAzMTIwMzgsIm5iZiI6MTYyMDMxMjAzOCwianRpIjoiNjg0NTU2NzYtNjA5NS00N2M4LWJjZGYtOGE5ZTc0ZWFiMzg2IiwiZXhwIjoxOTM1NjcyMDM4LCJpZGVudGl0eSI6ImRldi5zYW1qYWluQGFhZGhhYXJhcGkuaW8iLCJmcmVzaCI6ZmFsc2UsInR5cGUiOiJhY2Nlc3MiLCJ1c2VyX2NsYWltcyI6eyJzY29wZXMiOlsicmVhZCJdfX0.uai_cGobdpqlheF0D0jJEZAp7orW_f7Bx45V0hxLVMI',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        print_r($response);die;

    }
    /* ----- End Common Order API ----- */
    /* ----- Start Doctor/Nurse/Veterinary Doctor/Physiotherapist  API ----- */
    public function book_appoitment()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['healthcare_id']) ? $_REQUEST['healthcare_id'] : "";
        $healthcare_sub_id = isset($_REQUEST['healthcare_sub_id']) ? $_REQUEST['healthcare_sub_id'] : "";
        $who = isset($_REQUEST['who']) ? $_REQUEST['who'] : "";
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
        $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "";
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
        $height = isset($_REQUEST['height']) ? $_REQUEST['height'] : "";
        $weight = isset($_REQUEST['weight']) ? $_REQUEST['weight'] : "";
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
        $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : "";
        $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : "";
        $symptoms = isset($_REQUEST['symptoms']) ? $_REQUEST['symptoms'] : "";
        $consulation_type = isset($_REQUEST['consulation_type']) ? $_REQUEST['consulation_type'] : "";
        $treatment_hours = isset($_REQUEST['treatment_hours']) ? $_REQUEST['treatment_hours'] : "";
        //$treatment_start_date = isset($_REQUEST['treatment_start_date']) ? $_REQUEST['treatment_start_date'] : "";
        //$treatment_end_date = isset($_REQUEST['treatment_end_date']) ? $_REQUEST['treatment_end_date'] : "";
        $treatment_days = isset($_REQUEST['treatment_days']) ? $_REQUEST['treatment_days'] : "";
        $treatment_per_hours = isset($_REQUEST['treatment_per_hours']) ? $_REQUEST['treatment_per_hours'] : "";

        $request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";
        $animal_name = isset($_REQUEST['animal_name']) ? $_REQUEST['animal_name'] : "";
        $animal_category = isset($_REQUEST['animal_category']) ? $_REQUEST['animal_category'] : "";
        $animal_caretaker = isset($_REQUEST['animal_caretaker']) ? $_REQUEST['animal_caretaker'] : "";
        $fees = isset($_REQUEST['fees']) ? $_REQUEST['fees'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $customorder_id = rand(1111111111, 9999999999);
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : '';
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $appointment_date = isset($_REQUEST['appointment_date']) ? $_REQUEST['appointment_date'] : "";
        $appointment_time = isset($_REQUEST['appointment_time']) ? $_REQUEST['appointment_time'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : "";

        $patient_details = $this->Api_model->getuserdetails($patient_id);
    
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        if ($category_type == 4) {
            $this->checkemptyvalue($healthcare_sub_id, "healthcare_sub_id is required");
        }
        $this->checkemptyvalue($partner_id, "partner ID is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        if($category_type != 5){
            $this->checkemptyvalue($name, $this->get_message_value_from_key($language_id, 'name_is_required'));
            $this->checkemptyvalue($age, $this->get_message_value_from_key($language_id, 'age-is-required'));
            $this->checkemptyvalue($gender, $this->get_message_value_from_key($language_id, 'gender-is-required'));
            //$this->checkemptyvalue($height, $this->get_message_value_from_key($language_id, 'height-is-required'));
            //$this->checkemptyvalue($weight, $this->get_message_value_from_key($language_id, 'weight-is-required'));
            // $this->checkemptyvalue($country_code, $this->get_message_value_from_key($language_id,'country_code_is_required'));
            // $this->checkemptyvalue($mobile_no, $this->get_message_value_from_key($language_id,'mobile_no_is_required'));  
        }elseif($category_type == 5){
             $this->checkemptyvalue($animal_name, $this->get_message_value_from_key($language_id, 'animal_name-is-required'));
            $this->checkemptyvalue($animal_category, $this->get_message_value_from_key($language_id, 'animal_category-is-required'));
            $this->checkemptyvalue($animal_caretaker, $this->get_message_value_from_key($language_id, 'animal_caretaker-is-required'));
        }

        if ($consulation_type == 1) {
            $this->checkemptyvalue($address, $this->get_message_value_from_key($language_id, 'address_is_required'));
            if($latitude == 0){
                $latitude = '';
            }if($longitude ==0){
                $longitude = '';
            }
            $this->checkemptyvalue($latitude, $this->get_message_value_from_key($language_id, 'latitude-is-required'));
            $this->checkemptyvalue($longitude, $this->get_message_value_from_key($language_id, 'longitude-is-required'));
        }
        //print_r($longitude);die;


        $this->checkemptyvalue($symptoms, $this->get_message_value_from_key($language_id, 'symptoms-is-required'));
        $this->checkemptyvalue($fees, $this->get_message_value_from_key($language_id, 'amount-is-required'));
        if ($category_type == 6 || $category_type == 7) {

            if ($consulation_type == 0 || $consulation_type == 1) {
                $this->checkemptyvalue($treatment_hours, $this->get_message_value_from_key($language_id, 'hours-is-required'));
                //$this->checkemptyvalue($treatment_start_date, $this->get_message_value_from_key($language_id, 'treatment_start_date_is_required'));
                //$this->checkemptyvalue($treatment_end_date, $this->get_message_value_from_key($language_id, 'treatment_end_date_is_required'));
                $this->checkemptyvalue($treatment_days, $this->get_message_value_from_key($language_id, 'treatment_days_is_required'));

                $this->checkemptyvalue($treatment_per_hours, $this->get_message_value_from_key($language_id, 'treatment_per_hours_is_required'));
            }
        }
        
        if ($consulation_type == 0) {
             $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
             $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
        } else if($consulation_type == 2) {
             $this->checkemptyvalue($appointment_date, $this->get_message_value_from_key($language_id, 'appointment-date-is-required'));
             $this->checkemptyvalue($appointment_time, $this->get_message_value_from_key($language_id, 'appointment-time-is-required'));
             // $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id-is-required'));
        } else if ($consulation_type == 1) {
            $appointment_date=NULL;
            $appointment_time=NULL;
            $clinic_id=NULL;
        }

        if(isset($appointment_time) && !empty($appointment_time)) {
            $appointment_time = str_pad($appointment_time, 2, '0', STR_PAD_LEFT);
            $appointment_time = $appointment_time.":00:00";
        }


        $this->checkemptyvalue($consulation_type, $this->get_message_value_from_key($language_id, 'consultation-mode-is-required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($payment_id, "payment_id is required");
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        if($request_id != ''){
            $this->db->query("DELETE FROM `tbl_notification` WHERE `request_id` = '" .$request_id. "' ");
        }


        $api_url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
      
        $is_live =  $this->razorpaykeys['payment_mode'];
        
        if($is_live == '1' || $is_live == 1)
        {
            $username = $this->razorpaykeys['live_key'];
            $password = $this->razorpaykeys['live_secrate_key'];
        }
        else
        {
            $username = $this->razorpaykeys['test_key'];
            $password = $this->razorpaykeys['test_secrate_key'];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $username . ':' . $password,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
       

        if (strtoupper($response->status) == 'CAPTURED' || strtoupper($response->status) == 'AUTHORIZED') {
            $partner_data = [
                'partner_id'    => $partner_id,
                'category'      => $category_type,
            ];
            if($category_type == 5){
                $patient_data = [
                    'patient_id'        => $patient_id,
                    'animal_name'       => $animal_name,
                    'animal_category'   => $animal_category,
                    'animal_caretaker'  => $animal_caretaker,
                    'address'           => $address,
                    'latitude'          => $latitude,
                    'longitude'         => $longitude,
                    'symptoms'          => $symptoms,
                    'country_code'     =>$patient_details->country_code,
                    'mobile_no'     =>$patient_details->contact_no
                ];  
            }else{
                $patient_data = [
                    'patient_id'    => $patient_id,
                    'name'          => $name,
                    'gender'        => $gender,
                    'age'           => $age,
                    'address'       => $address,
                    'latitude'      => $latitude,
                    'longitude'     => $longitude,
                    'height'        => $height,
                    'weight'        => $weight,
                    'symptoms'      => $symptoms,
                    'country_code'     =>$patient_details->country_code,
                    'mobile_no'     =>$patient_details->contact_no
                ];
            }
        
            if($consulation_type == 0){
                // $defaultAppoitmentStatus = '1';
                $defaultAppoitmentStatus = '0';
            } else {
                // $defaultAppoitmentStatus = '0';
                $defaultAppoitmentStatus = '1';
            }
            
            $defaultAppoitmentStatus = '0';

            $appsetting = $this->Api_model->get_appsetting();
            if($category_type == 4){
                $categorywiseCharge = $appsetting['doctor_service_charge'];
                $categorywiseTDS = $appsetting['doctor_tds_amt'];
            }elseif($category_type == 5){
                $categorywiseCharge = $appsetting['animal_service_charge'];
                $categorywiseTDS = $appsetting['animal_tds_amt'];
            }elseif($category_type == 6){
                $categorywiseCharge = $appsetting['nurse_service_charge'];
                $categorywiseTDS = $appsetting['nurse_tds_amt'];
            }elseif($category_type == 7){
                $categorywiseCharge = $appsetting['physio_service_charge'];
                $categorywiseTDS = $appsetting['physio_tds_amt'];
            }
            $service_charges = $fees * ($categorywiseCharge/100);
            $tds = ($fees - $service_charges) * ($categorywiseTDS/100);
            $final_receiving_amt = $fees - $service_charges - $tds;

            $ordercurrentdattime = array();
            $orderStatus = array();
            
            $orderStatus['id'] = '1';
            $orderStatus['date'] = date('Y-m-d H:i:s');
            $ordercurrentdattime[0] = $orderStatus;



            $doctor = [
                'patient_realative'         => $who,
                'partner_id'                => $partner_id,
                'healthcare_sub_id'         => $healthcare_sub_id,
                'category'                  => $category_type,
                'patient_id'                => $patient_id,
                'name'                      => $name,
                'animal_name'               => $animal_name,
                'animal_category'           => $animal_category,
                'animal_caretaker'          => $animal_caretaker,
                'gender'                    => $gender,
                'age'                       => $age,
                'height'                    => $height,
                'weight'                    => $weight,
                'country_code'=>$patient_data['country_code'],
                'mobile_no'=>$patient_data['mobile_no'],
                'address'                   => $address,
                'latitude'                  => $latitude,
                'longitude'                 => $longitude,
                'symptoms'                  => $symptoms,
                'main_amount'               => $fees,
                'treatment_hours'           => $treatment_hours,
                //'treatment_start_date'      => $treatment_start_date,
                //'treatment_end_date'        => $treatment_end_date,
                'treatment_per_hours'       => $treatment_per_hours,
                'treatment_days'            => $treatment_days,
                'partner_serialize_array'   => serialize($partner_data),
                'patient_serialize_array'   => serialize($patient_data),
                'payment_id'                => $payment_id,
                'appointment_status'        => $defaultAppoitmentStatus,
                'customorder_id'            => $customorder_id,
                'service_charges'           => $service_charges,
                'tds'                       => $tds,
                'final_receiving_amt'       => $final_receiving_amt,
                'change_status_datetime'    => json_encode($ordercurrentdattime),
                'consulation_type'          => $consulation_type,
                'appoitment_date'           =>  $appointment_date,
                'appoitment_time'           => $appointment_time,
                'clinic_id'                 => $clinic_id,
                'created_at'                => date('Y-m-d H:i:s'),
            ];


            $lastinsertID = $this->Common_model->data_insert('tbl_order', $doctor);
            // $invoice = "test.pdf";
            $invoice=$this->generatePaymentcumInvoice($lastinsertID);

            $this->db->set('invoice',$invoice);
            $this->db->where('id',$lastinsertID);
            $this->db->update('tbl_order');

            $paymentdata = [
                'order_no'      => $lastinsertID,
                'payment_id'    => $payment_id,
                'amount'        => $response->amount,
                'payment_status'=> $response->status,
                'bank'          => $response->bank,
                'order_id'      => $response->order_id,
                'invoice_id'    => $response->invoice_id,
                'card_id'       => $response->card_id,
                'method'        => $response->method,
                'amount_refunded'=> $response->amount_refunded,
                'refund_status' => $response->refund_status,
                'bank'          => $response->bank,
                'full_data'     => serialize($response),
                'created_at'    => date('Y-m-d H:i:s'),
            ];

           

            $this->Common_model->data_insert('tbl_payment_history', $paymentdata);

            // clinic_location
            $clinic_location = array();
            if(isset($clinic_id) && !empty($clinic_id)) {
                $clinic_location = $this->Api_model->get_address_by_id($clinic_id);
            }
            
            $responsedata = [
                'appointment_id' => $customorder_id,
                'order_no' => $lastinsertID,
                'appoitment_date' => $appointment_date,
                'appoitment_time' => $appointment_time,
                "clinic_id"  => $clinic_id,
                'clinic_location' => $clinic_location
            ];
            $Keyvalue = $this->category_wise_key($category_type);
           
            $receiverRecord=$this->Api_model->check_partners_details_by_id($partner_id);
           

            $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
            if($category_type == 4 || $category_type == 5){
                $NotiTitle = "Consultation";
            }
            else
            {
                 $NotiTitle = "Visit";
            }
            if($consulation_type == 1){
                $conTitle = 'Home';
            } else if($consulation_type == 2){ 
                $conTitle = 'Clinic';
            }else{
                $conTitle = 'Online';
            }

            if($category_type == 6 || $category_type == 7){
                $ttt_title = "Confirmed Service";
            } else {
                $ttt_title = "Booking Confirmed";
            }

            $notification_insert = [
                "notification_type"=> "AB",
                "partener_id"   => $partner_id,
                "category"      => $category_type,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                // "title"         => "Accepted Consultation Request",
                "title"         => $ttt_title,
                "description"   => "Your ".$conTitle." ".$NotiTitle." with ".$senderRecord->name." Has been Confirmed.",
                "request_id"    => "",
            ];

            $this->notification_entery($notification_insert);
            

            if($category_type == 6 || $category_type == 7){
                $tmp_title = "CONFIRMED ".strtoupper($NotiTitle);
                $tmp_description = "YOUR ".strtoupper($conTitle)." ".strtoupper($NotiTitle)." WITH ".strtoupper($receiverRecord->name)." HAS BEEN CONFIRMED";
            } else {
                $tmp_title = "Dr.".strtoupper($receiverRecord->name)." CONFIRMED ".strtoupper($NotiTitle);
                $tmp_title = "Confirmed Consultation";
                $tmp_description = "YOUR ".strtoupper($conTitle)." ".strtoupper($NotiTitle)." WITH Dr.".strtoupper($receiverRecord->name)." HAS BEEN CONFIRMED";
            }

            $patient_notification_insert = [
                "notification_type"=> "AB",
                "partener_id"   => $patient_id,
                "category"      => $category_type,
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => $tmp_title,
                "description"   => $tmp_description,
                // "description"   => $receiverRecord->name." has confirmed " .$Keyvalue,//
                "request_id"    => "",
            ];


            $this->notification_entery($patient_notification_insert);

            $device_token = $this->Api_model->get_user_profile_setting($partner_id);
            $device_token_IOS = $this->Api_model->get_user_profile_IOS($partner_id);

            $device_token_patient = $this->Api_model->get_user_profile_setting($patient_id);
            $device_token_IOS_patient = $this->Api_model->get_user_profile_IOS($patient_id);

            if($notification_insert)
            {
                $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
                $appoitmentRecord=$this->Api_model->getusername($lastinsertID);
                if($appoitmentRecord->consulation_type == 0){
                    $isOnline = 'Onlline';
                }else if($appoitmentRecord->consulation_type == 1){
                    $isOnline = 'Home';
                } else {
                    $isOnline = 'Clinic';
                }
                $notification_message = array();
                $notification_message['type'] = "Booking Confirmed";
                // $notification_message['title'] = "Accepted Consultation Request";
                $notification_message['title'] = "Booking Confirmed";

                if($category_type == 6 || $category_type == 7){
                    $notification_message['body'] = "Your ".$isOnline." Consultation ".$receiverRecord->name." has been Confirmed";
                } else {
                    $notification_message['body'] = "Your ".$isOnline." Consultation Dr.".$receiverRecord->name." has been Confirmed";
                }

                $notification_message['sound'] = "confirmordersound.wav";
                $notification_message['appoitment_id'] = $lastinsertID;
                $notification_message['consultation_type'] = $appoitmentRecord->consulation_type;
                $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
                $notification_message['is_followup'] = $appoitmentRecord->is_followup;
                $notification_message['request_id'] = '';
                $notification_message['patient_id'] = $patient_id;
                $notification_patient_message = array();
                $notification_patient_message['type'] = "Booking Confirmed";
                $notification_patient_message['title'] = "Booking Confirmed";
                // $notification_patient_message['title'] = "Confirmed Consultation";

                if($category_type == 6 || $category_type == 7){
                    $notification_patient_message['body'] = "Your ".$isOnline." Consultation ".$receiverRecord->name." has been Confirmed";
                } else {
                    $notification_patient_message['body'] = "Your ".$isOnline." Consultation Dr.".$receiverRecord->name." has been Confirmed";
                }

                $notification_patient_message['sound'] = "confirmordersound.wav";
                $notification_patient_message['appoitment_id'] = $lastinsertID;
                $notification_patient_message['consultation_type'] = $appoitmentRecord->consulation_type;
                $notification_patient_message['appointment_status'] = $appoitmentRecord->appointment_status;
                $notification_patient_message['is_followup'] = $appoitmentRecord->is_followup;
                $notification_patient_message['request_id'] = '';
                $notification_patient_message['patient_id'] = $patient_id;
                $this->load->helper('notifications_helper');

               
                $responseData = [
                    "appointment_id"    => $appoitmentRecord->appointment_id,
                    "appointment_status"=> $appoitmentRecord->appointment_status,
                    "consulation_type"  => $appoitmentRecord->consulation_type,
                    "created_at"        => $appoitmentRecord->created_at,
                    "id"                => $appoitmentRecord->id,
                    "is_followup"       => $appoitmentRecord->is_followup,
                    "name"              => $receiverRecord->name,
                    "partner_id"        => $partner_id,
                    "patient_id"        => $patient_id,
                    "quickblox_name"    => $appoitmentRecord->quickblox_name,
                    "appointment_date"  => $appointment_date,
                    "appointment_time"  => $appointment_time,
                    "clinic_id"  => $clinic_id,
                    "clinic_location"  => $clinic_location

                ];
                if(!empty($device_token) && $device_token['registration_ids'])
                {
                   push_notification_android($device_token['registration_ids'],$notification_message);
                }
                if(!empty($device_token_IOS) && $device_token_IOS['registration_ids'])
                {
                   push_notification_IOS($device_token_IOS['registration_ids'],$notification_message);
                }

                if(!empty($device_token_patient) && $device_token_patient['registration_ids'])
                {
                   push_notification_android($device_token_patient['registration_ids'],$notification_patient_message);
                }
                if(!empty($device_token_IOS_patient) && $device_token_IOS_patient['registration_ids'])
                {
                   push_notification_IOS($device_token_IOS_patient['registration_ids'],$notification_patient_message);
                }
                
                $this->sendResponse($responseData,$this->get_message_value_from_key($language_id,'appointment-is-successfully'));
                exit;
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
        if(!empty($lastinsertID)) {
            return $this->sendResponse($responseData, $this->get_message_value_from_key($language_id, 'appointment-is-successfully'));
            exit;
        } else {
            return $this->sendSuccessErrorResponse("Try again");
            exit;
        }
        } else {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'payment_failed'));
            exit;
        }
    }

    public function book_reinitiate_appoitment()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";
        $customorder_id = rand(1111111111, 9999999999);
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $payment_id = isset($_REQUEST['payment_id']) ? $_REQUEST['payment_id'] : '';
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($order_no, "order_no is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($payment_id, "payment_id is required");
        $this->checkuser($patient_id, '8', $language_id);
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);

        $api_url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
        $is_live =  $this->razorpaykeys['payment_mode'];
        if($is_live == '1' || $is_live == 1)
        {
            $username = $this->razorpaykeys['live_key'];
            $password = $this->razorpaykeys['live_secrate_key'];
        }
        else
        {
            $username = $this->razorpaykeys['test_key'];
            $password = $this->razorpaykeys['test_secrate_key'];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $username . ':' . $password,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (strtoupper($response->status) == 'CAPTURED' || strtoupper($response->status) == 'AUTHORIZED') {
            // $OrderData = $this->Api_model->all_order_data($order_no);
            // $ordercurrentdattime = array();
            // $orderStatus = array();
            
            // $orderStatus['id'] = '1';
            // $orderStatus['date'] = date('Y-m-d H:i:s');
            // $ordercurrentdattime[0] = $orderStatus;

            // $doctor = [
            //     'patient_realative'         => $OrderData['patient_realative'],
            //     'partner_id'                => $OrderData['partner_id'],
            //     'healthcare_sub_id'         => $OrderData['healthcare_sub_id'],
            //     'category'                  => $OrderData['category'],
            //     'patient_id'                => $patient_id,
            //     'name'                      => $OrderData['name'],
            //     'animal_name'               => $OrderData['animal_name'],
            //     'animal_category'           => $OrderData['animal_category'],
            //     'animal_caretaker'          => $OrderData['animal_caretaker'],
            //     'gender'                    => $OrderData['gender'],
            //     'age'                       => $OrderData['age'],
            //     'height'                    => $OrderData['height'],
            //     'weight'                    => $OrderData['weight'],
            //     'address'                   => $OrderData['address'],
            //     'latitude'                  => $OrderData['latitude'],
            //     'longitude'                 => $OrderData['longitude'],
            //     'symptoms'                  => $OrderData['symptoms'],
            //     'main_amount'               => $OrderData['main_amount'],
            //     'treatment_hours'           => $OrderData['treatment_hours'],
            //     'treatment_start_date'      => $OrderData['treatment_start_date'],
            //     'treatment_end_date'        => $OrderData['treatment_end_date'],
            //     'partner_serialize_array'   => $OrderData['partner_serialize_array'],
            //     'patient_serialize_array'   => $OrderData['patient_serialize_array'],
            //     'payment_id'                => $payment_id,
            //     'appointment_status'        => $OrderData['appointment_status'],
            //     'customorder_id'            => $customorder_id,
            //     'service_charges'           => $OrderData['service_charges'],
            //     'tds'                       => $OrderData['tds'],
            //     'final_receiving_amt'       => $OrderData['final_receiving_amt'],
            //     'change_status_datetime'    => json_encode($ordercurrentdattime),
            //     'consulation_type'          => $OrderData['consulation_type'],
            //     'is_reinitiate'             => '1',
            //     'created_at'                => date('Y-m-d H:i:s'),
            // ];
            // $lastinsertID = $this->Common_model->data_insert('tbl_order', $doctor);
            $paymentdata = [
                'order_no'      => $lastinsertID,
                'payment_id'    => $payment_id,
                'amount'        => $response->amount,
                'payment_status'=> $response->status,
                'bank'          => $response->bank,
                'order_id'      => $response->order_id,
                'invoice_id'    => $response->invoice_id,
                'card_id'       => $response->card_id,
                'method'        => $response->method,
                'amount_refunded'=> $response->amount_refunded,
                'refund_status' => $response->refund_status,
                'bank'          => $response->bank,
                'full_data'     => serialize($response),
                'created_at'    => date('Y-m-d H:i:s'),
            ];
            $this->Common_model->data_insert('tbl_payment_history', $paymentdata);
            $responsedata = [
                'appointment_id' => $customorder_id,
                'order_no' => $lastinsertID,
            ];
            $Keyvalue = $this->category_wise_key($OrderData['category']);
            $notification_insert = [
                "notification_type"=> "RA",
                "partener_id"   => $OrderData['partner_id'],
                "category"      => $OrderData['category'],
                "patient_id"    => $patient_id,
                "order_id"      => $customorder_id,
                "order_no"      => $lastinsertID,
                "title"         => "ReInitiate " .$Keyvalue. " Request Confirmed",
                "description"   => $OrderData['name']." has confirmed" .$Keyvalue,
                "request_id"    => "",
            ];
            $this->notification_entery($notification_insert);
            $device_token = $this->Api_model->get_user_profile_setting($OrderData['partner_id']);
            $device_token_IOS = $this->Api_model->get_user_profile_IOS($OrderData['partner_id']);
            if($notification_insert)
            {
                $receiverRecord=$this->Api_model->check_partners_details_by_id($OrderData['partner_id']);
                $senderRecord=$this->Api_model->check_partners_details_by_id($patient_id);
                $appoitmentRecord=$this->Api_model->getusername($lastinsertID);
                $notification_message = array();
                $notification_message['type'] = "ReInitiate Book" .$Keyvalue;
                $notification_message['title'] = "ReInitiate" .$Keyvalue. " Request Confirmed";
                $notification_message['body'] = $OrderData['name']." has confirmed" .$Keyvalue;
                $notification_message['sound'] = "confirmordersound.wav";
                $notification_message['appoitment_id'] = $lastinsertID;
                $notification_message['consultation_type'] = $appoitmentRecord->consulation_type;
                $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
                $notification_message['is_followup'] = $appoitmentRecord->is_followup;
                $notification_message['request_id'] = '';
                $notification_message['patient_id'] = '';
                $this->load->helper('notifications_helper');
                if(!empty($device_token) && $device_token['registration_ids'])
                {
                    push_notification_android($device_token['registration_ids'],$notification_message);
                }
                if(!empty($device_token_IOS) && $device_token_IOS['registration_ids'])
                {
                    push_notification_IOS($device_token_IOS['registration_ids'],$notification_message);
                }
                //push_notification_android($device_token['registration_ids'],$notification_message);
               
                $this->sendResponse(array(),$this->get_message_value_from_key($language_id,'reinitiate-appointment-is-successfully'));
                exit;
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
        if(!empty($lastinsertID)) {
            return $this->sendResponse($responsedata, $this->get_message_value_from_key($language_id, 'reinitiate-appointment-is-successfully'));
            exit;
        } else {
            return $this->sendSuccessErrorResponse("Try again");
            exit;
        }
        } else {
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'payment_failed'));
            exit;
        }
    }

    public function get_appoitment()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $appointment_status = isset($_REQUEST['appointment_status']) ? $_REQUEST['appointment_status'] : "";
        $is_reinitate = isset($_REQUEST['is_reinitate']) ? $_REQUEST['is_reinitate'] : "";
        //$consultation_type = isset($_REQUEST['consultation_type']) ? $_REQUEST['consultation_type'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "partner_id is required");
        $this->checkemptyvalue($is_reinitate, "is_reinitate flag is required");

        if($is_reinitate == 0){
            $this->checkemptyvalue($appointment_status, "appointment_status is required");

            if ($appointment_status == 0) {
            $message = 'Pending Appoitments List';
            } else if ($appointment_status == 1) {
                $message = 'Approved Appoitments List';
            } else if ($appointment_status == 2) {
                $message = 'Rejected Appoitments List';
            }
        }else{
            $countAppoitments = $this->Api_model->get_reinitate_appoitments($category_type,$partner_id);
            $message = 'ReInitiate Appoitments List';
        }

        if (count($countAppoitments) > 0) {
            return $this->sendResponse($countAppoitments, $message);

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }

    public function appoitment_change_status()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $appointment_status = isset($_REQUEST['appointment_status']) ? $_REQUEST['appointment_status'] : "";
        $reason = isset($_REQUEST['reason']) ? $_REQUEST['reason'] : "";

        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($id,$this->get_message_value_from_key($language_id, 'appoitment_id_is_required'));
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        if($appointment_status == 3 || $appointment_status == 4)
        {
            $this->checkemptyvalue($reason, "reason is required");   
        }
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($appointment_status, "appointment_status is required");
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        if ($appointment_status == 2) {
            if($category_type == 4 || $category_type == 5){
                    $update['is_followup'] = '1';
            }else{
                    $update['is_followup'] = '0';
            }
            $update['appoitment_start_date'] = date('Y-m-d');
        }
        $update['appointment_status'] = $appointment_status;
        $update['reason'] = $reason;
        $this->Common_model->data_update('tbl_order', $update, array('id' => $id));

        $appoitmentRecord=$this->Api_model->getusername($id);   

        $patient_id = $appoitmentRecord->patient_id;
        $patient_details = $this->Api_model->getuserdetails($patient_id);
        $patient_name = $patient_details->name;

        if($appoitmentRecord->consulation_type == '0'){
            $ConsultationType = 'Online';
        } else {
            $ConsultationType = 'Home';
        }   

        $orderCategory = $appoitmentRecord->category;

        if ($appointment_status == 1) {

            $treatment_start_date =  date('Y-m-d H:i:s');
            $update_data = array();
            $update_data['treatment_start_date'] = $treatment_start_date;
            $data_change = $this->Common_model->data_update('tbl_order', $update_data, array('id' => $id));

            if($orderCategory == 4 || $orderCategory == 5) { 
                $message_response = 'Appoitment Start Successfully';
                $message = "Dr. ".$appoitmentRecord->partner_name.' has started your consultation';
                $d_message = "You start consultation of ".$patient_name;
            } else {
                $message_response = 'Appoitment Start Successfully';
                $message = "Your Home visit with Dr. ".$appoitmentRecord->partner_name.' has been started';
                $d_message = "Your Home Visit with ".$patient_name." has been started";
            }

            // $message_response = 'Appoitment Start Successfully';
            // $message = "Your ".$ConsultationType." Consultation With Dr. ".$appoitmentRecord->partner_name.' has start your consultation';
            // $d_message = "Your ".$ConsultationType." Consultation With ". $patient_name.' has start your consultation';
            
            if($category_type == 4 || $category_type == 5){
                $title = 'Consultation Started';
            } else {
                $title = 'Start Service';
            }

            $consultation_type = 'Consultation Start';
       
        } else if ($appointment_status == 2) {


            $treatment_end_date =  date('Y-m-d H:i:s');
            $update_data = array();
            $update_data['treatment_end_date'] = $treatment_end_date;
            $data_change = $this->Common_model->data_update('tbl_order', $update_data, array('id' => $id));


            if($category_type == 4 || $category_type == 5){
                $message_response = "Your ".$ConsultationType." Consultation With Dr. ".$appoitmentRecord->partner_name." Has Been Completed. You Have Period Of 7 days For Follow up.";
                $message = "Your ".$ConsultationType." Consultation With Dr. ".$appoitmentRecord->partner_name." Has Been Completed. You Have Period Of 7 days For Follow up.";
                $d_message = "Your ".$ConsultationType." Consultation With ".$patient_name." Has Been Completed. You Have Period Of 7 days For Follow up.";
                $title = 'Completed Consultation';
            }else{
                $message_response = "Your ".$ConsultationType." Service With ".$appoitmentRecord->partner_name." Has Been Completed.";
                $message = "Your ".$ConsultationType." Service With ".$appoitmentRecord->partner_name." Has Been Completed.";
                $d_message = "Your ".$ConsultationType." Service With ".$patient_name." Has Been Completed.";
                $title = 'Completed Service';
            }
            
        } else if ($appointment_status == 3) {
                $message_response = 'Appoitment Cancelled Successfully';

                // paitent
                if($orderCategory == 4 || $orderCategory == 5) { 

                    if($appoitmentRecord->consulation_type == '0'){
                        $ConsultationType = 'Online Consultation';
                        $title = 'Cancelled Consultation';
                    } else {
                        $ConsultationType = 'Home Visit';
                        $title = 'Cancelled Visit';
                    }   

                    $message = "Your ".$ConsultationType."  With Dr. ".$appoitmentRecord->partner_name." Has Been Cancelled By You For ".$reason;

                    $d_message = "Your ".$ConsultationType."  With ".$patient_name." Has Been Cancelled By ".$patient_name." For ".$reason;
     
                } else {

                    $title = 'Cancelled Service';

                    // $message = "Your ".$ConsultationType." Visit With Dr. ".$appoitmentRecord->partner_name." Has Been Cancelled By You For ".$reason;


                    $message = "Your ".$ConsultationType." Visit With ".$appoitmentRecord->partner_name." Has Been Cancelled By ".$appoitmentRecord->partner_name." For ".$reason;

                    // $d_message = "Your ".$ConsultationType." Visit With ".$patient_name." Has Been Cancelled By ".$patient_name." For ".$reason;
                    $d_message = "Your ".$ConsultationType." Visit With ".$patient_name." Has Been Cancelled By you For ".$reason;
                    $title = 'Cancelled Service';

                } 

        } else if ($appointment_status == 4) {
           
            if($category_type == 4 || $category_type == 5){

                if($appoitmentRecord->consulation_type == '0'){
                    $ConsultationType = 'Online Consultation';
                    $title = 'Cancelled Consultation';
                } else {
                    $ConsultationType = 'Home Visit';
                    $title = 'Cancelled Visit';
                }   

                $message_response = "Your ".$ConsultationType."  With Dr. ".$appoitmentRecord->partner_name." Has Been Cancelled By You For ".$reason."";
                
                $message = "Your ".$ConsultationType."  With Dr. ".$appoitmentRecord->partner_name." Has Been Cancelled By Dr. ".$appoitmentRecord->partner_name." For ".$reason;
                $title = 'Cancelled Consultation';
                
                $d_message = "Your ".$ConsultationType." With ".$patient_name." Has Been Cancelled By You For ".$reason;
            } else {


                $message = "Your ".$ConsultationType." visit With Dr. ".$appoitmentRecord->partner_name." Has Been Cancelled By ".$appoitmentRecord->partner_name." For ".$reason;

                $d_message = "Your ".$ConsultationType." visit With ".$patient_name." Has Been Cancelled By You For ".$reason;
                $title = 'Cancelled Service';
            }
               

            if($category_type == 4 || $category_type == 5){
                $title = 'Reject Consultation';
            } else {
                $title = 'Reject Visit';
            }

        } else if ($appointment_status == 5) {
            $message_response = 'Appoitment End Successfully';
            $message = 'Appoitment End Successfully';

            $d_message = 'Appoitment End Successfully';

            if($category_type == 4 || $category_type == 5){
                $title = 'Start Consultation';
            } else {
                $title = 'Start Visit';
            }
       
        }
        
        //print_r($appoitmentRecord);die;
        if($appointment_status == 1 || $appointment_status == 2){
            if($appointment_status == 1){
                if($category_type == 4 || $category_type == 5){
                    $chatmasg['message'] = 'Start Consultation';
                } else {
                    $chatmasg['message'] = 'Start Visit';
                }
            } else { 
               if($category_type == 4 || $category_type == 5){
                    $chatmasg['message'] = 'End Consultation';
                } else {
                    $chatmasg['message'] = 'End Visit';
                }
            }

            // if($appointment_status == 1){
            //     $chatmasg['message'] = 'Start Consultation';
            // }else{
            //     $chatmasg['message'] = 'End Consultation';
            // }
            
            $chatmasg['sender_id'] = $partner_id;
            $chatmasg['receiver_id'] = $appoitmentRecord->patient_id;
            $chatmasg['appoitment_id'] = $id;
            $this->Common_model->data_insert('tbl_chats',$chatmasg);
        }
          
            // paitent entry
            $notification_insertss = [
                "notification_type"=> "U",
                "partener_id"   => $appoitmentRecord->patient_id,
                "category"      => $category_type,
                "patient_id"    => $appoitmentRecord->partner_id,
                "order_id"      => "",
                "order_no"      => $id,
                "title"         => $title,
                "description"   => $message,
                "request_id"    => "",
            ];

            $this->notification_entery($notification_insertss);

            // doctor entry
            $notification_insert = [
                "notification_type"=> "U",
                "partener_id"   => $appoitmentRecord->partner_id,
                "category"      => $category_type,
                "patient_id"    => $appoitmentRecord->patient_id,
                "order_id"      => "",
                "order_no"      => $id,
                "title"         => $title,
                "description"   => $d_message,
                "request_id"    => "",
            ];  
                       
            $this->notification_entery($notification_insert);

            $device_token = $this->Api_model->get_user_profile_setting($appoitmentRecord->patient_id);
            $device_token_IOS = $this->Api_model->get_user_profile_IOS($appoitmentRecord->patient_id);
            if($notification_insert)
            {
                $notification_message = array();
                $notification_message['type'] = "Appointment Status Update";
                $notification_message['title'] = $title;
                $notification_message['body'] = $message;
                $notification_message['sound'] = "default.wav";
                $notification_message['appoitment_id'] = $id;
                $notification_message['consultation_type'] = $appoitmentRecord->consulation_type;
                $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
                $notification_message['is_followup'] = $appoitmentRecord->is_followup;
                $notification_message['request_id'] = '';
                $notification_message['patient_id'] = '';
                $this->load->helper('notifications_helper');
                if(!empty($device_token) && !empty($device_token['registration_ids']))
                {
                    push_notification_android($device_token['registration_ids'],$notification_message);
                }
                if(!empty($device_token_IOS) && !empty($device_token_IOS['registration_ids']))
                {
                    push_notification_IOS($device_token_IOS['registration_ids'],$notification_message);
                }
                //push_notification_android($device_token['registration_ids'],$notification_message);
                $this->sendResponse(array(),$message_response);
                exit;
            }
            else
            {
                $this->sendErrorResponse($this->get_message_value_from_key($language_id,'notification_send_faild'));
                exit;
            }
        // return $this->sendSuccesResponse($message);
        // exit;
    }
    
    public function get_my_consulatiton()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $consultation_type = isset($_REQUEST['consultation_type']) ? $_REQUEST['consultation_type'] : "";
        $appointment_status = isset($_REQUEST['appointment_status']) ? $_REQUEST['appointment_status'] : "";
        $is_followup = isset($_REQUEST['is_followup']) ? $_REQUEST['is_followup'] : "";
        $is_reinitate = isset($_REQUEST['is_reinitate']) ? $_REQUEST['is_reinitate'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($is_reinitate, "is_reinitate flag is required");
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        if($is_reinitate == 0){
            $this->checkemptyvalue($consultation_type, $this->get_message_value_from_key($language_id, 'consultation-mode-is-required'));
            $this->checkemptyvalue($appointment_status, $this->get_message_value_from_key($language_id, 'appointment_status_is_required'));
            $this->checkemptyvalue($is_followup, $this->get_message_value_from_key($language_id, 'is_follow_is_required'));


            $countAppoitments = $this->Api_model->get_my_consultation($category_type, $partner_id, $consultation_type, $appointment_status,$is_followup,$is_reinitate);
            // echo $this->db->last_query();
            // echo "<Br>";

            $message = "Record found successfully";

            if ($appointment_status == 0 || $appointment_status == 1 ) {
                $message = 'Pending Consultations List';
            }

            if ($consultation_type == 0) {
                $message = 'Online Consultations List';
            } else if ($consultation_type == 1) {
                $message = 'Home Consultations List';
            } else if ($consultation_type == 2) {
                $message = 'Clinic Consultations List';
            }

        } else {
            $countAppoitments = $this->Api_model->get_reinitate_appoitments($category_type,$partner_id);
            $message = 'ReInitiate Appoitments List';
        }
        
        if (count($countAppoitments) > 0) {

            foreach($countAppoitments as $k=>$vv) {
                if(isset($vv['appoitment_date']) && !empty($vv['appoitment_date']) && isset($vv['appoitment_time']) && !empty($vv['appoitment_time'])) {
                    $new_date = $vv['appoitment_date']." ".$vv['appoitment_time'];
                    $countAppoitments[$k]['created_at'] = $new_date;
                }
            }

            return $this->sendResponse($countAppoitments, $message);
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    }
    public function get_my_consulatiton_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        $countAppoitments = $this->Api_model->get_consultation_details($id);
        //print_r($countAppoitments);die;
        if($countAppoitments['consulation_type'] == 1) {
            $time = $this->GetDrivingDistance($countAppoitments['partner_lat'], $countAppoitments['latitude'], $countAppoitments['partner_lng'], $countAppoitments['longitude']);
            $countAppoitments['time'] = $time['time'];
        }

        if(isset($countAppoitments['appoitment_date']) && !empty($countAppoitments['appoitment_date']) && isset($countAppoitments['appoitment_time']) && !empty($countAppoitments['appoitment_time'])) {
            $new_date = $countAppoitments['appoitment_date']." ".$countAppoitments['appoitment_time'];
            $countAppoitments['created_at'] = $new_date;
        }

        if(isset($countAppoitments['clinic_address']) && !empty($countAppoitments['clinic_address'])) {
            $clinic_address = $countAppoitments['clinic_address'];
            $countAppoitments['address'] = $clinic_address;
        }

        $countAppoitments['prescription'] = $this->Api_model->get_prescription_by_id($id);
        $countAppoitments['certificate'] = $this->Api_model->get_certificate_by_id($id);
        
        if (count($countAppoitments) > 0) {
            return $this->sendResponse($countAppoitments, 'Consultations Details');

        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function my_earning()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        $countData['earn_list'] = $this->Api_model->get_my_patients_by_category($partner_id, $category_type);
        $total = $this->Api_model->get_total_earning($partner_id, $category_type);
        if(!empty($total)){
            $countData['total'] = $total['total'];   
        }else{
            $countData['total'] = 0;
        }
        
        if (count($countData) > 0) {
            return $this->sendResponse($countData, "My Earning History");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data'));
        }
    }
    public function my_patients()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type, $this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "Partner Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        $countData = $this->Api_model->get_my_patients_by_category($partner_id, $category_type);
        if (count($countData) > 0) {
            return $this->sendResponse($countData, "My Patients History");
        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function patient_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "partner_id is required");
        $this->checkemptyvalue($id, "id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
        $countData = $this->Api_model->get_patient_details_by_id($id, $partner_id);
        if (count($countData) > 0) {
            return $this->sendResponse($countData, "Patients Details");
        } else {
            return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
    public function update_notification()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $is_notification = isset($_REQUEST['is_notification']) ? $_REQUEST['is_notification'] : "";

        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "partner_id is required");
        $this->checkemptyvalue($is_notification, $this->get_message_value_from_key($language_id, 'is_notification_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);

        $data['is_notification'] = $is_notification;

        $this->Common_model->data_update('tbl_partners', $data, array('id' => $partner_id));
        if ($is_notification == 0) {
            $message_key = 'notification_off_successfully';
        } else {
            $message_key = 'notification_on_successfully';
        }
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, $message_key), '1');

    }
    public function verify_appointment_otp()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $otp = isset($_REQUEST['otp']) ? $_REQUEST['otp'] : "";
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "partner_id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($otp, $this->get_message_value_from_key($language_id, 'otp_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);

        $data['otp'] = $otp;
        $data['is_verify_otp'] = 1;

        $this->Common_model->data_update('tbl_order', $data, array('id' => $id));
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'otp_verify_successfully'), '1');

    }
    public function  add_prescription()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $partner_id = isset($_REQUEST['partner_id']) ? $_REQUEST['partner_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
       
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($partner_id, "partner_id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($otp, $this->get_message_value_from_key($language_id, 'otp_is_required'));
        $this->checkemptyvalue($id, $this->get_message_value_from_key($language_id, 'id_is_required'));
        $this->checkuser($partner_id, $category_type, $language_id);
        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);

        $data['otp'] = $otp;
        $data['is_verify_otp'] = 1;

        $this->Common_model->data_update('tbl_order', $data, array('id' => $id));
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'otp_verify_successfully'), '1');
    }

    public function add_signature()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";  
        $signature = isset($_FILES["signature"]) ? $_FILES["signature"] : "";  
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($user_id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($signature, $this->get_message_value_from_key($language_id, 'signature_is_required'));
        $this->checkuser($user_id, $category_type, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $path = $this->config->item("signature_images_path");
        $image = newuploadusingcompress($_FILES["signature"], $path);
        if (!empty($image)) {
            $data['digital_sign'] = $image;
        }
        $this->Common_model->data_update('tbl_partners', $data, array('id' => $user_id));
        $customers = $this->get_all_customers_data($category_type, $user_id, $currendeviceid);
        return $this->sendResponse($customers, $this->get_message_value_from_key($language_id, 'signature_saved_successfully'));
        exit;
    }
    public function add_generated_prescription()
    {
        //log_message('debug',print_r($_REQUEST,true));
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";  
        $chief_complaints = isset($_REQUEST['chief_complaints']) ? $_REQUEST['chief_complaints'] : "";  
        $medical_history = isset($_REQUEST['medical_history']) ? $_REQUEST['medical_history'] : "";  
        $allergies = isset($_REQUEST['allergies']) ? $_REQUEST['allergies'] : "";

        $provisional_diagnosis = isset($_REQUEST['provisional_diagnosis']) ? $_REQUEST['provisional_diagnosis'] : "";  
        $diagnostic_test = isset($_REQUEST['diagnostic_test']) ? $_REQUEST['diagnostic_test'] : "";  
        $medicine = isset($_REQUEST['medicine']) ? $_REQUEST['medicine'] : "";
        
        $general_advice = isset($_REQUEST['general_advice']) ? $_REQUEST['general_advice'] : "";  
          
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";  
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($user_id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'patient_id_is_required'));
        $this->checkemptyvalue($order_no, $this->get_message_value_from_key($language_id, 'order_no_is_required'));
        $this->checkemptyvalue($chief_complaints, $this->get_message_value_from_key($language_id, 'chief_complaints_is_required'));
        //$this->checkemptyvalue($medical_history, $this->get_message_value_from_key($language_id, 'medical_history_is_required'));
        $this->checkemptyvalue($provisional_diagnosis, $this->get_message_value_from_key($language_id, 'provisional_diagnosis_is_required'));
        //$this->checkemptyvalue($diagnostic_test, $this->get_message_value_from_key($language_id, 'diagnostic_test_is_required'));
        $this->checkemptyvalue($medicine, $this->get_message_value_from_key($language_id, 'medicine_is_required'));
        //$this->checkemptyvalue($general_advice, $this->get_message_value_from_key($language_id, 'general_advice_is_required'));
        $this->checkuser($user_id, $category_type, $language_id);
        $this->checkuser($patient_id,8, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $random_no = rand(1111111111,9999999999).$patient_id;
        $certificate_name = substr($random_no,-10);
        
        $pdfFilename = "prescription-".$certificate_name.".pdf";
        $insert_data = [
            'order_no'          => $order_no,
            'partner_id'        => $user_id,
            'patient_id'        => $patient_id,
            'chief_complaints'  => $chief_complaints,
            'medical_history'   => $medical_history,
            'allergies'         => $allergies,
            'provisional_diagnosis'=> $provisional_diagnosis,
            'diagnostic_test'   => $diagnostic_test,
            'medicine'          => $medicine,
            'general_advice'    => $general_advice,
            'file'              => $pdfFilename,
            'created_at'        => date('y-m-d')
        ];

        $id = $this->Common_model->data_insert('tbl_prescriptions', $insert_data);
        if($id > 0){
            $data['doctor_data'] = $this->db->get_where('tbl_partners',["id" => $user_id])->row_array();
            $data['patient_data'] = $this->db->get_where('tbl_order',["id" => $order_no])->row_array();
            $data['prescriptions_data'] = $insert_data;
            $data['provisional_diagnosis'] = json_decode($provisional_diagnosis, true);
            $data['diagnostic_test'] = json_decode($diagnostic_test, true);
            $data['medicine'] = json_decode($medicine, true);
            $html = $this->load->view('partner/order/prescription',$data, true);
            
            $bhptovideo = time() . ".html";

            $name = $_SERVER['DOCUMENT_ROOT'] . '/uploads/preceptionimages/' . $bhptovideo;
            file_put_contents($name, $html);
            $this->load->helper('generateimage');
            $new=generateimage($name,$this->config->item('prescription_uploaded_path'),$this->config->item('prescription_images_path'));
            // $new = "test.png";
            @unlink($name);
            $this->db->set('file',$new);
            $this->db->where('id',$id);
            $this->db->update('tbl_prescriptions');
            return $this->sendResponsenullobject($new, "Prescription add successfully");     
        }else{
           return $this->sendErrorResponse("prescription_is_not_generate"); 
        }
    }
    public function add_medical_certificate()
    {
        
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $category_type = isset($_REQUEST['category_type']) ? $_REQUEST['category_type'] : "";
        $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";  
        $message = isset($_REQUEST['message']) ? $_REQUEST['message'] : "";  
        $from_date = isset($_REQUEST['from_date']) ? $_REQUEST['from_date'] : "";
        $to_date = isset($_REQUEST['to_date']) ? $_REQUEST['to_date'] : "";  
        $order_no = isset($_REQUEST['order_no']) ? $_REQUEST['order_no'] : "";  
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($category_type,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($user_id, $this->get_message_value_from_key($language_id, 'user_id_is_required'));
        $this->checkemptyvalue($patient_id, $this->get_message_value_from_key($language_id, 'patient_id_is_required'));
        $this->checkemptyvalue($message, $this->get_message_value_from_key($language_id, 'message_is_required'));
        $this->checkemptyvalue($from_date, $this->get_message_value_from_key($language_id, 'from_date_is_required'));
        $this->checkemptyvalue($to_date, $this->get_message_value_from_key($language_id, 'to_date_is_required'));
        $this->checkemptyvalue($order_no, $this->get_message_value_from_key($language_id, 'order_no_is_required'));
        $this->checkuser($user_id, $category_type, $language_id);
        $this->checkuser($patient_id,8, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $random_no = rand(1111111111,9999999999).$patient_id;
        $certificate_name = substr($random_no,-10);
        $data['doctor_data'] = $this->db->get_where('tbl_partners',["id" => $user_id])->row_array();
        $data['patient_data'] = $this->db->get_where('tbl_order',["id" => $order_no])->row_array();
        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;
        $data['message'] = $message;
        $html = $this->load->view('partner/order/medical_certificate',$data, true);
        $pdfFilename = "certificate-".$certificate_name.".pdf";
        $pdfsavePath = $this->config->item('medical_certificate_path').$pdfFilename;
        //print_r($this->config->item('medical_certificate_path'));die;
        $this->load->library('Pdf');
        $this->pdf->pdf->AddPage('P');
        $this->pdf->pdf->WriteHTML($html);
        $this->pdf->pdf->Output($pdfsavePath,'F');
        $insert_data = [
            'order_no'      => $order_no,
            'partner_id'    => $user_id,
            'patient_id'    => $patient_id,
            'file'          => $pdfFilename,
            'created_at'    => date('y-m-d h:i:s')
        ]; 
        $id = $this->Common_model->data_insert('tbl_medical_certificate', $insert_data);
        if($id > 0){
            return $this->sendResponsenullobject($pdfFilename, "Medical Certificate");  
        }else{
           return $this->sendErrorResponse("medical_certificate_is_not_generate"); 
        }
    }
    /* ----- End Doctor/Nurse/Veterinary Doctor/Physiotherapist API ----- */
    /* Chat Api Start */
    public function sendchat()
    {
        
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $sender_id=isset($_REQUEST['sender_id']) ? $_REQUEST['sender_id'] : '';
        $receiver_id=isset($_REQUEST['receiver_id']) ? $_REQUEST['receiver_id'] : '';
        $appoitment_id=isset($_REQUEST['appoitment_id']) ? $_REQUEST['appoitment_id'] : '';
        $type=isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
        $message=isset($_REQUEST['message']) ? $_REQUEST['message'] : '';
        $file=isset($_FILES['file']) ? $_FILES['file'] : '';
        
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';
        $this->checkemptyvalue($sender_id,$this->get_message_value_from_key($language_id,'sender_id_is_required'));
        $this->checkemptyvalue($receiver_id,$this->get_message_value_from_key($language_id,'receiver_id_is_required'));
        $this->checkemptyvalue($receiver_id,$this->get_message_value_from_key($language_id,'receiver_id_is_required'));
        $this->checkemptyvalue($appoitment_id,$this->get_message_value_from_key($language_id,'appoitment_id_is_required'));
        $this->checkemptyvalue($type,$this->get_message_value_from_key($language_id,'type_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($sender_id, $currendeviceid, $authtoken, $language_id);
        $data=array();
        $image = '';  
             
        if($type !="text")
        {
            $this->checkemptyvalue($file, $this->get_message_value_from_key($language_id, 'file_is_required'));
            $uploadpath = $this->config->item("chat_image_path");
            $temp = explode(".", $_FILES["file"]["name"]);
            $filename = rand(0000, 9999) . time() . '.' . end($temp);
            $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
            $fileExt = strtolower($fileExt);
            if($fileExt == 'pdf') {
                $config['upload_path'] = './uploads/chat_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|csv';
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                
                move_uploaded_file($_FILES["file"]["tmp_name"], $uploadpath . $filename);
                $image = $filename;
            } else {
                $image = $this->newuploadusingcompress($_FILES["file"], $uploadpath);
            }
            $message = $image;
        }else{
            $message = stripslashes($message);
        }
        $str_to_time=strtotime(date('Y-m-d H:i:s'));
        $insertchat=array(
                "sender_id"     => $sender_id,
                "receiver_id"   => $receiver_id,
                "appoitment_id" => $appoitment_id,
                "type"          => $type,
                "message"       => $message,
                "image_path"    => $image,
                "created_at"    => date('Y-m-d H:i:s')
        );
        
        $insert=$this->Common_model->data_insert('tbl_chats',$insertchat);
        if($insert)
        {
            $receiverRecord=$this->Api_model->check_partners_details_by_id($receiver_id);
            
            $senderRecord=$this->Api_model->check_partners_details_by_id($sender_id);
            $appoitmentRecord=$this->Api_model->getusername($appoitment_id);
            if($senderRecord->category=="4" || $senderRecord->category==4)
            {
                $notification_desc = "Dr.".$senderRecord->name.' : '.$message;
            }
            else
            {
                $notification_desc = $senderRecord->name.' : ' .$message;
            }
            $notification_insert = [
                        "notification_type" => "C",
                        "partener_id"       => $receiver_id,
                        "category"          => $receiverRecord->category,
                        "patient_id"        => "",
                        "order_id"          => "",
                        "order_no"          => $appoitment_id,
                        "title"             => 'New Message',
                        "description"       => $notification_desc,
                        "request_id"        => "",
                        "chat_id"           => $insert,
                        "created_at"    => date('Y-m-d H:i:s'),
                    ];
            $this->Common_model->data_insert('tbl_notification', $notification_insert);
            $notification_message = array();
            $notification_message['type'] = "Chat";
            $notification_message['title'] = "New Message";
            if($senderRecord->category=="4" || $senderRecord->category==4)
            {
                $notification_message['body'] = "Dr.".$senderRecord->name.' : '.$message;
            }
            else
            {
                $notification_message['body'] = $senderRecord->name.' : ' .$message;
            }
            $notification_message['sound'] = "chatsound.wav";
            $notification_message['sender_id'] = $sender_id;
            $notification_message['receiver_id'] = $receiver_id;
            $notification_message['quickblox_name'] = $senderRecord->quickblox_name;
            $notification_message['type'] = "chat";
            $notification_message['sender_name'] = $senderRecord->name;
            $notification_message['appoitment_id'] = $appoitment_id;
            $notification_message['consultation_type'] = $appoitmentRecord->consulation_type;
            $notification_message['appointment_status'] = $appoitmentRecord->appointment_status;
            $notification_message['is_followup'] = $appoitmentRecord->is_followup;
            $notification_message['request_id'] = '';
            $notification_message['patient_id'] = '';
            $sender_profile_pic = "";
            if(!empty($senderRecord->profile))
            {
                $url = $this->config->item('profile_images_uploaded_path');
                //print_r($url);die;
                $sender_profile_pic=$url.$senderRecord->profile;
            }
            //print_r($sender_profile_pic);die;
            $notification_message['sender_profile_pic'] = $sender_profile_pic;

            $msg = $senderRecord->name. " send you new message as ".$message;
            $device_token = $this->Api_model->get_user_profile_setting($receiver_id);
            $device_token_IOS = $this->Api_model->get_user_profile_IOS($receiver_id);
            
            $this->load->helper('notifications_helper');
            if(!empty($device_token) && !empty($device_token['registration_ids']))
            {
                push_notification_android($device_token['registration_ids'],$notification_message);
            }
            if(!empty($device_token_IOS) && !empty($device_token_IOS['registration_ids']))
            {
                push_notification_IOS($device_token_IOS['registration_ids'],$notification_message);
            }
            //$current_device_token = $receiverRecord->device_token;
            //$current_device_type = $receiverRecord->devices_type;
            //print_r($notification_message);die;
            // for ($i=0; $i < count($receiverDeviceToken); $i++) { 
            //     //print_r($receiverDeviceToken[$i]['device_token']).print_r('---n---');
            //     //print_r($receiverDeviceToken[$i]['device_token']);die;
            //     if(isset($receiverDeviceToken[$i]['device_token']) && !empty($receiverDeviceToken[$i]['device_token']))
            //     {
            //         //print_r(1);die;
            //         $this->load->helper('notifications_helper');
            //         push_notification_android($receiverDeviceToken[$i]['device_token'],$notification_message);   
            //     }
            // }
            // if(isset($current_device_token) && !empty($current_device_token))
            // {
            //     if($current_device_type == "A" ||  $current_device_type === "A" )
            //     {
            //         push_notification_android($current_device_token,$notification_message);
            //     }
                
            //     if($current_device_type == "I" || $current_device_type === "I")
            //     {
            //         $notification_message['sender_id'] = $sender_id;
            //         $notification_message['receiver_id'] = $receiver_id;
            //         push_notification_iOS($current_device_token,$notification_message);
            //     }
            // }
            $this->sendResponse(array(),$this->get_message_value_from_key($language_id,'chat_send'));
            exit;
        }
        else
        {
            $this->sendErrorResponse($this->get_message_value_from_key($language_id,'chat_faild'));
            exit;
        }
    }

    public function my_chat_details_list()
    {
        
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $sender_id = isset($_POST['sender_id']) ? $_POST['sender_id'] : '';
        $receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : '';
        $appoitment_id = isset($_POST['appoitment_id']) ? $_POST['appoitment_id'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : ''; 
        $this->checkemptyvalue($sender_id,$this->get_message_value_from_key($language_id,'sender_id_is_required'));
        $this->checkemptyvalue($receiver_id,$this->get_message_value_from_key($language_id,'receiver_id_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        $this->checkemptyvalue($appoitment_id,$this->get_message_value_from_key($language_id,'appoitment_id_is_required'));
        $this->userexists($sender_id, $currendeviceid, $authtoken, $language_id);
        
        $result = $this->Api_model->chat_details($sender_id, $receiver_id,$appoitment_id);
        if (count($result) > 0)
        {
            $arr = array();
            $array = array();
            
            foreach ($result as $value)
            {
                $array[] = $value;
            }
            $arr['chat'] = $array;
            $senderdata = $this->Api_model->check_partners_details_by_id($sender_id);
            $receiverdata =$this->Api_model->check_partners_details_by_id($receiver_id);
            $arr['receiver_data'] = $receiverdata;
            $this->sendResponsenullobject($arr, $this->get_message_value_from_key($language_id,'chat_found'));
            exit;
        }
        else
        {
            $arr = array();
            $array = array();
            $arr['chat'] = $array;
            $receiverdata = $this->Api_model->check_partners_details_by_id($receiver_id);
            $arr['receiver_data'] = $receiverdata;
            $this->sendResponsenullobject($arr, $this->get_message_value_from_key($language_id,'chat_not_found'));
            exit;
        }
    }

    public function my_chat_list()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
        $this->checkemptyvalue($id,$this->get_message_value_from_key($language_id,'id_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        
        $this->userexists($id, $currendeviceid, $authtoken, $language_id);
        
        $returnpath = $this->config->item('profile_images_uploaded_path');
        $data = $this->Api_model->chatlisting($id);
        //print_r($data);die;
        $chatlist = array();
        
        if (count($data) > 0)
        {
            $price = array();
            foreach ($data as $key => $row)
            {
                $price[$key] = $row->id;
            }
            array_multisort($price, SORT_DESC, $data);
            foreach ($data as $k => $row)
            {
                
                if ($id == $row->receiver_id){
                    $get_image_id = $row->sender_id;
                }else{
                    $get_image_id = $row->receiver_id;
                }
                // get image and name from get_image_id
                $user_image = $this->Api_model->getuserimage($get_image_id);
                $user_details = $this->Api_model->getuserdetails($get_image_id);
                $user_name = $this->Api_model->getusername($row->appoitment_id);
                $chatlist[$k] = $row;
                $chatlist[$k]->name = isset($user_name->name) ? $user_name->name:"";
                $chatlist[$k]->profile = isset($user_image->profile) ? $user_image->profile : "";
                $chatlist[$k]->contact_no = isset($user_details->contact_no) ? $user_details->contact_no : "";
                $chatlist[$k]->country_code = isset($user_details->country_code) ? $user_details->country_code : "";
                $chatlist[$k]->appointment_status = isset($user_name->appointment_status) ? $user_name->appointment_status :"";
                $chatlist[$k]->consulation_type = isset($user_name->consulation_type) ? $user_name->consulation_type:"";
                $chatlist[$k]->is_followup = isset($user_name->is_followup) ? $user_name->is_followup:"";
                if (!empty($chatlist[$k]->profile))
                {
                    $chatlist[$k]->profile = $returnpath . $user_image->profile;
                }
            }
            $this->sendResponse($chatlist, $this->get_message_value_from_key($language_id,'chat_found'));
            exit;
        }
        else
        {
            $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id,'chat_not_found'),1);
            exit;
        }
    }

    /* Chat Api End */
    /* Notification Api End */
    public function my_notification_list()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
        $this->checkemptyvalue($language_id,$this->get_message_value_from_key($language_id,'language_id_is_required'));
        $this->checkemptyvalue($user_id,$this->get_message_value_from_key($language_id,'user_id_is_required'));
        $this->checkemptyvalue($category,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        $this->checkuser($user_id,$category, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->notification_listing($user_id);
        // echo $this->db->last_query();
        // exit;

        if(count($data) > 0) {
            return $this->sendResponse($data, "All Notification List");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'),1);
        }
    }

    public function my_reinitate_consultation_list()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
        $this->checkemptyvalue($language_id,$this->get_message_value_from_key($language_id,'language_id_is_required'));
        $this->checkemptyvalue($user_id,$this->get_message_value_from_key($language_id,'user_id_is_required'));
        $this->checkemptyvalue($category,$this->get_message_value_from_key($language_id, 'category_type_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        $this->checkuser($user_id,$category, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->reinitate_notification_list($user_id);
        if(count($data) > 0) {
            return $this->sendResponse($data, "All Notification List");
        } else {
            return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
        }
    }
   

    public function read_notification()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $category = isset($_POST['category_type']) ? $_POST['category_type'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
        $notification_id=isset($_REQUEST['notification_id']) ? $_REQUEST['notification_id'] : '';        
        $this->checkemptyvalue($language_id,$this->get_message_value_from_key($language_id,'language_id_is_required'));
        $this->checkemptyvalue($user_id,$this->get_message_value_from_key($language_id,'user_id_is_required'));
        $this->checkemptyvalue($category,$this->get_message_value_from_key($language_id,'category_type_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        $this->checkemptyvalue($notification_id,$this->get_message_value_from_key($language_id,'notification_id_is_required'));

        $this->checkuser($user_id,$category,$language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $notification = $this->Api_model->notificationexit($user_id,$notification_id);
        if(count($notification) > 0){
            $ddata['is_admin_view'] = '1';
            $this->Common_model->data_update('tbl_notification', $ddata, array('id' => $notification_id));
            return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'notification_is_read_successfully'), '1');
            exit;   
        }else{
           return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'notification_is_not_avalible'), '0');
            exit; 
        }
        
    }
    public function unread_notification_count()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $category = isset($_POST['category_type']) ? $_POST['category_type'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
               
        $this->checkemptyvalue($language_id,$this->get_message_value_from_key($language_id,'language_id_is_required'));
        $this->checkemptyvalue($user_id,$this->get_message_value_from_key($language_id,'user_id_is_required'));
        $this->checkemptyvalue($category,$this->get_message_value_from_key($language_id,'category_type_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        
        $this->checkuser($user_id,$category,$language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);
        $data = $this->Api_model->unread_notification_cout($user_id);
        
        if($data->row_count > 0) {
            return $this->sendResponsenullobject($data->row_count,"Notification Count");
        } else {
            return $this->sendResponsenullobject(0,"Notification Count");

            
        }
        exit;
    }
    /* Notification Api End */
    public function send_mail()
    {
        $language_id = isset($_POST['language_id']) ? $_POST['language_id'] : '1';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $authtoken=isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : '';
        $currendeviceid=isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : '';        
        $email=isset($_REQUEST['email']) ? $_REQUEST['email'] : '';        
        $name=isset($_REQUEST['name']) ? $_REQUEST['name'] : '';        
        $message=isset($_REQUEST['message']) ? $_REQUEST['message'] : '';        
        $this->checkemptyvalue($language_id,$this->get_message_value_from_key($language_id,'language_id_is_required'));
        $this->checkemptyvalue($user_id,$this->get_message_value_from_key($language_id,'user_id_is_required'));
        $this->checkemptyvalue($category,$this->get_message_value_from_key($language_id,'category_type_is_required'));
        $this->checkemptyvalue($authtoken,$this->get_message_value_from_key($language_id,'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid,$this->get_message_value_from_key($language_id,'current_deviceid_is_required'));
        $this->checkemptyvalue($email,$this->get_message_value_from_key($language_id,'email_address_is_required'));
        $this->checkemptyvalue($name,$this->get_message_value_from_key($language_id,'name_is_required'));
        $this->checkemptyvalue($message,$this->get_message_value_from_key($language_id,'message_is_required'));
        $this->checkuser($user_id,$category, $language_id);
        $this->userexists($user_id, $currendeviceid, $authtoken, $language_id);

        //$this->load->helper('phpmailer_helper');
        //$message = send_mail_from_user($email,$message,$name);
        //$message = send($email,$message,$name);
        //return $this->sendSuccessErrorResponse($message);
        $this->load->config('email');
        $this->load->library('email');
        $to = $this->config->item('smtp_user');
        $this->email->from($email, 'Atheal');
        $this->email->to($to);
        $this->email->message($message);
        if ($this->email->send()) {
            return $this->sendSuccessErrorResponse("Mail sent Successfully");
                exit;  
        }else{
            return $this->sendSuccessErrorResponse("Mail not sent Successfully");
                exit;
        }
        
        // if(count($data) > 0) {
        //     return $this->sendResponse($data, "All Notification List");
        // } else {
        //     return $this->sendErrorResponse($this->get_message_value_from_key($language_id, 'no_data_found'));
        // }
    }
    /* Razor Pay  */
    public function generate_order()
    {
        
        $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : "";
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $patient_id = isset($_REQUEST['patient_id']) ? $_REQUEST['patient_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($patient_id, "Patient Id is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($patient_id, $currendeviceid, $authtoken, $language_id);
        $receipt = "Atheal_" . rand(00, 99999);
        if(isset(explode('.',$amount)[1]) &&  explode('.',$amount)[1]==true)
        {
            $amount=$amount*100;
        } else if($amount <=99)
        {
            $amount=$amount*100;
        }
        $array = array('amount' => (int) $amount, 'currency' => "INR", "receipt" => $receipt);
        $curl = curl_init();

        $is_live =  $this->razorpaykeys['payment_mode'];
        if($is_live == '1' || $is_live == 1)
        {
            $username = $this->razorpaykeys['live_key'];
            $password = $this->razorpaykeys['live_secrate_key'];
        }
        else
        {
            $username = $this->razorpaykeys['test_key'];
            $password = $this->razorpaykeys['test_secrate_key'];
        }
        $api_url = "https://api.razorpay.com/v1/orders";
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
        return $this->sendResponse($cdata, "Order is creted");
    }
    public function addedit_bank_details()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $account_no = isset($_REQUEST['account_no']) ? $_REQUEST['account_no'] : "";
        $account_name = isset($_REQUEST['account_name']) ? $_REQUEST['account_name'] : "";
        $ifsc_code = isset($_REQUEST['ifsc_code']) ? $_REQUEST['ifsc_code'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, "user Id is required");
        $this->checkemptyvalue($account_no, "account_no is required");
        $this->checkemptyvalue($account_name, "account_name is required");
        $this->checkemptyvalue($ifsc_code, "ifsc_code is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        $data['account_no'] = $account_no;
        $data['account_name'] = $account_name;
        $data['ifsc_code'] = $ifsc_code;
        $this->Common_model->data_update('tbl_partners', $data, array('id' => $userid));
        return $this->sendSuccessErrorResponse($this->get_message_value_from_key($language_id, 'bankdetails_change_successfully'), '1');
        
        exit;
    }
    public function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=pl-PL&key=AIzaSyCj2CVbjrbDS-dfzALe_g9RuMGK3wXxKAI";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        //print_r($response_a['rows'][0]['elements'][0]['status']);die;

        if($response_a['rows'][0]['elements'][0]['status'] == "OK"){
            $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
            $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        }else{
            $dist = '';
            $time = '';
        }
        return array('distance' => $dist, 'time' => $time);
    }
    public function sendmail($email,$message,$name)
    {
        $fp = fsockopen("ssl://smtpout.secureserver.net", 25, $errno, $errstr);
        
       exit;
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $this->email->from($email,$name);
            $this->email->to('support@atheal.in');
            $this->email->subject("Arrived Mail");
            $this->email->message($message);
            $this->email->send();
    }
    public function checknotification()
    {
        $notification_message = array();
        $notification_message['type'] = "Chat";
        $notification_message['title'] = 'For Testing ';
        $notification_message['body'] = 'Hello';
        $notification_message['sound'] = "default";
        $this->load->helper('notifications_helper');
        push_notification_IOS('A71420D7402A15EF950C5BC2A8555DF081B2E1488DA4E7F8A28E01D3DB81363C','{"aps":{"alert":"Hello Abhi","sound":"default"}}');
    }
    public function get_timing_wise_store($category){
        $countStore = $this->Api_model->get_category_wise_store($category);
        
        $array = array();
        foreach($countStore as $row)
        {
            if(!empty($row['open_timing']))
            {
                if($row['open_timing'] == '24/7'){
                    $array[]=$row['id'];
                } 
                else{
                    $openTiming = json_decode($row['open_timing'],true);
                    if(!empty($openTiming))
                    {
                        foreach ($openTiming as $key => $value) {
                       
                            if(date('l') == $value['Day']){
                                $now = new DateTime();
                                $begin = new DateTime($value['Strtime']);
                                $end = new DateTime($value['Endtime']);
                                
                                if($now >= $begin && $now <= $end){
                                    $array[]=$row['id'];
                                }
                            }    
                        }
                    }
                    else
                    {
                        $array[]=$row['id'];
                    }
                }
            } else {
                $array[]=$row['id'];
            }
        }
        return $array;
        
    }
    public function generatePaymentcumInvoice($orderId)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id',$orderId);
        $orderdata = $this->db->get()->row_array();
        
        
        $final=array();
        //paient data
        $final['Invoice_Number']=$this->get_purchase_order_id($orderId);
        $final['Consultation_ID']=$orderdata['customorder_id'];
        $final['Date']=date('M d,Y',strtotime($orderdata['created_at']));
        $final['patient_name']=$orderdata['name'];
        $final['patient_number']=$orderdata['mobile_no'];
        //doctor data
        $this->db->select('*');
        $this->db->from('tbl_partners');
        $this->db->where('id',$orderdata['partner_id']);
        $doctordata = $this->db->get()->row_array();
        $final['doctor_name']=$doctordata['name'];
        $final['clinic_name']='';
        if($orderdata['consulation_type']==0)
        {
            $final['consulation_type']='Online Consultation';
        }
        else if($orderdata['consulation_type']==1)
        {
            $final['consulation_type']='Home Visit';
        }
        else if($orderdata['consulation_type']==2)
        {
            $final['consulation_type']='Clinic Visit';
        }
        else
        {
            $final['consulation_type']='Home & Video Consultation';
        }

        //Invoice details
        if($orderdata['consulation_type']==0)
        {
            $final['consulation_name']='Online Consultation';
        }
        else if($orderdata['consulation_type']==1)
        {
            $final['consulation_name']='Home Visit';
        }
        else if($orderdata['consulation_type']==2)
        {
            $final['consulation_name']='Clinic Visit';
        }
        else
        {
            $final['consulation_name']='Home & Video Consultation';
        }

        $final['final_amount']=$orderdata['main_amount'];
        $final['final_receiving_amt']=$orderdata['final_receiving_amt'];
        $final['tds']=$orderdata['tds'];
        $final['service_charges']=$orderdata['service_charges'];

        //Card details
        $this->db->select('*');
        $this->db->from('tbl_site_setting');
        $this->db->order_by('id','desc');
        $sitesetting=$this->db->get()->row_array();

        $final['gst_number']=$sitesetting['gst_number'];
        $final['pan_number']=$sitesetting['pan_number'];
        $final['cin_number']=$sitesetting['cin_number'];
        $final['issued_by']=$sitesetting['issued_by'];

        // footer
        $final['mobile']=$sitesetting['help_line'];
        $final['header_email']=$sitesetting['header_email'];
        $final['help_line']=$sitesetting['help_line'];
        $final['logo']=$sitesetting['header_logo'];


        //socialmedia
        $this->db->select('*');
        $this->db->from('tbl_social_media');
        $this->db->order_by('id','desc');
        $final['social_media']=$this->db->get()->result_array();

        $html = $this->load->view('invoice/invoice', $final, true);

        $pdfFilename = "invoice-".time().".pdf";
        $pdfsavePath = $this->config->item('invoice_path').$pdfFilename;
        $this->load->library('Pdf');
        $this->pdf->pdf->AddPage('P');
        $this->pdf->pdf->WriteHTML($html);
        $this->pdf->pdf->Output($pdfsavePath,'F');
        return $pdfFilename;

    }
    public function get_purchase_order_id($id)
    {
        require APPPATH.'third_party/Luhn.php';
        $year=date("y");
        $month=date('m');
        $date=date("d");
        $Sequence =$id;
        if($id <= 99 )
        {
            $Sequence = str_pad($Sequence, 3, '0', STR_PAD_LEFT);
        }
        $store=$year.$month.$date.$Sequence;
        $number=(int)$store;
        $checksum = Luhn::create($number);
        return $checksum;
    }
    public function SerachMedicine()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $medicine_name = isset($_REQUEST['medicine_name']) ? $_REQUEST['medicine_name'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, "user Id is required");
        $this->checkemptyvalue($medicine_name, "Medicine is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        if(strlen($medicine_name) >= 3)
        {
            $this->db->select('id as medicine_id,UPPER(name) as name,UPPER(company_name) as manufacture_name,UPPER(batch_no) as batch_no,UPPER(no_of_tablets) as no_of_tablets,UPPER(generic_name) as generic_name,UPPER(form_of_package) as form_of_package,expiray_date,created_at',false);
            $this->db->from('tbl_medicine');
            $this->db->like('name',strtolower($medicine_name));
            $this->db->order_by('name','asc');
            $data=$this->db->get()->result_array();
            if (count($data) > 0)
            {
                return $this->sendResponse($data, "All Medicine List");
            }
            else
            {
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
            }
        }

    }

    public function SerachDrugMedicine()
    {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $medicine_name = isset($_REQUEST['medicine_name']) ? $_REQUEST['medicine_name'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, "user Id is required");
        $this->checkemptyvalue($medicine_name, "Medicine is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        if(strlen($medicine_name) >= 3)
        {
            $this->db->select('id as medicine_id,UPPER(name) as name,UPPER(company_name) as manufacture_name,UPPER(batch_no) as batch_no,UPPER(no_of_tablets) as no_of_tablets,UPPER(generic_name) as generic_name,UPPER(form_of_package) as form_of_package,expiray_date,created_at',false);
            $this->db->from('tbl_medicine');
            $this->db->like('name',strtolower($medicine_name));
            $this->db->where('is_medicine_drug','2');
            $this->db->order_by('name','asc');
            $data=$this->db->get()->result_array();
            if (count($data) > 0)
            {
                return $this->sendResponse($data, "All Medicine List");
            }
            else
            {
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
            }
        }
    }

    public function SerachMedicineWithOutDrug(){
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $medicine_name = isset($_REQUEST['medicine_name']) ? $_REQUEST['medicine_name'] : "";
        $this->checkemptyvalue($language_id, "language Id is required");
        $this->checkemptyvalue($userid, "user Id is required");
        $this->checkemptyvalue($medicine_name, "Medicine is required");
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->userexists($userid, $currendeviceid, $authtoken, $language_id);
        if(strlen($medicine_name) >= 3)
        {
            $this->db->select('id as medicine_id,UPPER(name) as name,UPPER(company_name) as manufacture_name,UPPER(batch_no) as batch_no,UPPER(no_of_tablets) as no_of_tablets,UPPER(generic_name) as generic_name,UPPER(form_of_package) as form_of_package,expiray_date,created_at',false);
            $this->db->from('tbl_medicine');
            $this->db->like('name',strtolower($medicine_name));
            $this->db->where('is_medicine_drug','1');
            $this->db->order_by('name','asc');
            $data=$this->db->get()->result_array();
            if (count($data) > 0)
            {
                return $this->sendResponse($data, "All Medicine List");
            }
            else
            {
                return $this->sendSuccessErrorResponseWithData($this->get_message_value_from_key($language_id, 'no_data_found'));
            }
        }
    }


    public function add_my_availability() {

        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : NULL;
        $type_id = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : NULL;
        $partner_id = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";


        $start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : NULL;
        $end_date = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : NULL;
        $days = isset($_REQUEST['days']) ? $_REQUEST['days'] : NULL;

        // $hour = isset($_REQUEST['hour']) ? $_REQUEST['hour'] : NULL;
        $times = isset($_REQUEST['times']) ? $_REQUEST['times'] : NULL;

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($partner_id, $this->get_message_value_from_key($language_id, 'userid_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        
        if($type_id == "2") {
            $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
        } else {
            $clinic_id = NULL;
        }

        $this->userexists($partner_id, $currendeviceid, $authtoken, $language_id);
       
        // check entery exist or not
        $data_or_not = $this->Api_model->check_my_avaiblity_exist_or_not($partner_id,$start_date,$end_date,$type_id,$clinic_id);
        

        if(count($data_or_not)>0){
            $tmp_array = array();
            $tmp_array[]['is_availalbity'] = '1';
            return $this->sendResponse($tmp_array, $this->get_message_value_from_key($language_id, 'already_set_this_for_annother_clinic'));
            exit;
        } else {


            $dates = $this->createDateRangeArray($start_date,$end_date);

            $days_arr = explode(',', $days);
           
            $available_date_arr = array();
            if(count($dates)>0) {
                foreach ($dates as $key => $value) {
                    $day = date('w',strtotime($value));
                    
                    if(in_array($day, $days_arr)) {
                        $available_date_arr[] = $value;
                    }
                }
            }

            $cd =  date('Y-m-d H:i:s');
            if(count($available_date_arr)>0) {
                foreach ($available_date_arr as $key => $value) {

                    $tmp_day = NULL;
                    $tmp_day = date('w',strtotime($value));

                    if($tmp_day != NULL) {

                        // get times for same day
                        if(isset($times[$tmp_day]) && !empty($times[$tmp_day])) {

                            $tmp_times = $times[$tmp_day];

                            $times_array = array();
                            $times_array = explode(',',$tmp_times);
                            if(count($times_array) > 0) {
                                foreach($times_array as $kk=>$vv) {

                                    // check record exist or not for other clinic or not
                                    
                                    $data_or_not = $this->Api_model->check_my_avaiblity_exit_or_not($partner_id,$value,$vv,$type_id);

                                    if(count($data_or_not) <= 0) {
                                        $tmp_array = array();
                                        $tmp_array['partner_id'] = $partner_id;
                                        $tmp_array['type_id'] = $type_id;
                                        $tmp_array['clinic_id'] = $clinic_id;
                                        $tmp_array['c_date'] = $value;
                                        $tmp_array['c_day'] = $tmp_day;
                                        $tmp_array['c_hour'] = $vv;
                                        $tmp_array['created_at'] = $cd;
                                        $tmp_array['updated_at'] = $cd;
                                        $user_details = $this->Common_model->data_insert('tbl_partners_availability', $tmp_array);
                                    } else if(count($data_or_not) > 0) {
                                        $tmp_array = array();
                                        $tmp_array[]['is_availalbity'] = '1';
                                        return $this->sendResponse($tmp_array, $this->get_message_value_from_key($language_id, 'already_set_this_for_annother_clinic'));
                                        exit;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            $tmp_array = array();
            $tmp_array[]['is_availalbity'] = '0';
            return $this->sendResponse($tmp_array, $this->get_message_value_from_key($language_id,'my_availability_save_successfully'));
            exit;
        }
    }

    function createDateRangeArray($strDateFrom,$strDateTo){
    
        $aryRange = [];
        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }

    public function get_my_availability() {

        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $current_date = isset($_REQUEST['current_date']) ? $_REQUEST['current_date'] : "";
        $type_id = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : NULL;

        if($type_id == "2") {
            $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
        } else {
            $clinic_id = NULL;
        }

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'userid_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($current_date, $this->get_message_value_from_key($language_id, 'current_date_is_required'));
        $this->checkemptyvalue($type_id, $this->get_message_value_from_key($language_id, 'type_id_is_required'));

        // check entery exist or not
        $data_or_not = $this->Api_model->get_my_avaiblity_single_day($userid,$current_date,$type_id,$clinic_id);
        // echo $this->db->last_query();
        // exit;
        
        if(count($data_or_not)>0){
            return $this->sendResponse($data_or_not, $this->get_message_value_from_key($language_id,'record_found'));
            exit;
        } else {
            $this->sendResponse([], $this->get_message_value_from_key($language_id, 'record_not_found'));
            exit;            
        }
    }

    public function add_single_my_availability() {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";

        $current_date = isset($_REQUEST['current_date']) ? $_REQUEST['current_date'] : "";
        $hour = isset($_REQUEST['hour']) ? $_REQUEST['hour'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : NULL;

        $type_id = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : "";

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'userid_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($current_date, $this->get_message_value_from_key($language_id, 'current_date_is_required'));
        $this->checkemptyvalue($type_id, $this->get_message_value_from_key($language_id, 'type_id_is_required'));

        if($type_id == "2") {
            $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
        } else {
            $clinic_id = NULL;
        }

        $hour_arr = explode(',', $hour);
        $cd =  date('Y-m-d H:i:s');
        // check entery exist or not
        if(isset($hour_arr) && count($hour_arr) > 0) {
            
            // remove existing data 
            if($type_id == "2" || $type_id == 0) {
                $deletequery = "DELETE FROM `tbl_partners_availability` WHERE `c_date`='".$current_date."' AND `type_id`='".$type_id."' AND `partner_id`='".$userid."' AND `clinic_id`='".$clinic_id."'";
            } else {
                $deletequery = "DELETE FROM `tbl_partners_availability` WHERE `c_date`='".$current_date."' AND `type_id`='".$type_id."' AND `partner_id`='".$userid."' ";
            }

            $dataaa = $this->db->query($deletequery);

            $save_or_not = 0;
            foreach ($hour_arr as $h_key => $h_value) {

                $data_or_not = $this->Api_model->check_my_avaiblity_exit_or_not($userid,$current_date,$h_value,$type_id);
               
                if(count($data_or_not) <= 0) {

                    $tmp_array = array();
                    $tmp_array['partner_id'] = $userid;
                    $tmp_array['clinic_id'] = $clinic_id;
                    $tmp_array['type_id'] = $type_id;
                    $tmp_array['c_date'] = $current_date;
                    $day = date('w',strtotime($current_date));
                    $tmp_array['c_day'] = $day;
                    $tmp_array['c_hour'] = $h_value;
                    $tmp_array['created_at'] = $cd;
                    $tmp_array['updated_at'] = $cd;

                    $this->load->model('Common_model');
                    $user_details = $this->Common_model->data_insert('tbl_partners_availability', $tmp_array);
                    $save_or_not = 1;
                } 
            }   
                
        }
        if($save_or_not == 1) {
            $tmp_array = array();
            $tmp_array[]['is_availalbity'] = '0';
            return $this->sendResponse($tmp_array, $this->get_message_value_from_key($language_id,'my_availability_save_successfully'));
        } else {
            $tmp_array = array();
            $tmp_array[]['is_availalbity'] = '1';
            return $this->sendResponse($tmp_array, $this->get_message_value_from_key($language_id,'already_set_this_for_annother_clinic'));
            exit;
        }
    }

    public function delete_single_my_availability() {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $availability_id = isset($_REQUEST['availability_id']) ? $_REQUEST['availability_id'] : "";

        $type_id = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : "";
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : NULL;

        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'userid_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($availability_id, $this->get_message_value_from_key($language_id, 'availability_id'));
        $this->checkemptyvalue($type_id, $this->get_message_value_from_key($language_id, 'type_id'));

        if($type_id == "2") {
            $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
        } else {
            $clinic_id = NULL;
        }
      

        $data_or_not = $this->Api_model->check_my_avaiblity_by_id($availability_id);
        
        if(count($data_or_not)>0){
            
            $current_date = $data_or_not[0]->c_date;

            $deletequery = "DELETE FROM tbl_partners_availability WHERE `id`='".$availability_id."' ";
            $dataaa = $this->db->query($deletequery);

            // check entery exist or not
            $get_data = $this->Api_model->get_my_avaiblity_single_day($userid,$current_date,$type_id,$clinic_id);
            if(count($get_data)>0){
                return $this->sendResponse($get_data, $this->get_message_value_from_key($language_id,'record_found'));
                exit;
            } else {
                $this->sendResponse([], $this->get_message_value_from_key($language_id, 'record_not_found'));
                exit;            
            }
        } else {
            $this->sendResponse([], $this->get_message_value_from_key($language_id, 'Please_try_again'));
            exit; 
        }
    }

    public function delete_my_availability() {
        $language_id = isset($_REQUEST['language_id']) ? $_REQUEST['language_id'] : "";
        $authtoken = isset($_REQUEST['authtoken']) ? $_REQUEST['authtoken'] : "";
        $currendeviceid = isset($_REQUEST['currendeviceid']) ? $_REQUEST['currendeviceid'] : "";
        $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "";
        $type_id = isset($_REQUEST['type_id']) ? $_REQUEST['type_id'] : "";
        // $start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : NULL;
        // $end_date = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : NULL;
        $clinic_id = isset($_REQUEST['clinic_id']) ? $_REQUEST['clinic_id'] : 0;

        
        $this->checkemptyvalue($language_id, "Language Id is required");
        $this->checkemptyvalue($userid, $this->get_message_value_from_key($language_id, 'userid_is_required'));
        $this->checkemptyvalue($authtoken, $this->get_message_value_from_key($language_id, 'auth_token_is_required'));
        $this->checkemptyvalue($currendeviceid, $this->get_message_value_from_key($language_id, 'current_deviceid_is_required'));
        $this->checkemptyvalue($type_id, $this->get_message_value_from_key($language_id, 'type_id_is_required'));
        // $this->checkemptyvalue($start_date, $this->get_message_value_from_key($language_id, 'start_date_is_required'));
        // $this->checkemptyvalue($end_date, $this->get_message_value_from_key($language_id, 'end_date_is_required'));

        if($type_id == "2") {
            $this->checkemptyvalue($clinic_id, $this->get_message_value_from_key($language_id, 'clinic_id_is_required'));
        } else {
            $clinic_id = NULL;
        }

        $data_or_not = $this->Api_model->check_my_avaiblity_type_linic_wise($userid,$type_id,$clinic_id);
      
        if(count($data_or_not)>0){
            
            foreach($data_or_not as $l=>$v) {
                $availability_id = $v->id;
                $deletequery = "DELETE FROM `tbl_partners_availability` WHERE `id`='".$availability_id."' ";
                $dataaa = $this->db->query($deletequery);
            }

            $get_data = $this->Api_model->check_my_avaiblity_type_linic_wise($userid,$type_id,$clinic_id);
            return $this->sendResponse($get_data, $this->get_message_value_from_key($language_id,'record_deleted'));
            exit;

        } else {
            $this->sendResponse([], $this->get_message_value_from_key($language_id, 'record_not_deleted'));
            exit; 
        }
    }
}