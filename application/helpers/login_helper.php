<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('_is_user_login'))
{
    function _is_user_login($thi)
    {
        $userid = _get_current_user_id($thi);
        $usertype = _get_current_user_type_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($userid) && $userid!="" && isset($usertype))
        {
            if($is_access == true){
                 return $userid;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }

    }   
}
if(! function_exists('_get_current_user_id')){
    function _get_current_user_id($thi){
        return $thi->session->userdata("admin_id");
    }
}

if(! function_exists('_get_current_user_type_id')){
    function _get_current_user_type_id($thi){
        return $thi->session->userdata("user_type_id");
    }
}