<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Cron extends CI_Controller {
	public function index()
	{
		//log_message('debug',date('y-m-d H:i:s'));
		//echo 'hi';
		$this->load->model('admin_model');
		$data = $this->admin_model->get_followup_days();
		// print_r('<pre>');
		// print_r($data);die;
		// $now = time(); // or your date as well
		// $your_date = strtotime("2021-07-31");
		// $datediff = $now - $your_date;

		// echo round($datediff / (60 * 60 * 24));exit;
	}
	
}
?>