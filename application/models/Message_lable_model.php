<?php

class Message_lable_model extends CI_Model {
    
    

    function get_languages_message_list() {
        $q = $this->db->query("SELECT tm.id as engid,tmh.id as hindiid,tm.title as engtitle,tmh.title as hindititle,tm.message_key FROM `tbl_message` As tm LEFT JOIN tbl_message as tmh ON tm.id=tmh.parent_id GROUP BY tm.message_key Order by tm.created_at DESC");
        return $q->result_array();
    }


    function verifylableExist($message)
    {
        $this->db->where("message_key",$message);
        $query =$this->db->get('tbl_message');
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    function editverifylableExist($message)
    {
        $this->db->where("message_key",$message);
        $this->db->where("message_key",$message);
        $query =$this->db->get('tbl_message');
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function get_hindi_message_by_id($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('tbl_message')->result_array();
    }   

}   

?>