
<?php

class Content_model extends CI_Model
{

    public function get_con_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_content');
        return $this->db->get()->result_array();
    }


    public function get_con_list_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_content');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
}
?>