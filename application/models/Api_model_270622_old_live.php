<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function get_appsetting(){
        $q="SELECT * FROM tbl_app_setting WHERE id='1'";
        return $this->db->query($q)->row_array();
       
    }
    public function get_all_countries(){
        $query = "SELECT * FROM `tbl_countries` ORDER BY name ASC";       
        $row = $this->db->query($query)->result();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    public function get_all_states($country_id){
        $query = "SELECT * FROM `tbl_states` WHERE country_id='".$country_id."'";       
        $row = $this->db->query($query)->result();
        if($row){
            return $row;
        } else {
            return false;
        }
    }

    public function get_all_cities($state_id){
        $query = "SELECT * FROM `tbl_cities` WHERE state_id='".$state_id."'";       
        $row = $this->db->query($query)->result();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    public function get_all_laungage_labels_by_id($language_id){
        $query = "SELECT `label_key`,`title` FROM `tbl_lable` WHERE `language_id`='".$language_id."' ORDER BY `tbl_lable`.`id` ASC";
        $row = $this->db->query($query)->result();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    public function get_all_laungage_message_by_id($language_id){
        $query = "SELECT `message_key`,`title` FROM `tbl_message` WHERE `language_id`='".$language_id."' ORDER BY `tbl_message`.`id` ASC";
        $row = $this->db->query($query)->result();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    public function get_contact_us(){
        $query = "SELECT id,address,latitude,longitude,contact_email,contact_no,work_hours FROM `tbl_site_setting` WHERE `id`='1' ";
        return $this->db->query($query)->row_array();
    }
    public function check_partner_email_exist($email,$category){
        $query = "SELECT * FROM `tbl_partners` WHERE `email`='".$email."' AND `category`='".$category."' ";
        $row = $this->db->query($query)->result();
        return $count = count($row);
    }

    public function check_my_avaiblity_exist_or_not($partner_id,$start_date=NULL,$end_date=NULL,$type_id,$clinic_id){
        $where = "";
        if(isset($start_date) && isset($end_date)) {
            $where .= "  AND `c_date` BETWEEN '".$start_date."' AND '".$end_date."'  ";
        }
        
        if($type_id == "2" || $type_id==2) {
            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `type_id`='".$type_id."' AND `clinic_id`='".$clinic_id."'  $where ORDER BY `c_date` ASC";
        } else {
            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `type_id`='".$type_id."' $where ORDER BY `c_date` ASC";
        }

        $row = $this->db->query($query)->result();
        return $row;
    }

    public function get_my_avaiblity_single_day($partner_id,$date,$type_id=NULL,$clinic_id=NULL){

    if($type_id == "0") {
        $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `c_date`='".$date."' AND `type_id`='".$type_id."' ORDER BY `c_hour` ASC";

    } else if($type_id == "2") {
        $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `c_date`='".$date."' AND `type_id`='".$type_id."' AND `clinic_id`='".$clinic_id."' ORDER BY `c_hour` ASC";
    } else {
        $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `c_date`='".$date."' ORDER BY `c_date` ASC";
    }
        $row = $this->db->query($query)->result();
        return $row;
    }

    public function check_my_avaiblity_exit_or_not($partner_id,$current_date,$h_value,$type_id){
        $where = "";
        $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$partner_id."' AND `c_date`='".$current_date."' AND `c_hour`='".$h_value."' AND `type_id`='".$type_id."' ORDER BY `c_hour` ASC";
        $row = $this->db->query($query)->result();
        return $row;
    }

    

    // public function check_my_avaiblity_exit_or_not_with_date_time_type($userid,$current_date,$c_hour,$type_id){

    //     $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$userid."' AND `c_date`='".$current_date."' AND `c_hour`='".$c_hour."' AND `type_id`='".$type_id."' ORDER BY `c_hour` ASC";
    //     $row = $this->db->query($query)->result();
    //     return $row;
    // }



    public function check_my_avaiblity_type_date_clinic_wise($userid,$start_date,$end_date,$type_id,$clinic_id){
        
        if($type_id=="2") {

            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$userid."'  AND `c_date` BETWEEN '".$start_date."' AND '".$end_date."'  AND `type_id`='".$type_id."' AND `clinic_id`='".$clinic_id."'  ORDER BY `c_hour` ASC";
        } else {

            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$userid."'  AND `c_date` BETWEEN '".$start_date."' AND '".$end_date."'  AND `type_id`='".$type_id."' ORDER BY `c_hour` ASC";
        }
        $row = $this->db->query($query)->result();
        return $row;
    }

    public function check_my_avaiblity_type_linic_wise($userid,$type_id,$clinic_id){
        
        if($type_id=="2") {

            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$userid."'  AND `type_id`='".$type_id."' AND `clinic_id`='".$clinic_id."'  ORDER BY `c_hour` ASC";
        } else if($type_id =="0") {
            $query = "SELECT * FROM `tbl_partners_availability` WHERE `partner_id`='".$userid."' AND `type_id`='".$type_id."' ORDER BY `c_hour` ASC";
        }
        $row = $this->db->query($query)->result();
        return $row;
    }

    public function check_my_avaiblity_by_id($id){
        $where = "";
        $query = "SELECT * FROM `tbl_partners_availability` WHERE `id`='".$id."'";
        $row = $this->db->query($query)->result();
        return $row;
    }

    public function check_partner_mobile_exists($phonecode,$mobile,$category){
        $query = "SELECT * FROM `tbl_partners` WHERE `country_code`='".$phonecode."' AND `contact_no`='".$mobile."' AND `category`='".$category."' ";
        $row = $this->db->query($query)->result();
        return $row;
    }
    public function check_partner_social_id_exists($social_id,$category){
        $query = "SELECT * FROM `tbl_partners` WHERE `social_id`='".$social_id."'  AND `category`='".$category."' ";
        $row = $this->db->query($query)->result_array();
        return $row;
    }
    public function get_all_data_partners($category_type,$id)
    {
        if($category_type == 8)
        {
            $query="SELECT id,register_type,category,name,email,contact_no,dob,gender,country_code,org_password,password,address,pincode,city,state,country,latitude,longitude,description,profile,address_proof,status_by_admin,is_fill_profile,is_notification,is_verifyotp,social_id,quickblox_name,account_name,account_no,created_at,updated_at,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,is_update_fees FROM tbl_partners WHERE id='".$id."'";
        }else{
            $query="SELECT id,register_type,category,email,name,contact_no,dob,gender,speciality as speciality_id,(SELECT title FROM tbl_services WHERE id=tbl_partners.speciality) as speciality_name,country_code,org_password,password,address,pincode,city,state,country,latitude,longitude,description,profile,address_proof,IF(pan !='',pan,adharcard_no) as IDProof_no,IF(pan !='',2,1) as IDProof_type,pancard as IDProof_image,
            degree_certificate as qualification_image,ug_college as qualification_clg_name,ug_course as qualification_name,ug_speciality as qualification_specility,ug_uni as qualification_uni_name,ug_year as qualification_year,ug_mci as  registration_name,ug_reg_no as  registration_no,ug_mci_year as registration_year,ug_certificate as qualification_image,ug_mci_certificate as registration_image,work_exp,status_by_admin,is_verifyotp,is_fill_profile,is_online,is_homevisit,is_notification,social_id,quickblox_name,created_at,updated_at,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,digital_sign,account_name,account_no,is_update_fees FROM tbl_partners WHERE id='".$id."'";
        }
        return $this->db->query($query)->row();
    }
    public function get_all_data_partners_visit($category_type,$id)
    {
        $query="SELECT id,home_visit_main_amt,home_visite_admin_amt,online_visit_main_amt,online_visite_admin_amt,home_visit_tds_fees,online_visit_tds_fees,total_homevist_amt,total_onlinevist_amt FROM tbl_partners WHERE id='".$id."' AND category='".$category_type."' ";
        return $this->db->query($query)->row_array();
    }
    public function current_device_token($customerid,$devicetokenid)
    {
        $query="SELECT * FROM  tbl_partner_device WHERE partner_id='".$customerid."' AND id='".$devicetokenid."'";
        return $this->db->query($query)->row();
    }
    public function checkexistsuser($id,$deviceid,$authtoken)
    {
        $query="SELECT * FROM tbl_partner_device WHERE `partner_id`='".$id."' AND id='".$deviceid."' AND authtoken='".$authtoken."'";
        return $this->db->query($query)->num_rows();
    }
    public function checkuser($id,$category_type)
    {
        $query="SELECT * FROM tbl_partners WHERE `id`='".$id."' AND category='".$category_type."' ";
        return $this->db->query($query)->num_rows();
    }
    
    public function partner_login_with_email($category,$email,$password)
    {
        $query="SELECT * FROM tbl_partners WHERE email='".$email."' AND password='".$password."' AND `category`='".$category."'";
        return $this->db->query($query)->row_array();
    }
    public function check_partner_password_match($id,$oldpwd)
    {
        $query = "SELECT * FROM `tbl_partners` WHERE `org_password`='".$oldpwd."' AND `id`='".$id."' ";
        $row = $this->db->query($query)->result();
        return $count = count($row);
    }
    public function get_cms_pages_by_id($id)
    {
        if($id == 1 || $id == '1'){
            $query="SELECT id,title,our_goal_hn,our_goal_app as our_goal,our_mission_hn,our_mission_app as our_mission,our_vision_hn,our_vision_app as our_vision,desc_hn,desc_app as description,created_date,updated_at,file FROM tbl_cms WHERE id='".$id."'";   
        }else{
            $query="SELECT id,title,our_goal_hn,our_goal_app as our_goal,our_mission_hn,our_mission_app as our_mission,our_vision_hn,our_vision_app as our_vision,desc_hn,desc_web as description,created_date,updated_at,file FROM tbl_cms WHERE id='".$id."'"; 
        }
        return $this->db->query($query)->row_array(); 
    }
    public function check_partner_email_exists_withid($email,$id,$category)
    {
        $query = "SELECT * FROM `tbl_partners` WHERE `email`='".$email."' AND `category`='".$category."' AND `id`!='".$id."' ";
        $row = $this->db->query($query)->result();
        return $count = count($row);
    }
    public function check_partner_mobile_exists_withid($phonecode,$mobile,$id,$category)
    {
        $query = "SELECT * FROM `tbl_partners` WHERE country_code='".$phonecode."' AND `contact_no`='".$mobile."' AND `category`='".$category."' AND `id`!='".$id."' ";
        $row = $this->db->query($query)->result();
        return $count = count($row);
    }
    public function get_nearest_partner_devicetokens($consultation_type,$latitude,$longitude,$healthcare_id,$healthcare_subid)
    {
        // $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        // $this->db->from('tbl_partner_device');
        // $this->db->join('tbl_partners', 'tbl_partners.id = tbl_partner_device.partner_id', 'left');
        // $this->db->where('tbl_partner_device.partner_id', $userid);
        // return $this->db->get()->row_array();
        
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        if($consultation_type == 1){
            $this->db->select("111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) AS `distance_in_km`",false);    
        }
        $this->db->from('tbl_partners');
        $this->db->join('tbl_partner_device', 'tbl_partners.id = tbl_partner_device.partner_id', 'left');
        $this->db->where('tbl_partners.category',$healthcare_id);
        if($healthcare_subid != ''){
            $this->db->where('speciality',$healthcare_subid);   
        }
        if($consultation_type == 1){
            $this->db->where('tbl_partners.is_homevisit','1');    
            $this->db->where('tbl_partners.home_visit_main_amt >',0);    
        }
        if($consultation_type == 0){
            $this->db->where('is_online','1');   
            $this->db->where('tbl_partners.online_visit_main_amt >',0);    
        }
        $this->db->where('tbl_partners.status','1');
        $this->db->where('status_by_admin','1');
        $this->db->where('tbl_partner_device.device_type','A');
        if($consultation_type == 1){
            $this->db->having('distance_in_km < 30');
            $this->db->order_by("distance_in_km", "ASC");
        }
        
        return $this->db->get()->row_array();
    }
    public function get_reinitiate_partner_devicetokensIOS($userid,$partner_id)
    {
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        $this->db->from('tbl_partner_device');
        $this->db->where('partner_id',$partner_id);
        $this->db->where('tbl_partner_device.device_type','I');
        return $this->db->get()->row_array();
    }
    public function get_reinitiate_partner_devicetokensAnroid($userid,$partner_id)
    {
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        $this->db->from('tbl_partner_device');
        $this->db->where('partner_id',$partner_id);
        $this->db->where('tbl_partner_device.device_type','A');
        return $this->db->get()->row_array();
    }
    public function get_nearest_partner_devicetokensIOS($consultation_type,$latitude,$longitude,$healthcare_id,$healthcare_subid)
    {
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        if($consultation_type == 1){
            $this->db->select("111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) AS `distance_in_km`",false);    
        }
        $this->db->from('tbl_partners');
        $this->db->join('tbl_partner_device', 'tbl_partners.id = tbl_partner_device.partner_id', 'left');
        $this->db->where('tbl_partners.category',$healthcare_id);
        if($healthcare_subid != ''){
            $this->db->where('speciality',$healthcare_subid);   
        }
        if($consultation_type == 1){
            $this->db->where('tbl_partners.is_homevisit','1');    
            $this->db->where('tbl_partners.home_visit_main_amt >',0);    
        }
        if($consultation_type == 0){
            $this->db->where('is_online','1');   
            $this->db->where('tbl_partners.online_visit_main_amt >',0);    
        }
        $this->db->where('tbl_partners.status','1');
        $this->db->where('status_by_admin','1');
        $this->db->where('tbl_partner_device.device_type','I');
        if($consultation_type == 1){
            $this->db->having('distance_in_km < 30');
            $this->db->order_by("distance_in_km", "ASC");
        }
        return $this->db->get()->row_array();
    }


    public function get_nearest_doctors_list($consultation_type,$latitude,$longitude,$healthcare_id,$healthcare_subid)
    {
        $this->db->select('tbl_partners.id,tbl_partners.name,email,country_code,contact_no,tbl_partners.category,address,city,state,country,pincode,latitude,longitude,speciality as  speciality_id,profile,home_visit_main_amt,online_visit_main_amt,quickblox_name',false);
        $this->db->select('tbl_services.title as speciality_name');
        $this->db->select('tbl_countries.name as country_name');
        $this->db->select('tbl_states.name as state_name');
        $this->db->select('tbl_cities.name as city_name');
        if($consultation_type == 1)
        {
            $this->db->select("111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) AS `distance_in_km`",false);    
        }
        $this->db->from('tbl_partners');
        $this->db->join('tbl_countries', 'tbl_countries.id = tbl_partners.country', 'left');
        $this->db->join('tbl_states', 'tbl_states.id = tbl_partners.state', 'left');
        $this->db->join('tbl_cities', 'tbl_cities.id = tbl_partners.city', 'left');
        $this->db->join('tbl_services', 'tbl_services.id = tbl_partners.speciality','left');
        $this->db->where('tbl_partners.category',$healthcare_id);
        if($healthcare_subid != ''){
            $this->db->where('speciality',$healthcare_subid);   
        }
        
        if($consultation_type == 1)
        {
            //print_r($consultation_type);die;
            $this->db->where('tbl_partners.is_homevisit','1');    
            $this->db->where('tbl_partners.home_visit_main_amt >',0);    
        }
        if($consultation_type == 0){
            $this->db->where('is_online','1');   
            $this->db->where('tbl_partners.online_visit_main_amt >',0);    
   
        }
        $this->db->where('tbl_partners.status','1');
        $this->db->where('status_by_admin','1');
        if($consultation_type == 1)
        {
            $this->db->having('distance_in_km < 30');
            $this->db->order_by("distance_in_km", "ASC");
        }
        return $this->db->get()->result_array();
    }
    
    public function get_nearest_doctors_list_kunj_new($consultation_type,$latitude,$longitude,$healthcare_id,$healthcare_subid,$appointment_date=NULL,$appointment_time=NULL,$clinic_id=NULL)
    {
        $this->db->select('tbl_partners.id,tbl_partners.name,email,country_code,contact_no,tbl_partners.category,tbl_partners.is_clinic,address,city,state,country,pincode,latitude,longitude,speciality as  speciality_id,profile,home_visit_main_amt,online_visit_main_amt,quickblox_name',false);
        $this->db->select('tbl_services.title as speciality_name');
        $this->db->select('tbl_countries.name as country_name');
        $this->db->select('tbl_states.name as state_name');
        $this->db->select('tbl_cities.name as city_name');

        // if($consultation_type == 0 || $consultation_type == 2)
        // {
        //     $this->db->select('tbl_partners_availability.c_date');
        //     $this->db->select('tbl_partners_availability.c_hour');
        //     $this->db->select('tbl_partners_availability.clinic_id');
        // }

        if($consultation_type == 1)
        {
            $this->db->select("111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) AS `distance_in_km`",false);    
        }
        $this->db->from('tbl_partners');
        $this->db->join('tbl_countries', 'tbl_countries.id = tbl_partners.country', 'left');
        $this->db->join('tbl_states', 'tbl_states.id = tbl_partners.state', 'left');
        $this->db->join('tbl_cities', 'tbl_cities.id = tbl_partners.city', 'left');
        $this->db->join('tbl_services', 'tbl_services.id = tbl_partners.speciality','left');

        // if($consultation_type == 0 || $consultation_type == 2)
        // {
        //     $this->db->join('tbl_partners_availability', 'tbl_partners_availability.partner_id = tbl_partners.id','left');
        //     if(isset($appointment_date) && !empty($appointment_date)) {
        //         $this->db->where('tbl_partners_availability.c_date',$appointment_date);   
        //     }

        //     if(isset($appointment_time) && !empty($appointment_time)) {
        //         $this->db->where('tbl_partners_availability.c_hour',$appointment_time);   
        //     }

        //     $this->db->where('tbl_partners_availability.type_id',$consultation_type);   

        //     if(isset($clinic_id) && !empty($clinic_id) && ($consultation_type == 2 || $consultation_type == '2')) {
        //         $this->db->where('tbl_partners_availability.clinic_id',$clinic_id);   
        //     }
        // }

        $this->db->where('tbl_partners.category',$healthcare_id);
        // $this->db->where('tbl_services.id',$healthcare_id);
        if($healthcare_subid != ''){
            $this->db->where('speciality',$healthcare_subid);   
        }
        
        if($consultation_type == 1)
        {
            //print_r($consultation_type);die;
            $this->db->where('tbl_partners.is_homevisit','1');    
            $this->db->where('tbl_partners.home_visit_main_amt >',0);    
        }
        if($consultation_type == 0){
            $this->db->where('is_online','1');   
            $this->db->where('tbl_partners.online_visit_main_amt >',0);    
        }

        // if($consultation_type == 2){
        //     $this->db->where('is_clinic','1');   
        // }

        $this->db->where('tbl_partners.status','1');
        $this->db->where('status_by_admin','1');
        
        if($consultation_type == 1)
        {
            $this->db->having('distance_in_km < 30');
            $this->db->order_by("distance_in_km", "ASC");
        }
        return $this->db->get()->result_array();
    }

    // public function get_online_consultation_list($healthcare_id,$healthcare_subid)
    // {
    //     $this->db->select('id,name,category,address,city,state,country',false);
        
    //     $this->db->from('tbl_partners');
    //     $this->db->where('category',$healthcare_id);
    //     if($healthcare_subid != ''){
    //         $this->db->where('speciality',$healthcare_subid);   
    //     }
    //     $this->db->where('is_online','1');
    //     $this->db->where('status','1');
    //     $this->db->where('status_by_admin','1');
        
    //     return $this->db->get()->result_array();
    //     // $query = "SELECT id,register_type,category,email,contact_no,dob,gender,country_code,org_password,password,address,pincode,city,state,country,latitude,longitude,profile,address_proof,pan,pancard,adharcard,adharcard_no,degree_certificate,ug_college,ug_course,ug_speciality,ug_uni,ug_year,
    //     //     ug_mci,ug_reg_no,ug_mci_year,ug_certificate,ug_mci_certificate,work_exp,status_by_admin,is_fill_profile,social_id,created_at,updated_at FROM `tbl_partners` WHERE `category`='".$healthcare_id."' AND `is_online`='1' AND  status_by_admin= '1' AND `status`='1' ";
    //     // return $this->db->query($query)->result_array();
    // }
    public function get_store_wise_medicines()
    {
        $query = "SELECT * FROM `tbl_store_wise_medicines` WHERE status='1'";
        return $this->db->query($query)->result_array();
    }
    public function get_medicine_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT t1.*,t1.batch_no as store_batch_no,t2.generic_name,t2.company_name FROM `tbl_store_wise_medicines` AS t1 LEFT JOIN tbl_medicine as t2 ON t2.id=t1.medicine_id  WHERE t1.medicine_id = '" . $id . "'AND t1.partner_id = '" . $partnerId . "' limit 1");
        return $q->row_array();
    }
    public function get_pathologytest_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_test_pathology_wise` WHERE `test_id` = '" . $id . "'AND `partner_id` = '" . $partnerId . "' limit 1");
        return $q->row_array();
    }
    function get_radiotest_by_id($id,$partnerId) {
        $q = $this->db->query("SELECT * FROM `tbl_report_radiology_wise` LEFT JOIN tbl_report_radiology ON tbl_report_radiology.id=tbl_report_radiology_wise.test_id WHERE `test_id` = '" . $id . "'AND `partner_id` = '" . $partnerId . "' limit 1");
        return $q->row_array();
    } 
    public function get_medicine_list_by_id()
    {
        $query = "SELECT id,language_id,category,store_name,name,email,contact_no,country_code,address,map_link,city,state,country,latitude,longitude,profile,created_at,updated_at,batch_no FROM `tbl_partners` WHERE status='1' AND `category`='1'  AND `status_by_admin`='1' AND `is_fill_profile`='1'";
        return $this->db->query($query)->result_array();
    }
    public function get_medicine_list($language_id) {
        if($language_id == 1){
         $q = $this->db->query("SELECT id as medicine_id,name,company_name as manufacture_name,batch_no,no_of_tablets,generic_name,form_of_package,expiray_date,created_at FROM `tbl_medicine` ORDER BY name ASC ");   
        }else{
            $q = $this->db->query("SELECT id as medicine_id,name_hn as name,company_name_hn as manufacture_name,batch_no,no_of_tablets,generic_name_hn as generic_name,form_of_package,expiray_date,created_at FROM `tbl_medicine` ORDER BY name ASC ");
        }
        return $q->result_array();
    }

    public function get_all_address_by_partner($id,$category){
        $query = "SELECT * FROM `tbl_partners_address` WHERE partner_id='".$id."' AND `category`='".$category."' ";
        return $this->db->query($query)->result_array();
    }

    public function get_all_clinic_by_partner($healthcare_id,$healthcare_subid){

        if(isset($healthcare_subid) && !empty($healthcare_subid)) {
            $query = "SELECT t1.id,t1.speciality,t2.* FROM `tbl_partners` AS t1 LEFT JOIN `tbl_partners_address` AS t2 ON t1.id=t2.partner_id WHERE t2.category='".$healthcare_id."' AND t1.speciality='".$healthcare_subid."' ORDER BY t2.clinic_name ASC";
        } else {
            $query = "SELECT t1.id,t2.* FROM `tbl_partners` AS t1 LEFT JOIN `tbl_partners_address` AS t2 ON t1.id=t2.partner_id WHERE t2.category='".$healthcare_id."' ORDER BY t2.clinic_name ASC";
        }
        return $this->db->query($query)->result_array();
    }


    public function check_table_empty($category)
    {
        if($category == 1){
           $q=$this->db->query("SELECT id FROM `tbl_store_wise_medicines`");
        }else if($category == 2){
            $q=$this->db->query("SELECT id FROM `tbl_test_pathology_wise`");
        }else if($category == 3){
            $q=$this->db->query("SELECT id FROM `tbl_report_radiology_wise`");
        }
       return $q->num_rows();
    }
    public function get_pharmcy_store($medicine,$medicineqty,$latitude,$longitude,$is_homesample,$timing_wiseCount)
    {
        $finalarray = array();
       
        for($i = 0; $i < count($medicine); $i++){
            $medQty = (int)$medicineqty[$i];
          
            $query = "SELECT GROUP_CONCAT(partner_id)as partner_id FROM `tbl_store_wise_medicines` WHERE medicine_id = '".$medicine[$i]."' AND `status`='1' AND `stock` >= '".$medicineqty[$i]."' AND tbl_store_wise_medicines.`partner_id` IN ($timing_wiseCount)";
           
           $row = $this->db->query($query)->row_array();
             if(!empty($row['partner_id']) || $row['partner_id'] != ''){
                array_push($finalarray,explode(',',$row['partner_id']));
           }
        }

     
        $result_partners = 0;
        
        if(!empty($finalarray))
        {
            if(count($finalarray) > 1)
            {
                if(count($medicine) > 1)
                {
                    $result = call_user_func_array('array_intersect',$finalarray);
                    $result_partners = implode(",",$result);  
                }
                else
                {
                    $result_partners = $finalarray[0][0];
                }    
            }
            else
            {
                $result_partners = implode(",",$finalarray[0]);
                
            }
        }
        if($is_homesample == 1)
        {
            $query1 = "SELECT id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.delivery_charge as delivery_charge,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,is_homesample,open_timing FROM tbl_partners WHERE tbl_partners.id IN ($result_partners) AND `is_homesample`='".$is_homesample."' AND tbl_partners.status='1'";   
        }
        else
        {
          
            $query1 = "SELECT tbl_partners.id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.delivery_charge as delivery_charge,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,is_homesample FROM tbl_partners WHERE tbl_partners.id IN ($result_partners) AND tbl_partners.status='1'";
        }

      
        return $this->db->query($query1)->result_array();
    }
    public function get_count_store_medicines($count,$latitude,$longtitude)
    {
       
       $query = "SELECT partner_id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,sum(qty * saleprice) as total_sale_amount,sum(qty * mrp) as total_taxable_amount,sum(qty * discount) as total_discount_amount,sum(qty * gst) as total_gst_amount,sum(qty * total) as total_final_amount,tbl_partners.delivery_charge as delivery_charge,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longtitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km FROM tbl_temp_store LEFT JOIN tbl_partners ON tbl_partners.id=tbl_temp_store.partner_id  GROUP BY partner_id HAVING COUNT(partner_id) >= '".$count."' ";
       
       return $this->db->query($query)->result_array();   
    }
    public function get_test_list($language_id) {
        if($language_id == 1 || $language_id == '1'){
            $q = $this->db->query("SELECT id as test_id,name,description,created_at FROM `tbl_test_pathology` ORDER BY name ASC ");    
        }else{
            $q = $this->db->query("SELECT id as test_id,name_hn as name,description_hn as description,created_at FROM `tbl_test_pathology` ORDER BY name ASC ");
        }
        return $q->result_array();
    }
    public function get_diagnostics_test_list($language_id) {
        if($language_id == 1 || $language_id == '1'){
            $q = $this->db->query("SELECT id as test_id,name,description,Null as category,created_at FROM tbl_test_pathology UNION SELECT id as test_id,name,description,category,created_at FROM tbl_report_radiology"); 

        }else{
            $q = $this->db->query("SELECT id as test_id,name_hn as name,description_hn as description,Null as category,created_at FROM tbl_test_pathology UNION SELECT id as test_id,name_hn as name,category,description_hn as description,category_hn as category,created_at FROM tbl_report_radiology");
        }
        return $q->result_array();
    }
    
    public function get_provisional_test_list($language_id) {
        if($language_id == 1 || $language_id == '1'){
            $q = $this->db->query("SELECT id as test_id,name,description,created_at FROM `tbl_provisional_test` ORDER BY name ASC ");    
        }else{
            $q = $this->db->query("SELECT id as test_id,name_hn as name,description_hn as description,created_at FROM `tbl_provisional_test` ORDER BY name ASC ");
        }
        return $q->result_array();
    }
    
    public function get_pathology($test,$latitude,$longitude,$is_homesample,$timing_wiseCount)
    {
        $finalarray = array();
        for($i = 0; $i < count($test); $i++){
        
           $query = "SELECT GROUP_CONCAT(partner_id)as partner_id  FROM `tbl_test_pathology_wise` WHERE test_id = '".$test[$i]."' AND tbl_test_pathology_wise.partner_id IN ($timing_wiseCount)";
           $row = $this->db->query($query)->row_array();
           if(!empty($row['partner_id']) || $row['partner_id'] != ''){
                array_push($finalarray,explode(',',$row['partner_id']));
            }
        }
        $result_partners = 0;

        $test_ids = implode(",",$test);
        if(!empty($finalarray)){
            if(count($test) > 1){
                $result = call_user_func_array('array_intersect',$finalarray);
                $result_partners = implode(",",$result);  
            }else{
                $result_partners = $finalarray[0];
                $result_partners = implode(",",$result_partners);
            }
        }
        // print_r($is_homesample);die;
        if($is_homesample == 1){
            $query1 = "SELECT id,tbl_partners.store_name,open_timing,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,(SELECT sum(sale_price) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_sale_amount,(SELECT sum(mrp) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_taxable_amount ,(SELECT sum(discount) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_discount_amount,(SELECT sum(gst) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_gst_amount,(SELECT sum(total) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_total_amount,tbl_partners.delivery_charge as delivery_charge,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,is_homesample FROM tbl_partners WHERE tbl_partners.id IN ($result_partners) AND `is_homesample`='".$is_homesample."' AND tbl_partners.status='1'";   
        } else {
            $query1 = "SELECT tbl_partners.id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,open_timing,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.delivery_charge as delivery_charge,(SELECT sum(sale_price) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_sale_amount,(SELECT sum(mrp) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_taxable_amount ,(SELECT sum(discount) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_discount_amount,(SELECT sum(gst) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_gst_amount,(SELECT sum(total) FROM tbl_test_pathology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_total_amount,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,is_homesample FROM tbl_partners WHERE tbl_partners.id IN ($result_partners) AND tbl_partners.status='1'";
        }
        return $this->db->query($query1)->result_array();
    }
    public function get_radiology_test_list($language_id) {
        if($language_id == 1 || $language_id == '1'){
            $q = $this->db->query("SELECT id as test_id,name,description,category,created_at FROM `tbl_report_radiology` ORDER BY name ASC ");    
        }else{
            $q = $this->db->query("SELECT id as test_id,name_hn as name,description_hn as description,category_hn as category,created_at FROM `tbl_report_radiology` ORDER BY name ASC ");
        }
        return $q->result_array();
    }
    
    public function get_count_lab_pathology($count,$latitude,$longtitude)
    {
       $query = "SELECT partner_id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.is_homesample,tbl_partners.amount as delivery_charge,sum(sale_price) as total_sale_amount,sum(mrp) as total_taxable_amount,sum(discount) as total_discount_amount,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longtitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km  FROM tbl_temp_test_store LEFT JOIN tbl_partners ON tbl_partners.id=tbl_temp_test_store.partner_id  GROUP BY partner_id HAVING COUNT(partner_id) >= '".$count."'  ";
       return $this->db->query($query)->result_array();   
    }
    public function get_payment_history_by_patient($patient_id) {
        $q = $this->db->query("SELECT id,category,partner_id,patient_id,name,gender,age,main_amount as fees,payment_id,order_status,appointment_status,customorder_id as order_id,created_at FROM `tbl_order` WHERE patient_id = '".$patient_id."' ORDER BY id DESC ");
        return $q->result_array();
    }
    // public function get_my_earning_by_category($partner_id,$category_type) {
    //     $q = $this->db->query("SELECT id,partner_id,patient_id,name,gender,age,main_amount as fees,payment_id,order_status,appointment_status,customorder_id as order_id,created_at FROM `tbl_order` WHERE partner_id = '".$partner_id."' AND category = '".$category_type."' ORDER BY id DESC ");
    //     return $q->result_array();
    // }
    public function get_my_patients_by_category($partner_id,$category_type) {
        $q = $this->db->query("SELECT tbl_order.id,patient_id,name,gender,age,main_amount as fees,tbl_order.payment_id,consulation_type,appointment_status,payment_status,customorder_id as appointment_id,tbl_order.created_at FROM `tbl_order` LEFT JOIN tbl_payment_history ON tbl_order.id=tbl_payment_history.order_no WHERE partner_id = '".$partner_id."' AND category = '".$category_type."' ORDER BY id DESC ");
        return $q->result_array();
    }
    public function get_total_earning($partner_id) {
        $q = $this->db->query("SELECT partner_id,category,SUM(main_amount) as total
        FROM tbl_order GROUP BY partner_id HAVING partner_id='".$partner_id."'");
        return $q->row_array();
    }
    public function get_patient_details_by_id($id,$partner_id) {
        $q = $this->db->query("SELECT tbl_order.id,category as healthcare_id,healthcare_sub_id,patient_id,name,address,latitude, longitude,gender,age,height,weight,symptoms,main_amount as fees,treatment_hours,tbl_order.payment_id,appointment_status,payment_status,patient_realative,consulation_type,customorder_id as appointment_id,tbl_order.created_at FROM `tbl_order` LEFT JOIN tbl_payment_history ON tbl_order.id=tbl_payment_history.order_no WHERE partner_id = '".$partner_id."' AND tbl_order.id = '".$id."' ");
        return $q->row_array();
    }

    public function get_report_list() {
        $q = $this->db->query("SELECT * FROM `tbl_report_radiology` ORDER BY name ASC ");
        return $q->result_array();
    }

    public function get_radiology($test,$latitude,$longitude,$timing_wiseCount)
    {
        $finalarray = array();
        for($i = 0; $i < count($test); $i++){
        
            $query = "SELECT GROUP_CONCAT(partner_id)as partner_id  FROM `tbl_report_radiology_wise` WHERE test_id = '".$test[$i]."' AND tbl_report_radiology_wise.partner_id IN ($timing_wiseCount)";
           $row = $this->db->query($query)->row_array();

           if(!empty($row['partner_id']) || $row['partner_id'] != ''){
                array_push($finalarray,explode(',',$row['partner_id']));
            }
        }

        $result_partners = 0;
        $test_ids = implode(",",$test);
        
        if(!empty($finalarray)){
            if(count($test) > 1){
                echo "JEJEJE";
                $result = call_user_func_array('array_intersect',$finalarray);
                $result_partners = implode(",",$result);  
            }else{
                // $result_partners = $finalarray[0][0];
                
                $result_partners = implode(",", $finalarray[0]);
                
            }    
        }
     
        //print_r($test_ids);die;
           $query1 = "SELECT tbl_partners.id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,open_timing,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.delivery_charge as delivery_charge,(SELECT sum(sale_price) FROM tbl_report_radiology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_sale_amount,(SELECT sum(mrp) FROM tbl_report_radiology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_taxable_amount ,(SELECT sum(discount) FROM tbl_report_radiology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_discount_amount,(SELECT sum(gst) FROM tbl_report_radiology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_gst_amount,(SELECT sum(total) FROM tbl_report_radiology_wise WHERE partner_id=tbl_partners.id AND test_id IN ($test_ids)) as total_total_amount,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,is_homesample FROM tbl_partners WHERE tbl_partners.id IN ($result_partners) AND tbl_partners.status='1'";
        
        return $this->db->query($query1)->result_array();
    }
    public function get_count_lab_radiology($count,$latitude,$longtitude)
    {
       $query = "SELECT partner_id,tbl_partners.store_name,tbl_partners.email,tbl_partners.contact_no,tbl_partners.address,tbl_partners.address,tbl_partners.city,tbl_partners.state,tbl_partners.country,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,sum(sale_price) as total_sale_amount,sum(mrp) as total_taxable_amount,sum(discount) as total_discount_amount,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longtitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km  FROM tbl_temp_radiology_store LEFT JOIN tbl_partners ON tbl_partners.id=tbl_temp_radiology_store.partner_id  GROUP BY partner_id HAVING COUNT(partner_id) >= '".$count."' ";
       return $this->db->query($query)->result_array();   
    }

    public function get_history_by_patient($patient_id,$category,$order_status)
    {
        // if($category == 1)
        // {
            //$query = "SELECT tbl_order.id,(SELECT store_name FROM tbl_partners WHERE partner_id=tbl_partners.id) as pharmcystore ,tbl_order.patient_id,name,gender,country_code,mobile_no,address,main_amount,discount_amount,gst_amount,final_amount,tbl_order.payment_id,reference_doctor,delivery_type,order_status,customorder_id as order_id,tbl_order.created_at,partner_id FROM tbl_order WHERE tbl_order.patient_id = '".$patient_id."' AND category = '".$category."' AND order_status = '".$order_status."'"; 

            $this->db->select('tbl_order.id,tbl_order.patient_id,tbl_order.name,tbl_order.gender,animal_name,animal_category,animal_caretaker,tbl_order.country_code,tbl_order.mobile_no,tbl_order.address,main_amount,discount_amount,gst_amount,final_amount,tbl_order.payment_id,reference_doctor,delivery_type,order_status,customorder_id as order_id,tbl_order.created_at,partner_id,store_name,is_saved_invoice,invoice');
            $this->db->from('tbl_order');
            $this->db->join('tbl_partners', 'tbl_partners.id = tbl_order.partner_id', 'left');
            $this->db->where('tbl_order.patient_id',$patient_id);
            $this->db->where("tbl_order.category",$category);
            if($order_status > 0)
            {
                $this->db->where("order_status",$order_status);

            }
            $query = $this->db->get();  
            return $query->result_array();
        return $this->db->query($query)->result_array();          
    }
    public function get_history_details_by_order_no($orderno,$category_type)
    {
        if($category_type == 1){
           // $query = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',1),':',-1) AS medicine_id,
           //  QUOTE(SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',2),':',-1)) AS medicine_id,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',3),':',-1) AS medicine,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',4),':',-1) AS medicine,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',5),':',-1) AS company_name,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',6),':',-1) AS company_name,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',7),':',-1) AS batch_no,
           //  SUBSTRING_INDEX(SUBSTRING_INDEX(medicine_serialize,';',8),':',-1) AS batch_no
           // FROM tbl_pharmcy_order_items WHERE order_no= '".$orderno."' ";
        $query = "SELECT medicine_serialize FROM tbl_pharmcy_order_items  WHERE order_no= '".$orderno."' ";    
        }
        if($category_type == 2)
        {
            //$query = "SELECT test_serialize,attached_reports FROM tbl_pathology_order_items WHERE tbl_pathology_order_items.order_no= '".$orderno."' ";
            $query = "SELECT test_serialize FROM tbl_pathology_order_items WHERE tbl_pathology_order_items.order_no= '".$orderno."' ";
        }
        if($category_type == 3)
        { 
            //$query = "SELECT test_serialize,attached_reports FROM tbl_radiology_order_items  WHERE order_no= '".$orderno."' ";   
            $query = "SELECT test_serialize FROM tbl_radiology_order_items  WHERE order_no= '".$orderno."' ";   
        }
         
       return $this->db->query($query)->result_array();          
    }
    public function get_history_by_order_no($orderno,$category)
    {
        $query = "SELECT tbl_order.reason,tbl_order.id,tbl_order.patient_id,tbl_order.name,tbl_order.gender,tbl_order.age,animal_name,animal_category,animal_caretaker,tbl_order.country_code,tbl_order.mobile_no,tbl_order.address,tbl_order.main_amount,tbl_order.discount_amount,tbl_order.gst_amount,tbl_order.final_amount,tbl_order.payment_id,reference_doctor,delivery_type,order_status,tbl_order.created_at,partner_id,customorder_id as order_id,tbl_partners.store_name,tbl_partners.address as store_address,tbl_partners.contact_no,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.delivery_charge,tbl_order.invoice FROM tbl_order LEFT JOIN tbl_partners ON tbl_partners.id=tbl_order.partner_id WHERE tbl_order.id = '".$orderno."' AND tbl_order.category = '".$category."'"; 
        return $this->db->query($query)->row_array();       
    }
    public function get_details_by_doctor($consultation_type,$doctorid,$latitude,$longitude)
    {
        if($consultation_type == 1 || $consultation_type == '1')
        {
            $query="SELECT tbl_partners.id,name,email,speciality as speciality_id,IF(tbl_partners.category !=4,'',tbl_services.title) as speciality_name,ug_course as course,tbl_partners.description,contact_no,country_code,address,pincode,city,state,country,latitude,longitude,profile,work_exp,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,online_visit_main_amt,home_visit_main_amt,avg_rate as avg_rating,111.045 * DEGREES(ACOS(COS(RADIANS('".$latitude."')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('".$longitude."')) + SIN(RADIANS('".$latitude."')) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km  FROM tbl_partners LEFT JOIN tbl_services ON tbl_services.id=tbl_partners.speciality WHERE tbl_partners.id='".$doctorid."'"; 
        }
        else{
            $query="SELECT tbl_partners.id,name,email,speciality as speciality_id,ug_course as course,tbl_partners.description,contact_no,IF(tbl_partners.category !=4,'',tbl_services.title) as speciality_name,country_code,address,pincode,city,state,country,latitude,longitude,profile,work_exp,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,avg_rate,online_visit_main_amt,home_visit_main_amt FROM tbl_partners LEFT JOIN tbl_services ON tbl_services.id=tbl_partners.speciality WHERE tbl_partners.id='".$doctorid."'";   
        }
        return $this->db->query($query)->row_array();       
    }
    public function get_appoitments($category,$partner_id,$appointment_status)
    {
        $query = "SELECT id,category,partner_id,patient_id,name,gender,age,country_code,mobile_no,address,main_amount as fees,appointment_status FROM `tbl_order` WHERE `category`='".$category."' AND partner_id='".$partner_id."' AND  appointment_status ='".$appointment_status."'";
        return $this->db->query($query)->result_array();       
    }
    public function get_reinitate_appoitments($category,$partner_id)
    {
       $query = "SELECT tbl_order.id,tbl_order.category,tbl_order.partner_id,tbl_order.patient_id,name,gender,age,country_code,mobile_no,address,main_amount as fees,appointment_status,customorder_id as appointment_id,request_id,tbl_order.created_at,reinitiate_date FROM `tbl_order` LEFT JOIN tbl_notification ON tbl_notification.order_no=tbl_order.id  WHERE tbl_order.category='".$category."' AND tbl_order.partner_id='".$partner_id."' AND  is_reinitiate ='1'";
        return $this->db->query($query)->result_array();       
    }
    public function get_history_list_by_category($category,$patient_id,$appointment_status,$is_followup)
    {
        $this->db->select('tbl_order.id,tbl_order.partner_id,tbl_order.patient_id,tbl_partners.name,consulation_type,customorder_id as appointment_id,appointment_status,is_followup,quickblox_name,tbl_order.created_at',false);
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners', 'tbl_partners.id = tbl_order.partner_id', 'left');
        $this->db->where('tbl_order.category',$category);
        $this->db->where('patient_id',$patient_id);
        // $query = "SELECT tbl_order.id,tbl_order.partner_id,tbl_order.patient_id,tbl_partners.name,consulation_type,appointment_status,tbl_order.created_at FROM `tbl_order` LEFT JOIN tbl_payment_history ON tbl_payment_history.order_no=tbl_order.id LEFT JOIN tbl_partners ON tbl_partners.id=tbl_order.partner_id WHERE tbl_order.category='".$category."' AND patient_id='".$patient_id."'";
        // return $this->db->query($query)->result_array();
        if($appointment_status != 5){
            $this->db->where('appointment_status',$appointment_status);
            $this->db->where('is_followup',$is_followup);
        }
        $this->db->where('is_reinitiate','0');
        $this->db->where('payment_id !=','');
        
        return $this->db->get()->result_array();       
    }
    public function get_history_details_by_id($id,$patient_id)
    {
        $query = "SELECT tbl_order.id,tbl_order.invoice,tbl_order.category,tbl_order.partner_id,tbl_order.patient_id,tbl_partners.name,animal_name, animal_category, animal_caretaker,tbl_partners.gender,tbl_partners.country_code,tbl_partners.contact_no,tbl_order.created_at,symptoms,main_amount as fees,speciality as speciality_id,(SELECT title FROM tbl_services WHERE id=tbl_partners.speciality) as speciality_name,tbl_partners.address,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name ,tbl_partners.latitude,tbl_partners.longitude,tbl_partners.profile,tbl_partners.ug_course as qualification_name,ug_reg_no as  registration_no,treatment_per_hours,treatment_days,treatment_hours,is_followup,customorder_id as appointment_id,consulation_type,appointment_status,tbl_order.payment_id,payment_status,appointment_status,quickblox_name,tbl_partners.description,tbl_order.reason,tbl_order.age,tbl_order.height,tbl_order.weight  FROM `tbl_order` LEFT JOIN tbl_payment_history ON tbl_payment_history.order_no=tbl_order.id LEFT JOIN tbl_partners ON tbl_partners.id=tbl_order.partner_id WHERE tbl_order.id='".$id."' AND patient_id='".$patient_id."'";
        return $this->db->query($query)->row_array();       
    }
    
    public function get_rate_list_by_id($patient_id,$partner_id)
    {
        $query = "SELECT * FROM `tbl_rate` WHERE `partner_id`='".$partner_id."' AND patient_id='".$patient_id."'";
        return $this->db->query($query)->result_array();       
    }
    public function get_avg_rate_id($patient_id,$partner_id)
    {
        $query = "SELECT patient_id,partner_id,SUM(rate) as total_rate FROM tbl_rate GROUP BY partner_id
                HAVING patient_id='".$patient_id."' AND `partner_id`='".$partner_id."'";
        return $this->db->query($query)->row_array();       
    }
    public function get_consultation($category,$partner_id,$consultation_type,$appointment_status,$is_follow,$is_reinitate)
    {
        if($category != 5){
            $this->db->select('tbl_order.name as name',false);
        }else{
            $this->db->select('tbl_order.animal_caretaker as name',false);

        }
        $this->db->select('animal_name,tbl_order.id,tbl_order.partner_id,tbl_order.patient_id,customorder_id as appointment_id,consulation_type,appointment_status,tbl_partners.quickblox_name,tbl_order.payment_id,tbl_order.created_at',false);
        $this->db->from('tbl_order');
        //$this->db->join('tbl_payment_history', 'tbl_order.id = tbl_payment_history.order_no', 'left');
        $this->db->join('tbl_partners', 'tbl_order.patient_id = tbl_partners.id', 'left');
        $this->db->where('tbl_order.category',$category);
        $this->db->where('tbl_order.partner_id',$partner_id);
        $this->db->where('tbl_order.is_reinitiate',$is_reinitate);
        
        if($appointment_status == 0)
        {
            $where = '(appointment_status="0" or appointment_status = "1")';
            $this->db->where($where);
        }
        else{
            if($appointment_status == 5)
            {
                $where = '(appointment_status="2" or appointment_status = "3" or appointment_status = "4")';
                $this->db->where($where);
            }else{
                $this->db->where('appointment_status',$appointment_status);

            }
        }
        
        if($consultation_type != 2){
            $this->db->where('consulation_type',$consultation_type);
        }
        $this->db->where('is_followup',$is_follow);  
        return $this->db->get()->result_array();
    }
    public function get_consultation_details($id)
    {
        $query = "SELECT tbl_order.id,tbl_order.category,tbl_order.partner_id,patient_id,tbl_order.name,tbl_order.gender,tbl_order.age,tbl_order.height,tbl_order.weight,animal_name,animal_category,animal_caretaker,healthcare_sub_id,tbl_partners.country_code,tbl_partners.contact_no,tbl_order.address,tbl_order.latitude,tbl_order.longitude,tbl_partners.latitude as partner_lat,tbl_partners.longitude as partner_lng,tbl_order.patient_realative,tbl_order.symptoms,tbl_order.main_amount as fees,tbl_order.consulation_type,treatment_days,treatment_per_hours,treatment_hours,111.045 * DEGREES(ACOS(COS(RADIANS(tbl_order.latitude)) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS(tbl_order.longitude)) + SIN(RADIANS(tbl_order.latitude)) * SIN(RADIANS(tbl_partners.latitude)))) as distance_in_km,customorder_id as appointment_id,appointment_status,is_followup,tbl_order.payment_id,payment_status,quickblox_name,tbl_order.created_at,tbl_order.reason FROM `tbl_order` LEFT JOIN tbl_payment_history ON tbl_order.id=tbl_payment_history.order_no LEFT JOIN tbl_partners ON tbl_order.patient_id=tbl_partners.id WHERE tbl_order.id='".$id."'";
        return $this->db->query($query)->row_array();       
    }
    public function get_prescription_by_id($id)
    {
        $query = "SELECT file FROM `tbl_prescriptions` WHERE order_no='".$id."'";
        return $this->db->query($query)->result_array();       
    }
    public function get_certificate_by_id($id)
    {
        $query = "SELECT file FROM `tbl_medical_certificate` WHERE order_no='".$id."'";
        return $this->db->query($query)->result_array();       
    }
    
    public function get_order_status($patient_id,$order_no)
    {
        $query = "SELECT tbl_order.id,order_status,change_status_datetime FROM tbl_order WHERE id = '".$order_no."'"; 
        return $this->db->query($query)->row_array();  
    }
    public function get_sub_service_list($id) {
        $q = $this->db->query("SELECT id,title,parent_id,short_desc,iconimg,description,status,created_at,updated_at FROM `tbl_services`  WHERE `parent_id` = '".$id."' AND `status` = '1' ORDER BY `is_possiotion` ASC");
        return $q->result_array();
    }
    public function check_partners_details_by_id($id){
        $query = "SELECT id,register_type,category,name,email,contact_no,dob,gender,country_code,org_password,password,address,pincode,city,state,country,latitude,longitude,description,profile,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,quickblox_name,created_at,updated_at FROM `tbl_partners` WHERE `id`='".$id."' ";
        $row = $this->db->query($query)->row();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    // public function get_all_partners_devicetoken_by_id($id){
    //     $query = "SELECT * FROM `tbl_partner_device` WHERE `partner_id`='".$id."' ";
    //     $row = $this->db->query($query)->result_array();
    //     if($row){
    //         return $row;
    //     } else {
    //         return false;
    //     }
    // }
    public function chat_details($sender_id,$receiver_id,$appoitment_id){
       $query="SELECT * FROM `tbl_chats` WHERE (`sender_id`='".$sender_id."' OR `sender_id`='".$receiver_id."') AND (`receiver_id`='".$sender_id."' OR `receiver_id`='".$receiver_id."') AND  `appoitment_id`='".$appoitment_id."' ORDER BY id ASC";
        return $this->db->query($query)->result();
    }

    public function custom_chat_details($sender_id,$receiver_id,$msg_id){
       $query="SELECT * FROM `tbl_chats` WHERE (`sender_id`='".$sender_id."' OR `sender_id`='".$receiver_id."') AND (`receiver_id`='".$sender_id."' OR `receiver_id`='".$receiver_id."')  AND `id` > '".$msg_id."' ORDER BY id ASC";
        return $this->db->query($query)->result();
    }
    public function chatlisting($cid){
        $gettheid="SELECT DISTINCT `sender_id` FROM `tbl_chats` WHERE `receiver_id` = '".$cid."'  UNION SELECT  DISTINCT `receiver_id` FROM `tbl_chats` WHERE `sender_id` ='".$cid."' ";
        $res=$this->db->query($gettheid)->result();
        $data=array();
        foreach ($res as $k=> $value) {
            $condition=key($value);
            $id=$value->$condition;
            $query="SELECT tbl_chats.*,(SELECT quickblox_name FROM tbl_partners WHERE id=tbl_chats.sender_id) as sender_quickblox_name,(SELECT quickblox_name FROM tbl_partners WHERE id=tbl_chats.receiver_id) as receiver_quickblox_name FROM `tbl_chats`  WHERE (`sender_id`='".$cid."' OR `sender_id`='".$id."') AND (`receiver_id`='".$cid."' OR `receiver_id`='".$id."') ORDER BY tbl_chats.id DESC LIMIT 0,1";
            $final=$this->db->query($query)->row();
            $data[]=$final;
        }
        return $data;
    }
    public function getuserimage($id){
        $query="SELECT profile FROM `tbl_partners` WHERE `id`='".$id."'";
        return $this->db->query($query)->row();
    }
    public function getuserdetails($id){
        $query="SELECT * FROM `tbl_partners` WHERE `id`='".$id."'";
        return $this->db->query($query)->row();
    }

    public function getusername($id){
        $this->db->select('tbl_order.id,tbl_order.name,appointment_status,order_status,consulation_type,is_followup,patient_id,partner_id,tbl_order.category,symptoms,quickblox_name,customorder_id as appointment_id,tbl_order.created_at');
        $this->db->select('(SELECT name FROM tbl_partners WHERE id=tbl_order.partner_id) as partner_name');
        $this->db->from('tbl_order');
        $this->db->join('tbl_partners', 'tbl_partners.id = tbl_order.partner_id', 'left');
        $this->db->where('tbl_order.id',$id);
        return $this->db->get()->row();
        // $query="SELECT name,appointment_status,order_status,consulation_type,is_followup,patient_id,partner_id,category,symptoms,(SELECT name FROM tbl_partners WHERE id=tbl_order.partner_id) as partner_name FROM `tbl_order`  WHERE `id`='".$id."'";
        // return $this->db->query($query)->row();
    }
    public function check_partner_device_exit($id){
        $query="SELECT id FROM `tbl_partner_device`  WHERE `partner_id`='".$id."'";
        return $this->db->query($query)->result_array();
    }
    
    public function get_user_profile_setting($userid)
    {
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        $this->db->from('tbl_partner_device');
        $this->db->join('tbl_partners', 'tbl_partners.id = tbl_partner_device.partner_id', 'left');
        $this->db->where('tbl_partner_device.partner_id', $userid);
        $this->db->where('tbl_partner_device.device_type', 'A');
        return $this->db->get()->row_array();
    }
    public function get_user_profile_IOS($userid)
    {
        $this->db->select('GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids');
        $this->db->from('tbl_partner_device');
        $this->db->where('tbl_partner_device.partner_id', $userid);
        $this->db->where('tbl_partner_device.device_type', 'I');
        return $this->db->get()->row_array();
    }
    public function unread_notification_cout($userid){
        $query="SELECT COUNT(*) AS row_count FROM `tbl_notification` WHERE `partener_id`='".$userid."'AND is_admin_view= '0'";
        return $this->db->query($query)->row();   
    }
    public function notification_listing($userid)
    {
        $query="SELECT tbl_notification.id,title,tbl_notification.description,  
        CASE 
            WHEN notification_type = 'AB' then 'Appoitment Book'
            WHEN notification_type = 'OB' then 'Order'
            WHEN notification_type = 'N' then 'New Appoitment'
            WHEN notification_type = 'NP' then 'New Appointment Pending'
            WHEN notification_type = 'V' then 'Video call'
            WHEN notification_type = 'A' then 'Audio call'
            WHEN notification_type = 'S' then 'Service Charge'
            WHEN notification_type = 'RA' then 'Request Accept'
            WHEN notification_type = 'RR' then 'Request Reject'
            WHEN notification_type = 'U' then 'Update Status'
            WHEN notification_type = 'C' then 'Chat'
            WHEN notification_type = 'RI' then 'ReInitate Appoitment'
            ELSE 'Other'
        END AS notification_type,request_id,tbl_notification.patient_id,tbl_order.is_followup,tbl_notification.patient_id,is_admin_view,order_no as appointment_id,IF(notification_type='C',tbl_order.consulation_type,'') AS consulation_type,IF(notification_type='C',tbl_order.appointment_status,'') AS appointment_status,IF(notification_type='C',tbl_chats.sender_id,'') AS sender_id,IF(notification_type='C',tbl_partners.name,'') AS sender_name,tbl_partners.quickblox_name,temp_appointment_data,tbl_notification.created_at  FROM `tbl_notification` LEFT JOIN tbl_order ON tbl_notification.order_no=tbl_order.id LEFT JOIN tbl_chats ON tbl_notification.chat_id=tbl_chats.id LEFT JOIN tbl_partners ON tbl_chats.sender_id=tbl_partners.id WHERE `partener_id`='".$userid."' AND req_status= '0' GROUP BY tbl_notification.id";
        
        return $this->db->query($query)->result_array();
    }
    public function reinitate_notification_list($userid)
    {
        $query="SELECT tbl_notification.id,title,tbl_notification.description,
        CASE 
            WHEN notification_type = 'RI' then 'ReInitate Appoitment'
            ELSE 'Other'
        END AS notification_type,request_id,tbl_notification.patient_id,tbl_notification.patient_id,is_admin_view,order_no as appointment_id,temp_appointment_data,tbl_notification.created_at  FROM `tbl_notification`  WHERE `partener_id`='".$userid."' AND req_status= '0' AND notification_type= 'RI' GROUP BY tbl_notification.id";
        return $this->db->query($query)->result_array();
    }
    public function get_accpted_doctor_list($request_id)
    {
       $query="SELECT partener_id,request_id,tbl_partners.id,name,address,pincode,city,state,country,latitude,longitude,profile,(SELECT name FROM tbl_countries WHERE id=tbl_partners.country) as country_name ,(SELECT name FROM tbl_states WHERE id=tbl_partners.state) as state_name ,(SELECT name FROM tbl_cities WHERE id=tbl_partners.city) as city_name,avg_rate,temp_appointment_data FROM `tbl_notification` LEFT JOIN tbl_partners ON tbl_partners.id=tbl_notification.partener_id  WHERE `request_id`='".$request_id."' AND tbl_notification.req_status = '1' ORDER BY tbl_partners.id ASC";
        return $this->db->query($query)->result_array(); 
    }

    public function notificationexit($user_id,$notification_id){
       $query="SELECT * FROM `tbl_notification` WHERE `partener_id`='".$user_id."'AND id= '".$notification_id."'";
        return $this->db->query($query)->result_array();    
    }

    public function all_order_data($orderno){
       $query="SELECT * FROM `tbl_order` WHERE `id`='".$orderno."'";
        return $this->db->query($query)->row_array();    
    }
    public function get_category_wise_store($category)
    {
        $query="SELECT id,open_timing FROM `tbl_partners` WHERE `category`='".$category."'";
        return $this->db->query($query)->result_array();

    }
    
}
?>