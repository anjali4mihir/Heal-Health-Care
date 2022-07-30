<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function user_image($id){
	if(isset($id)){
		$CI=&get_instance();
		$user = $CI->db->get_where('tbl_admin',['admin_id' => $id])->row_array();
		$image = '';
		if($user['image'] == 'no-image.png'){
			$image = base_url('uploads/')."no-image.png";
		}
		else{
			if($user['image'] == ''){
				$image = base_url('uploads/')."no-image.png";
			}
			else if(file_exists(FCPATH.'uploads/'.$user['image'])){
				$image = base_url('uploads/').$user['image'];
			}
			else{
				$image = base_url('uploads/')."no-image.png";
			}
		}	
		return $image;
	}else{
		redirect(base_url('admin/login'));
	}
	

	
}
function user_name($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_admin',['admin_id' => $id])->result_array()[0];
	$name = '';
	if($user['name'] == ''){
		$name = "";
	}
	else{
		$name = $user['name'];
	}

	return $name;
}
function user_mobile($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_admin',['admin_id' => $id])->result_array()[0];
	$contactno = '';
	if($user['contactno'] == ''){
		$contactno = "";
	}
	else{
		$contactno = $user['contactno'];
	}

	return $contactno;
}
function partner_image($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_partners',['id' => $id])->result_array()[0];
	$image = '';
	if($user['profile'] == 'no-image.png'){
		$image = base_url('uploads/profile_setting/')."no-image.png";
	}
	else{
		if($user['profile'] == ''){
			$image = base_url('uploads/profile_setting/')."no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/profile_setting/'.$user['profile'])){
			$image = base_url('uploads/profile_setting/').$user['profile'];
		}
		else{
			$image = base_url('uploads/profile_setting/')."no-image.png";
		}
	}

	return $image;
}
function partner_name($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_partners',['id' => $id])->result_array()[0];
	$name = '';
	if($user['name'] == ''){
		$name = "";
	}
	else{
		$name = $user['name'];
	}

	return $name;
}

function partner_category($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_partners',['id' => $id])->result_array()[0];
	$name = '';
	if($user['category'] == '1'){
		$name = "Pharmacy";	
	} else if($user['category'] == '2'){
		$name = "Pathology";	
	} else if($user['category'] == '3'){
		$name = "Radiology";	
	}

	return $name;
}

function partner_store_name($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_partners',['id' => $id])->result_array()[0];
	$name = '';
	if($user['store_name'] == ''){
		$name = "";
	}
	else{
		$name = $user['store_name'];
	}

	return $name;
}

function partner_mobile($id){
	$CI=&get_instance();
	$user = $CI->db->get_where('tbl_partners',['id' => $id])->result_array()[0];
	$contactno = '';
	if($user['contact_no'] == ''){
		$contactno = "";
	}
	else{
		$contactno = $user['contact_no'];
	}

	return $contactno;
}
function _vdate($date){
    return date('d-m-Y',strtotime($date));
}
function _vdt($datetime)
{
	return date('d-m-Y  h:i a',strtotime($datetime));
}

function newuploadusingcompress($filearray,$path)
{
    $temp = explode(".", $filearray['name']);
    $filename=rand(0000,9999).time().'.'.end($temp);
    $valid_ext = array('png','jpeg','jpg','pdf');
    $location = $path.$filename;
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    if(in_array($file_extension,$valid_ext))
    {  
        $upload=compressImage($filearray['tmp_name'],$location,60);
        if($upload==1)
        {
            return $filename;
        }
        else
        {
            return 0;
        }
    }
    else
    {
        return 0;
    }
}
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    return imagejpeg($image, $destination, $quality);

}
function get_random_string($length = 10, $sting = "")
{
    if (empty($sting) || $sting == '')
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    }
    else
    {
        $alphabet = $sting;
    }
    $token = "";
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++)
    {
        $n = rand(0, $alphaLength);
        $token .= $alphabet[$n];
    }
    return $token;
}
function file_upload($arr, $path)
{
    set_time_limit(0);
    if ($arr['error'] == 0)
    {
        $temp = explode(".", $arr["name"]);
        $file_name = uniqid() . time() . '.' . end($temp);
        $file_path = $path . $file_name;
        if (move_uploaded_file($arr["tmp_name"], $file_path) > 0)
        {
            $ret = $file_name;
        }
        else
        {
            $ret = "";
        }
    }
    return $ret;
}
function dd($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}
?>