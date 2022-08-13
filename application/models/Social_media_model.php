<?php

class Social_media_model extends CI_Model {
    
    function get_social_media() {
        $q = $this->db->query("SELECT * FROM `tbl_social_media`");
        return $q->result();
    }
    public function social_list(){
    	$query="SELECT * FROM `tbl_social_media` ORDER BY `id` DESC";
    	$res=$this->db->query($query)->result();
    	return $res;
    } 

    public function get_active_social_list(){
        $query="SELECT * FROM `tbl_social_media` WHERE `status`='1' ORDER BY `id` ASC";
        $res=$this->db->query($query)->result();
        return $res;
    } 

    public function get_single_social_details($id){
    	$query="SELECT * FROM `tbl_social_media` WHERE `id`='".$id."'";
    	$res=$this->db->query($query)->row();
    	return $res;
    }
}

?>
