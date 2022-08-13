<?php
class Common_model extends CI_Model{
    function data_insert($table,$insert_array){
        $this->db->insert($table,$insert_array);
        return $this->db->insert_id();
    }

    function data_update($table,$set_array,$condition){
        $this->db->update($table,$set_array,$condition);
        return $this->db->affected_rows();
    }

    function data_remove($table,$condition){
        $this->db->delete($table,$condition);
    }

    function data_update_new($table,$set_array,$condition){
        $res=$this->db->update($table,$set_array,$condition);
        return $res;
    }
    function check_slug($table,$slug){
        $q="SELECT COUNT(slug) as newscount FROM $table WHERE slug='".$slug."'";
        $result=$this->db->query($q)->row();
        return $result;

    }
}
?>
