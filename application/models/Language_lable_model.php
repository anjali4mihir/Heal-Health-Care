<?php

class Language_lable_model extends CI_Model {
    
    function get_languages_label_list() {
        $q = $this->db->query("SELECT tm.id as engid,tmh.id as hindiid,tm.title as engtitle,tmh.title as hindititle,tm.label_key FROM `tbl_lable` As tm LEFT JOIN tbl_lable as tmh ON tm.id=tmh.parent_id GROUP BY tm.label_key Order by tm.created_at DESC");
        return $q->result_array();
    }
    function verifylableExist($lable)
    {
        $this->db->where("label_key",$lable);
        $query =$this->db->get('tbl_lable');
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function get_hindi_lable_by_id($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('tbl_lable')->result_array();
    }   

}   

?>  

}   

?>