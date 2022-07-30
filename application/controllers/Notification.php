<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Notification extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  
        $this->auth->check_partnersession();
        $this->load->model('Notification_model');
        $this->load->model('common_model');

    }
    public function index()
    {
        $data["error"] = "";
        $data['title'] = "Notification List";
        $partner_id = $this->session->userdata('userid');
        //print_r($partner_id );die;
        if($partner_id >= 1) {
        //print_r(1);die;

            $data["notification"] = $this->Notification_model->get_notification_list($partner_id);
            echo $this->db->last_query();
            
            //print_r($data["notification"]);die;
            $this->load->ptemplate('partner/notification/notification_list',$data);
        }else{
            redirect('partners/login');
        }
    }
    public function fetch_notification()
    {
        if($_SESSION['usercategory'] == 1)
        {
            
            $data_notification = $this->Notification_model->get_unread_notification($_SESSION['userid']);
            $data_notification_toast=array();

            foreach($data_notification as $k=>$v){
                $data_notification_toast[$k]['title'] = $v->title;
                $data_notification_toast[$k]['id'] = $v->id;
                $data_notification_toast[$k]['order_id'] = $v->order_id;
                $data_notification_toast[$k]['order_no'] = $v->order_no;
                $data_notification_toast[$k]['description'] = $v->description;
            }
            //print_r($data_notification_toast);die;
            $data = array(
                'notification_toast' => $data_notification_toast,
            );
            
            echo json_encode($data);
        }
        
    }
    
}
?>