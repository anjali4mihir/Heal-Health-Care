<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Cleardata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
   	}
    
    public function index()
    {
		$this->db->where('created_at < DATE_ADD(NOW(), INTERVAL -1 MONTH)');
    	$this->db->delete('tbl_partner_device');
   	}
}
?>