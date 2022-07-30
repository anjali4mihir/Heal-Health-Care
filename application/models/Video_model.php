<?php
class Video_model extends CI_model
{
	public function video_list(){
    	$this->db->select("*");
    	$this->db->from("tbl_video");
    	$this->db->order_by('id','DESC');
    	return $query = $this->db->get()->result_array();
    }
    public function get_single_Youtube_details($id){
    	$this->db->select("*");
    	$this->db->from('tbl_video');
    	$this->db->WHERE('id',$id);
    	return $query = $this->db->get()->row_array();
    }
    public function get_active_video_list()
    {
        $this->db->select("*");
        $this->db->from("tbl_video");
        $this->db->WHERE('status','1');
        $this->db->order_by('id','DESC');
        return $query = $this->db->get()->result_array();   
    }
}














?>