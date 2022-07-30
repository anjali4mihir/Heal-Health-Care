<?php
 /**
  * 
  */
 class Auth
 {
 	public $CI;

 	function __construct()
 	{
 		$this->CI =& get_instance();

 	}

 	public function check_session()
 	{
 		$admin = $this->CI->session->userdata('admin_id');
 		if(!$admin)
 		{
 			redirect(base_url('admin/login'));
 		}


 	}
 	public function check_partnersession()
 	{
 		$admin = $this->CI->session->userdata('userid');
 		if(!$admin)
 		{
 			redirect(base_url('partners/login'));
 		}


 	}
 }



?>